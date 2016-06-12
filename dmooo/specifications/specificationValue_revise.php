<?php
include_once('../inc/config.inc.php');

if ($_POST['content'])
{
	$id=$_GET['id'];
	$content=$_POST['content'];
	$sort=$_POST['sort'];

	
	$sql="update gplat_specificationvalue set content='$content',sort='$sort' where id =".$_GET['id'];
	$result=mysql_query($sql);
	if($result!=0)
	{
	    echo '<script>alert("修改成功");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
		//exit;
	}
}
?>

<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
$sql="select * from gplat_specificationvalue where id=".$_GET['id'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
//$id=$_GET['id'];
$id=$data['id'];
$content=$data['content'];
$sort=$data['sort'];
?><br>
<FORM action="specificationValue_revise.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td class="tdBorder1">规格值:</td>
    <td class="tdBorder1">&nbsp;<input name="content" type="text" size="40" id="content" value="<?=$content?>"> 
      </td>
  </tr>
  
  <tr>
    <td class="tdBorder1">顺序:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" id="sort" value="<?=$sort?>"></td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>
  </tr>
</table>
</FORM>

</body></html>