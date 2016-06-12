<html>
<head>
<SCRIPT>
function switchSysBar(){
if (switchPoint.innerText==3){
switchPoint.innerText=4
document.all("frmTitle").style.display="none"
}else{
switchPoint.innerText=3
document.all("frmTitle").style.display=""
}}
</SCRIPT>
</head>
<BODY scroll=no style="MARGIN:0px">

<TABLE border=0 cellPadding=0 cellSpacing=0 height=100% width=100%>
<TR>
  <td align=middle id=frmTitle noWrap vAlign=center>
    <IFRAME frameBorder=0 name="leftFrame" scrolling=auto src=left.php style=HEIGHT:100%;VISIBILITY:inherit;WIDTH:210px;Z-INDEX:2></IFRAME>
  </td>
  <td style="color:#FFF">
    <TABLE border=0 cellPadding=0 cellSpacing=0 height=100%>
      <tr>
      <TD onClick="switchSysBar()" style=HEIGHT:100%;>
        <font style="COLOR:#999;CURSOR:hand;FONT-FAMILY:Webdings;FONT-SIZE:9pt">
        <SPAN id="switchPoint">3</SPAN>
      </TD>
      </tr>
    </TABLE>
  </TD>
  <TD style=WIDTH:100%>
    <IFRAME frameBorder=0 id=main name="rightFrame" crolling=yes src=right.php style=HEIGHT:100%;VISIBILITY:inherit;WIDTH:100%;Z-INDEX:1></IFRAME>
  </td>
</TR>

</TABLE>

</html>