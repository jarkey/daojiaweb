<?php
include('../inc/config.inc.php');

if($_POST['check'])
{
	foreach ($_POST['check'] as $id)
	{
		$sql="delete from user where id=$id";
		$result=mysql_query($sql);
		
	}
	 ExitMessage('删除成功');
}


if($_GET['del'])
{
$del=$_GET['del'];
$sql="delete from user where id=$del";
$result=mysql_query($sql);
if($result!=0)
	{
      ExitMessage('恭喜您，删除成功');
    }else
		{
	ExitMessage('删除失败，稍后再试');
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
	  ExitMessage('修改成功');
	  }else{ExitMessage('数据库连接失败，稍后再试');}
	 }else
		 {
	  ExitMessage('您输入的密码不一致');
	 }
  }
$phone=$_POST['phone'];
	$email=$_POST['email'];
	  $sql="update user set phone='$phone',email='$email' where id=$id";
      
	  $result=mysql_query($sql);
	  if($result!=0){
	  ExitMessage('修改成功','adminmodify.php');
	  }else{ExitMessage('数据库连接失败，稍后再试');}
}
$sql="select * from user where id=$id";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
{
  $user=$date[name];
  $email=$date[email];
  //echo"$email";
 $phone=$date[phone];
echo"用户名：$user";

}

?>
<br>
<form action="" method="POST">
密码：<input type="password" name="pass" maxlength="12" ><br>
重复：<input type="password" name="pass1" maxlength="12"><br>
电话：<input type="text" name="phone" maxlength="14" value="<?=$phone?>"><br>
邮箱：<input type="text" name="email" maxlength="14" value="<?=$email?>"><br>
<input type="submit" value="提交修改">
</form>
<?php
}
?>
<a href="member_management.php">取消</a>