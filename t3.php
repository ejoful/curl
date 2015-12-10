<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/10
 * Time: 10:26
 */
require_once('./config.php');



// 查看tb_product表中已有的商品数据nid
$sql = "SELECT * FROM `tb_product_list`";

$retval = mysql_query($sql, $con);
if(!$retval)
{
    die('Could not connect: ' . mysql_error());
}


while ($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{

    print_r($row['model'] . '---------------' .$row['name'] .'       ' .  __LINE__ . "<br>\n\r");
}



























































































