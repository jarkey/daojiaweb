<?php
include_once('../inc/config.inc.php');
if ($_POST['check']) {
	foreach ($_POST['check'] as $id)
	{
	$sql="delete from gplat_mailLog where id=".$id;
	$result=mysql_query($sql);
	$sql1="delete from gplat_mailToLog where mail_id=".$id;
	$result1=mysql_query($sql1);
		}
}

if ($_GET['del'])
{
	$sql="delete from gplat_mailLog where id=".$_GET['del'];
	$result=mysql_query($sql);
	$sql1="delete from gplat_mailToLog where mail_id=".$_GET['del'];
	$result1=mysql_query($sql1);
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
				window.location.href="mail_to.php?del=" + id;
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
<br>
<form action="" method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
<tr>
  <td colspan="6" class="tdBorder1 titleBg1">�ʼ����ͼ�¼</td>
  </tr>
<tr align="center"><td width="10%" class="tdBorder1 tdBg1">ID</td>
<td class="tdBorder1 tdBg1">����</td>
<td class="tdBorder1 tdBg1">ʱ��</td>
<td class="tdBorder1 tdBg1">������</td>
<td class="tdBorder1 tdBg1">�༭ת��</td>
<td class="tdBorder1 tdBg1">ɾ��</td>
</tr>
<?php
if(isset($_GET['page']))
{
$page_id=$_GET['page'];
 }else{
$page_id=1;
}
$num=12;
$sql="select id from gplat_mailLog";
$result=mysql_query($sql);
$num_all=mysql_num_rows($result);
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}

$sql="select * from gplat_mailLog order by id desc limit $page_one,$num";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	?>
	<tr align="center"><td height="30" class="tdBorder1">
	<input type="checkbox" name="check[]" value="<?=$date['id']?>">
	</td>
	<td class="tdBorder1"><a href="mail_to_content.php?mail_to_id=<?=$date[id]?>&keepThis=true&TB_iframe=true&height=400&width=700" title="�ѷ����ʼ� / ��ϸ����" class="thickbox"><?=$date[mail_title]?></a></td>
	<td class="tdBorder1"><?=$date[times]?></td>
	<td class="tdBorder1"><a href="mail_to_user.php?mail_user_id=<?=$date[id]?>&keepThis=true&TB_iframe=true&height=400&width=700" title="�ѷ����ʼ� / ��ϸ����" class="thickbox"><img src="../images/1111.gif"  border="0px" alt="������"></a></td>
  <td class="tdBorder1"><a href="mail.php?mail_to_id=<?=$date[id]?>" title="�༭ת��"><img src="../images/inco_modify.gif" border="0px" alt="�༭ת��"></a></td>
  <td class="tdBorder1"><img src="../images/del.gif" border="0px" alt="ɾ��" onClick="myConfirm(<?=$id?>)"></td>
  </tr>
	<?php
}
?>  
	<tr align="center">
	  <td height="30" colspan="6" align="left" class="tdBorder1">
<div style="float:left">
	  <?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></div>
<div style="float:left; margin-left:20px;">
<input type=button class="button1" onClick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="button1" onClick=selectOther(document.aa) value="����">
    <input type=reset class="button1" value="ȡ��">  
    <input type="submit" class="button1" value="����ɾ��">
</div>

</td>
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
</body>
</html>