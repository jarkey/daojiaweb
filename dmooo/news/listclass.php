<?php 
include_once('mysql.php');
include_once('sortclass.php');
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
$Select.="<option value=\"0\">«Î—°‘Ò∏∏∑÷¿‡</option>";
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
?>