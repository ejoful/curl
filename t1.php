<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/8
 * Time: 16:21
 */
$url = "https://s.taobao.com/search?q=BCD-293WB-S&ie=utf8&app=detailproduct&through=1";
//$htmlstr = get_html("http://detail.tmall.com/item.htm?id=41159437194");
//echo $htmlstr;

//$htmlstr = request_url($url);
//echo $htmlstr;

//$htmlstr = get('http://tieba.baidu.com/p/3381012362');
//echo $htmlstr;

function get_html( $url )
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT,120);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//302redirect

    $content = curl_exec($ch);

    curl_close($ch);
    return $content;
}


function request_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //https 请求
    if(strlen($url) > 5 && strtolower(substr($url,0,5)) == "https" ) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    $reponse = curl_exec($ch);
    return $reponse;
}




function get($url, $timeOut = 15, $noback = 0)
{
    $timeOut = empty($timeOut) ? 0 : (int)$timeOut;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36");
//curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
//$this->curl_redir_exec($curl);
curl_setopt($curl, CURLOPT_TIMEOUT, $timeOut);
if ($noback) {
    curl_setopt($curl, CURLOPT_NOBODY, 1);
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$str = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
return $str;
}

















// php curl 添加cookie伪造登陆抓取数据    http://blog.csdn.net/clh604/article/details/38759779


header("Content-type:text/html;Charset=utf8");
$ch =curl_init();
curl_setopt($ch,CURLOPT_URL,'http://www.babytree.com/reg/login.php?url=http%3A%2F%2Fwww.babytree.com%2Fuser%2Fpicjournal.php');

$header = array();
//curl_setopt($ch,CURLOPT_POST,true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_COOKIE,'B=115.100.62.7.1401937092035530; bdshare_firstime=1401937092199; __myutma=122328856.1548793539.1401937093.1408503164.1408694138.69;');


$content = curl_exec($ch);

echo "<pre>";print_r(curl_error($ch));echo "</pre>";
echo "<pre>";print_r(curl_getinfo($ch));echo "</pre>";
echo "<pre>";print_r($header);echo "</pre>";
echo "</br>",$content;
















