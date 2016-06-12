<?php 
$pageTitle="选择配送地址";    //当前页标题
include_once("inc/config.inc.php");
include_once('area.php');
include_once("inc/buy/buy_1_1.php");
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
<?php require('inc/header.inc.php'); ?>


<div class="header clearfix">
	<div class="logo"><a href="index.php"><img src="images/index_03.png" alt="" /></a></div>
    <div class="city">
    	<h3><img src="images/index_09.png" alt="" /></h3>
       
    </div>
   
 	<div class="tj_img"><img src="images/ddtj_03.jpg" alt="" /></div>

</div>





<div class="hdxx_div">
	<div class="hdxx1">选择配送地址</div>
    <div class="hdxx2">
    	<div class="hdxx2_choose">
        	<?=$content?>
        </div>
          <script type="text/javascript">
        	$(function(){
$('.address').click(function(){
$('.address').removeClass('on');
$(this).addClass('on')
})
})
        </script>
        
        <div class="add_dz"><a href="#"><span>+</span>新建地址</a></div>
    </div>
      <div class="choose_time">
    	<h3 class="ti"><a href="buy_1.php">返回购物车</a>送货清单</h3>
        <div class="sh_div">
        	<div class="time_choose">
            	取货时间<input type="text" value="点击选择配送时间" /><span>到家提醒您为保证新鲜，请尽快取货</span>
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
            </div>
            
            <script type="text/javascript">
            	$(function(){
					var onOff=true;
					$('.time_choose input').click(function(){
						
						if(onOff){
							$('.time_choose').find('.time').show();
							$('.time_choose').find('.s10').show();
							onOff=false
						}else{
							$('.time_choose').find('.time').hide();
							$('.time_choose').find('.s10').hide();
							onOff=true
						}
					})
				})
            </script>
            
            
            <div class="pro_table">
            	<table cellpadding="0" cellspacing="0" class="tab1">
    	<tr>
        <td width="50" align="center" valign="middle"></td>
        	<td width="510" align="center" valign="middle">商品信息</td>
          <td width="165" align="center" valign="middle">单价</td>
          <td width="155" align="center" valign="middle">数量</td>
          <td width="145" align="center" valign="middle">小计</td>
          
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="tab2">
  <?=$view_cart2?>
    </table>
           <!-- </div>
            
            <div class="yhq">
            	<h3><img src="images/jia.jpg" alt="" id="jia" />使用优惠券</h3>
                <div class="q_div">
                	<form action="#">
                		<p><input name="" type="radio" value="" />满29.00元减10.00元<span class="s1">全场通用</span><span class="s2">有效期至：2016-04-11</span></p>
                    	<p><input name="" type="radio" value="" />满29.00元减10.00元<span class="s1">全场通用</span><span class="s2">有效期至：2016-04-11</span></p>
                        
                        <h4><a href="#" class="a1">有实体券?</a>有实体优惠券密码？    <a href="#">[点击优惠券激活]</a></h4>
                        <h5>共使用了 <span>0</span> 张优惠券　可以优惠 <span>0.00</span> 元 </h5>
                    </form>
                </div>
                
                <h3><img src="images/jia.jpg" alt="" id="jian"/>使用积分</h3>
                <div class="jf1_div">
                	<h4><a href="#">[了解积分规则]</a>您的食行账户中有 <span>0 </span>个积分,本次消费最多可使用<span>0 </span>个(抵扣0元,<span>积分可直接抵扣订单金额 </span>)</h4>
                	<p>本次使用：<input type="text" value="0" class="num" />个，抵扣<span></span>元 <input name="" type="button" value="使用" class="btn_sy" /></p>
                </div>
            </div>
        </div>-->
    </div>
    
    <script type="text/javascript">
		$(function(){
			var onOff2=true;
			$('#jia').click(function(){
				
				if(onOff2){
					$('.yhq').find('.q_div').show();
					$(this).attr({ src: "images/jian.jpg"});
					onOff2=false
				}else{
					$('.yhq').find('.q_div').hide();
					$(this).attr({ src: "images/jia.jpg"});
					onOff2=true
				}
			})
			var onOff3=true;
			$('#jian').click(function(){
				
				if(onOff3){
					$('.yhq').find('.jf1_div').show();
					$(this).attr({ src: "images/jian.jpg"});
					onOff3=false
				}else{
					$('.yhq').find('.jf1_div').hide();
					$(this).attr({ src: "images/jia.jpg"});
					onOff3=true
				}
			})
		})
	</script>
    
    <div class="hdxx3">
    	发票抬头<input type="text" name="invoice" id="invoice" class="text_f"/>
    </div>
    <div class="hdxx3">
    	备注信息<input type="text" name="remark" id="remark" class="text_f"/>
    </div>
    <div class="hdxx5">
    	<!--账户余额：<span>￥<?=$_SESSION['amount']?></span>-->
       <div style="height:100%; width:200px; float:right; text-align:left;"> 运费:<span>￥<?=$logistics?></span> (满50免运费)<br />
商品金额:<span>￥<?=$total?></span><br />
已优惠:<span>￥0</span><br />
总金额:<span>￥<?=$total_all?></span></div>
    </div>
    <div class="hdxx4">
    	您在购物过程中有任何疑问，请查阅帮助中心或拨打客服电话：400-8281-898
        <a href="###" id="t_order" >提交订单</a>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<div class="tk tk_xj">
	<i>X</i>
	<h3>新建地址</h3>
  <form action="" method="post" name="addressForm1" onsubmit="return addressForm()">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr>
      <td width="80" height="30" class="tdBorder1">收货人：</td>
      <td class="tdBorder1">&nbsp;<span id="spry_consignee">
   
          <input type="text" name="consignee" id="consignee" />
       
       *</span>       </td>
    </tr>
   
      <td height="30" class="tdBorder1">地　址：</td>
    <td class="tdBorder1"><span id="spry_address">
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
	
	$('.hdxx2').find('.add_dz a').click(function(){
		$('.tk_xj').show();
	})
	
	$('.address').find('p a').click(function(){
		$('.tk_xg').show();
	})
	
})
</script>
</body>
</html>
