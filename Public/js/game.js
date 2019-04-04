var wsurl = "ws://39.107.68.39:8888/jsks/server.php";
websocket = new WebSocket(wsurl);
function send(type, name, head, message) {
    var type = type;
    var name = name;
    var head = head;
    var message = message;
    var msg = {
        type: type,
        message: message,
        name: name,
        head: head
    };
    try {
        websocket.send(JSON.stringify(msg))
    } catch(ex) {
        console.log(ex)
    }
}
var mySwiper = new Swiper(".swiper-container", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
$(document).ready(function() {
    var len = $(window).height();
    var lenA = $(".indX").height();
    var resh = $(".res-titA-z").height();
    $(".index").css("height", len - resh);
    $(".ind").css("height", len - resh - lenA)
});
var curdateno;
function timer(intDiff) {
    if (intDiff == "f") {
        $(".indForB-ul2").addClass("fp");
        get_kj();
        $(".bqw").hide();
        $(".gjy").show();
        timer2(timers);
        return false
    }
    $(".mas").show();
    setInterval(function() {
        var day = 0,
        hour = 0,
        minute = 0,
        second = 0;
        if (intDiff > 0) {
            day = Math.floor(intDiff / (60 * 60 * 24));
            hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
            minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
            second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            if (minute <= 9) {
                minute = "0" + minute
            }
            if (second <= 9) {
                second = "0" + second
            }
            $("#day_show").html(day + "天");
            $("#hour_show").html('<s id="h"></s>' + hour);
            $("#minute_show").html("<s></s>" + minute);
            $("#second_show").html("<s></s>" + second)
        }
        if (intDiff > 6 && intDiff % 3 == 0) {
            if (usertype == 0 && username == "system") {
                robmsg()
            }
        }
        if (intDiff == 0) {
            $(".mas").hide();
            if (usertype == 0 && username == "system") {
                send("admin", "系统管理员", "admin.jpg", '<span style="color:red;">本期建仓截止，请等待开仓</span>')
            }
            $("#dexL1").html("已经封盘，开仓中...");
            $("#dexL1").addClass("dexLotteryRed");
            $(".indForB-ul2").addClass("indForB-ul2-none");
            $(".dexLottery>p>span:last-child").addClass("dexLKj");
            timer1();
            clearInterval(timer)
        }
        intDiff--
    },
    1000)
}
function mt_rand(y, x) {
    var rand = parseInt(Math.random() * (x - y + 1) + y);
    return rand
}
var nickname = ["伊人思异人", "春光乍泄", "一张白纸-°", "咒怨』", "永恒`的痛", "半島煙盒√", "模糊的背影", "哆啦c梦", "霸烈~枪神", "招摇过市小2b", "Hollow", "夏ˇ", "c忧郁", "The only", "良人未至o", "ζ凉风", "_忏悔", "大白", "奘闇", "事在人为.", "流年", "凡人多烦事", "自由如风", "等待", "逐風", "野居", "暗月", "一语道破", "鱼与胸罩", "日暮", "小三儿", "同桌", "秋天的童话", "乖萌兔", "太阳", "西红柿炒鸡蛋", "资本家", "1颗的距离", "女屌丝", "2B", "神啊", "将计就计", "尛蘑菇", "9527", "沾花惹草", "一贱成名", "暧昧", "伤弦几度", "老街孤人"];
var msg = ["三军" + " " + mt_rand(1, 6) + " " + mt_rand(1, 20) + "000", "涨跌" + " 涨" + " " + mt_rand(1, 20) + "000", "涨跌" + " 跌" + " " + mt_rand(1, 20) + "000", "红绿" + " 红" + " " + mt_rand(1, 20) + "000", "红绿" + " 绿" + " " + mt_rand(1, 20) + "000"];
function robmsg() {
    send("user", nickname[mt_rand(0, 48)], "tx" + mt_rand(1, 20) + ".jpg", msg[mt_rand(0, 4)])
}
function timer2(intDiff) {
    setInterval(function() {
        var day = 0,
        hour = 0,
        minute = 0,
        second = 0;
        if (intDiff > 0) {
            day = Math.floor(intDiff / (60 * 60 * 24));
            hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
            minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
            second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            if (minute <= 9) {
                minute = "0" + minute
            }
            if (second <= 9) {
                second = "0" + second
            }
            $("#day_show2").html(day + "天");
            $("#hour_show2").html('<s id="h"></s>' + hour);
            $("#minute_show2").html("<s></s>" + minute);
            $("#second_show2").html("<s></s>" + second)
        }
        if (intDiff == 0) {
            window.location.reload();
            clearInterval(timer)
        }
        intDiff--
    },
    1000)
}
function timer1() {
    get_pre_kj();
    get_cur_kj();
    get_balance();
    if (usertype == 0 && username == "system") {
        send("admin", "系统管理员", "admin.jpg", "本期建仓开始，祝君盈利")
    }
    $("#dexL1").html("距离封盘还有");
    $("#dexL1").removeClass("dexLotteryRed");
    $(".indForB-ul2").removeClass("indForB-ul2-none");
    $(".dexLottery>p>span:last-child").removeClass("dexLKj");
    gettimer();
}
var gettimer = function() {
    $.post("gettimer", {
        "n": "n"
    },
    function(data) {
        data = JSON.parse(data);
        if (data["state"] == "投注中") {
            num = data["timer"]
        } else {
            if (data["state"] == "开奖中") {
                num = 0
            } else {
                num = "f"
            }
        }
        timer(num)
    })
};
var get_cur_kj = function() {
    $.post("get_cur_kj", {
        "n": "n"
    },
    function(data) {
        $(".curdateno").text(data);
        curdateno = data
    })
};
var get_pre_kj = function() {
    $.post("get_pre_kj", {
        "n": "n"
    },
    function(data) {
        data = JSON.parse(data);
        $(".predateno").text(data["dateno"]);
        for (var i = 0; i < 3; i++) {
            var j = i + 1;
            $(".dexHeadA2-u1").children("li").eq(i).removeClass();
            $(".dexHeadA2-u1").children("li").eq(i).addClass("dexHeadA2-u1-" + data["n" + j])
        }
        $(".dexHeadA2-u2").children("li").eq(0).text(data["hz"]);
        $(".dexHeadA2-u2").children("li").eq(1).text(data["dx"]);
        $(".dexHeadA2-u2").children("li").eq(2).text(data["ds"])
    })
};
var get_kj = function() {
    $.post("get_kj", {
        "n": "n"
    },
    function(data) {
        data = JSON.parse(data);
        $(".predateno").text(data["dateno"]);
        for (var i = 0; i < 3; i++) {
            var j = i + 1;
            $(".dexHeadA2-u1").children("li").eq(i).removeClass();
            $(".dexHeadA2-u1").children("li").eq(i).addClass("dexHeadA2-u1-" + data["n" + j])
        }
        $(".dexHeadA2-u2").children("li").eq(0).text(data["hz"]);
        $(".dexHeadA2-u2").children("li").eq(1).text(data["dx"]);
        $(".dexHeadA2-u2").children("li").eq(2).text(data["ds"])
    })
};
var get_balance = function() {
    $.post("get_balance", {
        "n": "n"
    },
    function(data) {
        $("#moneyNum").text(data)
    })
};
var init = function() {
    gettimer();
    get_pre_kj();
    get_cur_kj()
};
$(function() {
    init();
    $("#Upper").click(function(e) {
        layer.open({
            title: "入金",
            content: "请转账到卡号："+bankcard,
            shadeClose: true,
            skin: "demo-class",
            btn: ["取消", "确定"],
            // btn2: function() {
            //     layer.alert("请先添加客服qq："+kfqq);
            //     window.location.href = "mqqwpa://im/chat?chat_type=wpa&uin=" + kfqq + "&version=1&src_type=web&web_src=oicqzone.com"
            // }
        })
    });
    $(".indForB>ul>.indForB-ul2").click(function() {
        if ($(this).hasClass("indForB-ul2-none")) {
            layer.msg("开仓中！不能建仓")
        } else {
            if ($(this).hasClass("fp")) {
                layer.msg("请等待开盘...")
            } else {
                var height = $(".indBan .indBan-A").height();
                $(".indBack").show();
                $(".indBan ").css("height", height)
            }
        }
    });
    $(".indBack").click(function() {
        $(".indBan").css({
            "height": 0
        });
        $(".indBack").hide();
        $(".indB1-a>ul>li").removeClass("indB1-a-act");
        $(".indB1-c>ul>li>input").val("")
    });
    $(".indBanL>ul>li:nth-child(1)>a").click(function() {
        var u = navigator.userAgent;
        $(".indBan-A .swiper-container .swiper-button-prev").trigger("click")
    });
    $(".indBanL>ul>li:nth-child(2)>a").click(function() {
        var u = navigator.userAgent;
        $(".indBan-A .swiper-container .swiper-button-next").trigger("click")
    });
    $(".indB1-b>ul>li:nth-child(1)").click(function() {
        var valu = $("#sum").val();
        if (valu >= 5000) {
            $("#sum").val(parseInt(valu) + parseInt(1000))
        } else {
            if (valu == "") {
                $("#sum").val(50)
            } else {
                $("#sum").val(parseInt(valu) * 2)
            }
        }
    });
    $(".indB1-b>ul>li:nth-child(2)").click(function() {
        $("#sum").val(10)
    });
    $(".indB1-b .indB1-b1>a").click(function() {
        var num = $("#moneyNum").html();
        $("#sum").val(num)
    });
    $(".indB1-a>ul>li>a").click(function() {
        if ($(this).parent().hasClass("indB1-a-act")) {
            $(this).parent().removeClass("indB1-a-act")
        } else {
            $(this).parent().addClass("indB1-a-act")
        }
    });
    $("#sum").keyup(function() {
        $(this).val($(this).val().replace(/\D|^0/g, ""))
    }).bind("paste",
    function() {
        $(this).val($(this).val().replace(/\D|^0/g, ""))
    }).css("ime-mode", "disabled");
    $(".indB1-c>ul>li>button").click(function() {
        var valu = $("#sum").val();
        var len = $(".indB1-a>ul>.indB1-a-act").length;
        var money = $("#moneyNum").html();
        var Total = parseInt(valu) * parseInt(len);
        if (valu == "") {
            layer.msg("请输入建仓金额")
        } else {
            if (valu < 10) {
                layer.msg("建仓金额不能小于10")
            } else {
                if (len < 1) {
                    layer.msg("请选择建仓项")
                } else {
                    if (parseInt(money) < parseInt(Total)) {
                        layer.msg("金额不足")
                    } else {
                        if ($(".indForB-ul2").hasClass("indForB-ul2-none")) {
                            layer.msg("开仓中！不能建仓")
                        } else {
                            layer.open({
                                title: "提示",
                                content: "确定建仓？",
                                icon: 0,
                                shadeClose: true,
                                btn: ["取消", "确定"],
                                btn2: function() {
                                    var arr = new Array();
                                    $(".indB1-a-act").each(function() {
                                        var wf = $(this).children("a").data("wf");
                                        var val = $(this).children("a").data("val");
                                        var pl = $(this).children("a").data("pl");
                                        var obj = {
                                            wf: wf,
                                            val: val,
                                            money: valu,
                                            pl: pl
                                        };
                                        arr.push(obj)
                                    });
                                    var arrjson = JSON.stringify(arr);
                                    var str = "";
                                    for (var i in arr) {
                                        var item = arr[i];
                                        var wfname;
                                        switch (item["wf"]) {
                                        case "sj":
                                            wfname = "三军";
                                            break;
                                        case "dx":
                                            wfname = "涨跌";
                                            break;
                                        case "ds":
                                            wfname = "红绿";
                                            break;
                                        case "ws":
                                            wfname = "指定全数";
                                            break;
                                        case "qs":
                                            wfname = "全数";
                                            break;
                                        case "hz":
                                            wfname = "点数";
                                            break;
                                        case "cp":
                                            wfname = "长牌";
                                            break;
                                        case "dp":
                                            wfname = "短牌";
                                            break
                                        }
                                        str += wfname + " " + item["val"] + " " + item["money"] + "<br>"
                                    }
                                    $.post("save_tzinfo", {
                                        "tz_info": arrjson
                                    },
                                    function(data) {
                                        data = JSON.parse(data);
                                        if (data["code"] == 0) {
                                            layer.msg("建仓成功！");
                                            $("#moneyNum").html(data["balance"]);
                                            send("user", mynickname, headimg, str)
                                        } else {
                                            layer.msg(data["msg"])
                                        }
                                    })
                                }
                            })
                        }
                    }
                }
            }
        }
    });
    var i = 0;
    if (window.WebSocket) {
        websocket.onopen = function(evevt) {
            console.log("Connected to WebSocket server.")
        };
        websocket.onmessage = function(event) {
            var msg = JSON.parse(event.data);
            var type = msg.type;
            var umsg = msg.message;
            var uname = msg.name;
            var uhead = msg.head;
            var time = msg.time;
            var reciever = msg.reciever;
            i++;
            if (type == "usermsg") {
                if (uname != null) {
                    var str = '<li class="indB1"></a><div class="indB1A flex"><div class="indB1A-a"><img src="/Public/images/touxiang/' + uhead + '" alt=""></div><div class="indB1A-b">' + '<ul class="flex">' + "<li>" + uname + "</li>" + "<li>" + time + "</li>" + "</ul>" + '<div class="indB1A-b1">' + "<p>" + umsg + "</p>" + "</div>" + "</div>" + "</div>" + "</li>";
                    $(".indB").children("ul").append(str)
                }
            }
            if (type == "admin") {
                if (uname != null) {
                    var str = '<li class="indB2">' + '<div class="indB1A flex">' + '<div class="indB1A-b indB1A-b-a">' + '<ul class="flex">' + "<li>" + time + "</li>" + "<li>" + uname + "</li>" + "</ul>" + '<div class="indB1A-b1 indB1A-b1-a">' + "<p>" + umsg + "</p>" + "</div>" + "</div>" + '<div class="indB1A-a">' + '<img src="/Public/images/touxiang/' + uhead + '" alt="">' + "</div>" + "</div>" + "</li>";
                    $(".indB").children("ul").append(str)
                }
            }
            scrollToLocation()
        };
        function scrollToLocation() {
            var mainContainer = $(".indB"),
            scrollToContainer = mainContainer.find("li:last");
            mainContainer.scrollTop(scrollToContainer.offset().top - mainContainer.offset().top + mainContainer.scrollTop())
        }
        websocket.onerror = function(event) {
            i++;
            console.log("Connected to WebSocket server error")
        };
        websocket.onclose = function(event) {
            i++;
            console.log("websocket Connection Closed. ")
        }
    } else {
        alert("该浏览器不支持web socket")
    }
});