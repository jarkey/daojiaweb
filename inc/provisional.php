<?php
// 套餐编辑临时表
class provisional{
	 public $provisionalid;
	 
	    function setprovisionalid($id){
           $this->provisionalid=$id ;//设置成员方法
        }
  
	 //添加数据
	 function provisional_add($userid,$product,$num){
	 	$sql="insert into gplat_provisional (userid,productid,num)value('$userid','$product','$num')";
	 	$result=mysql_query($sql);
	 }
	 
	  //清空临时表
	 function provisional_del($userid){
	 	$sql="delete from gplat_provisional where userid='$userid'";
	 	$result=mysql_query($sql);
	 }
	 
		 //修改
	 function provisional_up($num,$productid){
	 	$sql="update gplat_provisional set num='$num',productid='$productid' where id=".$this->provisionalid;
	    $result=mysql_query($sql);
	 }
	 
	 //显示
	 function provisional_view($userid){
	 	$sql="select * from gplat_provisional where userid=".$userid;
	 	$result=mysql_query($sql);
	 	while ($data=mysql_fetch_assoc($result)) {
	 		$sql_p="select * from gplat_product where productid=".$data['productid'];
 		    $result_p=mysql_query($sql_p);
 		    $data_p=mysql_fetch_assoc($result_p);
 			if ($data_p['issale']=='') {$price='会员价格￥'.$data_p['memberPrice'];}else { $price='促销价格￥'.$data_p['sale'];}
	 		$content.='<input type="checkbox" name="productid[]"  value="'.$data['productid'].'-'.$data['num'].'" checked="checked"/>
        '.$data_p['productName'].'　　　'.$data_p['productNum'].'　　　市场价格￥'.$data_p['mPrice'].'　　　'.$price.'　　　 数量:'.$data['num'].' <a href="taocan_edit_product.php?id='.$data['id'].'">编辑</a><br />';
	 	}
	 	return $content;
	 }
	 
	 
}

?>