<?php
include_once('../inc/config.inc.php');


//判断验证码是否一致
if ($_POST['address']) {
	$sql="select * from gplat_order_deliver where deliverid =".$_POST['address'];
   $result=mysql_query($sql);
   $data=mysql_fetch_assoc($result);
   
    $Nation=address_view($data['Nation']);
	$Province=address_view($data['Province']);
	$City=address_view($data['City']);
	$County=address_view($data['County']);
	
	$content='
	<form action="?deliverid='.$_POST['address'].'" method="post" name="addressForm1" onsubmit="return addressForm()">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr>
      <td width="80" height="30" class="tdBorder1">收货人：</td>
      <td class="tdBorder1">
   <input type="text" name="consignee" id="consignee"  value="'.$data['consignee'].'"/>
      *      <input type="hidden" name="address" /></td>
    </tr>
   
      <td height="30" class="tdBorder1">地　址：</td>
    <td class="tdBorder1">
     '.$Province.$City.$County.'<input type="text" name="address" value="'.$data['address'].'" style="width:190px"/><input type="hidden" name="Province" value="'.$data['Province'].'" />
     *</td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">电　话：</td>
    <td class="tdBorder1">
        <input type="text" name="telephone" id="telephone" value="'.$data['telephone'].'"/>
      
      </span></td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">手　机：</td>
    <td class="tdBorder1">
<input type="text" name="mobile" id="mobile" value="'.$data['mobile'].'"/>
     *</td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">邮　编：</td>
    <td class="tdBorder1">
 <input type="text" name="postcode" id="postcode" value="'.$data['postcode'].'"/>
</td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">备  注：</td>
    <td class="tdBorder1">
     <textarea name="remarks" >'.$data['remarks'].'</textarea>
      </td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">&nbsp;<input type="hidden" name="up_address" value="up_address" </td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="修改地址" class="submit" /></td>
  </tr>
</table> </form> ';
		
	$content=iconv('GBK','UTF-8',$content);	
	
	echo"$content";

}

?>