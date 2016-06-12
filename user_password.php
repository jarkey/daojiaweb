<?php 
$pageTitle="密码修改";    //当前页标题
include_once("inc/config.inc.php");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/check.js"></script>
</head>
<?php require('inc/header.inc.php'); ?>

<?php require('inc/header_s.inc.php'); ?>

<div class="nav_w clearfix">
  <?php require('inc/header_url.php'); ?>
    
      <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
 

 
 
 
	<script type="text/javascript">
		jQuery("#nav").slide({ 
				type:"menu", //效果类型
				titCell:".mainCate", // 鼠标触发对象
				targetCell:".subCate", // 效果对象，必须被titCell包含
				delayTime:0, // 效果时间
				triggerTime:0, //鼠标延迟触发时间
				defaultPlay:false,//默认执行
				returnDefault:true//返回默认
			});
	</script> 
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	 <?php include('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	<?=$pageTitle?>
        </div>
		<div class="zhxx_div">
        	  <form action="user_password.php" method="post" name="orderForm" onsubmit="return CheckPass()">
              
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
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
