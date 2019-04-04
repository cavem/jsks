<?php
header("Content-Type: text/html;charset=utf-8");
ini_set('date.timezone','Asia/Shanghai');
set_time_limit(0);
$con = mysql_connect("localhost","root","clw2019");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("jsks", $con);
//判断数据库是否为空
$row = mysql_fetch_array(mysql_query("SELECT * FROM `kj`")); 
if(!$row){ 
    mysql_query("INSERT INTO `jsks`.`kj` (`id`, `date_no`, `kj_num`, `start_time`, `kj_time`, `end_time`, `state`) VALUES ('1', '0000000000', '000', NULL, NULL, NULL, '已封盘')");
} 
$redis = new redis();  
$result = $redis->connect('127.0.0.1',6379); 
//清除缓存
if($redis->exists("pre_info")){
    $redis->delete("pre_info");
}
if($redis->exists("cur_info")){
    $redis->delete("cur_info");
}
if($redis->exists("cur_dateno")){
    $redis->delete("cur_dateno");
}
if($redis->exists("cur_state")){
    $redis->delete("cur_state");
}
//获取开奖时间
$kjsj = mysql_fetch_array(mysql_query("SELECT `kjsj` FROM `setting` WHERE `id`=1"));
$kjsj = $kjsj['kjsj'];
$i=0;
//获取上期开奖结果
$pre_info = mysql_fetch_array(mysql_query("SELECT `date_no`,`kj_num` FROM  `kj` ORDER BY  `kj`.`id` DESC LIMIT 0 , 1"));
$pre_dateno = $pre_info['date_no'];
$pre_kjnum = $pre_info['kj_num'];
//计算开奖号码信息
$n1 = substr($pre_kjnum,0,1);
$n2 = substr($pre_kjnum,1,1);
$n3 = substr($pre_kjnum,2);
$hz = $n1+$n2+$n3;
if($hz>3&&$hz<11){
    $dx="跌";
}
if($hz>10&&$hz<18){
    $dx="涨";
}
if($hz%2==0){
    $ds="绿";
}else{
    $ds="红";
}
$pre_info = array(
    "n1" => $n1,
    "n2" => $n2,
    "n3" => $n3,
    "hz" => $hz,
    "dx" => $dx,
    "ds" => $ds,
    "dateno" => $pre_dateno
);
//redis保存上期信息
$redis->set("pre_info",json_encode($pre_info));
while(true){
    if(date("His")-120000<0){
        break;
    }
    if($redis->exists("cur_info")){
        $redis->delete("pre_info");
        $redis->set("pre_info",$redis->get("cur_info"));
    }
    $i++;
    $i=$i>9?$i:'0'.$i;
    $date_no = date("Ymd").$i;
    if($redis->exists("cur_dateno")){
        $redis->delete("cur_dateno");
    }
    $redis->set("cur_dateno",$date_no);
    $kj_num = mt_rand(1,6).mt_rand(1,6).mt_rand(1,6);
    $kj_num = (string)$kj_num;
    $state = "投注中";
    $start_time = date("Y-m-d H:i:s");
    if($redis->exists("cur_state")){
        $redis->delete("cur_state");
    }
    $time_state = array(
        "state" => $state,
        "start_time" => $start_time 
    );
    $redis->set("cur_state",json_encode($time_state));
    $sql="INSERT INTO `jsks`.`kj` (`date_no`, `kj_num`, `start_time`, `state`) VALUES ('".$date_no."', '".$kj_num."', '".$start_time."', '".$state."')";
    $res=mysql_query($sql); 
    if($res){
        echo $date_no.'start';
    }
    sleep($kjsj);
    $state = "开奖中";
    $kj_time = date("Y-m-d H:i:s");
    if($redis->exists("cur_state")){
        $redis->delete("cur_state");
    }
    $time_state = array(
        "state" => $state,
        "start_time" => $start_time 
    );
    $redis->set("cur_state",json_encode($time_state));
    $res = mysql_query("UPDATE `jsks`.`kj` SET `kj_time` = '".$kj_time."', `state` = '".$state."' WHERE `kj`.`date_no` = ".$date_no);
    if($res){
        echo $date_no.'kjz';
    }
    //获取开奖号码
    $kj_num = mysql_fetch_array(mysql_query("SELECT `kj_num` FROM `kj` WHERE `date_no`=".$date_no));
    $kj_num = $kj_num['kj_num'];
    
    //计算开奖号码信息
    $n1 = substr($kj_num,0,1);
    $n2 = substr($kj_num,1,1);
    $n3 = substr($kj_num,2);
    $hz = $n1+$n2+$n3;
    if($hz>3&&$hz<11){
        $dx="跌";
    }
    if($hz>10&&$hz<18){
        $dx="涨";
    }
    if($hz%2==0){
        $ds="绿";
    }else{
        $ds="红";
    }
    //redis保存当期信息
    $cur_info = array(
        "n1" => $n1,
        "n2" => $n2,
        "n3" => $n3,
        "hz" => $hz,
        "dx" => $dx,
        "ds" => $ds,
        "dateno" => $date_no
    );
    if($redis->exists("cur_info")){
        $redis->delete("cur_info");
    }
    $redis->set("cur_info",json_encode($cur_info));
    unset($cur_info);
    //遍历投注信息
    $res = mysql_query("SELECT * FROM `tz` WHERE `date_no` = ".$date_no);
    while($row = mysql_fetch_array($res)){
        $id = $row['id'];
        $uid = $row['uid'];
        $date_no = $row['date_no'];
        $tz_info = json_decode($row['tz_info'],true);
        $win_money = 0;
        //遍历投注结果
        foreach($tz_info as $k=>$v){
            $wf = $v['wf'];
            $val = (string)$v['val'];
            $money = $v['money'];
            $pl = $v['pl'];
            switch($wf){
                case 'sj':
                    if(strlen(strpos($kj_num,$val))){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
                case 'dx':
                    if($n1==$n2&&$n2==$n3){
                        $win_money+=0;
                    }else{
                        if($val==$dx){
                            $win_money+=$money*$pl;
                        }else{
                            $win_money+=0;
                        }
                    }
                    ;break;
                case 'ds':
                    if($val==$ds){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
                case 'ws':
                    if($n1==$n2&&$n2==$n3&&$val==$kj_num){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
                case 'qs':
                    if($n1==$n2&&$n2==$n3){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
                case 'hz':
                    if($hz==3||$hz==18){
                        $win_money+=0;
                    }else{
                        if($val==$hz){
                            $win_money+=$money*$pl;
                        }else{
                            $win_money+=0;
                        }
                    }
                    ;break;
                case 'cp':
                    if(strlen(strpos($kj_num,$n1.$n2))||strlen(strpos($kj_num,$n1.$n3))||strlen(strpos($kj_num,$n2.$n3))){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
                case 'dp':
                    if(strlen(strpos($kj_num,$val))){
                        $win_money+=$money*$pl;
                    }else{
                        $win_money+=0;
                    }
                    ;break;
            }
        }
        //更新数据库赢钱信息
        //获取账户余额
        $balance = mysql_fetch_array(mysql_query("SELECT `balance` FROM `user` WHERE `id`=".$uid));
        $balance = $balance['balance'];
        $balance+=$win_money;
        //更新账户余额
        mysql_query("UPDATE `jsks`.`user` SET `balance` = '".$balance."' WHERE `user`.`id` = ".$uid);
        //更新投注信息
        mysql_query("UPDATE `jsks`.`tz` SET `win_money` = '".$win_money."' WHERE `tz`.`id` = ".$id);
    }
    //更新开奖信息
    $state = "已封盘";
    if($redis->exists("cur_state")){
        $redis->delete("cur_state");
    }
    $time_state = array(
        "state" => $state,
        "start_time" => $start_time 
    );
    $redis->set("cur_state",json_encode($time_state));
    $end_time = date("Y-m-d H:i:s");
    $res = mysql_query("UPDATE `jsks`.`kj` SET `end_time` = '".$end_time."', `state` = '".$state."' WHERE `kj`.`date_no` = ".$date_no);
    if($res){
        echo $date_no.'yfp';
    }
}
?>