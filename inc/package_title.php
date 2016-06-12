<?php
/***输入套餐二级id,--------如果存在限制数字out_num，则取出out_num条记录，不进行分页等操作，用于****/
function package($class='',$out_num=''){
	
	if ($class!='') {
		$sql_str='where class='.$class;
	}else {
		$sql_str='';
	}
	
	
	
	if ($out_num!='') {
		$page_num=0;
		$nShowNum=$out_num;
	}else{
		if($_GET['page'])
       {
	      $page=$_GET['page'];
	       $page=(int)$page;
         }else {
	    $page=1;
         }
$nShowNum=12;  //显示条数
$sql="select productid from gplat_package $sql_str GROUP BY productName ";    //根据父一级ID号，查询出总条数
$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum; 
		
	}
	
	
	        //取出当前
$sql_p="select * from gplat_package $sql_str GROUP BY productName order by productid desc limit $page_num,$nShowNum";
$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
	
		if ($data_p['issale']!=1) {
				$price='会员价：<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].' 元</span>';
			}else { $price='促销价：<span style="background-color:#060; color:#FFF; ">'.$data_p['sale'].' 元</span>'; }	
	
	
	$content_p.='<div style="float:left;" id="productsindex"><div style="border:#CCC 1px solid; width:160px; height:160px;"><a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank"><img src="userfiles/'.$img.'" width="160" height="160" /></a></div>
            <span style="display:none">'.$data_p['productNum'].'<br /></span>
			<a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank">
'.$data_p['productName'].'</a><br />
市场价格：<s>'.$data_p['mPrice'].' 元</s><br />
'.$price.'
<span style="display:none">
<br><a href="buy_1.php?id='.$data_p['productid'].'" target="_blank"><img src="templates/default/images/taocan_22.jpg" width="64" height="22" border="0px"/></a>&nbsp;
<a href="favorites.php?packageid='.$data_p['productid'].'" onclick="return window.confirm(\'确定收藏?\')"><img src="templates/default/images/taocan_24.jpg" width="64" height="22" /></a>
</span>
</div>
';
}
if ($out_num=='') {
		include ( "admin/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // 假设记录总数为1000
$intShowNum  = NEWS_VIEW_NUM ;   // 每页显示记录数目
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'总页数:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">首页</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">上一页</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">下一页</a>&nbsp;&nbsp; '
.'分页条:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*返回总的记录数和分页内容*/
}

return $content_p;
}


/**根据商品二级套餐的id号，查询出相关联的套餐列表**第一参数二级套餐的id，第二个是in( 二级套餐的id) 第三个是新品参数**/
 function package_product($class='',$content_class='',$news=''){
	 if($class=='' or $news!=''){
		 if($_GET['page'])
       {
	      $page=$_GET['page'];
	       $page=(int)$page;
         }else {
	    $page=1;
         }
         if ($news!='') {
         	$sql_str="where news=1";
         }else { $sql_str='';}
		 
		 if($content_class!=''){
			 $sql_str="where class in ($content_class)";
		 }

$nShowNum=12;  //显示条数
$sql="select productid from gplat_package $sql_str";    //根据父一级ID号，查询出总条数

$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum; //取出当前
$sql_p="select * from gplat_package $sql_str order by productid desc limit $page_num,$nShowNum";
$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
			
	if ($data_p['issale']!=1) {
				$price='会员价：<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].' 元</span>';
			}else { $price='促销价：<span style="background-color:#060; color:#FFF; ">'.$data_p['sale'].' 元</span>'; }	
			
	$content_p.='<div style="float:left;" id="productsindex"><div style="border:#CCC 1px solid; width:160px; height:160px;" target="_blank"><a href="taocan_view.php?id='.$data_p['productid'].'"><img src="userfiles/'.$img.'" width="160" height="160" /></a></div>
            <span style="display:none">'.$data_p['productNum'].'<br /></span>
			<a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank">
'.$data_p['productName'].'</a><br />
市场价格：<s>'.$data_p['mPrice'].' 元</s><br />
'.$price.'
<span style="display:none">
<br><a href="buy_1.php?id='.$data_p['productid'].'"><img src="templates/default/images/taocan_22.jpg" width="64" height="22" border="0px"/></a>&nbsp;
<a href="favorites.php?packageid='.$data_p['productid'].'"><img src="templates/default/images/taocan_24.jpg" width="64" height="22" /></a>
</span>
</div>
';
}
		include ( "admin/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // 假设记录总数为1000
$intShowNum  = NEWS_VIEW_NUM ;   // 每页显示记录数目
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'总页数:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">首页</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">上一页</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">下一页</a>&nbsp;&nbsp; '
.'分页条:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*返回总的记录数和分页内容*/


return $content_p;
		 
		 
		 }
		 
		 
if ($content_class=='') {
	$sql_c="select * from gplat_productclass2 where id=$class";	
$result_c=mysql_query($sql_c);
$data_c=mysql_fetch_assoc($result_c);
	$content=$data_c['s_class'];
	$content_lenght=strlen($content)-1;
	$content_class=substr($content,0,$content_lenght);
	 	 }	 

	if ($content_class=='') {
		return '无相关的套餐';
	}
    if($_GET['page'])
       {
	      $page=$_GET['page'];
	       $page=(int)$page;
         }else {
	    $page=1;
         }
$nShowNum=12;  //显示条数
$sql="select productid from gplat_package where class in ($content_class)";    //根据父一级ID号，查询出总条数
$result=mysql_query($sql);             //运行sql
$nCount=mysql_num_rows($result);       //统计总条数，用于分页  
$page_num=($page-1)*$nShowNum; //取出当前
$sql_p="select * from gplat_package where class in ($content_class) order by productid desc limit $page_num,$nShowNum";
$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
	$content_p.='<div style="float:left;" id="productsindex"><div style="border:#CCC 1px solid; width:160px; height:160px;"><a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank"><img src="userfiles/'.$img.'" width="160" height="160" /></a></div>
            '.$data_p['productNum'].'<br /><a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank">
'.$data_p['productName'].'</a><br />
市场价格：<s>'.$data_p['mPrice'].'</s><br />
会员价：<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].'</span>
<br><a href="buy_1.php?id='.$data_p['productid'].'"><img src="templates/default/images/taocan_22.jpg" width="64" height="22" border="0px"/></a>&nbsp;
<a href="favorites.php?packageid='.$data_p['productid'].'"><img src="templates/default/images/taocan_24.jpg" width="64" height="22" /></a></div>
';
}
		include ( "admin/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // 假设记录总数为1000
$intShowNum  = NEWS_VIEW_NUM ;   // 每页显示记录数目
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'总页数:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">首页</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">上一页</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">下一页</a>&nbsp;&nbsp; '
.'分页条:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*返回总的记录数和分页内容*/


return $content_p;
 }
 
?>