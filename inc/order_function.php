<?php 

/*
����״̬��0-δ����  1-�Ѹ���
����״̬��0-δ����  1-������  2-���׳ɹ�  3-�˻�
����״̬��0-δ����  1-�ѷ���
���״̬��0-δ����  1-�Ѵ���

���ܣ���ӳ����״̬

*/
/**********����״̬����************/
function payStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='δ����';break;		
	  case 1:
		$i='�Ѹ���';break;	
	  //default:
	  //$i='δ����';break;	  
	}
	return $i;	
}
/**********����״̬����************/
function logisticsStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='δ����';break;		
	  case 1:
		$i='�ѷ���';break;
	  case 2:
		$i='�ջ�ȷ��';break;		
	  //default:
	  //$i='δ����';break;	  
	}
	return $i;	
}
/**********����״̬����************/
function orderStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='δ����';break;		
	  case 1:
		$i='����';break;
	  case 2:
		$i='����';break;
	  case 3:
		$i='�������';break;
	  case 4:
		$i='�˻�';break;
	  case 5:
		$i='��Ч';break;
		 case 6:
		$i='�����˿�';break;
	  //default:
	  //$i='δ����';break;	  
	}
	return $i;	
}
/**********����״̬��ɫ************/
function status_color($content){
  if ($content==0) {
	  return 'blue';
  }
  if ($content==1) {
	  return 'green';
  }
  if ($content==2 or $content==3) {
	  return 'red';
  }
}

/*
������commissionStatus($status) 
���ܣ����״̬
ʹ�ã�commissionStatus($status)  $status-0:δ����;1:�Ѵ���
*/
function commissionStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='δ����';break;		
	  case 1:
		$i='�Ѵ���';break;	
	  //default:
	  //$i='δ����';break;
	}
	return $i;	
}

/*
������orderTongji($orderSearchType) 
���ܣ�����ͳ�Ʋ�ѯ
ʹ�ã�orderTongji($orderSearchType)
*/
function orderTongji($status)
{
	switch($status)	
	{
	  case 1:   //�������Ķ���
		$i=' where payment=1 and status=0';break;		
	  case 2:   //�Ѹ���Ķ���
		$i=' where payment=1';break;
	  case 3:   //�����еĶ���
		$i=' where status=2';break;
	  case 4:   //ȷ���ջ�����
		$i=' where status=3';break;
	  case 5:   //����Ч�Ķ���
		$i=' where status=5';break;
	  case 6:   //���˻��Ķ���
		$i=' where status=4';break;
	  case 7:   //δ����Ķ���
		$i=' where payment=0 and status<>4 and status<>5';break;		
	  //default:
	  //$i='δ����';break;
	}
	return $i;	
}


//��Ʒ���������б�
function product_book($productid,$num){

	$sql="select * from product_book where productid=$productid order by id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
	$userid=$data['userid'];
	$orderid=$data['orderid'];
	$title=$data['title'];
	$xing=$data['xing'];
	
	if($data['img']!=''){
	$img_all=substr($data['img'],0,-1);
	$img_arr=explode(",",$img_all);
	$img_num=count($img_arr);
	foreach ($img_arr as $link => $content ) {
	$orders_content_str.='<a href="userfiles/'.$content.'" target="_blank"><img src="userfiles/'.$content.'" width="100" /></a>';
	}

	}
	
	if($xing==0){$xing=5;}
    $title= mysubstr($data['title'],0,60);	
    $sql="select img,username from gplat_member where userid=$userid ";
	$result=mysql_query($sql);
	$data_u=mysql_fetch_assoc($result);
	if($data_u['img']!=''){$img=$data_u['img'];}else{$img='null.gif';}
	$sql="select dates from gplat_order_cart where orderid=$orderid ";
	$result=mysql_query($sql);
	$data_o=mysql_fetch_assoc($result);
	
    $content.='
		<div class="plxq2">
                            <div class="pl_l">
                                <dl>
                                    <dt><img src="userfiles/'.$img.'" alt="" /></dt>
                                    <dd>'.$data_u['username'].'</dd>
                                </dl>
                            </div>
                            <div class="pl_r">
                                <div class="jt"></div>
                                <h3><span>'.$data['times'].'</span><img src="images/'.$xing.'.png" alt="" /></h3>
                                <p style="text-indent:2em">��ǩ��<span>'.$title.'</span></p>
                                <p style="text-indent:2em">�ĵã�'.$data['content'].'</p>
                                <p>�������ڣ�'.$data_o['dates'].'</p>
                            </div>
							'.$orders_content_str.'
                        </div>
		
		';
	}
	
	
return $content;
}

function order_status_num($userId,$status){
if($status==1){$sql_str=" and payment=0";}
if($status==2){$sql_str=" and payment=1 and status<3";}
if($status==3){$sql_str=" and isbook=0 and status=3";}

$sql="select orderid from gplat_order_cart where userid=$userId $sql_str";
$result=mysql_query($sql);
$content=mysql_num_rows($result);
return $content;
}
?>