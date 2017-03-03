<?php
$security=include('security_config.php');
$menu= include('menu_config.php');
$upload=include('uploadconfig.php');
$appconfig= array(
	//'配置项'=>'配置值'
//    'DEFAULT_CONTROLLER'=>'Login',
    'PAGE_LIST_ROWS'=>10,
    'UPLOAD_ROOT'=>'',
    'LAYOUT_ON'=>true,
    'LAYOUT_NAME'=>'Common/layout',
    'DEFAULT_CONTROLLER'=>'Login',
    'SECRETKEY'=>'sT3DKbaqWV38XGHzjVCfKcxFfRSz91M6Gcg3RHMU',
    'ACCESSKEY'=>'tGZS9LcwfQ4GwW4j6ZSL4OfESxeDla5pVComsmhv',
    'MENU'=>$menu,
    'Upload'=>$upload,
    'URL_CASE_INSENSITIVE' =>false,
    'UPLOAD_SITEIMG_QINIU'=>array(
        'maxSize'=>5*1024*1024,
        'rootPath'=>'./',
        'saveName'=>array('uniqid',''),
        'driver'=>'Qiniu',
        'driverConfig'=>array(
            'secretKey'=>'sT3DKbaqWV38XGHzjVCfKcxFfRSz91M6Gcg3RHMU',
            'accessKey'=>'tGZS9LcwfQ4GwW4j6ZSL4OfESxeDla5pVComsmhv',
            'domain'=>'7xln7a.media1.z0.glb.clouddn.com',
            'bucket'=>'wike'
        )
    )
);
return array_merge($appconfig,$security);
