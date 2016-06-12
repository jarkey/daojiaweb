<?php
include_once('../inc/config.inc.php');
$fid=$_GET['fid'];
//取得规格名称
if($_GET['specificationName']!="") $_SESSION['specificationName']=$_GET['specificationName'];
if ($_GET['del'])
{
	$sql="delete from gplat_specificationValue where id=".$_GET['del'];
	$result=mysql_query($sql);
}

if ($_POST['content'])
{
	$content=$_POST['content'];
    $sort=$_POST['sort'];

	$sql="insert into gplat_specificationValue  (content,fid,sort) values ('$content','$fid','$sort')";
	$result=mysql_query($sql);
	if($result!=0)
	{
	    echo '<script>alert("添加成功");</script>';	
		goToCurrentPage();
		}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id,fid){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="specificationValue_index.php?del=" + id + "&fid=" + fid;
			}else{
				notOpen();
			}				
		},
		 prefix:'cleanblue'
	});
}	

function open(){
	
	
}

function notOpen(){
	
}
</script>
</head>
<body>
  <br>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1"><?=$_SESSION['specificationName']?> >> 规格值列表</td>
  </tr>  
	<tr>
	 <td class="tdBorder1 tdBg1">规格值</td>
	 <td class="tdBorder1 tdBg1">顺序</td>
     <td class="tdBorder1 tdBg1">操作</td>
  </tr>

<?php
$sql="select * from gplat_specificationValue where fid=$fid order by sort";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	$id=$data['id'];
	$content=$data['content'];

	$sort=$data['sort'];
	?>
	<tr>
	  
	  <td class="tdBorder1">&nbsp;<?=$content?></td>
      <td class="tdBorder1"><?=$sort?></td>
      <td class="tdBorder1"><a href="specificationValue_revise.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=350&width=700" title="管理 / 资料修改" class="thickbox"><img src="../images/20050423123030295s.gif" width="14" height="16" alt="修改" border="0"></a>&nbsp;&nbsp;<img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm(<?=$id?>,<?=$fid?>)"></td>
  </tr>
<?php
}
?>
 </table>
<p>&nbsp;</p>
<FORM action="specificationValue_index.php?fid=<?=$fid?>" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">添加规格值</td>
  </tr>  
  <tr>
    <td class="tdBorder1">规格值:</td>
    <td class="tdBorder1">&nbsp;<input name="content" type="text" size="40" id="specificationName"> 
      </td>
  </tr>
  
  <tr>
    <td class="tdBorder1">顺序:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" value="0" id="sort"></td>
  </tr>
  

  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>
  </tr>
</table>
</FORM>
<p>&nbsp;</p>
</body></html>