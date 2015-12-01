<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 10:36
 *
 */

/*
(PHP 4 >= 4.0.3, PHP 5, PHP 7)
curl_errno — 返回最后一次的错误号

说明

int curl_errno ( resource $ch )
返回最后一次cURL操作的错误号。

参数

ch
由 curl_init() 返回的 cURL 句柄。

返回值

返回错误号或 0 (零) 如果没有错误发生。

*/

// 创建一个指向一个不存在的位置的cURL句柄
$ch = curl_init('http://404.php.net/');

// 执行
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

// 检查是否有错误发生
if(curl_errno($ch))
{
    echo 'Curl errorno: ' . curl_errno($ch);
    echo "<br>";
    echo 'Curl error: ' . curl_error($ch);
}

// 关闭句柄
curl_close($ch);