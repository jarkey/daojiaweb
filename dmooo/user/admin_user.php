<?php
include('../inc/config.inc.php');

if($_POST['check'])
{
	foreach ($_POST['check'] as $id)
	{
		$sql="delete from user where id=$id";
		$result=mysql_query($sql);
		
	}
	 ExitMessage('ɾ���ɹ�');
}


if($_GET['del'])
{
$del=$_GET['del'];
$sql="delete from user where id=$del";
$result=mysql_query($sql);
if($result!=0)
	{
      ExitMessage('��ϲ����ɾ���ɹ�');
    }else
		{
	ExitMessage('ɾ��ʧ�ܣ��Ժ�����');
	}
}
if($_GET['modify'])
{
	$id=$_GET['modify'];
if($_POST['pass']||$_POST['phone']||$_POST['email'])
{
  if($_POST['pass'])
	  {
     $pass=$_POST['pass'];
	 $pass1=$_POST['pass1'];
     if($pass==$pass1)
		 {

	$pass=sha1($pass);
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	  $sql="update user set pass='$pass',phone='$phone',email='$email' where id=$id";
      $result=mysql_query($sql);
	  if($result!=0){
	  ExitMessage('�޸ĳɹ�');
	  }else{ExitMessage('���ݿ�����ʧ�ܣ��Ժ�����');}
	 }else
		 {
	  ExitMessage('����������벻һ��');
	 }
  }
$phone=$_POST['phone'];
	$email=$_POST['email'];
	  $sql="update user set phone='$phone',email='$email' where id=$id";
      
	  $result=mysql_query($sql);
	  if($result!=0){
	  ExitMessage('�޸ĳɹ�','adminmodify.php');
	  }else{ExitMessage('���ݿ�����ʧ�ܣ��Ժ�����');}
}
$sql="select * from user where id=$id";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
{
  $user=$date[name];
  $email=$date[email];
  //echo"$email";
 $phone=$date[phone];
echo"�û�����$user";

}

?>
<br>
<form action="" method="POST">
���룺<input type="password" name="pass" maxlength="12" ><br>
�ظ���<input type="password" name="pass1" maxlength="12"><br>
�绰��<input type="text" name="phone" maxlength="14" value="<?=$phone?>"><br>
���䣺<input type="text" name="email" maxlength="14" value="<?=$email?>"><br>
<input type="submit" value="�ύ�޸�">
</form>
<?php
}
?>
<a href="member_management.php">ȡ��</a>