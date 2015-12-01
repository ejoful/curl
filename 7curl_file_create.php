<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 11:22
 */

/*
(PHP 5 >= 5.5.0, PHP 7)
curl_file_create �� ����һ�� CURLFile ����

˵��

�˺����Ǹú����ı����� CURLFile::__construct()
 */

if (!function_exists('curl_file_create')) {
    function curl_file_create($filename, $mimetype = '', $postname = '') {
        return "@$filename;filename="
        . ($postname ?: basename($filename))
        . ($mimetype ? ";type=$mimetype" : '');
    }
}

