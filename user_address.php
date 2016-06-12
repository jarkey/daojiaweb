<?php 
$pageTitle="收货地址管理";    //当前页标题
include_once("inc/config.inc.php");
include_once('area.php');
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}

/********删除数据***************/
if($_GET['del'])
{
	$sql_del="delete from gplat_order_deliver where userid='$userid' and deliverid =".$_GET['del'];
	$result_del=mysql_query($sql_del)or die(mysql_error());
}
/********修改数据***************/
if($_POST['up_address']=='up_address')
{
	$consignee=$_POST['consignee'];
	$userid=$_SESSION['userid'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$mobile=$_POST['mobile'];
	$postcode=$_POST['postcode'];
	$remarks=$_POST['remarks'];
    $sql_up="update gplat_order_deliver set consignee='$consignee',address='$address',telephone='$telephone',mobile='$mobile',postcode='$postcode',remarks='$remarks' where userid='$userId' and deliverid =".$_GET['deliverid'];
	$result_up=mysql_query($sql_up);
	echo '<script>alert("收货地址修改成功");</script>';
	
	}

/********添加常用收货人到数据库***********/
if($_POST['add_orders'])
{  
	$remarks=$_POST['remarks'];
	$consignee=$_POST['consignee'];
	$userid=$_SESSION['userid'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$mobile=$_POST['mobile'];
	$postcode=$_POST['postcode'];
	
	$Nation=$_POST['Nation'];
	$Province=$_POST['Province'];
	$City=$_POST['City'];
	$County=$_POST['County'];

	$sql="insert into gplat_order_deliver (consignee,userid,address,telephone,mobile,postcode,remarks,Nation,Province,City,County) values ('$consignee','$userid','$address','$telephone','$mobile','$postcode','$remarks','$Nation','$Province','$City','$County')";
	$result=mysql_query($sql)or die(mysql_error());

}

/*********从表里面读出数据*********************/
$sql="select * from gplat_order_deliver where userid='$userid'";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	
	$content.='
<tr>
                	<td>'.$date['consignee'].' &nbsp;	'.$date['address'].' </td>
                    <td align="center" valign="middle">'.$date['mobile'].' </td>
                  <td> '.$date['telephone'].'</td>
                  <td>'.$date['postcode'].'</td>
                    <td align="center" valign="middle"  class="address">
                    	<a href="#" class="swmr">设为默认</a>
                        <a href="user_address.php?del='.$date['deliverid'].'" onclick="return window.confirm(\'确定删除?\')">删除地址</a>
                        <a href="#" class="aa" cc="'.$date['deliverid'].'">修改地址</a>
                    </td>
                </tr>';
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

<script language="javascript" src="js/Ajax_Area.js"></script>
<script language="javascript" src="js/check.js"></script>
<script language="javascript" >
 $(document).ready(function() { 
		//用户名唯一实时验证 	

 $('.aa').click(function(){
						
    cc = $(this).attr('cc')
	  $.ajax(
		{
	     type:"POST",
		url:"address_ajax.php",
		dataType:"html",
		data:"address="+cc, 
		success:function(msg)
			 {
			   $('#ajax_address').html(msg);
			     
			}
			});  
		});
	
	
    });
</script>
</head>
<?php require('inc/header.inc.php'); ?>



<?php require('inc/header_s.inc.php'); ?>


<div class="nav_w clearfix">
  <?php require('inc/header_url.php'); ?>
    
     <ul id="nav" style="display:none">
<?php require('inc/left_nav.php'); ?>
	</ul>
 
    
</div>
<div class="x"></div>

<div class="wrapper_o">
	<?php require('inc/user_left.php'); ?>
    <div class="o_right">
    	<div class="right_t">
        	收货地址
        </div>
        <div class="dz_div">
        	<table cellpadding="0" cellspacing="0" class="table1">
            	<tr class="tr1">
                	<td width="362">收货地址</td>
                  <td width="162" align="center" valign="middle">手机号码</td>
                  <td width="140">固定电话</td>
                  <td width="80">邮政邮编</td>
                    <td width="152" align="center" valign="middle">操作</td>
                </tr>
                <?=$content?>
            </table>
            <a href="#" class="add">+添加新地址</a>
            <br />
<form action="user_address.php" method="post" name="addressForm1" onsubmit="return addressForm()">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr>
      <td width="100" height="30" class="tdBorder1">收货人：</td>
      <td class="tdBorder1">&nbsp;<span id="spry_consignee">
        <label>
          <input type="text" name="consignee" id="consignee" />
        </label>
       *</span>        <input type="hidden" name="address" /></td>
    </tr>
   <tr>
      <td height="30" class="tdBorder1">地　址：</td>
    <td class="tdBorder1">&nbsp;<span id="spry_address">
      <label>
        <?=$content_all?>
      </label>
     *</span></td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">电　话：</td>
    <td class="tdBorder1">&nbsp;<span id="spry_telephone">
      <label>
        <input type="text" name="telephone" id="telephone" />
      </label>
      </span></td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">手　机：</td>
    <td class="tdBorder1">&nbsp;<span id="spry_mobile">

        <input type="text" name="mobile" id="mobile" />
     *</span></td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">邮　编：</td>
    <td class="tdBorder1">&nbsp;<span id="spry_postcode">
 <input type="text" name="postcode" id="postcode" />
</span></td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">备  注：</td>
    <td class="tdBorder1">&nbsp;
     <textarea name="remarks" ></textarea>
      </td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">&nbsp;<input type="hidden" name="add_orders" value="add_orders"></td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="添加地址" class="submit" /></td>
  </tr>
</table> </form>     </div>
        
    </div>
</div>
<div class="tk tk_xg" style="margin-top:-200px;" >
	<i>X</i>
	<h3>修改地址</h3>
    <div id="ajax_address"></div>
</div>

<script type="text/javascript">
$(function(){
	$('.tk').css({
		left:($(window).width()-$('.tk').width())/2,
		top:($(window).height()-$('.tk').height())/2
	})
	$('.tk').find('i').click(function(){
		$(this).parents('.tk').hide()
	})
	
	
	
	$('.address').find('.aa').click(function(){
		$('.tk_xg').show();
	})
	
})
</script>
<?php require('inc/footer.inc.php'); ?>
</body>
</html>
