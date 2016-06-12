<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if ($_POST['adTitle'])
{
	$adTitle=$_POST['adTitle'];
	$addUrl=$_POST['addUrl'];

	if($_FILES['user_upload_file']['tmp_name']){
	
	   //删除旧的图片文件
	   $old_img=$_POST['adTitlePic'];
	   @unlink("../../userfiles/$old_img");
    /**************上传文件类 start*************************/
	   $type = array('gif', 'jpg', 'png');
	   $upload = new UploadFile($_FILES['user_upload_file'], '../../userfiles', 1000000, $type);
	   $num = $upload->upload();
	   if ($num != 0) {
		//echo "上传成功<br>";
		//取得文件的有关信息，文件名、类型、大小、路径。用print_r()打印出来。
		//print_r($upload->getSaveInfo());
		//格式为：  Array
		//   (
		//    [0] => Array(
		//        [name] => example.txt
		//        [type] => txt
		//        [mime_type] => image/gif
		//        [size] => 526
		//        [saveas] => 1263449597.gif 
		//        [path] => j:/tmp/example-1108898806.txt
		//        )
		//   )
		echo $num."个文件上传成功";
		$a=$upload->getSaveInfo();
		$adTitlePic=$a[0][saveas];
	   }else{
		echo "上传失败<br>";
	   }
   /**************上传文件类 end*************************/ 
   }

	$sql="update gplat_ad_add set adTitle='$adTitle',addUrl='$addUrl',adTitlePic='$adTitlePic' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
	echo '<script>alert("恭喜您，修改成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
}
?>
<?php
$sql="select * from gplat_ad_add where id=".$_GET['id'];
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
  $adTitle=$date['adTitle'];
  $addUrl=$date['addUrl'];
  $adTitlePic=$date['adTitlePic'];
  $id=$_GET['id'];
?><br>

<form action="revised.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
<table width="80%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td width="11%" height="30">&nbsp;<span class="tdBorder1">文 字</span>:
    </td>
    <td width="89%">&nbsp;
      <input name="adTitle" type="text" value="<?=$adTitle?>" size="50"></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;<span class="tdBorder1">图 片</span>:    </td>
  <td height="30">&nbsp;&nbsp;<input name="user_upload_file[]" type="file" size="40">
</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;<span class="tdBorder1">链 接</span>:    </td>
  <td height="30">&nbsp;
    <input name="addUrl" type="text" value="<?=$addUrl?>" size="50"></td>
</tr>
<tr bgcolor="#FFFFFF"><td height="30" colspan="2">&nbsp;
  <input type="submit" class="button1" value="修改"></td></tr>
</table>
</form>

</body></html>