<?php 
$pageTitle="ѡ�����͵�ַ";    //��ǰҳ����
include_once("inc/config.inc.php");
include_once('area.php');
include_once("inc/buy/buy_1_1.php");
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
if($total<$logistics_num){$logistics=$logistics_p;}else{$logistics=0;}
$total_all=$total+$logistics;
/********��ӳ����ջ��˵����ݿ�***********/
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

//�޸ĵ�ַ
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
	echo '<script>alert("�ջ���ַ�޸ĳɹ�");</script>';
	
	}




/*********�ӱ������������  ��ַ*********************/
$sql="select * from gplat_order_deliver where userid='$userid' order by  type1 desc,deliverid desc";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	if($data['type']==1){$css_str='on'; $css_str1='Ĭ��';}else{$css_str=''; $css_str1='';}
	$Nation=address_view($data['Nation']);
	$Province=address_view($data['Province']);
	$City=address_view($data['City']);
	$County=address_view($data['County']);
	
	$content.='<div class="address '.$css_str.'" cc="'.$data['deliverid'].'">
            	<h4><span>'.$css_str1.'��ַ</span>'.$Province.$City.$County.$data['address'].'</h4>
                <p>'.$data['consignee'].'</p>
                <p>'.$data['mobile'].' &nbsp; '.$data['telephone'].'</p>
                <p><a href="#" class="aa" cc="'.$data['deliverid'].'">�޸�</a></p>
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
			

 $('.aa').click(function(){  //�޸ĵ�ַajax
				
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
 
  $('#t_order').click(function(){  //�޸ĵ�ַajax
						
    deliverid = parseInt($('.on').attr('cc'));
	var invoice=$('#invoice').val();
	var remark=$('#remark').val();
	 times1=$('input[name=times1]').radioval();
	  times2=$('input[name=times2]').radioval();
	  
	
	if(deliverid>=1){
		
		//alert(times1);
	window.location.href="buy_5.php?deliverid="+deliverid+"&invoice="+invoice+"&times1="+times1+"&times2="+times2+"&remark="+remark;
		}else{
			alert('��ѡ���ջ���ַ');
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
	<div class="hdxx1">ѡ�����͵�ַ</div>
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
        
        <div class="add_dz"><a href="#"><span>+</span>�½���ַ</a></div>
    </div>
      <div class="choose_time">
    	<h3 class="ti"><a href="buy_1.php">���ع��ﳵ</a>�ͻ��嵥</h3>
        <div class="sh_div">
        	<div class="time_choose">
            	ȡ��ʱ��<input type="text" value="���ѡ������ʱ��" /><span>����������Ϊ��֤���ʣ��뾡��ȡ��</span>
                <span class="s10"></span>
                <div class="time">
                	
                	<table cellpadding="0" cellspacing="0">
                    	<tr><td>ʱ��</td>
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
                            <td><input type="radio" name="times1" value="����" checked="checked" />����</td>
                            <td></td>
                        </tr>
                        <tr><td>����</td>
                        	<td><input type="radio" name="times2" value="������" />���޹������ͻ�</td>
                            <td><input type="radio" name="times2" value="��������"  />�������������ͻ�</td>
                            <td><input type="radio" name="times2" value="����" checked="checked" />����</td>
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
        	<td width="510" align="center" valign="middle">��Ʒ��Ϣ</td>
          <td width="165" align="center" valign="middle">����</td>
          <td width="155" align="center" valign="middle">����</td>
          <td width="145" align="center" valign="middle">С��</td>
          
        </tr>
    </table>
    <table cellpadding="0" cellspacing="0" class="tab2">
  <?=$view_cart2?>
    </table>
           <!-- </div>
            
            <div class="yhq">
            	<h3><img src="images/jia.jpg" alt="" id="jia" />ʹ���Ż�ȯ</h3>
                <div class="q_div">
                	<form action="#">
                		<p><input name="" type="radio" value="" />��29.00Ԫ��10.00Ԫ<span class="s1">ȫ��ͨ��</span><span class="s2">��Ч������2016-04-11</span></p>
                    	<p><input name="" type="radio" value="" />��29.00Ԫ��10.00Ԫ<span class="s1">ȫ��ͨ��</span><span class="s2">��Ч������2016-04-11</span></p>
                        
                        <h4><a href="#" class="a1">��ʵ��ȯ?</a>��ʵ���Ż�ȯ���룿    <a href="#">[����Ż�ȯ����]</a></h4>
                        <h5>��ʹ���� <span>0</span> ���Ż�ȯ�������Ż� <span>0.00</span> Ԫ </h5>
                    </form>
                </div>
                
                <h3><img src="images/jia.jpg" alt="" id="jian"/>ʹ�û���</h3>
                <div class="jf1_div">
                	<h4><a href="#">[�˽���ֹ���]</a>����ʳ���˻����� <span>0 </span>������,������������ʹ��<span>0 </span>��(�ֿ�0Ԫ,<span>���ֿ�ֱ�ӵֿ۶������ </span>)</h4>
                	<p>����ʹ�ã�<input type="text" value="0" class="num" />�����ֿ�<span></span>Ԫ <input name="" type="button" value="ʹ��" class="btn_sy" /></p>
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
    	��Ʊ̧ͷ<input type="text" name="invoice" id="invoice" class="text_f"/>
    </div>
    <div class="hdxx3">
    	��ע��Ϣ<input type="text" name="remark" id="remark" class="text_f"/>
    </div>
    <div class="hdxx5">
    	<!--�˻���<span>��<?=$_SESSION['amount']?></span>-->
       <div style="height:100%; width:200px; float:right; text-align:left;"> �˷�:<span>��<?=$logistics?></span> (��50���˷�)<br />
��Ʒ���:<span>��<?=$total?></span><br />
���Ż�:<span>��0</span><br />
�ܽ��:<span>��<?=$total_all?></span></div>
    </div>
    <div class="hdxx4">
    	���ڹ�����������κ����ʣ�����İ������Ļ򲦴�ͷ��绰��400-8281-898
        <a href="###" id="t_order" >�ύ����</a>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
<div class="tk tk_xj">
	<i>X</i>
	<h3>�½���ַ</h3>
  <form action="" method="post" name="addressForm1" onsubmit="return addressForm()">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
<tr>
      <td width="80" height="30" class="tdBorder1">�ջ��ˣ�</td>
      <td class="tdBorder1">&nbsp;<span id="spry_consignee">
   
          <input type="text" name="consignee" id="consignee" />
       
       *</span>       </td>
    </tr>
   
      <td height="30" class="tdBorder1">�ء�ַ��</td>
    <td class="tdBorder1"><span id="spry_address">
      <label>
        <?=$content_all?>
      </label>
     *</span></td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">�硡����</td>
    <td class="tdBorder1">&nbsp;<span id="spry_telephone">
      <label>
        <input type="text" name="telephone" id="telephone" />
      </label>
      </span></td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">�֡�����</td>
    <td class="tdBorder1">&nbsp;<span id="spry_mobile">

        <input type="text" name="mobile" id="mobile" />
     *</span></td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">�ʡ��ࣺ</td>
    <td class="tdBorder1">&nbsp;<span id="spry_postcode">
 <input type="text" name="postcode" id="postcode" />
</span></td>
  </tr>
  <tr>
    <td height="30" class="tdBorder1">��  ע��</td>
    <td class="tdBorder1">&nbsp;
     <textarea name="remarks" ></textarea>
      </td>
  </tr>
   <tr>
    <td height="30" class="tdBorder1">&nbsp;<input type="hidden" name="add_orders" value="add_orders"></td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="��ӵ�ַ" class="submit" /></td>
  </tr>
</table> </form> 
</div>

<div class="tk tk_xg" >
	<i>X</i>
	<h3>�޸ĵ�ַ</h3>
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
