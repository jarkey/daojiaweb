<?php include_once('../inc/config.inc.php'); ?>
<?php 
$strWrite = "";
$Action = $_GET['Action'];
$QId = $_GET['QId'];
$SId = $_GET['SId'];

If ($Action=="Province")
{
	$strWrite="<select name='Province' style='width:100px;height:19px' onChange='GetCityText(this.options[this.selectedIndex].value,0);'>";
	$strWrite=$strWrite."<option value='' selected>省份</option>";
	if($QId!='')
	{
	    $sql="SELECT Id,CityID,CityName FROM gplat_area_new WHERE ParentId = '".$QId."' ORDER BY CityID";
		//echo $sql;
        $result=mysql_query($sql);
        while ($data=mysql_fetch_assoc($result)) {    //循环
        	//$SId=;
        	
			If(trim($SId)==$data['CityID'])
			{
				$strWrite=$strWrite."<option value='".$data['CityID']."' selected>".$data['CityName']."</option>";
			}else{
				$strWrite=$strWrite."<option value='".$data['CityID']."'>".$data['CityName']."</option>";
			}
		}
	}
	$strWrite=$strWrite."</select>";
    $strWrite=iconv('GBK','UTF-8',$strWrite);
	echo ($strWrite);
}

If ($Action=="City")
{
	$strWrite="&nbsp;<select name='City' style='width:100px;height:19px' onChange='GetCountyText(this.options[this.selectedIndex].value,0);'>";
	$strWrite=$strWrite."<option value='' selected>地级市</option>";
	If($QId<>"")
	{
	    $sql="SELECT Id,CityID,CityName FROM gplat_area_new WHERE ParentId = '".$QId."' ORDER BY CityID";
        $result=mysql_query($sql);	
        while ($data=mysql_fetch_assoc($result)) {    //循环
			If (trim($SId)==trim($data['CityID']))
			{
				$strWrite=$strWrite."<option value='".$data['CityID']."' selected>".$data['CityName']."</option>";
			}else{
				$strWrite=$strWrite."<option value='".$data['CityID']."'>".$data['CityName']."</option>";
			}
		}
	}
	$strWrite=$strWrite."</select>";
    $strWrite=iconv('GBK','UTF-8',$strWrite);
	echo ($strWrite);
}

If ($Action=="County")
{
	$strWrite="&nbsp;<select name='County' style='width:100px;height:19px'>";
	$strWrite=$strWrite."<option value='' selected>县级市、县</option>";
	If ($QId<>"")
	{
	    $sql="SELECT Id,CityID,CityName FROM gplat_area_new WHERE ParentId = '".$QId."' ORDER BY CityID";
        $result=mysql_query($sql);	
        while ($data=mysql_fetch_assoc($result)) {    //循环
			If (trim($SId)==trim($data['CityID']))
			{
				$strWrite=$strWrite."<option value='".$data['CityID']."' selected>".$data['CityName']."</option>";
			}else{
				$strWrite=$strWrite."<option value='".$data['CityID']."'>".$data['CityName']."</option>";
			}
		}
	}
	$strWrite=$strWrite."</select>";
    $strWrite=iconv('GBK','UTF-8',$strWrite);
	echo ($strWrite);
}

?>