<?php
/**
 * Short description.
 * ����ֵ���޷����㷨
 * ���ݿ���Ϊ
CREATE TABLE om_catagory (
    CatagoryID int(10) unsigned NOT NULL auto_increment,
	Name varchar(50) default '',
    Lft int(10) unsigned NOT NULL default '0',
    Rgt int(10) unsigned NOT NULL default '0',
    PRIMARY KEY (id),
    KEY lft (lft),
    KEY rgt (rgt)
)

 */
class sortclass
{


var $db;


var $tablefix;


function sortclass()
{
global $db;
$this->db=$db;
$this->tablefix="gplat_news_class";
} // end func

/**
 * Short description.
 * �����µķ���
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function addsort($CatagoryID,$SortName)
{
if($CatagoryID==0){
	$Lft=0;
	$Rgt=1;
	}else{
	$Result=$this->checkcatagory($CatagoryID);
	//ȡ�ø������ֵ,��ֵ
	$Lft=$Result['Lft'];
	$Rgt=$Result['Rgt'];
	$this->db->query("UPDATE `".$this->tablefix."` SET `Lft`=`Lft`+2 WHERE `Lft`>$Rgt");
	$this->db->query("UPDATE `".$this->tablefix."` SET `Rgt`=`Rgt`+2 WHERE `Rgt`>=$Rgt");
	}

//����
if($this->db->query("INSERT INTO `".$this->tablefix."` SET `Lft`='$Rgt',`Rgt`='$Rgt'+1,`Name`='$SortName'")){
	//$this->referto("�ɹ������µ����","JAVASCRIPT:HISTORY.BACK(1)",3);
	return 1;
	}else{
	//$this->referto("�����µ����ʧ����","JAVASCRIPT:HISTORY.BACK(1)",3);
	return -1;
	}
} // end func



function deletesort($CatagoryID)
{
//ȡ�ñ�ɾ����������ֵ,����Ƿ�������,����о�һ��ɾ��
$Result=$this->checkcatagory($CatagoryID);
$Lft=$Result['Lft'];
$Rgt=$Result['Rgt'];
//ִ��ɾ��
if($this->db->query("DELETE FROM `".$this->tablefix."` WHERE `Lft`>=$Lft AND `Rgt`<=$Rgt")){
	$Value=$Rgt-$Lft+1;
	//��������ֵ
	$this->db->query("UPDATE `".$this->tablefix."` SET `Lft`=`Lft`-$Value WHERE `Lft`>$Lft");
	$this->db->query("UPDATE `".$this->tablefix."` SET `Rgt`=`Rgt`-$Value WHERE `Rgt`>$Rgt");
	//$this->referto("�ɹ�ɾ�����","javascript:history.back(1)",3);
	return 1;
	}else{
	//$this->referto("ɾ�����ʧ����","javascript:history.back(1)",3);
	return -1;
	}
} // end func



/**
 * Short description.
 * 1,��������,�������Լ�;2�����Լ�����������;3�������Լ����и���4;�����Լ����и���
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function getcatagory($CatagoryID,$type=1)
{
$Result=$this->checkcatagory($CatagoryID);
$Lft=$Result['Lft'];
$Rgt=$Result['Rgt'];
$SeekSQL="SELECT * FROM `".$this->tablefix."` WHERE ";
switch ($type) {
    case "1":
		$condition="`Lft`>$Lft AND `Rgt`<$Rgt";
		break;
	case "2":
		$condition="`Lft`>=$Lft AND `Rgt`<=$Rgt";
		break;
    case "3":
    	$condition="`Lft`<$Lft AND `Rgt`>$Rgt";
    	break;
	case "4":
		$condition="`Lft`<=$Lft AND `Rgt`>=$Rgt";
		break;
	default :
		$condition="`Lft`>$Lft AND `Rgt`<$Rgt";
		;
	}
$SeekSQL.=$condition." ORDER BY `Lft` ASC";

$Sorts=$this->db->getrows($SeekSQL);

return $Sorts;
} // end func



function getparent($CatagoryID)
{
$Parent=$this->getcatagory($CatagoryID,3);
return $Parent;
} // end func
/**
 * Short description.
 * �ƶ���,�����������Ҳһ���ƶ�
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function movecatagory($SelfCatagoryID,$ParentCatagoryID)
{
$SelfCatagory=$this->checkcatagory($SelfCatagoryID);
$NewCatagory=$this->checkcatagory($ParentCatagoryID);

$SelfLft=$SelfCatagory['Lft'];
$SelfRgt=$SelfCatagory['Rgt'];
$Value=$SelfRgt-$SelfLft;
//ȡ�����з����ID�����������ֵ
$CatagoryIDS=$this->getcatagory($SelfCatagoryID,2);
foreach($CatagoryIDS as $v){
	$IDS[]=$v['CatagoryID'];
	}
$InIDS=implode(",",$IDS);

$ParentLft=$NewCatagory['Lft'];
$ParentRgt=$NewCatagory['Rgt'];
//print_r($InIDS);
//print_r($NewCatagory);
//print_r($SelfCatagory);
//exit;
if($ParentRgt>$SelfRgt){
	$UpdateLeftSQL="UPDATE `".$this->tablefix."` SET `Lft`=`Lft`-$Value-1 WHERE `Lft`>$SelfRgt AND `Rgt`<=$ParentRgt";
	$UpdateRightSQL="UPDATE `".$this->tablefix."` SET `Rgt`=`Rgt`-$Value-1 WHERE `Rgt`>$SelfRgt AND `Rgt`<$ParentRgt";
	$TmpValue=$ParentRgt-$SelfRgt-1;
	$UpdateSelfSQL="UPDATE `".$this->tablefix."` SET `Lft`=`Lft`+$TmpValue,`Rgt`=`Rgt`+$TmpValue WHERE `CatagoryID` IN($InIDS)";
	}else{
	$UpdateLeftSQL="UPDATE `".$this->tablefix."` SET `Lft`=`Lft`+$Value+1 WHERE `Lft`>$ParentRgt AND `Lft`<$SelfLft";
	$UpdateRightSQL="UPDATE `".$this->tablefix."` SET `Rgt`=`Rgt`+$Value+1 WHERE `Rgt`>=$ParentRgt AND `Rgt`<$SelfLft";
	$TmpValue=$SelfLft-$ParentRgt;
	$UpdateSelfSQL="UPDATE `".$this->tablefix."` SET `Lft`=`Lft`-$TmpValue,`Rgt`=`Rgt`-$TmpValue WHERE `CatagoryID` IN($InIDS)";
	}
$this->db->query($UpdateLeftSQL);
$this->db->query($UpdateRightSQL);
$this->db->query($UpdateSelfSQL);
//$this->referto("�ɹ��ƶ����","javascript:history.back(1)",3);
return 1;
} // end func

/**
 * Short description.
 *
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function checkcatagory($CatagoryID)
{
//��⸸��ID�Ƿ����
$SQL="SELECT * FROM `".$this->tablefix."` WHERE `CatagoryID`='$CatagoryID' LIMIT 1";
$Result=$this->db->getrow($SQL);
if(count($Result)<1){
	$this->referto("����ID������,����","javascript:history.back(1)",3);
	}
return $Result;
} // end func


/**
 * Short description.
 *
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function displaysort($CatagoryID, $Slice='|-') {
  $Output = '';
  $Result = $this->db->query('SELECT Lft, Rgt FROM `'.$this->tablefix.
                        '` WHERE `CatagoryID`='.$CatagoryID);
  if($Row = $this->db->fetch_array($Result)) {
  $Right = array();
  $Query = 'SELECT CatagoryID, Lft, Rgt FROM `'.$this->tablefix.
             '` WHERE Lft BETWEEN '.$Row['Lft'].' AND '.
             $Row['Rgt'].' ORDER BY Lft ASC';

  $Result = $this->db->query($Query);
    while ($Row = $this->db->fetch_array($Result)) {
      if (count($Right)>0) {
		while ($Right[count($Right)-1]<$Row['Rgt']) {
		array_pop($Right);
		}
     }
	$Output.=str_repeat($Slice,count($Right)).$Row['CatagoryID']."<br />";
    $Right[] = $Row['Rgt'];
    }
  }
  return $Output;
}


/**
 * Short description.
 *
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     array($Catagoryarray,$Deep)
 * @update     date time
*/
function sort2array($CatagoryID=0)
{
  $Output = array();
  if($CatagoryID==0){
	$CatagoryID=$this->getrootid();
	}
  if(empty($CatagoryID)){
	return array();
	exit;
	}
  $Result = $this->db->query('SELECT Lft, Rgt FROM `'.$this->tablefix.
                        '` WHERE `CatagoryID`='.$CatagoryID);
  
  if($Row = $this->db->fetch_array($Result)) {
  $Right = array();
  $Query = 'SELECT * FROM `'.$this->tablefix.
             '` WHERE Lft BETWEEN '.$Row['Lft'].' AND '.
             $Row['Rgt'].' ORDER BY Lft ASC';

  $Result = $this->db->query($Query);
    while ($Row = $this->db->fetch_array($Result)) {
      if (count($Right)>0) {
		while ($Right[count($Right)-1]<$Row['Rgt']) {
		array_pop($Right);
		}
     }
	$Output[]=array('Sort'=>$Row,'Deep'=>count($Right));
    $Right[] = $Row['Rgt'];
    }
  }
  return $Output;
} // end func


/**
 * Short description.
 *
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function getrootid()
{
$Query="SELECT * FROM`".$this->tablefix."` ORDER BY `Lft` ASC LIMIT 1";
$RootID=$this->db->getrow($Query);
if(count($RootID)>0){
	return $RootID['CatagoryID'];
	}else{
	return 0;
	}
} // end func
/**
 * Short description.
 *
 * Detail description
 * @param      none
 * @global     none
 * @since      1.0
 * @access     private
 * @return     void
 * @update     date time
*/
function referto($msg,$url,$sec)
{
	//echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">";
	echo "<meta http-equiv=refresh content=$sec;URL=$url>";
  	if(is_array($msg)){
	foreach($msg as $key=>$value){
		echo $key."=>".$value."<br>";
        }
        }else{
        echo $msg;
        }
   exit;
} // end func
} // end class

?>