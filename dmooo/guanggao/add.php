<?php
include('../inc/config.inc.php');
$fid=$_GET['fid'];
?>
<?php

if ($_POST['adTitle'])
{
	$fid=$_POST['fid'];
    $adTitle=$_POST['adTitle'];
	$addUrl=$_POST['addUrl'];
	
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
	 
	  $a=$upload->getSaveInfo();
	  $adTitlePic=$a[0][saveas];
	 }
	 else {
	  echo "�ϴ�ʧ��<br>";
	 }
	/**************�ϴ��ļ��� end*************************/ 


   	$sql="insert into gplat_ad_add (adTitle,adTitlePic,fid,addUrl) values ('".$adTitle."','".$adTitlePic."','".$fid."','".$addUrl."')";
    $result=mysql_query($sql);
	echo '<script>alert("��ϲ������ӳɹ�!");window.location.href="index.php?sous_fid='.$fid.'";</script>';

}

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head><body>

<form action="add.php" method="POST" enctype="multipart/form-data">
  <a name="add"></a>
  <table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss4">
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">����¹��</td>
    </tr>   
  <tr>
  <td height="30" class="tdBorder1">&nbsp;�� ��:
    <input name="adTitle" type="text" id="adTitle">
  </td>
  <td class="tdBorder1">&nbsp;ͼ Ƭ:
    <input name="user_upload_file[]" type="file" size="30"></td>
</tr>
<tr>
  <td height="30" class="tdBorder1">&nbsp;�� ��:
    <input name="addUrl" type="text" id="addUrl" size="40">
    </td>
  <td height="30" class="tdBorder1">&nbsp;�� ��:
    <select name="fid">
      <?php
$sql="select * from gplat_ad_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	if($_GET['fid']==$id){$c_str='selected';}else{$c_str='';}
	?>
      <option value="<?=$id?>" <?=$c_str?>>
        <?=$name?>
        </option>
      <?php
}
?>
      </select></td>
</tr>
<tr>
  <td height="30" colspan="2" class="tdBorder1">&nbsp;
    <input type="submit" class="button1" value="��ӹ��">
    </td>
</tr>
</table>
</form>
</body></html>