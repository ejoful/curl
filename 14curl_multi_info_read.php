<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 15:12
 */

/*
(PHP 5, PHP 7)
curl_multi_info_read — 获取当前解析的cURL的相关传输信息

说明

array curl_multi_info_read ( resource $mh [, int &$msgs_in_queue = NULL ] )
查询批处理句柄是否单独的传输线程中有消息或信息返回。消息可能包含诸如从单独的传输线程返回的错误码或者只是传输线程有没有完成之类的报告。

重复调用这个函数，它每次都会返回一个新的结果，直到这时没有更多信息返回时，FALSE 被当作一个信号返回。通过msgs_in_queue返回的整数指出将会包含当这次函数被调用后，还剩余的消息数。

Warning
返回的资源指向的数据调用curl_multi_remove_handle()后将不会存在。
参数

mh
由 curl_multi_init() 返回的 cURL 多个句柄。

msgs_in_queue
仍在队列中的消息数量。

返回值

成功时返回相关信息的数组，失败时返回FALSE。

返回数组的内容
Key:	Value:
msg	CURLMSG_DONE常量。其他返回值当前不可用。
result	CURLE_*常量之一。如果一切操作没有问题，将会返回CURLE_OK常量。
handle	cURL资源类型表明它有关的句柄。
*/
















































