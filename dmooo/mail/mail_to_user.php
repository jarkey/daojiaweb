<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
<tr align="center"><td class="tdBorder1 tdBg1">id</td>
<td class="tdBorder1 tdBg1">������</td>
<td class="tdBorder1 tdBg1">email</td>
<td class="tdBorder1 tdBg1">�Ƿ�ɹ�</td>
<td class="tdBorder1 tdBg1">��ʱ��</td>
<td class="tdBorder1 tdBg1">�Ƿ��</td>
</tr>
<?php
$mail_user_id=$_GET['mail_user_id'];
$sql="select * from gplat_mailToLog where mail_id=".$mail_user_id;
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$user=$date[user];
	$mail_add=$date[mail_add];
	$success=$date[success];
	if ($success==1){
		$s='��';
	}else{
		$s='��';
	}
	
	$ifopen=$date[ifopen];
	if ($ifopen==1)
	{
		$i='��';
	}else{
		$i='��';
	}
	?>
<tr align="center"><td class="tdBorder1"><?=$id?></td>
<td class="tdBorder1"><?=$user?></td>
<td class="tdBorder1"><?=$mail_add?></td>
<td class="tdBorder1"><?=$s?></td>
<td class="tdBorder1"><?=$date[opentime]?>
  &nbsp;</td>
<td class="tdBorder1"><?=$i?></td>
</tr>	
	<?php
}
?>
</table>
</body></html>