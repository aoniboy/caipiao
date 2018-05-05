<?php 
	$sql="select * from {$this->prename}links where lid=?";
	$linkData=$this->getRow($sql, $this->id);
	
	if($linkData['uid']){
		$parentData=$this->getRow("select fanDian, fanDianBdw from {$this->prename}members where uid=?", $linkData['uid']);
	}else{
		$this->getSystemSettings();
		$parentData['fanDian']=$this->settings['fanDianMax'];
		$parentData['fanDianBdw']=$this->settings['fanDianBdwMax'];
	}

?>
<div>
<form action="/index.php/team/linkUpdateed" target="ajax" method="post" call="linkDataSubmitCode" onajax="linkDataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="lid" value="<?=$args[0]?>"/>
    <ul class="myi_list dla_list">
        <li class="clearfix">
            <div class="fl myw ">返点：</div>
            <input class="col67 fl i5"  type="text" name="fanDian" value="<?=$linkData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="0" fanDianDiff=<?=$this->settings['fanDianDiff']?> >
            <span class="">0—<?=$parentData['fanDian']?>%</span>
        </li>
        <li class="clearfix">
            <div class="fl myw ">不定位返点：</div>
            <input class="col67 fl i6" name="fanDianBdw" value="<?=$linkData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="0">
            <span class="fl">0—<?=$parentData['fanDianBdw']?>%</span>
        </li>
        <li class="clearfix">
            <div class="fl myw ">加入时间</div>
            <input  class="col67 fl" readonly value="<?=date("Y-m-d H:i:s",$linkData['regTime'])?>">
        </li>
    </ul>
</form>
</div>