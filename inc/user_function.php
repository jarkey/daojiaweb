<?php 
  /**********�����û�id��������Ŀ�����ɣ����ͣ��ʽ����or�˻����ʽ����Ϊ1���ʻ�Ϊ2��*************/
	function user_point($userid='',$num='',$lognote='',$logindex=''){
		
		date_default_timezone_set('Asia/Shanghai');
        $times=date('Y:m:d H:i:s');
		if ($logindex==2)
		{
			$sql_str='amount = amount + '.$num;          //��Ա�ʻ�����
		}else {
			$sql_str='point = point + '.$num;            //��Ա���ָ���
		}
		$sql="update gplat_member set $sql_str where userid=".$userid;
		$result=mysql_query($sql);
		if ($result ==true)
		{
			$sql_log="insert into gplat_member_log (logNum,logIndex,logNote,userid,times) values ('$num','$logindex','$lognote','$userid','$times')";
			$result_log=mysql_query($sql_log);
		}
	}
	
//��ȡ��Ա���µĻ��ֺ��ʻ�
  function readUserNewData($userid='')
  {
	$sql="select * from gplat_member where userid=".$userid;
    $result=mysql_query($sql);
    $data=mysql_fetch_assoc($result);
	$_SESSION['point']=$data['point'];
	$_SESSION['amount']=$data['amount'];
  }

/*
���ܣ�ͨ��������ϸ�����㵱ǰ��Ա�����»��ֻ��������ʻ�
ʹ�ã�userCurrentPoint($logIndex,$userid)
      ������ֵ���ͣ�ͳ�ƻ��ֻ����ʻ�  $logIndex- 1,����;2,�ʻ�
�޸ģ�2010-01-08 12:32
���ߣ��ո����� ������
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
���ܣ��ж��Ƿ����Ƽ��ˣ���¼�Ƽ���userid��cookie������ʱ��24Сʱ
ʹ�ã�userRecommendAdd()
������2010-01-10 14:30
�޸ģ�
���ߣ��ո�����
*/
function userRecommendAdd(){
	//��¼�Ƽ��˵�id��cookieֵ24Сʱ����
	if(!isset($_COOKIE["u"])){
	  if($_GET["u"]<>''){
		  setcookie("u",$_GET["u"], time()+3600*24);   //24Сʱ����
		  echo '<script>window.location.reload(true);</script>';   //ˢ�£���cookie��Ч
	  }
	}
}

/*
���ܣ�ע��ɹ�������Ƽ���userid��cookie
ʹ�ã�userRecommendClear()
������2010-01-10 14:31
�޸ģ�
���ߣ��ո�����
*/
function userRecommendClear(){
	//�ж��Ƿ����Ƽ�ע��״̬��ע��ɹ���ȥ���Ƽ���cookieֵ
	if($_GET['u']=='yes'){
	  setcookie("u","",time()-3600);
	  echo '<script>window.location.href="user_modifyData.php";</script>';
	}
}
?>