<!--***�˰�ʽ�ʺ������۾��ȷ��վ***-->
<link href="css/productImg1.css" rel="stylesheet" type="text/css" />

      <!--��Ʒ����ͱ���-->
      <div style="width:100%; text-align:center;">
          <!--��Ʒ����-->
          <div style="border-bottom:#CCC 1px dashed;font-size:14px; font-weight:bold; height:30px; margin-bottom:20px; color:#00C;"><?=$title?></div>
          <!--��ƷͼƬ-->          
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
      
      <!--��Ʒ�۸񡢹����Դ�-->
      <div>
         <table cellspacing="0" cellpadding="0" style="width:100%; border:1px #093 solid;line-height:25px; margin-top:10px; font-size:14px; padding:5px;">
                  <tr>
                    <td style="padding-left:20px;">
                      <?=$price_str?><br />
                      �г��ۣ���<?=$mPrice?> <?=$currency?> / <?=$productUnits?> &nbsp;&nbsp;&nbsp;&nbsp;  �� ʡ��<?=$save?> <?=$currency?> / <?=$productUnits?><br />
                      <?=$content_color?>
                      <?=$size?>
                    ��Ʒ������<?=$specifications?>���� </td>
                    <td width="180" style="line-height:60px;"><a href="buy_1.php?id=<?=$productid?>"><img src="css/icon/btn_buy_1.gif" width="148" height="34"></a>
                        <img src="css/icon/btn_buy_2.gif" width="148" height="34"></td>
                    <td width="100" align="center"><img src="images/zxsd.jpg" width="100" height="75"><a href="favorites.php?productid=<?=$productid?>" onClick="return window.confirm('ȷ���ղ�?')"><img src="images/taocan_24.jpg" alt="" width="64" height="22" /></a></td>
                  </tr>
                </table>
      </div>  
      
     <!--��Ʒ��ϸ��Ϣ-->   
     <div style="width:100%;margin-top:10px;">
        <div style="background:url(images/v_desc_title_m.gif) repeat-x; height:35px;">
          <div style="float:left;"><img src="images/v_desc_title_l.gif" width="3" height="32"></div>
          <div style="float:left; padding:10px 0px 0px 10px; font-size:14px; font-weight:bold;">��Ʒ��ϸ��Ϣ</div>
          <div style="float:right;"><img src="images/v_desc_title_r.gif" width="3" height="32"></div>      
        </div>
        <div style="width:100%;">
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">��ţ�<?=$productNum?></td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">Ʒ�ƣ�<?=ppzView("$brand")?></td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">��ʽ��ͨ�ÿ�</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">���Σ�ȫ��</td>
    </tr>
    <tr>
      <td height="30" style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">���ʣ����</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">�������ͣ�������</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">�ͺţ�����</td>
      <td style=" border:1px dotted #CCC; border-width:0px 0px 1px 0px; ">�۸�100����</td>
    </tr>
        </table>
  
          <div style="margin:10px;">
          <?=$content?>
          </div>
        </div>
     </div>      