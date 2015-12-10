-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-09 11:29:29
-- 服务器版本： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taobao_data`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `id` int(11) unsigned NOT NULL,
  `nid` varchar(255) NOT NULL COMMENT 'nid',
  `category` int(11) unsigned NOT NULL COMMENT '类别',
  `model` varchar(255) NOT NULL COMMENT '型号',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `shundian_price` int(11) DEFAULT '0' COMMENT '顺电报价',
  `merchant_name` varchar(255) NOT NULL COMMENT '淘宝商户名称',
  `merchant_price` int(11) DEFAULT '0' COMMENT '商户报价',
  `view_sales` int(11) DEFAULT '0' COMMENT '付款数',
  `reviews_count` int(11) DEFAULT '0' COMMENT '累计评论数',
  `is_coalition` tinyint(1) DEFAULT NULL COMMENT '是否商盟',
  `credit` varchar(100) DEFAULT NULL COMMENT '卖家信用值',
  `des` varchar(100) DEFAULT NULL COMMENT '宝贝与描述相符',
  `des_com_aver` varchar(100) DEFAULT NULL COMMENT '描述比同行业平均水平',
  `attitude` varchar(100) DEFAULT NULL COMMENT '卖家的服务态度',
  `attitude_com_aver` varchar(100) DEFAULT NULL COMMENT '态度比同行业平均水平',
  `quatity` varchar(100) DEFAULT NULL COMMENT '物流服务质量',
  `quatity_com_aver` varchar(100) DEFAULT NULL COMMENT '物流比同行业水平',
  `good` varchar(100) DEFAULT NULL COMMENT '好评率'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_product`
--

INSERT INTO `tb_product` (`id`, `nid`, `category`, `model`, `name`, `shundian_price`, `merchant_name`, `merchant_price`, `view_sales`, `reviews_count`, `is_coalition`, `credit`, `des`, `des_com_aver`, `attitude`, `attitude_com_aver`, `quatity`, `quatity_com_aver`, `good`) VALUES
(1, '38660433083', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '国美在线官方旗舰店', 5599, 4, 17, 0, '14', '4.86%', '高于 0.72%', '4.78%', '低于 1.61%', '4.79%', '高于 1.11%', '1'),
(2, '523286834129', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '苏宁易购官方旗舰店', 5790, 7, 2, 0, '16', '4.84%', '低于 0%', '4.76%', '低于 0%', '4.73%', '高于 1.28%', '1'),
(3, '7679735481', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '阿涛的店子', 5290, 2, 0, 0, '10', '4.8%', '低于 0%', '4.86%', '高于 9.85%', '4.8%', '低于 0%', '1'),
(4, '524269698367', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '无锡松下电器生活馆', 4850, 1, 0, 0, '9', '4.88%', '高于 32.08%', '4.84%', '高于 0.57%', '4.84%', '高于 17.96%', '1'),
(5, '44718081080', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'huanghua68899', 5180, 1, 4, 0, '6', '4.91%', '高于 50.12%', '4.95%', '高于 66.83%', '4.86%', '高于 24.67%', '1'),
(6, '18002031768', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '万维电器商城', 3980, 1, 4, 0, '8', '4.8%', '低于 0%', '4.75%', '低于 1.96%', '4.83%', '高于 6.89%', '1'),
(7, '15749674695', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'liu605629', 4980, 0, 5, 0, '10', '4.94%', '高于 68.55%', '4.88%', '高于 31.78%', '4.87%', '高于 28.3%', '1'),
(8, '524203172319', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '华松影音', 4799, 0, 0, 0, '6', '4.94%', '高于 69.51%', '5%', '高于 100%', '4.94%', '高于 69.31%', '1'),
(9, '26151284311', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '龙龙乐电器', 5880, 0, 0, 0, '7', '4.69%', '高于 2.7%', '4.69%', '低于 3.22%', '4.69%', '高于 2.73%', '1'),
(10, '524524618914', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '杰仔智能数码', 4999, 0, 0, 0, '3', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(11, '21072439986', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'apis琴', 4980, 1, 0, 0, '7', '4.84%', '高于 18.98%', '4.86%', '高于 13.12%', '4.8%', '低于 0%', '1'),
(12, '524727463738', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '一起打毛线', 4699, 0, 0, 0, '8', '4.78%', '高于 0.83%', '4.84%', '高于 4.26%', '4.8%', '低于 0%', '1'),
(13, '35668573451', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'dreamzz831', 5350, 0, 0, 0, '7', '4.72%', '高于 1.98%', '4.72%', '低于 2.5%', '4.61%', '高于 4.3%', '1'),
(14, '36049344025', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'yanfaping18', 4299, 0, 0, 0, '7', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(15, '524135197591', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '齐心购物', 4999, 0, 0, 0, '8', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(16, '37315906956', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'polozzt', 6199, 0, 0, 0, '7', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(17, '40400385502', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'chenshuwen1113', 5999, 0, 0, 0, '1', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(18, '18167318445', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'tb8736945_77', 5790, 0, 0, 0, '3', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(19, '36579766286', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '武汉宏信', 5990, 0, 0, 0, '3', '3%', '高于 37.72%', '3%', '低于 38.06%', '3%', '高于 37.75%', '1'),
(20, '524062750214', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '檀香商贸', 5200, 0, 0, 0, '3', '5%', '高于 100%', '4.5%', '低于 7.09%', '4.75%', '高于 1.43%', '1'),
(21, '524258364829', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'eliaschan', 5490, 0, 0, 0, '0', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(22, '17695987242', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'bujinyixiao1987', 4980, 0, 0, 0, '7', '4.93%', '高于 62.15%', '4.8%', '低于 0.75%', '4.74%', '高于 1.7%', '1'),
(23, '37391481884', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '上海赛荣电器', 5699, 0, 0, 0, '10', '4.88%', '高于 41.21%', '4.87%', '高于 19.46%', '4.82%', '低于 0%', '1'),
(24, '43157827977', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '天使宝贝wqy', 5599, 0, 0, 0, '3', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(25, '39388288750', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'leon1299', 5799, 0, 0, 0, '5', '4.98%', '高于 86.28%', '4.98%', '高于 84.43%', '4.98%', '高于 86.53%', '1'),
(26, '522725971927', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'stxo858', 5600, 0, 0, 0, '7', '4.33%', '高于 10.06%', '4.59%', '低于 5.03%', '4.73%', '高于 1.78%', '1'),
(27, '18390123515', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'maywaittang', 5890, 0, 0, 0, '4', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(28, '45679978593', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '胡彪12', 6290, 0, 0, 0, '0', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(29, '44257313163', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '静静104', 4865, 0, 0, 0, '0', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(30, '43316630119', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'yj简意人生168', 4988, 0, 1, 0, '4', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(31, '36042050368', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'yanfaping18', 6111, 0, 0, 0, '7', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(32, '523908691992', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '木槿网络', 4699, 0, 0, 0, '2', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(33, '36553717994', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '周三少33', 5999, 0, 0, 0, '2', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(34, '39850076920', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '都江堰思迈', 4990, 0, 0, 0, '7', '4.67%', '高于 3.14%', '4.62%', '低于 4.63%', '4.71%', '高于 2.17%', '1'),
(35, '42811676963', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '艾美特家电代理', 6874, 0, 0, 0, '4', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(36, '520924032677', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '正通家用电器', 5098, 0, 0, 0, '4', '4.98%', '高于 86.71%', '4.95%', '高于 69.08%', '4.98%', '高于 86.64%', '1'),
(37, '16754742095', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '新华达松下电器生活馆', 5490, 0, 0, 0, '8', '4.78%', '高于 0.83%', '4.75%', '低于 1.93%', '4.69%', '高于 2.63%', '1'),
(38, '42727471202', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'pandazhong88', 7424, 0, 0, 0, '5', '4.71%', '高于 3.8%', '4.93%', '高于 17.7%', '4.93%', '高于 34.2%', '1'),
(39, '523878512220', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'suhao2683277', 4699, 0, 0, 0, '0', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1'),
(40, '42219681179', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '郁盛家电1', 6150, 0, 0, 0, '3', '5%', '高于 100%', '3.67%', '低于 24.3%', '5%', '高于 100%', '1'),
(41, '42777666935', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '好八方商城', 7039, 0, 0, 0, '4', '4.75%', '高于 1.41%', '4.75%', '低于 1.93%', '4.25%', '高于 11.81%', '1'),
(42, '12504305492', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'sunglight2011', 4980, 0, 0, 0, '4', '4.76%', '高于 1.1%', '4.71%', '低于 2.84%', '4.71%', '高于 2.35%', '1'),
(43, '42774405456', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '家和乐电器', 7149, 0, 0, 0, '5', '4.38%', '高于 9.19%', '4.12%', '低于 14.83%', '4.75%', '高于 1.43%', '1'),
(44, '522219258234', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, 'panasonic2014松下电器', 4850, 0, 1, 0, '1', '5%', '高于 100%', '5%', '高于 100%', '5%', '高于 100%', '1'),
(45, '524705283641', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '小华8882', 8429, 0, 0, 0, '6', '4.7%', '高于 2.44%', '4.55%', '低于 6.06%', '4.62%', '高于 4.03%', '1'),
(46, '525028295547', 50003881, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990, '天益达家电数码', 6999, 0, 0, 0, '4', '0%', '低于 0%', '0%', '低于 0%', '0%', '低于 0%', '1');

-- --------------------------------------------------------

--
-- 表的结构 `tb_product_list`
--

CREATE TABLE IF NOT EXISTS `tb_product_list` (
  `id` int(10) unsigned NOT NULL,
  `model` varchar(255) DEFAULT NULL COMMENT '型号',
  `name` varchar(255) DEFAULT NULL COMMENT '名称',
  `shundian_price` float unsigned DEFAULT NULL COMMENT '顺电报价'
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_product_list`
--

INSERT INTO `tb_product_list` (`id`, `model`, `name`, `shundian_price`) VALUES
(1, 'NR-C31PX3-NL', '松下Panasonic 313升三门冰箱', 5990),
(2, 'KG33NV230C', '西门子siemens 322升两门冰箱 ', 3649),
(3, 'BCD-293WB-S', '夏普Sharp 293升三门冰箱', 5499),
(4, 'NR-C32WPD1-S ', '松下Panasonic 316升三门冰箱', 5789),
(5, 'NR-C26WP3-NP', '松下256升三门冰箱', 4990),
(6, 'NR-C28WPD 1-S 278', '松下Panasonic 278升三门冰箱', 5519),
(7, 'GR-D30PJUH', 'LG 300升 冰箱', 5999),
(8, 'BCD-285WMQISL1', '三星Samsung 285升三门冰箱', 5690),
(9, 'BCD-286WNQISS1', '三星Samsung 286升两门冰箱', 4360),
(10, 'KG28FA2SPC', '西门子 279升三门冰箱', 4399),
(11, 'BCD-304WNQISL1', '三星Samsung 304升无霜两门冰箱', 4490),
(12, 'BCD-260WDGW', '海尔 260升三门冰箱', 3499),
(13, 'BCD-270WVF-S', '夏普Sharp 270升风冷三门冰箱', 6499),
(14, 'BCD-346WDCA', '海尔Haier 卡萨帝 346升三门冰箱', 5899),
(15, 'BCD-265WMSSSA1', '三星 265升 三门冰箱', 4299),
(16, 'KG30FS121C', '西门子Siemens 296升三门冰箱', 7399),
(17, 'KG28US1C0C', '西门子（SIEMENS） 280升无霜三门冰箱', 7599),
(18, 'KG33NA2L0C', '西门子Siemens 322升无霜两门冰箱', 4999),
(19, 'BCD-265WMRIWZ1', '三星sumsang 265升 三门冰箱', 3999),
(20, 'NR-C32WMG-XN', '松下 316升 三门冰箱', 5999),
(21, 'KF-35GW/(35370)Aa-3', '格力Gree Q力 1.5匹单冷分体式空调', 2199),
(22, 'KFR－35GW/(35557)FNDe-A3', '格力Gree 凉之静1.5匹变频冷暖分体空调', 4018),
(23, 'KFR-35GW/(35583)FNAa-A3', '格力（Gree） 冷静王二代 大1.5匹 变频冷暖 壁挂分体式空调 ', 3490),
(24, 'MSZ-ZFJ12VA ', '三菱电机（Mitsubishi Electric） ZF系列1.5匹变频冷暖壁挂分体空调 ', 7840),
(25, 'MSZ-YGJ12VA', '三菱电机（Mitsubishi Electric）YGJ系列1.5匹变频冷暖分体空调', 6620),
(26, 'KFR-35GW/(35557)FNDcC-A3', '格力（Gree） 福景园1.5匹变频冷暖壁挂分体空调', 3049),
(27, 'KFR-35GW/(35595)FNCa-A1', '格力（GREE） 润典系列1.5匹变频冷暖分体式空调', 4599),
(28, 'MSZ-AHJ12VA', '三菱电机（Mitsubishi Electric） AH系列1.5匹变频冷暖壁挂分体空调 ', 8990),
(29, 'KFR-35GW/(35570)Aa-3', '格力Gree Q力1.5匹冷暖空调', 2999),
(30, 'KF-36GW/06NGA13', '海尔1.5匹 单冷 定频 挂壁式空调', 2199),
(31, 'KFR-35GW/(35582)FNCa-A3', '格力（Gree） U雅二代1.5匹变频冷暖分体式空调', 4890),
(32, 'MSZ-PAHJ12VA', '三菱电机 PAHJ系列1.5匹变频冷暖分体空调', 9450),
(33, 'MSZ-PZHJ12VA', '三菱电机 PZHJ系列 1.5匹 变频冷暖 分体空调', 9510),
(34, 'KFR-35GW/A8X112N-A2(1P02) ', '海信(Hisense) 112系列1.5匹变频冷暖壁挂分体式空调', 2759),
(35, 'FTXF135NC-W', '大金（Daikin） F系列1.5匹变频冷暖壁挂式分体式空调', 7728),
(36, 'KFR-35GW/(35581)FNDa-A2', '格力（Gree） U尊1.5匹变频 冷暖分体式空调', 6390),
(37, 'MSH-DF12VD', '三菱电机（Mitsubishi Electric）DF系列1.5匹定速冷暖壁挂分体式空调', 4399),
(38, 'MSD-DF12VD', '三菱电机 DF系列 1.5匹单冷定频 壁挂分体式空调(白色)', 4220),
(39, 'MSZ-YK12VA', '三菱电机（Mitsubishi Electric）YK系列1.5匹 变频冷暖壁挂分体式空调', 6780),
(40, 'KF-35GW/Y-PA402(D3)', '美的Midea 冷俊星 1.5P单冷定频 壁挂空调', 2299),
(41, 'XQB75-QA7321', '松下 7.5公斤 波轮洗衣机 ', 1999),
(42, 'XQB80-H8252/F8252 ', '松下(Panasonic) 8公斤波轮洗衣机', 3899),
(43, 'XQB80-X800N', '松下Panasonic 8公斤全自动波轮洗衣机', 4299),
(44, 'XQB75-Q7332', '松下(Panasonic) 7.5公斤 波轮洗衣机', 2499),
(45, 'XQB75-M12699', '海尔7.5公斤波轮洗衣机', 1259),
(46, 'XQS70-Z1626', '海尔 7公斤 波轮洗衣机', 2099),
(47, 'XQB75-D86G/SC', '三星 7.5公斤 全自动波轮 洗衣', 2899),
(48, 'XQB80-X8156', '松下Panasonic 8公斤全自动波轮机', 4860),
(49, 'XQB85-QA8122', '松下 8.5公斤 波轮洗衣机', 2999),
(50, 'WW80J7260GX/SC', '三星（SAMSUNG) 8公斤前置式滚筒洗衣机 ', 5999),
(51, 'WD-T14415D', 'LG 8公斤前置电脑式滚筒洗衣机', 3599),
(52, 'WD-T12410D', 'LG 8公斤前置电脑式滚筒洗衣机', 2799),
(53, 'XQG70-1011', '海尔Haier 7公斤 滚筒洗衣机', 1999),
(54, 'XQG62-WS12M3600W', '西门子Siemens 6.2公斤3D变速节能滚筒洗衣机', 3999),
(55, 'WLK242681W', '博世6.2公斤前置式滚筒洗衣机', 3999),
(56, 'XQG70-V7258', '松下Panasonic 7公斤前置电脑式滚筒洗衣机', 5599),
(57, 'WM12P1681W', '西门子 8公斤 前置式 滚筒洗衣机', 4598),
(58, 'XQG80-EA8132', '松下Panasonic 8公斤滚筒洗衣机', 3999),
(59, 'WAP201601W', '博世 8公斤 前置式 滚筒洗衣机', 3999),
(60, 'WM12U4600W', '西门子 9公斤 白色 全自动滚筒洗衣机', 5399),
(61, 'ZF-1214', 'ZEI 豪华金属落地扇', 428),
(62, 'FTS35-13BR', '美的（Midea） 台地两用扇', 288),
(63, 'FS40-13DR', '美的（Midea ）落地扇', 269),
(64, 'FW40-F3', '美的（Midea）壁扇', 169),
(65, 'FS40-12DR', '美的（Midea）落地扇', 168),
(66, 'EGF-1380WG', '巴慕达（BALMUDA）果岭GreenFan 台式落地 风扇', 1980),
(67, 'AM07', '戴森(Dyson) 塔式无叶风扇', 3790),
(68, 'AM09', '戴森(Dyson) 冷暖风扇', 4190),
(69, 'AM06', '戴森(Dyson) 台式无叶风扇', 2990),
(70, 'ZF-9X 3C', '兆城邑ZEI 豪华金属循环扇/落地扇', 998),
(71, 'ZE360WP', '伊莱克斯（Electrolux） 真空吸尘器', 1999),
(72, 'Roomba770', '艾罗伯特iRobot 吸尘机器人', 5599),
(73, 'VR10F71UCBC/ET', '三星Samsung 机器人', 7119),
(74, 'ZB3011', '伊莱克斯Electrolux 吸尘器', 2080),
(75, 'MC-CL825', '松下Panasonic 吸尘器', 1599),
(76, 'Z803', '伊莱克斯Electrolux 干湿两用吸尘器', 1109),
(77, 'FC6130', '飞利浦Philips 吸尘器', 276),
(78, 'ZE346B', '伊莱克斯（Electrolux） 真空吸尘器', 1899),
(79, 'MC-UL522', '松下Panasonic 立式吸尘器', 850),
(80, 'ZLUX1821', '伊莱克斯Electrolux 卧式吸尘器', 799),
(81, 'VC-T3519-3', '莱克 吸尘器家用静音除螨吸尘器', 1888),
(82, 'ZUF4202OR', '伊莱克斯Electrolux 卧式吸尘器', 1999),
(83, 'Roomba528', '艾罗伯特iRobot 吸尘机器人', 2499),
(84, 'ZUS4065AF', '伊莱克斯真空吸尘器', 4699),
(85, 'MC-CL749VJ81', '松下Panasonic 吸尘器', 1499),
(86, '630', 'iRobot 吸尘机器人630', 3149),
(87, 'MC-CL523', '松下Panasonic 吸尘器', 699),
(88, 'W710-TY', '科沃斯Ecobacs窗宝', 1799),
(89, 'VC18F70HUCC/SC', '三星Samsung 卧式吸尘器', 4399),
(90, 'S4812', '美诺Miele吸尘器', 10399),
(91, 'EEH700', '伊莱克斯Electrolux 混合式加湿器', 799),
(92, 'U700', '博瑞客（BONECO）8L大水箱 加湿器', 1680),
(93, 'EEH350', '伊莱克斯Electrolux 超声波加湿器', 398),
(94, 'E2441A', '瑞士风/博瑞客（BONECO）净化型加湿器', 1399),
(95, 'AOS U200', '瑞士风(博瑞客)超声波加湿器', 899),
(96, 'HM-C400', 'Cado加湿器', 2580),
(97, 'HU2005', '莱克LEXY 加湿器', 299),
(98, '中号', '斯泰得乐(Stadler Form) 奥斯卡Oskar 净化型加湿器', 1698),
(99, '小号', '斯泰得乐 奥斯卡Oskar 加湿器', 998),
(100, 'HU6001', '莱克加湿器', 999),
(101, '大号', '斯泰得乐 杰克 加湿器', 2898),
(102, 'AM10', '铁蓝色戴森(Dyson)除菌加湿器', 4190),
(103, 'HU2002', '莱克LEXY 加湿器', 359),
(104, 'HU4801/00', '飞利浦 加湿器', 299);

-- --------------------------------------------------------

--
-- 表的结构 `tb_product_type`
--

CREATE TABLE IF NOT EXISTS `tb_product_type` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_product_type`
--

INSERT INTO `tb_product_type` (`id`, `name`, `category`) VALUES
(1, '冰箱', 50003881),
(2, '空调', 0),
(3, '吸尘器', 0),
(4, '加湿器', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_list`
--
ALTER TABLE `tb_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb_product_list`
--
ALTER TABLE `tb_product_list`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;