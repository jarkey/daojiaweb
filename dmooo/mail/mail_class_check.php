<?php
include_once('../inc/config.inc.php');
?>
<html>
<head>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<?php
if ($_POST['mail_class_check']){
	
$mail_class_check=$_POST['mail_class_check'];

$_SESSION['mail_class_check']=$mail_class_check;

echo"��һ����д�ʼ�����";
exit;
}

?>

<div style="width:90%; margin:10px;">
    <form action="" method="POST">
    <?php
    $sql="select * from gplat_mail_class order by id desc";
    $result=mysql_query($sql);
    while ($date=mysql_fetch_assoc($result))
    {
    $id=$date[id];
    $name=$date[name];
    ?>
    <input type="checkbox" name="mail_class_check[]" value ="<?=$id?>"><?=$name?>
    <?php
    }
    ?><br /><br>

    <input type="submit" class="button1" value="ȷ��">
    </form>
</div>

</body></html>