<?php
include_once('../inc/config.inc.php');
if ($_GET['del'])
{
	$sql="select * from gplat_specificationvalue where fid=".$_GET['del'];   
    $res=mysql_query($sql);   
    $numrows=mysql_num_rows($res);   
    if($numrows>0){
		echo '<script>alert("��������й��ֵ��������ɾ��");</script>';	
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
		echo("<script language=javascript>alert('��ӳɹ���');</script>");
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
var txt = "ȷ��Ҫɾ��������¼�𣿣�";
function myConfirm(id){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{ȷ��:true, ȡ��:false},
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
    <td colspan="7" class="tdBorder1 titleBg1">����б�</td>
  </tr>  
	<tr>
	  <td class="tdBorder1 tdBg1">&nbsp; �������</td>
	  <td class="tdBorder1 tdBg1">����</td>
      <td class="tdBorder1 tdBg1">��ʾ��ʽ</td>
      <td class="tdBorder1 tdBg1">˳��</td>
      <td class="tdBorder1 tdBg1">��ע</td>
      <td class="tdBorder1 tdBg1">���ֵ</td>
	  <td class="tdBorder1 tdBg1">����</td>
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
		$str1='����';
	}else{
	   $str1='ͼƬ';	
	}
	
	$display=$data['display'];
	
	if($display==1){
		$str2='ƽ��չʾ';
		}else{
	   $str2='����չʾ';	
			}
			
	$sort=$data['sort'];
	?>
	<tr>
	  
	  <td class="tdBorder1">&nbsp;<?=$specificationName?></td>
      <td class="tdBorder1"><?=$str1?></td>
      <td class="tdBorder1"><?=$str2?></td>
      <td class="tdBorder1"><?=$sort?></td>
      <td class="tdBorder1"><?=$specificationRemark?></td>
      <td class="tdBorder1"><a href="specificationValue_index.php?fid=<?=$id?>&specificationName=<?=$specificationName?>">�鿴</a></td>
	  <td class="tdBorder1">&nbsp;<a href="specifications_revise.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=350&width=700" title="���� / �����޸�" class="thickbox"><img src="../images/20050423123030295s.gif" width="14" height="16" alt="�޸�" border="0"></a>&nbsp;&nbsp;
     <img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm(<?=$id?>)">
      
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
    <td colspan="2" class="tdBorder1 titleBg1">��ӹ��</td>
  </tr>  
  <tr>
    <td class="tdBorder1">�������:</td>
    <td class="tdBorder1">&nbsp;<input name="specificationName" type="text" size="40" id="specificationName"> 
      </td>
  </tr>
  
  <tr>
    <td class="tdBorder1">˳��:</td>
    <td class="tdBorder1">&nbsp;<input name="sort" type="text" size="40" value="0" id="sort"></td>
  </tr>
  <tr>
    <td class="tdBorder1">��ʾ��ʽ:</td>
    <td class="tdBorder1">&nbsp;
      <label>
        <input type="radio" name="display"  value="1">
      ƽ��չʾ</label>
       <label>
        <input type="radio" name="display"  value="2">
      ����չʾ</label>
      </td>
  </tr>
  <tr>
    <td class="tdBorder1">��ʾ����:</td>
    <td class="tdBorder1">&nbsp;   <label>
        <input type="radio" name="displayType"  value="1">
      ����</label>
       <label>
        <input type="radio" name="displayType"  value="2">
      ͼƬ</label></td>
  </tr>
  <tr>
    <td class="tdBorder1">��ע:</td>
    <td class="tdBorder1">&nbsp;<textarea name="specificationRemark" cols="50" rows="5" id="specificationRemark"></textarea>
   </td>
  </tr>
  <tr>
    <td class="tdBorder1">&nbsp;</td>
    <td class="tdBorder1">&nbsp;<input type="submit" value="�ύ">&nbsp;&nbsp;<input type="reset" value="����"></td>
  </tr>
</table>
</FORM>
<p>&nbsp;</p>
</body></html>