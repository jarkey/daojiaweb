<?php
// �ײͱ༭��ʱ��
class provisional{
	 public $provisionalid;
	 
	    function setprovisionalid($id){
           $this->provisionalid=$id ;//���ó�Ա����
        }
  
	 //�������
	 function provisional_add($userid,$product,$num){
	 	$sql="insert into gplat_provisional (userid,productid,num)value('$userid','$product','$num')";
	 	$result=mysql_query($sql);
	 }
	 
	  //�����ʱ��
	 function provisional_del($userid){
	 	$sql="delete from gplat_provisional where userid='$userid'";
	 	$result=mysql_query($sql);
	 }
	 
		 //�޸�
	 function provisional_up($num,$productid){
	 	$sql="update gplat_provisional set num='$num',productid='$productid' where id=".$this->provisionalid;
	    $result=mysql_query($sql);
	 }
	 
	 //��ʾ
	 function provisional_view($userid){
	 	$sql="select * from gplat_provisional where userid=".$userid;
	 	$result=mysql_query($sql);
	 	while ($data=mysql_fetch_assoc($result)) {
	 		$sql_p="select * from gplat_product where productid=".$data['productid'];
 		    $result_p=mysql_query($sql_p);
 		    $data_p=mysql_fetch_assoc($result_p);
 			if ($data_p['issale']=='') {$price='��Ա�۸�'.$data_p['memberPrice'];}else { $price='�����۸�'.$data_p['sale'];}
	 		$content.='<input type="checkbox" name="productid[]"  value="'.$data['productid'].'-'.$data['num'].'" checked="checked"/>
        '.$data_p['productName'].'������'.$data_p['productNum'].'�������г��۸�'.$data_p['mPrice'].'������'.$price.'������ ����:'.$data['num'].' <a href="taocan_edit_product.php?id='.$data['id'].'">�༭</a><br />';
	 	}
	 	return $content;
	 }
	 
	 
}

?>