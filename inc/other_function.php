<?php 

/**�������id����ʾ��������****/
function address_view($id=''){
	$sql="select * from gplat_area_new where CityID='$id'";
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$name=$data['CityName'];
	return $name;
}

/*������ת*/
function ExitAgree($agree='����',$url='')
{
	if($url){
		echo'<a href='."$url".'>'."$agree".'</a>';
		exit;
	}else {
	 echo("<script language=javascript>alert('$agree');window.history.go(-1)</script>"); 
	 exit();
}
}

/*���ص�ǰ��ַ(�����в���)������������ݺ��ˢ��*/
function goToCurrentPage(){
	echo '<meta http-equiv="refresh" content="0; url='.$allUrl.'"/>';
    exit;
}

//���ݶ����Ų�ѯ�ö����µ��ܽ�
 function money_all($orderid=''){
	    $money='';
	$sql_m="select * from gplat_order_product where orderid=".$orderid;
	$result_m=mysql_query($sql_m);
	while($data_m=mysql_fetch_assoc($result_m)){
		$money+=$data_m['num'] * $data_m['price'];
		}
		return $money;
	  }

//��Աû��ת����
function user_islog(){
	if ($_SESSION['username']=='') {
		echo'<meta http-equiv="refresh" content="0; url=user_login.php"/>';
		exit;
	}
}

/*��������ֵ�����ڱ��޸�����ʱ�ж��Ƿ���Ĭ��ֵ*/
function checked ($x,$y){
	if ($x==$y) {
	echo'checked';
	}
}

function checked_v ($x,$y){
	if ($x==$y) {
	$checked='checked';
	return $checked;
	}
}

function selected ($x,$y){
	if ($x==$y) {
	echo'selected';
}
} 

/**********����״̬����************/
function serviceStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='��Ч';break;		
	  case 1:
		$i='δ����';break;
	  case 2:
		$i='������';break;
	  case 3:
		$i='�ѽ���';break;	
	  //default:
	  //$i='δ����';break;	  
	}
	return $i;	
}	
	


/*
��ȡ�����ַ���
�ַ�������ʼλ�ã�����
*/
function mysubstr($str,$start,$len){
    $tmpstr="";
    $strlen=$start+$len;
    for($i=0;$i<$strlen;$i++){
        if(ord(substr($str,$i,1))>0xa0){
            $tmpstr.=substr($str,$i,2);
            $i++;
        }else
            $tmpstr.=substr($str,$i,1);
    }
	if(strlen($str)>$len)
	{
		$e='.....';
		}else
		{
			$e=''; }
			$tmpstr=$tmpstr.$e;
    return $tmpstr;
}

/*
���ܣ�ʱ����������һ��ʱ��ֵ����ʽΪ
      date_default_timezone_set('Asia/Shanghai');
      $times=date('Y:m:d H:i:s'); 
      ���ص�ǰʱ���봫��ʱ���ʱ��� ��ʽΪ  97��16Сʱǰ
�޸ģ�2009-12-24 10:09
���ߣ�������  �ո�����
*/

function timesStr($times_old){  
	
	date_default_timezone_set('Asia/Shanghai');
    $times_2=date('Y-m-d H:i:s');   //��ǰʱ��  
    $times_2=strtotime($times_2);
    
	$times_1=strtotime($times_old);           //����ʱ��
	$day=intval(($times_2-$times_1)/3600/24);
    
    if ($day>0)
    {
    $hour=ceil(($times_2-$times_1)/3600%$day);	
    $times_str=$day.'��'.$hour.'Сʱ';
    }else 
    {
     $hour=intval(($times_2-$times_1)/3600);
     $minutes=ceil((($times_2-$times_1)/3600-$hour)*60);
     $times_str=$hour.'Сʱ'.$minutes.'����';
    }
    return $times_str;
} 

/*
���ܣ����ֵ��ȡlistԪ�����磺��ɫ���ߴ硢���ʵ�
ʹ�ã�function ggz($fid,$name,$sessionValue)
      $fid-���id,$name-list�ؼ�����,$sessionValue-�ж��Ƿ���ֵ����ֵ�Զ�ѡ�У��������ڷ������޸�
���ӣ���Ʒ��ɫ������list�����ں�̨������Ʒ
�޸ģ�2010-01-01 16:40
���ߣ��ո�����
*/
function ggz($fid,$name,$sessionValue){
  $ggz_sql="select * from gplat_specificationValue where fid=$fid order by sort desc";
  $ggz_result=mysql_query($ggz_sql);
  while ($ggz_data=mysql_fetch_assoc($ggz_result))
  {
	  if($ggz_data['id']==$sessionValue){
		  $selectSrt=' selected';
	  }else{
		  $selectSrt=' ';
	  }
	  $ggz_str.='<option value="'.$ggz_data['id'].'"'.$selectSrt.'>'.$ggz_data['content'].'</option>';
  }
  $ggz_str='<select name="'.$name.'"><option value="0">ѡ��</option>'.$ggz_str.'</select>';
  return $ggz_str;
}

/*
���ܣ����ֵ��ȡ��ʾ���磺��ɫ���ߴ硢���ʵ�
ʹ�ã�function ggzView($id)   $id-���ֵid
���ӣ���ʾ��Ʒ��ɫ
�޸ģ�2010-01-01 16:40
���ߣ��ո�����
*/
function ggzView($id){
  $ggz_sql="select * from gplat_specificationValue where id=$id";
  $ggz_result=mysql_query($ggz_sql);
  //$ggz_str="&nbsp;";
  if($ggz_result){
	 $ggz_data=mysql_fetch_assoc($ggz_result);
	 $ggz_str=$ggz_data['content'];
  }else{
	 $ggz_str='-';
  }  
  return $ggz_str;
}

/*
���ܣ�Ʒ�����ݶ�ȡlistԪ��
ʹ�ã�function ppz($name,$sessionValue)   
      $name-list�ؼ����ƣ�,$sessionValue-�ж��Ƿ���ֵ����ֵ�Զ�ѡ�У��������ڷ������޸�
���ӣ�Ʒ�Ƶ�����list�����ں�̨������Ʒ
�޸ģ�2010-01-01 16:40
���ߣ��ո�����
*/
function ppz($name,$sessionValue){
  $ppz_sql="select * from gplat_brand order by sort desc";
  $ppz_result=mysql_query($ppz_sql);
  while ($ppz_data=mysql_fetch_assoc($ppz_result))
  {
	  if($ppz_data['id']==$sessionValue){
		  $selectSrt=' selected';
	  }else{
		  $selectSrt=' ';
	  }	  
	  $ppz_str.='<option value="'.$ppz_data['id'].'"'.$selectSrt.'>'.$ppz_data['brandName'].'</option>';
  }
  $ppz_str='<select name="'.$name.'"><option value="0">ѡ��Ʒ��</option>'.$ppz_str.'</select>';
  return $ppz_str;
}

/*
���ܣ�Ʒ�����ݶ�ȡ��ʾ
ʹ�ã�function ppzView($id)   $id-Ʒ��id
���ӣ���ƷƷ����ʾ
�޸ģ�2010-01-01 16:40
���ߣ��ո�����
*/
function ppzView($id){
  $ppz_sql="select * from gplat_brand where id=$id order by sort desc";
  $ppz_result=mysql_query($ppz_sql);
  $ppz_str="&nbsp;";
  if($ppz_result){
	 $ppz_data=mysql_fetch_assoc($ppz_result);
	 $ppz_str=$ppz_data['brandName'];
  }
  return $ppz_str;
}



?>