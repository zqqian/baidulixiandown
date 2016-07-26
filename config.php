<?php header("Content-Type:text/html; charset=utf-8"); date_default_timezone_set("Asia/Taipei");

require_once dirname(__FILE__) .'/libs/BaiduPCS.class.php';

$access_token = '26.a42eedb816d6fb193eed3eb04b288f72.2592000.1472121195.3710709496-2172157';//http://openapi.baidu.com/oauth/2.0/login_success#expires_in=2592000&access_token=23.4583fdc93f2b8188845114f551dea607.2592000.1472120237.2992287729-238347&session_secret=e8e8e93692b5e17108036311a5d30b24&session_key=9mtqUcKTr2hqmeR2VZQIbEmXy0%2Fb2kYnw9lxA0gpoTClG18N%2F4%2FFXdy68Yknsdzv%2BEExJGrQxDAEcHFXBgHhez5546znXtIp&scope=basic+netdisk请根据实际情况更新$access_token与$appName参数

$appName = 'zqqian123';//应用目录名，kooker为HiBCS默认的应用目录，非开发者无需更改,没有在百度网盘->我的应用数据-请新建kooker文件夹

$root_dir = '/apps' . '/' . $appName . '/';//应用根目录

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