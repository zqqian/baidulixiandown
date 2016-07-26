<?php
//error_reporting(0);
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
if(is_array($_GET)&&count($_GET)>0){
		if(isset($_GET["key"])){
		$access_token=url_b64decode($_GET["key"]);
		
//???��????????��???????????
		$path = $root_dir;
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
	var_dump($arrdata);
		
		
		
		
		
		}
	
}











?>
<!doctype html>

<html lang="zh-cn">
<head>
<meta charset="utf-8" />
 
<meta name="robots,Baiduspider" content="noindex,noarchive,nofollow">
<link rel="stylesheet" href="css/style.css" />
<link rel="canonical" href="http://<?php echo $sitehost ?>/file/" />  
<title>下载列表- <?php echo $sitehost; ?></title>
</head>
<body>
<div class="navbar"><div class="navbar-inner"><div class="container"><ul class="nav">
<li><a href="http://www.loveno.net/">星光天文</a></li>
<li class="active"><a href="index.php">离线下载列表</a></li>
<li class="navbar"><a href="adddown.html">添加资源</a></li>
<li class="navbar"><?php echo $arrdata["uname"];?></a></li>


</ul></div></div></div>
<div class="container"><div class="hero-unit">
<h3>BY PCS</h3>
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
//print_r($data);
//echo("111111111");


//mysql_connect("localhost","root","root");//����MySQL
//mysql_select_db("11");//ѡ����ݿ�
//mysql_query("set names utf8;"); //**�����ַ�***
//mysql_query("TRUNCATE TABLE hbdx_blue");
foreach ($data->list as $list)
{
	
$filename = $list->path;
$filename = str_replace($root_dir,'',$filename);
$size = sizecount($list->size);
$fileid=$list->fs_id;
$fileid2= substr($fileid,2,11);
//$ctime = date('Y-m-d H:i:s',$list->ctime);
$mtime = date('Y-m-d',$list->mtime);
$fileurl = 'https://www.baidupcs.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
$fileurl2 = 'https://c.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path=/apps/'.$appName.'/'.$filename;
//echo '<tr><td><a title="����" href="http://'.$sitehost.'/file/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=3.d9000194f4b5d2da3fe8b6f850ace082.2592000.1348645419.2233553628-248414&path=%2Fapps%2F%E6%B5%8B%E8%AF%95%E5%BA%94%E7%94%A8%2F%2F01.jpg
//echo "$access_token.'&path='.$root_dir.''.$filename.";
//echo '<tr><td><a title="����2" href="https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token='.$access_token.'&path='.$root_dir.''.$filename.'" class="list-micon icon-download"><i></i></a>
//echo '<tr><td><a title="����2" href="https://d.pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=22.9adf809ec4ab8f78980544371de43ada.315360000.1738674131.3710709496-2172157&path=/apps/zqqian123/'.$filename.'" class="list-micon icon-download"><i></i></a> <a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
//                                   https://pcs.baidu.com/rest/2.0/pcs/file?method=download&access_token=21.05e5ed75ee155960f48c04dc007bdf56.2592000.1425304939.3710709496-429978&path=/apps/kooker/%E5%A4%A9%E6%96%87%E5%AD%A6%E6%80%BB%E8%AE%BA
//echo '<tr><td><a title="����2" href="'.$fileurl.'" class="list-micon icon-download"><i></i></a> a title="����" href="http://'.$sitehost.'/share_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-share"><i></i></a> <a title="��ţ����" href="http://'.$sitehost.'/qiniu_'.$filename.'" onClick="window.open(this.href,\'\', \'height=450,width=480,toolbar=no,location=no,status=no,menubar=no\');return false" class="list-micon icon-qiuniu"><i></i></a></td>'; 
echo '<tr><td><a title="下载地址1" href="'.$fileurl.'" class="list-micon icon-download">下载地址1<i></i><a title="下载地址2" href="'.$fileurl2.'" rel="noreferer" class="list-micon icon-download2">下载地址2<i></i></a>' ; 
//echo $fileid2;//id显示

//$sql = "insert into hbdx_blue(filetitle,filename,filesize,fileurl,fileext,fileuser,loaddate,id,top) values ('$filename','$filename','$size','$fileurl','net','zqqia','$mtime','$n','1')";

//$n=$n+1;
//mysql_query($sql);//��SQL���������

echo '<td>'.$filename.'</td>'; 

echo '<td>'.$size.'</td>';
echo '<td>'.$mtime.'</td>';

echo '</tr>';
}
mysql_close();//�ر�MySQL����
echo '</table>';
echo '</div></div></body></html>';

?>


