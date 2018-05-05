<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>推广链接</title>
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/style.css">
    <link rel="stylesheet" type="text/css" href="/wjinc/default/css/font.css">
    <script src="/wjinc/default/js/jquery.min.js"></script>
</head>
<body class="bgf5">
<div class="wrap_box">
    <div class="title_top tc"><a href="javascript:history.back(-1)" class="iconfont icon-xiangzuojiantou iconback"></a>推广链接</div>
    <div class="clearfix myp_top dlm_top">
            <div class="myp_btn tc dl_dglink"><a class="fff" href="">添加链接</a></div> 
    </div>
    <div class="table_scroll">
    <div class="myp_table" style="width:800px;">
        <?php
	$sql="select * from {$this->prename}links where uid={$this->user['uid']}";
	
	if($_GET['uid']=$this->user['uid']) unset($_GET['uid']);
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	?>
	<table width="100%" class='table_b'>
	<thead>
		<tr class="table_b_th">
			<td>编号</td>
            <td>类型</td>
			<td>返点</td>
            <td>不定位返点</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
			<td><?=$var['lid']?></td>
			<td><?php if($var['type']){echo'代理';}else{echo '会员';}?></td>
			<td><?=$var['fanDian']?>%</td>
            <td><?=$var['fanDianBdw']?>%</td>
           
			<td><a href="/index.php/teamy/linkUpdate/<?=$var['lid']?>" style="color:#333;" target="modal"  width="350" title="修改注册链接" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">修改</a> | <a href="/index.php/team/getLinkCode/<?=$var['lid']?>" button="取消:defaultCloseModal" modal="true" title="获取链接" width="350" target="modal"  style="color:#333;">获取链接</a> | <a  href="/index.php/team/linkDelete/<?=$var['lid']?>" button="确定删除:dataAddCode" modal="true" title="删除注册链接" width="350" target="modal"  style="color:#333;">删除</a> </td>
           
		</tr>
	<?php } ?>
	</tbody>
    </div>
    </div>
</div>

<script src="/wjinc/default/js/common.js"></script>
<script type="text/javascript">
    
</script>
</body>
</html>
