<?php
include_once('inc/config.inc.php');    //用这个包含文件，会跟cart类冲突
include('inc/dbconfig.php');  //数据连接文件



if(($_POST['id'] and $_POST['count'])or($productid>0 and $count>0))
	{
		if($productid==0){
		$productid=$_POST['id'];
		$count=$_POST['count'];
		$priceid=$_POST['priceid'];
		
		}
	
		$sql="select * from  dmooo_product where productid=".$productid;
	    $result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
		if($data['productid']>0){
		//if($data['sale']==''){}else{$price=$data['sale'];}
		$price=product_price_1($productid,$priceid);
		if($priceid==0){$priceid=product_price_2($productid);}
	    $arr=array('id'=>$data['productid']);
        $arr['name']=$data['productName'];
        if($count==''){$arr['count']='1';}else{$arr['count']=$count;}
        $arr['price']=$price;
		$arr['priceid']=$priceid;
		
        $a->add($arr);
		  echo '<script>window.location.href="buy_1.php";</script>';
		  exit;
			}
	}

?>