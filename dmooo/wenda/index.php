<?php
include('../inc/config.inc.php');
?>
<?php
//$fid=$_GET['fid'];
//�޸���ʾ״̬
if($_GET['view'])
{
	$sql2="select view from gplat_wenda where id=".$_GET['view'];
	$result2=mysql_query($sql2);
	$date2=mysql_fetch_assoc($result2);
	$view=$date2['view'];
	if($view==0||$view=null)
	{ 
	$v=1;
	}else
	{
		$v=0;
		}
	$sql3="update gplat_wenda set view='$v' where id=".$_GET['view'];
	$result3=mysql_query($sql3);
	
	}
if($_POST['check'])
{
   if($_POST['RadioGroup1']==1){
	foreach ($_POST['check'] as $id)
	{
		$sql="delete from gplat_wenda where id=$id";
		$result=mysql_query($sql);
		
	}
	}
	 if($_POST['RadioGroup1']==2){
	 
	 	foreach ($_POST['check'] as $id)
	{   
	    $fid=$_POST['fid'];
		$sql="update gplat_wenda set fid='$fid' where id=$id";
		$result=mysql_query($sql);
		
	}
	 
	 }

}
if ($_GET['del'])
{
	$sql="delete from gplat_wenda where id=".$_GET['del'];
	$result=mysql_query($sql);
	}
?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/jquery-impromptu.1.6.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
<link href="../inc/jquery/confirm.css" rel="stylesheet" type="text/css">
<link href="../bluepage.css" rel="stylesheet" type="text/css">
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
</script></head><body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
  <td width="100%" height="35" class="tdBorder1">
    <form action="" method="post">
    &nbsp;���:
    <select name="class_id">
    <option value="">-����-</option>
    <?php
    $sql="select * from gplat_wenda_classId order by orderbySN asc";
    $result=mysql_query($sql);
    while ($data=mysql_fetch_assoc($result))
    {
        $id=$data['id'];
        $name=$data['name'];
        ?>
        <option value="<?=$id?>" <?php if($id==$_POST['class_id']){echo 'selected';}?>><?=$name?></option>
        <?php
        }
    ?>
    </select>
    &nbsp;&nbsp;״̬;
    <select name="status">
    <option value="">-����-</option>
    <option value="3" <?php selected('3',$_POST['status'])?>>�Ѵ���</option>
    <option value="2" <?php selected('2',$_POST['status'])?>>������</option>
    <option value="1" <?php selected('1',$_POST['status'])?>>������</option>
    <option value="4" <?php selected('4',$_POST['status'])?>>����</option>
    </select>
    &nbsp;&nbsp;�ظ�;
    <select name="answer">
    <option value="">-����-</option>
    <option value="1" <?php selected('1',$_POST['answer'])?>>�ѻظ�</option>
    <option value="2" <?php selected('2',$_POST['answer'])?>>δ�ظ�</option>
    </select>
    &nbsp;&nbsp;��ʾ;
    <select name="view">
    <option value="">-����-</option>
    <option value="1" <?php selected('1',$_POST['view'])?>>��ʾ</option>
    <option value="2" <?php selected('2',$_POST['view'])?>>����ʾ</option>
    </select>
    &nbsp;�û���;
    <input type="text" name="name" value="<?=$_POST['name']?>">
    <input type="hidden" value="search" name="search" >
    <input type="submit" class="button1" value="����">&nbsp;&nbsp;
    </form>
  </td>
</tr>
</table><br>

<form action="" method="POST" name="aa">
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="7" class="tdBorder1 titleBg1">�����б�</td>
    </tr>  
	<tr align="center" valign="middle">
	  <td class="tdBorder1 tdBg1">ѡ��</td>
	<td class="tdBorder1 tdBg1">����״̬</td>
	<td class="tdBorder1 tdBg1">����(�������鿴�ظ�)</td>
	
    <td class="tdBorder1 tdBg1">�Ƿ���ʾ</td>    
	<td class="tdBorder1 tdBg1">�û���</td>
	<td class="tdBorder1 tdBg1">ʱ��</td>
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

/******�ύ��������*******/
if($_POST['search']=='search')
{
	//�ж�����
	if ($_POST['class_id']) {
		$class_id=$_POST['class_id'];
		$sql_class='class_id='.$class_id.' ';
		$i=1;
	}else {$sql_class='';}
    //�ж�״̬	
$status=$_POST['status'];
if ($status!=0) {
if ($i==1) {
	$and='and';
}else 
{
	$i=1;
}
switch ($status)
{
	case 1:
	   $sql_status=$and.' status=1 ';
		break;
	case 2:
		$sql_status=$and.' status=2 ';
		break;
	case 3:
		$sql_status=$and.' status=3 ';
		break;
	case 4:
		$sql_status=$and.' notice=1 ';
		break;
	default:
		$sql_status='';
		break;
}
	
}
//�ж��Ƿ�ظ�

if ($_POST['answer']) {
	$answer=$_POST['answer'];
	if ($i==1) {
	$and='and';
}else 
{
	$i=1;
}
if ($answer==1) {
	
	$sql_answer=$and.' answer=1 ';
}else { $sql_answer=' answer=0 ';}

}


//�ж������Ƿ���ʾ
if ($_POST['view']) {
$view=$_POST['view'];
	if ($i==1) {
	$and='and';
}else 
{
	$i=1;
}
if ($view==1) {
$sql_view=$and.' view=1 ';
}else {$sql_view=$and.' view=0 ';}
}
//�����û���ģ������
$name=$_POST['name'];
if (!empty($name)) {
	if ($i==1) {
	$and='and';
}else 
{
	$i=1;
}
	$sql_name=$and." name like '%$name%' ";
}else { $sql_name='';}
//�ж��ύ�������Ƿ�Ϊ�գ�������Ҫ���  where
$str_name=$sql_class.$sql_status.$sql_answer.$sql_view.$sql_name;
$str_name_num=strlen($str_name);
if ($str_name_num==0)
{
	$where='';
}else {$where=' where ';}
/*******�����жϽ���***********/

$sql="select id from gplat_wenda ".$where.$sql_class.$sql_status.$sql_answer.$sql_view.$sql_name;
//echo "$sql".'<br>';
}else{
$sql="select id from gplat_wenda ";
}
$result=mysql_query($sql);
$num_all=mysql_num_rows($result); //�ܼ�¼��
$page_all=ceil($num_all/$num); //�����?��ҳ��
$page_one=($page_id-1)*$num; // ȡ���Ŀ�ʼ��?
if($page_id<0||$page_id > $page_all)
{
 //ExitMessage('���ʵ�ҳ�����');
}
if($_POST['search']=='search')
{
$sql="select * from  gplat_wenda ".$where.$sql_class.$sql_status.$sql_answer.$sql_view.$sql_name."order by notice desc, id desc limit $page_one,$num";
//echo"$sql";
}else{
$sql="select * from  gplat_wenda order by notice desc, id desc limit $page_one,$num";
}
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$title=$date['title'];
	$name=$date['name'];
	$times=$date['times'];
	$id=$date['id'];
	$view=$date['view'];
	if($view==0||$view==NULL)
	{
		$i='<font color=green>��</font>';
		}else{
			$i='<font color=red>��</font>';
			}
	
			$stick=$date['status'];                        //����״̬
	$notice=$date['notice'];                      //�Ƿ񹫸�
	if ($stick==1) {
		$stick_img='css/icon/casewt.gif';  //������
		$stick_font='&nbsp;<font color="#f0870a">������</font>';
		}
	if ($stick==2) {
		$stick_img='css/icon/casedw.gif';  //������
		$stick_font='&nbsp;<font color="#f0dc00">������</font>';
		}
		if ($stick==3) {
		$stick_img='css/icon/caseok.gif';  //�Ѵ���
		$stick_font='&nbsp;<font color="#d8d8d8">�Ѵ���</font>';
		}
	if ($notice==1)
	{
		$stick_img='css/icon/casebt.gif';
		$stick_font='&nbsp;<font color="#62be00">��&nbsp;&nbsp;��</font>';
		}
	?>
	<tr align="center" valign="middle" bgcolor="#FFFFFF"><td align="center" class="tdBorder1"><input type="checkbox" name="check[]" value="<?=$id?>">
</td><td align="center" class="tdBorder1"><?=$stick_font?></td>
<td align="left" class="tdBorder1">
  <a href="answer.php?fid=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="����ظ����� / ����Ա�ظ�" class="thickbox"><?=$title?></a></td>

    <td align="center" class="tdBorder1"><a href="index.php?view=<?=$id?>"><?=$i?></a></td>
	<td align="center" class="tdBorder1"><?=$name?>
	  &nbsp;</td>
	<td align="center" class="tdBorder1"><font color="<?php if($mail_exit==1){echo'red';}?>"><?=$times?></font></td>
	<td align="center" class="tdBorder1">
	  <a href="revised.php?id=<?=$id?>&keepThis=true&TB_iframe=true&height=400&width=700" title="����ظ����� / ��Ϣ�޸�" class="thickbox"><img src="../images/xiug.gif" alt="�޸�" width="14" height="15" border="0"></a>&nbsp;&nbsp;<img src="../images/del.gif" width="13" height="13" alt="ɾ��" border="0px" onClick="myConfirm(<?=$id?>)"></td>
    </tr>
	<?php
}
?>

</table>
<table border="0" align="center" cellpadding="0"  cellspacing="0" bgcolor="#999999" class="tableCss4">
<tr bgcolor="#FFFFFF">
  <td width="40%" height="30" class="tdBorder1" >
  <?php
include ( "../inc/lib/BluePage.class.php" ) ;
require("../inc/lib/admin_page_class.php");
echo"$strHtml";
?></td>
  <td class="tdBorder1"><input type=button class="button1" onclick=selectAll(document.aa) value="ȫѡ">
    <input type=button class="button1" onClick=selectOther(document.aa) value="����">
    <input type=reset class="button1" value="ȡ��">&nbsp;<label>&nbsp;
      <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0">ɾ��
      <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">
      ת�� &nbsp;ת�Ƶ���
  <select name="fid2">
    <?php
$sql="select * from gplat_wenda_classId order by id asc";
$result=mysql_query($sql);
while ($date=mysql_fetch_assoc($result))
{
	$id=$date[id];
	$name=$date[name];
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