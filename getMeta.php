<?php

require_once 'libs/BaiduPCS.class.php';
//请根据实际情况更新$access_token
$access_token = '21.70627a563dae15f9a862d03910905f69.2592000.1472196807.353039295-2172157';

$pcs = new BaiduPCS($access_token);
echo $pcs->getQuota();
?>