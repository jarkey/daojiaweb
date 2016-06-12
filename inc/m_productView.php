<?php
function m_productViewTitle($search='',$classIndex='',$fid2='',$fid1='',$class='',$url='',$sort='',$sale='')
{
	$ol='<div  class="fl2_r">';
	
	if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}
$sqlstr=" ";
if($classIndex!=''){ $sqlstr=" where classIndex='$classIndex' and views<>1";}
if($class>=1){ $sqlstr="  where class=$class and views<>1";}
if($sale!=''){ $sqlstr=" where issale=1 and views<>1";}
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
		$content_f1.=$data_f['id'].',';
		}
		if($content_f1==''){
			$sqlstr="  where class =100000";
			}else{
		$content_f_ss=substr($content_f1,0,-1);
		$sqlstr="  where class in($content_f_ss) and views<>1";
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

switch ($sort){
	case 1:
        $order_str='order by clickNum desc';
        break;
    case 2:
        $order_str='order by mPrice desc';
        break;
    case 3:
       $order_str='order by productid desc';
        break;
    default:
        $order_str='order by sort desc,productid desc';
	}



$nShowNum=6;  
$sql="select productid from dmooo_product    $sqlstr  "; 
$result=mysql_query($sql);            
$nCount=mysql_num_rows($result);       
$page_num=($page-1)*$nShowNum;         
				 
				 $sql="select productid,productName,class,img,memberPrice from dmooo_product   $sqlstr  $order_str limit $page_num,$nShowNum";
		
	             $result=mysql_query($sql);
	             while($date=mysql_fetch_assoc($result))
				{
				$id=$date['productid'];
				$title=$date['productName'];
			    $title=mysubstr($title,'0','26');  
				$price=product_price_1($id);
				
                 $view_content.='
		
				
				<dl>
            	<dt><a href="'.$url.'?id='.$date['productid'].'&class='.$date['class'].'"><img src="../userfiles/'.$date['img'].'" alt=""></a></dt>
                <dd>
                	<h4><a href="'.$url.'?id='.$date['productid'].'&class='.$date['class'].'">'.$title.'</a></h4>
                    <p>￥<span>'.$price.'</span></p>
                </dd>
            </dl>';
		   
				}
			$ol2='</div>';
			
		
			include ( "../inc/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; 
$intShowNum  = $nShowNum ;   
$aPDatas   = $pBP->get( $intCount , $intShowNum ,4) ; 

$page_s='<div class="page2">'
.'<a href="'.$aPDatas['p_ln'].'">上一页</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
		if($page==$aBar['num']){$css_str=' class="on"';}else{$css_str='';}
        $page_w.='<a href="'.$aBar['ln'].'" '.$css_str.'>'.$aBar['num'].'</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['n_ln'].'">下一页</a></div>';
        $new_content=$ol.$view_content.$ol2.$page_s.$page_w;
		
		return $new_content;    
		}
		?>