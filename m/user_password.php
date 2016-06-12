<?php 
$pageTitle="会员中心";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}


if ($_POST['passwords'] and $_POST['password'] and $_POST['password1']) {
	$password=$_POST['password'];
	$password=trim($password);
	$pwdconfirm=$_POST['password1'];
	$pwdconfirm=trim($pwdconfirm);
	$pass=$_POST['passwords'];
	$pass=trim($pass);
	$pass=sha1($pass);
	$sql_p="select userid from gplat_member where userid=$userId and password='$pass'";
	$result_p=mysql_query($sql_p);
	$data_p=mysql_fetch_assoc($result_p);
	if($data_p['userid']!=0){
      
	    if ($password==$pwdconfirm)
	{
		$password=sha1($password);
		$sql_p="update gplat_member set password='$password' where userid='$userId'";
		$result_p=mysql_query($sql_p)or die(mysql_error());
		if ($result_p!=0) {
		  echo("<script language=javascript>alert('修改密码成功')</script>"); 	
		
		}else{
		  echo("<script language=javascript>alert('修改密码失败')</script>"); 
		
		}
	}else 
	{
	echo("<script language=javascript>alert('两次输入的密码不一样')</script>"); 
	
	}
}else{ 
	echo("<script language=javascript>alert('输入的原始密码错误')</script>"); 
	
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
<script type="text/javascript" src="js/daojishi.js"></script>
<script type="text/javascript" src="js/shoujiyz.js"></script>
</head>


<body>
<div class="top_w2"> 
	<div class="back1"><a href="index.php">&lt;</a></div>
    会员中心
    <div class="back2"><a href="index.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper" style="padding-top:0px">
	<div class="dl_div">
    	<p>  <?php if($_SESSION['userid']!=''){
				?>
                 <a href="user_change.php"><?=$_SESSION['username']?></a>|<a href="index.php?exit=1">注销</a>
                <?php
				}
					?></p>
         
                    
    </div>
    <div class="center">
    	<ul>
        <li><a href="news.php"><img src="images/hucenter_03.jpg" alt=""><br>资讯</a></li>
        	<li><a href="user_change.php"><img src="images/hucenter_07.jpg" alt=""><br>个人信息</a></li>
            <li><a href="user_collection.php"><img src="images/hucenter_05.jpg" alt=""><br>收藏</a></li>
            <li style="border-right:0px"><a href="user_tousu.php"><img src="images/hucenter_09.jpg" alt=""><br>投诉</a></li>
            
        </ul>
    </div>
    <div class="center2 zhxx_div">
    <br>
    	<form action="user_password.php" method="post" name="orderForm" onSubmit="return CheckPass()">
              
                <table class="tab2" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align="right" valign="middle">原始密码：</td>
                      <td><input type="password"  name="passwords" class="cx_text2" /></td>
                    </tr>
                  <tr>
                    	<td align="right" valign="middle">设置密码：</td>
                      <td><input type="password" class="cx_text2"  name="password" /></td>
                    </tr>
                     <tr>
                    	<td align="right" valign="middle">确认密码：</td>
                      <td><input type="password" class="cx_text2"  name="password1" /></td>
                    </tr>
                   
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="保存" class="bc_btn" /></td>
                    </tr>
                </table>
            </form>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
