<?php 
include_once('../../inc/config.inc.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>DMOOO_SHOP网上商店系统</TITLE>
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
$pid=$_GET['class'];
//$sql="select * from gplat_productclass where classIndex='$pid' order by orderbySN asc";
$sql="select * from dmooo_productclass order by id asc";
$result=mysql_query($sql);
static $num=1;
while ($date=mysql_fetch_assoc($result))
{
	$num++;
	$id=$date['id'];
	$name=$date['name'];
	?><div id="KB<?=$num?>Parent" class="parent">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr id="productManage01" > 
        <td width="20"><img src="../images/plus.gif" border=0></td>
        
            <td valign="bottom"><a href="news_left1.php?fid=<?=$id?>" ><?=$name?></a></td>
      </tr>
    </table>
</div>
 
          <?php
}
?>
        </table>
<div style="padding:10px;">
<a href="../product_left.php"><img src="../images/back_navigation_button.jpg" width="100" height="29" border="0"></a>
</div>
</td>
  </tr>
</table>


</body>
</html>
