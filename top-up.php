<?php 
$pageTitle="�����޸�";    //��ǰҳ����
include_once("inc/config.inc.php");
$userid=$_SESSION['userid'];
if($userid==0){ echo '<script>window.location.href="user_login.php";</script>';}
$sql="select amount from gplat_member where userid='$userid'";
		$result=mysql_query($sql);
		$data=mysql_fetch_assoc($result);
		$amount=$data['amount'];
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
<link type="text/css" rel="stylesheet" href="css/shop.css" />
<script type="text/javascript" src="js/jquery1.42.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/header_nav.js"></script>
<style>
.clear{ clear:both}

.clear_both {
clear:both; font-size:0; height:0; overflow:hidden;
}
.fl {    float: left;}
input, select {
    vertical-align: middle;
}
</style>
<script type="text/javascript">
	$(document).ready(function () {
        $(".Dialog_box").mouseover(function () {
            $(this).find(".dialo_boxcontent").css("display", "block");
        });
        $(".Dialog_box").mouseout(function () {
            $(this).find(".dialo_boxcontent").css("display", "none");
        });
        $(".Dialog_box").click(function () {
            $(this).find(".dialo_boxcontent").toggle();
        });
    });
</script>
</head>
<body>
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


<!--���� start-->
<div id="mainBody">
    <!--���߳�ֵ start-->
    <div id="online_cz">
        <div class="title">
            �����˻���<strong><?=$_SESSION['username']?></strong> ��<strong style="font-size: 13px;">&yen <?=$amount?></strong>
        </div>

    
        <h4 style="color: #060; font-size: 16px; font-weight: 400; font-family: '΢���ź�'; line-height: 30px; cursor: pointer; padding-left: 30px;" onmousedown="zx_click();">���߳�ֵ</h4>
        <div class="content">
<form action="/recharge" id="RechargeForm" method="post" target="_blank">                <table width="100%" border="0" cellspacing="0" cellpadding="0" onmousedown="zx_click();">
                    <tr>
                        <td width="120" align="right">��ֵƽ̨��
                        </td>
                        <td align="left" valign="middle">
                            <input id="a1" name="Payment" type="radio" value="UnionPay" onclick="NodisplayPic();" checked="checked" style="margin-bottom: 25px;" />
                            <label class="online" for="a1"></label>
                            <input id="a2" name="Payment" type="radio" value="AliPay" onclick="NodisplayPic();" style="margin-bottom: 25px;" />
                            <label class="alpay" for="a2"></label>
                          <!--  <input id="a6" name="Payment" type="radio" value="EPay" onclick="varityMoney()" style="margin-bottom: 25px;" />
                            <label class="EPayBank" for="a6"></label>-->

                        </td>
                    </tr>
                    <tr>
                        <td width="120" align="right">������ֵ��
                        </td>
                        <td valign="middle">
                            <input id="a3" name="Payment" type="radio" value="JiaoHangPay" onclick="NodisplayPic();" style="margin-bottom: 40px;" />
                            <label class="jiaohang" for="a3"></label>
                          <!--  <input id="a4" name="Payment" type="radio" value="JianHangPay" onclick="NodisplayPic();" style="margin-bottom: 40px;" />
                            <label class="jianhang" for="a4"></label>
                            <input id="a5" name="Payment" type="radio" value="EverBrightPay" onclick="varityMoney();" style="margin-bottom: 40px;" />
                            <label class="EverBrightBank" for="a5"></label>-->
                        </td>
                    </tr>
                </table>
                <!--��ֵ�Ż�ͼƬ-->
          <div id="activePic" class="zxcz_hd" style="margin: -40px 0 0  120px; display: none;">
                    <img src="../../Themes/DarkOrange/Content/images/zxcz_pic.png">
                </div>
                <!--����� start-->
                <div class="zxcz_visib">
                    <div class="left1">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
                            
                            <tr>
                                <td align="right">��ֵ��
                                </td>
                                <td align="left">
                                    <input id="b1" name="PayAmount" type="radio" value="100" onclick="ClearOtherAmount()" /><label for="b1">100Ԫ</label>
                                    <input id="b2" name="PayAmount" type="radio" value="300" onclick="ClearOtherAmount()" /><label for="b2">300Ԫ</label>
                                    <input id="b3" name="PayAmount" type="radio" value="500" onclick="ClearOtherAmount()" /><label for="b3">500Ԫ</label>
                                    <input id="b4" name="PayAmount" type="radio" value="1000" onclick="ClearOtherAmount()" /><label for="b4">1000Ԫ</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">������</td>
                                <td align="left">
                                    <input class="txt" name="otherAmount" id="otherAmount" type="text" onfocus="ClearRadio()" /></td>
                            </tr>
                            <tr>
                                <td align="right">&nbsp;
                                </td>
                                <td align="left">
                                    <a class="confir" style="cursor: pointer;" onclick="change();"></a><a class="back1" href="user_change.php"></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--����� end-->
                    <!--�ұ��� start-->
                    <div class="right1">
                        <h2>��ܰ��ʾ</h2>
                        <p>
                            1���������"ȷ�ϳ�ֵ"���벻Ҫ�ر��´򿪵�ҳ�棬�����ֵ���޷���ɡ�
                        </p>
                        <p>
                            2�����������ʾ��ɳ�ֵ���̺󣬷��ֳ�ֵ���û�м�ʱ���ˣ����������ڳ�ֵ��Ϣ�����ͺ����ǽ��ڵڶ��������պ����ж��ˣ�ȷ�����Ŀۿ�ɹ�����Ӧ�����ֱ�ӳ�ֵ�����Ļ�Ա�˻���
                        </p>
                    </div>
                    <!--�ұ��� end-->
                    <div class="clear_both" style=" clear:both; font-size:0; height:0; overflow:hidden;">
                    </div>
                </div>
</form>        </div>
        <!--���߳�ֵ end-->

    </div>

</div>
<!--���� end-->

<!--��ֵ�������ⵯ���� start-->
<div id="mask_layer">
</div>
<div id="recharge" style="top: 70%;">
    <h3>
        <span>��ֵ�������⣿</span><a onclick="hid()" href="#"></a></h3>
    <p class="warning">
        ��ֵ���ǰ���벻Ҫ�رմ˴��ڡ���ɳ�ֵ���������������������İ�ť��
    </p>
    <p>
        �����´򿪵�ҳ����ɳ�ֵ����ѡ��
    </p>
    <h4>

        <a href="/Customer/UserChargeRecord" id="ReturnHref">����ɳ�ֵ</a> <a href="#">��ֵ��������</a></h4>
    <a class="back1" style="cursor: pointer; background: none;" onclick="addMoneySuccess();">��������ѡ���ֵ��ʽ</a>
</div>
<!--��ֵ�������ⵯ���� end-->

<!--��ֵ�������ⵯ���� start-->
<script type="text/javascript">

    $(document).ready(function () {
        $(".nanjing_card").click(function () {
            $(".pay_tips").toggle("slow");
        });

        var xx = $.getUrlParam('ReturnUrl');
        if (xx.length > 0)
            $('#ReturnHref').attr('href', xx);
    });

    (function ($) {
        $.getUrlParam = function (name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]); return null;
        }
    })(jQuery);

    // ��������� 2013-01-17
    // ��"�������"�ı����ȡ����ʱ����ѡ���
    // ��ݽ��radio�Զ�ȡ��ѡ��
    function ClearRadio() {
        var PayAmount = document.getElementsByName("PayAmount");    //��ֵ���
        for (var i = 0; i < PayAmount.length; i++) {
            PayAmount[i].checked = false;
        }
    }

    // ��������� 2013-01-17
    // ���û�ѡ���˿�ݽ��Զ������������ı����ڵ�����
    function ClearOtherAmount() {
        $("#otherAmount").val("");
    }

    function change() {
        var PayAmount = document.getElementsByName("PayAmount");    //��ֵ���
        var otherAmount = document.getElementById("otherAmount").value;     //������ֵ���
        var PayAmountBol = false;
        var otherAmountBol = false;
        for (var i = 0; i < PayAmount.length; i++) {
            if (PayAmount[i].checked == true) {
                PayAmountBol = true;
            }
        }
        if (otherAmount.replace(/(^\s*)|(\s*$)/g, '') != "") {
            otherAmountBol = true;
        }
        if (PayAmountBol && otherAmountBol) {
            alert("����ͬʱѡ��'��ֵ���'��'������ֵ���'��");
            for (var i = 0; i < PayAmount.length; i++) {
                PayAmount[i].checked = false;
            }
            document.getElementById("otherAmount").value = null;
            return false;
        }
        if ((!PayAmountBol) && (!otherAmountBol)) {
            alert("��ѡ���ֵ��");
            return false;
        }
        if (otherAmountBol) {
            var r = /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
            if (!r.test(otherAmount)) {
                alert("��������ȷ�ĳ�ֵ��");
                return false;
            }
            else {
                if (parseInt(otherAmount) > 10000) {
                    alert("��ֵ���ܴ���10000Ԫ��");
                    return false;
                }
            }
        }
        document.getElementById('mask_layer').style.display = 'block';
        //$("#recharge").css("top", 250 + document.documentElement.scrollTop);
        document.getElementById('recharge').style.display = 'block';

        //            document.body.style.overflow = "hidden"; /* ����������ҳ��Ĺ��������̶�һ��*/
        /*document.getElementById('cnmBox').style.height=document.body.scrollHeight+"px";����͸����ĸ߶�����Ӧ��ǰ�ĵ��߶ȣ��д��Ľ�*/
        document.getElementById('RechargeForm').submit();
    }

    //������л��֤
    function varityMoney() {
        if ($("#a5").attr("checked") == "checked") {
            var activityStartTime = Date.parse("2014-12-12 00:00:00".replace(/-/g, "/"));
            var activityEndTime = Date.parse("2014-12-13 00:00:00".replace(/-/g, "/"));
            var currentTime = new Date();

            if (currentTime > activityStartTime && currentTime < activityEndTime) {
                $.ajax({
                    url: "/Catalog/VerifyFavorableMoney",
                    type: "post",
                    cache: false,
                    success: function (data) {
                        if (data == "00") {

                            alert("�Żݻ��������");
                        }
                        else if (data == "01") {
                            alert("�����Ż��ۼƽ�������,���������Żݽ��");
                        }
                        else {
                            $("#activePic").css('display', 'block');
                        }
                    }
                });
            }
        }
        else {
            $("#activePic").css('display', 'none');
        }
    }

    //����ʾͼƬ
    function NodisplayPic() {
        $("#activePic").css('display', 'none');
    }

    function changePhone() {
        if ($("#btnPhone").html() == "Ϊ���˳�ֵ") {
            $("#byTheUsePhone").removeAttr("readonly");
            $("#byTheUsePhone").css("background", "#fff").css("border", "1px solid #ddd");
            $("#btnPhone").html("ȷ��");
        } else {
            $.ajax({
                cache: false,
                url: "/Catalog/CheckPhone",
                type: "GET",
                data: { phone: $("#byTheUsePhone").val() },
                success: function (result) {
                    if (result.state == "Success") {
                        $("#btnPhone").html("Ϊ���˳�ֵ");
                        $("#byTheUsePhone").css("background", "none").css("border", "none");
                        $("#byTheUsePhone").attr("readonly", "readonly");
                    } else {
                        alert("����д��ȷ�Ļ�Ա�ֻ�����");
                    }
                }
            });
        }
    }
    function changeCard() {
        if ($("#byTheUsePhone").attr("readonly") != "readonly") {
            alert("����ȷ���ֻ�����");
            return false;
        }
        var phone = $("#byTheUsePhone").val();
        if (!(/^1[0-9]{10}$/.test(phone))) {
            alert("����д��ȷ����Ҫ��ֵ���ֻ�����");
            return false;
        }
        var num = $("#numOne").val() + $("#numTwo").val() + $("#numThree").val() + $("#numFour").val();
        if (num.length != 15) {
            alert("����д��ȷ�ĳ�ֵ������");
            return false;
        }
        if (isNaN(num)) {
            alert("����д��ȷ�ĳ�ֵ������");
            return false;
        }
        var pwd = $("#numPwd").val();
        var pwdNew = pwd.replace(/\s+/g, "");
        if (pwdNew.length != 8) {
            alert("����д��ȷ�ĳ�ֵ������");
            return false;
        }
        if (isNaN(pwdNew)) {
            alert("����д��ȷ�ĳ�ֵ������");
            return false;
        }
        document.getElementById('mask_layer').style.display = 'block';
        //$("#recharge").css("top", 250 + document.documentElement.scrollTop);
        document.getElementById('recharge').style.display = 'block';
        document.getElementById('RechargeCardForm').submit();
    }
    function czk_click(e) {
        if ($(".czk_visib").css("display") == "none") {
            $(".czk_visib").toggle("slow");
        }
        if ($(".zxcz_visib").css("display") != "none") {
            $(".zxcz_visib").toggle("slow");
        }

        $('#RechargeForm input[type="radio"]').attr('checked', false);
    }
    function zx_click() {
        if ($(".zxcz_visib").css("display") == "none") {
            $(".zxcz_visib").toggle("slow");
        }
        if ($(".czk_visib").css("display") != "none") {
            $(".czk_visib").toggle("slow");
        }

        $('#a1-cz').attr('checked', false);
    }
    function hid() {
        document.getElementById('mask_layer').style.display = 'none';
        document.getElementById('recharge').style.display = 'none';
        document.body.style.overflow = "auto"; /*�ر�ҳ��ָ�������*/
    }

    //��ֵ�ɹ�
    function addMoneySuccess() {
        hid();
        var PayAmount = document.getElementsByName("PayAmount");    //��ֵ���
        var otherAmount = document.getElementById("otherAmount").value;     //������ֵ���
        for (var i = 0; i < PayAmount.length; i++) {
            PayAmount[i].checked = false;
        }
        document.getElementById("otherAmount").value = null;
    }

</script>
<!--��ֵ�������ⵯ���� end-->

    
    <div class="clear"></div>
</div>





<?php require('inc/footer.inc.php'); ?>

</body>
</html>
