<?php
include_once('../inc/config.inc.php');
permissions('product_1_sel');
$pid=$_GET['fid'];
if ($_POST['tb_carte']) {
	permissions('product_1_in');
	$sql_is="select * from dmooo_productclass where id=".$pid;
	$result_is=mysql_query($sql_is);
	$data_is=mysql_fetch_assoc($result_is);
	$classIndex=$data_is['classIndex'];
    $tb_carte=$_POST['tb_carte'];
    $orderbySN=$_POST['orderbySN'];	
    $s_class=$_POST['s_class'];
    $s_class=$_POST['s_class'];  //��Ŀ����
	if($s_class!=''){
	foreach ($s_class as $link => $content ) {
	$s_class_str.=$content.',';
	}
	}else{ $s_class_str='0'; }
    $sql="insert into dmooo_productclass1 (name,fid,classIndex,orderbySN,s_class) values ('".$tb_carte."','".$pid."','".$classIndex."',".$orderbySN.",'$s_class_str')";

	$result=mysql_query($sql)or die(mysql_error());
}
if($_POST['update_name'])
{
	permissions('product_1_up');
	$name=$_POST['update_name'];
	$orderbySN=$_POST['update_orderbySN'];	
	$sql="update dmooo_productclass1 set name='$name',orderbySN=$orderbySN where id=".$_GET['update'];
	$result=mysql_query($sql);
	
}
if ($_GET['del']) {
	permissions('product_1_del');
	$sql="delete from dmooo_productclass1 where id=".$_GET['del'];
	$result=mysql_query($sql);
	
	}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
<tr>
  <td class="tdBorder1">����</td>
  <td align="center" class="tdBorder1">&nbsp;�޸�����</td>
  <td align="center" class="tdBorder1">����</td>
  <td align="center" class="tdBorder1">�޸�</td>
  <td align="center" class="tdBorder1">ɾ��</td>
</tr>
  <?php
$sql="select * from dmooo_productclass1 where fid='$pid' order by orderbySN desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date['id'];
?>
  <tr>
<td class="tdBorder1"><a href="news_class2.php?fid=<?=$id?>"><?=$date['name']?></a></td>
<form action="news_class1.php?update=<?=$id?>&fid=<?=$pid?>" method="POST">
 <td align="center" class="tdBorder1">
 <input type="hidden" value="<?=$pid?>">
 <input type="text" name="update_name" value="<?=$date['name']?>">&nbsp; &nbsp;</td>
 <td align="center" class="tdBorder1"><input name="update_orderbySN" type="text" size="4" value="<?=$date['orderbySN']?>"></td>
 <td align="center" class="tdBorder1"><input type="image" src="../images/inco_modify.gif" class="button1" value="�޸�"></td> 
 </form>
 <td align="center" class="tdBorder1"><a href="news_class1.php?del=<?=$id?>&fid=<?=$pid?>" onClick="return window.confirm('ɾ������ɾ������Ŀ�µ����м�¼��ȷ��ɾ����?')"><img src="../images/del.gif" alt="ɾ��" border="0" /></a></td>
</tr>
<?php
}
?>
</table>
<p><br>
  
</p>
<table border="0" cellspacing="0" cellpadding="0" align="center" class="tableCss4">
  <tr>
    <td class="tdBorder1">
<form action="news_class1.php?fid=<?=$pid?>" method="POST" style="margin-left:30px;">
      &nbsp;&nbsp;��Ӷ�������
&nbsp;&nbsp;���ƣ�<input type="hidden" value="<?=$pid?>">
<input  type="text" name="tb_carte">
<input name="orderbySN" type="text" id="orderbySN" value="1" size="4">
</span><input type="submit" class="button1" value="���"></form>    
    </td>
  </tr>
</table>

</body></html> 