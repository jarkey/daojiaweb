<!--***此版式适合全脑开发等风格站***-->
<link href="css/productImg2.css" rel="stylesheet" type="text/css" />

<div>
      <!--产品标题和标题-->
      <div style="width:330px; float:left; padding-left:15px;">
          <!--产品图片-->          
          <DIV id=focus_img>
          <TABLE id=focus_warp cellSpacing=0 cellPadding=0 border=0>
            <TR>
              <TD>
                <DIV id=au>
                <DIV class=dis name="f"><?=ifBigImgEmpty("$img",'300','225')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img1",'300','225')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img2",'300','225')?></DIV>
                <DIV class=undis name="f"><?=ifBigImgEmpty("$img3",'300','225')?></DIV>
                </DIV>
              </TD>
            </TR>
            <TR>
              <TD>
                <TABLE id=simg cellSpacing=0 cellPadding=0 width=200 border=0>
                  <TR>
                    <?=ifSmallImgEmpty("$img",'78','56')?>
                    <?=ifSmallImgEmpty("$img1",'78','56')?>
                    <?=ifSmallImgEmpty("$img2",'78','56')?>
                    <?=ifSmallImgEmpty("$img3",'78','56')?>
                   </TR>
                 </TABLE>
               </TD>
             </TR>
          </TABLE>
          </DIV>
          <SCRIPT language=JavaScript src="js/img.js" type=text/javascript charset=gb2312></SCRIPT> 
      </div>
      
      <!--产品标题、价格、购买-->
      <div style="float:left; line-height:25px; width:350px;"><br />
         <span style="font-size:20px; font-weight:bold;"><?=$title?></span><br />
         编　号：<?=$productNum?><br />
         <?=$price_str?><br />
          市场价：￥<?=$mPrice?> <?=$currency?> / <?=$productUnits?> &nbsp;&nbsp;&nbsp;&nbsp;  节 省：<?=$save?> <?=$currency?> / <?=$productUnits?><br />
         简　述：<?=$introduce?><br /><br />
          <a href="buy_1.php?id=<?=$productid?>"><img src="css/icon/taocan_22.jpg" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="favorites.php?productid=<?=$productid?>" onclick="return window.confirm('确定收藏?')"><img src="css/icon/taocan_24.jpg" alt="" /></a>
      </div> 
</div>

      <!--产品详细信息-->   
      <div style="width:100%;margin-top:10px;">
          <div style="background:url(css/other_images/v_desc_title_m.gif) repeat-x; height:35px;">
            <div style="float:left;"><img src="css/other_images/v_desc_title_l.gif" width="3" height="32"></div>
            <div style="float:left; padding:10px 0px 0px 10px; font-size:14px; font-weight:bold;">商品详细信息</div>
            <div style="float:right;"><img src="css/other_images/v_desc_title_r.gif" width="3" height="32"></div>      
          </div>
          <div style="width:100%;">
            <div style="margin:10px;">
            <?=$content?>
            </div>
        </div>
      </div>      