<?php 
include_once('../../inc/config.inc.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>DMOOO_SHOP网上商店系统</TITLE>

<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
NS4 = (document.layers) ? 1 : 0;
IE4 = (document.all) ? 1 : 0;
ver4 = (NS4 || IE4) ? 1 : 0;

if (ver4) {
    with (document) {
        write("<STYLE TYPE='text/css'>");
        if (NS4) {
            write(".parent {position:absolute; visibility:visible}");
            write(".child {position:absolute; visibility:visible}");
            write(".regular {position:absolute; visibility:visible}")
        }
        else {
            write(".child {display:none}")
        }
        write("</STYLE>");
    }
}

function getIndex(el) {
    ind = null;
    for (i=0; i<document.layers.length; i++) {
        whichEl = document.layers[i];
        if (whichEl.id == el) {
            ind = i;
            break;
        }
    }
    return ind;
}

function arrange() {
    nextY = document.layers[firstInd].pageY +document.layers[firstInd].document.height;
    for (i=firstInd+1; i<document.layers.length; i++) {
        whichEl = document.layers[i];
        if (whichEl.visibility != "hide") {
            whichEl.pageY = nextY;
            nextY += whichEl.document.height;
        }
    }
}

function initIt(){
    if (!ver4) return;
    if (NS4) {
        for (i=0; i<document.layers.length; i++) {
            whichEl = document.layers[i];
            if (whichEl.id.indexOf("Child") != -1) whichEl.visibility = "hide";
       }
        arrange();
    }
    else {
        divColl = document.all.tags("DIV");
        for (i=0; i<divColl.length; i++) {
            whichEl = divColl(i);
            if (whichEl.className == "child") {
			   if (whichEl.style.display == "block") {
                 whichEl.style.display = "block";
                 }else {
                 whichEl.style.display = "none";
                 }
			}
        }
    }
}

function expandIt(el) {
    if (!ver4) return;
    if (IE4) {
        whichEl = eval(el + "Child");
        if (whichEl.style.display == "none") {
            whichEl.style.display = "block";
        }
        else {
            whichEl.style.display = "none";
        }
    }
    else {
        whichEl = eval("document." + el + "Child");
        if (whichEl.visibility == "hide") {
            whichEl.visibility = "show";
        }
        else {
            whichEl.visibility = "hide";
        }
        arrange();
    }
}
onload = initIt;
</script>

</head>

<body leftmargin="0" topmargin="0">
<a href="news_left.php" style="font-size:14px; font-weight:bold; margin:5px; ">返回</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
$fid=$_GET['fid'];
//$sql="select * from gplat_productclass where classIndex='$pid' order by orderbySN asc";
$sql="select * from dmooo_productclass1 where fid=$fid order by id asc";
$result=mysql_query($sql);
static $num=1;
while ($date=mysql_fetch_assoc($result))
{
	$num++;
	$id=$date['id'];
	$name=$date['name'];
	?><div id="KB<?=$num?>Parent" class="parent">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr id="productManage01" > 
        <td width="20"><img src="../images/plus.gif" border=0></td>
        
            <td valign="bottom"><a href="#" onClick="expandIt('KB<?=$num?>'); return false" ><?=$name?></a></td>
      </tr>
    </table>
</div>
    	<div id="KB<?=$num?>Child" class="child">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <?php
          $sql2="select * from dmooo_productclass2 where fid='$id' order by orderbySN desc";
          $result2=mysql_query($sql2);
          while ($date2=mysql_fetch_assoc($result2))
          {
          	?>
      
          <tr id="productManage02" > 
            <td height="20" width="30px"><img src="../images/open.gif"  border=0></td>
            <td><a href="news_admin.php?class=<?=$date2['id']?>&classIndex=<?=$date2['classIndex']?>" target="rightFrame"><?=$date2['name']?></a></td>
          </tr>
      <?php
          }
          ?>
                </table>
</div>
           <?php
       }
?>
        </table>
<div style="padding:10px;">
<a href="../product_left.php"><img src="../images/back_navigation_button.jpg" width="100" height="29" border="0"></a>
</div>
</td>
  </tr>
</table>


</body>
</html>
