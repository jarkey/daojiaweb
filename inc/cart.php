<?php    
//require('config.inc.php');
/**
* cart 
* ������ļ��� ��������  ���ﳵ 
*/ 

class cart
{    
var $cart;    

function __construct()
{    
 if(isset($_SESSION["sys_lib_cart"]))
 $this->cart = $_SESSION["sys_lib_cart"];    
 else
 $this->cart=array();
}    

/**
* �������һ����Ʒ�����ﳵ��
* $arr = array('id'=>'2','name'=>'goods_name','price'=>'30','count'=>'50'   
*/  

function add($arr=array())
{    
 if(count($this->cart))
 {    
   $new_product = true;    
  foreach ($this->cart as $had)    
  {    
    if($had['id'] == $arr['id'] and $had['priceid'] == $arr['priceid'])    
    {    
     $key = array_search($had,$this->cart);    
     $this->cart[$key]['count']+=$arr['count'];
     $new_product = false;    
     break;    
  }    
 }    

  if($new_product)
  {    
   array_push($this->cart,$arr);    
  }    
 }  else   
{    
 array_push($this->cart,$arr);    
} 
$array=$this->cart;

$_SESSION["sys_lib_cart"] = $this->cart;    
}    


//�޸���Ʒ����
function modify($id,$count,$priceid)
{    
 if(count($this->cart))
 {    
  foreach ($this->cart as  $k => $v)    
  {    
    if($v['id'] == $id and $v['priceid']==$priceid)    
    {    
      $this->cart[$k]['count']=$count;
	   $this->cart[$k]['priceid']=$priceid;
	 
      break;    
     }
  } 
 }    

  $_SESSION["sys_lib_cart"] = $this->cart;    
} 


//��ȡһ����Ʒ�ļ۸�
function one_price($id,$priceid)
{    
 if(count($this->cart))
 {    
  foreach ($this->cart as  $k => $v)    
  {    
    if($v['id'] == $id and $v['priceid'] == $priceid)    
    {    
      $count=$this->cart[$k]['count'];
	  $price=$this->cart[$k]['price'];
	  $one_price=$count*$price;
	  return $one_price; 
     // break;    
     }
  } 
 }    

  $_SESSION["sys_lib_cart"] = $this->cart;    
} 


//�жϲ�Ʒ�Ƿ��Ѿ����빺�ﳵ
function one_cart($id)
{    
 if(count($this->cart))
 {    
  foreach ($this->cart as  $k => $v)    
  {    
    if($v['id'] == $id )    
    {    
     
	  return $id; 
     // break;    
     }
  } 
 }    

  $_SESSION["sys_lib_cart"] = $this->cart;    
} 

/**
 * ɾ��һ����Ʒ
 * @param    int id ��Ʒ���
 */

function delete($id)
{ 
 foreach ($this->cart as $had)    
 {    
  if($had['id'] == $id)    
  {    
   $key = array_search($had,$this->cart);    
   unset($this->cart[$key]);    
   break;    
  }    
 }
 $_SESSION["sys_lib_cart"] = $this->cart;     

}    

/**
 * ɾ�����е���Ʒ
 */

function delete_all()
{    
 //unset($this->cart);
 if(isset($_SESSION["sys_lib_cart"]))
 $this->cart = array();
 unset($_SESSION["sys_lib_cart"]);     
}    

/**
 * ��ȡ���ﳵ��������Ʒ
 */

function get_cart()
{    
 return $this->cart;    
}
//array('id'=>'2','name'=>'goods_name','price'=>'30','count'=>'50' 

//�ܽ��
function get_total()
{
 $total=0;
  foreach($this->cart as $v)
  {
   $total += $v['price'] * $v['count'];
  }
 return $total; 
}

//������
function get_weight()
{
 $total=0;
  foreach($this->cart as $v)
  {
   $total += $v['specifications'] * $v['count'];
  }
 return $total; 
}


//���ﳵ��Ʒ����
function get_num()
{
 $pr_num=0;
  foreach($this->cart as $v)
  {
   $pr_num += $v['count'];
  }
 return $pr_num; 
}



//�鿴���ﳵ
function view_cart($del_str='')
{
 	foreach($this->cart as $pr_id){
 		
 		$sql="select img,productName from dmooo_product where productid=".$pr_id['id'];
 		$result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
 		$price_1=$pr_id['price'] * $pr_id['count'];
 		if ($del_str!=''){
 			$del='';
 		}else {
 			$del='<a href="buy_1.php?del_id='.$pr_id['id'].'">ȡ��</a>'; 			
 		}
		$product_price_name=product_price_name($pr_id['id'],$pr_id['priceid']);
 		
 		$content_cart.=' <tr>
        	<td align="center" width="110" valign="middle"><input type="checkbox" value="'.$pr_id['id'].'" name="delid[]" checked="checked"/></td>
            <td width="450">
           	  <dl>
                    <dt><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank"><img src="userfiles/'.$data['img'].'"  width="68" height="68" alt="" /></a></dt>
                    <dd><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank">'.$data['productName'].'</a> '.$product_price_name.'<br />��'.$pr_id['price'].'</dd>
                </dl>
            </td>
            <td width="165" align="center" valign="middle">��'.$pr_id['price'].'</td>
            <td width="155"  align="center" valign="middle">
			<input type="hidden" name="re_id[]" value="'.$pr_id['id'].'" />
			<input type="button" value="-" class="J_minus" fid="'.$pr_id['id'].'"   priceid="'.$pr_id['priceid'].'"/>
			<input  type="text"  value="'.$pr_id['count'].'" class="p_cart"  name="'.$pr_id['id'].'"  id="'.$pr_id['id'].$pr_id['priceid'].'"  priceid="'.$pr_id['priceid'].'" />
			<input type="button" value="+"  class="J_add"  fid="'.$pr_id['id'].'" priceid="'.$pr_id['priceid'].'"/>
			</td>
            <td width="145" align="center" valign="middle" id="p_'.$pr_id['id'].$pr_id['priceid'].'">��'.$price_1.'</td>
            <td align="center" valign="middle">'.$del.'</td>
        </tr>  ';
 		$data['sale']='';
        }
	return $content_cart;
}

//�鿴���ﳵ
function view_cart2()
{
 	foreach($this->cart as $pr_id){
 		
 		$sql="select img,productName from dmooo_product where productid=".$pr_id['id'];
 		$result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
 		$price_1=$pr_id['price'] * $pr_id['count'];
 		
 		$product_price_name=product_price_name($pr_id['id'],$pr_id['priceid']);
 		$content_cart.=' <tr>
        	<td align="center" width="110" valign="middle"></td>
            <td width="450">
           	  <dl>
                    <dt><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank"><img src="userfiles/'.$data['img'].'"  width="68" height="68" alt="" /></a></dt>
                    <dd><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank">'.$data['productName'].'</a> '.$product_price_name.'<br />��'.$pr_id['price'].'</dd>
                </dl>
            </td>
            <td width="165" align="center" valign="middle">��'.$pr_id['price'].'</td>
            <td width="155"  align="center" valign="middle"><input type="hidden" name="re_id[]" value="'.$pr_id['id'].'" /><input name="re_count[]" type="text" value="'.$pr_id['count'].'" size="3"  /></td>
            <td width="145" align="center" valign="middle">��'.$price_1.'</td>
        </tr>  ';
 		$data['sale']='';
        }
	return $content_cart;
}

//�鿴���ﳵ
function m_view_cart2()
{
 	foreach($this->cart as $pr_id){
 		
 		$sql="select img,productName from dmooo_product where productid=".$pr_id['id'];
 		$result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
 		$price_1=$pr_id['price'] * $pr_id['count'];
 		
 		$product_price_name=product_price_name($pr_id['id'],$pr_id['priceid']);
 		$content_cart.=' <tr>
        	<td >
           	  <dl>
                    <dt><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank"><img src="../userfiles/'.$data['img'].'"  width="68" height="68" alt="" /></a></dt>
                    <dd><a href="product_view.php?id='.$pr_id['id'].'"  target="_blank">'.$data['productName'].'</a> '.$product_price_name.'</dd>
                </dl>
            </td>
            <td width="165" align="center" valign="middle">��'.$pr_id['price'].'</td>
            <td width="155"  align="center" valign="middle"><input type="hidden" name="re_id[]" value="'.$pr_id['id'].'" /><input name="re_count[]" type="text" value="'.$pr_id['count'].'" size="3"  /></td>
            <td width="145" align="center" valign="middle">��'.$price_1.'</td>
        </tr>  ';
 		$data['sale']='';
        }
	return $content_cart;
}

function view_cart_m($del_str='')
{
 	foreach($this->cart as $pr_id){
 		
 		$sql="select img,productName from dmooo_product where productid=".$pr_id['id'];
 		$result=mysql_query($sql);
 		$data=mysql_fetch_assoc($result);
 		$price_1=$pr_id['price'] * $pr_id['count'];
 		if ($del_str!=''){
 			$del='';
 		}else {
 			$del='<a href="buy_1.php?del_id='.$pr_id['id'].'">ȡ��</a>'; 			
 		}
		$product_price_name=product_price_name($pr_id['id'],$pr_id['priceid']);
 		
 		$content_cart.=' 
		<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="10%" align="center" valign="middle"><!--<img src="images/gwc_10.jpg" alt="" class="choose">--><input type="hidden" name="re_id[]" value="'.$pr_id['id'].'" /></td>
                <td width="22%" align="center" valign="middle"><a href="product_view.php?id='.$pr_id['id'].'"><img src="../userfiles/'.$data['img'].'" alt=""></a></td>
                <td width="48%">
               	  <h4><a href="product_view.php?id='.$pr_id['id'].'">'.$data['productName'].$product_price_name.'</a></h4>
                    <p>��<span>'.$pr_id['price'].'</span></p>
              </td>
                <td width="20%" align="center">
				<input type="button"value="-" class="J_minus" fid="'.$pr_id['id'].'"   priceid="'.$pr_id['priceid'].'"><span><input  type="text"  value="'.$pr_id['count'].'" class="p_cart"  name="'.$pr_id['id'].'"  id="'.$pr_id['id'].$pr_id['priceid'].'"  priceid="'.$pr_id['priceid'].'" /></span><input type="button" value="+"  class="J_add"   fid="'.$pr_id['id'].'" priceid="'.$pr_id['priceid'].'">
                <br>'.$del.'</td>
          </tr>
        </table>
        <div class="space2"></div>';
 		$data['sale']='';
        }
	return $content_cart;
}


}      
    

/**ѭ��ȡ�����ﳵ�������Ʒid*
foreach($cart as $pr_id){
	echo $pr_id['id'].'<br>';
}
*/
//$a->modify('10','88');  //�޸���Ʒ����
//$total=$a->get_total();   //�ܽ��
//$a->add($arr);   //��ӵĻ��ṩ�µ����� $arr = array('id'=>'2','name'=>'goods_name','price'=>'30','count'=>'50');
//$a->delete('10');  //ɾ�����ﳵ���ṩ��Ʒid��
//$a->delete_all();  //��չ��ﳵ


?>
