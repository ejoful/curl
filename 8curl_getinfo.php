<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:35
 */


/*
(PHP 4 >= 4.0.4, PHP 5, PHP 7)
curl_getinfo — 获取一个cURL连接资源句柄的信息

说明

mixed curl_getinfo ( resource $ch [, int $opt = 0 ] )
获取最后一次传输的相关信息。

参数

ch
由 curl_init() 返回的 cURL 句柄。

opt
这个参数可能是以下常量之一:

CURLINFO_EFFECTIVE_URL - 最后一个有效的URL地址
CURLINFO_HTTP_CODE - 最后一个收到的HTTP代码
CURLINFO_FILETIME - 远程获取文档的时间，如果无法获取，则返回值为“-1”
CURLINFO_TOTAL_TIME - 最后一次传输所消耗的时间
CURLINFO_NAMELOOKUP_TIME - 名称解析所消耗的时间
CURLINFO_CONNECT_TIME - 建立连接所消耗的时间
CURLINFO_PRETRANSFER_TIME - 从建立连接到准备传输所使用的时间
CURLINFO_STARTTRANSFER_TIME - 从建立连接到传输开始所使用的时间
CURLINFO_REDIRECT_TIME - 在事务传输开始前重定向所使用的时间
CURLINFO_SIZE_UPLOAD - 上传数据量的总值
CURLINFO_SIZE_DOWNLOAD - 下载数据量的总值
CURLINFO_SPEED_DOWNLOAD - 平均下载速度
CURLINFO_SPEED_UPLOAD - 平均上传速度
CURLINFO_HEADER_SIZE - header部分的大小
CURLINFO_HEADER_OUT - 发送请求的字符串
CURLINFO_REQUEST_SIZE - 在HTTP请求中有问题的请求的大小
CURLINFO_SSL_VERIFYRESULT - 通过设置CURLOPT_SSL_VERIFYPEER返回的SSL证书验证请求的结果
CURLINFO_CONTENT_LENGTH_DOWNLOAD - 从Content-Length: field中读取的下载内容长度
CURLINFO_CONTENT_LENGTH_UPLOAD - 上传内容大小的说明
CURLINFO_CONTENT_TYPE - 下载内容的Content-Type:值，NULL表示服务器没有发送有效的Content-Type: header
返回值

如果 opt 被设置，以字符串形式返回它的值。否则，返回返回一个包含下列元素的关联数组(它们分别对应于 opt):

"url"
"content_type"
"http_code"
"header_size"
"request_size"
"filetime"
"ssl_verify_result"
"redirect_count"
"total_time"
"namelookup_time"
"connect_time"
"pretransfer_time"
"size_upload"
"size_download"
"speed_download"
"speed_upload"
"download_content_length"
"upload_content_length"
"starttransfer_time"
"redirect_time"
 */

// 创建一个cURL句柄
$ch = curl_init('http://www.yahoo.com/');

// 执行
curl_exec($ch);

// 检查是否有错误发生
if(!curl_errno($ch))
{
    $info = curl_getinfo($ch);

    echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
}

// Close handle
curl_close($ch);

















