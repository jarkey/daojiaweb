<?php
include('../inc/config.inc.php');
permissions('product_2_sel');
$class=$_GET['class'];
$classIndex=$_GET['classIndex'];
if($_POST['check'])
{
	permissions('product_2_del');
   if($_POST['RadioGroup1']==1){
	foreach ($_POST['check'] as $id)
	{
	$sql3="select img from dmooo_product where productid=$id";
	$result3=mysql_query($sql3);
	$date3=mysql_fetch_assoc($result3);
	$img=$date3['img'];
	@unlink("../../userfiles/$img");
	$sql="delete from dmooo_product where productid=$id";
	$result=mysql_query($sql);
		
	}
	}
	 if($_POST['RadioGroup1']==2){
	 permissions('product_2_up');
	 	foreach ($_POST['check'] as $id)
	{   
	    $fid=$_POST['fid'];
		$sql="update dmooo_product set class='$fid' where productid=$id";
		$result=mysql_query($sql);
		
	}
	 
	 }

}
if ($_GET['del'])
{
	permissions('product_2_del');
	$sql3="select img,img1,img2,img3 from dmooo_product where productid=".$_GET['del'];
	$result3=mysql_query($sql3);
	$date3=mysql_fetch_assoc($result3);
	$img=$date3['img'];
	@unlink("../../userfiles/$img");
   $sql="delete from dmooo_product where productid=".$_GET['del'];
	$result=mysql_query($sql);
	}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" /> 
<link href="../bluepage.css" rel="stylesheet" type="text/css">
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var txt = "ȷ��Ҫɾ��������¼�𣿣�";
function myConfirm(id,class1){	
	jQuery.noConflict();
	jQuery.prompt(txt,{ 
		buttons:{ȷ��:true, ȡ��:false},
		callback: function(v,m){
			if(v){
				window.location.href="news_admin.php?del=" + id+"&class="+class1;
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
</head><body>
<div style="width:95%; margin:auto; text-align:right; margin:10px 0px 10px 0px;"><a href="news_add.php?class=<?=$class?>&classIndex=<?=$_GET['classIndex']?>"><img src="../images/insert_content_button.jpg" width="98" height="32" border="0"></a>&nbsp;&nbsp;<a href="#"><img src="../images/refresh_web_button.jpg" width="98" height="32" border="0"></a></div>
<form action="" method="POST" name="aa">
  <table align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="9" class="tdBorder1 titleBg1">��Ʒ�б�</td>
    </tr>  
	<tr align="center" valign="middle"><td class="tdBorder1 tdBg1">--</td>
	<td class="tdBorder1 tdBg1">��Ʒ����</td>
	<td class="tdBorder1 tdBg1">�ö�</td>
	<td class="tdBorder1 tdBg1">�Ƽ�</td>
    <td class="tdBorder1 tdBg1">����</td>
    <td class="tdBorder1 tdBg1">ͼƬ</td>
    <td class="tdBorder1 tdBg1">���</td>
    <td class="tdBorder1 tdBg1">Ʒ��</td>
	<td class="tdBorder1 tdBg1">���ʱ��</td>
	
	<td class="tdBorder1 tdBg1">����</td>
	</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select productid from dmooo_product where class=".$class;
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from dmooo_product where class='$class' order by sticky desc,sort desc,times desc limit $page_one,$num";

$result=mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{ 
   $title=$data['productName'];

	if ($data['issystem']==1)
	{
	  $title='<font color=red>'.$title.'</font>';
     }
	
	if($data['sticky']==1)
	{
	  $sticky="<font color=red>��<font>";
	}else{
	  $sticky="&nbsp;";
	}
	
	if($data['recommended']==1)
	{
	  $recommended="<font color=red>��<font>";
	}else{
	  $recommended="&nbsp;";
	}	
	if($data['hot']==1)
	{
	  $hot="<font color=red>��<font>";
	}else{
	  $hot="&nbsp;";
	}
	
    $times=$data['times'];
	$id=$data['productid'];

?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>">
</td><td align="left" class="tdBorder1"><?=$title?></td>
	<td class="tdBorder1"><?=$sticky?></td>
	<td class="tdBorder1"><?=$recommended?></td>
    <td class="tdBorder1"><?=$hot?></td>
    <td class="tdBorder1 "><a href="news_img.php?class=<?=$id?>&fid=<?=$_GET['class']?>&classIndex=<?=$_GET['classIndex']?>">ͼƬ</a></td>
    <td class="tdBorder1 "><a href="news_price.php?class=<?=$id?>&fid=<?=$_GET['class']?>&classIndex=<?=$_GET['classIndex']?>">���</a></td>
    <td class="tdBorder1 "><?=ppzView($data['brand'])?></td>
	<td class="tdBorder1"><?=$times?></td>
	<td class="tdBorder1">
	  <a href="news_revised.php?class=<?=$class?>&id=<?=$id?>&keepThis=true&TB_iframe=true&height=430&width=860" title="���Ź��� / ��Ϣ�޸�" class="thickbox"><img src="../images/xiug.gif" alt="�޸�" width="14" height="15" border="0"></a>&nbsp;&nbsp;
	  <?php 
	  	if ($date['issystem']!=1)
	{
		?>
		 <img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm(<?=$id?>,<?=$class?>)">
		<?php
	}
	  ?>
	 </td>
    </tr>
	<?php
}
?>

</table>
<table border="0" align="center" cellpadding="0"  cellspacing="0" bgcolor="#999999" class="tableCss4">
<tr bgcolor="#FFFFFF">
  <td width="40%" class="tdBorder1" ><?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
/*
$pBP = new BluePage ;
$intCount    = $num_all ; // �����¼����Ϊ1000
$intShowNum  = $num ;   // ÿҳ��ʾ����
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;
$strHtml   = $pBP->getHTML( $aPDatas ) ; */
echo"$strHtml";
?></td>
  <td class="tdBorder1"><input type=button class="button1" onClick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="button1" onClick=selectOther(document.aa) value="����">
    <input type=reset class="button1" value="ȡ��">&nbsp;<label>&nbsp;
  <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0">ɾ��
  <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">
ת�� &nbsp;ת�Ƶ���
<select name="fid">
  <?php
$sql="select * from dmooo_productclass2 order by id desc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date['id'];
	$name=$date['name'];
	?>
  <option value="<?=$id?>">
  <?=$name?>
  </option>
  <?php
}
?>
</select>
<input type="submit" class="button1" value="�ύ">
</label></td>
</tr>
</table>
<script>
function selectAll(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox")
obj.elements[i].checked = true;
}
function selectOther(obj)
{
for(var i = 0;i<obj.elements.length;i++)
if(obj.elements[i].type == "checkbox" )
{
if(!obj.elements[i].checked)
obj.elements[i].checked = true;
else
obj.elements[i].checked = false;

}
}
</script>


</form>

<p>&nbsp;</p>
</body></html>