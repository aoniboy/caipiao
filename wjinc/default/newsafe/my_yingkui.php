<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>盈亏报表</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>盈亏报表</div>

    <div class="clearfix myp_top dl_gametop">
        <form class="dl_form">
            <div class="clearfix dlg_input dlg_input_y">
                <input class="fl dlg_iname" type="text" name="" placeholder="用户名">
            </div>
            <div class="clearfix myp_top dl_gametop_1">
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel1">
                        <option value="2018424">2018年4月24</option>
                        <option value="2018424">2018年4月24</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="fl myp_zhi">至</div>
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel2">
                        <option value="2018424">2018年4月24</option>
                        <option value="2018424">2018年4月24</option>
                    </select>
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
                    <th>用户名</th>
                    <th>充值总额</th>
                    <th>提现总额</th>
                    <th>投注总额</th>
                    <th>中奖总额</th>
                    <th>总返点</th>
                    <th>佣金</th>
                    <th>总盈亏</th>
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
                </tr>
            </tbody>
        </table>
    </div>
    
</div>

<script src="/wjinc/default/js/common.js"></script>
<script type="text/javascript">
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
        upload();
    })
    function upload(){
        $.post('/index.php/team/searchMember/'+page,{data:$(".dl_form").serialize()}, function(res){
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
                }
            }
            $(".myp_table table tbody").append(html);
        },'json' );
    }
</script>
</body>
</html>