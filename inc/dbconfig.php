<?php

/*数据库配置的相关信息*/
session_start();
$host='localhost';  //主机
$user='root';   //用户名
$pass='';   //密码
$db='d_daojiayoushu';   //数据库
$cn=mysql_connect("$host","$user","$pass");
mysql_query("set names 'gbk'");
mysql_select_db("$db");
mysql_query("set sql_mode=''"); 

include('basicParameters.php');         //平台基本参数
$web_html_url='http://5.dmooo.com.cn/';  //定义到网站的根目录，用于购物车的返回继续购物
?>