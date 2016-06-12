<?php
include_once('../inc/config.inc.php');
if ($_GET['del'])
{
	$sql="select * from gplat_specificationvalue where fid=".$_GET['del'];   
    $res=mysql_query($sql);   
    $numrows=mysql_num_rows($res);   
    if($numrows>0){
		echo '<script>alert("此类别下有规格值，不可以删除");</script>';	
		echo '<meta http-equiv="refresh" content="0; url=index.php"/>';			
		exit;
	}
	
	$sql="delete from gplat_specifications where id=".$_GET['del'];
	$result=mysql_query($sql);	
}

if ($_POST['specificationName'])
{
	$specificationName=$_POST['specificationName'];
	$specificationRemark=$_POST['specificationRemark'];
	$displayType=$_POST['displayType'];
	$display=$_POST['display'];
	$sort=$_POST['sort'];

	$sql="insert into gplat_specifications (specificationName,specificationRemark,displayType,display,sort) values ('$specificationName','$specificationRemark','$displayType','$display','$sort')";
	$result=mysql_query($sql);
	if($result!=0)
	{
		echo("<script language=javascript>alert('添加成功！');</script>");
		goToCurrentPage();
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></head>
<body>
  <br>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="7" class="tdBorder1 titleBg1">规格列表</td>
  </tr>  
	<tr>
	  <td class="tdBorder1 tdBg1">&nbsp; 规格名称</td>
	  <td class="tdBorder1 tdBg1">类型</td>
      <td class="tdBorder1 tdBg1">显示方式</td>
      <td class="tdBorder1 tdBg1">顺序</td>
      <td class="tdBorder1 tdBg1">备注</td>
      <td class="tdBorder1 tdBg1">规格值</td>
	  <td class="tdBorder1 tdBg1">操作</td>
  </tr>

<?php
$sql="select * from gplat_specifications order by id desc";
$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
	$id=$data['id'];
	$specificationName=$data['specificationName'];
	if($data['isSystem']=='1') $specificationName='<font color=red>'.$specificationName.'</font>';
	$specificationRemark=$data['specificationRemark']; 
	$displayType=$data['displayType'];
	if($displayType==1){
		$str1='文字';
	}else{
	   $str1='图片';	
	}
	
	$display=$data['display'];
	
	if($display==1){
		$str2='平铺展示';
		}else{
	   $str2='下拉展示';	
			}
			
	$sort=$data['sort'];
	?>
	<tr>
	  
	  <td class="tdBorder1">&nbsp;<?=$specificationName?></td>
      <td class="tdBorder1"><?=$str1?></td>
      <td class="tdBorder1"><?=$str2?></td>
      <td class="tdBorder1"><?=$sort?></td>
      <td class="tdBorder1"><?=$specificationRemark?></td>
      <td class="tdBorder1"><a href="specificationValue_index.php?fid=<?=$id?>&specificationName=<?=$specificationName?>">查看</a></td>
	  <td class="tdBorder1">&nbsp;<a href="specifications_revise.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=350&width=700" title="管理 / 资料修改" class="thickbox"><img src="../images/20050423123030295s.gif" width="14" height="16" alt="修改" border="0"></a>&nbsp;&nbsp;
     <img src="../images/del.gif" width="13" height="13" alt="删除" border="0px" onClick="myConfirm(<?=$id?>)">
      
      </td>
  </tr>
<?php
}
?>
 </table>
<p>&nbsp;</p>
<FORM action="" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="2" class="tdBorder1 titleBg1">添加规格</td>
  </tr>  
  <tr>
    <td class="tdBorder1">规格名称:</td>
    <td class="tdBorder1">&nbsp;<input name="specificationName" type="text" size="40" id="specificationName"> 
      </td>
  </tr>
  
  <tr>
    <td class="tdBorder1">顺序:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" value="0" id="sort"></td>
  </tr>
  <tr>
    <td class="tdBorder1">显示方式:</td>
    <td class="tdBorder1">&nbsp;
      <label>
        <input type="radio" name="display"  value="1">
      平铺展示</label>
       <label>
        <input type="radio" name="display"  value="2">
      下拉展示</label>
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">显示类型:</td>
    <td class="tdBorder1">&nbsp;   <label>
        <input type="radio" name="displayType"  value="1">
      文字</label>
       <label>
        <input type="radio" name="displayType"  value="2">
      图片</label></td>
  </tr>
  <tr>
    <td class="tdBorder1">备注:</td>
    <td class="tdBorder1">&nbsp;<textarea name="specificationRemark" cols="50" rows="5" id="specificationRemark"></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重置"></td>
  </tr>
</table>
</FORM>
<p>&nbsp;</p>
</body></html>