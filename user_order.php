<?php 
$pageTitle="��������";    //��ǰҳ����
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
if ($_GET['del'])
{
	
	$sql="delete from gplat_order_cart where userid='$userId' and orderid=".$_GET['del'];

	$result=mysql_query($sql);	
	}
	
if ($_GET['tuikuan'])
{
	$sql="update  gplat_order_cart set status=6 where userid='$userId' and orderid=".$_GET['tuikuan'];
	$result=mysql_query($sql);	
	}
if ($_GET['shouhuo'])
{
	$sql="update  gplat_order_cart set status=3 where userid='$userId' and orderid=".$_GET['shouhuo'];
	$result=mysql_query($sql);	
	}

if ($userId==0) {
	$content='���ȵ�¼';
}else {

	if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;

if($_GET['status']==1){$sql_str=" and payment=0";}
if($_GET['status']==2){$sql_str=" and payment=1 and status<3";}
if($_GET['status']==3){$sql_str=" and isbook=0 and status=3";}

$sql="select orderid from gplat_order_cart where userid=$userId $sql_str";
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from gplat_order_cart where userid='$userId'  $sql_str order by orderid desc limit $page_one,$num";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{  
    $orderid=$date['orderid'];
	 $payment=$date['payment'];
	  $price_all=$date['price_all']+$date['logistics'];
	//$money=money_all($orderid);
	$status=orderStatus($date['status']);
	$id=$date['orderid'];
   if ($payment!=1) {
   	$del='<a href="user_order.php?del='.$id.'" onclick="return window.confirm(\'ȷ��ȡ��?\')">ȡ��</a>';
   }else { $del='';}
   if ($payment==1 and $date['status']<3) {
   	$tuikuan='<a href="user_order.php?tuikuan='.$id.'" onclick="return window.confirm(\'ȷ���˿�?\')">�˿�</a>
	<a href="user_order.php?shouhuo='.$id.'" onclick="return window.confirm(\'ȷ���ջ�?\')">�ջ�</a>';
	
   }else { $tuikuan='';}
    if ($payment==0) {
   	$payment_str='δ����';
	$status='<a href="user_order_view.php?id='.$id.'">����</a>';
   }else { 	$payment_str='�Ѹ���';}
    
	
	$content.='<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1">'.$date['orderNo'].'</td>
	<td class="tdBorder1">'.$date['dates'].'&nbsp;'.$date['times'].'</td>
    <td class="tdBorder1">'.$date['consignee'].'&nbsp;</td>
    <td class="tdBorder1">'.$price_all.'</td>
    <td class="tdBorder1">'.$payment_str.'-'.$status.'</td>
    <td class="tdBorder1">'.$del.$tuikuan.' &nbsp;<a href="user_order_view.php?id='.$id.'">�鿴</a>
   </td>
</tr>';
	
}
			include ( "inc/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $num_all ; 
$intShowNum  = $num ;   
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

/*��ҳ������*/
//��ҳ��ĵ�����������ҳ����
$page='<tr><td height="26" colspan="7" class="tdBorder1"><div class="BPbar">��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
/*ѭ���ۻ�ȡ�÷�ҳ��*/
foreach ( $aPDatas['bar'] as $aBar ) 
	{
       $page_str.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
	$page2='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div> </td></tr>';
	$content.=$page.$page_str.$page2; 
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>

</head>
<?php require('inc/header.inc.php'); ?>


<?php require('inc/header_s.inc.php'); ?>



<div class="nav_w clearfix">
   <?php require('inc/header_url.php'); ?>
    
      <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
 

 
 
 
	<script type="text/javascript">
		jQuery("#nav").slide({ 
				type:"menu", //Ч������
				titCell:".mainCate", // ��괥������
				targetCell:".subCate", // Ч�����󣬱��뱻titCell����
				delayTime:0, // Ч��ʱ��
				triggerTime:0, //����ӳٴ���ʱ��
				defaultPlay:false,//Ĭ��ִ��
				returnDefault:true//����Ĭ��
			});
	</script> 
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	<?php include('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	�ҵĶ���
        </div>
        <div class="ddgl_div">
        	<div class="ddgl_t">
            	<ul>
                	<li <?php if($_GET['status']==0){echo 'class="on"';} ?>><a href="user_order.php">ȫ��</a></li>
                    <li <?php if($_GET['status']==1){echo 'class="on"';} ?>><a href="user_order.php?status=1">������<span>��<?=order_status_num($userId,1)?>��</span></a></li>
                    <li <?php if($_GET['status']==2){echo 'class="on"';} ?>><a href="user_order.php?status=2">���ջ�<span>��<?=order_status_num($userId,2)?>��</span></a></li>
                    <li <?php if($_GET['status']==3){echo 'class="on"';} ?>><a href="user_order.php?status=3">������<span>��<?=order_status_num($userId,3)?>��</span></a></li>
                </ul>
                <form action="user_order.php" method="get">
                	<input type="text" value="�������" class="dd_text" /><input type="button" value="��ѯ" class="dd_btn" />
                </form>
            </div>
            <div class="ddgl_c">
            	<table cellpadding="0" cellspacing="0">
                	<tr class="tr1">
                    	<td width="25%" align="center">������</td>
                        <td width="20%" align="center" valign="middle">�µ�ʱ��</td>
                      <td width="15%" align="center" valign="middle">�ջ���</td>
                      <td width="15%" align="center" valign="middle">�ܼۣ�Ԫ��</td>
                      <td width="13%" align="center" valign="middle">״̬</td>
                        <td width="12%" align="center" valign="middle">����</td>
                    </tr>
                    <?=$content?>
                  <!--  <tr>
                    	<td>
                        	<dl>
                            	<dt><a href="#"><img src="images/dd_03.jpg" alt="" /></a></dt>
                                <dd><a href="#">���ܲ�</a></dd>
                            </dl>
                        </td>
                        <td align="center" valign="middle">16.00</td>
                      <td align="center" valign="middle">3</td>
                      <td align="center" valign="middle">48.00</td>
                      <td align="center" valign="middle"><span>������</span></td>
                        <td align="center" valign="middle"><a href="#">�رս���</a></td>
                    </tr>-->
                 
                </table>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
