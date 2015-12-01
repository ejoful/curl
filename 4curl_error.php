<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 10:45
 */

/*
(PHP 4 >= 4.0.3, PHP 5, PHP 7)
curl_error — 返回一个保护当前会话最近一次错误的字符串

说明

string curl_error ( resource $ch )
返回一条最近一次cURL操作明确的文本的错误信息。

参数

ch
由 curl_init() 返回的 cURL 句柄。

返回值

返回错误信息或 '' (空字符串) 如果没有任何错误发生。
 */

// 创建一个指向一个不存在的位置的cURL句柄
$ch = curl_init('http://404.php.net');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($ch) == false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo '操作完成没有任何错误';
}

// 关闭句柄
curl_close($ch);











