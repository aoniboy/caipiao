<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>游戏记录</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font.css">
    <script src="js/jquery.min.js"></script>
</head>
<body class="bgf5">
<style>
</style>
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>游戏记录</div>

    <div class="clearfix myp_top dl_gametop">
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
            </div>
            <div class="clearfix dlg_input">
                <input class="fl dlg_iname" type="text" name="" placeholder="用户名">
                <input class="fr dlg_idan" type="text" name="" placeholder="输入单号">
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

<script src="js/common.js"></script>
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
