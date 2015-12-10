<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/7
 * Time: 10:26
 */

// 地址
$url = "127.0.0.1";
// 账号
$user = 'root';
// 密码
$password = "root";
// 连接
$con = mysql_connect($url, $user, $password) or die("数据错误!"); ;

// 数据库
$database = 'taobao_data';
// 连接数据库
mysql_select_db($database);
// 设置编码
mysql_query("set names 'utf8'");






