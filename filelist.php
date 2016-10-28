<?php
error_reporting(0);
header("Content-Type:text/html; charset=utf-8"); date_default_timezone_set("Asia/Taipei");
require_once dirname(__FILE__) .'/config.php';
function url_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}
function getHTTPS($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
function url_b64encode($string) //URL base64解码
{
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
return $data;
}

function writefile($fname,$str){

    $fp=fopen($fname,"w");

    fputs($fp,$str);

    fclose($fp);

}

if(is_array($_GET)&&count($_GET)>0){
		if(isset($_GET["key"])){
		$access_token=url_b64decode($_GET["key"]);
		if(isset($_GET["path"]))
		{ $floder=url_b64decode($_GET["path"]);
			$path = $floder .'/';
		}else{
			$path = $root_dir;
		}	
		
//???��????????��???????????
		
//???time????
		$by = 'time';
//????asc ?? ???? desc
		$order = 'desc';
//??????
		$limit = '0-1000';
		$pcs = new BaiduPCS($access_token);
		$result = $pcs->listFiles($path, $by, $order, $limit);
		
//echo $result;

	$data2=getHTTPS("https://openapi.baidu.com/rest/2.0/passport/users/getLoggedInUser?access_token={$access_token}");	
	$arrdata=json_decode($data2,ture);
	//var_dump($arrdata);
	$img="http://tb.himg.baidu.com/sys/portraitn/item/{$arrdata["portrait"]}";	
		
		//获取容量信息
		$quota=json_decode($pcs->getQuota(),ture);
		$total=round($quota["quota"]/1073741824,2);
		$used=round($quota["used"]/1073741824,2);
		if($total==0){
			$ecode=0;
			$err="somethings wrong,please try again";		}else{
				$ecode=1;
				$err="login success";
				
			}
		}
		
	
}else{
	$ecode=0;
	$err="somethings worong,please try again";
}











?>
<!doctype html>

<html lang="zh-cn">
<head>
<meta charset="utf-8" />
 
<meta name="robots,Baiduspider" content="noindex,noarchive,nofollow">
<link rel="stylesheet" href="css/style.css" />
<link rel="canonical" href="http://<?php echo $sitehost ?>/file/" />  
<title>文件列表- 百度云快速下<?php echo $sitehost; ?></title>
</head>
<body>
<div class="navbar"><div class="navbar-inner"><div class="container"><ul class="nav">
<li class="navbar"><img src="<?php echo $img;?>"  alt="头像"  height="37" width="37"/></li>
<li class="navbar"><a href="filelist.php?key=<?php echo $_GET["key"]?>"><?php echo $arrdata["uname"];?></a></li>
<li class="active"><a href="filelist.php?key=<?php echo $_GET["key"]?>">网盘文件列表</a></li>
<li class="navbar"><a href="lixian.php?<?php echo "key={$_GET["key"]}";?>">离线下载</a></li>



</ul></div></div></div>
<div class="container"><div class="hero-unit">
<h3><?php echo "{$arrdata["uname"]}的百度网盘容量：$total G已使用$used G" ; ?></h3>

<h3>请将要快速下载的文件放入 百度网盘\我的应用数据\zqqian123\ 目录下。</h3>
<h3>强烈建议配合迅雷，IDM，aria2等多线程下载工具使用。</h3>

<?php
header("content-Type: text/html; charset=utf-8"); //����ǿ��
header("Content-Type: text/html;charset=utf-8"); 

//ʱ���ڴ�ʹ��


function memory_usage() 
{

	$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';

	return $memory;

}


// ��ʱ



echo '<table class="table"><tr>';
echo '<td>操作</td><td>文件名</td><td>文件大小</td><td>最后修改时间</td></tr>';
$data = json_decode($result);
$n=1;
if($ecode==0){
	
echo "<h1>".$err."</h1>";
	
}else{
	

foreach ($data->list as $list)
{
	if($list->isdir==1){
		$filename = $list->path;
$filename = str_replace($root_dir,'',$filename);
$size = sizecount($list->size);
$fileid=$list->fs_id;
$fileid2= substr($fileid,2,11);
//$ctime = date('Y-m-d H:i:s',$list->ctime);
$mtime = date('Y-m-d',$list->mtime);
$flodername=url_b64encode($list->path);
$fileurl = "filelist.php?key={$_GET["key"]}&path={$flodername}";
//$fileurl2 = 'https://c.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
//$fileurl3 = 'https://d.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
//$fileurl4 = 'https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
//echo '<tr><td><a title="����" href="http://'.$sitehost.'/file/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=3.d9000194f4b5d2da3fe8b6f850ace082.2592000.1348645419.2233553628-248414&path=%2Fapps%2F%E6%B5%8B%E8%AF%95%E5%BA%94%E7%94%A8%2F%2F01.jpg
//echo "$access_token.'&path='.$root_dir.''.$filename.";
//echo '<tr><td><a title="����2" href="https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path='.$root_dir.''.$filename.'" class="list-micon icon-download"><i></i></a>
//echo '<tr><td><a title="����2" href="https://d.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=22.9adf809ec4ab8f78980544371de43ada.315360000.1738674131.3710709496-2172157&path=/apps/zqqian123/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//                                   https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=21.05e5ed75ee155960f48c04dc007bdf56.2592000.1425304939.3710709496-429978&path=/apps/kooker/%E5%A4%A9%E6%96%87%E5%AD%A6%E6%80%BB%E8%AE%BA
//echo '<tr><td><a title="����2" href="'.$fileurl.'" class="list-micon icon-download"><i></i></a> a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
echo '<tr><td><a title="打开文件夹" href="'.$fileurl.'" class="list-micon icon-download">打开文件夹<i></i>' ; 
//echo $fileid2;//id显示

//$sql = "insert into hbdx_blue(filetitle,filename,filesize,fileurl,fileext,fileuser,loaddate,id,top) values ('$filename','$filename','$size','$fileurl','net','zqqia','$mtime','$n','1')";

//$n=$n+1;
//mysql_query($sql);//��SQL���������

echo '<td>'.$filename.'</td>'; 

echo '<td>文件夹</td>';
echo '<td>'.$mtime.'</td>';

echo '</tr>';
		
	}else
	{
		$filename2 = $list->path;
$filename1 = str_replace($root_dir,'',$filename2);
$filename=urlencode($filename1);
$size = sizecount($list->size);
$fileid=$list->fs_id;
$fileid2= substr($fileid,2,11);
//$ctime = date('Y-m-d H:i:s',$list->ctime);
$mtime = date('Y-m-d',$list->mtime);
$hsurl='https://www.baidupcs.com/rest/2.0/pcs/stream?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
$fileurl = 'https://www.baidupcs.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
$fileurl2 = 'https://c.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
$fileurl3 = 'https://d.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
$fileurl4 = 'https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
//echo '<tr><td><a title="����" href="http://'.$sitehost.'/file/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=3.d9000194f4b5d2da3fe8b6f850ace082.2592000.1348645419.2233553628-248414&path=%2Fapps%2F%E6%B5%8B%E8%AF%95%E5%BA%94%E7%94%A8%2F%2F01.jpg
//echo "$access_token.'&path='.$root_dir.''.$filename.";
//echo '<tr><td><a title="����2" href="https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path='.$root_dir.''.$filename.'" class="list-micon icon-download"><i></i></a>
//echo '<tr><td><a title="����2" href="https://d.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=22.9adf809ec4ab8f78980544371de43ada.315360000.1738674131.3710709496-2172157&path=/apps/zqqian123/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//                                   https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=21.05e5ed75ee155960f48c04dc007bdf56.2592000.1425304939.3710709496-429978&path=/apps/kooker/%E5%A4%A9%E6%96%87%E5%AD%A6%E6%80%BB%E8%AE%BA
//echo '<tr><td><a title="����2" href="'.$fileurl.'" class="list-micon icon-download"><i></i></a> a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
echo '<tr><td><a title="点击下载" href="'.$hsurl.'" class="list-micon icon-download">下载地址1<i></i>';
echo '<a title="下载地址2" href="'.$fileurl2.'" rel="noreferer" class="list-micon icon-download2">下载地址2<i></i></a>';

//<a title="下载地址2" href="'.$fileurl2.'" rel="noreferer" class="list-micon icon-download2">下载地址2<i></i></a><a title="下载地址3" href="'.$fileurl3.'" rel="noreferer" class="list-micon icon-download2">下载地址3<i></i></a><a title="下载地址4" href="'.$fileurl4.'" rel="noreferer" class="list-micon icon-download2">下载地址4<i></i></a>' ; 
//echo $fileid2;//id显示

//$sql = "insert into hbdx_blue(filetitle,filename,filesize,fileurl,fileext,fileuser,loaddate,id,top) values ('$filename','$filename','$size','$fileurl','net','zqqia','$mtime','$n','1')";

//$n=$n+1;
//mysql_query($sql);//��SQL���������

echo '<td>'.$filename1.'</td>'; 

echo '<td>'.$size.'</td>';
echo '<td>'.$mtime.'</td>';

echo '</tr>';
		
	}
	
	

}

echo '</table>';
}

?>

</div></div><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260305022'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1260305022' type='text/javascript'%3E%3C/script%3E"));</script></body></html>
