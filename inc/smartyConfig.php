<?php
/*smarty�����ļ����Լ�smarty��ʼ��*/

require 'libs/Smarty.class.php';   //����smarty��
$smarty = new Smarty;                //��ʼ��smarty
$smarty->compile_check = true;
$smarty->debugging = false;
define('__SITE_ROOT', ''); // ���û��б��
$smarty->template_dir = __SITE_ROOT . "templates/default";  //ģ����Ŀ¼
$smarty->compile_dir = __SITE_ROOT . "templates_c/";        //��ʱ�ļ�Ŀ¼
$smarty->config_dir = __SITE_ROOT . "configs/";             //
$smarty->cache_dir = __SITE_ROOT . "cache/";                //����Ŀ¼
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';
?>