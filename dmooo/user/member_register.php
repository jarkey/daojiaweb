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
            $regtime=date('Y-m-d H:i:s');     //获取当前时间
            $lastlogintime=$regtime;
            $logintimes=1;
			$regip=$_SERVER["REMOTE_ADDR"];   //获取IP
			$sql_info="insert into gplat_member_info (userid,regtime,regip,lastlogintime,logintimes) 
			values ('$userid','$regtime','$regip','$lastlogintime','$logintimes')";
			//var_dump($sql_info);
			$result_info=mysql_query($sql_info)or die(mysql_error());
			$sql_det="insert into gplat_member_detail (userid) values ('$userid')";
			$result_det=mysql_query($sql_det);
			if ($result_info!=0 and $result_det!=0){
				
	/********会员注册赠送积分start************/	 
    $num = $memberPointFree;
	$lognote = "注册会员的赠送积分";
    user_point($userid,$num,$lognote,1);	
	/********会员注册赠送积分end************/				
			
	/******邮件发送********/		  
	if ($_POST['ifMail']==1)
	{
		$password_temp=$_POST['password'];     //获得未加密的密码，发给客户
		$mail_num=5;
		include('../../inc/mail_content.php');				  
		$success=mail_userPass($mail_title,$mail_content,$email,$username);
	}
	/********************/
			
			echo("<script language=javascript>alert('添加成功')</script>"); 
			echo'<meta http-equiv="refresh" content="0; url=member_management.php"/>';
			exit;

			}else{
			
		echo'插入失败';
		}
		}else{
			
		echo'插入失败';
		}
	}else 
	{
		echo'添加失败，两次输入的秘密不一样';
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
        <td colspan="2" class="tdBorder1 titleBg1">添加会员</td>
      </tr>
      <tr>
        <td width="20%" class="tdBorder1"> 用户名： </td>
        <td width="80%" class="tdBorder1">
			<input type="text" name="username" id="username" size="16" class=""  maxlength="20"/> </td>
      </tr>
      <tr>
        <td class="tdBorder1"> 密码： <br />6到16个字符</td>
        <td class="tdBorder1">
        <input type="password" name="password" id="password" maxlength="16" size="20"/> </td>
      </tr>
  	  <tr>
        <td class="tdBorder1"> 确认密码： </td>
        <td class="tdBorder1">
			<input type="password" name="pwdconfirm" size="16"/> 	
		</td>
      </tr>
      <tr>
        <td class="tdBorder1"> 会员组： </td>
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
		<td class="tdBorder1"> 会员模型： </td>
		<td class="tdBorder1"><select name="modelid" id="modelid"  size="1"  >
		<option value="0" >请选择</option>
<option value="10" selected>普通会员</option>
</select></td>
	  </tr>
	  <tr>
        <td class="tdBorder1"> E-mail： </td>
        <td class="tdBorder1">
        <input type="text" name="email" id="email" value="" size="30"  maxlength="50" require="true" /></td>
      </tr>
	  <tr>
	    <td class="tdBorder1">提醒邮件：</td>
	    <td class="tdBorder1"><input name="ifMail" type="checkbox" id="ifMail" value="1">
邮件提醒</td>
    </tr>
    
	<tr>
		<td class="tdBorder1">&nbsp;</td>
      	<td class="tdBorder1">
		<input name="dosubmit" type="submit" class="button1" value=" 添加 ">
	    <input name="reset" type="reset" class="button1" value=" 清除 ">			
        </td>
     </tr>
</table>
</form>
</body>
</html>