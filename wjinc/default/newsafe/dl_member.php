<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>会员管理</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <script src="js/jquery.min.js"></script>
</head>
<body class="bgf5">
<style>
</style>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>会员管理</div>
    <div class="clearfix myp_top dlm_top">
        <form class="dl_form">
            <div class="clearfix">
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel1">
                        <option value="-1">会员类型</option>
                        <option value="0">会员</option>
                        <option value="1">代理</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <div class="rel fl myp_top_l ">
                    <select class="myp_sel2">
                        <option value="0">所有人</option>
                        <option value="1">我自己</option>
                        <option value="2">直属下线</option>
                        <option value="2">所有下线</option>
                    </select>
                    <i class="iconfont icon-xialajiantou myp_topicon"></i>
                </div>
                <input class="dlm_input fr myp_sel3" type="text" value="" name="username" placeholder="用户名">    
            </div>
        </form>
        <div class="clearfix flex dlm_btns tc fff">
            <a class="dlm_link dlm_btn fx fff" href="">添加会员</a>
            <div class="dlm_btn fx dlm_btn_js">查询</div>
            
        </div>
        <!-- <div class="myp_btn fr">查询</div> -->
    </div>
    <div class="myp_table">
        <table class="f24 tc">
            <thead>
                <tr>
                    <th>用户名</th>
                    <th>用户类型</th>
                    <th>反点</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>会员</td>
                    <td>0.00%</td>
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
    var s3 = $(".myp_sel3").val();
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
                    html+='    <tr>'
                    html+='        <td>001</td>'
                    html+='        <td>会员</td>'
                    html+='        <td>0.00%</td>'
                    html+='    </tr>'
                }
            }
            $(".myp_table table tbody").append(html);
        },'json' );
    }
</script>
</body>
</html>
