<?php
include_once('../inc/config.inc.php');

if ($_POST['specificationName'])
{
	$id=$_GET['id'];
	$specificationName=$_POST['specificationName'];
	$specificationRemark=$_POST['specificationRemark'];
	$displayType=$_POST['displayType'];
	$display=$_POST['display'];
	$sort=$_POST['sort'];

	
	$sql="update gplat_specifications set specificationName='$specificationName',specificationRemark='$specificationRemark',displayType='$displayType',display='$display',sort='$sort' where id =".$_GET['id'];
	$result=mysql_query($sql);
	if($result!=0)
	{
	    echo '<script>alert("�޸ĳɹ�");</script>';	
		goToCurrentPage();
	}
}
?>

<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
$sql="select * from gplat_specifications where id=".$_GET['id'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$id=$_GET['id'];
$id=$data['id'];
	$specificationName=$data['specificationName'];
	$specificationRemark=$data['specificationRemark']; 
	$displayType=$data['displayType'];
	if($displayType==1){
		$str1='����';
	}else{
	   $str1='ͼƬ';	
	}
	
	$display=$data['display'];
	
	if($display==1){
		$str2='ƽ��չʾ';
	}else{
	   $str2='����չʾ';	
	}
			
	$sort=$data['sort'];
?><br>
<FORM action="specifications_revise.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td class="tdBorder1">�������:</td>
    <td class="tdBorder1">&nbsp;<input name="specificationName" type="text" size="40" id="specificationName" value="<?=$specificationName?>"> 
      </td>
  </tr>
  
  <tr>
    <td class="tdBorder1">˳��:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" id="sort" value="<?=$sort?>"></td>
  </tr>
  <tr>
    <td class="tdBorder1">��ʾ��ʽ:</td>
    <td class="tdBorder1">&nbsp;
      <label>
        <input type="radio" name="display"  value="1" <?=checked_v(1,$displayType)?>>
      ƽ��չʾ</label>
       <label>
        <input type="radio" name="display"  value="2" <?=checked_v(2,$displayType)?>>
      ����չʾ</label>
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">��ʾ����:</td>
    <td class="tdBorder1">&nbsp;   <label>
        <input type="radio" name="displayType"  value="1" <?=checked_v(1,$display)?>>
      ����</label>
       <label>
        <input type="radio" name="displayType"  value="2" <?=checked_v(2,$display)?>>
      ͼƬ</label></td>
  </tr>
  <tr>
    <td class="tdBorder1">��ע:</td>
    <td class="tdBorder1">&nbsp;<textarea name="specificationRemark" cols="50" rows="5" id="specificationRemark"><?=$specificationRemark?></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="�ύ">&nbsp;&nbsp;<input type="reset" value="����"></td>
  </tr>
</table>
</FORM>

</body></html>