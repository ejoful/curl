<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 10:45
 */

/*
(PHP 4 >= 4.0.3, PHP 5, PHP 7)
curl_error �� ����һ��������ǰ�Ự���һ�δ�����ַ���

˵��

string curl_error ( resource $ch )
����һ�����һ��cURL������ȷ���ı��Ĵ�����Ϣ��

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

���ش�����Ϣ�� '' (���ַ���) ���û���κδ�������
 */

// ����һ��ָ��һ�������ڵ�λ�õ�cURL���
$ch = curl_init('http://404.php.net');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($ch) == false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo '�������û���κδ���';
}

// �رվ��
curl_close($ch);











