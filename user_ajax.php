<?php
//include_once('inc/config.inc.php');    //����������ļ������cart���ͻ
include_once('inc/dbconfig.php');            //���������ļ�
require("inc/phpmailer/class.phpmailer.php"); 
include_once('inc/mail_send.php');

//�ж���֤���Ƿ�һ��
if ($_POST['authimg']) {
	if ($_POST['authimg']!=$_COOKIE['authimg']) {
		$authimg='<font color="red">���������</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
	}else{
		$a='b';
		$authimg='<font color="red">��</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
		
	}
	echo"$authimg";
}

if ($_POST['authimg1']) {
	if ($_POST['authimg1']!=$_SESSION['authimg']) {
		$authimg='<font color="red">���������</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
	}else{
		$a='a';
		$authimg='<font color="red">��</font>';
		$authimg=iconv('GBK','UTF-8',$authimg);	
		
	}
	echo"$authimg";
}


//�ж��û����Ƿ����---��¼
if ($_POST['username'] and !$_POST['password']){
 
	  if (strlen($_POST['username'])>=5 ) {   //�û����ֽڴ�С4���ſ�ʼ����
		  $username=$_POST['username'];
		  $sql="select userid from gplat_member where phone='$username'";
		  $result=mysql_query($sql);
		  $data=mysql_fetch_assoc($result);
		  if ($data['userid']>0)
		  {
			 $str='<font color="red">��</font>';	
			 $a.='a';
		  }else{
			 $str='<font color="red">��������</font>'; 
			
		  }
		  
	  }else{
		  $str='<font color="red">������5λ</font>';
	  }
 		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}
//�ж������Ƿ���ȷ---��¼
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
			 $str='<font color="red">��</font>';	
			 $a.='a';
		  }else{
			 $str='<font color="red">������</font>'; 
	  }
 		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}


//�ύ��  ��¼
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
	$_SESSION['groupid']=$dataUser['groupid'];	      //��Ա��ID
	$_SESSION['groupname']=$dataUser['name'];	      //��Ա����
	$_SESSION['email']=$dataUser['email'];
	$_SESSION['point']=$dataUser['point'];
	$_SESSION['amount']=$dataUser['amount'];
	if($dataUser['img']==''){$_SESSION['img']='index_22.png';}else{$_SESSION['img']=$dataUser['img'];}
	
	
	date_default_timezone_set('Asia/Shanghai');// �������ͺ��ˣ������˺ü���
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



//�ж��û����Ƿ�Ψһ
/*if ($_POST['addUsername']){
  if(!(@eregi("^[A-Za-z]+[A-Za-z0-9]*",$_POST['addUsername']))){         //�û���ֻ���������ֺ���ĸ
	$str='<font color="red">����ĸ��ͷ</font>';
  }else{
	  if (strlen($_POST['addUsername'])>=5) {   //�û����ֽڴ�С4���ſ�ʼ����
		  $username=$_POST['addUsername'];
		  $sql="select userid from gplat_member where username='$username'";
		  //echo"$sql";
		  $result=mysql_query($sql);
		  $data=mysql_fetch_assoc($result);
		  if ($data['userid']!=0)
		  {
			 $str='<font color="red">����ʹ��</font>';	 
		  }else{
			 $str='<font color="red">��</font>'; 
			 $a.='b';
		  }
		  
	  }else{
		  $str='<font color="red">������5λ</font>';
	  }
  }		  
$str=iconv('GBK','UTF-8',$str);
echo"$str";
}*/




//�ж�ע�������Ƿ�Ψһ
/*if($_POST['email']){
	if(preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\-\.])+/", $_POST['email'])){
		if (strlen($_POST['email'])>=4) {   //�����ַ�ֽڴ�С4���ſ�ʼ����
		$email=$_POST['email'];
		$sql="select userid from gplat_member where email='$email'";
	
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
			if ($data['userid']!=0)
			{
				$str='<font color="red">����ע��</font>';
			 }else{
				$str='<font color="red">��</font>';
				$a.='b';
			}
	    }	
    }
	else{
	$str='<font color="red">����ʽ����</font>'; 
	}
	$str=iconv('GBK','UTF-8',$str);
	echo"$str";
}*/

//�ж�ע���ֻ��Ƿ�Ψһ
if($_POST['phone']){
	
		if (strlen($_POST['phone'])==11) {   
		$phone=$_POST['phone'];
		$sql="select userid from gplat_member where phone='$phone'";
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
			if ($data['userid']!=0)
			{
				$str='<font color="red">����ע��</font>';
			 }else{
				$str='<font color="red">��</font>';
				$a.='b';
			}
	    }	
    
	$str=iconv('GBK','UTF-8',$str);
	echo"$str";
}

//�ж������Ƿ�һ��
if ($_POST['pwd1']) {
	    
	
	if (strlen($_POST['pwd1'])<=5)
	{
		$pwd='<font color="red">������6λ��</font>';
	}else{
		if ($_POST['pwd']!=$_POST['pwd1']) {
		   $pwd='<font color="red">�����벻һ��</font>';
		}else{
		   $pwd='��';
		   $a.='b';
		}
	 }
	
	$pwd=iconv('GBK','UTF-8',$pwd);	
	echo"$pwd";
}

//�ύ��
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
		$recommended=$_COOKIE['u'];    //�Ƽ���id
		$sql="insert into gplat_member (username,password,groupid,point,amount,recommended,phone) 
		values ('$username','$password','$groupid','$point','$amount','$recommended','$phone')";
		
		$result=mysql_query($sql)or die(mysql_error());
		if ($result!=0) {
			$userid=mysql_insert_id();
			date_default_timezone_set('Asia/Shanghai'); 
            $regtime=date('Y-m-d H:i:s');     //��ȡ��ǰʱ��
            $lastlogintime=$regtime;
            $logintimes=1;
			$regip=$_SERVER["REMOTE_ADDR"];   //��ȡIP
			$sql_info="insert into gplat_member_info (userid,regtime,regip,lastlogintime,logintimes) 
			values ('$userid','$regtime','$regip','$lastlogintime','$logintimes')";
			//var_dump($sql_info);
			$result_info=mysql_query($sql_info)or die(mysql_error());
			$sql_det="insert into gplat_member_detail (userid) values ('$userid')";
			$result_det=mysql_query($sql_det);
			if ($result_info!=0 and $result_det!=0){
				$_SESSION['username']=$username;
	            $_SESSION['userid']=$userid;    //ע��ɹ�������SESSIONֵ
				$_SESSION['email']=$email;

	/********��Աע�����ͻ���start************/	 
   // $num = $memberPointFree;
	//$lognote = "ע���Ա�����ͻ���";
   // user_point($userid,$num,$lognote,1);	
	/********��Աע�����ͻ���end************/

	/********��Աע��ɹ��ʼ�����start************/	
   // $password_temp=$_POST['pwd'];
	//$mail_num=6;
	//include('../inc/mail_content.php');
//	$success=mail_userPass($mail_title,$mail_content,$email,$username);
	/********��Աע��ɹ��ʼ�����end************/

	
	/********��ȡ���µĻ�Ա���ֺ��ʻ�start************/	
	//readUserNewData($userid);
	/********��ȡ���µĻ�Ա���ֺ��ʻ�end************/		
	
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


//��Ա���� �鿴�˻����
if ($_POST['authimg_u']) {
	if ($_POST['authimg_u']!=$_SESSION['authimg']) {
		$content='<font color="red">����֤�����</font>';
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