<?php
 //╧Щбкhtmlнд╪Ч
function htmlEncode($string) {  
    $string=trim($string); 
    $string=str_replace("&","&",$string); 
    $string=str_replace("''","''",$string); 
    $string=str_replace("&amp;","&",$string); 
    $string=str_replace("&quot;","",$string); 
    $string=str_replace("\"","",$string); 
    $string=str_replace("&lt;","<",$string); 
    $string=str_replace("<","<",$string); 
    $string=str_replace("&gt;",">",$string); 
    $string=str_replace(">",">",$string); 
    $string=str_replace("&nbsp;"," ",$string); 
    $string=nl2br($string); 
    return $string; 
}

?>