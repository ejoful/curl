<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:42
 */


/*
(PHP 5, PHP 7)
curl_multi_exec �� ���е�ǰ cURL �����������

˵��

int curl_multi_exec ( resource $mh , int &$still_running )
������ջ�е�ÿһ����������۸þ����Ҫ��ȡ��д�����ݶ��ɵ��ô˷�����

����

mh
�� curl_multi_init() ���ص� cURL ��������

still_running
һ�������жϲ����Ƿ�����ִ�еı�ʶ�����á�

����ֵ

һ�������� cURL Ԥ���峣���е� cURL ���롣

Note:
�ú��������ع�������������ջ��صĴ��󡣼�ʹ���� CURLM_OK ʱ���������Կ��������⡣
 */


// ����һ��cURL��Դ
$ch1 = curl_init();
$ch2 = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch1, CURLOPT_URL, "http://lxr.php.net/");
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_URL, "http://www.php.net/");
curl_setopt($ch2, CURLOPT_HEADER, 0);

// ����������cURL���
$mh = curl_multi_init();

// ����2�����
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$active = null;
// ִ����������
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

// �ر�ȫ�����
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);







































