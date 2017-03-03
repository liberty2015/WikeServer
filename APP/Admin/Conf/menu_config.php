<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/11
 * Time: 21:42
 */
//后台系统管理员版菜单设置
$Menu=array(
    //后台首页
    'Index'=>array(
        'name'=>'首页',
        'target'=>'Index/index',
        'sub_menu'=>array(
            array('item'=>array('Tndex/index'=>'概要信息')),
            array('item'=>array('Index/editPassword'=>'修改密码')),
            array('item'=>array('Index/userInfo'=>'个人信息')),
        )
    ),
    //课程管理
    'Course'=>array(
        'name'=>'课程管理',
        'target'=>'Course/index',
        'sub_menu'=>array(
            array('item'=>array('Course/index'=>'查看课程')),
            array('item'=>array('Course/addCourse'=>'添加课程')),
        )
    ),
    //课程类型
    'CourseType'=>array(
        'name'=>'课程类型',
        'target'=>'CourseType/index',
        'sub_menu'=>array(
            array('item'=>array('CourseType/index'=>'查看课程类型')),
            array('item'=>array('CourseType/addDirection'=>'添加课程方向')),
        )
    ),
    //用户管理
    'UserManger'=>array(
        'name'=>'用户管理',
        'target'=>'UserManger/index',
        'sub_menu'=>array(
            array('item'=>array('UserManger/index'=>'用户列表')),
            array('item'=>array('UserManger/add'=>'添加用户')),
        )
    ),
    //每日推送
    'MessagePush'=>array(
        'name'=>'每日推送',
        'target'=>'MessagePush/editMessage',
        'sub_menu'=>array(
            array('item'=>array('MessagePush/editMessage'=>'消息编辑')),
        )
    ),
    //日志系统
    'LogSystem'=>array(
        'name'=>'日志管理',
        'target'=>'LogSystem/loginLog',
        'sub_menu'=>array(
            array('item'=>array('LogSystem/loginLog'=>'登录日志')),
            array('item'=>array('LogSystem/sendLog'=>'推送日志')),
        )
    ),
);

return $Menu;