<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>游戏</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body>
<div class="wrap_box wrap_top">
    <div class="title_top tc"><span class="iconfont icon-gantanhao iconright"></span>游戏大厅</div>
    <ul class="lotter_cont clearfix">
    <?php

	foreach ($this->gameinfo as $key=>$val) {
	    $sql = "select st.id,st.title,st.num,st.enable from ssc_type st where st.id={$val}     ";
	    $result  = $this->getRow($sql);
	    !empty($result)?$tmp[] = $result:'';
	}
	
?>
<?php  if($tmp) foreach($tmp as $key=>$var){ 
        
    ?>

        <li>
            <a class="clearfix rel alink"  data-open="<?=$var['enable']?>" href="javascript:void(0)" data-href="/index.php/index/game/<?=$var['id']?>">
                <img class="fl" src="/wjinc/default/images/index_logo<?=$var['id']?>.jpg">
                <div class="fl lot_left gm_lot_left">
                    <p class=""><?=$var['title']?></p>
                    <div class="f24 col6">每天<span class="mcol"><?=$var['num']?></span>期</div>
                    <div class="f24 col6">单注最高奖金<span class="mcol">￥<?=number_format($this->settings['betMaxZjAmount'],2)?></span></div>
                </div>
                
                <i class="iconfont icon-xiangyoujiantou lot_iconr"></i>
            </a>
        </li>
        <?php } ?>
    </ul>
	<?php $this->display('newinc_footer.php'); ?>
</div>
<script src="/wjinc/default/js/index_home.js"></script>
<script src="/wjinc/default/js/common.js"></script>
</body>
</html>

 