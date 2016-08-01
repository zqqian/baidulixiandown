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
		//百度云上传组件
		$path = $root_dir;
//???time????
		$by = 'time';
//????asc ?? ???? desc
		$order = 'desc';
//??????
		$limit = '0-1000';
		$pcs = new BaiduPCS($access_token);
		$result = $pcs->listFiles($path, $by, $order, $limit);
		$targetPath = $root_dir;
//要上传的本地文件路径
$file = dirname(__FILE__) . '/' . 'yun.jpg';
//文件名称
$fileName = basename($file);
//新文件名，为空表示使用原有文件名

// WARNING 这里需要检查一下文件是否存在于云端！！！


$newFileName = '请将需要快速下载的文件放到这个位置111BBVBVBVBVBVVBVBVBVBVBVBVBVB.jpg';

$pcs = new BaiduPCS($access_token);


	 //调用quota接口获取用户空间信息
   //echo $pcs->getQuota();
   //调用quota接口获取用户空间信息
   $dat=$pcs->getQuota();

$data=json_decode($dat);

    if(!(array_key_exists("quota",$data))) {
        //错误情况
		echo "SOME THINGS WORONG ERR 803";
        var_dump($pcs->get_error_message());
        return;
    } else {
		
		//echo "NO THINGS WORONG ERR 803";
        //打印获取的quota信息
        //echo $dat;
		
	if (!file_exists($file)) {
	exit('文件不存在，请检查路径是否正确');
} else {
	$fileSize = filesize($file);
	$handle = fopen($file, 'rb');
	$fileContent = fread($handle, $fileSize);

	$result = $pcs->upload($fileContent, $targetPath, $fileName, $newFileName);
	fclose($handle);
	
//echo $result;
//fs_id
$data=json_decode($result);
if(!(array_key_exists("fs_id",$data))){
	
echo"SOME THINGS WORONG ERR 804";	
}else{
echo"NO THINGS WORONG ERR 804";	
	
	
	
	
}









}
	
	}
    
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}else{
	
echo "some things wrong err 802";


}

	
	
	
	
	
	
	
	
	
	
	
}else{
	
echo "some things wrong err 801";


}























?>

