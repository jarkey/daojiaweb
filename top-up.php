<?php 
$pageTitle="资料修改";    //当前页标题
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


<!--主体 start-->
<div id="mainBody">
    <!--在线充值 start-->
    <div id="online_cz">
        <div class="title">
            您的账户：<strong><?=$_SESSION['username']?></strong> 余额：<strong style="font-size: 13px;">&yen <?=$amount?></strong>
        </div>

    
        <h4 style="color: #060; font-size: 16px; font-weight: 400; font-family: '微软雅黑'; line-height: 30px; cursor: pointer; padding-left: 30px;" onmousedown="zx_click();">在线充值</h4>
        <div class="content">
<form action="/recharge" id="RechargeForm" method="post" target="_blank">                <table width="100%" border="0" cellspacing="0" cellpadding="0" onmousedown="zx_click();">
                    <tr>
                        <td width="120" align="right">充值平台：
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
                        <td width="120" align="right">网银充值：
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
                <!--充值优惠图片-->
          <div id="activePic" class="zxcz_hd" style="margin: -40px 0 0  120px; display: none;">
                    <img src="../../Themes/DarkOrange/Content/images/zxcz_pic.png">
                </div>
                <!--左边栏 start-->
                <div class="zxcz_visib">
                    <div class="left1">

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
                            
                            <tr>
                                <td align="right">充值金额：
                                </td>
                                <td align="left">
                                    <input id="b1" name="PayAmount" type="radio" value="100" onclick="ClearOtherAmount()" /><label for="b1">100元</label>
                                    <input id="b2" name="PayAmount" type="radio" value="300" onclick="ClearOtherAmount()" /><label for="b2">300元</label>
                                    <input id="b3" name="PayAmount" type="radio" value="500" onclick="ClearOtherAmount()" /><label for="b3">500元</label>
                                    <input id="b4" name="PayAmount" type="radio" value="1000" onclick="ClearOtherAmount()" /><label for="b4">1000元</label>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">其它金额：</td>
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
                    <!--左边栏 end-->
                    <!--右边栏 start-->
                    <div class="right1">
                        <h2>温馨提示</h2>
                        <p>
                            1、当您点击"确认充值"后，请不要关闭新打开的页面，否则充值将无法完成。
                        </p>
                        <p>
                            2、如果您按提示完成充值流程后，发现充值金额没有即时到账，可能是由于充值信息传输滞后，我们将在第二个工作日和银行对账，确认您的扣款成功后，相应款项会直接充值到您的会员账户。
                        </p>
                    </div>
                    <!--右边栏 end-->
                    <div class="clear_both" style=" clear:both; font-size:0; height:0; overflow:hidden;">
                    </div>
                </div>
</form>        </div>
        <!--在线充值 end-->

    </div>

</div>
<!--主体 end-->

<!--充值遇到问题弹出框 start-->
<div id="mask_layer">
</div>
<div id="recharge" style="top: 70%;">
    <h3>
        <span>充值遇到问题？</span><a onclick="hid()" href="#"></a></h3>
    <p class="warning">
        充值完成前，请不要关闭此窗口。完成充值后请根据您的情况点击下面的按钮：
    </p>
    <p>
        请在新打开的页面完成充值后再选择。
    </p>
    <h4>

        <a href="/Customer/UserChargeRecord" id="ReturnHref">已完成充值</a> <a href="#">充值遇到问题</a></h4>
    <a class="back1" style="cursor: pointer; background: none;" onclick="addMoneySuccess();">返回重新选择充值方式</a>
</div>
<!--充值遇到问题弹出框 end-->

<!--充值遇到问题弹出框 start-->
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

    // 张晓书添加 2013-01-17
    // 当"其他金额"文本框获取焦点时，所选择的
    // 快捷金额radio自动取消选择
    function ClearRadio() {
        var PayAmount = document.getElementsByName("PayAmount");    //充值金额
        for (var i = 0; i < PayAmount.length; i++) {
            PayAmount[i].checked = false;
        }
    }

    // 张晓书添加 2013-01-17
    // 当用户选择了快捷金额，自动清空其他金额文本框内的数据
    function ClearOtherAmount() {
        $("#otherAmount").val("");
    }

    function change() {
        var PayAmount = document.getElementsByName("PayAmount");    //充值金额
        var otherAmount = document.getElementById("otherAmount").value;     //其它充值金额
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
            alert("不能同时选择'充值金额'和'其它充值金额'！");
            for (var i = 0; i < PayAmount.length; i++) {
                PayAmount[i].checked = false;
            }
            document.getElementById("otherAmount").value = null;
            return false;
        }
        if ((!PayAmountBol) && (!otherAmountBol)) {
            alert("请选择充值金额！");
            return false;
        }
        if (otherAmountBol) {
            var r = /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
            if (!r.test(otherAmount)) {
                alert("请输入正确的充值金额！");
                return false;
            }
            else {
                if (parseInt(otherAmount) > 10000) {
                    alert("充值金额不能大于10000元！");
                    return false;
                }
            }
        }
        document.getElementById('mask_layer').style.display = 'block';
        //$("#recharge").css("top", 250 + document.documentElement.scrollTop);
        document.getElementById('recharge').style.display = 'block';

        //            document.body.style.overflow = "hidden"; /* 弹出后隐藏页面的滚动条，固定一屏*/
        /*document.getElementById('cnmBox').style.height=document.body.scrollHeight+"px";背景透明层的高度自适应当前文档高度，有待改进*/
        document.getElementById('RechargeForm').submit();
    }

    //光大银行活动验证
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

                            alert("优惠活动名额已满");
                        }
                        else if (data == "01") {
                            alert("个人优惠累计金额到达上限,不再赠送优惠金额");
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

    //不显示图片
    function NodisplayPic() {
        $("#activePic").css('display', 'none');
    }

    function changePhone() {
        if ($("#btnPhone").html() == "为他人充值") {
            $("#byTheUsePhone").removeAttr("readonly");
            $("#byTheUsePhone").css("background", "#fff").css("border", "1px solid #ddd");
            $("#btnPhone").html("确定");
        } else {
            $.ajax({
                cache: false,
                url: "/Catalog/CheckPhone",
                type: "GET",
                data: { phone: $("#byTheUsePhone").val() },
                success: function (result) {
                    if (result.state == "Success") {
                        $("#btnPhone").html("为他人充值");
                        $("#byTheUsePhone").css("background", "none").css("border", "none");
                        $("#byTheUsePhone").attr("readonly", "readonly");
                    } else {
                        alert("请填写正确的会员手机号码");
                    }
                }
            });
        }
    }
    function changeCard() {
        if ($("#byTheUsePhone").attr("readonly") != "readonly") {
            alert("请先确认手机号码");
            return false;
        }
        var phone = $("#byTheUsePhone").val();
        if (!(/^1[0-9]{10}$/.test(phone))) {
            alert("请填写正确的需要充值的手机号码");
            return false;
        }
        var num = $("#numOne").val() + $("#numTwo").val() + $("#numThree").val() + $("#numFour").val();
        if (num.length != 15) {
            alert("请填写正确的充值卡卡号");
            return false;
        }
        if (isNaN(num)) {
            alert("请填写正确的充值卡卡号");
            return false;
        }
        var pwd = $("#numPwd").val();
        var pwdNew = pwd.replace(/\s+/g, "");
        if (pwdNew.length != 8) {
            alert("请填写正确的充值卡密码");
            return false;
        }
        if (isNaN(pwdNew)) {
            alert("请填写正确的充值卡密码");
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
        document.body.style.overflow = "auto"; /*关闭页面恢复滚动条*/
    }

    //充值成功
    function addMoneySuccess() {
        hid();
        var PayAmount = document.getElementsByName("PayAmount");    //充值金额
        var otherAmount = document.getElementById("otherAmount").value;     //其它充值金额
        for (var i = 0; i < PayAmount.length; i++) {
            PayAmount[i].checked = false;
        }
        document.getElementById("otherAmount").value = null;
    }

</script>
<!--充值遇到问题弹出框 end-->

    
    <div class="clear"></div>
</div>





<?php require('inc/footer.inc.php'); ?>

</body>
</html>
