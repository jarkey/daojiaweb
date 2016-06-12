<?php
$sNation = $_POST['Nation'];     
$sProvince = $_POST['Province'];
$sCity = $_POST['City'];
$sCounty = $_POST['County'];
$select_1='<select name="Nation" style="width:100px;height:19px" onChange="GetProvinceText(this.options[this.selectedIndex].value,0);"><option value="">国家/地区</option>'; //echo

		  $sql="SELECT Id,CityID,CityName FROM gplat_area_new WHERE ParentId = '000000' ORDER By CityID";
          $result=mysql_query($sql);
		  while ($data=mysql_fetch_assoc($result)) { 
		  if ($sNation==$data['CityID']) {
			  $selected='selected';
			  }
		  $content_str.='<option value="'.$data['CityID'].'"' .$selected.'>'.$data['CityName'].'</option>';
		   $selected='';
		  
		  }
		  
		  $select_str='</select>
        <label id="ProvinceText">
        <select name="Province" style="width:100px;height:19px">
          <option value="" selected>省份</option>
        </select>
        </label>
        <label id="CityText">
        <select name="City" style="width:100px;height:19px">
          <option value="" selected>地级市</option>
        </select>
        </label>
        <label id="CountyText">
        <select name="County" style="width:100px;height:19px">
          <option value="" selected>县级市、县</option>
        </select>
       </label>
	    &nbsp;&nbsp;<input name="address" type="text" style="margin-top:5px;" size="20"  />
	   <script language="javascript"><!--[CDATA[';




If ($sNation<>"") 
{ 
	If ($sProvince<>"")
	{
		$content_1="GetProvinceText(".$sNation.",".$sProvince.");";
	}else{
		$content_1="GetProvinceText(".$sNation.");";
	}
}

If ($sProvince<>"")
{
	If ($sCity<>"")
	{ 
		$content_2="GetCityText(".$sProvince.",".$sCity.");";
	}else{
		$content_2="GetCityText(".$sProvince.");";
	}
}

If ($sCity<>"")
{ 
	If ($sCounty<>"")
	{ 
		$content_3="GetCountyText(".$sCity.",".$sCounty.");";
	}else{
		$content_3="GetCountyText(".$sCity.");";
	}
}

$select3='//]]--></script>'; //echo
$content_all=$select_1.$content_str.$select_str.$content_1.$content_2.$content_3.$select3;
?>