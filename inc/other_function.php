<?php 

/**传入地区id，显示地区名称****/
function address_view($id=''){
	$sql="select * from gplat_area_new where CityID='$id'";
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$name=$data['CityName'];
	return $name;
}

/*意外跳转*/
function ExitAgree($agree='返回',$url='')
{
	if($url){
		echo'<a href='."$url".'>'."$agree".'</a>';
		exit;
	}else {
	 echo("<script language=javascript>alert('$agree');window.history.go(-1)</script>"); 
	 exit();
}
}

/*返回当前网址(含所有参数)，用于添加内容后的刷新*/
function goToCurrentPage(){
	echo '<meta http-equiv="refresh" content="0; url='.$allUrl.'"/>';
    exit;
}

//根据订单号查询该订单下的总金额。
 function money_all($orderid=''){
	    $money='';
	$sql_m="select * from gplat_order_product where orderid=".$orderid;
	$result_m=mysql_query($sql_m);
	while($data_m=mysql_fetch_assoc($result_m)){
		$money+=$data_m['num'] * $data_m['price'];
		}
		return $money;
	  }

//会员没跳转函数
function user_islog(){
	if ($_SESSION['username']=='') {
		echo'<meta http-equiv="refresh" content="0; url=user_login.php"/>';
		exit;
	}
}

/*输入两个值，用于表单修改资料时判断是否是默认值*/
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

/**********服务状态函数************/
function serviceStatus($status)
{
	switch($status)	
	{
	  case 0:
		$i='无效';break;		
	  case 1:
		$i='未受理';break;
	  case 2:
		$i='受理中';break;
	  case 3:
		$i='已结束';break;	
	  //default:
	  //$i='未处理';break;	  
	}
	return $i;	
}	
	


/*
截取中文字符串
字符串，开始位置，长度
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
功能：时间差函数，传递一个时间值，格式为
      date_default_timezone_set('Asia/Shanghai');
      $times=date('Y:m:d H:i:s'); 
      返回当前时间与传入时间的时间差 格式为  97天16小时前
修改：2009-12-24 10:09
作者：文明人  苏格拉底
*/

function timesStr($times_old){  
	
	date_default_timezone_set('Asia/Shanghai');
    $times_2=date('Y-m-d H:i:s');   //当前时间  
    $times_2=strtotime($times_2);
    
	$times_1=strtotime($times_old);           //提问时间
	$day=intval(($times_2-$times_1)/3600/24);
    
    if ($day>0)
    {
    $hour=ceil(($times_2-$times_1)/3600%$day);	
    $times_str=$day.'天'.$hour.'小时';
    }else 
    {
     $hour=intval(($times_2-$times_1)/3600);
     $minutes=ceil((($times_2-$times_1)/3600-$hour)*60);
     $times_str=$hour.'小时'.$minutes.'分钟';
    }
    return $times_str;
} 

/*
功能：规格值读取list元件，如：颜色、尺寸、材质等
使用：function ggz($fid,$name,$sessionValue)
      $fid-规格id,$name-list控件名称,$sessionValue-判断是否有值，有值自动选中，可以用于发布和修改
例子：产品颜色的下拉list，用于后台发布产品
修改：2010-01-01 16:40
作者：苏格拉底
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
  $ggz_str='<select name="'.$name.'"><option value="0">选择</option>'.$ggz_str.'</select>';
  return $ggz_str;
}

/*
功能：规格值读取显示，如：颜色、尺寸、材质等
使用：function ggzView($id)   $id-规格值id
例子：显示产品颜色
修改：2010-01-01 16:40
作者：苏格拉底
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
功能：品牌数据读取list元件
使用：function ppz($name,$sessionValue)   
      $name-list控件名称，,$sessionValue-判断是否有值，有值自动选中，可以用于发布和修改
例子：品牌的下拉list，用于后台发布产品
修改：2010-01-01 16:40
作者：苏格拉底
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
  $ppz_str='<select name="'.$name.'"><option value="0">选择品牌</option>'.$ppz_str.'</select>';
  return $ppz_str;
}

/*
功能：品牌数据读取显示
使用：function ppzView($id)   $id-品牌id
例子：产品品牌显示
修改：2010-01-01 16:40
作者：苏格拉底
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