<?php

require_once 'libs/BaiduPCS.class.php';
$access_token = '23.42dc01e6c819883f43b7816c8d0af24b.2592000.1458225293.3710709496-2172157';
$appName = 'zqqian123';
$root_dir = '/apps' . '/' . $appName . '/';

//起始位置
$start = 0;
//返回多少个
$limit = 10;
//按开始时间升序 or 降序
$asc = 0;
//目标地址URL
$sourceURL = '';
//存放路径
$savePath =  '/apps' . '/' . $appName . '/';
//STARTTIMESTMAP, ENDTIMESTAMP, 如果不限制下限可写成"NULL, 1235", 不限制上线，可写成'1234,NULL'
$createTime = '';
//任务状态过滤
$status = 1;
//是否需要返回任务信息
$needTaskInfo = 1;

$pcs = new BaiduPCS($access_token);
$result = $pcs->listOfflineDownloadTask($start, $limit, $asc, $sourceURL, $savePath, $createTime, $status, $needTaskInfo);
echo $result;
?>