<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:42
 */


/*
(PHP 5, PHP 7)
curl_multi_exec — 运行当前 cURL 句柄的子连接

说明

int curl_multi_exec ( resource $mh , int &$still_running )
处理在栈中的每一个句柄。无论该句柄需要读取或写入数据都可调用此方法。

参数

mh
由 curl_multi_init() 返回的 cURL 多个句柄。

still_running
一个用来判断操作是否仍在执行的标识的引用。

返回值

一个定义于 cURL 预定义常量中的 cURL 代码。

Note:
该函数仅返回关于整个批处理栈相关的错误。即使返回 CURLM_OK 时单个传输仍可能有问题。
 */


// 创建一对cURL资源
$ch1 = curl_init();
$ch2 = curl_init();

// 设置URL和相应的选项
curl_setopt($ch1, CURLOPT_URL, "http://lxr.php.net/");
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_URL, "http://www.php.net/");
curl_setopt($ch2, CURLOPT_HEADER, 0);

// 创建批处理cURL句柄
$mh = curl_multi_init();

// 增加2个句柄
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$active = null;
// 执行批处理句柄
do {
    $mrc = curl_multi_exec($mh, $active);
} while ($mrc == CURLM_CALL_MULTI_PERFORM);

while ($active && $mrc == CURLM_OK) {
    if (curl_multi_select($mh) != -1) {
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    }
}

// 关闭全部句柄
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);







































