<?php 
include('../inc/config.inc.php');

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=�����б�.xls");

$tx='�����б�';   
echo   $tx."\n\n";   
//����������£�   
echo   "������"."\t"; 
echo   "�µ�ʱ��"."\t"; 
echo   "�ջ���"."\t"; 
echo   "��ַ"."\t"; 
echo   "�绰"."\t"; 
echo   "ʱ��"."\t"; 
echo   "�ܽ��"."\t"; 
echo   "�˷�"."\t"; 
echo   "��Ʒ"."\t";
echo   "����״̬"."\t"; 
echo   "����״̬"."\t"; 
echo   "֧����ʽ"."\t";
echo   "\n";

$sql="select * from gplat_order_cart order by orderid desc";
$result=mysql_query($sql);
while($date=mysql_fetch_assoc($result))
 {
   $orderid=$date['orderid'];   		 
   $orderNo=(string)$date['orderNo'].' .';                            //������
   $orderTime=$date['dates'].$date['times'];             //�µ�ʱ��
   $consignee=$date['consignee'];                        //�ջ���
   $money=money_all($orderid);                           //�ܽ��
   $logistics=$date['logistics'];                        //�˷�
   $payment=payStatus($date['payment']);                 //����״̬
   $delivery=logisticsStatus($date['delivery']);         //����״̬
   $status=orderStatus($date['status']);                 //����״̬ 
   $pay='';
   if($date['pay']==1){$pay='֧����';}
   if($date['pay']==2){$pay='΢��';}
   $sql1="select * from gplat_order_product where orderid=".$orderid;
$result1=mysql_query($sql1);
while ($data=mysql_fetch_assoc($result1))
{  
	
  $product.=$data['productname'].'-����'.$data['num'].',';
  
}
  
/*   
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
*/
    
	echo   $orderNo."\t";
	echo   $orderTime."\t";
	echo   $consignee."\t";
	echo   $date['address']."\t";
	echo   $date['mobile']."\t";
	echo   $date['times1'].$date['times2']."\t";
	echo   $money."\t";
	echo   $logistics."\t";	
	echo   $product."\t";
	echo   $payment."\t";		
	echo   $status."\t";
	echo   $pay."\t";
	echo   "\n";
	$product='';
 }
?>
