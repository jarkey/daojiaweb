<?php
include_once('../inc/config.inc.php');
require("../../inc/phpmailer/class.phpmailer.php"); 
include_once('../../inc/mail_send.php');

/**********�޸�����*************/
if($_POST['up_service'])
{
	$processStatus=$_POST['processStatus'];	
	$submitTitle=$_POST['submitTitle'];	
	$submitContent=$_POST['submitContent'];	
	$serviceReply=$_POST['serviceReply'];	
	$processMan=$_POST['processMan'];
    $processTime=$_POST['processTime'];
	
$sql_up="update gplat_service set processStatus='$processStatus',submitTitle='$submitTitle',submitContent='$submitContent',serviceReply='$serviceReply',processMan='$processMan',processTime='$processTime' where serviceId=".$_GET['serviceId'];

$result_up=mysql_query($sql_up)or die(mysql_error());
if($result_up!=0)
{
 /******�ʼ�����********/
 if ($_POST['ifMail']==1)
  {
	  $sql="select * from gplat_service where serviceId=".$_GET['serviceId'];
	  $result=mysql_query($sql);
	  $data=mysql_fetch_assoc($result);	  
	  $userid=$data['userid'];
	  
	  $sql_user="select * from gplat_member where userid='$userid'";
	  $result_user=mysql_query($sql_user);
	  $data_user=mysql_fetch_assoc($result_user);
	  $email=$data_user['email'];
	  $username=$data_user['username'];	
	  
	  $status_str=serviceStatus($_POST['processStatus']);	    //������״̬
	  $mail_num=7;
	  include('../../inc/mail_content.php');  
	  $success=mail_userPass($mail_title,$mail_content,$email,$username);
  }
/********************/  
	
	echo '<script>alert("�޸ķ���ɹ�");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';	
}else{
	echo '<script>alert("�޸ķ���ʧ��");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		
	}
}	
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
$sql="select * from gplat_service where serviceId=".$_GET['serviceId'];
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$status=$data['processStatus'];
$i=serviceStatus($status);  //�жϷ�����״̬

?>
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<br>
<form action="<?=$filename?>?serviceId=<?=$_GET['serviceId']?>" method="post">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
   <tr>
     <td class="tdBorder1">������⣺</td>
     <td colspan="3" class="tdBorder1"><span id="sprytextfield1">
       <input name="submitTitle" type="text" id="submitTitle" value="<?=$data['submitTitle']?>" size="50">
      <span class="textfieldRequiredMsg">*����</span></span></td>
   </tr>
   <tr>
     <td width="100" class="tdBorder1">�������ݣ�</td>
     <td colspan="3" class="tdBorder1"><textarea name="submitContent" rows="4" cols="50" id="submitContent"><?=$data['submitContent']?></textarea></td>
    </tr>
   <tr>
     <td class="tdBorder1">�ظ����ݣ�</td>
     <td colspan="3" class="tdBorder1"><textarea name="serviceReply" rows="4" cols="50" id="serviceReply"><?=$data['serviceReply']?>
     </textarea></td>
   </tr>    
  <tr>
    <td class="tdBorder1">�ύ����ʱ�䣺</td>
    <td class="tdBorder1"><?=$data['submitTime']?></td>
    <td class="tdBorder1">����ʱ�䣺</td>
    <td class="tdBorder1">
    <?php 
	date_default_timezone_set('Asia/Shanghai');   //ʱ��
	if($data['processTime'])
	{
	$processTime=$data['processTime'];
	}else{
	$processTime=date('Y-m-d H:i:s');
	}
	?>
    <input name="processTime" type="text" id="processTime" value="<?=$processTime?>" size="20"></td>
  </tr>
  
  <tr>
    <td class="tdBorder1">����״̬��</td>
    <td class="tdBorder1"><?php 
  echo"$i";
 ?></td>
    <td class="tdBorder1">�޸�״̬��</td>
    <td class="tdBorder1"><select name="processStatus" id="processStatus">
      <option value="0" <?=selected($data['processStatus'],0)?>>��Ч</option>
      <option value="1" <?=selected($data['processStatus'],1)?>>δ����</option>
      <option value="2" <?=selected($data['processStatus'],2)?>>������</option>
      <option value="3" <?=selected($data['processStatus'],3)?>>�ѽ���</option>
    </select></td>
  </tr>
  
   <tr>
     <td class="tdBorder1">�����ʼ���</td>
     <td class="tdBorder1"><label>
       <input name="ifMail" type="checkbox" id="ifMail" value="1">
     �ʼ�����</label></td>
     <td class="tdBorder1">�ͷ���Ա��</td>
     <td class="tdBorder1"><textarea name="processMan" rows="2" cols="20" id="processMan"><?=$data['processMan']?></textarea></td>
   </tr>
   <tr>
     <td colspan="4" class="tdBorder1">&nbsp;
       <input type="submit" value="�ύ" />
       <input type="reset" value="����" />
      <input name="up_service" type="hidden" id="up_service" value="up_service">
      <input name="serviceId" type="hidden" id="serviceId" value="<?=$_GET['serviceId']?>"></td>
    </tr>
</table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
