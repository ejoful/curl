<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:17
 */

/*
(PHP 4 >= 4.0.2, PHP 5, PHP 7)
curl_exec �� ִ��һ��cURL�Ự

˵��

mixed curl_exec ( resource $ch )
ִ�и�����cURL�Ự��

�������Ӧ���ڳ�ʼ��һ��cURL�Ự����ȫ����ѡ������ú󱻵��á�

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

�ɹ�ʱ���� TRUE�� ������ʧ��ʱ���� FALSE�� Ȼ������� CURLOPT_RETURNTRANSFERѡ����ã�����ִ�гɹ�ʱ�᷵��ִ�еĽ����ʧ��ʱ���� FALSE ��
 */

// ����һ��cURL��Դ
$ch = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// ץȡURL���������ݸ������
curl_exec($ch);

// �ر�cURL��Դ�������ͷ�ϵͳ��Դ
curl_close($ch);







