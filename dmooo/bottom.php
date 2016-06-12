<?php
include('../inc/config.inc.php'); 
include('../inc/softInfo.php'); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>无标题页</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="css/StyleSheet1.css" type=text/css rel=stylesheet>
</HEAD>
<BODY>

      <DIV class=bottom>
      <TABLE class=bottom_border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
        <TR>
          <TD class=bottom_bg_color>
            <DIV class=bottom_text>当前用户：<SPAN id=lblUser><?=$_SESSION['adminName']?></SPAN>&nbsp;&nbsp;|</DIV>
            <DIV class=bottom_text>用户组：<SPAN id=lblRole><?=$_SESSION['groupname']?></SPAN>&nbsp;&nbsp;|</DIV>
            <DIV class=bottom_text>当前客户：<SPAN id=lblShopName><?=GPLAT_CUSTOMER?></SPAN>&nbsp;&nbsp;</DIV>
            <DIV class=bottom_text1>全屏显示：F11</DIV>
            <DIV class=company_name>
            <A href="http://www.dmooo.com/" target=_blank><?=GPLAT_NAME?>产品开发：点墨设计</A></DIV></TD></TR>
            
            </TABLE>
      </DIV>
  
</BODY>
</HTML>
