<?php

/**�����¼****/
   $temp_arr = stripslashes($_COOKIE['product_see']);
   $current=unserialize($temp_arr);//��ǰ�ѿ�������Ʒ��ά����
   $temp_num=count($current);
   if($temp_num>4)//����ֻ��¼���5���㼣
   {
    $current=array_reverse($current);
    array_pop($current);//��ת����󵯳����һ��Ԫ�أ�Ҳ���ǵ�һ��Ԫ�أ�
    $current=array_reverse($current);//�ٷ�ת����ȷ������
    $temp_num=4;
   }
  
    if($_COOKIE['product_see']=="")//���һ����ƷҲû���������
    {
     $current[0][0]=$productid;//id
     $current[0][1]=$title;//pname
     $current[0][2]=$filename.'?'.$_SERVER['QUERY_STRING'];//pic
     $current[0][3]=$mPrice;//sjiage
     $current[0][4]=$memberPrice;//sjiage

     setcookie("product_see",serialize($current));
    
    }else{//�����жϵ�ǰ��ƷID�������д��ID�Ƿ���һ����
    
     $temp_s=0;
     foreach($current as $key => $value){
       foreach($current[$key] as $key2 => $value2){
        //echo $key2." => ".$value2;
        if($value2==$productid)
        {
        //�б���Ʒ�ļ�¼�򲻲���
         $temp_s=1;
        }
       }
     }
    
     if($temp_s==0)//���ûһ�������¼����
     {
     $current[$temp_num][0]=$productid;
      $current[$temp_num][1]=$title;//pname
      $current[$temp_num][2]=$filename.'?'.$_SERVER['QUERY_STRING'];//pic
      $current[$temp_num][3]=$mPrice;//sjiage 
      $current[$temp_num][4]=$memberPrice;//sjiage 
      setcookie("product_see",serialize($current));
     }
    
    }
  

/***/
?>