<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>开奖</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap_box wrap_top">
    <div class="title_top tc">开奖</div>
    <ul class="lotter_cont clearfix">
    <?php

	foreach ($this->gameinfo as $key=>$val) {
	    $sql = "select sd.type, sd.time, sd.number, sd.data,st.title from ssc_data sd,ssc_type st where sd.type = {$val} and st.id={$val}  order by sd.id desc   ";
	    $result  = $this->getRow($sql);
	    !empty($result)?$tmp[] = $result:'';
	}
	
?>
<?php if($tmp) foreach($tmp as $key=>$var){ 
        $tmp[$key]['tdata'] = explode(",", $var['data']);
        $tnumber = '';
        foreach($tmp[$key]['tdata'] as $k=>$v) {
            $tnumber .= "<span>$v</span>";
        }
    ?>
        <li>
            <a class="clearfix rel" href="/index.php/index/openListDetail/<?=$var['type']?>">
                <img class="fl" src="/wjinc/default/images/index_logo<?=$var['type']?>.jpg">
                <div class="fl lot_left">
                    <p class=""><?=$var['title']?><span class="f20 col9">第<?=$var['number']?>期 <?=date("H时:i分",$var['time'])?>开奖</span></p>
                    <div class="lot_num"><?=$tnumber?></div>
                </div>
                
                <i class="iconfont icon-xiangyoujiantou lot_iconr"></i>
            </a>
        </li>
        <?php } ?>
    </ul>
	<?php $this->display('newinc_footer.php'); ?>
</div>


</body>
</html>

 
