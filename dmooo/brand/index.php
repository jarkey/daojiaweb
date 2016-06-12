<?php
include_once('../inc/config.inc.php');
if ($_GET['del'])
{
	$sql3="select logo from gplat_brand where id=".$_GET['del'];
	if($result3=mysql_query($sql3)){
      $date3=mysql_fetch_assoc($result3);
	  $img=$date3['logo'];
	  @unlink("../../userfiles/$img");
	
	  $sql="delete from gplat_brand where id=".$_GET['del'];
	  $result=mysql_query($sql);
	}else{
	  echo "执行 $sql 失败，错误信息:".mysql_error(); 
	}
}

?>
<html><head>
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "确定要删除这条记录吗？？";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{确定:true, 取消:false},
		callback: function(v,m){
			if(v){
				window.location.href="index.php?del=" + id;
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
<meta http-equiv="Content-Type" content="text/html; charset=gb18030" /></head>
<body>
<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="5" class="tdBorder1 titleBg1">品牌列表</td>
  </tr>  
	<tr>
	  <td align="center" class="tdBorder1 tdBg1">&nbsp; 品牌名称</td>
	  <td align="center" class="tdBorder1 tdBg1">品牌地址</td>
      <td align="center" class="tdBorder1 tdBg1">LOGO</td>
      <td align="center" class="tdBorder1 tdBg1">顺序</td>
	<td align="center" class="tdBorder1 tdBg1">操作</td>
  </tr>

<?php
$sql="select * from gplat_brand order by id desc";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	$id=$data['id'];
	$brandName=$data['brandName'];
	$brandurl=$data['brandurl']; 
	$logo=$data['logo'];  
	$img='../../userfiles/'.$logo;
	$alias=$data['alias'];  
	$sort=$data['sort'];
	$details=$data['details'];
?>
	<tr valign="middle" align="center">
	  
	  <td class="tdBorder1">&nbsp;<?=$brandName?></td>
      <td class="tdBorder1"><a href="<?=$brandurl?>" target="_blank"><?=$brandurl?></a></td>
      <td class="tdBorder1"><img src="<?=$img?>" width="88" height="31"></td>
      <td class="tdBorder1"><?=$sort?></td>
	<td class="tdBorder1"><a href="revise.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=350&width=700" title="管理 / 资料修改" class="thickbox">
    <img src="../images/20050423123030295s.gif" width="14" height="16" alt="修改" border="0"></a>&nbsp;&nbsp;<img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm(<?=$id?>)"></td>
  </tr>
<?php
}
?>
 </table>
</body></html>