<?php
include_once('../inc/config.inc.php');
include_once('mysql.php');
include_once('sortclass.php');
permissions('news_1_sel'); //Ȩ��
$db_name='gplat_news_class';

?>
<html><head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<script type="text/javascript" src="../inc/jquery/jquery1.2.js"></script> 
<script type="text/javascript" src="../inc/jquery/thickbox.js"></script> 
<link rel="stylesheet" href="../inc/jquery/thickbox.css" type="text/css" media="screen" />
<link href="../css/StyleSheet1.css" rel="stylesheet" type="text/css">
</head>
<body>

<table border="0" align="center" cellpadding="0" cellspacing="0" class="tableCss4">
  <tr>
    <td colspan="3" class="tdBorder1 titleBg1">��Ŀ����</td>
    </tr> 
 
<?php

$db=new Mysql($host,$user,$pass,$db,true);
$SC=new sortclass();
$PhpSelf='news_class.php';

if(!get_magic_quotes_gpc()){
	$_POST=addslashes_array($_POST);
	$_GET=addslashes_array($_GET);
	}

$Action=$_GET['Action']?$_GET['Action']:"Show";

function makeselect($ParentCatagoryID,$Sort)
{
$Select="<select name=\"ParentCatagoryID\">";
$Select.="<option value=\"0\">��ѡ�񸸷���</option>";
foreach($Sort as $v){
	$Value=str_repeat("|-",$v['Deep']).$v['Sort']['Name']."(".$v['Sort']['CatagoryID'].")";
	if($ParentCatagoryID==$v['Sort']['CatagoryID']){
		$Select.="<option value=\"{$v['Sort']['CatagoryID']}\" selected=\"selected\">$Value</option>";
		}else{
		$Select.="<option value=\"{$v['Sort']['CatagoryID']}\">$Value</option>";
		}
	}
$Select.="</select>";
return $Select;
}

function stripslashes_array($array) {
         $array = is_array($array) ?
         	 array_map('stripslashes_array',$array) :
                  stripslashes($array);
          return $array;
	}

function addslashes_array($array){
         $array = is_array($array) ?
         	 array_map('addslashes_array',$array) :
                  addslashes($array);
         return $array;
       }

function safecover($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = safecover($val);
		}
	} else {
		$string = str_replace('&', '&amp;', $string);
		$string = str_replace('"', '&quot;', $string);
		$string = str_replace('<', '&lt;', $string);
		$string = str_replace('>', '&gt;', $string);
        $string = str_replace("\t","",$string);
        $string = str_replace("\n","<br>",$string);
        $string = str_replace("\r","",$string);
	}
	return $string;
}

function exitstr($str)
{
echo "<pre>";
print_r($str);
echo "</pre>";
exit;
} 

if($Action=="Show"){
	$CatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:$SC->getrootid();
	$Sort=$SC->Sort2array($CatagoryID);

	if(count($Sort)<1){
		$SC->referto("�������,�����������","{$PhpSelf}?Action=Add",3);
		}
	foreach($Sort as $v){
		//echo str_repeat("|--",$v['Deep']).$v['Sort']['Name']." <a href={$PhpSelf}?Action=Edit&CatagoryID={$v['Sort']['CatagoryID']}>�༭</a> <a href={$PhpSelf}?Action=Delete&CatagoryID={$v['Sort']['CatagoryID']} >ɾ��</a> <a href={$PhpSelf}?Action=Add&CatagoryID={$v['Sort']['CatagoryID']}>�����ӷ���</a>"."<br />";
		$issystem=$v['Sort']['issystem'];
		$classId=$v['Sort']['CatagoryID'];		
		$className=$v['Sort']['Name'];
		if($issystem==1){
			$className1='<font color=red>'.$className.'</font>';
		}else{
			$className1=$className;
		}
		echo '<tr valign="middle"><td class="tdBorder1">';
		echo str_repeat("|--",$v['Deep']).$className1."</td>\n 
		<td class=tdBorder1>
		<a href={$PhpSelf}?Action=Edit&CatagoryID={$classId}>�༭</a> 
		<a href={$PhpSelf}?Action=Delete&CatagoryID={$classId}&issystem={$issystem}>ɾ��</a> 
		<a href={$PhpSelf}?Action=Add&CatagoryID={$classId}>�����ӷ���</a>
		</td>\n 
		<td class=tdBorder1>
		<a href=news_admin.php?class={$classId}&className={$className}>���¹���</a>"."</td>\n </tr>";		
		}


	exit;
	}

if($Action=="Delete"){
	/*if($_GET['issystem']==1){
		$SC->referto("����ϵͳ��𣬲���ɾ��","{$PhpSelf}?Action=Show",3);
		exit;
	}*/
	if($SC->deletesort($_GET['CatagoryID'])){
		$SC->referto("�ɹ�ɾ�����","{$PhpSelf}?Action=Show",3);
		}
	exit;
	}

if($Action=="Edit"){
$Catagory=$SC->checkcatagory($_GET['CatagoryID']);
$Sort=$SC->sort2array(0);
$ParentCatagoryID=$SC->getparent($_GET['CatagoryID']); 
$Number=count($ParentCatagoryID);
$Select=makeselect($ParentCatagoryID[$Number-1]['CatagoryID'],$Sort);

?>

<tr valign="middle"><td class="tdBorder1">
	<form id="form1" name="form1" method="post" action="<?=$PhpSelf?>?Action=EditSave">
	<input type="text" name="Name" value="<?=$Catagory['Name']?>"/> 
	<input type="hidden" name="CatagoryID" value="<?=$Catagory['CatagoryID']?>" />
	<?=$Select?>	
	<input type="submit" name="Submit" value="�ύ" />
	</form>
</td></tr>    
<?php
	//exit;
	}

if($Action=="Add"){
	$ParentCatagoryID=$_GET['CatagoryID']?$_GET['CatagoryID']:0;
	$Sort=$SC->sort2array(0);
	$Select=makeselect($ParentCatagoryID,$Sort);
?>

<tr valign="middle"><td class="tdBorder1">
	<form id="form1" name="form1" method="post" action="<?=$PhpSelf?>?Action=AddSave">
	<input type="text" name="Name"/> 
	<?=$Select?>	
	<input type="submit" name="Submit" value="�ύ" />
	</form>
</td></tr>    

<?php
	//exit;
	}

if($Action=="AddSave"){	
	$_POST['Name']=safecover($_POST['Name']);
	$ParentCatagoryID=($_POST['ParentCatagoryID']==0)?$SC->getrootid():$_POST['ParentCatagoryID'];
	if($SC->addsort($ParentCatagoryID,$_POST['Name'])){
		$SC->referto("�ɹ������µ����","{$PhpSelf}?Action=Show",3);
		}else{
		$SC->referto("�����µ����ʧ����","{$PhpSelf}?Action=Show",3);
		}
	//exit;
	}

if($Action=="EditSave"){
	$name=$_POST['Name'];
	//���±༭����,����Ķ���λ�����ƶ����,�����Խ�������ƶ������������
	$Query="UPDATE `".$SC->tablefix."` SET `Name`='$name' WHERE `CatagoryID`={$_POST['CatagoryID']} LIMIT 1";
	
	$db->query($Query);
	$Children=$SC->getcatagory($_POST['CatagoryID'],2);
	foreach($Children as $v){
		$IDS[]=$v['CatagoryID'];
		}
	if(in_array($_POST['ParentCatagoryID'],$IDS)){
		$SC->referto("�����ƶ��������","{$PhpSelf}?Action=Edit&CatagoryID={$_POST['CatagoryID']}",3);
		}else{
		if($SC->movecatagory($_POST['CatagoryID'],$_POST['ParentCatagoryID'])){
			$SC->referto("�ɹ��༭���","{$PhpSelf}?Action=Show",3);
			}
		}
	
	}

?>
</table>
</body></html>