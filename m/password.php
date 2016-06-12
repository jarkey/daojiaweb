<?php 
$pageTitle="找回密码";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");
if ($_POST['code'] and $_POST['mobile'] ) {
if($_POST['code']==$_COOKIE['authimg'] or $_POST['mobile']!=$_COOKIE['mobile']){
$phone=$_POST['mobile'];
$sql="select userid from gplat_member where phone='$phone'";
$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
        
		if($data['userid']!=0){
			echo '<script>window.location.href="password2.php";</script>';
			$_SESSION['pass_id']=$data['userid'];
			}else{
	echo("<script language=javascript>alert('手机号码不存在')</script>"); 
	}
 
}else{
	echo("<script language=javascript>alert('验证码错误')</script>"); 
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
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
<script type="text/javascript" src="js/daojishi.js"></script>
<script type="text/javascript" src="js/shoujiyz.js"></script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="#">&lt;</a></div>
    忘记密码
    <div class="back2"><a href="#"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper_xq" style="padding-top:0px;">
<div class="wjmm">
    		  <form action="password.php" method="post" >
              
                <table class="tab2" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align="right" valign="middle">手机号码：</td>
                      <td><input type="text"  name="mobile" id="mobile" class="yz" /></td>
                    </tr>
                  <tr>
                    	<td align="right" valign="middle">验证码：</td>
                      <td>
                        &nbsp;<input type="button" onClick="phone_ajax();time(this)" value="点击发送" class="yzm" />
                        <span id="mobileauthajax"></span></td>
                    </tr>
                     <tr>
                    	<td align="right" valign="middle">验证码：</td>
                      <td><input type="text"  id="code" name="code" class="yz" /></td>
                    </tr>
                   
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="下一步" class="bc_btn" /></td>
                    </tr>
                </table>
            </form>
    </div>
    
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
