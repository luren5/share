<?php
    define('YII_DEBUG',true);
    define('YII_TRACE_LEVEL',3);

    //这里是系统常量
    define('SITE_URL', 'http://192.168.1.6/share/');  
    define('CSS_URL', SITE_URL.'assets/css/');
    define('IMG_URL', SITE_URL.'assets/img/');
    define('JS_URL', SITE_URL.'assets/js/');
    
    define('ATT_URL', dirname(dirname(dirname(__FILE__))).'/attachments/');
    define('ATT_DOWN_URL', SITE_URL.'/attachments/');
    
    define('ADMIN_CSS_URL', SITE_URL.'assets/admin/css/');
    define('ADMIN_IMG_URL', SITE_URL.'assets/admin/images/');
    define('ADMIN_JS_URL', SITE_URL.'assets/admin/js/');

    //redis
    define('RESOURCE_SEARCH_KEY_PREFIX', 'resource_search_lish:');
    define('RESOURCE_SEARCH_KEY_SETS', 'resource_search_key_sets');
    