<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/2
 * Time: 10:23
 */

require_once('./config.php');

echo "<pre>";


//// 查看tb_product表中已有的商品数据nid
//$sql = "SELECT * FROM `tb_product_list`";
//
//$retval = mysql_query($sql, $con);
//if(!$retval)
//{
//    die('Could not connect: ' . mysql_error());
//}
//
//$product_ids = [];
//while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
//{
//    $product_ids[] = $row['nid'];
//}



$model = 'NR-C31PX3-NL';
$url_array[] = "";
//$url = 'https://s.taobao.com/search?q=KG33NV230C&commend=all&ssid=s5-e&search_type=item&sourceId=tb.index&spm=a21bo.7724922.8452-taobao-item.1&ie=utf8&initiative_id=tbindexz_20151203&app=detailproduct&through=1';

$model = 'BCD-293WB-S';
$url = "https://s.taobao.com/search?q=$model&js=1&stats_click=search_radio_all%3A1&initiative_id=staobaoz_20151207&ie=utf8&style=list";

$url = "https://s.taobao.com/search?q=$model&ie=utf8&app=detailproduct&through=1&bcoffset=1&s=44";


////$page = getTaoBaoHtml($url);
////echo $page;
//
//$html=file_get_contents($url); //??url????????????????$text
// //echo $html;
//
//
////preg_match('/<a href="([^<>]+)" target="_blank">/', $html, $img);
////??????????img?????id?J_ImgBooth??img??$img[0]???500?img?????$img[1]?500??????????
//
////??????С??????????????????echo??????Ч??
////$html=preg_replace("/[\t\n\r]+/","",$html);
////$html=preg_replace("/<br>/","",$html);
//$html=preg_replace("/(\s|\&nbsp\;|??|\xc2\xa0)/","",$html);
//
//echo $html;
//
//
//$str = '/<div class="items g-clearfix">(.*?)<\/div>/sim';
//$pattern = '/<script>g_page_config=(.*?);g_srp_loadCss\(\).*?<\/script>/si';
//
//
//
////?????
//preg_match_all($pattern,$html,$result);
//
////??????
//
//print_r($result);


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

    print_r($result);


    if (empty($result[1][0])) {
        //返回False
        print_r('---------------'. __LINE__ . '<br>');
        return false;
    } else {

        print_r('---------------'. __LINE__ . '<br>');

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

$products = get($url);

print_r($products);die;

    // 查看tb_product表中已有的商品数据nid
    $sql = "SELECT nid FROM `tb_product`";

    $retval = mysql_query($sql, $con);
    if(!$retval)
    {
        die('Could not connect: ' . mysql_error());
    }

    $product_ids = [];
    while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
    {
        $product_ids[] = $row['nid'];
    }



//    print_r($product_ids);

    $i = 0;
    $data_count = count($products) - 1;
    $data_string = '';
    foreach($products as $item)
    {
        if (!in_array($item->nid, $product_ids)) {
            $des = $item->shopcard->description[0] / 100.0;
            $des .= '%';
            $des_com_aver = $item->shopcard->description[2] / 100.0;
            $des_com_aver .= '%';
            if ($item->shopcard->description[1]) {
                $des_com_aver = '高于 ' . $des_com_aver;
            } else {
                $des_com_aver = '低于 ' . $des_com_aver;
            }


            $attitude = $item->shopcard->service[0] / 100.0;
            $attitude .= '%';
            $attitude_com_aver = $item->shopcard->service[2] / 100.0;
            $attitude_com_aver .= '%';
            if ($item->shopcard->service[1] > 0) {
                $attitude_com_aver = '高于 ' . $attitude_com_aver;
            } else {
                $attitude_com_aver = '低于 ' . $attitude_com_aver;
            }

            $quatity = $item->shopcard->delivery[0] / 100.0;
            $quatity .= '%';
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
            $data_string .= "(NULL, '$item->nid', '$item->category', 'KG33NV230C', '西门子siemens 322升两门冰箱', '5670', '$item->nick', '$item->view_price', '$view_sales', '$comment_count', '0', '$credit', '$des', '$des_com_aver', '$attitude', '$attitude_com_aver', '$quatity', '$quatity_com_aver', '1')";
            if ($i != $data_count) {
                //如果当前数据不是数组的最后一项，则加 ','
                $data_string .= ',';
            }

        }
        ++$i;
    }

    echo '<br><br>' . $data_string;//die();       //4294967295

// 如果有数据则插入到数据库中tb_product表
    if ($data_string) {
        $sql = "INSERT INTO `tb_product` (`id`, `nid`, `category`, `model`, `name`, `shundian_price`, `merchant_name`, `merchant_price`, `view_sales`, `reviews_count`, `is_coalition`, `credit`, `des`, `des_com_aver`, `attitude`, `attitude_com_aver`, `quatity`, `quatity_com_aver`, `good`) VALUES $data_string";
        echo '<br><br>' . $sql.'<br>';
        $retval = mysql_query($sql, $con);
        if(!$retval) {
            die('Could not enter data: ' . mysql_error());
        }
        echo "Enter data successfully.<br>";
    }


    mysql_close($con);
















echo "</pre>";






//
//2 https://s.taobao.com/search?q=KG33NV230C&ie=utf8&app=detailproduct&through=1&bcoffset=1&s=44
//
//3 https://s.taobao.com/search?q=KG33NV230C&ie=utf8&app=detailproduct&through=1&bcoffset=1&s=88
//
//4 https://s.taobao.com/search?q=KG33NV230C&ie=utf8&app=detailproduct&through=1&bcoffset=1&s=132












