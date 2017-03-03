<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/21
 * Time: 19:44
 */
$upload=array(
    'image'=>array(
        'maxSize'=>3145728,
        'rootPath'=>'./wike/Uploads/',
        'savePath'=>'/image/',
        'exts'=>array('jpg','png','jpeg'),
        'autoSub'=>true,
        'saveName'=>array('uniqid',''),
        'subName'=>array('date','Ymd'),
    ),
    'video'=>array(
        'maxSize'=>0,
        'rootPath'=>'./wike/Uploads/',
        'savePath'=>'/video/',
        'exts'=>array('rmvb','flv','swf','mp4'),
        'autoSub'=>true,
        'saveName'=>array('uniqid',''),
        'subName'=>array('date','Ymd'),
    )
);
return $upload;