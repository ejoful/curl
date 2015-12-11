<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/2
 * Time: 10:23
 */

require_once('./config.php');

echo "<pre>";


// 查看tb_product表中已有的商品数据nid
$sql = "SELECT * FROM `tb_product_list` WHERE `status` = 0";

$retval = mysql_query($sql, $con) or die(mysql_error());
if(!$retval)
{
    die('Could not connect: ' . mysql_error());
}
$row_list = [];
while ($one = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    $row_list[] = $one;
}


$id = 0;
$product_list = [];
foreach ($row_list as $row)
{

    print_r($row['model'].'---------------'. __LINE__ . "<br>\n\r");
    $product_list[$id] = $row;


    $result = [];
    $url = "https://s.taobao.com/search?q=" . $row['model'] . "&ie=utf8&app=detailproduct&through=1";
    for($i=0, $data = get_html($url, $row, $con), $products = $data[0]["products"], $page = $data[0]["totalPage"]; $i < $page; )
    {
//            print_r($products);
        echo   "<br>\n\r";
        print_r($url . "<br>\n\r");


        print_r($id.'------'. $i .'---------'. __LINE__ . "<br>\n\r");
        if(is_array($products)) {
            $result = array_merge($result, $products);
            if (count($result) > 440) {
                insert_database($result, $row['model'], $row['name'], $row['shundian_price'], $con);
                $result = [];
            }
        }
        print_r(count($result) . '---------------'. __LINE__ . "<br>\n\r");
        // 暂停30s
        sleep(5);

        ++$i;
        $url = "https://s.taobao.com/search?q=" . $row['model'] . "&ie=utf8&app=detailproduct&through=1&bcoffset=0&s=" . (44 * $i);
        $data = get_html($url, $row, $con);
        $products = $data[0]["products"];



    }

    if ($result) {
        insert_database($result, $row['model'], $row['name'], $row['shundian_price'], $con);

        // 成功插入的数据status设置为1
        $sql = "UPDATE `tb_product_list` SET `status` = '1' WHERE `id` = " . $row['id'];

        $retval = mysql_query($sql, $con);
        if(!$retval)
        {
            die('Could not connect: ' . mysql_error() . "   on line ".__LINE__."<br>\n\r");
        }
    }

    ++$id;
}


function get_html( $url, $row, $con )
{
    $ch = curl_init();



    // 设置浏览器的特定header
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Host: s.taobao.com",
        "Connection: keep-alive",
        "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
        "Upgrade-Insecure-Requests: 1",
        "DNT:1",
        "Accept-Language: zh-CN,zh;q=0.8,en-GB;q=0.6,en;q=0.4,en-US;q=0.2",
        "Cookie:cna=ecujDgxJEU8CAdrwlTLMuyK+; thw=cn; miid=7140089985405878683; _m_user_unitinfo_=center; v=0; alitrackid=www.taobao.com; swfstore=164423; uc2=wuf=https%3A%2F%2Fwww.baidu.com%2Flink%3Furl%3DyuLwEC5VzXl67TX71pM-Pt5ijrzvVp76FosboF3-bRXW_TIMHJDVmk32CWs6e7ra1SuZudckIhHttgRUS5bN_0MaK1Kv-zHpfr0mjFVBPh-Crtxj19HCnfLT8x4uC3p5%26wd%3D%26eqid%3Db1f8688b001197fa000000035668de3b; uc3=nk2=AmkbKafOx9I%3D&id2=UU8PbnneKzSx&vt3=F8dAScPiH8lvv%2FHL%2BUQ%3D&lg2=UIHiLt3xD8xYTw%3D%3D; existShop=MTQ0OTczNjI5Mw%3D%3D; lgc=axianzia; tracknick=axianzia; sg=a19; cookie2=18b3234c8a526abaa23707836bdb48db; mt=np=&ci=3_1; cookie1=U%2BItOIkoJQAKEBg7UNusLVWk5N%2Bjy%2B0nBH%2BLYA08k7o%3D; unb=277562651; skt=3815ab30afb05045; t=441f8ce4777a72bb7ea38953b39d0d4c; _cc_=U%2BGCWk%2F7og%3D%3D; tg=0; _l_g_=Ug%3D%3D; _nk_=axianzia; cookie17=UU8PbnneKzSx; uc1=cookie14=UoWzUGNgydE6eg%3D%3D&existShop=false&cookie16=URm48syIJ1yk0MX2J7mAAEhTuw%3D%3D&cym=1&cookie21=UIHiLt3xSi%2BtvZI3oKTk0Q%3D%3D&tag=1&cookie15=U%2BGCWk%2F75gdr5Q%3D%3D&pas=0; lastalitrackid=sec.taobao.com; _tb_token_=7838551b54eab; _m_h5_tk=75ed71e765ff08d7ffa6f07be4dbc4e4_1449744286222; _m_h5_tk_enc=bfdd680ef33e03310ba83a1c1d31628f; whl=-1%260%260%261449741955290; JSESSIONID=989207CF7BADC9D396083DB8A0A73BA2; x=e%3D1%26p%3D*%26s%3D0%26c%3D0%26f%3D0%26g%3D0%26t%3D0%26__ll%3D-1%26_ato%3D0; l=Ao2N3oQDxgssBflwOkrvPU3UHacHasE8; isg=DCF91E28ABE5379D9FB23BA07B707C10",





        ));
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0');
    // 在HTTP请求头中"Referer: "的内容。
    curl_setopt($ch, CURLOPT_REFERER,"https://s.taobao.com/search?q=" . $row['model'] . "&ie=utf8&app=detailproduct&through=1");
    curl_setopt($ch, CURLOPT_ENCODING, "gzip, deflate, sdch");

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT,120);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//302redirect
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

    $html = curl_exec($ch);



    if($html === false)
    {
        echo 'Curl error: ' . curl_error($ch) . "<br>\n\r";

        // 抓取出错的数据status设置为0
        $sql = "UPDATE `tb_product_list` SET `status` = '0' WHERE `id` = " . $row['id'];

        $retval = mysql_query($sql, $con);
        if(!$retval)
        {
            print_r('Could not connect: ' . mysql_error() . "   on line ".__LINE__."<br>\n\r");
        }

        return NULL;

    } else {
        //正则表达式去除所有空格（包括换行 空格 &nbsp;）
        $html = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$html);

        // 匹配js
        $pattern = '/<script>g_page_config=(.*?);g_srp_loadCss\(\).*?<\/script>/si';
        //抓取json数据
        preg_match_all($pattern,$html,$result);

        if (empty($result[1][0])) {
            //返回False
            return NULL;
        } else {

            // 将json转为数组
            $data = json_decode($result[1][0]);

            //    print_r($data);

            // g_page_config
            $res[0]["g_page_config"] = $result[1][0];
            // 获取商品数据
            $res[0]["products"] = $data->mods->itemlist->data->auctions;


            // 获取总页数
            $res[0]["totalPage"] = empty($data->mods->pager->data->totalPage) ? 2 : $data->mods->pager->data->totalPage;


            //返回json数据
            return $res;
        }
    }

    curl_close($ch);
}


function get($url)
{
    // 抓取$url指向的页面
    $html = file_get_contents($url);
    //正则表达式去除所有空格（包括换行 空格 &nbsp;）
    $html = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$html);

    // 匹配js
    $pattern = '/<script>g_page_config=(.*?);g_srp_loadCss\(\).*?<\/script>/si';
    //抓取json数据
    preg_match_all($pattern,$html,$result);

    if (empty($result[1][0])) {
        //返回False
        return NULL;
    } else {

        // 将json转为数组
        $data = json_decode($result[1][0]);

        //    print_r($data);

        // 获取商品数据
        $data = $data->mods->itemlist->data->auctions;

        //返回json数据
        return $data;
    }

}

//print_r(get($url));

//$data = get($url);

function insert_database($products, $model, $name, $shundian_price, $con)
{

    // 查看tb_product表中已有的商品数据nid
    $sql = "SELECT nid FROM `tb_product`";

    $retval = mysql_query($sql, $con);
    if(!$retval)
    {
        die("Could not connect: " . mysql_error() . "   on line ".__LINE__."<br>\n\r");
    }

    $product_ids = [];
    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
    {
        $product_ids[] = $row['nid'];
    }



//    print_r($product_ids);


    $data_string = '';
    foreach($products as $item)
    {
        if (!in_array($item->nid, $product_ids)) {

            $item->shopLink = 'https:' . $item->shopLink;
            $item->detail_url = 'https:' . $item->detail_url;


            $rate = get_rateinfo($item->shopLink,$item->detail_url);

//            print_r($rate);
//            echo "\n\r";die();

//            $des = $rate[1][0];
//            $des_com_aver = $rate[2][0];
//
//
//            $attitude = $rate[3][0];
//            $attitude_com_aver = $rate[4][0];
//
//            $quatity = $rate[5][0];
//            $quatity_com_aver = $rate[6][0];

            $des = $rate[1][0];
            $des_com_aver = $item->shopcard->description[2] / 100.0;
            $des_com_aver .= '%';
            if ($item->shopcard->description[1]) {
                $des_com_aver = '高于 ' . $des_com_aver;
            } else {
                $des_com_aver = '低于 ' . $des_com_aver;
            }


            $attitude = $rate[2][0];
            $attitude_com_aver = $item->shopcard->service[2] / 100.0;
            $attitude_com_aver .= '%';
            if ($item->shopcard->service[1] > 0) {
                $attitude_com_aver = '高于 ' . $attitude_com_aver;
            } else {
                $attitude_com_aver = '低于 ' . $attitude_com_aver;
            }

            $quatity = $rate[3][0];
            $quatity_com_aver = $item->shopcard->delivery[2] / 100.0;
            $quatity_com_aver .= '%';
            if ($item->shopcard->delivery[1]) {
                $quatity_com_aver = '高于 ' . $quatity_com_aver;
            } else {
                $quatity_com_aver = '低于 ' . $quatity_com_aver;
            }




            $credit = $item->shopcard->sellerCredit;
            $view_sales = intval($item->view_sales);
            if(!empty($item->comment_count))
            {
                $comment_count = $item->comment_count;
            } else {
                $comment_count = 0;
            }

            // 拼接product数据
            $data_string .= "(NULL, '$item->nid', '$item->category', '$model', '$name', '$shundian_price', '$item->nick', '$item->view_price', '$view_sales', '$comment_count', '0', '$credit', '$des', '$des_com_aver', '$attitude', '$attitude_com_aver', '$quatity', '$quatity_com_aver', '1', '$item->shopLink'),";

        }
    }



//    echo '<br><br>' . $data_string;//die();       //4294967295

// 如果有数据则插入到数据库中tb_product表
    if ($data_string) {

        // 去掉最后位置的，
        $data_string = substr($data_string, 0, -1);

        $sql = "INSERT INTO `tb_product` (`id`, `nid`, `category`, `model`, `name`, `shundian_price`, `merchant_name`, `merchant_price`, `view_sales`, `reviews_count`, `is_coalition`, `credit`, `des`, `des_com_aver`, `attitude`, `attitude_com_aver`, `quatity`, `quatity_com_aver`, `good`, `shop_link`) VALUES $data_string";
//        echo "<br>\n\r" . $sql."<br>\n\r";
        $retval = mysql_query($sql, $con);
        if(!$retval) {

            // 插入出错的数据status设置为0
            $sql = "UPDATE `tb_product_list` SET `status` = '0' WHERE `model` = '$model'and `name` = '$name'";

            $retval = mysql_query($sql, $con);
            if(!$retval)
            {
                print_r('Could not connect: ' . mysql_error() . "   on line ".__LINE__."<br>\n\r");
            }

            die('Could not enter data: ' . mysql_error() . "   on line ".__LINE__."<br>\n\r");
        }

        echo "Enter data successfully.<br>";
    }

}



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
    curl_setopt($ch, CURLOPT_REFERER, $referer);
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
        //正则表达式去除所有空格（包括换行 空格 &nbsp;）
        $html = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$html);

        // 匹配描述相符、服务态度、物流服务分数
//        $pattern = '/<divclass="shop-rate"id="J_ShopRate2">.*?<ul><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><li>.*?<emclass="count"title="(.*?)分".*?<em>(.*?)<\/em><\/span><\/a><\/li><\/ul><\/div>/si';

        $pattern = '/<emclass="count"title="(.*?)".*?<\/em>.*?<emclass="count"title="(.*?)".*?<\/em>.*?<emclass="count"title="(.*?)".*?<\/em>/';

        preg_match_all($pattern,$html,$result);

        // 关闭句柄
        curl_close($ch);

        if (empty($result[1][0])) {
            $result[1][0] = 0;
        }
        if (empty($result[2][0])) {
            $result[2][0] = 0;
        }
        if (empty($result[3][0])) {
            $result[3][0] = 0;
        }
        // 返回描述相符、服务态度、物流服务分数
        return $result;

    }

}





mysql_close($con);






echo "</pre>";












