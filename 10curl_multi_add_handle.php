<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:22
 */


/*
(PHP 5, PHP 7)
curl_multi_add_handle �� ��curl������Ự����ӵ�����curl���

˵��

int curl_multi_add_handle ( resource $mh , resource $ch )
���� ch �����������Ựmh

����

mh
�� curl_multi_init() ���ص� cURL ��������

ch
�� curl_init() ���ص� cURL �����

����ֵ

�ɹ�ʱ����0��ʧ��ʱ����CURLM_XXX֮һ�Ĵ����롣
 */

// ����һ��cURL��Դ
$ch1 = curl_init();
$ch2 = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch1, CURLOPT_URL, "http://www.hao123.com/");
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_URL, "http://www.php.net/");
curl_setopt($ch2, CURLOPT_HEADER, 0);

// ����������cURL���
$mh = curl_multi_init();

// ����2�����
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$running=null;
// ִ����������
do {
    curl_multi_exec($mh,$running);
} while($running > 0);

// �ر�ȫ�����
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);































