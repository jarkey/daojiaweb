<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if ($_POST['brandName'])
{
	$id=$_GET['id'];	
	$brandName=$_POST['brandName'];
    $brandurl=$_POST['brandurl']; 
    $alias=$_POST['alias'];
    $sort=$_POST['sort'];
    $details=$_POST['details'];	
	
	/*****ͼƬ�ϴ�����*******/
if($_FILES['img']['tmp_name']){
 if($_FILES['img']['error'] > 0){
   
   switch($_FILES['file']['error'])
   {
     case 1: echo '�ļ���С��������������';
             break;
     case 2: echo '�ļ�̫��';
             break;
     case 3: echo '�ļ�ֻ������һ���֣�';
             break;
     case 4: echo '�ļ�����ʧ�ܣ�';
             break;
   }
   
   exit;
}

if($_FILES['img']['type']!='image/pjpeg' && $_FILES['img']['type']!='image/gif' && $_FILES['img']['type']!='image/x-png'){
   echo '�ļ�����JPG,PNG,GIFͼƬ��';
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
     echo '�ƶ��ļ�ʧ�ܣ�';
     exit;
    }
}
$old_img=$_GET['logo'];
@unlink("../../userfiles/$old_img");
$img=$today . $type;  //ȡ���ļ���

}
/**********ͼƬ�ϴ�����****************/
	$sql="update gplat_brand set brandName='$brandName',brandurl='$brandurl',alias='$alias',sort='$sort',details='$details',logo='$img' where id =".$_GET['id'];
	$result=mysql_query($sql);
	if($result!=0)
	{
	 echo '<script>alert("�޸ĳɹ�");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
	 //exit;
	}
}
?>
<?php
$sql="select * from gplat_brand where id=".$_GET['id'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$id=$_GET['id'];
$brandName=$data['brandName'];
$logo=$data['logo'];
$brandurl=$data['brandurl']; 
$alias=$data['alias'];
$sort=$data['sort']; 
$details=$data['details'];
?><br>
<FORM action="revise.php?id=<?=$id?>&logo=<?=$logo?>" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td class="tdBorder1">Ʒ������:</td>
    <td class="tdBorder1">&nbsp;<input name="brandName" type="text" size="40" id="brandName" value="<?=$brandName?>"> 
    </td>
  </tr>
  <tr>
    <td class="tdBorder1">Ʒ����ַ:</td>
    <td class="tdBorder1">&nbsp;<input name="brandurl" type="text" size="40" id="brandurl" value="<?=$brandurl?>"></td>
  </tr>
  <tr>
    <td class="tdBorder1">˳��:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" id="sort" value="<?=$sort?>"></td>
  </tr>
  <tr>
    <td class="tdBorder1">LOGO:</td>
    <td class="tdBorder1">&nbsp;<input type="file" name="img"></td>
  </tr>
  <tr>
    <td class="tdBorder1">����:</td>
    <td class="tdBorder1">&nbsp;<input name="alias" type="text" size="40" id="alias" value="<?=$alias?>"> 
 </td>
  </tr>
  <tr>
    <td class="tdBorder1">��ϸ˵��:</td>
    <td class="tdBorder1">&nbsp;<textarea name="details" cols="50" rows="5" id="details"><?=$details?></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="�ύ">&nbsp;&nbsp;<input type="reset" value="����"></td>
  </tr>
</table>
</FORM>

</body></html>