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
$img=$today . $type;  //ȡ���ļ���

}
/**********ͼƬ�ϴ�����****************/
	$sql="insert into gplat_brand (brandName,brandurl,alias,sort,details,logo) values ('$brandName','$brandurl','$alias','$sort','$details','$img')";
	$result=mysql_query($sql);
	if($result!=0)
	{
	  echo("<script language=javascript>alert('��ӳɹ���');</script>"); 
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
    <td colspan="2" class="tdBorder1 titleBg1">���Ʒ��</td>
  </tr>   
  <tr>
    <td class="tdBorder1">Ʒ������:</td>
    <td class="tdBorder1">&nbsp;<input name="brandName" type="text" size="40" id="brandName"> 
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">Ʒ����ַ:</td>
    <td class="tdBorder1">&nbsp;<input name="brandurl" type="text" size="40" id="brandurl"></td>
  </tr>
  <tr>
    <td class="tdBorder1">˳��:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" value="0" id="sort"></td>
  </tr>
  <tr>
    <td class="tdBorder1">LOGO:</td>
    <td class="tdBorder1">&nbsp;<input type="file" name="img"></td>
  </tr>
  <tr>
    <td class="tdBorder1">����:</td>
    <td class="tdBorder1">&nbsp;<input name="alias" type="text" size="40" id="alias"> 
 </td>
  </tr>
  <tr>
    <td class="tdBorder1">��ϸ˵��:</td>
    <td class="tdBorder1">&nbsp;<textarea name="details" cols="50" rows="5" id="details"></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="�ύ">&nbsp;&nbsp;<input type="reset" value="����"></td>
  </tr>
</table>
</FORM>
<p>&nbsp;</p>
</body></html>