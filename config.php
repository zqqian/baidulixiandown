<?php header("Content-Type:text/html; charset=utf-8"); date_default_timezone_set("Asia/Taipei");

require_once dirname(__FILE__) .'/libs/BaiduPCS.class.php';



$appName = 'zqqian123';//应用目录名

$root_dir = '/apps' . '/' . $appName . '/';//应用根目录，不要修改

$sitehost = $_SERVER['HTTP_HOST'];

/*==== 使用 prefetch.php qiuniu-del.php 须配置七牛 AccessKey SecretKey bucket ====*/
$accessKey = "";
$secretKey = "";
$bucket = "";
/*==== 七牛 ====*/
$qiniu_host = '';//七牛镜像，你的七牛域名，勿加http://

function sizecount ($filesize)
{
    if ($filesize >= 1073741824) $filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
    elseif ($filesize >= 1048576) $filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
    elseif ($filesize >= 1024) $filesize = round($filesize / 1024 * 100) / 100 . ' KB';
    else $filesize = $filesize . ' Bytes';
    return $filesize;
}

/*==== XSS简单过滤 =====*/
if($_SERVER['REQUEST_URI']) {
$temp = urldecode($_SERVER['REQUEST_URI']);
if(strpos($temp, '<') !== false || strpos($temp, '>') !== false || strpos($temp, '(') !== false || strpos($temp, '"') !== false) {
exit('Request Bad url');
}
}
function escape($value)
{
$value = is_array($value) ? array_map('escape',$value):htmlspecialchars(trim($value));
return get_magic_quotes_gpc()?$value:addslashes($value);
}
$_GET = array_map('escape', $_GET);
$_POST = array_map('escape', $_POST);
$_COOKIE = array_map('escape', $_COOKIE);
$_REQUEST = array_map('escape', $_REQUEST);
?>
