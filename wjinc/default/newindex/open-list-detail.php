<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>开奖详情页</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap_box wrap_top">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a><?=$this->typename?></div>
    <ul class="lotter_dcont clearfix">
    	<?php  if($this->result) foreach($this->result as $key=>$var){ 
        $data = explode(",", $var['data']);
        $tnumber = '';
        foreach($data as $k=>$v) {
            $tnumber .= "<span>$v</span>";
        }
    ?>
        <li>
            <div class="clearfix"><p class="fl">第<?=$var['number']?>期</p><span class="fr f24 col9"><?=date("H时:i分",$var['time'])?>开奖</span></div>
            <div class="lot_num"><?=$tnumber?></div>
        </li>
        <?php } ?>
        
    </ul>
	<?php $this->display('newinc_footer.php'); ?>
</div>
<script>
var type = '<?=$this->type?>'
    
    var page = 10;
    var is_false =false;
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop()
        var scrollHeight = $(document).height()
        var windowHeight = $(this).height()
        if(windowHeight + scrollTop >= scrollHeight){
            $.post('/index.php/index/getOpenHistoryData/'+type+'/'+page, function(res){
                var list = res.data.result;
                if(list.length>0){
                    page += 10;
         
                    var html = '';
                    for(var i=0;i<list.length;i++){
                        html+='    <li>'
                        html+='        <div class="clearfix"><p class="fl">第'+list[i].number+'期</p><span class="fr f24 col9">'+list[i].time+'开奖</spa></div>'
                        html+='        <div class="lot_num">'+list[i].tnumber+'</div>'
                        html+='    </li>'
                    }
                }
                $(".lotter_dcont").append(html);
            },'json' );
        }

    })
</script>
</body>
</html>

 