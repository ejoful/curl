<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 10:53
 */

/*
(PHP 5, PHP 7)
curl_copy_handle �� ����һ��cURL�������������ѡ��

˵��

resource curl_copy_handle ( resource $ch )
����һ��cURL�����������ͬ��ѡ�

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

����һ���µ�cURL�����
 */


// ����һ���µ�cURL��Դ
$ch = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch, CURLOPT_URL, 'http://www.163.com/');
curl_setopt($ch, CURLOPT_HEADER, 0);

// ���ƾ��
$ch2 = curl_copy_handle($ch);

// ץȡURL (http://www.example.com/) ���������ݸ������
curl_exec($ch2);

// �ر�cURL��Դ�������ͷ�ϵͳ��Դ
curl_close($ch2);
curl_close($ch);















