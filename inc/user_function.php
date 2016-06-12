<?php 
  /**********传入用户id，增加数目，事由，类型（资金点数or账户，资金点数为1，帐户为2）*************/
	function user_point($userid='',$num='',$lognote='',$logindex=''){
		
		date_default_timezone_set('Asia/Shanghai');
        $times=date('Y:m:d H:i:s');
		if ($logindex==2)
		{
			$sql_str='amount = amount + '.$num;          //会员帐户更新
		}else {
			$sql_str='point = point + '.$num;            //会员积分更新
		}
		$sql="update gplat_member set $sql_str where userid=".$userid;
		$result=mysql_query($sql);
		if ($result ==true)
		{
			$sql_log="insert into gplat_member_log (logNum,logIndex,logNote,userid,times) values ('$num','$logindex','$lognote','$userid','$times')";
			$result_log=mysql_query($sql_log);
		}
	}
	
//读取会员最新的积分和帐户
  function readUserNewData($userid='')
  {
	$sql="select * from gplat_member where userid=".$userid;
    $result=mysql_query($sql);
    $data=mysql_fetch_assoc($result);
	$_SESSION['point']=$data['point'];
	$_SESSION['amount']=$data['amount'];
  }

/*
功能：通过积分明细，计算当前会员的最新积分或者最新帐户
使用：userCurrentPoint($logIndex,$userid)
      根据数值类型，统计积分或者帐户  $logIndex- 1,积分;2,帐户
修改：2010-01-08 12:32
作者：苏格拉底 文明人
*/
function userCurrentPoint($logIndex,$userId)
{
  $sql_str="select sum(logNum) as currentPoint from gplat_member_log where logIndex=$logIndex and userid=$userId";
  $result_str=mysql_query($sql_str);
  $userPoint=mysql_fetch_assoc($result_str);
  $userCurrentData=$userPoint['currentPoint'];
  if($userCurrentData=='') $userCurrentData=0;
  return $userCurrentData;
}

/*
功能：判断是否有推荐人，记录推荐人userid的cookie，保存时间24小时
使用：userRecommendAdd()
创建：2010-01-10 14:30
修改：
作者：苏格拉底
*/
function userRecommendAdd(){
	//记录推荐人的id，cookie值24小时到期
	if(!isset($_COOKIE["u"])){
	  if($_GET["u"]<>''){
		  setcookie("u",$_GET["u"], time()+3600*24);   //24小时到期
		  echo '<script>window.location.reload(true);</script>';   //刷新，让cookie生效
	  }
	}
}

/*
功能：注册成功后，清除推荐人userid的cookie
使用：userRecommendClear()
创建：2010-01-10 14:31
修改：
作者：苏格拉底
*/
function userRecommendClear(){
	//判断是否处于推荐注册状态，注册成功后，去除推荐人cookie值
	if($_GET['u']=='yes'){
	  setcookie("u","",time()-3600);
	  echo '<script>window.location.href="user_modifyData.php";</script>';
	}
}
?>