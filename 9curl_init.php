<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:15
 */


/*
(PHP 4 >= 4.0.2, PHP 5, PHP 7)
curl_init �� ��ʼ��һ��cURL�Ự

˵��

resource curl_init ([ string $url = NULL ] )
��ʼ��һ���µĻỰ������һ��cURL�������curl_setopt(), curl_exec()��curl_close() ����ʹ�á�

����

url
����ṩ�˸ò�����CURLOPT_URL ѡ��ᱻ���ó����ֵ����Ҳ����ʹ��curl_setopt()�����ֶ����������ֵ��

����ֵ

����ɹ�������һ��cURL����������� FALSE��
 */


// ����һ����cURL��Դ
$ch = curl_init();

// ����URL����Ӧ��ѡ��
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// ץȡURL���������ݸ������
curl_exec($ch);

// �ر�cURL��Դ�������ͷ�ϵͳ��Դ
curl_close($ch);

























