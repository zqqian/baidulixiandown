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
require_once 'data.php';
//$ret= '[{"key":"lve-ga2c1gwh6tur7f05/live.m3u8","lastModified":"2016-01-28T07:34:59Z","eTag":"fd77013c5d89cc8af2e7659bd4307d26","size":260,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/live.m3u8","lastModified":"2016-02-16T14:32:00Z","eTag":"1e53a27d7039f2bbaba11504e3f62923","size":260,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128153557.mp4","lastModified":"2016-01-28T08:35:58Z","eTag":"3560947488ac255a68a36cdb7e0ea5a9","size":173739829,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128163557.mp4","lastModified":"2016-01-28T09:35:59Z","eTag":"156236fbea4998994386edad42a97a7a","size":170883372,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128173557.mp4","lastModified":"2016-01-28T10:35:59Z","eTag":"19e94f9e5319267e55a6fb8f1deaae40","size":189424717,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128183557.mp4","lastModified":"2016-01-28T11:35:59Z","eTag":"63c3b4028de9695c91207a539ccd9913","size":185074537,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128193557.mp4","lastModified":"2016-01-28T12:35:59Z","eTag":"a529fc957d363d48aacf525d7ffa80b2","size":184698398,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128203557.mp4","lastModified":"2016-01-28T13:35:59Z","eTag":"faeb8ca2b27a81f311a50f1a32563132","size":184803909,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160128213557.mp4","lastModified":"2016-01-28T14:16:36Z","eTag":"f78831baf1e352a7e8acf71c2e8f4a0c","size":125447989,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160129145535.mp4","lastModified":"2016-01-29T07:55:36Z","eTag":"1f58e177fbf56ea14d39f4a28d891afc","size":173808282,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160129155535.mp4","lastModified":"2016-01-29T08:55:36Z","eTag":"a82094a10dc01e4b320151f528e46afb","size":171250617,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160129165535.mp4","lastModified":"2016-01-29T09:55:36Z","eTag":"957ce57bb5f4c5c1f8a2eb1d2dae148e","size":171230343,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160129175535.mp4","lastModified":"2016-01-29T10:55:36Z","eTag":"c71099e3d6052e85ee70e718923af576","size":171333265,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160129185535.mp4","lastModified":"2016-01-29T11:05:22Z","eTag":"9f11b15294bd192c4b64e9a6be3f6501","size":27985175,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201094642.mp4","lastModified":"2016-02-01T02:46:43Z","eTag":"58c5c4de3dd2152685e26bcacc87a976","size":192522596,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201104642.mp4","lastModified":"2016-02-01T03:46:43Z","eTag":"92020ec60ac9dd4be98413cd0c1d816d","size":193007631,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201114642.mp4","lastModified":"2016-02-01T04:46:43Z","eTag":"e1dd957389932208c265bd9922a8589f","size":192753395,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201124642.mp4","lastModified":"2016-02-01T05:46:43Z","eTag":"0bb961f58d6cfc22fd6d27fd9d506d68","size":192779588,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201134642.mp4","lastModified":"2016-02-01T06:46:43Z","eTag":"df889e950d26596d8ca53e3924b3ae91","size":192773027,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201144642.mp4","lastModified":"2016-02-01T07:46:43Z","eTag":"1b172bb03eeb2eb995b4dc61ad956729","size":192739873,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201154642.mp4","lastModified":"2016-02-01T08:19:33Z","eTag":"9649837f2af220848880ef6b20daa558","size":103654445,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201184657.mp4","lastModified":"2016-02-01T10:50:47Z","eTag":"5836013d074aad6a563d9368153c8be7","size":12150909,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201200939.mp4","lastModified":"2016-02-01T12:13:41Z","eTag":"1dedc4e67cb23db5a73ca9bba42d50e7","size":12824921,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201201344.mp4","lastModified":"2016-02-01T12:13:59Z","eTag":"4fba218d0e9a7ebc1a451d509bbb9e79","size":666371,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201201403.mp4","lastModified":"2016-02-01T12:20:25Z","eTag":"6cb9ab9c08907158e6d9b9ced17b8d56","size":20315046,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201202030.mp4","lastModified":"2016-02-01T12:27:45Z","eTag":"b8921e2e68b89fa2c3e700140cb1c080","size":23408181,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201202809.mp4","lastModified":"2016-02-01T13:28:09Z","eTag":"17e7ed83481aa3b0e76e20d3662c0a25","size":192748560,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160201212809.mp4","lastModified":"2016-02-01T13:36:32Z","eTag":"c12ba56d88085ae201ee7ab02ed3d08d","size":26843012,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160203174524.mp4","lastModified":"2016-02-03T09:54:10Z","eTag":"f60ef692134fe9b1b2779fc7b3026469","size":28039978,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160203180647.mp4","lastModified":"2016-02-03T11:06:48Z","eTag":"9e084ab8aa3d429f069e71bdcf2e691c","size":192769700,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160203190647.mp4","lastModified":"2016-02-03T12:06:49Z","eTag":"735fa23a3171bd670db800cbe95b19e4","size":192784636,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160203200647.mp4","lastModified":"2016-02-03T12:59:41Z","eTag":"8664942ca365b30e43758cb0feb063ad","size":169874780,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216171748.mp4","lastModified":"2016-02-16T09:40:08Z","eTag":"f8feb0552c007ac7fa47444c4e094914","size":71715192,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216175831.mp4","lastModified":"2016-02-16T10:00:13Z","eTag":"346a60a5b3cc0384d03bde1ca0561cd3","size":5347841,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216180025.mp4","lastModified":"2016-02-16T10:01:10Z","eTag":"d9f2f0b58f52ffe0aa40bc993715c598","size":2305537,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216181002.mp4","lastModified":"2016-02-16T11:00:09Z","eTag":"69641e560e8140117743cb7891612f49","size":160940310,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216194509.mp4","lastModified":"2016-02-16T12:45:10Z","eTag":"7365d3842db91d807d9e549525b727e6","size":192747949,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216204509.mp4","lastModified":"2016-02-16T13:01:51Z","eTag":"4738bbc159b1fb4d8632b5b7050f32dc","size":53528581,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216211916.mp4","lastModified":"2016-02-16T14:19:17Z","eTag":"f9bb7f5da16d4489d0b848910bb32cae","size":192724917,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}},{"key":"lve-ga3hs9t3jnbk6arw/recording_20160216221916.mp4","lastModified":"2016-02-16T14:32:00Z","eTag":"1b5d22e40aa47299f82e0e18eaab487f","size":40809483,"owner":{"id":"d6618e74bbea4be79b21e54504400b46","displayName":"PASSPORT:2267961591"}}]';
$json = $ret;
$json_Class=json_decode($json);   

$json_Array=json_decode($ret, true);   
//var_dump($json_Array);
//echo "<img src="/i/mouse.jpg" height="200" width="200" />";
 //echo $json_Array->key;
  
 for ($x=38; $x<=40; $x++) {
	  $url7 = "http://live.lexue.com/";
	 $url9[$x]=$url7. "" .strval($json_Array[$x]["key"]);
	
  //echo $json_Array[$x]["key"];\
  //echo $url[$x];
  //echo "\n";

 
 
//powered by zqqian

$dowonurl=$url9[$x];
require_once 'libs/BaiduPCS.class.php';
$access_token = '23.42dc01e6c819883f43b7816c8d0af24b.2592000.1458225293.3710709496-2172157';
$appName = 'zqqian123';
$root_dir = '/apps' . '/' . $appName . '/';
$savePath = $root_dir . '';
$sourceUrl= $dowonurl;
$rateLimit=50;
$timeout=3600;
$callback='';
$pcs = new BaiduPCS($access_token);
$result = $pcs->addOfflineDownloadTask($savePath, $sourceUrl, $rateLimit, $timeout, $callback);
echo $result;//������
//echo $dowonurl;//�������URL
$arry=json_decode($result);
//sleep();
//print_r($arry);//���arry
 }

//������ת��Ϊ����
/*function object_array($array){
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
/*if ($array['rapid_download']=="1")
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
 }
 */
	?>
	}
</body>
</html>