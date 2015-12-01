<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:11
 */

/*
(PHP 5 >= 5.5.0, PHP 7)
curl_escape — 使用 URL 编码给定的字符串

说明

string curl_escape ( resource $ch , string $str )
该函数使用 URL 根据? RFC 3986编码给定的字符串。

参数

ch
由 curl_init() 返回的 cURL 句柄。

str
需要编码的字符串

返回值

返回编码后的字符串 或者在失败时返回 FALSE。
 */

// 创建一个 curl 句柄
$ch = curl_init();

// 把编码后的字符串当做一个 GET 参数
$location = curl_escape($ch, 'Hofbr?uhaus / München');
// 结果： Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// 用编码好的字符串组装一个 URL
$url = "http://example.com/add_location.php?location={$location}";
// 结果： http://example.com/add_location.php?location=Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// 发送 HTTP 请求并关闭句柄
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);







