<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:17
 */

/*
(PHP 4 >= 4.0.2, PHP 5, PHP 7)
curl_exec — 执行一个cURL会话

说明

mixed curl_exec ( resource $ch )
执行给定的cURL会话。

这个函数应该在初始化一个cURL会话并且全部的选项都被设置后被调用。

参数

ch
由 curl_init() 返回的 cURL 句柄。

返回值

成功时返回 TRUE， 或者在失败时返回 FALSE。 然而，如果 CURLOPT_RETURNTRANSFER选项被设置，函数执行成功时会返回执行的结果，失败时返回 FALSE 。
 */

// 创建一个cURL资源
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// 抓取URL并把它传递给浏览器
curl_exec($ch);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);







