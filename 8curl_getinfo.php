<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:35
 */


/*
(PHP 4 >= 4.0.4, PHP 5, PHP 7)
curl_getinfo �� ��ȡһ��cURL������Դ�������Ϣ

˵��

mixed curl_getinfo ( resource $ch [, int $opt = 0 ] )
��ȡ���һ�δ���������Ϣ��

����

ch
�� curl_init() ���ص� cURL �����

opt
����������������³���֮һ:

CURLINFO_EFFECTIVE_URL - ���һ����Ч��URL��ַ
CURLINFO_HTTP_CODE - ���һ���յ���HTTP����
CURLINFO_FILETIME - Զ�̻�ȡ�ĵ���ʱ�䣬����޷���ȡ���򷵻�ֵΪ��-1��
CURLINFO_TOTAL_TIME - ���һ�δ��������ĵ�ʱ��
CURLINFO_NAMELOOKUP_TIME - ���ƽ��������ĵ�ʱ��
CURLINFO_CONNECT_TIME - �������������ĵ�ʱ��
CURLINFO_PRETRANSFER_TIME - �ӽ������ӵ�׼��������ʹ�õ�ʱ��
CURLINFO_STARTTRANSFER_TIME - �ӽ������ӵ����俪ʼ��ʹ�õ�ʱ��
CURLINFO_REDIRECT_TIME - �������俪ʼǰ�ض�����ʹ�õ�ʱ��
CURLINFO_SIZE_UPLOAD - �ϴ�����������ֵ
CURLINFO_SIZE_DOWNLOAD - ��������������ֵ
CURLINFO_SPEED_DOWNLOAD - ƽ�������ٶ�
CURLINFO_SPEED_UPLOAD - ƽ���ϴ��ٶ�
CURLINFO_HEADER_SIZE - header���ֵĴ�С
CURLINFO_HEADER_OUT - ����������ַ���
CURLINFO_REQUEST_SIZE - ��HTTP�����������������Ĵ�С
CURLINFO_SSL_VERIFYRESULT - ͨ������CURLOPT_SSL_VERIFYPEER���ص�SSL֤����֤����Ľ��
CURLINFO_CONTENT_LENGTH_DOWNLOAD - ��Content-Length: field�ж�ȡ���������ݳ���
CURLINFO_CONTENT_LENGTH_UPLOAD - �ϴ����ݴ�С��˵��
CURLINFO_CONTENT_TYPE - �������ݵ�Content-Type:ֵ��NULL��ʾ������û�з�����Ч��Content-Type: header
����ֵ

��� opt �����ã����ַ�����ʽ��������ֵ�����򣬷��ط���һ����������Ԫ�صĹ�������(���Ƿֱ��Ӧ�� opt):

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

// ����һ��cURL���
$ch = curl_init('http://www.yahoo.com/');

// ִ��
curl_exec($ch);

// ����Ƿ��д�����
if(!curl_errno($ch))
{
    $info = curl_getinfo($ch);

    echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url'];
}

// Close handle
curl_close($ch);

















