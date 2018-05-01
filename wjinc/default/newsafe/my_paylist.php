<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>提现申请</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <script src="js/jquery.min.js"></script>
</head>
<body class="bgf5">
<style>

</style>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>充值记录</div>
    <form class="form">
        <div class="clearfix myp_top">
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
    <div class="myp_table">
        <table class="f24 tc">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>充值金额</th>
                    <th>实际到账</th>
                    <th>充值银行</th>
                    <th>状态</th>
                    <th>成功时间</th>
                    <th>备注</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>25623.00</td>
                    <td>25623.00</td>
                    <td>建行</td>
                    <td>已到账</td>
                    <td>4.24 22:10</td>
                    <td>无</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="js/common.js"></script>
<script type="text/javascript">
    var page = 10;
    var s1 = $(".myp_sel1").val();
    var s2 = $(".myp_sel2").val();
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
        $.post('/index.php/index/getOpenHistoryData/'+page, {data:$(".form").serialize()},function(res){
            var list = res.data.result;
            console.log(list);
            if(list.length>0){
                page += 10;
                var html = '';
                for(var i=0;i<list.length;i++){
                    html+='    <tr>'
                    html+='        <td>01</td>'
                    html+='        <td>25623.00</td>'
                    html+='        <td>25623.00</td>'
                    html+='        <td>建行</td>'
                    html+='        <td>已到账</td>'
                    html+='        <td>4.24 22:10</td>'
                    html+='        <td>无</td>'
                    html+='    </tr>'
                }
            }
            $(".myp_table table tbody").append(html);
        },'json' );
    }
</script>
</body>
</html>
