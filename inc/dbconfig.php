<?php

/*���ݿ����õ������Ϣ*/
session_start();
$host='localhost';  //����
$user='root';   //�û���
$pass='';   //����
$db='d_daojiayoushu';   //���ݿ�
$cn=mysql_connect("$host","$user","$pass");
mysql_query("set names 'gbk'");
mysql_select_db("$db");
mysql_query("set sql_mode=''"); 

include('basicParameters.php');         //ƽ̨��������
$web_html_url='http://5.dmooo.com.cn/';  //���嵽��վ�ĸ�Ŀ¼�����ڹ��ﳵ�ķ��ؼ�������
?>