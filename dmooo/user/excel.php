<?php 
include('../inc/config.inc.php');

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=会员管理表.xls");

$tx='会员管理表';   
echo   $tx."\n\n";   
//输出内容如下：   
echo   "用户名"."\t"; 
echo   "真实姓名"."\t"; 
echo   "性别"."\t"; 
echo   "手机"."\t"; 
echo   "固定电话"."\t"; 
echo   "地址"."\t"; 
echo   "生日"."\t";
echo   "qq"."\t"; 
echo   "msn"."\t"; 
echo   "邮件"."\t";  
echo   "资金"."\t";   
echo   "积分"."\t"; 
echo   "会员组"."\t"; 
echo   "最近登录"."\t"; 
echo   "\n";

$sql="select * from gplat_member order by userid asc";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
 {
   $user=$date['username'];    //用户名
   $id=$date['userid'];
   $email=$date['email'];      //邮件
   $amount=$date['amount'];    //资金
   $point=$date['point'];      //积分
   
   $groupid=$date['groupid'];	
   $sql_roup="select name from gplat_member_group where groupid='$groupid'";
   $result_roup=mysql_query($sql_roup);
   $date_roup=mysql_fetch_assoc($result_roup);
   $groupName=$date_roup['name'];     //会员组
   
   $sql_info="select lastlogintime from gplat_member_info where userid='$id'";
   $result_info=mysql_query($sql_info);
   $date_info=mysql_fetch_assoc($result_info);
   $lastlogintime=$date_info['lastlogintime'];    //最后登录
   
   $sql_detail="select * from gplat_member_detail where userid='$id'";
   $result_detail=mysql_query($sql_detail);
   $date_detail=mysql_fetch_assoc($result_detail);
   $truename=$date_detail['truename'];    //真实姓名
   $gender=$date_detail['gender'];        //性别
   $msn=$date_detail['msn'];              //msn
   $qq=$date_detail['qq'];                //qq
   $mobile=$date_detail['mobile'];        //手机
   $telephone=$date_detail['telephone'];  //固定电话
   $address=$date_detail['address'];      //地址   
   $birthday=$date_detail['birthday'];    //生日   

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
