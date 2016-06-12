<?php 
$pageTitle="找回密码";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");
if($_SESSION['pass_id']==0){ echo("<script language=javascript>alert('非法访问')</script>"); 
exit;
}
$pass_id=$_SESSION['pass_id'];
if ( $_POST['password'] and $_POST['password1']) {
	$password=$_POST['password'];
	$password=trim($password);
	$pwdconfirm=$_POST['password1'];
	$pwdconfirm=trim($pwdconfirm);
	
  if ($password==$pwdconfirm)
	{
		$password=sha1($password);
		$sql_p="update gplat_member set password='$password' where userid='$pass_id'";
		$result_p=mysql_query($sql_p)or die(mysql_error());
		if ($result_p!=0) {
		  echo("<script language=javascript>alert('修改密码成功')</script>"); 
		  echo '<script>window.location.href="user_login.php";</script>';
		 
		
		}
	}else 
	{
	echo("<script language=javascript>alert('两次输入的密码不一样')</script>"); 
	
	}



}
?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--自适应手机屏幕-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end 自适应手机屏幕-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="#">&lt;</a></div>
    忘记密码
    <div class="back2"><a href="#"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper_xq" style="padding-top:0px;">
<div class="wjmm">
    	<form action="password2.php" method="post" name="orderForm" onSubmit="return CheckPass()">
    	<table cellpadding="0" cellspacing="0">
        	
            <tr>
            	<td align="right">新密码：</td>
              <td><input name="password" type="password" class="yz2"></td>
            </tr>
            <tr>
            	<td align="right">重复密码：</td>
              <td><input name="password1" type="password" class="yz2"></td>
            </tr>
            <tr>
            	<td colspan="2" align="center"><input type="submit" value="修改" class="bc_btn" /></td>
            </tr>
        </table>
    </form>
    </div>
    
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
