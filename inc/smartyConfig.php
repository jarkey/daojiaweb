<?php
/*smarty配置文件，以及smarty初始化*/

require 'libs/Smarty.class.php';   //包含smarty类
$smarty = new Smarty;                //初始化smarty
$smarty->compile_check = true;
$smarty->debugging = false;
define('__SITE_ROOT', ''); // 最后没有斜线
$smarty->template_dir = __SITE_ROOT . "templates/default";  //模板存放目录
$smarty->compile_dir = __SITE_ROOT . "templates_c/";        //临时文件目录
$smarty->config_dir = __SITE_ROOT . "configs/";             //
$smarty->cache_dir = __SITE_ROOT . "cache/";                //缓存目录
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';
?>