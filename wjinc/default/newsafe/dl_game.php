<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>游戏记录</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/js/calendar/LCalendar.css">
    <script src="/wjinc/default/js/calendar/LCalendar.js"></script>
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>游戏记录</div>

    <div class="clearfix myp_top dl_gametop">
        <form class="dl_form">
            <div class="clearfix">
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel1" name="type">
                        <option value="0">全部彩种</option>
                        <option value="1">会员</option>
                        <option value="14">幸运300秒</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel2" name="state">
                        <option value="0">所有状态</option>
                        <option value="1">已派奖</option>
                        <option value="2">未中奖</option>
                        <option value="3">未开奖</option>
                        <option value="4">追号</option>
                        <option value="5">撤单</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel1">
                        <option value="-1">全部模式</option>
                        <option value="2.00">元</option>
                        <option value="0.20">角</option>
                        <option value="0.02">分</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel2" name="mode">
                        <option value="0">所有人</option>
                        <option value="1">我自己</option>
                        <option value="2">直属下线</option>
                        <option value="2">所有下线</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
            </div>
            <div class="clearfix dlg_input">
                <input class="fr dlg_idan" type="text" name="betId" placeholder="输入单号">
            </div>
            <div class="clearfix myp_top dl_gametop_1">
                <div class="rel fl myp_top_l ">
                    <input class="my_calendar" type="text" name="fromTime" id="start_date" placeholder="选择开始日期" readonly="readonly">
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="fl myp_zhi">至</div>
                <div class="rel fl myp_top_l ">
                    <input class="my_calendar" type="text" name="toTime" id="end_date" placeholder="选择开始日期" readonly="readonly">
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="myp_btn fr">查询</div>
            </div>
        </form>
    </div>
    <div class="myp_table">
        <table class="f24 tc">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>用户</th>
                    <th>投注时间</th>
                    <th>彩种</th>
                    <th>期号</th>
                    <th>玩法</th>
                    <th>倍数模式</th>
                    <th>总额(元)</th>
                    <th>奖金(元)</th>
                    <th>开奖号码</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>  
                </tr>
            </tbody>
        </table>
    </div>
 
</div>

<script src="/wjinc/default/js/common.js"></script>

<script type="text/javascript">

    var calendar = new LCalendar();
    calendar.init({
        'trigger': '#start_date', 
        'type': 'date', 
        'minDate': (new Date().getFullYear()-20) + '-' + 1 + '-' + 1, 
        'maxDate': (new Date().getFullYear()) + '-' + 12 + '-' + 31 
    });
    var calendar = new LCalendar();
    calendar.init({
        'trigger': '#end_date',
        'type': 'date', 
        'minDate': (new Date().getFullYear()-20) + '-' + 1 + '-' + 1, 
        'maxDate': (new Date().getFullYear()) + '-' + 12 + '-' + 31
    });

    var page = 10;
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop()
        var scrollHeight = $(document).height()
        var windowHeight = $(this).height()
        if(windowHeight + scrollTop >= scrollHeight){
            upload();
        }

    })
    $(".myp_btn").on('click',function(){
        s1 = $(".myp_sel1").val();
        s2 = $(".myp_sel2").val();
        console.log(s1,s2)
        console.log($(".dl_form").serialize());
        upload();
    })
    function upload(){
        $.post('/index.php/team/searchGameRecord/'+page,{data:$(".dl_form").serialize()}, function(res){
            console.log(res);
            var list = res.data.result;
            console.log(list);
            if(list.length>0){
                page += 10;
                var html = '';
                for(var i=0;i<list.length;i++){
                    html+='    <td>1</td>'
                    html+='    <td>2</td>'
                    html+='    <td>3</td>'
                    html+='    <td>4</td>'
                    html+='    <td>5</td>'
                    html+='    <td>6</td>'
                    html+='    <td>7</td>'
                    html+='    <td>8</td>'
                    html+='    <td>9</td>'
                    html+='    <td>10</td>'
                    html+='    <td>11</td>'
                    html+='    <td>12</td>'
                }
            }
            $(".myp_table table tbody").append(html);
        },'json' );
    }
</script>
</body>
</html>
