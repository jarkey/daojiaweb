<?php 
include_once("../inc/config.inc.php");
$pageTitle="提交订单";    //当前页标题
include_once('area.php');
include_once("../inc/buy/buy_1_1.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
if($total<$logistics_num){$logistics=$logistics_p;}else{$logistics=0;}
$total_all=$total+$logistics;
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

//修改地址
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




/*********从表里面读出数据  地址*********************/
$sql="select * from gplat_order_deliver where userid='$userid' order by  type1 desc,deliverid desc";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	if($data['type']==1){$css_str='on'; $css_str1='默认';}else{$css_str=''; $css_str1='';}
	$Nation=address_view($data['Nation']);
	$Province=address_view($data['Province']);
	$City=address_view($data['City']);
	$County=address_view($data['County']);
	
	$content.='<div class="address '.$css_str.'" cc="'.$data['deliverid'].'">
            	<h4><span>'.$css_str1.'地址</span>'.$Province.$City.$County.$data['address'].'</h4>
                <p>'.$data['consignee'].'</p>
                <p>'.$data['mobile'].' &nbsp; '.$data['telephone'].'</p>
                <p><a href="#" class="aa" cc="'.$data['deliverid'].'">修改</a></p>
            </div>';
	}
$readUser=readUserNewData($userid);



?>
<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pageTitle?>-<?=WEB_TITLE?>-Power by <?=DMOOO_NAME?></title>
<meta name="keywords" content="<?=$head_keywords?>" />
<meta name="description" content="<?=$head_description?>" />
<meta name="copyright" content="<?=$head_copyright?>" />
<!--自适应手机屏幕-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!--end 自适应手机屏幕-->
<link href="css/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.1.4.2-min.js"></script>
<script type="text/javascript" src="js/nff.js"></script>
<script language="javascript" src="js/Ajax_Area.js"></script>
<script language="javascript" src="js/check.js"></script>
<script language="javascript" src="js/radioval.js"></script>
<script language="javascript" >
 $(document).ready(function() { 
			

 $('.aa').click(function(){  //修改地址ajax
				
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
 
  $('#t_order').click(function(){  //修改地址ajax
						
    deliverid = parseInt($('.on').attr('cc'));
	var invoice=$('#invoice').val();
	var remark=$('#remark').val();
	 times1=$('input[name=times1]').radioval();
	  times2=$('input[name=times2]').radioval();
	  
	
	if(deliverid>=1){
		
		//alert(times1);
	window.location.href="buy_5.php?deliverid="+deliverid+"&invoice="+invoice+"&times1="+times1+"&times2="+times2+"&remark="+remark;
		}else{
			alert('请选择收货地址');
			}
		});
 
	
	
    });
</script>
</head>


<body>
<div class="top_w2">
	<div class="back1"><a href="buy_1.php">&lt;</a></div>
    提交订单
    <div class="back2"><a href="buy_1.php"><img src="images/news_03.png" alt=""></a></div>
</div>

<div class="wrapper">
<!--<div class="choose_dz">-->
	<div class="hdxx2_choose">
    	<h3>选择配送地址</h3>
        <?=$content?>
       <!-- <dl>
        	<dt><span href="#">默认地址</span>苏州市高新（虎丘）</dt>
            <dd>名城花园</dd>
            <dd>地址：名城花园1号站</dd>
            <dd><a href="#">修改</a></dd>
        </dl>
        <dl>
        	<dt>苏州市高新（虎丘）</dt>
            <dd>名城花园</dd>
            <dd>地址：名城花园1号站</dd>
            <dd><a href="#">修改</a></dd>
        </dl>-->
        <br><a href="#" class="add">+新建地址</a>
    </div>
        <script type="text/javascript">
        	$(function(){
$('.address').click(function(){
$('.address').removeClass('on');
$(this).addClass('on')
})
})
        </script>
    <div class="shqd">
    	<h3>送货清单</h3>
        <div class="qd">
        	<h4>取货时间：<input type="text" value="点击选择配送时间" class="ps_time"></h4>
           <p>*到家提醒您为保证新鲜，请尽快取货
             <span class="s10"></span>
            <div class="time">
                	<table cellpadding="0" cellspacing="0">
                    	<tr><td>时段</td>
                        	<td><input type="radio" name="times1" value="9:00-10:00" />9:00-10:00</td>
                            <td><input type="radio" name="times1" value="10:00-11:00"  />10:00-11:00</td>
                            <td><input type="radio" name="times1" value="11:00-12:00" />11:00-12:00</td>
                        </tr>
                        <tr><td><input type="radio" name="times1" value="13:00-14:00" />13:00-14:00</td>
                        	<td><input type="radio" name="times1" value="14:00-15:00" />14:00-15:00</td>
                            <td><input type="radio" name="times1" value="15:00-16:00" />15:00-16:00</td>
                            <td><input type="radio" name="times1" value="16:00-17:00" />16:00-17:00</td>
                        </tr>
                        <tr>
                        	<td><input type="radio" name="times1" value="17:00-18:00" />17:00-18:00</td>
                            <td><input type="radio" name="times1" value="18:00-19:00"  />18:00-19:00</td>
                            <td><input type="radio" name="times1" value="不限" checked="checked" />不限</td>
                            <td></td>
                        </tr>
                        <tr><td>日期</td>
                        	<td><input type="radio" name="times2" value="工作日" />仅限工作日送货</td>
                            <td><input type="radio" name="times2" value="周六周日"  />仅限周六周日送货</td>
                            <td><input type="radio" name="times2" value="不限" checked="checked" />不限</td>
                        </tr>
                       
                    </table>
                    </div>
                    </p>
           <script type="text/javascript">
            	$(function(){
					var onOff=true;
					$('.qd input').click(function(){
						
						if(onOff){
							$('.qd').find('.time').show();
							$('.qd').find('.s10').show();
							onOff=false
						}else{
							$('.qd').find('.time').hide();
							$('.qd').find('.s10').hide();
							onOff=true
						}
					})
				})
            </script>
            <table cellpadding="0" cellspacing="0">
            	<tr class="tr1">
                	<td width="35%" align="center" valign="middle">商品信息</td>
                  <td width="22%" align="center" valign="middle">单价</td>
                  <td width="16%" align="center" valign="middle">数量</td>
                    <td width="27%" align="center" valign="middle">小计</td>
                </tr>
               <!-- <tr>
                	<td align="center" valign="middle">
                    	<dl>
                        	<a href="#">
                        		<dt><img src="images/gwc_03.jpg" alt=""></dt>
                            	<dd>特小凤梨约300g</dd>
                            </a>
                        </dl>
                    </td>
                  <td align="center" valign="middle">￥17.8</td>
                  <td align="center" valign="middle">1</td>
                    <td align="center" valign="middle">￥17.8</td>
                </tr>-->
              <?=$m_view_cart2?>  
            </table>
             <table cellpadding="0" cellspacing="0" class="tab2">
             
             </table>
        </div>
        
        <div class="fp_div">
        	<h4>发票抬头<input type="text" name="invoice" id="invoice"></h4>
            <h4>备注信息<input type="text" name="remark" id="remark"></h4>
        </div>
        <div class="tj_div">
        	<p>运费：<span>￥<?=$logistics?></span>（满50免运费）</p>
            <p>商品金额：<span>￥<?=$total?></span></p>
            <p>已优惠：<span>￥0</span></p>
            <p>总金额：<span>￥<?=$total_all?></span></p>
            
            <a href="###" id="t_order" class="tj">提交订单</a>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>

<div class="tk tk_xj">
	<i>X</i>
	<h3>新建地址</h3>
  <form action="" method="post" name="addressForm1" onSubmit="return addressForm()">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr>
      <td width="60" height="30" class="tdBorder1">收货人：</td>
      <td class="tdBorder1">
   <input type="text" name="consignee" id="consignee" />
        </td>
    </tr>
   
      <td height="30" class="tdBorder1">地　址：</td>
    <td class="tdBorder1">
<?=$content_all?> *</td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">电　话：</td>
    <td class="tdBorder1">
        <input type="text" name="telephone" id="telephone" />
</td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">手　机：</td>
    <td class="tdBorder1">
 <input type="text" name="mobile" id="mobile" />
     *</td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">邮　编：</td>
    <td class="tdBorder1">
 <input type="text" name="postcode" id="postcode" />
</td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">备  注：</td>
    <td class="tdBorder1">
     <textarea name="remarks" ></textarea>
      </td>
  </tr>
   <tr>
    <td height="20" class="tdBorder1">&nbsp;<input type="hidden" name="add_orders" value="add_orders"></td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="添加地址" class="submit" /></td>
  </tr>
</table> </form> 
</div>

<div class="tk tk_xg" >
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
	
	$('.hdxx2_choose').find('.add').click(function(){
		$('.tk_xj').show();
	})
	
	$('.address').find('p a').click(function(){
		$('.tk_xg').show();
	})
	
})
</script>
</body>

</html>
