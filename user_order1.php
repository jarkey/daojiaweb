<?php 
$pageTitle="��ҵ��������";    //��ǰҳ����
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}


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

$sql="select orderid from gplat_order_cart where userid=$userId $sql_str";
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from dmooo_enterprise_order where userid='$userId'  order by id desc limit $page_one,$num";

$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{  
  $content.='<tr align="center" bgcolor="#FFFFFF">
    <td height="30" class="tdBorder1">'.$data['content'].'</td>
	<td class="tdBorder1">'.$data['name'].'&nbsp;</td>
    <td class="tdBorder1">'.$data['phone'].'&nbsp;</td>
    <td class="tdBorder1">'.$data['company'].'&nbsp;</td>
    <td class="tdBorder1">'.$data['num'].'&nbsp;</td>
    <td class="tdBorder1">'.$data['times'].'
   </td>
</tr>';
	
}
include ( "inc/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = 10 ;   // ÿҳ��ʾ10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;

/*��ҳ������*/
//��ҳ��ĵ�����������ҳ����
$page='<tr><td height="26" colspan="6" class="tdBorder1"><div class="BPbar">��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
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
        	<?=$pageTitle?>
        </div>
		<div class="ddgl_c">
        	 	<table cellpadding="0" cellspacing="0">
                	<tr class="tr1">
                    	<td width="35%" align="center">����</td>
                        <td width="10%" align="center" valign="middle">����</td>
                      <td width="15%" align="center" valign="middle">�绰</td>
                      <td width="20%" align="center" valign="middle">��˾</td>
                      <td width="5%" align="center" valign="middle">����</td>
                        <td width="15%" align="center" valign="middle">ʱ��</td>
                    </tr>
                    <?=$content?>
                </table>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
