<?php 
include_once('../inc/config.inc.php');
permissions('news_2_up');
$class=$_GET['class'];
if($_POST['hidden']==2)
{
$title=$_POST['title'];
$outLink=$_POST['outLink'];
$sticky=$_POST['sticky'];
$class=$_POST['class'];
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
$times=$_POST['times'];

$TitleFontColor=$_POST['TitleFontColor'];
$TitleFontType=$_POST['TitleFontType'];

if(!$_POST['times'])
{
date_default_timezone_set('Asia/Shanghai'); 
$times=date('Y-m-d H:i:s'); 
}
$clickNum=$_POST['count'];
$clickNum=(int)$clickNum;
$introduce=$_POST['introduce'];
$sort=$_POST['sort'];

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

/*******ɾ�����ļ� start**********/
$old_img=$_GET['img'];
@unlink("../../userfiles/$old_img");
/*******ɾ�����ļ� end**********/

$sql="update gplat_news set title='$title',outLink='$outLink',content='$content',class='$class',sticky='$sticky',times='$times',clickNum='$clickNum',author='$author',cchu='$cchu',introduce='$introduce',TitleFontColor='$TitleFontColor',TitleFontType='$TitleFontType',img='$img',sort='$sort' where id=".$_GET['id'];
$result=mysql_query($sql)or die(mysql_error());
if ($result!=0) {
	echo '<script>alert("�޸ĳɹ�");top.mainFrame.rightFrame.location.reload(true);window.close();</script>';		  
}
}
?>
<?php
$id=$_GET['id'];
$sql="select * from gplat_news where id=".$id;
$result=mysql_query($sql);
$date3=mysql_fetch_assoc($result);
$img=$date3['img'];

?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script>
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
<br>

<form action="news_revised.php?id=<?=$id?>&img=<?=$img?>" method="post" enctype="multipart/form-data">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss3">
  <tr>
    <td width="15%" align="center" class="tdBorder1">����</td>
    <td colspan="3" class="tdBorder1">&nbsp;
      <label>
      <input name="title" type="text" id="title" value="<?=$date3[title]?>" size="50">
      <input type="hidden" name="hidden" value="2">
      </label>
         <select name="TitleFontColor" id="TitleFontColor">
          <option value="">������ɫ</option>
          <option value="#000000" style="background-color:#000000" <?php if($date3[TitleFontColor]=='#000000'){ echo'selected';}?>></option>
          <option value="#FFFFFF" style="background-color:#FFFFFF" <?php if($date3[TitleFontColor]=='#FFFFFF'){ echo'selected';}?>></option>
          <option value="#008000" style="background-color:#008000" <?php if($date3[TitleFontColor]=='#008000'){ echo'selected';}?>></option>
          <option value="#800000" style="background-color:#800000" <?php if($date3[TitleFontColor]=='#800000'){ echo'selected';}?>></option>
          <option value="#808000" style="background-color:#808000" <?php if($date3[TitleFontColor]=='#808000'){ echo'selected';}?>></option>
          <option value="#000080" style="background-color:#000080" <?php if($date3[TitleFontColor]=='#000080'){ echo'selected';}?>></option>
          <option value="#800080" style="background-color:#800080" <?php if($date3[TitleFontColor]=='#800080'){ echo'selected';}?>></option>
          <option value="#808080" style="background-color:#808080" <?php if($date3[TitleFontColor]=='#808080'){ echo'selected';}?>></option>
          <option value="#FFFF00" style="background-color:#FFFF00" <?php if($date3[TitleFontColor]=='#FFFF00'){ echo'selected';}?>></option>
          <option value="#00FF00" style="background-color:#00FF00" <?php if($date3[TitleFontColor]=='#00FF00'){ echo'selected';}?>></option>
          <option value="#00FFFF" style="background-color:#00FFFF" <?php if($date3[TitleFontColor]=='#00FFFF'){ echo'selected';}?>></option>
          <option value="#FF00FF" style="background-color:#FF00FF" <?php if($date3[TitleFontColor]=='#FF00FF'){ echo'selected';}?>></option>
          <option value="#FF0000" style="background-color:#FF0000" <?php if($date3[TitleFontColor]=='#FF0000'){ echo'selected';}?>></option>
          <option value="#0000FF" style="background-color:#0000FF" <?php if($date3[TitleFontColor]=='#0000FF'){ echo'selected';}?>></option>
          <option value="#008080" style="background-color:#008080" <?php if($date3[TitleFontColor]=='#008080'){ echo'selected';}?>></option>
        </select>
        <select name="TitleFontType" id="TitleFontType">
          <option value="0" <?php if($date3[TitleFontType]=='0'){ echo'selected';}?>>��������</option>
          <option value="b" <?php if($date3[TitleFontType]=='b'){ echo'selected';}?>>����</option>
          <option value="i" <?php if($date3[TitleFontType]=='i'){ echo'selected';}?>>б��</option>
          <option value="3" <?php if($date3[TitleFontType]=='3'){ echo'selected';}?>>��+б</option>
         
        </select>
      </td>
  </tr>
  <tr>
    <td align="center" class="tdBorder1">���</td>
    <td width="35%" class="tdBorder1">&nbsp;

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
      </td>
    <td width="15%" class="tdBorder1">����ͼƬ</td>
    <td width="35%" class="tdBorder1"><label>
      <input name="user_upload_file[]" type="file" size="30">
    </label></td>
  </tr>
  <tr >
    <td align="center" class="tdBorder1">���</td>
    <td colspan="3" class="tdBorder1">ʱ��
      <input name="times" type="text" id="times"  value="<?=$date3['times']?>" size="20">
      &nbsp;&nbsp;����
      <input name="author" type="text" id="author" value="<?=$date3['author']?>" size="10">
      &nbsp;&nbsp;����
<input name="cchu" type="text" id="cchu" value="<?=$date3['cchu']?>" size="20">
      &nbsp;&nbsp;�����
      <input  type="text" name="count" id="count"  value="<?=$date3['clickNum']?>" size="5"></td>
  </tr>
  <tr >
    <td align="center" class="tdBorder1">�ⲿ����</td>
    <td colspan="3" class="tdBorder1">&nbsp;
      <input name="outLink" type="text" id="outLink" size="50" value="<?=$date3['outLink']?>"> &nbsp;&nbsp;����
      <input  type="text" name="sort"  value="<?=$date3['sort']?>" size="5"></td>
  </tr>
  <tr ><td align="center" class="tdBorder1">��Ҫ˵��</td>
  <td colspan="3" class="tdBorder1"> &nbsp;
    <label>
    <textarea name="introduce" id="introduce" cols="80" rows="3"><?=$date3['introduce']?></textarea>
    </label></td>
  </tr>
  <tr>
    <td align="center" valign="top" class="tdBorder1"><br>����<br>
      <input type="checkbox" name="sticky" value="1" <?php if($date3['sticky']==1){echo'checked';}?>>
      �ö�
     </td>
    <td colspan="3" class="tdBorder1"><textarea name="content" style="width:100%;height:300px;visibility:hidden;"><?php echo $date3['content']; ?></textarea></td>
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