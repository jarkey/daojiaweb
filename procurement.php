<?php 
$pageTitle="企业采购";    //当前页标题
include_once("inc/config.inc.php");
if($_POST['content'])
{ 
	
	$content=$_POST['content'];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$company=$_POST['company'];
	$part=$_POST['part'];
	$num=$_POST['num'];
	$userid=$_SESSION['userid'];
	date_default_timezone_set('Asia/Shanghai');
	$times=date('Y-m-d H:i:s');   //提交时间
	$sql="insert into dmooo_enterprise_order  (content,name,phone,company,part,num,userid,times) values ('$content','$name','$phone','$company','$part','$num','$userid','$times')";
$result=mysql_query($sql)or die(mysql_error());

	if($result!=0)
	{
     echo '<script>alert("提交成功,我们会尽快与您联系!")</script>';	
	  echo '<script>window.location.href="procurement.php";</script>';
		
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
<div class="wrapper_cg">
	<div class="cg_div">
    	<h3>企业采购申请表</h3>
        <div class="cg_c">
        	<form action="procurement.php" method="post" name="procurement" onsubmit="return Checkprocurement()">
        		<table cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="120" align="right" valign="middle">姓名：</td>
                      <td><input type="text" name="name" value="" class="name_text" />*</td>
                        <td>采购需求：</td>
                  </tr>
                    <tr>
                    	<td align="right" valign="middle">联系电话：</td>
                      <td width="400"><input type="text" value="" name="phone" class="name_text" />*</td>
                        <td rowspan="4" align="left" valign="top"><textarea name="content" cols="" rows=""></textarea>*</td>
                  </tr>
                    <tr>
                    	<td align="right" valign="middle">您所在的公司：</td>
                      <td><input type="text" value="" name="company" class="name_text" /></td>
                  </tr>
                    <tr>
                    	<td align="right" valign="middle">您所在的部门：</td>
                      <td><input type="text" value="" name="part" class="name_text" /></td>
                  </tr>
                    <tr>
                    	<td align="right" valign="middle">公司人数：</td>
                      <td><input type="text" value="" name="num" class="name_text" /></td>
                  </tr>
                    <tr>
                    	<td colspan="3" align="center" valign="middle"><input type="submit" value="提交申请" class="tj_btn" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<?php require('inc/footer.inc.php'); ?>
</body>
</html>
