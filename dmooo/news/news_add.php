<?php 
include_once('../inc/config.inc.php');

permissions('news_2_in');
$class=$_GET['class'];
if($_POST['hidden']==1)
{
	if(!$_POST['class'])
	{
	  echo("<script language=javascript>alert('��ѡ�����');</script>"); 
	  echo'<meta http-equiv="refresh" content="0; url=news_add.php"/>';
	  exit;
	}
$title=$_POST['title'];
$outLink=$_POST['outLink'];
$sticky=$_POST['sticky'];
$class=$_POST['class'];
$sort=$_POST['sort'];
if (!empty($_POST['content'])) {
		if (get_magic_quotes_gpc()) {
			$content = stripslashes($_POST['content']);
		} else {
			$content = $_POST['content'];
		}
	}
  $content = str_replace('\'', "''", $content);

$author=$_POST['author'];
$cchu=$_POST['cchu'];
$TitleFontColor=$_POST['TitleFontColor'];
$TitleFontType=$_POST['TitleFontType'];
$times=$_POST['times'];
if(!$_POST['times'])
{
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s'); 
}
$count=$_POST['count'];
$introduce=$_POST['introduce'];
$member_group_array=$_POST['member_group'];
$tag=$_POST['tag'];
$videoFile=$_POST['videoFile'];
$issystem=0;
for ($i=0;$i<count($member_group_array);$i++)
	{
	$member_group.=$member_group_array[$i].',';
}

	/**************�ϴ��ļ��� start*************************/
	 $type = array('gif', 'jpg', 'png');
	 $upload = new UploadFile($_FILES['user_upload_file'], '../../userfiles', 1000000, $type);
	 $num = $upload->upload();
	 if ($num != 0) {
	  //echo "�ϴ��ɹ�<br>";
	  //ȡ���ļ����й���Ϣ���ļ��������͡���С��·������print_r()��ӡ������
	  //print_r($upload->getSaveInfo());
	  //��ʽΪ��  Array
	  //   (
	  //    [0] => Array(
	  //        [name] => example.txt
	  //        [type] => txt
	  //        [mime_type] => image/gif
	  //        [size] => 526
	  //        [saveas] => 1263449597.gif 
	  //        [path] => j:/tmp/example-1108898806.txt
	  //        )
	  //   )
	  echo $num."���ļ��ϴ��ɹ�";
	  $a=$upload->getSaveInfo();
	  $img=$a[0][saveas];
	 }
	 else {
	  //echo "�ϴ�ʧ��<br>";
	 }
	/**************�ϴ��ļ��� end*************************/ 


$sql="insert into gplat_news (title,outLink,content,class,sticky,times,clickNum,author,cchu,introduce,TitleFontColor,TitleFontType,img,videoFile,tag,member_group,issystem,sort) values ('$title','$outLink','$content','$class','$sticky','$times','$count','$author','$cchu','$introduce','$TitleFontColor','$TitleFontType','$img','$videoFile','$tag','$member_group',$issystem,$sort)";
$result=mysql_query($sql) or die(mysql_error());
if($result!=0){
    echo("<script language=javascript>alert('��ӳɹ�');</script>"); 
	echo'<meta http-equiv="refresh" content="0; url=news_admin.php?class='.$class.'"/>';
	exit;
}

}
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s'); 
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
<script type="text/javascript" src="../inc/jquery/Calendar.js"></script>
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">

<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../kindeditor-4.1.7/plugins/code/prettify.css" />
	<script charset="utf-8" src="../kindeditor-4.1.7/kindeditor.js"></script>
	<script charset="utf-8" src="../kindeditor-4.1.7/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../kindeditor-4.1.7/plugins/code/prettify.js"></script>
    <script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '../kindeditor-4.1.7/plugins/code/prettify.css',
				uploadJson : '../kindeditor-4.1.7/php/upload_json.php',
				fileManagerJson : '../kindeditor-4.1.7/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
<script type="text/javascript">
$(document).ready( function(){});
function hiden(){
//hide()����,ʵ������,�����ﻹ���Դ�һ��ʱ�����(����)����hide(2000)��2000������ٶ�����,�����Դ�slow,fast
  $("#divObj1").hide();
  $("#divObj2").hide();
  $("#divObj3").hide();
  $("#divObj4").hide();
  $("#divObj5").hide();  
}
function show(){
//��ʾ,����˵��ͬ��
  $("#divObj1").show();
  $("#divObj2").show();
  $("#divObj3").show();
  $("#divObj4").show();
  $("#divObj5").show();  
}
</script>


<form action="" method="post" enctype="multipart/form-data">
  <br>
<table height="201" border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td colspan="4" class="tdBorder1 titleBg1">
    <div style="width:100%;">
      <div style="float:left; padding-top:3px;">�������</div>
      <div style="float:right;"><input type="button" value="���ظ���" onClick="hiden()"/><input type="button" value="��ʾ����" onClick="show()"/></div>      
    </div>
    
    </td>
    </tr> 
  <tr>
    <td width="11%" align="center" class="tdBorder1" scope="col">����</td>
    <td colspan="3" class="tdBorder1" scope="col">&nbsp;
      <label>
      <input name="title" type="text" id="title" size="50">
      <input type="hidden" name="hidden" value="1">
      </label>
      <select name="TitleFontColor" id="TitleFontColor">
          <option value="" selected>������ɫ</option>
          <option value="#000000" style="background-color:#000000"></option>
          <option value="#FFFFFF" style="background-color:#FFFFFF"></option>
          <option value="#008000" style="background-color:#008000"></option>
          <option value="#800000" style="background-color:#800000"></option>
          <option value="#808000" style="background-color:#808000"></option>
          <option value="#000080" style="background-color:#000080"></option>
          <option value="#800080" style="background-color:#800080"></option>
          <option value="#808080" style="background-color:#808080"></option>
          <option value="#FFFF00" style="background-color:#FFFF00"></option>
          <option value="#00FF00" style="background-color:#00FF00"></option>
          <option value="#00FFFF" style="background-color:#00FFFF"></option>
          <option value="#FF00FF" style="background-color:#FF00FF"></option>
          <option value="#FF0000" style="background-color:#FF0000"></option>
          <option value="#0000FF" style="background-color:#0000FF"></option>
          <option value="#008080" style="background-color:#008080"></option>
        </select>
        <select name="TitleFontType" id="TitleFontType">
          <option value="0" selected>��������</option>
          <option value="b">����</option>
          <option value="i">б��</option>
          <option value="3">��+б</option>
       
        </select>
     </td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1">���</td>
    <td class="tdBorder1">&nbsp;
      <label>
        <select name="class" id="class">
          <option value="">--ѡ�����--</option>
        <?php
        include('listclass.php');
        $CatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:$SC->getrootid();
        $Sort=$SC->Sort2array($CatagoryID);
    
        if(count($Sort)<1){
            $SC->referto("�������,�����������","{$PhpSelf}?Action=Add",3);
            }
        foreach($Sort as $v){
			$classId=$v['Sort']['CatagoryID'];
			$className=$v['Sort']['Name'];
			if($classId==$class){
                echo '<option value="'.$classId.'" selected>'.str_repeat("|--",$v['Deep']).$className.'</option>';
			}else{
				 echo '<option value="'.$classId.'">'.str_repeat("|--",$v['Deep']).$className.'</option>';
			}
         }
        ?>                   
          </select>
      </label></td>
    <td class="tdBorder1">�ⲿ����</td>
    <td class="tdBorder1">&nbsp;
      <input name="outLink" type="text" id="outLink" size="40"> &nbsp;&nbsp;����
      <input  type="text" name="sort"  value="1" size="5"></td>
  </tr>
  <tr id="divObj1" style="display:none;">
    <td align="center" class="tdBorder1">���</td>
    <td colspan="3" class="tdBorder1">ʱ��      <input name="times" type="text" id="times"  onClick="setDayHM(this);" size="15" value="<?=$times?>" >
      &nbsp;&nbsp; ����
      <input name="author" type="text" id="author" value="����Ա" size="10">
      &nbsp;&nbsp;����
      <input name="cchu" type="text" id="cchu" size="20" >
  &nbsp;&nbsp;      �����
  <input name="count" type="text" id="count" value="0" size="5"></td>
  </tr>
  <tr id="divObj2" >
    <td align="center" class="tdBorder1">����ͼƬ</td>
    <td class="tdBorder1">&nbsp;      <input name="user_upload_file[]" type="file" size="30"></td>
    <td class="tdBorder1">��Ƶ�ļ�</td>
    <td class="tdBorder1">&nbsp;      <input name="videoFile" type="text" id="videoFile" size="40"></td>
  </tr>
  
  <tr id="divObj4" >
    <td align="center" class="tdBorder1">�ؼ���</td>
    <td colspan="3" class="tdBorder1">&nbsp;      <input name="tag" type="text" id="tag" size="50"></td>
  </tr>  
  <tr id="divObj5" style="display:none;">
    <td align="center" class="tdBorder1">��Ҫ˵��</td>
    <td colspan="3" class="tdBorder1"> &nbsp;
      <label>
        <textarea name="introduce" id="introduce" cols="80" rows="3"></textarea>
      </label></td>
  </tr>
  
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>
      ����<br>
      <input type="checkbox" name="sticky" value="1">
�ö�</td>
    <td colspan="3" class="tdBorder1"><textarea name="content" style="width:100%;height:400px;visibility:hidden;"></textarea></td>
  </tr>
 <tr>
    <td align="center" class="tdBorder1">&nbsp;</td>
    <td colspan="3" class="tdBorder1">&nbsp;
      <input type="submit" class="button1" value="�ύ"></td>
  </tr>
</table>
</form>


</body>
</html>