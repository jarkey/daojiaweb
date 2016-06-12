<?php 
$pageTitle="找回密码";    //当前页标题
include_once("inc/config.inc.php");
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

</head>
<?php require('inc/header.inc.php'); ?>



<div class="header clearfix">
	<div class="logo"><a href="index.php"><img src="images/index_03.png" alt="" /></a></div>
    <div class="city">
    	<h3><img src="images/index_09.png" alt="" /></h3>
       
    </div>
    <!--<div class="search_w">
    	<div class="search clearfix">
        	<form action="#" method="get">
            	<h3><span>产品</span></h3>
                <ul>
                	<li>产品1</li>
                    <li>产品2</li>
                    <li>产品3</li>
                </ul>
                <input type="text" value="" class="text_k" /><input type="button" value="搜索" class="ss_btn" />
            </form>
        </div>
        <div class="myxjd">
        	<a href="#"><img src="images/nby_20.png" alt="" />我的询价单</a>
            <span>10</span>
        </div>
    </div>
	<script type="text/javascript">
		$(function(){
			$('.search').find('h3').click(function(){
				$('.search').find('ul').show();
			})
			$('.search').find('ul li').click(function(){
				$('.search').find('h3 span').html($(this).html());
				$('.search').find('ul').hide();
			})
			$('.search').find('ul').mouseleave(function(){
				$(this).hide();
			})
		})
	</script> -->
 

</div>

<div class="dl_div">
	<h3>忘记密码</h3>
      <form action="password2.php" method="post" name="orderForm" onsubmit="return CheckPass()">
              
                <table class="tab2" cellpadding="0" cellspacing="0">
                
                  <tr>
                    	<td align="right" valign="middle">设置密码：</td>
                      <td><input type="password" class="m_itext"  name="password" /></td>
                    </tr>
                     <tr>
                    	<td align="right" valign="middle">确认密码：</td>
                      <td><input type="password" class="m_itext"  name="password1" /></td>
                    </tr>
                   
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="下一步" class="dl_btn" /></td>
                    </tr>
                </table>
            </form>
    
 
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
