<?php 
include('../inc/config.inc.php');

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=��Ա�����.xls");

$tx='��Ա�����';   
echo   $tx."\n\n";   
//����������£�   
echo   "�û���"."\t"; 
echo   "��ʵ����"."\t"; 
echo   "�Ա�"."\t"; 
echo   "�ֻ�"."\t"; 
echo   "�̶��绰"."\t"; 
echo   "��ַ"."\t"; 
echo   "����"."\t";
echo   "qq"."\t"; 
echo   "msn"."\t"; 
echo   "�ʼ�"."\t";  
echo   "�ʽ�"."\t";   
echo   "����"."\t"; 
echo   "��Ա��"."\t"; 
echo   "�����¼"."\t"; 
echo   "\n";

$sql="select * from gplat_member order by userid asc";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
 {
   $user=$date['username'];    //�û���
   $id=$date['userid'];
   $email=$date['email'];      //�ʼ�
   $amount=$date['amount'];    //�ʽ�
   $point=$date['point'];      //����
   
   $groupid=$date['groupid'];	
   $sql_roup="select name from gplat_member_group where groupid='$groupid'";
   $result_roup=mysql_query($sql_roup);
   $date_roup=mysql_fetch_assoc($result_roup);
   $groupName=$date_roup['name'];     //��Ա��
   
   $sql_info="select lastlogintime from gplat_member_info where userid='$id'";
   $result_info=mysql_query($sql_info);
   $date_info=mysql_fetch_assoc($result_info);
   $lastlogintime=$date_info['lastlogintime'];    //����¼
   
   $sql_detail="select * from gplat_member_detail where userid='$id'";
   $result_detail=mysql_query($sql_detail);
   $date_detail=mysql_fetch_assoc($result_detail);
   $truename=$date_detail['truename'];    //��ʵ����
   $gender=$date_detail['gender'];        //�Ա�
   $msn=$date_detail['msn'];              //msn
   $qq=$date_detail['qq'];                //qq
   $mobile=$date_detail['mobile'];        //�ֻ�
   $telephone=$date_detail['telephone'];  //�̶��绰
   $address=$date_detail['address'];      //��ַ   
   $birthday=$date_detail['birthday'];    //����   

	echo   $user."\t";
	echo   $truename."\t";
	echo   $gender."\t";
	echo   $mobile."\t";
	echo   $telephone."\t";	
	echo   $address."\t";		
	echo   $birthday."\t";
	echo   $qq."\t";
	echo   $msn."\t";	
	echo   $email."\t";	
	echo   $amount."\t";   
	echo   $point."\t";
	echo   $groupName."\t";
	echo   $lastlogintime."\t";	
	echo   "\n";
	
 }
?>
