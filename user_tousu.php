<?php 
$pageTitle="首页";    //当前页标题
include_once("inc/config.inc.php");

/***********添加服务**************/
if($_POST['add_service'])
{ 
	$submitTitle=$_POST['submitTitle'];  //主题
	$submitContent=$_POST['submitContent'];  //内容
	$userid=$_SESSION['userid'];
	date_default_timezone_set('Asia/Shanghai');
	$submitTime=date('Y-m-d H:i:s');   //提交时间
	$serviceNo=date('YmdHis');  //服务编号	
	$ii=array('0','1','2','3','4','5','6','7','8','9');
	shuffle($ii);
    for($i=0;$i<3;$i++) $texe.=$text_array[$i];
    $serviceNo=$serviceNo.$texe;  
    $processStatus=1;   //服务状态
    $serviceIndex=2;    //服务类别
    $sql="insert into gplat_service  (serviceNo,submitTitle,submitContent,userid,submitTime,serviceIndex,processStatus) values ('$serviceNo','$submitTitle','$submitContent','$userid','$submitTime','$serviceIndex','$processStatus')";

$result=mysql_query($sql)or die(mysql_error());

	if($result!=0)
	{
     echo '<script>alert("提交成功，我们会尽快处理!");top.window.location.reload(true);window.close();</script>';		
		
	}else{
	 echo("<script>alert('提交失败，请于我们联系');top.window.location.reload(true);window.close();</script>");			
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
        	投诉建议
        </div>
    <div class="tsjy_div">
        	<form action="#" method="post">
        	<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="125" align="right">标题：</td>
                    <td width="643"><input name="submitTitle" type="text" class="bt_text" /></td>
                </tr>
                <tr>
                	<td align="right" valign="top">详细内容：</td>
                  <td><textarea name="submitContent" cols="" rows=""></textarea><input name="add_service" type="hidden" id="add_service" value="add_service"></td>
                </tr>
                <tr>
                	<td></td>
                    <td><input type="submit" value="提交" class="tj_btn" /></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
