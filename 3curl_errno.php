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
curl_errno �� �������һ�εĴ����

˵��

int curl_errno ( resource $ch )
�������һ��cURL�����Ĵ���š�

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

���ش���Ż� 0 (��) ���û�д�������

*/

// ����һ��ָ��һ�������ڵ�λ�õ�cURL���
$ch = curl_init('http://404.php.net/');

// ִ��
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

// ����Ƿ��д�����
if(curl_errno($ch))
{
    echo 'Curl errorno: ' . curl_errno($ch);
    echo "<br>";
    echo 'Curl error: ' . curl_error($ch);
}

// �رվ��
curl_close($ch);