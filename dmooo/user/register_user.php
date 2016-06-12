<?php
include_once('../inc/config.inc.php');
permissions('user_2_up');
$userId=$_GET['userId'];
if ($_POST['dosubmit']) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$pwdconfirm=$_POST['pwdconfirm'];
	$groupid=$_POST['groupid'];
	$modelid=$_POST['modelid'];
	$email=$_POST['email'];
	$areaid=$_POST['areaid'];
	
	$truename=$_POST['truename'];
	$gender=$_POST['gender'];
	
	$birthday=$_POST['birthday'];
	$phone=$_POST['phone'];
	$telephone=$_POST['telephone'];
	$qq=$_POST['qq'];
	$msn=$_POST['msn'];
	$address=$_POST['address'];
	$postcode=$_POST['postcode'];
	
	//$modelid=0;
	if ($password==$pwdconfirm)
	{
		$password=sha1($password);
		$sql="update gplat_member set username='$username',password='$password',groupid='$groupid',
		email='$email',areaid='$areaid',phone='$phone' where userid='$userId'";
		$result=mysql_query($sql)or die(mysql_error());
		if ($result!=0) {
			$userid=mysql_insert_id();
			
           $lastlogintime=$regtime;
            $logintimes=1;
			$regip=$_SERVER["REMOTE_ADDR"];   //获取IP
			$sql_info="update gplat_member_detail set truename='$truename',gender='$gender',birthday='$birthday',mobile='$mobile',
		 telephone='$telephone',qq='$qq',msn='$msn',address='$address',postcode='$postcode' where userid='$userId'";
			//var_dump($sql_info);
			$result_info=mysql_query($sql_info)or die(mysql_error());
			if ($result_info!=0){
            echo '<script>alert("恭喜您，修改成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';				
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
/******读取数据**********/
$sql_user="select a.*,b.*,c.* from gplat_member a,gplat_member_detail b,gplat_member_info c where a.userid=b.userid and a.userid=c.userid  and a.userid='$userId'";
//echo $sql_user;
$result_user=mysql_query($sql_user);
$date_user=mysql_fetch_assoc($result_user)or die(mysql_error());
//echo $date_user['truename'];
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>
<form name="myform" method="post" action="<?=$filename?>?userId=<?=$userId?>">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
      <tr>
        <td class="tdBorder1"> 用户名： </td>
        <td class="tdBorder1">
			<input type="text" name="username" size="16" value="<?=$date_user['username']?>" maxlength="20" readonly/> </td>
        <td class="tdBorder1">真实姓名： </td>
        <td class="tdBorder1"><input type="text" name="truename"  value="<?=$date_user['truename']?>"></td>
      </tr>
      <tr>
        <td class="tdBorder1"> 密码： <br />6到16个字符</td>
        <td class="tdBorder1">
        <input type="password" name="password" id="password" size="16" maxlength="16"/> </td>
        <td class="tdBorder1">确认密码： </td>
        <td class="tdBorder1"><input type="password" name="pwdconfirm" size="16"/></td>
      </tr>
  	  <tr>
        <td class="tdBorder1"> 会员组： </td>
        <td colspan="3" class="tdBorder1"><select name="groupid" >
     <?php
     $_SESSION['url']=$url.'?'.$_SERVER['QUERY_STRING']; //获取当前的页面及后缀
     $sql_roup="select groupid,name from gplat_member_group order by groupid asc";
     $result_roup=mysql_query($sql_roup);
     while ($date=mysql_fetch_assoc($result_roup)) {
     	?>
     	<option value="<?=$date['groupid']?>" 
     	<?php if($date['groupid']==$date_user['groupid'])
     	{
     		echo'selected';
     	}
     	?>
     	><?=$date['name']?></option>
     	<?php
     }
     ?>
</select></td>
      </tr>
	  <tr style="display:none;">
		<td class="tdBorder1"> 会员模型： </td>
		<td colspan="3" class="tdBorder1"><select name="modelid" id="modelid"  size="1"  >
		<option value="0" >请选择</option>
<option value="10" selected>普通会员</option>
</select></td>
	  </tr>
	  <tr>
        <td class="tdBorder1"> E-mail： </td>
        <td class="tdBorder1">
        <input type="text" name="email" id="email" value="<?=$date_user['email']?>" size="30"  maxlength="50" /></td>
        <td class="tdBorder1">地区： </td>
        <td class="tdBorder1"><input type="text" name="areaid" value="<?=$date_user['areaid']?>"></td>
      </tr>
      <tr>
      	<td class="tdBorder1"> 性别： <br /></td>
        <td class="tdBorder1">
       <input type="radio" name="gender" value="0" 
     <?php
     checked ($date_user['gender'],0);
     ?>
     >男
       <input type="radio" name="gender" value="1"
       <?php
     checked ($date_user['gender'],1);
     ?>
       >女
	</td>
        <td class="tdBorder1">生日： </td>
        <td class="tdBorder1"><input type="text" name="birthday" value="<?=$date_user['birthday']?>" ></td>
      </tr>
       <tr>
      	<td class="tdBorder1"> 手机： <br /></td>
        <td class="tdBorder1">
       <input type="text" name="mobile" value="<?=$date_user['mobile']?>">
				 </td>
        <td class="tdBorder1">电话： </td>
        <td class="tdBorder1"><input type="text" name="phone"  value="<?=$date_user['phone']?>"></td>
      </tr>
        <tr>
      	<td class="tdBorder1"> QQ： <br /></td>
        <td class="tdBorder1">
       <input type="text" name="qq" value="<?=$date_user['qq']?>" >
				 </td>
        <td class="tdBorder1">职业： </td>
        <td class="tdBorder1"><input type="text" name="msn"  value="<?=$date_user['msn']?>"></td>
      </tr>
        <tr>
      	<td class="tdBorder1"> 地址： <br /></td>
        <td class="tdBorder1">
       <input type="text" name="address" value="<?=$date_user['address']?>" >
				 </td>
        <td class="tdBorder1">邮编： </td>
        <td class="tdBorder1"><input type="text" name="postcode" value="<?=$date_user['postcode']?>"></td>
      </tr>
      <tr>
      	<td class="tdBorder1">注册时间：<br /></td>
        <td class="tdBorder1"><?=$date_user['regtime']?></td>
        <td class="tdBorder1">最后登录时间：</td>
        <td class="tdBorder1"><?=$date_user['lastlogintime']?></td>
      </tr>
      
      
	<tr>
		<td class="tdBorder1">&nbsp;</td>
      	<td colspan="3" class="tdBorder1">
		<input type="submit" name="dosubmit" value="修改">
	    <input type="reset" name="reset" value=" 清除 ">			
        </td>
     </tr>
</table>
</form>
</body>
</html>