<?php 
$pageTitle="用户登录";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");

if(!empty($_POST['username']) and !empty($_POST['password']) )
{

	
	$name=$_POST['username'];
	$password=$_POST['password'];
	$password=trim($password);
    $password=sha1($password);
	
$sqlUser="select * from gplat_member a,gplat_member_group b where (username='$name' or phone='$name') and (password='$password') and (b.groupid=a.groupid)";


$resultUser=mysql_query($sqlUser);
$dataUser=mysql_fetch_assoc($resultUser);
if($dataUser!=0)
{

	$_SESSION['username']=$dataUser['phone'];
	$username=$_SESSION['username'];
	$_SESSION['userid']=$dataUser['userid'];
	$userid=$_SESSION['userid'];
	$_SESSION['groupid']=$dataUser['groupid'];	      //会员组ID
	$_SESSION['groupname']=$dataUser['name'];	      //会员组名
	$_SESSION['email']=$dataUser['email'];
	$_SESSION['point']=$dataUser['point'];
	$_SESSION['amount']=$dataUser['amount'];
	if($dataUser['img']==''){$_SESSION['img']='index_22.png';}else{$_SESSION['img']=$dataUser['img'];}
	
	
	date_default_timezone_set('Asia/Shanghai');// 加上这句就好了，纳闷了好几天
    $time=date('Y:m:d H:i:s');
	$sql_time="update gplat_member_info set lastlogintime='$time' where userid=".$userid;
	$result_time=mysql_query($sql_time);
	
	if ($_SESSION['user_login']!='') {
		
		 $str='<script>window.location.href="'.$_SESSION['user_login'].'";</script>';
	    exit();
	 }else {
	 if(isset($_COOKIE["u"])){
	  $str='<script>window.location.href="user_change.php?u=yes";</script>';		
	}else{
	  $str='<script>window.location.href="user_change.php";</script>';
	}
	

	
	}
	}else
	{
		$str='<script>window.location.href="user_login.php";</script>';
		 exit;
		
	}
	echo"$str";
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
	<div class="back1"><a href="javascript:history.go(-1)">&lt;</a></div>
    会员登录
    <div class="back2"><a href="javascript:history.go(-1)"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper">
	<div class="zc">
    	<form action="user_login.php" method="post">
        	<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="20%" align="right" style="padding-bottom:30px;"><img src="images/dl_03.png" alt=""></td>
                  <td width="80%" valign="top"><input type="text" name="username" class="text_i3" /><span id="username" class="redTxt1"></span></td>
                </tr>
                <tr>
                	<td align="right"  style="padding-bottom:30px;"><img src="images/dl_06.png" alt=""></td>
                  <td valign="top"><input type="password" name="password" class="text_i3" /><span id="password" class="redTxt1"></span></td>
                </tr>
                <tr>
                	<td  style="padding-bottom:40px;"></td>
                    <td><input type="submit" name="submit" class="dl_btn" value="登录"><a href="registered.php" class="zc_a">注册</a><a href="password.php" class="wj">忘记密码</a></td>
                </tr>
               
            </table>
            
        </form>
    </div>	
</div>

<?php require('inc/footer.inc.php'); ?>
</body>

</html>
