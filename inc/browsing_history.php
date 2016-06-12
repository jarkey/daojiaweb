<?php

/**浏览记录****/
   $temp_arr = stripslashes($_COOKIE['product_see']);
   $current=unserialize($temp_arr);//当前已看过的商品二维数组
   $temp_num=count($current);
   if($temp_num>4)//这里只记录最多5个足迹
   {
    $current=array_reverse($current);
    array_pop($current);//反转数组后弹出最后一个元素（也就是第一个元素）
    $current=array_reverse($current);//再反转回正确的排序
    $temp_num=4;
   }
  
    if($_COOKIE['product_see']=="")//如果一个商品也没看过则存入
    {
     $current[0][0]=$productid;//id
     $current[0][1]=$title;//pname
     $current[0][2]=$filename.'?'.$_SERVER['QUERY_STRING'];//pic
     $current[0][3]=$mPrice;//sjiage
     $current[0][4]=$memberPrice;//sjiage

     setcookie("product_see",serialize($current));
    
    }else{//否则判断当前商品ID和数组中存的ID是否有一样的
    
     $temp_s=0;
     foreach($current as $key => $value){
       foreach($current[$key] as $key2 => $value2){
        //echo $key2." => ".$value2;
        if($value2==$productid)
        {
        //有本产品的记录则不操作
         $temp_s=1;
        }
       }
     }
    
     if($temp_s==0)//如果没一样的则记录下来
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