<?php
class Index extends WebLoginBase{
	public $pageSize=10;
	
	public final function game($type=null, $groupId=null, $played=null){
		if($type) $this->type=intval($type);
		if($groupId){
			$this->groupId=intval($groupId);
		}else{
			// 默认进入三星玩法
			$this->groupId=6;
		}
		if($played) $this->played=intval($played);
		$this->getSystemSettings();	
		$this->display('newmain.php');
	}
	
  //平台首页
	public final function main(){
		$this->display('newindex.php');
	}
	public final function more(){
	    $this->display('index.php');
	}
	public final function index1(){		
		$this->display('index.php');
	}
	public final function znz($type=null, $groupId=null, $played=null){
		if($type) $this->type=intval($type);
		if($groupId) $this->groupId=intval($groupId);
		if($played) $this->played=intval($played);
		
		$this->getTypes();
		$this->getPlayeds();
		$this->display('index/inc_game_znz.php');
	}
	
	public final function group($type, $groupId){
		$this->type=intval($type);
		$this->groupId=intval($groupId);
		$this->display('index/load_tab_group.php');
	}
	
	public final function played($type,$playedId){
		$playedId=intval($playedId);
		$sql="select type, groupId, playedTpl from {$this->prename}played where id=?";
		$data=$this->getRow($sql, $playedId);
		$this->type=intval($type);
		if($data['playedTpl']){
			$this->groupId=$data['groupId'];
			$this->played=$playedId;
			$this->display("index/game-played/{$data['playedTpl']}.php");
		}else{
			$this->display('index/game-played/un-open.php');
		}
	}
	
	public final function playedType($type,$playedId){
	    header('Access-Control-Allow-Origin:*');
	    $sql="select id from {$this->prename}played_group where type=? and enable = 1 order by sort";
	    $data=$this->getRows($sql, $type);
	    $result = [];
	    foreach($data as $key=>$val) {
	        $sql="select id,name,groupId from {$this->prename}played where  groupId= ? and enable = 1";
	        $tmp=$this->getRows($sql, $val['id']);
	        foreach($tmp as $k=>$v) {
	            $result[] = $v;
	        }
	    }
	    
	    
	    foreach ($result as $key=>$val) {
	        switch ($val['id']) {
	            case '10':
	                $result[$key]['position'] = ['万位','千位','百位'];
	                break;
	            case '11':
	                $result[$key]['position'] = [];
	                break;
	            case '12':
                    $result[$key]['position'] = ['百位','十位','个位'];
                    break;
                case '13':
                    $result[$key]['position'] = [];
                    break;
                case '16':
                    $result[$key]['position'] = [1];
                    break;
                case '17':
                    $result[$key]['position'] = [2];
                    break;
                case '19':
                    $result[$key]['position'] = [1];
                    break;
                case '20':
                    $result[$key]['position'] = [2];
                    break;
                case '25':
                    $result[$key]['position'] = ['万位','千位'];
                    break;
                case '26':
                    $result[$key]['position'] = [];
                    break;
                case '27':
                    $result[$key]['position'] = ['十位','个位'];
                    break;
                case '28':
                    $result[$key]['position'] = [];
                    break;
                case '31':
                    $result[$key]['position'] = [1];
                    break;
                case '33':
                    $result[$key]['position'] = [1];
                    break;
                case '37':
                    $result[$key]['position'] = ['万位','千位','百位','十位','个位'];
                    break;
		default:
		   break;
	        }
	    }
	    
	    $data = ['code'=>0,'data'=>$result,'msg'=>'操作成功'];
	    echo json_encode($data);
	    exit;
	    
	}
	
	// 加载玩法介绍信息
	public final function playTips($playedId){
		$this->display('index/inc_game_tips.php', 0, intval($playedId));
	}
	
	public final function getQiHao($type){
		$thisNo=$this->getGameNo($type);
		return array(
			'lastNo'=>$this->getGameLastNo($type),
			'thisNo'=>$this->getGameNo($type),
			'diffTime'=>strtotime($thisNo['actionTime'])-$this->time,
			'validTime'=>$thisNo['actionTime'],
			'kjdTime'=>$this->getTypeFtime($type)
		);
	}
	
	// 弹出追号层HTML
	public final function zhuiHaoModal($type){
		$this->display('index/game-zhuihao-modal.php');
	}
	
	// 追号层加载期号
	public final function zhuiHaoQs($type, $mode, $count){
		$this->type=intval($type);
		$this->display('index/game-zhuihao-qs.php', 0, $mode, $count);
	}
	
	// 加载历史开奖数据
	public final function getHistoryData($type){
		$this->type=intval($type);
		$this->display('index/inc_data_history.php');
	}

	// 历史开奖HTML
	public final function historyList($type){
	    $this->type=intval($type);
		$this->display('index/history-list.php',$pageSize,$type);
	}
	
	//全部彩种开奖页面
	public final function openList($type){
	    $this->type=intval($type);
	    $this->display('newindex/open-list.php',$pageSize,$type);
	}
	//new彩种开奖详情页面
	public final function openListDetail($type){
	    $this->type=intval($type);
	    $this->display('newindex/open-list-detail.php',$type);
	}
	
	// new加载历史开奖数据
	public final function getOpenHistoryData($type){
	    $this->type=intval($type);
	    $this->display('index/inc_data_history.php');
	}
	
	public final function getLastKjData($type){
		$ykMoney=0;
		$czName='重庆时时彩';
		$this->type=intval($type);
		if(!$lastNo=$this->getGameLastNo($this->type)) throw new Exception('查找最后开奖期号出错');
		if(!$lastNo['data']=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'"))
		throw new Exception('获取数据出错');
		
		$thisNo=$this->getGameNo($this->type);
		$lastNo['actionName']=$czName;
		$lastNo['thisNo']=$thisNo['actionNo'];
		$lastNo['diffTime']=strtotime($thisNo['actionTime'])-$this->time;
		$lastNo['kjdTime']=$this->getTypeFtime($type);
		return $lastNo;
	}
	
	// 加载人员信息框
	public final function userInfo(){
		$this->display('index/inc_user.php');
	}

	// 加载历史开奖数据
	public final function getHistoryDataLeft($type){
		$this->type=intval($type);
		$this->display('index/inc_data_history_left.php');
	}

}
