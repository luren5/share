<?php
//$redis = new Redis();
//$redis->connect('127.0.0.1',6379);
//$redis->set('test','hello world!');
//echo $redis->get('test');
//echo 898; die();  

    $yii = dirname(__FILE__).'/framework/yii.php';
    $config = dirname(__FILE__).'/protected/config/main.php';
    
    require_once dirname(__FILE__).'/protected/config/constant.php';
    require_once($yii);
    
    header("Content-type: text/html; charset=utf-8"); 
    Yii::createWebApplication($config)->run();
    