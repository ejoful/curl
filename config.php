<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/7
 * Time: 10:26
 */

// ��ַ
$url = "127.0.0.1";
// �˺�
$user = 'root';
// ����
$password = "root";
// ����
$con = mysql_connect($url, $user, $password) or die("���ݴ���!"); ;

// ���ݿ�
$database = 'taobao_data';
// �������ݿ�
mysql_select_db($database);
// ���ñ���
mysql_query("set names 'utf8'");






