<?php

/*
���ܣ���Ʒ��𵼺�
ʹ�ã�navigation($class_id='',$b_class='')
      ���ݴ���Ķ���id������һ���������ƺͶ�����������
���ӣ�������Ʒ >> ��Ʒһ >>	С��һ
�޸ģ�2009-12-26 18:40
���ߣ�������  �ո�����
*/
function navigation($fid1='',$fid2='',$class=''){
    if($class!=''){
	$sql2="select * from dmooo_productclass2 where id='$class'";
	$result2=mysql_query($sql2);
	$data2=mysql_fetch_assoc($result2);
	$class2_name=$data2['name'];
	$fid2=$data2['fid'];
	$content_2='<a href="product.php?class='.$class.'">'.$data2['name'].'</a>>';
	}
	if($fid2!=''){
	$sql_1="select * from dmooo_productclass1 where id='$fid2'";
	$result_1=mysql_query($sql_1);
	$data1=mysql_fetch_assoc($result_1);
	$class1_name=$data1['name'];
	$fid1=$data1['fid'];
	$id1=$data1['id'];
	$content_1='<a href="product.php?fid2='.$id1.'">'.$data1['name'].'</a>>';
	}
	if($fid1!=''){
	$sql="select * from dmooo_productclass where id='$fid1'";
	
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$fid=$data['id'];
    $content_0='<a href="product.php?fid1='.$fid.'">'.$data['name'].'</a>>';
	}
    $content=$content_0.$content_1.$content_2;
return $content;

}

function navigation_name($fid1='',$fid2='',$class=''){
    if($class!=''){
	$sql2="select id,name from dmooo_productclass2 where fid in(select fid from dmooo_productclass2  where id=$class)";
	$result2=mysql_query($sql2);
	while ($data2=mysql_fetch_assoc($result2)) {
	$content.='<a href="product.php?class='.$data2['id'].'">'.$data2['name'].'</a>';
	}
	return $content;
	}
	if($fid2!=''){
	$sql_1="select * from dmooo_productclass1 where fid in(select fid from dmooo_productclass1 where id='$fid2')";
	$result_1=mysql_query($sql_1);
	while ($data1=mysql_fetch_assoc($result_1)) {
	$content.='<a href="product.php?fid2='.$data1['id'].'">'.$data1['name'].'</a>';
	}
	return $content;
	}
	if($fid1!=''){
	$sql_1="select * from dmooo_productclass order by sort desc,id asc";
	$result_1=mysql_query($sql_1);
	while ($data1=mysql_fetch_assoc($result_1)) {
	$content.='<a href="product.php?fid1='.$data1['id'].'">'.$data1['name'].'</a>';
	}
	return $content;
	}
    $content=$content_0.$content_1.$content_2;


}
function m_navigation_name($fid1='',$fid2='',$class=''){
    if($class!=''){
	$sql2="select id,name from dmooo_productclass2 where fid in(select fid from dmooo_productclass2  where id=$class)";
	$result2=mysql_query($sql2);
	while ($data2=mysql_fetch_assoc($result2)) {
	$content.='<li><a href="product1.php?class='.$data2['id'].'">'.$data2['name'].'</a></li>';
	}
	return $content;
	}
	if($fid2!=''){
	$sql_1="select * from dmooo_productclass1 where fid in(select fid from dmooo_productclass1 where id='$fid2')";
	$result_1=mysql_query($sql_1);
	while ($data1=mysql_fetch_assoc($result_1)) {
	$content.='<li><a href="product1.php?fid2='.$data1['id'].'">'.$data1['name'].'</a></li>';
	}
	return $content;
	}
	if($fid1!=''){
	$sql_1="select * from dmooo_productclass order by sort desc,id asc";
	$result_1=mysql_query($sql_1);
	while ($data1=mysql_fetch_assoc($result_1)) {
	$content.='<li><a href="product1.php?fid1='.$data1['id'].'">'.$data1['name'].'</a></li>';
	}
	return $content;
	}
    $content=$content_0.$content_1.$content_2;


}

function m_navigation_name1($fid1=''){
 
	
	$sql_1="select * from dmooo_productclass1 where fid=$fid1";
	$result_1=mysql_query($sql_1);
	while ($data1=mysql_fetch_assoc($result_1)) {
	$content.='<li><a href="product1.php?fid2='.$data1['id'].'&fid1='.$fid1.'">'.$data1['name'].'</a></li>';
	}
	
return $content;

}

//��Ʒ��ϸͼҳ��չʾ����ͼ��
function index_title_cpsimg1($id){
	$sql="select img from dmooo_productimg where class='$id' order by sort desc,id desc limit 0,1";
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	if($data['img']==''){$content='null.gif';	}else{$content=$data['img'];	}
	
	
return $content;
}

//��Ʒ��ϸͼҳ��չʾ����ͼ��
function index_title_cpsimg($id){
	$sql="select img from dmooo_productimg where class='$id' order by sort desc,id desc limit 0,10";
	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
	
	$content.='<li><img src="userfiles/'.$data['img'].'"/></li>
';	
	}
return $content;
}

function m_index_title_cpsimg($id){
	$sql="select img from dmooo_productimg where class='$id' order by sort desc,id desc limit 0,10";
	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
	
	$content.='<li><img src="../userfiles/'.$data['img'].'"/></li>
';	
	}
return $content;
}


//��Ʒ��ϸ���
function product_price($id){
	$sql="select * from dmooo_product_price where class='$id' order by sort desc,id desc limit 0,4";
	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
	if($_GET['priceid']==$data['id']){$css_str=' class="on"';}else{$css_str=' ';}
	if($_GET['priceid']==''and $num!=1){$css_str=' class="on"'; $num=1;}
	$content.='
	<a href="product_view.php?id='.$id.'&priceid='.$data['id'].'" '.$css_str.'>'.$data['name'].'</a>
';	
$css_str=' ';
	}
return $content;
}

function product_price_1($id,$priceid=''){
	if($priceid>0){
		$sql="select price from dmooo_product_price where id='$priceid'";
		}else{
		$sql="select price from dmooo_product_price where class='$id' order by sort desc,id desc limit 0,1";
		}
		
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$content=$data['price'];
return $content;
}


function product_price_2($id){
	$sql="select id from dmooo_product_price where class='$id' order by sort desc,id desc limit 0,1";
		
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$content=$data['id'];
return $content;
}

function product_price_name($id,$priceid=''){
	if($priceid!=''){
		$sql="select name from dmooo_product_price where id='$priceid' ";
		}else{
		$sql="select name from dmooo_product_price where class='$id' order by sort desc,id desc limit 0,1";
		}
		
	$result=mysql_query($sql);
	$data=mysql_fetch_assoc($result);
	$content=$data['name'];
return $content;
}





function IdProductView($pageId){
  if(!$_GET['id']){
	  $id=$pageId;
	  }else{
	  $id=(int)$_GET['id'];
  }
  $sql="select * from dmooo_product where productid=".$id;
  $result=mysql_query($sql);
  $data=mysql_fetch_assoc($result);
  $img=$data['img'];
  $productName=$data['productName'];
  $memberPrice=$data['memberPrice'];
  $brand=$data['brand'];
  $content=$data['content'];  
  $origin=$data['origin'];
  $specifications=$data['specifications'];
  $size=$data['size']; 
  $times=$data['times'];
  $class=$data['class'];
  $materials=$data['materials'];
  
  $times=substr($times,0,10);
  $clickNum=$data['clickNum'];
  $sql2="update dmooo_product set clickNum=clickNum +1 where productid='$id'";
  $result2=mysql_query($sql2);
  
  $a=array("img"=>$img,"productName"=>$productName,"times"=>$times,"clickNum"=>$clickNum,"content"=>$content,"size"=>$size,"specifications"=>$specifications,"brand"=>$brand,"origin"=>$origin,"memberPrice"=>$memberPrice,"class"=>$class,"materials"=>$materials);
  return $a;
}
/*
������index_product
���ܣ���ҳ��������ҳ��Ĳ�Ʒ���ã��޷�ҳ����
ʹ�ã�index_product($num,$product_num,$class,$imgHeight)  
	  $num-��Ʒ����   1-����,2-�Ƽ�,3-�ö�,4-��Ʒ,5-����
	  $product_num-��ʾ�Ĳ�Ʒ������0-����Ĭ�ϣ���ʾ8��
	  $class-��Ʒ���ID   0-����Ĭ�ϣ���ѯ���в�Ʒ,�����Զ��������'45,46,47'
      $imgHeight-��ƷͼƬ��
�޸ģ�2009-12-26 21:39
���ߣ�������  �ո�����
*/
function index_product($num,$product_num,$class,$imgHeight){
	global $shopx8UrlRewite;
	if($product_num==0){ $product_num=8;}
		
	switch ($num)
	{
	  case 1:
		$where_str='hot=1';
		break;
	  case 2:
		$where_str='recommended=1';
		break;
	  case 3:
		$where_str='sticky=1';
		break;
	  case 4:
		$where_str='news=1';
		break;
	  case 5:
		$where_str='issale=1';
		break;
	  default:
		$where_str='hot=1';		
	}

if($class==0){
  $sql_p="select * from gplat_product where $where_str GROUP BY productName  order by productid desc limit 0,$product_num";
}else{
  $sql_p="select * from gplat_product where $where_str and class in ($class) GROUP BY productName  order by productid desc limit 0,$product_num";
}

$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
	if ($data_p['issale']=='') {
				$price='<span class="huiTxt2">��Ա�ۣ�<span style="color:#990000;fon-weight:bold;">��'.$data_p['memberPrice'].' Ԫ</span><span>';
			}else { $price='<span class="huiTxt2">�����ۣ�<span style="color:#006600;fon-weight:bold;">��'.$data_p['sale'].' Ԫ</span></span>'; }	

    $productName=$data_p['productName'];
	$productName1=mysubstr($productName,0,50);
	if($shopx8UrlRewite>0){
		$content_p.='	
		<div class="productsindex">
		<a href="shangpin_view_'.$data_p['productid'].'.html" target="_blank"><img src="userfiles/'.$img.'"  title="'.$productName.'" style="border:#CCC 1px solid;" height="'.$imgHeight.'" /></a>
				<span style="display:none"><br />'.$data_p['productNum'].'</span>
				<br /><a href="shangpin_view_'.$data_p['productid'].'.html" target="_blank" class="huiHref1">'.$productName1.'</a><br />
	<span class="huiTxt2">�г��ۣ���<s>'.$data_p['mPrice'].' Ԫ</s></span><br />'.$price.'<br></div>';		
	}else{
		$content_p.='	
		<div class="productsindex">
		<a href="shangpin_view.php?id='.$data_p['productid'].'" target="_blank"><img src="userfiles/'.$img.'"  title="'.$productName.'" style="border:#CCC 1px solid;" height="'.$imgHeight.'" /></a>
				<span style="display:none"><br />'.$data_p['productNum'].'</span>
				<br /><a href="shangpin_view.php?id='.$data_p['productid'].'" target="_blank" class="huiHref1">'.$productName1.'</a><br />
	<span class="huiTxt2">�г��ۣ���<s>'.$data_p['mPrice'].' Ԫ</s></span><br />'.$price.'<br></div>';
		
	}
	$data_p['sale']='';
}
return $content_p;
}

function hot_product($num,$classIndex){
	
$sql_p="select * from dmooo_product where hot=1 and classIndex='$classIndex' and views!=1 GROUP BY productName order by productid desc limit 0,$num";
$result_p=mysql_query($sql_p);
  while ($data_p=mysql_fetch_assoc($result_p)){
		  
	  $content_p.='
	<a href="product_view.php?id='.$data_p['productid'].'&class='.$data_p['class'].'" >'.$data_p['productName'].'</a>';
  }
return $content_p;
}

function m_hot_product($num){
	
$sql_p="select * from dmooo_product where hot=1  and views!=1 GROUP BY productName order by productid desc limit 0,$num";
$result_p=mysql_query($sql_p);
 static $num_m;
  while ($data_p=mysql_fetch_assoc($result_p)){
		  $productid=$data_p['productid'];
		  $price=product_price_1($productid);
		  $price_name=product_price_name($productid);
		 	
		  if($num_m%2==0){$css_str=' class="dll"';}else{$css_str=' class="dlr"';}
				$num_m++;
	  $content_p.='
<dl '.$css_str.'>
    	<dt><a href="product_view.php?id='.$data_p['productid'].'&class='.$data_p['class'].'"><img src="../userfiles/'.$data_p['img'].'" alt=""></a></dt>
        <dd>
        	<h4><a href="product_view.php?id='.$data_p['productid'].'&class='.$data_p['class'].'">'.$data_p['productName'].'</a></h4>
            <p>��'.$price.'</p>
        </dd>
    </dl>
	
	';
  }
return $content_p;
}

function recommended_product($num,$class,$id){
	
$sql_p="select * from dmooo_product where class='$class' and views!=1 and productid!=$id  order by recommended desc,sort desc,productid desc limit 0,$num";
$result_p=mysql_query($sql_p);
  while ($data=mysql_fetch_assoc($result_p)){
		  	if($data['img']==''){$img='null.gif';	}else{$img=$data['img'];	}
			 $id=$data['productid'];
			 $memberPrice=product_price_1($id);
	  $content_p.='
	 <dl>
            	<dt><a href="product_view.php?id='.$data['productid'].'&class='.$data['class'].'"><img src="userfiles/'.$img.'" alt=""  /></a></dt>
                <dd>
                	<h4><a href="product_view.php?id='.$data['productid'].'&class='.$data['class'].'">'.$data['productName'].'</a></h4>
                    <p>��'.$memberPrice.'</p>
                </dd>
            </dl>';
  }
return $content_p;
}

//�б��Ƽ���Ʒ
function recommended_product_list($search='',$classIndex='',$fid2='',$fid1='',$class='',$url='')
{


if($classIndex!=''){ $sqlstr=" where classIndex='$classIndex' and views<>1";}
if($class>=1){ $sqlstr="  where class=$class and views<>1";}
if($search!=''){ $sqlstr="  where  productName like '%$search%' and views<>1";}
if($fid1>=1){
	$sql_f="select * from dmooo_productclass1 where fid='$fid1' order by orderbySN desc,id desc";
	
	$result_f=mysql_query($sql_f);
	while($data_f=mysql_fetch_assoc($result_f)){
		$content_f.=$data_f['id'].',';
		}
		$content_f_s=substr($content_f,0,-1);
		$sqlstr_1="  where fid in($content_f_s)";
		
		$sql_f="select * from dmooo_productclass2 $sqlstr_1 order by orderbySN desc,id desc";
		
	$result_f=mysql_query($sql_f);
	while($data_f=mysql_fetch_assoc($result_f)){
		$content_f.=$data_f['id'].',';
		}
		if($content_f==''){
			$sqlstr="  where class =100000";
			}else{
		$content_f_s=substr($content_f,0,-1);
		$sqlstr="  where class in($content_f_s) and views<>1";
			}
}

if($fid2>=1){
	$sql_f="select * from dmooo_productclass2 where fid='$fid2' order by id desc";
	$result_f=mysql_query($sql_f);
	while($data_f=mysql_fetch_assoc($result_f)){
		$content_f.=$data_f['id'].',';
		}
		if($content_f==''){
			$sqlstr="  where class =100000";
			}else{
		$content_f_s=substr($content_f,0,-1);
		$sqlstr="  where class in($content_f_s) and views<>1";
			}
	
}
   $sql="select productid,productName,class,img,memberPrice from dmooo_product   $sqlstr  order by recommended desc,sort desc,productid desc limit 0,3";
			
	             $result=mysql_query($sql);
	             while($data=mysql_fetch_assoc($result))
				{
				$id=$data['productid'];
				$title=$data['productName'];
			    $title=mysubstr($title,'0','26');  
				$price=product_price_1($id);
				if($data['img']==''){$img='null.gif';	}else{$img=$data['img'];	}
			
            $content_p.='
	 <dl>
            	<dt><a href="product_view.php?id='.$data['productid'].'&class='.$data['class'].'"><img src="userfiles/'.$img.'" alt=""  /></a></dt>
                <dd>
                	<h4><a href="product_view.php?id='.$data['productid'].'&class='.$data['class'].'">'.$data['productName'].'</a></h4>
                    <p>��'.$price.'</p>
                </dd>
            </dl>
			
			';
		   
				}
	

		
		return $content_p;    
		}


/*
������right_product
���ܣ���Ʒ�Ҳ���ã��޷�ҳ����
ʹ�ã�right_product($num,$view_num)  
      $num-��Ʒ���� 1-���� 2-�Ƽ� 3-�ö�
	  $view_num-��ʾ��Ŀ
�޸ģ�2009-12-23 13:15
���ߣ�������  �ո�����
*/
function right_product($num,$view_num){
	global $shopx8UrlRewite;
	$where_str='hot=1';         //Ĭ��Ϊ����
	if ($num==1) {
		$where_str='hot=1';
	}
	if ($num==2) {
		$where_str='recommended=1';
	}
	if ($num==3) {
		$where_str='sticky=1';
	}
	if ($num==4) {
		$where_str='news=1';
	}
	if ($num==5) {
		$where_str='issale=1';
	}
$sql_p="select * from gplat_product where $where_str GROUP BY productName order by productid desc limit 0,$view_num";
$result_p=mysql_query($sql_p);
  while ($data_p=mysql_fetch_assoc($result_p)){
	  if($data_p['img']==''){
		  $img='index_product.gif';
	  }else{
		  $img=$data_p['img'];
	  }
	  if ($data_p['sale']==''){
		  $price='��Ա�ۣ�<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].' Ԫ</span>';
	  }else{ 
		  $price='�����ۣ�<span style="background-color:#F00; color:#FFF; ">'.$data_p['sale'].' Ԫ</span>';
	  }	
			  
	  $content_p.='
	  <a href="shangping_view.php?id='.$data_p['productid'].'" target="_blank"><img src="userfiles/'.$img.'" width="87" height="132" /></a><br />
	  <span style="display:none">'.$data_p['productNum'].'<br /></span>
	  <a href="shangping_view.php?id='.$data_p['productid'].'" target="_blank">'.$data_p['productName'].'</a><br />
	   �г��۸�<s>'.$data_p['mPrice'].' Ԫ</s><br />'.$price.'<br />';
  }
return $content_p;
}



/**��Ʒ�����б�***/
function product_class2($classIndex='',$url='',$num=''){
	global $shopx8UrlRewite;
	$sql="select * from dmooo_productclass2 where classIndex='$classIndex' order by orderbySN desc,id asc limit 0,$num";	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
		$content.='<a href="'.$url.'?class='.$data['id'].'">'.$data['name'].'</a>';
	}
	return $content;
}

function product_class1_2($fid='',$url='',$num=''){
	global $shopx8UrlRewite;
	$sql="select * from dmooo_productclass2 where fid='$fid' order by orderbySN desc,id asc limit 0,$num";	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
		$content.='<a href="'.$url.'?class='.$data['id'].'">'.$data['name'].'</a>';
	}
	return $content;
}

function product_class1($classIndex='',$url='',$num=''){
	global $shopx8UrlRewite;
	$sql="select * from dmooo_productclass1 where classIndex='$classIndex' order by orderbySN desc,id asc limit 0,$num";	
	$result=mysql_query($sql);
	while ($data=mysql_fetch_assoc($result)) {
		$fid=$data['id'];
		$content.='
		<dl>
                    	<dt><a href="'.$url.'?fid2='.$data['id'].'">'.$data['name'].'</a></dt>
                        <dd>'.product_class1_2($fid,$url,10).'</dd>
                    </dl>
		';
	}
	return $content;
}



/**���ײ�������Ĳ�Ʒ�����б�***/
function product_class2_name($class=''){
$sql="select name from dmooo_productclass2 where id=$class ";	
$result=mysql_query($sql);
$data=mysql_fetch_assoc($result);
$content=$data['name'];
return $content;
}
?>