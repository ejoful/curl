<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:11
 */

/*
(PHP 5 >= 5.5.0, PHP 7)
curl_escape �� ʹ�� URL ����������ַ���

˵��

string curl_escape ( resource $ch , string $str )
�ú���ʹ�� URL ����? RFC 3986����������ַ�����

����

ch
�� curl_init() ���ص� cURL �����

str
��Ҫ������ַ���

����ֵ

���ر������ַ��� ������ʧ��ʱ���� FALSE��
 */

// ����һ�� curl ���
$ch = curl_init();

// �ѱ������ַ�������һ�� GET ����
$location = curl_escape($ch, 'Hofbr?uhaus / M��nchen');
// ����� Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// �ñ���õ��ַ�����װһ�� URL
$url = "http://example.com/add_location.php?location={$location}";
// ����� http://example.com/add_location.php?location=Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// ���� HTTP ���󲢹رվ��
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);







