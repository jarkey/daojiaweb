<?php 
$pageTitle="�����޸�";    //��ǰҳ����
include_once("inc/config.inc.php");
$userid=$_SESSION['userid'];
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
	
if ($_POST['username']) {
	$email=$_POST['email'];
	$msn=$_POST['msn'];
	$birthday=$_POST['birthday'];
	$gender=$_POST['gender'];
	$truename=$_POST['truename'];
	/************ͼƬ�ϴ�*************/
if($_FILES['img']['tmp_name']){
$filetype = $_FILES['img']['type'];
if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/jpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png' && $_FILES['img']['type']!='image/png'){
   echo '�ļ�����JPG,PNG,GIFͼƬ��';
   exit;
}
$today = date("YmdHis");
if($filetype == 'image/pjpeg'){ $type = '.jpg';}
if($filetype == 'image/jpeg'){ $type = '.jpg';}
if($filetype == 'image/gif'){$type = '.gif';}
if($filetype == 'image/x-png'){$type = '.png';}
if($filetype == 'image/png'){$type = '.png';}
$upfile = 'userfiles/' . $today . $type;
if(is_uploaded_file($_FILES['img']['tmp_name']))
{
   if(!move_uploaded_file($_FILES['img']['tmp_name'], $upfile))
   {
     echo '�ƶ��ļ�ʧ�ܣ�';
     exit;
    }
}
$img=$today . $type;  //ȡ���ļ���
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
<script type="text/javascript" src="js/img_up.js"></script>
<!--<script type="text/javascript" src="js/jQuery/jquery1.2.js"></script>
<script type="text/javascript" src="js/user_longin.js"></script>-->
<script>
$(function () {
$("#up").uploadPreview({ Img: "ImgPr", Width: 100, Height: 100 });
});
</script>
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
				type:"menu", //Ч������
				titCell:".mainCate", // ��괥������
				targetCell:".subCate", // Ч�����󣬱��뱻titCell����
				delayTime:0, // Ч��ʱ��
				triggerTime:0, //����ӳٴ���ʱ��
				defaultPlay:false,//Ĭ��ִ��
				returnDefault:true//����Ĭ��
			});
		
		
		
	</script> 
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	<?php require('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	�˺���Ϣ
        </div>
        <div class="zhxx_div">
        	
            	<!--<table class="tab1" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="118">�˻����:</td>
                        <td width="630" ><?=$data['amount']?>	
                </table>-->
                <form action="user_change.php?img=<?=$img?>" method="post" enctype="multipart/form-data">
                <h4>�˻���Ϣ�޸�</h4>
                <table class="tab2" cellpadding="0" cellspacing="0">
                <tr>
                    	<td align="right" valign="middle">ͷ��</td>
                      <td><img src="userfiles/<?=$img?>" alt="" id="ImgPr" width="100" height="100"/> <input type="file" id="up" name="img" onchange="yulan(this)"/>(����100��100px)</td>
                    </tr>
                	<tr>
                    	<td align="right" valign="middle">�ǳƣ�</td>
                      <td><input type="text" name="username" class="cx_text2" value="<?=$data['username']?>" readonly="readonly" /></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">��ʵ������</td>
                      <td><input type="text" class="cx_text2" name="truename" value="<?=$data['truename']?>" /></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">�Ա�</td>
                      <td><input name="gender" type="radio" value="0" <?php checked ($data['gender'],0); ?>/>��ʿ
                      <input name="gender" type="radio" value="1" <?php checked ($data['gender'],1); ?>/>Ůʿ</td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">�������ڣ�</td>
                      <td><input type="text" class="cx_text2" name="birthday" value="<?=$data['birthday']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">ְҵ��</td>
                      <td><input type="text" class="cx_text2" name="msn" value="<?=$data['msn']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">�����ֻ���</td>
                        <td><?=$data['phone']?><a href="user_phone.php">�޸�</a></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">���䣺</td>
                      <td><input type="text" class="cx_text2"  name="email" value="<?=$data['email']?>"/></td>
                    </tr>
                    <tr>
                    	<td align="right" valign="middle">���룺</td>
                        <td>xxxxxxxxxxxx<a href="user_password.php">�޸�</a></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td><input type="submit" value="����" class="bc_btn" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
