<?php 
  /**********�����û�id��������Ŀ�����ɣ����ͣ��ʽ����or�˻����ʽ����Ϊ1���ʻ�Ϊ2��*************/
	function user_point($userid='',$num='',$lognote='',$logindex=''){
		
		date_default_timezone_set('Asia/Shanghai');
        $times=date('Y:m:d H:i:s');
		if ($logindex==2) {
			$sql_str='amount = amount + '.$num;
		}else { $sql_str='point = point + '.$num; }
		$sql="update gplat_member set $sql_str where userid=".$userid;
		$result=mysql_query($sql);
		if ($result ==true){
			$sql_log="insert into gplat_member_log (logNum,logIndex,logNote,userid,times) values ('$num','$logindex','$lognote','$userid','$times')";
			$result_log=mysql_query($sql_log);
		echo '<script>alert("�����ɹ�!");top.lower_right.location.reload(true);window.close();</script>';

		}
	}
?>