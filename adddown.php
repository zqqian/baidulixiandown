<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加离线下载</title>
<meta name="robots,Baiduspider" content="noindex,noarchive,nofollow">
<link rel="stylesheet" href="css/style.css" />
<link rel="canonical" href="http://<?php echo $sitehost ?>/file/" />  
</head>
<body>
<div class="navbar"><div class="navbar-inner"><div class="container"><ul class="nav">
<li><a href="http://www.loveno.net/">星光天文</a></li>
<li class="navbar"><a href="index.php">离线下载列表</a></li>
<li class="active"><a href="index.php">添加资源</a></li>
</ul></div></div></div>
<div class="container"><div class="hero-unit">
<?php

//powered by zqqian
error_reporting(0);
$dowonurl=(string)$_REQUEST["url"];
require_once 'libs/BaiduPCS.class.php';
$access_token = '23.b9ac735176f0df9efac148d7d3fbfdb7.2592000.1453126032.3710709496-2172157';
$appName = 'zqqian123';
$root_dir = '/apps' . '/' . $appName . '/';
$savePath = $root_dir . '';
$sourceUrl= $dowonurl;
$rateLimit=50;
$timeout=3600;
$callback='';
$pcs = new BaiduPCS($access_token);
$result = $pcs->addOfflineDownloadTask($savePath, $sourceUrl, $rateLimit, $timeout, $callback);
//echo $result;//������
//echo $dowonurl;//�������URL
$arry=json_decode($result);
//print_r($arry);//���arry


//������ת��Ϊ����
function object_array($array){
	if(is_object($array)){
		$array = (array)$array;
	}
	if(is_array($array)){
		foreach($array as $key=>$value){
			$array[$key] = object_array($value);
		}
	}
	return $array;
}
$array = object_array($arry);
//echo $array['rapid_download'];
if ($array['rapid_download']=="1")
{
	echo "<h3>离线资源添加成功并已经下载完成，可以立即下载 3秒钟后自动跳转到首页</h3>";
	echo '<meta http-equiv="refresh" c(www.111cn.net)ontent="3;url=index.php">';
}
	//echo '<form action="/121/lixiandown.php" method="post">';
	//echo '<input type="string" name="URL"  value='.$array['task_id'].' ><br>';

	//echo '<input type="submit">';
 else if ($array['rapid_download']=="0") {
		echo "<h3>离线资源添加成功，请等待资源下载完成。完成后会自动出现在下载列表</h3>";

	}
	else
	{echo "<h3>任务失败 ，请检查网址是否正确，The error messsage : ".$array['error_msg'].".</h3>";

	}
	?>
</body>
</html>