<?php
include_once('../inc/config.inc.php');
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

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="6" class="tdBorder1 titleBg1">֧���ӿ��б�</td>
    </tr> 
	<tr valign="middle">
	  <td align="center" valign="top" class="tdBorder1 tdBg1">����</td>
	  <td align="center" valign="top" class="tdBorder1 tdBg1">�ӿ�����</td>
	  <td align="center" valign="top" class="tdBorder1 tdBg1">�ӿ�����</td>
	  <td align="center" valign="top" class="tdBorder1 tdBg1">״̬</td>
	  <td align="center" valign="top" class="tdBorder1 tdBg1">�ӿ�����</td>
	  <td align="center" class="tdBorder1 tdBg1">����</td>
	  </tr>

<?php
$sql="select * from gplat_pay";
$result=mysql_query($sql);
while($data=mysql_fetch_assoc($result)){
	if($data['isclose']==1){
		$isstr='����';
	}else{
	    $isstr='�ر�';
	}
	$content.='<tr><td height="35" class="tdBorder1">'.$data['paysort'].'</td>
  <td height="35" class="tdBorder1">'.$data['payname'].'</td>
  <td class="tdBorder1">'.$data['paysay'].'</td>
  <td class="tdBorder1">'.$isstr.'</td>
  <td class="tdBorder1">&nbsp;'.$data['paytype'].'</td>
  <td align="center" class="tdBorder1"><a href="setPayApi.php?id='.$data['payid'].'">���ýӿ�</a></td>
</tr>';
	}
	echo"$content";
?>



</table>
</body></html>