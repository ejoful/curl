<?php
/** curl 获取 https 请求
 * @param String $url        请求的url
 * @param Array  $data       要發送的數據
 * @param Array  $header     请求时发送的header
 * @param int    $timeout    超时时间，默认30s
 */
function curl_https($url, $data=array(), $header=array(), $timeout=30){
    $ch = curl_init();
	
	// 设置浏览器的特定header
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Connection: keep-alive",
        "Accept: textml,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Upgrade-Insecure-Requests: 1",
        "DNT:1",
        "Accept-Language: zh-CN,zh;q=0.8,en-GB;q=0.6,en;q=0.4,en-US;q=0.2",
		"Cookie: v=0; cna=OPruDr9WVF8CAdrwlTKqiwmu; _tb_token_=dI32oQpbARHxFa1; uc3=nk2=AmkbKafOx9I%3D&id2=UU8PbnneKzSx&vt3=F8dAScPjpr4xsmct3iY%3D&lg2=UtASsssmOIJ0bQ%3D%3D; existShop=MTQ0OTY1OTUwMQ%3D%3D; lgc=axianzia; tracknick=axianzia; sg=a19; skt=0810eea8bcc55c9f; _cc_=VT5L2FSpdA%3D%3D; tg=0; _l_g_=Ug%3D%3D; JSESSIONID=11FEBCD218A138C8E2F04FF9F17176E4; alitrackid=login.taobao.com; lastalitrackid=login.taobao.com; thw=cn; cookie2=2c3d2d38d838409bc21b7d13709bc92e; cookie1=U%2BItOIkoJQAKEBg7UNusLVWk5N%2Bjy%2B0nBH%2BLYA08k7o%3D; mt=ci=3_1; unb=277562651; t=b0a3c91155e801e35aae0e8ae99450e3; _nk_=axianzia; cookie17=UU8PbnneKzSx; _m_user_unitinfo_=center; _m_h5_tk=447ea4e2f9bf96bfd2a15aad3212c8a0_1449664366007; _m_h5_tk_enc=226e27ba223f5e31bfe365f61ea12fac; x=e%3D1%26p%3D*%26s%3D0%26c%3D0%26f%3D0%26g%3D0%26t%3D0; swfstore=286725; whl=-1%260%260%260; uc1=cookie14=UoWzUGIMplGqKg%3D%3D&existShop=false&cookie16=UIHiLt3xCS3yM2h4eKHS9lpEOw%3D%3D&cym=1&cookie21=VT5L2FSpdegghf4HyTgQPg%3D%3D&tag=1&cookie15=VT5L2FSpMGV7TQ%3D%3D&pas=0; l=AoSEcXE-9DaBL8EnwKoWV8-z1Bx2nagH; isg=C38D39C928C650A1023DD35769C67A86",
            ));
	
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);  // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
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

// 调用
$url = "https://www.taobao.com/";
$url = "https://s.taobao.com/search?q=BCD-293WB-S&ie=utf8&app=detailproduct&through=1&smToken=3708c8f26668467aa6699e808ed34de9&smSign=9OVLAg0qY%2F8vSBMyVXvAyA%3D%3D";
//$data = array('name'=>'fdipzone');
$data = array();
$header = array();

$response = curl_https($url, $data, $header, 5);

echo $response;