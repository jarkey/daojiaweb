<?php 
include_once('../inc/config.inc.php');
?>
<?php 
/*   ����ʼ�ϵͳ����
if($_POST['host'])
{
$host=$_POST['host'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$fromname=$_POST['fromname'];
$host_name=$_POST['host_name'];
$sql="insert into gplat_mail_admin (host,username,pass,email,fromname,host_name) values ('$host','$username','$pass','$email','$fromname','$host_name')";
$result=mysql_query($sql);
}
*/
?>
<?php 
  //�޸��ʼ�ϵͳ����
if($_POST['host'])
{
$host=$_POST['host'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$fromname=$_POST['fromname'];
$host_name=$_POST['host_name'];
$sql="update gplat_mail_admin set     host='$host',username='$username',pass='$pass',email='$email',fromname='$fromname',host_name='$host_name' where id=1";
$result=mysql_query($sql);
}
?>
<?php
$id=1;
$sql2="select * from `gplat_mail_admin` where id=1 ";
$result2=mysql_query($sql2)or die(mysql_error());
$date=mysql_fetch_array($result2);
?>
<html>
<head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="" method="post">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
    <tr>
    <td colspan="2" align="left" class="tdBorder1 titleBg1">ϵͳ����</td>
    </tr>
  <tr>
    <td width="17%" align="left" class="tdBorder1">&nbsp;����SMTP��</td>
    <td width="83%" class="tdBorder1">&nbsp;
      <input name="host" type="text" id="host" value="<?=$date[host]?>" size="30" /> 
      &nbsp;(����mail.g-ya.cn)</td>
  </tr>
  <tr>
    <td align="left" class="tdBorder1">&nbsp;�ʼ��û�����</td>
    <td class="tdBorder1"><label>
      &nbsp;
      <input name="username" type="text" id="username" value="<?=$date[username]?>" size="30" />
      &nbsp;(����admin@g-ya.cn)</label></td>
  </tr>
  <tr>
    <td align="left" class="tdBorder1">&nbsp;�������룺</td>
    <td class="tdBorder1"><label>
      &nbsp;
      <input name="pass" type="text" id="pass"  value="<?=$date[pass]?>" size="30"/>
      &nbsp;(����123456)</label></td>
  </tr>
  <tr>
    <td align="left" class="tdBorder1">&nbsp;������email��</td>
    <td class="tdBorder1"><label>
      &nbsp;
      <input name="email" type="text" id="email" value="<?=$date[email]?>" size="30" />
      &nbsp;(����admin@g-ya.cn)</label></td>
  </tr>
  <tr>
    <td align="left" class="tdBorder1">&nbsp;������������</td>
    <td class="tdBorder1"><label>
      &nbsp;
      <input name="fromname" type="text" id="fromname" value="<?=$date[fromname]?>" size="30" />
      &nbsp;(�����Ͼ����ſƼ����޹�˾)</label></td>
  </tr>
    <tr>
    <td align="left" class="tdBorder1">&nbsp;ϵͳ������ַ��</td>
    <td class="tdBorder1"><label>
      &nbsp;
      <input name="host_name" type="text" id="host_name" value="<?=$date[host_name]?>" size="30" />
&nbsp;(����http://www.g-ya.cn,���Ҫ��&quot;/&quot;)</label></td>
  </tr>
  
   <tr>
    <td align="left" class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1"><label>
       &nbsp;&nbsp;
       <input name="button" type="submit" class="button1" id="button" value="�ύ" />
    </label></td>
  </tr>
</table>
</form>
</body>
</html>