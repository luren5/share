<?php
    $yii = dirname(__FILE__).'/framework/yii.php';
    $config = dirname(__FILE__).'/protected/config/main.php';
    
    require_once dirname(__FILE__).'/protected/config/constant.php';
    require_once($yii);
    
    header("Content-type: text/html; charset=utf-8"); 
    Yii::createWebApplication($config)->run();