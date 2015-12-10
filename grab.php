<?php
/** curl ��ȡ https ����
 * @param String $url        �����url
 * @param Array  $data       Ҫ�l�͵Ĕ���
 * @param Array  $header     ����ʱ���͵�header
 * @param int    $timeout    ��ʱʱ�䣬Ĭ��30s
 */
function curl_https($url, $data=array(), $header=array(), $timeout=30){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // ����֤����
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  // ��֤���м��SSL�����㷨�Ƿ����
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    curl_setopt($ch, CURLOPT_POST, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

    $response = curl_exec($ch);

    if($error=curl_error($ch)){
        die($error);
    }

    curl_close($ch);

    return $response;

}

// ����
$url = "https://www.taobao.com/";
//$url = "http://club.topsage.com";
//$data = array('name'=>'fdipzone');
$data = array();
$header = array();

$response = curl_https($url, $data, $header, 5);

echo $response;

