<?php
include('../inc/config.inc.php');
if($_POST['add_service'])
{
	$userid=$_GET['userId'];  //��Աid	
	
	$submitTitle=$_POST['submitTitle'];   //Ͷ�߱���	
	$submitContent=$_POST['submitContent'];   //Ͷ������
	
	date_default_timezone_set('Asia/Shanghai');   //ʱ��
	$submitTime=date('Y-m-d H:i:s');  //Ͷ���ύʱ��
	
	$serviceNo=date('YmdHis');             //Ͷ�߱��
	$ii=array('0','1','2','3','4','5','6','7','8','9');
	shuffle($ii);
	for($i=0;$i<3;$i++)
	{
		$texe.=$text_array[$i];
	}
	$serviceNo=$serviceNo.$texe;  
	$status=1;   //Ͷ��״̬
	$serviceIndex=2;   //��������	

/********������д�����ݿ�***********/
$sql="insert into gplat_service(serviceNo,userid,submitTitle,submitContent,submitTime,processStatus,serviceIndex) values ('$serviceNo','$userid','$submitTitle','$submitContent','$submitTime','$status','$serviceIndex')";

$result=mysql_query($sql)or die(mysql_error());
if($result!=0)
{
	echo '<script>alert("�ύ�ɹ������ǻᾡ�촦��!");</script>';
    echo'<meta http-equiv="refresh" content="0; url=service.php?userId='.$userid.'"/>';
    exit;	
	
	}else
	{
		echo("<script language=javascript>alert('�ύʧ�ܣ����ڹ���Ա��ϵ')</script>");
	
		}

}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head><body>
<br>
<form action="" method="post">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">

 
  <tr>
    <td class="tdBorder1">����</td>
    <td class="tdBorder1"><span id="spry_submitTitle">
      <label>
        <input name="submitTitle" type="text" id="submitTitle" size="50">
      </label>
      <span class="textfieldRequiredMsg">*����</span></span></td>
  </tr>
  <tr>
    <td class="tdBorder1">���ݣ�</td>
    <td class="tdBorder1"><span id="spry_submitContent">
      <label>
        <textarea name="submitContent" id="submitContent" cols="50" rows="10"></textarea>
        ����ͳ�ƣ�<span id="countspry_submitContent">&nbsp;</span></label>
      <span class="textareaRequiredMsg">*����</span></span></td>
  </tr>
   <tr>
     <td class="tdBorder1">&nbsp;<input name="add_service" type="hidden" id="add_service" value="add_service"></td>
     <td class="tdBorder1">&nbsp;<input type="submit" value="�ύ" />
      <input type="reset" value="����" /></td>
   </tr>
</table>
</form>
<script type="text/javascript">
<!--
var spry_submitContent = new Spry.Widget.ValidationTextarea("spry_submitContent", {validateOn:["blur"], counterId:"countspry_submitContent", counterType:"chars_count", hint:"��ϸ��д"});
var spry_submitTitle = new Spry.Widget.ValidationTextField("spry_submitTitle", "none", {validateOn:["blur"]});
//-->
</script>
</body></html>