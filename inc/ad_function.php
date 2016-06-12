<?php 

function flashAd1($fid,$num){
	$sql="select * from gplat_ad_add where fid=$fid order by id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($date=mysql_fetch_assoc($result))
	{
	 $flashAD.='<li _src="url(userfiles/'.$date['adTitlePic'].')" style="background:#fff center 0 no-repeat;background-size:100% 100%"><a  href="'.$date['addUrl'].'"></a></li>';
	}
	 return $flashAD;
}

function m_flashAd1($fid,$num){
	$sql="select * from gplat_ad_add where fid=$fid order by id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($date=mysql_fetch_assoc($result))
	{
	 $flashAD.='
	 <li><a href="'.$date['addUrl'].'"><img src="../userfiles/'.$date['adTitlePic'].'" /></a></li>';
	}
	 return $flashAD;
}

function flashAd2($fid,$num){
	$sql="select * from gplat_ad_add where fid=$fid order by id desc limit 0,$num";
	$result=mysql_query($sql);
	while ($date=mysql_fetch_assoc($result))
	{
	 $flashAD.='
	 <li><a href="'.$date['addUrl'].'"><img src="userfiles/'.$date['adTitlePic'].'" width="232" height="108" alt=""></a></li>';
	}
	 return $flashAD;
}

function flashAd3($fid,$start){
	$sql="select * from gplat_ad_add where fid=$fid order by id asc limit $start,1";
	$result=mysql_query($sql);
	$date=mysql_fetch_assoc($result);
	$img=$date['adTitlePic'];
	$url=$date['addUrl'];
	$a=array("img"=>$img,"url"=>$url);
     return $a;
	
}
?>