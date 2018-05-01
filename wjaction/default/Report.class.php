<?php
class Report extends WebLoginBase{
	public $type;
	public $pageSize=20;
	
	// 帐变列表
	public final function coin($type=0){
		$this->type=intval($type);
		$this->action='coinlog';
		$this->display('newsafe/my_zhangbian.php');
	}
	
	public final function coinlog($type=0){
		$this->type=intval($type);
		$this->display('report/coin-log.php');
	}

	// 总结算查询
	public final function count(){
		$this->action='countSearch';
		$this->display('newsafe/my_yingkui.php');
	}
	
	public final function countSearch(){
		$this->display('report/count-list.php');
	}
}
