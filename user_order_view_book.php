<?php 
$pageTitle="评价";    //当前页标题
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
$productid=$_GET['productid'];
$orderid=$_GET['orderid'];

if($_GET['del_img']!=''){ //删除图片
	
	$del_img=$_GET['del_img'].',';
	$old_img=$_GET['del_img'];
	 $img=str_replace($del_img,'',$_GET['img']);
	 $sql="update product_book set img='$img' where id=".$_GET['del_id'];
	 $result=mysql_query($sql);
	 @unlink("userfiles/$old_img");
	}

if($_POST['content'])
{ 
	
	$content=$_POST['content'];
	$title=$_POST['title'];
	$xing=$_POST['xing'];
	
	$userid=$_SESSION['userid'];
	date_default_timezone_set('Asia/Shanghai');
	$times=date('Y-m-d H:i:s');   //提交时间
	 
  $count=0; 
  $today = date("YmdHis");
  foreach ($_FILES["img"]["error"] as $key => $error) { 
   if ($error == UPLOAD_ERR_OK) { 
    $tmp_name = $_FILES["img"]["tmp_name"][$key];  
    $name= $today.$count.$_FILES["img"]["name"][$key];
    $uploadfile = 'userfiles/'.$name; 
    move_uploaded_file($tmp_name, $uploadfile);
    $img_all.=$name.',';
    //echo $img_all."<br />";
   $count++;
    } 
  } 
	
	
	

	if($_POST['bookid']){
		$id=$_POST['bookid'];
		$img=$_GET['img'].$img_all;
		  $sql="update product_book set content='$content',title='$title',times='$times',xing='$xing',img='$img' where id='$id'";

		}else{
			$img=$img_all;
		   $sql="insert into product_book  (productid,orderid,content,userid,times,title,xing,img) values ('$productid','$orderid','$content','$userid','$times','$title','$xing','$img')";

		}
 
$result=mysql_query($sql)or die(mysql_error());

	if($result!=0)
	{
		$sql="update gplat_order_cart set isbook=1 where orderid='$orderid'";
		$result=mysql_query($sql)or die(mysql_error());
     echo '<script>alert("提交成功!")</script>';	
	 echo '<script>window.location.href="user_order_view.php?id='.$orderid.'";</script>';
     exit;
		
	}
}

$sql="select * from product_book where userid=$userid and productid=$productid";
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
if($data['img']!=''){
	$img_all=substr($data['img'],0,-1);
	$img_arr=explode(",",$img_all);
	$img_num=count($img_arr);
	foreach ($img_arr as $link => $content ) {
	$orders_content_str.='<a href="userfiles/'.$content.'" target="_blank"><img src="userfiles/'.$content.'" width="100" /></a> <a href="user_order_view_book.php?productid='.$_GET['productid'].'&orderid='.$_GET['orderid'].'&img='.$data['img'].'&del_img='.$content.'&del_id='.$data['id'].'" >删除</a>';
	}

	}
		$up_num=5-$img_num;
	for($i=1;$i<=$up_num;$i++){  
     $file_img.='<input type="file" name="img[]" /><br />
	 ';
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
        	评价
        </div>
    <div class="tsjy_div">
        	<form action="user_order_view_book.php?productid=<?=$_GET['productid']?>&orderid=<?=$_GET['orderid']?>&img=<?=$data['img']?>" method="post" enctype="multipart/form-data">
        	<table cellpadding="0" cellspacing="0">
            	 <tr>
                	<td align="right" valign="top">标签：</td>
                    <td><input type="radio" name="xing" value="1" <?=checked_v(1,$data['xing'])?>/>1星
                        <input type="radio" name="xing" value="2" <?=checked_v(2,$data['xing'])?>/>2星
                        <input type="radio" name="xing" value="3" <?=checked_v(3,$data['xing'])?>/>3星
                        <input type="radio" name="xing" value="4" <?=checked_v(4,$data['xing'])?>/>4星
                        <input type="radio" name="xing" value="5" <?=checked_v(5,$data['xing'])?>  <?=checked_v(0,$data['xing'])?>/>5星
                  
                    </td>
                </tr>
            	 <tr>
                	<td align="right" valign="top">标签：</td>
                    <td><input type="text" name="title" class="bt_text" value="<?=$data['title']?>" />
                    <input type="hidden" name="bookid" value="<?=$data['id']?>" />
                    </td>
                </tr>
                <tr>
                	<td align="right" valign="top">评价内容：</td>
                  <td ><textarea name="content" cols="" rows=""><?=$data['content']?></textarea><br />
                  <?=$orders_content_str?><br />
               <?=$file_img?>
 
   </td>
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
