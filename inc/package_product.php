<?php 
/**ȡ���ײ��е���Ʒ��Ϣ***/
function package_product($packageId=''){
	global $disabled;
	$sql="select * from gplat_package_product where packageId=".$packageId;
	$result=mysql_query($sql);
	$content='<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td>&nbsp;</td>
				<td>��Ʒ����</td>
				<td>��Ʒ���</td>
				<td>�г��۸�</td>
				<td>��Ա�۸�</td>
				<td>����</td>
			  </tr>';
	while ($data=mysql_fetch_assoc($result)) {
		$sql_p="select productName,productNum,mPrice,memberPrice from gplat_product where productid=".$data['productId'];
		$result_p=mysql_query($sql_p);
		$data_p=mysql_fetch_assoc($result_p);
		$content.='  <tr>
				<td>'.'<input type="checkbox" name="productid[]"  value="'.$data['productId'].'-'.$data['num'].'" checked="checked" '.$disabled.'/>
        '.'</td>
				<td>'.$data_p['productName'].'</td>
				<td>'.$data_p['productNum'].'</td>
				<td>'.$data_p['mPrice'].CURRENCY.'</td>
				<td>'.$data_p['memberPrice'].CURRENCY.'</td>
				<td>'.$data['num'].'</td>
			  </tr>';
		}
	   $content.='</table>';
	   return $content;
}
?>