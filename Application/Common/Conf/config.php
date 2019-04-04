<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST' =>    array('Home','Admin',),
    'URL_MODEL'          => '2', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session
    'USER_CONFIG'        => array(
        'USER_AUTH' => true,
        'USER_TYPE' => 2,
    ),
    //更多配置参数
    'URL_CASE_INSENSITIVE' =>true, //不区分大小写
    //默认数据库配置
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'jsks', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'clw2019', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    // 加载扩展配置文件
    'LOAD_EXT_CONFIG' => 'site'
);