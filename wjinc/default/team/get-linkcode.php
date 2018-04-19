<?php 

	$sql="select * from {$this->prename}links where lid=?";
	$linkData=$this->getRow($sql, $args[0]);
	
	if($linkData['uid']){
		$parentData=$this->getRow("select fanDian, fanDianBdw, username from {$this->prename}members where uid=?", $linkData['uid']);
	}else{
		$this->getSystemSettings();
		$parentData['fanDian']=$this->settings['fanDianMax'];
		$parentData['fanDianBdw']=$this->settings['fanDianBdwMax'];
	}


	include_once $_SERVER['DOCUMENT_ROOT'].'/lib/classes/Xxtea.class';
	$key=Xxtea::encrypt($args[0].",".$args[1], $args[2]);
	$key=base64_encode($key);
	$key=str_replace(array('+','/','='), array('-','*',''), $key);
	
?><div>

	<table cellpadding="2" cellspacing="2" class="popupModal">
		
         <tr>
        	<td class="title">上级会员：</td>
			<td><?=$parentData['username']?></td>
        </tr>
		<tr>
			<td class="title">返点：</td>
			<td><input type="text" name="fanDian" value="<?=$linkData['fanDian']?>" max="<?=$parentData['fanDian']?>" min="0" fanDianDiff=<?=$this->settings['fanDianDiff']?> >%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDian']?>%</span></td>
		</tr>
		<tr>
			<td class="title">不定返点：</td>
			<td><input type="text" name="fanDianBdw" value="<?=$linkData['fanDianBdw']?>" max="<?=$parentData['fanDianBdw']?>" min="0"/>%&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#999">0—<?=$parentData['fanDianBdw']?>%</span></td>
		</tr>

        <tr>
        	<td class="title">注册推广链接：</td>
			<td><input class="t-c t-c-w1" id="adv-url" readonly="readonly" value="http://<?=$_SERVER['HTTP_HOST']?>/index.php/user/r/<?=$key?>"  /></td>
        </tr>
        <tr>
        	<td class="title">&nbsp;</td>
			<td><div class="btn-a copy1"><span style="font-size:0.6rem;font-weight: bold; cursor: pointer;background: #fff;border: 1px solid blue;" id="clip_button" onClick="copyNum()">点击复制</span></div></td>
        </tr>
        
	</table>

</div>
