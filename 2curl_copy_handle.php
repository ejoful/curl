<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 10:53
 */

/*
(PHP 5, PHP 7)
curl_copy_handle — 复制一个cURL句柄和它的所有选项

说明

resource curl_copy_handle ( resource $ch )
复制一个cURL句柄并保持相同的选项。

参数

ch
由 curl_init() 返回的 cURL 句柄。

返回值

返回一个新的cURL句柄。
 */


// 创建一个新的cURL资源
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, 'http://www.163.com/');
curl_setopt($ch, CURLOPT_HEADER, 0);

// 复制句柄
$ch2 = curl_copy_handle($ch);

// 抓取URL (http://www.example.com/) 并把它传递给浏览器
curl_exec($ch2);

// 关闭cURL资源，并且释放系统资源
curl_close($ch2);
curl_close($ch);















