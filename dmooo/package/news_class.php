<?php
include_once('../inc/config.inc.php');
permissions('package_1_sel');
if ($_GET['del'])
{
	permissions('package_1_del');
	$sql_is="select * from gplat_packageclass where id=".$_GET['del'];
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	if ($data_is['issystem']==1)
	{
		echo("<script language=javascript>alert('������ǻ�����𣬲���ɾ��')</script>"); 
	}else{
		$sql_2="select id from gplat_packageclass2 where fid=".$_GET['del'];
		$result_2=mysql_query($sql_2);
		$num_2=mysql_num_rows($result_2);
		if ($num_2==0) {
			$sql="delete from gplat_packageclass where issystem<>1 and id=".$_GET['del'];
	        $result=mysql_query($sql);	
		}else {
			echo("<script language=javascript>alert('����ɾ������Ŀ�µ�����Ŀ��')</script>"); 
		}
	
	}
	
}
if ($_POST['up_name'])
{
	permissions('package_1_up');
	$up_name=$_POST['up_name'];
	$sql="update gplat_packageclass set name='$up_name' where id=".$_GET['id'];
	$result=mysql_query($sql);
}
if ($_POST['name'])
{
	permissions('package_1_in');
	$classIndex='news';
	$name=$_POST['name'];
	$issystem=0;
	$sql="insert into gplat_packageclass (name,classIndex,issystem) values ('".$name."','$classIndex','$issystem')";
	$result=mysql_query($sql);
}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">�ײ����</td>
    </tr>
  <?php
$sql4="select * from gplat_packageclass order by issystem desc, id asc";
$result4=mysql_query($sql4);
while ($date=mysql_fetch_assoc($result4))
{
	
	$id=$date['id'];
	$name=$date['name'];	  //��html��name
	$name1=$date['name'];     //��д��name
	if ($date['issystem']==1)
	{
		$name='<font color=red>'.$name.'</font>';
	}
	?>
<tr valign="middle">
	  <td class="tdBorder1">
	 <a href="news_class2.php?fid=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="<?=$name1?> / ����Ƶ������" class="thickbox"><?=$name?></a></td>
	 <td width="65%" class="tdBorder1"><form action="news_class.php?id=<?=$id?>" method="POST">
	&nbsp;
	<input type="text" name="up_name" size="20">
	<input type="submit" value="�޸�" class="button1">
	</form></td>
	<td width="5%" align="center" class="tdBorder1">
	<a href="news_class.php?del=<?=$id?>" onClick="return window.confirm('ȷ��ɾ��?')"><img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px"></a></td>
  </tr>
<?php
}
?>
<tr><td height="35" colspan="3" class="tdBorder1"><form action="" method="POST">
  &nbsp;
  <input type="text" name="name">
  <input type="submit" class="button1" value="���">
</form></td></tr>
</table>
</body></html>