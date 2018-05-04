<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>帐变记录</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/js/calendar/LCalendar.css">
    <script src="/wjinc/default/js/calendar/LCalendar.js"></script>
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>帐变记录</div>

    <div class="clearfix myp_top dl_gametop">
        <form class="dl_form">
            <div class="clearfix">
                <div class="rel fl myp_top_l ">
                   <select name="liqType">
                    <option value="">所有帐变类型</option>
                    <option value="1">账户充值</option>
                    <option value="2">游戏返点</option>
                    <option value="6">奖金派送</option>
                    <option value="7">撤单返款</option>
                    <option value="106">账户提现</option>
                    <option value="8">提现失败</option>
                    <option value="107">提现成功</option>
                    <option value="9">系统充值</option>
                    <option value="51">活动礼金</option>
                    <option value="53">消费佣金</option>
                    <option value="101">投注扣款</option>
                    <option value="102">追号扣款</option>
                </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                
            </div>
            
            <div class="clearfix myp_top dl_gametop_1">
                <div class="rel fl myp_top_l ">
                    <input class="my_calendar" type="text" name="fromTime" id="start_date" placeholder="选择开始日期" readonly="readonly" value="<?=date("Y-m-d")?>">
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="fl myp_zhi">至</div>
                <div class="rel fl myp_top_l ">
                    <input class="my_calendar" type="text" name="toTime" id="end_date" placeholder="选择结束日期" readonly="readonly" value="<?=date("Y-m-d",strtotime("+1 days"))?>">
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="myp_btn fr">查询</div>
            </div>
        </form>
    </div>
    <div class="detail_pop hide">
        <div class="gameo_mask"></div>
        <div class="detail_box">
            <div class="detail_top f33">投注信息 </div>
            <div class="detail_table tc" style="" scrolltop="0" scrollleft="0">
                
            </div>
            <div class="">
                <div class="detail_btn tc">
                    <button type="button" style="border:none; border-radius:5px;padding:.1rem .5rem" class="detail_close f26">关闭</button>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="table_scroll">
            <div class="myp_table" style="width:1000px">
                
            </div>
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
            //upload();
        }

    })
    upload();
    $(".myp_btn").on('click',function(){
        upload();
    })
    function upload(){
        $.post('/index.php/team/searchCoin/?'+$(".dl_form").serialize(), function(res){
            $(".myp_table").html(res.data);
        },'json' );
    }
</script>
</body>
</html>
