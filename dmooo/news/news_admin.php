<?php
include('../inc/config.inc.php');
permissions('news_2_sel');

$class=(int)$_GET['class'];

if($_GET['className']){
	$title='"'.$_GET['className'].'"';
}else{
	$title='ȫ��';
}

if($_POST['check'])
{
	permissions('news_2_del');
   if($_POST['RadioGroup1']==1){
	foreach ($_POST['check'] as $id)
	{
	$sql3="select img from gplat_news where id=$id ";
	$result3=mysql_query($sql3);
	$date3=mysql_fetch_assoc($result3);
	$img=$date3['img'];
	@unlink("../../userfiles/$img");
	$sql="delete from gplat_news where id=$id ";
	$result=mysql_query($sql);
		
	}
	}
	 if($_POST['RadioGroup1']==2){
	 permissions('news_2_up');
	 	foreach ($_POST['check'] as $id)
	{   
	    $fid=$_POST['fid'];
		$sql="update gplat_news set class='$fid' where id=$id";
		$result=mysql_query($sql);
		
	}
	 
	 }

}
if ($_GET['del'])
{
	permissions('news_2_del');
	$sql3="select img from gplat_news where id=".$_GET['del'];
	$result3=mysql_query($sql3);
	$date3=mysql_fetch_assoc($result3);
	$img=$date3['img'];
	@unlink("img/$img");
	$sql="delete from gplat_news where id=".$_GET['del'];
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
<link href="../css/bluepage.css" rel="stylesheet" type="text/css">
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
<div style="width:95%; margin:auto; text-align:right; margin:10px 0px 10px 0px;"><a href="news_add.php?class=<?=$class?>&issystem=<?=$_GET['issystem']?>"><img src="../images/insert_content_button.jpg" width="98" height="32" border="0"></a>&nbsp;&nbsp;<a href="#"><img src="../images/refresh_web_button.jpg" width="98" height="32" border="0"></a></div>
<form action="" method="POST" name="aa">
  <table align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="8" class="tdBorder1 titleBg1"><?=$title?>�����б�</td>
    </tr>   
	<tr align="center" valign="middle"><td class="tdBorder1 tdBg1">--</td>
	<td class="tdBorder1 tdBg1">����</td>
	<td class="tdBorder1 tdBg1">�ö�</td>
	<td class="tdBorder1 tdBg1">�ⲿ����</td>
	<td class="tdBorder1 tdBg1">��Ŀ</td>
	<td class="tdBorder1 tdBg1">���ʱ��</td>
	<td class="tdBorder1 tdBg1">����</td>
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
$sql="select id from gplat_news";
if($class>0){
	$sql.=" where class=$class";
}
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select id,title,author,a.issystem as issystem,sticky,outLink,times,CatagoryID,Name from gplat_news a,gplat_news_class b where a.class=b.CatagoryID";
if($class>0){
	$sql.=" and class=$class";
}
$sql.=" order by sticky desc,times desc limit $page_one,$num";
//echo $sql;
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{ 
	$id=$date['id'];
	$author=$date['author'];
    $title=$date['title'];

	if ($date['issystem']==1)
	{
	  $title='<font color=red>'.$title.'</font>';
     }
	
	if($date['sticky']==1)
	{
	  $sticky="<font color=red>��<font>";
	}else{
	  $sticky="&nbsp;";
	}
	
	if(($date['outLink']))
	{
	  $outLink="<font color=red>��<font>";
	}else{
	  $outLink="&nbsp;";
	}	
	
    $times=$date['times'];
    $classId=$date['CatagoryID'];	  //��Ӧ��Ŀid
    $className=$date['Name'];	      //��Ӧ��Ŀ����
?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>">
</td><td align="left" class="tdBorder1"><?=$title?></td>
	<td class="tdBorder1"><?=$sticky?></td>
	<td class="tdBorder1"><?=$outLink?></td>
	<td class="tdBorder1"><a href="news_admin.php?class=<?=$classId?>&className=<?=$className?>"><?=$className?></td>
	<td class="tdBorder1"><?=$times?></td>
	<td class="tdBorder1"><?=$author?></td>
	<td class="tdBorder1">
	  <a href="news_revised.php?class=<?=$classId?>&id=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=800" title="���Ź��� / ��Ϣ�޸�" class="thickbox"><img src="../images/xiug.gif" alt="�޸�" width="14" height="15" border="0"></a>&nbsp;&nbsp;
	  <img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm(<?=$id?>,<?=$classId?>)">
	
	 </td>
    </tr>
	<?php
}
?>

</table>
<table border="0" align="center" cellpadding="0"  cellspacing="0" bgcolor="#999999" class="tableCss4">
<tr bgcolor="#FFFFFF">
  <td width="40%" class="tdBorder1" ><?php
include ( "../../inc/lib/BluePage.class.php" ) ;
require("../../inc/admin_page_class.php");
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
  <option value="">--ѡ�����--</option>
    <?php
	include('listclass.php');
	$CatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:$SC->getrootid();
	$Sort=$SC->Sort2array($CatagoryID);

	if(count($Sort)<1){
		$SC->referto("�������,�����������","{$PhpSelf}?Action=Add",3);
		}
	foreach($Sort as $v){
		echo '<option value="'.$v['Sort']['CatagoryID'].'">'.str_repeat("|--",$v['Deep']).$v['Sort']['Name'].'</option>';
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