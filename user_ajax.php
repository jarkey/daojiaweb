<?php
//include_once('inc/config.inc.php');    //用这个包含文件，会跟cart类冲突
include_once('inc/dbconfig.php');            //数据连接文件
require("inc/phpmailer/class.phpmailer.php"); 
include_once('inc/mail_send.php');

//判断验证码是否一致
if ($_POST['authimg']) {
	if ($_POST['authimg']!=$_COOKIE['authimg']) {
		$authimg='<font color="red">×输入错误</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
	}else{
		$a='b';
		$authimg='<font color="red">√</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
		
	}
	echo"$authimg";
}

if ($_POST['authimg1']) {
	if ($_POST['authimg1']!=$_SESSION['authimg']) {
		$authimg='<font color="red">×输入错误</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
	}else{
		$a='a';
		$authimg='<font color="red">√</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
		
	}
	echo"$authimg";
}


//判断用户名是否存在---登录
if ($_POST['username'] and !$_POST['password']){
 
	  if (strlen($_POST['username'])>=5 ) {   //用户名字节大小4，才开始计算
		  $username=$_POST['username'];
		  $sql="select userid from gplat_member where phone='$username'";
		  $result=mysql_query($sql);
		  $data=mysql_fetch_assoc($result);
		  if ($data['userid']>0)
		  {
			 $str='<font color="red">√</font>';	
			 $a.='a';
		  }else{
			 $str='<font color="red">×不存在</font>'; 
			
		  }
		  
	  }else{
		  $str='<font color="red">×最少5位</font>';
	  }
 		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}
//判断密码是否正确---登录
if ($_POST['username'] and $_POST['password']){
          $username=$_POST['username'];
		  $password=$_POST['password'];
		  $password=trim($password);
          $password=sha1($password);
	    
$sql="select * from gplat_member a,gplat_member_group b where (username='$username' or phone='$username') and (password='$password') and (b.groupid=a.groupid)";
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
 if ($data['userid']>0)
		  {
			 $str='<font color="red">√</font>';	
			 $a.='a';
		  }else{
			 $str='<font color="red">×错误</font>'; 
	  }
 		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}


//提交表单  登录
if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['authimg1']) and $a=='aa')
{
if ($_POST['authimg']) {
		if ($_POST['authimg']!=$_SESSION['authimg']) {
		$str='<script>window.location.href="user_login.php";</script>';
	   exit;
	   }
	}
	
	$name=$_POST['username'];
	$password=$_POST['password'];
	$password=trim($password);
    $password=sha1($password);
	
$sqlUser="select * from gplat_member a,gplat_member_group b where (username='$name' or phone='$name') and (password='$password') and (b.groupid=a.groupid)";


$resultUser=mysql_query($sqlUser);
$dataUser=mysql_fetch_assoc($resultUser);
if($dataUser!=0)
{

	$_SESSION['username']=$dataUser['phone'];
	$username=$_SESSION['username'];
	$_SESSION['userid']=$dataUser['userid'];
	$userid=$_SESSION['userid'];
	$_SESSION['groupid']=$dataUser['groupid'];	      //会员组ID
	$_SESSION['groupname']=$dataUser['name'];	      //会员组名
	$_SESSION['email']=$dataUser['email'];
	$_SESSION['point']=$dataUser['point'];
	$_SESSION['amount']=$dataUser['amount'];
	if($dataUser['img']==''){$_SESSION['img']='index_22.png';}else{$_SESSION['img']=$dataUser['img'];}
	
	
	date_default_timezone_set('Asia/Shanghai');// 加上这句就好了，纳闷了好几天
    $time=date('Y:m:d H:i:s');
	$sql_time="update gplat_member_info set lastlogintime='$time' where userid=".$userid;
	$result_time=mysql_query($sql_time);
	
	if ($_SESSION['user_login']!='') {
		
		 $str='<script>window.location.href="'.$_SESSION['user_login'].'";</script>';
	    exit();
	 }else {
	 if(isset($_COOKIE["u"])){
	  $str='<script>window.location.href="user_change.php?u=yes";</script>';		
	}else{
	  $str='<script>window.location.href="user_change.php";</script>';
	}
	$str=iconv('GBK','UTF-8',$str);

	
	}
	}else
	{
		$str='<script>window.location.href="user_login.php";</script>';
		 exit;
		
	}
	echo"$str";
}



//判断用户名是否唯一
/*if ($_POST['addUsername']){
  if(!(@eregi("^[A-Za-z]+[A-Za-z0-9]*",$_POST['addUsername']))){         //用户名只允许用数字和字母
	$str='<font color="red">×字母开头</font>';
  }else{
	  if (strlen($_POST['addUsername'])>=5) {   //用户名字节大小4，才开始计算
		  $username=$_POST['addUsername'];
		  $sql="select userid from gplat_member where username='$username'";
		  //echo"$sql";
		  $result=mysql_query($sql);
		  $data=mysql_fetch_assoc($result);
		  if ($data['userid']!=0)
		  {
			 $str='<font color="red">×已使用</font>';	 
		  }else{
			 $str='<font color="red">√</font>'; 
			 $a.='b';
		  }
		  
	  }else{
		  $str='<font color="red">×最少5位</font>';
	  }
  }		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}*/




//判断注册邮箱是否唯一
/*if($_POST['email']){
	if(preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\-\.])+/", $_POST['email'])){
		if (strlen($_POST['email'])>=4) {   //邮箱地址字节大小4，才开始计算
		$email=$_POST['email'];
		$sql="select userid from gplat_member where email='$email'";
	
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
			if ($data['userid']!=0)
			{
				$str='<font color="red">×已注册</font>';
			 }else{
				$str='<font color="red">√</font>';
				$a.='b';
			}
	    }	
    }
	else{
	$str='<font color="red">×格式错误</font>'; 
	}
	$str=iconv('GBK','UTF-8',$str);
	echo"$str";
}*/

//判断注册手机是否唯一
if($_POST['phone']){
	
		if (strlen($_POST['phone'])==11) {   
		$phone=$_POST['phone'];
		$sql="select userid from gplat_member where phone='$phone'";
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
			if ($data['userid']!=0)
			{
				$str='<font color="red">×已注册</font>';
			 }else{
				$str='<font color="red">√</font>';
				$a.='b';
			}
	    }	
    
	$str=iconv('GBK','UTF-8',$str);
	echo"$str";
}

//判断密码是否一致
if ($_POST['pwd1']) {
	    
	
	if (strlen($_POST['pwd1'])<=5)
	{
		$pwd='<font color="red">×最少6位数</font>';
	}else{
		if ($_POST['pwd']!=$_POST['pwd1']) {
		   $pwd='<font color="red">×密码不一致</font>';
		}else{
		   $pwd='√';
		   $a.='b';
		}
	 }
	
	$pwd=iconv('GBK','UTF-8',$pwd);	
	echo"$pwd";
}

//提交表单
if(!empty($_POST['pwd1']) and  !empty($_POST['authimg']) and !empty($_POST['phone']) and $a=='bbb')
{


	    $password=$_POST['pwd'];
		
	    $username=$_POST['phone'];
		$username=iconv('UTF-8','GBK',$username);
		
	    $email=$_POST['email'];
		$phone=$_POST['phone'];
	    $groupid=3;
		$password=sha1($password);
		$point=0;
		$amount=0;
		$recommended=$_COOKIE['u'];    //推荐人id
		$sql="insert into gplat_member (username,password,groupid,point,amount,recommended,phone) 
		values ('$username','$password','$groupid','$point','$amount','$recommended','$phone')";
		
		$result=mysql_query($sql)or die(mysql_error());
		if ($result!=0) {
			$userid=mysql_insert_id();
			date_default_timezone_set('Asia/Shanghai'); 
            $regtime=date('Y-m-d H:i:s');     //获取当前时间
            $lastlogintime=$regtime;
            $logintimes=1;
			$regip=$_SERVER["REMOTE_ADDR"];   //获取IP
			$sql_info="insert into gplat_member_info (userid,regtime,regip,lastlogintime,logintimes) 
			values ('$userid','$regtime','$regip','$lastlogintime','$logintimes')";
			//var_dump($sql_info);
			$result_info=mysql_query($sql_info)or die(mysql_error());
			$sql_det="insert into gplat_member_detail (userid) values ('$userid')";
			$result_det=mysql_query($sql_det);
			if ($result_info!=0 and $result_det!=0){
				$_SESSION['username']=$username;
	            $_SESSION['userid']=$userid;    //注册成功，生成SESSION值
				$_SESSION['email']=$email;

	/********会员注册赠送积分start************/	 
   // $num = $memberPointFree;
	//$lognote = "注册会员的赠送积分";
   // user_point($userid,$num,$lognote,1);	
	/********会员注册赠送积分end************/

	/********会员注册成功邮件发送start************/	
   // $password_temp=$_POST['pwd'];
	//$mail_num=6;
	//include('../inc/mail_content.php');
//	$success=mail_userPass($mail_title,$mail_content,$email,$username);
	/********会员注册成功邮件发送end************/

	
	/********读取最新的会员积分和帐户start************/	
	//readUserNewData($userid);
	/********读取最新的会员积分和帐户end************/		
	
	     // if($success==1){
			 if ($_SESSION['user_login']!='') {
		$user_register=$_SESSION['user_login'];
	 }else {
	 	$user_register='user_modifyData.php';
	//exit();
	}
	if(isset($_COOKIE["u"])){
	  $str='<script>window.location.href="user_change.php?u=yes";</script>';		
	}else{
	  $str='<script>window.location.href="user_change.php";</script>';
	}
	$str=iconv('GBK','UTF-8',$str);
	echo"$str";
			//}
			}
		}
	
	}


//会员中心 查看账户金额
if ($_POST['authimg_u']) {
	if ($_POST['authimg_u']!=$_SESSION['authimg']) {
		$content='<font color="red">×验证码错误</font>';
		$content=iconv('GBK','UTF-8',$content);	
	}else{
		$userid=$_SESSION['userid'];
		$sql="select amount from gplat_member where userid='$userid'";
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
		$content=$data['amount'];
		$content=iconv('GBK','UTF-8',$content);	
		
	}
	echo"$content";
}
?>