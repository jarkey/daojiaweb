<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if ($_POST['title'])
{
	$title=$_POST['title'];
	$times=$_POST['times'];
	$content=$_POST['content'];
	$ip=$_POST['ip'];
	$name=$_POST['name'];
	$status=$_POST['status'];   //�Ƿ���
	$mp=$_POST['mp']; 
	$email=$_POST['email']; 
	//$uptime=$date['uptime'];  // ���ظ�ʱ��
	$id=$_GET['id'];
	$notice=$_POST['notice'];
	$clickNum=$_POST['clickNum'];
	$sql="update gplat_wenda set title='$title',times='$times',content='$content',ip='$ip', name='$name',status='$status', mp='$mp',email='$email',clickNum='$clickNum',notice='$notice' where id=".$_GET['id'];
    $result=mysql_query($sql) or die(mysql_error());
    //echo'<centent>'."��ϲ�����޸ĳɹ�".'</centent>';
	echo '<script>alert("��ϲ�����޸ĳɹ�!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
   
}
?>
<?php
$sql="select * from gplat_wenda where id=".$_GET['id'];
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
    $title=$date['title'];
	$times=$date['times'];
	$content=$date['content'];
	$ip=$date['ip'];
	$name=$date['name'];
	$status=$date['status'];   //�Ƿ���
	$uptime=$date['uptime'];  // ���ظ�ʱ��
	$id=$_GET['id'];
	$mp=$date['mp'];
	$email=$date['email'];
?><br>

<form action="revised.php?id=<?=$id?>" method="POST">
<table width="90%" align="center" cellspacing="1" bgcolor="#999999">
  <tr bgcolor="#FFFFFF"><td width="13%" height="30">&nbsp;����:
    </td>
    <td width="87%">&nbsp;
      <input name="title" type="text" value="<?=$title?>" size="50"></td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;�û���:    </td>
  <td height="30">&nbsp;
    <input type="text" name="name" value="<?=$name?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;����    </td>
  <td height="30">&nbsp;
    <textarea name="content" cols="70" rows="4" ><?=$content?></textarea></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;ʱ�䣺    </td>
  <td height="30">&nbsp;
    <input type="text" name="times" value="<?=$times?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;�û�ip��    </td>
  <td height="30">&nbsp;
    <input type="text" name="ip" value="<?=$ip?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;�绰��    </td>
  <td height="30">&nbsp;
    <input type="text" name="mp" value="<?=$mp?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;email��    </td>
  <td height="30">&nbsp;
    <input type="text" name="email" value="<?=$email?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;�������    </td>
  <td height="30">&nbsp;
    <input type="text" name="clickNum" value="<?=$date['clickNum']?>"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;����״̬:</td>
  <td height="30">&nbsp;
    <input type="radio" name="status" value="1" <?php if ($status==1) {
		echo'CHECKED';
	} ?>>������
    <input type="radio" name="status" value="2" <?php if ($status==2) {
		echo'CHECKED';
	} ?>>������
	<input type="radio" name="status" value="3" <?php if ($status==3) {
		echo'CHECKED';
	} ?>>�Ѵ���
    </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="30">&nbsp;�Ƿ񹫸�:</td>
  <td height="30">&nbsp;
    <input type="radio" name="notice" value="1" <?php if ($date['notice']==1) {
		echo'CHECKED';
	} ?>>
    ��
    <input type="radio" name="notice" value="0" <?php if ($date['notice']==0) {
		echo'CHECKED';
	} ?>>
    ��</td>
</tr>
<tr bgcolor="#FFFFFF"><td height="30" colspan="2">&nbsp;
  <input type="submit" class="button1" value="�޸�"></td></tr>
</table>
</form>

</body></html>