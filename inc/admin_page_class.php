<?php
$pBP = new BluePage ;
$intCount    = $num_all ; // �����¼����Ϊ1000
$intShowNum  = $num ;   // ÿҳ��ʾ����
$aPDatas   = $pBP->get( $intCount , $intShowNum ) ;
$strHtml   = $pBP->getHTML( $aPDatas ) ; 
?>