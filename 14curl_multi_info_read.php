<?php
/**
 * Created by PhpStorm.
 * User: TopSage
 * Date: 2015/12/1
 * Time: 15:12
 */

/*
(PHP 5, PHP 7)
curl_multi_info_read �� ��ȡ��ǰ������cURL����ش�����Ϣ

˵��

array curl_multi_info_read ( resource $mh [, int &$msgs_in_queue = NULL ] )
��ѯ���������Ƿ񵥶��Ĵ����߳�������Ϣ����Ϣ���ء���Ϣ���ܰ�������ӵ����Ĵ����̷߳��صĴ��������ֻ�Ǵ����߳���û�����֮��ı��档

�ظ����������������ÿ�ζ��᷵��һ���µĽ����ֱ����ʱû�и�����Ϣ����ʱ��FALSE ������һ���źŷ��ء�ͨ��msgs_in_queue���ص�����ָ�������������κ��������ú󣬻�ʣ�����Ϣ����

Warning
���ص���Դָ������ݵ���curl_multi_remove_handle()�󽫲�����ڡ�
����

mh
�� curl_multi_init() ���ص� cURL ��������

msgs_in_queue
���ڶ����е���Ϣ������

����ֵ

�ɹ�ʱ���������Ϣ�����飬ʧ��ʱ����FALSE��

�������������
Key:	Value:
msg	CURLMSG_DONE��������������ֵ��ǰ�����á�
result	CURLE_*����֮һ�����һ�в���û�����⣬���᷵��CURLE_OK������
handle	cURL��Դ���ͱ������йصľ����
*/
















































