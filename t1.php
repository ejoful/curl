<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/8
 * Time: 16:21
 */
$url = "https://s.taobao.com/search?q=BCD-293WB-S&ie=utf8&app=detailproduct&through=1";

//$url = "https://www.hao123.com";

//$htmlstr = get_html("http://detail.tmall.com/item.htm?id=41159437194");
//echo $htmlstr;

//$htmlstr = request_url($url);
//echo $htmlstr;

//$htmlstr = get('http://tieba.baidu.com/p/3381012362');
//echo $htmlstr;

getTaoBaoHtml($url);
//if($htmlstr) {
//    echo $htmlstr;
//} else {
//    echo "lfk;sdjf";
//}




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




/**
 * 根据地址抓取淘宝页面html代码
 * @param type $url 地址
 * @return boolean
 */
function getTaoBaoHtml($url) {
    if (empty($url)) {
        return false;
    }
    $ch = curl_init();
    // 设置 url
    curl_setopt($ch, CURLOPT_URL, $url);
    // 设置浏览器的特定header
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Host: s.taobao.com",
        "Connection: keep-alive",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Upgrade-Insecure-Requests: 1",
        "DNT:1",
        "Accept-Language: zh-CN,zh;q=0.8,en-GB;q=0.6,en;q=0.4,en-US;q=0.2",
        "Cookie:cna=ecujDgxJEU8CAdrwlTLMuyK+; thw=cn; miid=7140089985405878683; v=0; alitrackid=www.taobao.com; lastalitrackid=login.taobao.com; _m_user_unitinfo_=center; swfstore=215194; uc3=nk2=AmkbKafOx9I%3D&id2=UU8PbnneKzSx&vt3=F8dAScPgs6rESw5%2BNVI%3D&lg2=Vq8l%2BKCLz3%2F65A%3D%3D; existShop=MTQ0OTU2NTEzOQ%3D%3D; lgc=axianzia; tracknick=axianzia; mt=np=&ci=3_1; skt=f2c6c4105e77cbd0; _cc_=UIHiLt3xSw%3D%3D; tg=0; _tb_token_=oaE7Go2oUk7Z962; whl=-1%260%260%261449568422819; cookie2=1c57c14d607abb81e85c05679f007c46; t=441f8ce4777a72bb7ea38953b39d0d4c; JSESSIONID=ECBB6328A062EBBE896A5C9B854D5334; _m_h5_tk=11e2be3c504d361fb530c7a1f447a5ca_1449634740417; _m_h5_tk_enc=636ea452721ecb60b7ecb1744c653678; l=AiUlE8sXvkMEjUFIkjKHa0NWte9eVdn0; x=e%3D1%26p%3D*%26s%3D0%26c%3D0%26f%3D0%26g%3D0%26t%3D0%26__ll%3D-1%26_ato%3D0; uc1=cookie14=UoWzUGIL8UVUmQ%3D%3D; isg=42486C6A8F68C6883C8B398697F593BC",

    ));
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36');
    // 在HTTP请求头中"Referer: "的内容。
    curl_setopt($ch, CURLOPT_REFERER,"https://s.taobao.com/search?q=BCD-293WB-S&ie=utf8&app=detailproduct&through=1");
    curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, sdch");
    // 页面内容我们并不需要
    //curl_setopt($ch, CURLOPT_NOBODY, 0);
    // 只需返回HTTP header
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    // 返回结果，而不是输出它
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //ob_start();
    curl_exec($ch);
//    $html = ob_get_contents();
//    ob_end_clean();
    curl_close($ch);
//    return $html;
}









//
//
//
//// php curl 添加cookie伪造登陆抓取数据    http://blog.csdn.net/clh604/article/details/38759779
//
//
//header("Content-type:text/html;Charset=utf8");
//$ch =curl_init();
//curl_setopt($ch,CURLOPT_URL,'http://www.hao123.com');
//
//$header = array();
////curl_setopt($ch,CURLOPT_POST,true);
////curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//curl_setopt($ch,CURLOPT_HEADER,true);
//curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
//curl_setopt($ch,CURLOPT_COOKIE,'B=115.100.62.7.1401937092035530; bdshare_firstime=1401937092199; __myutma=122328856.1548793539.1401937093.1408503164.1408694138.69;');
//
//
//$content = curl_exec($ch);
//
//echo "<pre>";print_r(curl_error($ch));echo "</pre>";
//echo "<pre>";print_r(curl_getinfo($ch));echo "</pre>";
//echo "<pre>";print_r($header);echo "</pre>";
//echo "</br>",$content;
//
//
//
//
//
//
//









