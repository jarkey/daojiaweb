<?php
include_once('../inc/config.inc.php');

if ($_POST['brandName'])
{
	$brandName=$_POST['brandName'];
	$brandurl=$_POST['brandurl'];
	$alias=$_POST['alias'];
	$sort=$_POST['sort'];
	$details=$_POST['details'];
	$img=0;
	/*****图片上传部分*******/
if($_FILES['img']['tmp_name']){
 if($_FILES['img']['error'] > 0){
   
   switch($_FILES['file']['error'])
   {
     case 1: echo '文件大小超过服务器限制';
             break;
     case 2: echo '文件太大！';
             break;
     case 3: echo '文件只加载了一部分！';
             break;
     case 4: echo '文件加载失败！';
             break;
   }
   
   exit;
}

if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png'){
   echo '文件不是JPG,PNG,GIF图片！';
   exit;
}
$today = date("YmdHis");
$filetype = $_FILES['img']['type'];
if($filetype == 'image/pjpeg'){
  $type = '.jpg';
}
if($filetype == 'image/gif'){
  $type = '.gif';
}
if($filetype == 'image/x-png'){
  $type = '.png';
}
$upfile = '../../userfiles/' . $today . $type;

if(is_uploaded_file($_FILES['img']['tmp_name']))
{
   if(!move_uploaded_file($_FILES['img']['tmp_name'], $upfile))
   {
     echo '移动文件失败！';
     exit;
    }
}
$img=$today . $type;  //取得文件名

}
/**********图片上传结束****************/
	$sql="insert into gplat_brand (brandName,brandurl,alias,sort,details,logo) values ('$brandName','$brandurl','$alias','$sort','$details','$img')";
	$result=mysql_query($sql);
	if($result!=0)
	{
	  echo("<script language=javascript>alert('添加成功！');</script>"); 
	  echo'<meta http-equiv="refresh" content="0; url=index.php"/>';
	  exit;		
	}
}
?>
<html><head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb18030" /></head>
<body>
<br>
<FORM action="" method="post" enctype="multipart/form-data">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">添加品牌</td>
  </tr>   
  <tr>
    <td class="tdBorder1">品牌名称:</td>
    <td class="tdBorder1">&nbsp;<input name="brandName" type="text" size="40" id="brandName"> 
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">品牌网址:</td>
    <td class="tdBorder1">&nbsp;<input name="brandurl" type="text" size="40" id="brandurl"></td>
  </tr>
  <tr>
    <td class="tdBorder1">顺序:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" value="0" id="sort"></td>
  </tr>
  <tr>
    <td class="tdBorder1">LOGO:</td>
    <td class="tdBorder1">&nbsp;<input type="file" name="img"></td>
  </tr>
  <tr>
    <td class="tdBorder1">别名:</td>
    <td class="tdBorder1">&nbsp;<input name="alias" type="text" size="40" id="alias"> 
 </td>
  </tr>
  <tr>
    <td class="tdBorder1">详细说明:</td>
    <td class="tdBorder1">&nbsp;<textarea name="details" cols="50" rows="5" id="details"></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>
  </tr>
</table>
</FORM>
<p>&nbsp;</p>
</body></html>