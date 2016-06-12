<?php 
$pageTitle="会员中心";    //当前页标题
$nav=3;
include_once("../inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
$userid=$_SESSION['userid'];

	
if ($_POST['username']) {
	$email=$_POST['email'];
	$msn=$_POST['msn'];
	$birthday=$_POST['birthday'];
	$gender=$_POST['gender'];
	$truename=$_POST['truename'];
	/************图片上传*************/
if($_FILES['img']['tmp_name']){
$filetype = $_FILES['img']['type'];
if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/jpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png' && $_FILES['img']['type']!='image/png'){
   echo '文件不是JPG,PNG,GIF图片！';
   exit;
}
$today = date("YmdHis");
if($filetype == 'image/pjpeg'){ $type = '.jpg';}
if($filetype == 'image/jpeg'){ $type = '.jpg';}
if($filetype == 'image/gif'){$type = '.gif';}
if($filetype == 'image/x-png'){$type = '.png';}
if($filetype == 'image/png'){$type = '.png';}
$upfile = '../userfiles/' . $today . $type;
if(is_uploaded_file($_FILES['img']['tmp_name']))
{
   if(!move_uploaded_file($_FILES['img']['tmp_name'], $upfile))
   {
     echo '移动文件失败！';
     exit;
    }
}
$img=$today . $type;  //取得文件名
}else{$img=$_GET['img'];}
	
	
	    $sql="update gplat_member set email='$email',img='$img' where userid='$userid'";
		$result=mysql_query($sql)or die(mysql_error());
		if ($result!=0) {
			$sql_info="update gplat_member_detail set truename='$truename',gender='$gender',birthday='$birthday',msn='$msn' where userid='$userid'";
			$result_info=mysql_query($sql_info)or die(mysql_error());
		}
	
}	

$sql="select a.*,b.*,c.* from gplat_member a,gplat_member_detail b,gplat_member_info c where a.userid=b.userid and a.userid=c.userid  and a.userid='$userid'";
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result)or die(mysql_error());
if($data['img']!=''){$_SESSION['img']=$data['img'];}


if($data['img']==''){$img='null.gif';}else{$img=$data['img'];}
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
    	  <form action="user_change.php?img=<?=$img?>" method="post" enctype="multipart/form-data">
                <h4>账户信息修改</h4>
                <table class="tab2" cellpadding="0" cellspacing="0">
                <tr>
                    	<td align="right" width="80px;" valign="middle">头像：</td>
                      <td><img src="../userfiles/<?=$img?>" alt="" id="ImgPr" width="100" height="100"/> <input type="file" id="up" name="img" onChange="yulan(this)"/>(建议100×100px)</td>
                    </tr>
                	<tr>
                    	<td align="right" valign="middle">昵称：</td>
                      <td><input type="text" name="username" class="cx_text2" value="<?=$data['username']?>" readonly="readonly" /></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">姓名：</td>
                      <td><input type="text" class="cx_text2" name="truename" value="<?=$data['truename']?>" /></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">性别：</td>
                      <td><input name="gender" type="radio" value="0" <?php checked ($data['gender'],0); ?>/>男士
                      <input name="gender" type="radio" value="1" <?php checked ($data['gender'],1); ?>/>女士</td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">生日：</td>
                      <td><input type="text" class="cx_text2" name="birthday" value="<?=$data['birthday']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">职业：</td>
                      <td><input type="text" class="cx_text2" name="msn" value="<?=$data['msn']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">手机：</td>
                        <td><?=$data['phone']?><a href="user_phone.php">修改</a></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">邮箱：</td>
                      <td><input type="text" class="cx_text2"  name="email" value="<?=$data['email']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">密码：</td>
                        <td>xxxxxxxxxxxx<a href="user_password.php">修改</a></td>
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
