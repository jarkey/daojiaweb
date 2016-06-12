<?php
include_once('../inc/config.inc.php');
permissions('user_2_up');
$userId=$_GET['userId'];
if ($_POST['note']) {
	$note1=$_POST['note'];
	$sql_note="update gplat_member_info set note='$note1' where userid=$userId";
	//echo"$sql_note";
	$result_note=mysql_query($sql_note) or die(mysql_error());
	echo '<script>alert("恭喜您，修改成功!");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';
}

$sql="select note from gplat_member_info where userid=$userId";
$result=mysql_query($sql);
$date=mysql_fetch_assoc($result);
$note=$date['note'];

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head>
<body background="../images/bg.gif">
<br>

<form action="<?=$filename?>?userId=<?=$userId?>" method="POST" style="margin:10px;">
<textarea name="note" rows="4" cols="50">
<?=$note?>
</textarea>
<br>
<br>
<input type="submit" class="button1" value="修改">
</form>
</body>
</html>