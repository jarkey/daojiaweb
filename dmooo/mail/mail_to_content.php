<?php
include_once('../inc/config.inc.php');
?>
<?php
$mail_to_id=$_GET['mail_to_id'];
$sql="select * from gplat_mailLog where id=".$mail_to_id;
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$times=$date[times];
$mail_title=$date[mail_title];
$mail_content=$date[mail_content];
?>
<table border="1px" width="80%" align="center">
<tr><td>标题：<?=$mail_title?> </td></tr>
<tr><td>内容：<?=$mail_content?></td></tr>
<tr><td>时间：<?=$times?></td></tr>
</table>