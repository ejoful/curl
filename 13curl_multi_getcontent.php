<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:58
 */

/*
(PHP 5, PHP 7)
curl_multi_getcontent — 如果设置了CURLOPT_RETURNTRANSFER，则返回获取的输出的文本流

说明

string curl_multi_getcontent ( resource $ch )
如果CURLOPT_RETURNTRANSFER作为一个选项被设置到一个具体的句柄，那么这个函数将会以字符串的形式返回那个cURL句柄获取的内容。

参数

ch
由 curl_init() 返回的 cURL 句柄。

返回值

如果设置了CURLOPT_RETURNTRANSFER，则返回获取的输出的文本流。
 */

$ch = curl_init('http://www.hao123.com/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$a = curl_exec($ch);
$b = curl_multi_getcontent($ch);
var_dump($a === $b);
curl_close($ch);





















