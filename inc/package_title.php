<?php
/***�����ײͶ���id,--------���������������out_num����ȡ��out_num����¼�������з�ҳ�Ȳ���������****/
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
$nShowNum=12;  //��ʾ����
$sql="select productid from gplat_package $sql_str GROUP BY productName ";    //���ݸ�һ��ID�ţ���ѯ��������
$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum; 
		
	}
	
	
	        //ȡ����ǰ
$sql_p="select * from gplat_package $sql_str GROUP BY productName order by productid desc limit $page_num,$nShowNum";
$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
	
		if ($data_p['issale']!=1) {
				$price='��Ա�ۣ�<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].' Ԫ</span>';
			}else { $price='�����ۣ�<span style="background-color:#060; color:#FFF; ">'.$data_p['sale'].' Ԫ</span>'; }	
	
	
	$content_p.='<div style="float:left;" id="productsindex"><div style="border:#CCC 1px solid; width:160px; height:160px;"><a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank"><img src="userfiles/'.$img.'" width="160" height="160" /></a></div>
            <span style="display:none">'.$data_p['productNum'].'<br /></span>
			<a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank">
'.$data_p['productName'].'</a><br />
�г��۸�<s>'.$data_p['mPrice'].' Ԫ</s><br />
'.$price.'
<span style="display:none">
<br><a href="buy_1.php?id='.$data_p['productid'].'" target="_blank"><img src="templates/default/images/taocan_22.jpg" width="64" height="22" border="0px"/></a>&nbsp;
<a href="favorites.php?packageid='.$data_p['productid'].'" onclick="return window.confirm(\'ȷ���ղ�?\')"><img src="templates/default/images/taocan_24.jpg" width="64" height="22" /></a>
</span>
</div>
';
}
if ($out_num=='') {
		include ( "admin/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = NEWS_VIEW_NUM ;   // ÿҳ��ʾ��¼��Ŀ
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '
.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*�����ܵļ�¼���ͷ�ҳ����*/
}

return $content_p;
}


/**������Ʒ�����ײ͵�id�ţ���ѯ����������ײ��б�**��һ���������ײ͵�id���ڶ�����in( �����ײ͵�id) ����������Ʒ����**/
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

$nShowNum=12;  //��ʾ����
$sql="select productid from gplat_package $sql_str";    //���ݸ�һ��ID�ţ���ѯ��������

$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum; //ȡ����ǰ
$sql_p="select * from gplat_package $sql_str order by productid desc limit $page_num,$nShowNum";
$result_p=mysql_query($sql_p);
while ($data_p=mysql_fetch_assoc($result_p)) {
	if($data_p['img']==''){
		$img='index_product.gif';
		}else{
			$img=$data_p['img'];
			}
			
	if ($data_p['issale']!=1) {
				$price='��Ա�ۣ�<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].' Ԫ</span>';
			}else { $price='�����ۣ�<span style="background-color:#060; color:#FFF; ">'.$data_p['sale'].' Ԫ</span>'; }	
			
	$content_p.='<div style="float:left;" id="productsindex"><div style="border:#CCC 1px solid; width:160px; height:160px;" target="_blank"><a href="taocan_view.php?id='.$data_p['productid'].'"><img src="userfiles/'.$img.'" width="160" height="160" /></a></div>
            <span style="display:none">'.$data_p['productNum'].'<br /></span>
			<a href="taocan_view.php?id='.$data_p['productid'].'" target="_blank">
'.$data_p['productName'].'</a><br />
�г��۸�<s>'.$data_p['mPrice'].' Ԫ</s><br />
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
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = NEWS_VIEW_NUM ;   // ÿҳ��ʾ��¼��Ŀ
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '
.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*�����ܵļ�¼���ͷ�ҳ����*/


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
		return '����ص��ײ�';
	}
    if($_GET['page'])
       {
	      $page=$_GET['page'];
	       $page=(int)$page;
         }else {
	    $page=1;
         }
$nShowNum=12;  //��ʾ����
$sql="select productid from gplat_package where class in ($content_class)";    //���ݸ�һ��ID�ţ���ѯ��������
$result=mysql_query($sql);             //����sql
$nCount=mysql_num_rows($result);       //ͳ�������������ڷ�ҳ  
$page_num=($page-1)*$nShowNum; //ȡ����ǰ
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
�г��۸�<s>'.$data_p['mPrice'].'</s><br />
��Ա�ۣ�<span style="background-color:#F00; color:#FFF; ">'.$data_p['memberPrice'].'</span>
<br><a href="buy_1.php?id='.$data_p['productid'].'"><img src="templates/default/images/taocan_22.jpg" width="64" height="22" border="0px"/></a>&nbsp;
<a href="favorites.php?packageid='.$data_p['productid'].'"><img src="templates/default/images/taocan_24.jpg" width="64" height="22" /></a></div>
';
}
		include ( "admin/lib/BluePage.class.php" );
$pBP = new BluePage ;
$intCount    = $nCount ; // �����¼����Ϊ1000
$intShowNum  = NEWS_VIEW_NUM ;   // ÿҳ��ʾ��¼��Ŀ
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ; 

$page='<div class="BPbar" id="pageDiv" style="clear:both; margin-top:15px;">'.'��ҳ��:<a href="'.$aPDatas['m_ln'].'">'.$aPDatas['m'].'</a>&nbsp;&nbsp; '
.'<a href="'.$aPDatas['f_ln'].'">��ҳ</a>&nbsp;&nbsp;'
.'<a href="'.$aPDatas['p_ln'].'">��һҳ</a>&nbsp;&nbsp;' 
.'<a href="'.$aPDatas['n_ln'].'">��һҳ</a>&nbsp;&nbsp; '
.'��ҳ��:<a href="'.$aPDatas['pg_ln'].'">[<<]</a>';
	foreach ( $aPDatas['bar'] as $aBar ) 
	{
        $page_w.='<a href="'.$aBar[ln].'">'.'['.$aBar[num].']</a> ' ;
	}
        $page_w.='<a href="'.$aPDatas['ng_ln'].'">[>>]</a></div>';
        $content_p=$content_p.$page.$page_w;
		/*�����ܵļ�¼���ͷ�ҳ����*/


return $content_p;
 }
 
?>