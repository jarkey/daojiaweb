<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');
permissions('user_2_in');
if ($_POST['dosubmit']) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pwdconfirm=$_POST['pwdconfirm'];
	$groupid=$_POST['groupid'];
	$modelid=$_POST['modelid'];
	$email=$_POST['email'];
	//$areaid=$_POST['areaid'];
	//$modelid=0;
	if ($password==$pwdconfirm)
	{
		$password=sha1($password);
		$sql="insert into gplat_member (username,password,groupid,email) 
		values ('$username','$password','$groupid','$email')";
		$result=mysql_query($sql)or die(mysql_error());
		if ($result!=0) {
			$userid=mysql_insert_id();
			date_default_timezone_set('Asia/Shanghai'); 
            $regtime=date('Y-m-d H:i:s');     //��ȡ��ǰʱ��
            $lastlogintime=$regtime;
            $logintimes=1;
			$regip=$_SERVER["REMOTE_ADDR"];   //��ȡIP
			$sql_info="insert into gplat_member_info (userid,regtime,regip,lastlogintime,logintimes) 
			values ('$userid','$regtime','$regip','$lastlogintime','$logintimes')";
			//var_dump($sql_info);
			$result_info=mysql_query($sql_info)or die(mysql_error());
			$sql_det="insert into gplat_member_detail (userid) values ('$userid')";
			$result_det=mysql_query($sql_det);
			if ($result_info!=0 and $result_det!=0){
				
	/********��Աע�����ͻ���start************/	 
    $num = $memberPointFree;
	$lognote = "ע���Ա�����ͻ���";
    user_point($userid,$num,$lognote,1);	
	/********��Աע�����ͻ���end************/				
			
	/******�ʼ�����********/		  
	if ($_POST['ifMail']==1)
	{
		$password_temp=$_POST['password'];     //���δ���ܵ����룬�����ͻ�
		$mail_num=5;
		include('../../inc/mail_content.php');				  
		$success=mail_userPass($mail_title,$mail_content,$email,$username);
	}
	/********************/
			
			echo("<script language=javascript>alert('��ӳɹ�')</script>"); 
			echo'<meta http-equiv="refresh" content="0; url=member_management.php"/>';
			exit;

			}else{
			
		echo'����ʧ��';
		}
		}else{
			
		echo'����ʧ��';
		}
	}else 
	{
		echo'���ʧ�ܣ�������������ܲ�һ��';
	}
}
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<form name="myform" method="post" action="">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
      <tr>
        <td colspan="2" class="tdBorder1 titleBg1">��ӻ�Ա</td>
      </tr>
      <tr>
        <td width="20%" class="tdBorder1"> �û����� </td>
        <td width="80%" class="tdBorder1">
			<input type="text" name="username" id="username" size="16" class=""  maxlength="20"/> </td>
      </tr>
      <tr>
        <td class="tdBorder1"> ���룺 <br />6��16���ַ�</td>
        <td class="tdBorder1">
        <input type="password" name="password" id="password" maxlength="16" size="20"/> </td>
      </tr>
  	  <tr>
        <td class="tdBorder1"> ȷ�����룺 </td>
        <td class="tdBorder1">
			<input type="password" name="pwdconfirm" size="16"/> 	
		</td>
      </tr>
      <tr>
        <td class="tdBorder1"> ��Ա�飺 </td>
        <td class="tdBorder1"><select name="groupid" >
     <?php
     $sql_roup="select groupid,name from gplat_member_group order by groupid asc";
     $result_roup=mysql_query($sql_roup);
     while ($date=mysql_fetch_assoc($result_roup)) {
     	?>
     	<option value="<?=$date['groupid']?>" <?php if ($date['groupid']==3) echo "selected"; ?>><?=$date['name']?></option>
     	<?php
     }
     ?>
</select></td>
      </tr>
	  <tr style="display:none;">
		<td class="tdBorder1"> ��Աģ�ͣ� </td>
		<td class="tdBorder1"><select name="modelid" id="modelid"  size="1"  >
		<option value="0" >��ѡ��</option>
<option value="10" selected>��ͨ��Ա</option>
</select></td>
	  </tr>
	  <tr>
        <td class="tdBorder1"> E-mail�� </td>
        <td class="tdBorder1">
        <input type="text" name="email" id="email" value="" size="30"  maxlength="50" require="true" /></td>
      </tr>
	  <tr>
	    <td class="tdBorder1">�����ʼ���</td>
	    <td class="tdBorder1"><input name="ifMail" type="checkbox" id="ifMail" value="1">
�ʼ�����</td>
    </tr>
    
	<tr>
		<td class="tdBorder1">&nbsp;</td>
      	<td class="tdBorder1">
		<input name="dosubmit" type="submit" class="button1" value=" ��� ">
	    <input name="reset" type="reset" class="button1" value=" ��� ">			
        </td>
     </tr>
</table>
</form>
</body>
</html>