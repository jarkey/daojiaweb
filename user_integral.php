<?php 
$pageTitle="���ֲ�ѯ";    //��ǰҳ����
include_once("inc/config.inc.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}

readUserNewData($userId);

if($_GET['page'])
{
	$page=$_GET['page'];
	$page=(int)$page;
}else {
	$page=1;
}
$nShowNum=WENDA_VIEW_NUM;   
if($_GET['ty']==1){$sql_str=' and logNum<0';}
if($_GET['ty']==2){$sql_str=' and logNum>0';}// �����֧��
$sql="select logId from gplat_member_log where logIndex=1 and userid='$userId' $sql_str"; 

$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum;         //ȡ����ǰ��ҳ����ʼ����

//��ʾ����
$sql_str="select * from gplat_member_log where logIndex=1 and userid='$userId' $sql_str order by logId desc limit $page_num,$nShowNum";
$result_str=mysql_query($sql_str);
while ($date=mysql_fetch_assoc($result_str))
{
	$content.='<tr align="center"><td class="tdBorder1" >'.$date['logNum'].'</td>
	<td class="tdBorder1"  align="left">'.$date['logNote'].'</td>
	<td class="tdBorder1">'.$date['times'].'</td></tr>';
	
}

//��ҳ�����
include ( "inc/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = 10 ;   // ÿҳ��ʾ10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;

/*��ҳ������*/
//��ҳ��ĵ�����������ҳ����
$page='<tr><td height="26" colspan="3" class="tdBorder1"><div class="BPbar">��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
/*ѭ���ۻ�ȡ�÷�ҳ��*/
foreach ( $aPDatas['bar'] as $aBar ) 
	{
       $page_str.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
	$page2='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div> </td></tr>';
	
$content.=$page.$page_str.$page2; 
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
<div class="jf_div">
        	<h4>���֣�<span><?=$_SESSION['point']?>��</span></h4>
            <div class="jf_menu">
            	<ul>
                	<li <?php if($_GET['ty']==0){echo'class="on"';} ?>><a href="user_integral.php">������ϸ</a></li>
                    <li <?php if($_GET['ty']==2){echo'class="on"';} ?>><a href="?ty=2">�������</a></li>
                    <li <?php if($_GET['ty']==1){echo'class="on"';} ?>><a href="?ty=1">֧������</a></li>
                </ul>
            </div>
            <div class="jf_table">
            	<table cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="346" align="center" valign="middle">����</td>
                        <td width="402" align="center" valign="middle">����</td>
                        <td width="150" align="center" valign="middle">����</td>
                    </tr>
                  <!--  <tr>
                    	<td align="center" valign="middle">2016-01-20</td>
                        <td align="center" valign="middle">-16.00</td>
                    </tr>-->
                    <?=$content?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
</body>
</html>
