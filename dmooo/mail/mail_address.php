<?php
include('../inc/config.inc.php');
?>
<?php
//$fid=$_GET['fid'];
if ($_POST['add_mail'])
{
	$fid=$_POST['fid'];
    $company=$_POST['company'];
	$user=$_POST['user'];
	$mail=$_POST['add_mail'];
	$user_id=$_POST['user_id'];
	$sql1="select id from gplat_mail_add where mail='$mail'";
	$result1=mysql_query($sql1);
	$date1=mysql_fetch_assoc($result1);
	if ($date1[id]!=0){
	echo("<script language=javascript>alert('������ʼ���ַ�Ѿ����ڣ�����Ҫ�ټ���');</script>");
   }else{
   	
   	$sql="insert into gplat_mail_add (mail,user,fid,user_id,company) values 
	('".$mail."','".$user."','".$fid."','".$user_id."','".$company."')";
   $result=mysql_query($sql);
   }
}
if($_POST['check'])
{
   if($_POST['RadioGroup1']==1){
	foreach ($_POST['check'] as $id)
	{
		$sql="delete from gplat_mail_add where id=$id";
		$result=mysql_query($sql);
		
	}
	}
	 if($_POST['RadioGroup1']==2){
	 
	 	foreach ($_POST['check'] as $id)
	{   
	    $fid=$_POST['fid'];
		$sql="update gplat_mail_add set fid='$fid' where id=$id";
		$result=mysql_query($sql);
		
	}
	 
	 }

}
if ($_GET['del'])
{
	$sql="delete from gplat_mail_add where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('�����ַ����ȷ');
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
</head><body>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#999999" class="tableCss3">
  <tr><td width="50%" height="35" class="tdBorder1">
<form action="" method="post">
&nbsp;���
<select name="sous_fid">
<option value="">--����--</option>
<?php
$sql="select * from gplat_mail_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	?>
	<option value="<?=$id?>"><?=$name?></option>
	<?php
    }
?>
</select>
&nbsp;&nbsp;
<input type="submit" class="button1" value="����">
</form></td>
<td class="tdBorder1">&nbsp;&nbsp;��ǰ���:
<?php 
if ($_POST['sous_fid'])
{
	$sql="select * from gplat_mail_class where id=".$_POST['sous_fid'];
	$result=mysql_query($sql);
	$date=mysql_fetch_assoc($result);
	echo"$date[name]";
}else{
	echo'ȫ��';
}
?></td>
<td width="100" align="center" class="tdBorder1"><a href="#add" class="red1Href">[����µ�ַ]</a></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="" method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="5" class="tdBorder1 titleBg1">�ʼ���ַ�б�</td>
    </tr>   
	<tr align="center" valign="middle">
	  <td class="tdBorder1 tdBg1">ѡ��</td>
	<td class="tdBorder1 tdBg1">��˾��</td>
	<td class="tdBorder1 tdBg1">��ϵ��</td>
	<td class="tdBorder1 tdBg1">email</td>
	
	<td class="tdBorder1 tdBg1">����</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
if($_POST['sous_fid'])
{
$sql="select id from gplat_mail_add where fid=".$_POST['sous_fid'];
}else{
$sql="select id from gplat_mail_add ";
}
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}
if($_POST['sous_fid'])
{
$sous_fid=$_POST['sous_fid'];
$sql="select * from  gplat_mail_add where fid='$sous_fid' order by id desc limit $page_one,$num";
}else{
$sql="select * from  gplat_mail_add order by id desc limit $page_one,$num";
}
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$company=$date['company'];
	$user=$date['user'];
	$mail=$date['mail'];
	$id=$date['id'];
	$mail_exit=$date['mail_exit'];
	?>
	<tr align="center" valign="middle"><td height="25" class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>">
</td><td class="tdBorder1"><?=$company?>
  &nbsp;</td>
	<td class="tdBorder1"><?=$user?>
	  &nbsp;</td>
	<td class="tdBorder1"><font color="<?php if($mail_exit==1){echo'#009900';}?>"><?=$mail?></font></td>

	<td class="tdBorder1">
	  <a href="mail_revised.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="�ʼ����� / ��Ϣ�޸�" class="thickbox"><img src="../images/xiug.gif" alt="�޸�" width="14" height="15" border="0"></a>&nbsp;&nbsp;<a href="mail_address.php?del=<?=$id?>" onClick="return window.confirm('ȷ��ɾ��?')"><img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0"></a></td>
    </tr>
	<?php
}
?>

</table>
<table border="0" align="center" cellpadding="0"  cellspacing="0" class="tableCss4">
<tr>
  <td width="40%" height="30" class="tdBorder1" ><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  <td class="tdBorder1">&nbsp;
    <input type=button class="button1" onClick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="button1" onClick=selectOther(document.aa) value="����">
    <input type=reset class="button1" value="ȡ��">    &nbsp;<label>&nbsp;
  <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0">ɾ��
  <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">
ת�� &nbsp;ת�Ƶ���
<select name="fid2">
  <?php
$sql="select * from gplat_mail_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	?>
  <option value="<?=$id?>">
  <?=$name?>
  </option>
  <?php
}
?>
</select>
<input type="submit" class="button1" value="�ύ">
</label></td>
</tr>
</table>
<script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
</script>


</form>

<p>&nbsp;</p>
<form action="mail_address.php" method="POST">
  <a name="add"></a>
  <table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" class="tableCss4">
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">����ʼ���ַ</td>
    </tr>   
  <tr><td height="30" class="tdBorder1">&nbsp;��˾����:
  <input type="text" name="company">
  </td>
  <td class="tdBorder1">&nbsp;��&nbsp;ϵ&nbsp;��:
    <input type="text" name="user"></td>
</tr>
<tr>
  <td height="30" class="tdBorder1">&nbsp;�ʼ���ַ:
    <input name="add_mail" type="text" id="add_mail" onBlur="MM_validateForm('add_mail','','RisEmail');return document.MM_returnValue">
    </td>
  <td height="30" class="tdBorder1">&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;��:
    <select name="fid">
      <?php
$sql="select * from gplat_mail_class order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
	?>
      <option value="<?=$id?>">
        <?=$name?>
        </option>
      <?php
}
?>
      </select></td>
</tr>
<tr>
  <td height="30" colspan="2" class="tdBorder1">&nbsp;
    <input type="submit" class="button1" value="����ʼ���ַ">
    </td>
</tr>
</table>
</form>
</body></html>