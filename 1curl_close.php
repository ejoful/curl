<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 9:49
 *
 */

/*
(PHP 4 >= 4.0.2, PHP 5, PHP 7)
curl_close �� �ر�һ��cURL�Ự

˵��

void curl_close ( resource $ch )
�ر�һ��cURL�Ự�����ͷ�������Դ��cURL���ch Ҳ�ᱻ�ͷš�

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

û�з���ֵ��
 */


// ����һ����cURL��Դ
$ch = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// ץȡURL���������ݸ������
curl_exec($ch);

// �ر�cURL��Դ�������ͷ�ϵͳ��Դ
curl_close($ch);
