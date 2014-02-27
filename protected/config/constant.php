<?php
    define('YII_DEBUG',true);
    define('YII_TRACE_LEVEL',3);

    // system constant
    define('SITE_URL', 'http://share.com:8080/');  
    define('CSS_URL', SITE_URL.'assets/css/');
    define('IMG_URL', SITE_URL.'assets/img/');
    define('JS_URL', SITE_URL.'assets/js/');
    
    //dir
    define('ASSETS_DIR', dirname(dirname(dirname(__FILE__))).'/assets/');
    
    define('ATT_URL', dirname(dirname(dirname(__FILE__))).'/attachments/');
    define('ATT_DOWN_URL', SITE_URL.'/attachments/');
    
    define('ADMIN_CSS_URL', SITE_URL.'assets/admin/css/');
    define('ADMIN_IMG_URL', SITE_URL.'assets/admin/images/');
    define('ADMIN_JS_URL', SITE_URL.'assets/admin/js/');

    //redis
    define('RESOURCE_SEARCH_KEY_PREFIX', 'resource_search_lish:');
    define('RESOURCE_SEARCH_KEY_SETS', 'resource_search_key_sets');
    
    //mail
    define('EMAIL_SMTP_HOST', 'smtp.163.com');
    define('EMAIL_USERNAME', 'hgdshare@163.com');
    define('EMAIL_PASSWORD', 'hgdonline');
    define('EMAIL_FROM', 'hgdshare@163.com');
    define('EMAIL_FROM_NAME', '湖工大爱分享网');
    
    
