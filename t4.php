<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/11
 * Time: 11:25
 */

$url = "https://store.taobao.com/shop/view_shop.htm?user_number_id=1134618424";
$ref = "https://detail.tmall.com/item.htm?id=43160516597&ad_id=&am_id=&cm_id=140105335569ed55e27b&pm_id=&_u=b88mh8r71af&abbucket=5";

$rate = get_rateinfo($url, $ref);

print_r($rate);

echo $rate[2][0];
/**
 * 返回描述相符、服务态度、物流服务分数
 */
function get_rateinfo( $shopLink, $referer)
{
    $ch = curl_init();

    // 设置浏览器的特定header
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Connection: keep-alive",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Upgrade-Insecure-Requests: 1",
        "DNT:1",
        "Accept-Language: zh-CN,zh;q=0.8,en-GB;q=0.6,en;q=0.4,en-US;q=0.2",
        "Cookie:cna=ecujDgxJEU8CAdrwlTLMuyK+; thw=cn; miid=7140089985405878683; _m_user_unitinfo_=center; uc2=wuf=https%3A%2F%2Fwww.baidu.com%2Flink%3Furl%3DyuLwEC5VzXl67TX71pM-Pt5ijrzvVp76FosboF3-bRXW_TIMHJDVmk32CWs6e7ra1SuZudckIhHttgRUS5bN_0MaK1Kv-zHpfr0mjFVBPh-Crtxj19HCnfLT8x4uC3p5%26wd%3D%26eqid%3Db1f8688b001197fa000000035668de3b; uc3=nk2=AmkbKafOx9I%3D&id2=UU8PbnneKzSx&vt3=F8dAScPiH8lvv%2FHL%2BUQ%3D&lg2=UIHiLt3xD8xYTw%3D%3D; lgc=axianzia; tracknick=axianzia; mt=np=&ci=3_1; _cc_=U%2BGCWk%2F7og%3D%3D; tg=0; v=0; uc1=cookie14=UoWzUGNqTOEvsA%3D%3D; cookie2=1ced5c4d4b6a7b1add0410eb06484e62; t=441f8ce4777a72bb7ea38953b39d0d4c; swfstore=120797; linezing_session=hMm9a7tS3qYHsL73Sj1tw2F3_1449797234940pw2h_2; _tb_token_=e335ee7876383; _m_h5_tk=aba0e734db020aa34adfd0514ecfd3c6_1449808809939; _m_h5_tk_enc=6c30d6dfe9563ec6b0df80acad26be4f; x=e%3D1%26p%3D*%26s%3D0%26c%3D0%26f%3D0%26g%3D0%26t%3D0%26__ll%3D-1%26_ato%3D0; l=AhgYtVan25wZHmxPB3HCKeCpaEiqAXyL; isg=E58CA9133C4A05BE6936C3EA5438AFC6",

    ));
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36');
    // 在HTTP请求头中"Referer: "的内容。
    curl_setopt($ch, CURLOPT_REFERER,"https:$referer");
    curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, sdch");

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $shopLink);
    curl_setopt($ch, CURLOPT_TIMEOUT,120);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//302redirect
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    $html = curl_exec($ch);

    curl_getinfo($ch, CURLINFO_HTTP_CODE);


    if($html === false)
    {
        echo 'Curl error: ' . curl_error($ch) . "<br>\n\r";
        curl_close($ch);
    } else {

        // 关闭句柄
        curl_close($ch);

        //正则表达式去除所有空格（包括换行 空格 &nbsp;）
        $html = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$html);

//        print_r($html);

        // 匹配描述相符、服务态度、物流服务分数
        //$pattern = '/<divclass="shop-rate"id="J_ShopRate2">.*?<ul><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><\/ul><\/div>/si';

        $pattern = '/<emclass="count"title="(.*?)分".*?<\/em>.*?<emclass="count"title="(.*?)分".*?<\/em>.*?<emclass="count"title="(.*?)分".*?<\/em>/';

        preg_match_all($pattern,$html,$result);

//        if (empty($result[0])) {
//            $pattern = '/<emclass="count"title="(.*?)".*?<\/em>.*?<emclass="count"title="(.*?)".*?<\/em>.*?<emclass="count"title="(.*?)".*?<\/em>.*?/';
//            preg_match_all($pattern,$html,$result);
//        }


        // 返回描述相符、服务态度、物流服务分数
        return $result;

    }

}


/**
 * 获取指定HTML标签的指定属性的值
 * @param source 要匹配的源文本
 * @param element 标签名称
 * @param attr 标签的属性名称
 * @return 属性值列表
 */
function match($source, $element, $attr) {
    $pattern = "<" . $element . "[^<>]*?\\s" . $attr . "=['\"]?(.*?)['\"]?\\s.*?>";
    //抓取json数据
    preg_match_all($pattern,$source,$result);
    return $result;
}






































