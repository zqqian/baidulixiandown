<?php
error_reporting(0);

$client_id="";
$client_secret="";
$redirect_uri="";
$code="";//这个不用填
header("Content-Type:text/html; charset=utf-8"); date_default_timezone_set("Asia/Taipei");
function url_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}
function url_b64encode($string) {
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
return $data;
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
function http_request($url,$timeout=30,$header=array()){  
        if (!function_exists('curl_init')) {  
            throw new Exception('server not install curl');  
        }  
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        curl_setopt($ch, CURLOPT_HEADER, true);  
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);  
        if (!empty($header)) {  
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
        }  
        $data = curl_exec($ch);  
        list($header, $data) = explode("\r\n\r\n", $data);  
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        if ($http_code == 301 || $http_code == 302) {  
            $matches = array();  
            preg_match('/Location:(.*?)\n/', $header, $matches);  
            $url = trim(array_pop($matches));  
            curl_setopt($ch, CURLOPT_URL, $url);  
            curl_setopt($ch, CURLOPT_HEADER, false);  
            $data = curl_exec($ch);  
        }  

        if ($data == false) {  
            curl_close($ch);  
        }  
        @curl_close($ch);  
        return $data;  
} 
require_once dirname(__FILE__) .'/config.php';


if(is_array($_GET)&&count($_GET)>0)//先判断是否通过get传值了
{
	if(isset($_GET["code"]))//是否存在"code"的参数3d4fba5e4ef08a11d60ccf1bc9fc217f
	{
		//https://openapi.baidu.com/oauth/2.0/token?grant_type=authorization_code&code=ANXxSNjwQDugOnqeikRMu2bKaXCdlLxn&client_id=Va5yQRHlA4Fq4eR3LT0vuXV4&client_secret=0rDSjzQ20XUj5itV7WRtznPQSzr5pVw2&redirect_uri=http://127.0.0.1/baidulixiandown/getkey.php?token
	$code=$_GET["code"];
	$data2=getHTTPS("https://openapi.baidu.com/oauth/2.0/token?grant_type=authorization_code&code=$code&client_id=$client_id&client_secret=$client_secret&redirect_uri=$redirect_uri");	
	/*$post_data = array () ;
$post_data [ 'code' ] =$code ;
$post_data [ 'client_id' ] =$client_id ;
$post_data [ 'client_secret' ] =$client_secret ;
$post_data [ 'redirect_uri' ] = $redirect_uri ;
$url = 'https://openapi.baidu.com/oauth/2.0/token ' ;
$referrer = "" ;
// parsing the given URL 
$URL_Info = parse_url ( $url ) ;
// Building referrer 
if ( $referrer == "" ) // if not given use this script as referrer 
$referrer = $_SERVER [ " SCRIPT_URI " ] ;
 
// making string from $data 
foreach ( $post_data as $key => $value ) 
$values [] = " $key = " . urlencode ( $value ) ;
 
$data_string = implode ( " & " , $values ) ;
// Find out which port is needed - if not given use standard (=80) 
if ( ! isset ( $URL_Info [ " port " ])) 
$URL_Info [ " port " ] = 80 ;
// building POST-request: 
$request .= " POST " . $URL_Info [ " path " ] . " HTTP/1.1 /n " ;
$request .= " Host: " . $URL_Info [ " host " ] . " /n " ;
$request .= " Referer: $referrer /n " ;
$request .= " Content-type: application/x-www-form-urlencoded /n " ;
$request .= " Content-length: " . strlen ( $data_string ) . " /n " ;
$request .= " Connection: close /n " ;
$request .= " /n " ;
$request .= $data_string . " /n " ;
$fp = fsockopen ( $URL_Info [ " host " ] , $URL_Info [ " port " ]) ;
fputs ( $fp , $request ) ;
while ( ! feof ( $fp )) { 
     $result .= fgets ( $fp , 128 ) ;
} 
fclose ( $fp ) ;*/
	$arrdata=json_decode($data2,ture);
	$access_token =$arrdata["access_token"];
//var_dump($arrdata);
	$at=url_b64encode($access_token);
	//echo $access_token;
	//echo $at;
	header("Location:filelist.php?key={$at}"); 

exit;

	}
}









?>




