<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/9
 * Time: 18:34
 */



$htmlstr = get_html("https://s.taobao.com/search?q=BCD-293WB-S&ie=utf8&app=detailproduct&through=1");
echo $htmlstr;


function get_html( $url )
{
    $ch = curl_init();



    // 设置浏览器的特定header
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
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

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT,120);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//302redirect
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    $content = curl_exec($ch);

    if($content === false)
    {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);
    return $content;
}