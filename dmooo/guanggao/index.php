<?php
include('../inc/config.inc.php');
?>
<?php
if($_POST['check'])
{
   if($_POST['RadioGroup1']==1){
	foreach ($_POST['check'] as $id)
	{
		$sql="delete from gplat_ad_add where id=$id";
		$result=mysql_query($sql);
		
	}
	}
	 if($_POST['RadioGroup1']==2){
	 
	 	foreach ($_POST['check'] as $id)
	{   
	    $fid=$_POST['fid'];
		$sql="update gplat_ad_add set fid='$fid' where id=$id";
		$result=mysql_query($sql);
		
	}
	 
	 }

}
if ($_GET['del'])
{
	$sql="delete from gplat_ad_add where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head><body>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#999999" class="tableCss3">
  <tr><td width="50%" height="35" class="tdBorder1">
<form action="" method="GET">
&nbsp;���
<select name="sous_fid">
<option value="">--����--</option>
<?php
$sql="select * from gplat_ad_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	if($_GET['sous_fid']==$id){$c_str='selected';}else{$c_str='';}
	?>
	<option value="<?=$id?>" <?=$c_str?>><?=$name?></option>
	<?php
    }
?>
</select>
&nbsp;&nbsp;
<input type="submit" class="button1" value="����">
</form></td>
<td class="tdBorder1">&nbsp;&nbsp;��ǰ���:
<?php 
if ($_POST['sous_fid'])
{
	$sql="select * from gplat_ad_class where id=".$_GET['sous_fid'];
	$result=mysql_query($sql);
	$date=mysql_fetch_assoc($result);
	echo $date['name'];
}else{
	echo'ȫ��';
}
?></td>
<td width="100" align="center" class="tdBorder1"><a href="add.php?fid=<?=$_GET['sous_fid']?>" class="red1Href">[����¹��]</a></td>
  </tr>
</table>
<form action="" method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="5" class="tdBorder1 titleBg1">����б�</td>
    </tr>   
	<tr align="center" valign="middle">
	  <td class="tdBorder1 tdBg1">ѡ��</td>
	<td class="tdBorder1 tdBg1">����</td>
	<td class="tdBorder1 tdBg1">ͼƬ</td>
	<td class="tdBorder1 tdBg1">����</td>
	
	<td class="tdBorder1 tdBg1">����</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
if($_GET['sous_fid'])
{
$sql="select id from gplat_ad_add where fid=".$_GET['sous_fid'];
}else{
$sql="select id from gplat_ad_add ";
}

$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}
if($_GET['sous_fid'])
{
$sous_fid=$_GET['sous_fid'];
$sql="select * from  gplat_ad_add where fid='$sous_fid' order by id desc limit $page_one,$num";
}else{
$sql="select * from  gplat_ad_add order by id desc limit $page_one,$num";
}
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$adTitle=$date['adTitle'];
	$adTitlePic=$date['adTitlePic'];
	$addUrl=$date['addUrl'];
	$id=$date['id'];
	?>
	<tr align="center" valign="middle"><td height="25" class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>">
</td><td class="tdBorder1"><?=$adTitle?>
  &nbsp;</td>
	<td class="tdBorder1"><a href="../../userfiles/<?=$adTitlePic?>" target="_blank"><img src="../../userfiles/<?=$adTitlePic?>" height="50" /></a>
	  &nbsp;</td>
	<td class="tdBorder1"><?=$addUrl?></font></td>

	<td class="tdBorder1">
	  <a href="revised.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="�ʼ����� / ��Ϣ�޸�" class="thickbox"><img src="../images/xiug.gif" alt="�޸�" width="14" height="15" border="0"></a>&nbsp;&nbsp;<a href="index.php?del=<?=$id?>&sous_fid=<?=$_GET['sous_fid']?>" onClick="return window.confirm('ȷ��ɾ��?')"><img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0"></a></td>
    </tr>
	<?php
}
?>

</table>
<table border="0" align="center" cellpadding="0"  cellspacing="0" class="tableCss4">
<tr>
  <td width="40%" height="30" class="tdBorder1" ><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  <td class="tdBorder1">&nbsp;
    <input type=button class="button1" onClick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="button1" onClick=selectOther(document.aa) value="����">
    <input type=reset class="button1" value="ȡ��">    &nbsp;<label>&nbsp;
  <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0">ɾ��
  <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">
ת�� &nbsp;ת�Ƶ���
<select name="fid2">
  <?php
$sql="select * from gplat_ad_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	?>
  <option value="<?=$id?>">
  <?=$name?>
  </option>
  <?php
}
?>
</select>
<input type="submit" class="button1" value="�ύ">
</label></td>
</tr>
</table>
<script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
</script>


</form>

<p>&nbsp;</p>
</body></html>