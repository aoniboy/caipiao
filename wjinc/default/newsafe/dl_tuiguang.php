<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>推广链接</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <script src="js/jquery.min.js"></script>
</head>
<body class="bgf5">
<style>

</style>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>推广链接</div>
    <div class="clearfix myp_top dlm_top">
            <div class="myp_btn tc dl_dglink"><a class="fff" href="">添加链接</a></div> 
    </div>
    <div class="myp_table">
        <table class="f24 tc">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>类型</th>
                    <th>返点</th>
                    <th>不定点返点</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>

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
                    html+='        <td>1</td>'
                    html+='        <td>2</td>'
                    html+='        <td>3</td>'
                    html+='        <td>4</td>'
                    html+='        <td>5</td>'
                    html+='        <td>6</td>'
                    html+='    </tr>'
                }
            }
            $(".myp_table table tbody").append(html);
        },'json' );
    }
</script>
</body>
</html>
