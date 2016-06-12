<?php 
$pageTitle="积分查询";    //当前页标题
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
if($_GET['ty']==2){$sql_str=' and logNum>0';}// 收入和支出
$sql="select logId from gplat_member_log where logIndex=1 and userid='$userId' $sql_str"; 

$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum;         //取出当前分页的起始行数

//显示条数
$sql_str="select * from gplat_member_log where logIndex=1 and userid='$userId' $sql_str order by logId desc limit $page_num,$nShowNum";
$result_str=mysql_query($sql_str);
while ($date=mysql_fetch_assoc($result_str))
{
	$content.='<tr align="center"><td class="tdBorder1" >'.$date['logNum'].'</td>
	<td class="tdBorder1"  align="left">'.$date['logNote'].'</td>
	<td class="tdBorder1">'.$date['times'].'</td></tr>';
	
}

//分页类调用
include ( "inc/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // 假设记录总数为1000
$intShowNum  = 10 ;   // 每页显示10
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;

/*分页的内容*/
//分页类的调用在主程序页面上
$page='<tr><td height="26" colspan="3" class="tdBorder1"><div class="BPbar">总页数:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '.'<a href="'.$aPDatas['f_ln'].'">首页</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['p_ln'].'">上一页</a>&nbsp;&nbsp;'.'<a href="'.$aPDatas['n_ln'].'">下一页</a>&nbsp;&nbsp; '.'分页条:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>'; 
/*循环累积取得分页码*/
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
				type:"menu", //效果类型
				titCell:".mainCate", // 鼠标触发对象
				targetCell:".subCate", // 效果对象，必须被titCell包含
				delayTime:0, // 效果时间
				triggerTime:0, //鼠标延迟触发时间
				defaultPlay:false,//默认执行
				returnDefault:true//返回默认
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
        	<h4>积分：<span><?=$_SESSION['point']?>分</span></h4>
            <div class="jf_menu">
            	<ul>
                	<li <?php if($_GET['ty']==0){echo'class="on"';} ?>><a href="user_integral.php">积分明细</a></li>
                    <li <?php if($_GET['ty']==2){echo'class="on"';} ?>><a href="?ty=2">收入积分</a></li>
                    <li <?php if($_GET['ty']==1){echo'class="on"';} ?>><a href="?ty=1">支出积分</a></li>
                </ul>
            </div>
            <div class="jf_table">
            	<table cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="346" align="center" valign="middle">积分</td>
                        <td width="402" align="center" valign="middle">事由</td>
                        <td width="150" align="center" valign="middle">日期</td>
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
