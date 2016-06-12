<?php
include_once('../inc/config.inc.php');

if($_POST['payname']){
	$isclose=$_POST['isclose'];
	$payname=$_POST['payname'];
	$paysay=$_POST['paysay'];
	$payuser=$_POST['payuser'];
	$payemail=$_POST['payemail'];
	$paykey=$_POST['paykey'];
	$payfee=$_POST['payfee'];
	$sql="update gplat_pay set isclose='$isclose',paykey='$paykey',payfee='$payfee',payname='$payname',paysay='$paysay',payuser='$payuser',payemail='$payemail' where payid=".$_GET['id'];
	
	$result=mysql_query($sql);
	
	echo '<script>alert("修改成功");top.mainFrame.rightFrame.location.href="payApi.php";</script>';	
	}


$sql_q="select * from gplat_pay where payid=".$_GET['id'];
$result_q=mysql_query($sql_q);
$data=mysql_fetch_assoc($result_q);
?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableCss4" align="center">
<form action="<?=$filename?>?id=<?=$_GET['id']?>" method="POST">  
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">配置接口</td>
    </tr> 
<tr>
  <td align="center" class="tdBorder1">接口类型</td>
  <td class="tdBorder1">&nbsp;<?=$data['paytype']?></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">接口状态</td>
  <td class="tdBorder1">
   <input type="radio" name="isclose" value="1" <?=checked_v($data['isclose'],1)?>>
开启
  <input type="radio" name="isclose" value="0" <?=checked_v($data['isclose'],0)?>>
关闭
 </td>
</tr>
<tr>
    <td width="100" align="center" class="tdBorder1">

 接口名称
  
<br></td>
    <td class="tdBorder1"><input name="payname" type="text" id="payname" value="<?=$data['payname']?>"></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">接口描述</td>
  <td class="tdBorder1"><textarea name="paysay" cols="65" rows="6" id="paysay"><?=$data['paysay']?></textarea></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">商户号</td>
  <td class="tdBorder1"><input name="payuser" type="text" id="payuser"  size="35" value="<?=$data['payuser']?>"></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">支付宝帐号</td>
  <td class="tdBorder1"><input name="payemail" type="text" id="payemail"  size="35" value="<?=$data['payemail']?>"></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">密 钥</td>
  <td class="tdBorder1"><input name="paykey" type="text" id="paykey"  size="35" value="<?=$data['paykey']?>"></td>
</tr>
<tr>
  <td align="center" class="tdBorder1">手续费</td>
  <td class="tdBorder1"><input name="payfee" type=text id="payfee"  size="35" value="<?=$data['payfee']?>">
% </td>
</tr>
<tr>
  <td class="tdBorder1">&nbsp;</td>
  <td class="tdBorder1"><input type="submit" class="button1" value="修改"></td>
</tr>
</form>
</table>
</body></html>