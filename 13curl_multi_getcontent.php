<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 14:58
 */

/*
(PHP 5, PHP 7)
curl_multi_getcontent �� ���������CURLOPT_RETURNTRANSFER���򷵻ػ�ȡ��������ı���

˵��

string curl_multi_getcontent ( resource $ch )
���CURLOPT_RETURNTRANSFER��Ϊһ��ѡ����õ�һ������ľ������ô��������������ַ�������ʽ�����Ǹ�cURL�����ȡ�����ݡ�

����

ch
�� curl_init() ���ص� cURL �����

����ֵ

���������CURLOPT_RETURNTRANSFER���򷵻ػ�ȡ��������ı�����
 */

$ch = curl_init('http://www.hao123.com/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$a = curl_exec($ch);
$b = curl_multi_getcontent($ch);
var_dump($a === $b);
curl_close($ch);





















