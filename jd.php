<?php 
require_once 'log.php';
require_once 'proxy-pass.php';

jsondb_logger_init('jingdong');

forward(function(&$url, &$data_to_post, &$headers)
{
}, 
function($info, &$headers, &$body)
{
	$url = $info['url'];
	$body= preg_replace('/(<div.*?>)/i', '$1<img src=\"http:\/\/www.doctorcom.com\/statics\/images\/style2012\/logo.jpg\" \/>\n', $body, 1);
	jsondb_logger('nofity', 'REP '.get_content_type($headers), ['url'=>$url,'info'=>$info,'headers'=>$headers,'body'=>$body]);
});

