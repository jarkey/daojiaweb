<!--***此版式适合锐泽眼镜等风格站***-->
<link href="css/productImg1.css" rel="stylesheet" type="text/css" />

      <!--产品标题和标题-->
      <div style="width:100%; text-align:center;">
          <!--产品标题-->
          <div style="border-bottom:#CCC 1px dashed;font-size:14px; font-weight:bold; height:30px; margin-bottom:20px; color:#00C;"><?=$title?></div>
          <!--产品图片-->          
          <DIV id=focus_img>
          <TABLE id=focus_warp cellSpacing=0 cellPadding=0 border=0>
            <TR>
              <TD>
                <DIV id=au>
                <DIV class=dis name="f"><?=ifBigImgEmpty("$img",'620','270')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img1",'620','270')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img2",'620','270')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img3",'620','270')?></DIV>
                </DIV>
              </TD>
            </TR>
            <TR>
              <TD>
                <TABLE id=simg cellSpacing=0 cellPadding=0 width=550 border=0>
                  <TR>
                    <?=ifSmallImgEmpty("$img",'126','56')?>
                    <?=ifSmallImgEmpty("$img1",'126','56')?>
                    <?=ifSmallImgEmpty("$img2",'126','56')?>
                    <?=ifSmallImgEmpty("$img3",'126','56')?>
                   </TR>
                 </TABLE>
               </TD>
             </TR>
          </TABLE>
          </DIV>
          <SCRIPT language=JavaScript src="js/img.js" type=text/javascript charset=gb2312></SCRIPT> 
      </div>
      
      <!--产品价格、购买、试戴-->
      <div>
         <table cellspacing="0" cellpadding="0" style="width:100%; border:1px #093 solid;line-height:25px; margin-top:10px; font-size:14px; padding:5px;">
                  <tr>
                    <td style="padding-left:20px;">
                      <?=$price_str?><br />
                      市场价：￥<?=$mPrice?> <?=$currency?> / <?=$productUnits?> &nbsp;&nbsp;&nbsp;&nbsp;  节 省：<?=$save?> <?=$currency?> / <?=$productUnits?><br />
                      <?=$content_color?>
                      <?=$size?>
                    产品重量：<?=$specifications?>公斤 </td>
                    <td width="180" style="line-height:60px;"><a href="buy_1.php?id=<?=$productid?>"><img src="css/icon/btn_buy_1.gif" width="148" height="34"></a>
                        <img src="css/icon/btn_buy_2.gif" width="148" height="34"></td>
                    <td width="100" align="center"><img src="images/zxsd.jpg" width="100" height="75"><a href="favorites.php?productid=<?=$productid?>" onClick="return window.confirm('确定收藏?')"><img src="images/taocan_24.jpg" alt="" width="64" height="22" /></a></td>
                  </tr>
                </table>
      </div>  
      
     <!--产品详细信息-->   
     <div style="width:100%;margin-top:10px;">
        <div style="background:url(images/v_desc_title_m.gif) repeat-x; height:35px;">
          <div style="float:left;"><img src="images/v_desc_title_l.gif" width="3" height="32"></div>
          <div style="float:left; padding:10px 0px 0px 10px; font-size:14px; font-weight:bold;">商品详细信息</div>
          <div style="float:right;"><img src="images/v_desc_title_r.gif" width="3" height="32"></div>      
        </div>
        <div style="width:100%;">
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">编号：<?=$productNum?></td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">品牌：<?=ppzView("$brand")?></td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">款式：通用款</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">框形：全框</td>
    </tr>
    <tr>
      <td height="30" style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">材质：板材</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">镜架脸型：瓜子脸</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">型号：大型</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">价格：100以下</td>
    </tr>
        </table>
  
          <div style="margin:10px;">
          <?=$content?>
          </div>
        </div>
     </div>      