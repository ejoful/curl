<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/2
 * Time: 10:23
 */

require_once('./config.php');

echo "<pre>";


//// �鿴tb_product�������е���Ʒ����nid
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
////??????��??????????????????echo??????��??
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
    // ץȡ$urlָ���ҳ��
    $html = file_get_contents($url);



    //������ʽȥ�����пո񣨰������� �ո� &nbsp;��
    $html = preg_replace("/(\s|\&nbsp\;|��|\xc2\xa0)/","",$html);

    // ƥ��js
    $pattern = '/<script>g_page_config=(.*?);g_srp_loadCss\(\).*?<\/script>/si';
    //ץȡjson����
    preg_match_all($pattern,$html,$result);

    print_r($result);


    if (empty($result[1][0])) {
        //����False
        print_r('---------------'. __LINE__ . '<br>');
        return false;
    } else {

        print_r('---------------'. __LINE__ . '<br>');

        // ��jsonתΪ����
        $data = json_decode($result[1][0]);

        //    print_r($data);

        // ��ȡ��Ʒ����
        $data = $data->mods->itemlist->data->auctions;

        //����json����
        return $data;
    }

}

//print_r(get($url));

$products = get($url);

print_r($products);die;

    // �鿴tb_product�������е���Ʒ����nid
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
                $des_com_aver = '���� ' . $des_com_aver;
            } else {
                $des_com_aver = '���� ' . $des_com_aver;
            }


            $attitude = $item->shopcard->service[0] / 100.0;
            $attitude .= '%';
            $attitude_com_aver = $item->shopcard->service[2] / 100.0;
            $attitude_com_aver .= '%';
            if ($item->shopcard->service[1] > 0) {
                $attitude_com_aver = '���� ' . $attitude_com_aver;
            } else {
                $attitude_com_aver = '���� ' . $attitude_com_aver;
            }

            $quatity = $item->shopcard->delivery[0] / 100.0;
            $quatity .= '%';
            $quatity_com_aver = $item->shopcard->delivery[2] / 100.0;
            $quatity_com_aver .= '%';
            if ($item->shopcard->delivery[1]) {
                $quatity_com_aver = '���� ' . $quatity_com_aver;
            } else {
                $quatity_com_aver = '���� ' . $quatity_com_aver;
            }

            $credit = $item->shopcard->sellerCredit;
            $view_sales = intval($item->view_sales);
            if(!empty($item->comment_count))
            {
                $comment_count = $item->comment_count;
            } else {
                $comment_count = 0;
            }


            // ƴ��product����
            $data_string .= "(NULL, '$item->nid', '$item->category', 'KG33NV230C', '������siemens 322�����ű���', '5670', '$item->nick', '$item->view_price', '$view_sales', '$comment_count', '0', '$credit', '$des', '$des_com_aver', '$attitude', '$attitude_com_aver', '$quatity', '$quatity_com_aver', '1')";
            if ($i != $data_count) {
                //�����ǰ���ݲ�����������һ���� ','
                $data_string .= ',';
            }

        }
        ++$i;
    }

    echo '<br><br>' . $data_string;//die();       //4294967295

// �������������뵽���ݿ���tb_product��
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












