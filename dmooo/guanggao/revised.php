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
	
	   //ɾ���ɵ�ͼƬ�ļ�
	   $old_img=$_POST['adTitlePic'];
	   @unlink("../../userfiles/$old_img");
    /**************�ϴ��ļ��� start*************************/
	   $type = array('gif', 'jpg', 'png');
	   $upload = new UploadFile($_FILES['user_upload_file'], '../../userfiles', 1000000, $type);
	   $num = $upload->upload();
	   if ($num != 0) {
		//echo "�ϴ��ɹ�<br>";
		//ȡ���ļ����й���Ϣ���ļ��������͡���С��·������print_r()��ӡ������
		//print_r($upload->getSaveInfo());
		//��ʽΪ��  Array
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
		echo $num."���ļ��ϴ��ɹ�";
		$a=$upload->getSaveInfo();
		$adTitlePic=$a[0][saveas];
	   }else{
		echo "�ϴ�ʧ��<br>";
	   }
   /**************�ϴ��ļ��� end*************************/ 
   }

	$sql="update gplat_ad_add set adTitle='$adTitle',addUrl='$addUrl',adTitlePic='$adTitlePic' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
	echo '<script>alert("��ϲ�����޸ĳɹ�!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
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
  <tr bgcolor="#FFFFFF"><td width="11%" height="30">&nbsp;<span class="tdBorder1">�� ��</span>:
    </td>
    <td width="89%">&nbsp;
      <input name="adTitle" type="text" value="<?=$adTitle?>" size="50"></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;<span class="tdBorder1">ͼ Ƭ</span>:    </td>
  <td height="30">&nbsp;&nbsp;<input name="user_upload_file[]" type="file" size="40">
</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;<span class="tdBorder1">�� ��</span>:    </td>
  <td height="30">&nbsp;
    <input name="addUrl" type="text" value="<?=$addUrl?>" size="50"></td>
</tr>
<tr bgcolor="#FFFFFF"><td height="30" colspan="2">&nbsp;
  <input type="submit" class="button1" value="�޸�"></td></tr>
</table>
</form>

</body></html>