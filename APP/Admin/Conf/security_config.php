<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/12
 * Time: 10:47
 */
$sysConfig=include('APP/Common/Conf/config.php');
//表单令牌设置
$security=array(
    //表单令牌
    'TOKEN'=>true,
    'TOKEN_NAME'=>'__hash__',
    'TOKEN_TYPE'=>'md5',
    'TOKEN_RESET'=>true,
    //认证token
    'AUTH_TOKEN'=>'wiadmin',
    //认证mask
    'AUTH_MASK'=>'wikeadmin',
    //登录超时
    'LOGIN_TIMEOUT'=>3600,
    //开启权限认证模式
    'USER_AUTH_ON'=>true,
    //登录认证模式设置为(1)登录认证,2为实时认证
    'USER_AUTH_TYPE'=>1,
    //认证识别号
    'USER_AUTH_KEY'=>'wiadminae',
    //超级管理员认证号
    'ADMIN_AUTH_KEY'=>'wikeadmin',
    //验证用户表模型
    'USER_AUTH_MODEL'=>'user',
    //认证网关
    'USER_AUTH_GATEWAY'=>'Login/index',
    //无需认证的控制器
    'NOT_AUTH_MODULE'=>'Login',
    'NOT_AUTH_ACTION'=>'index',
    //无需认证登录的模块
    'NOT_LOGIN_MODULES'=>'Login',
    //默认需要认证的模块、方法
    'REQUIRE_AUTH_MODULE'=>'',
    'REQUIRE_AUTH_ACTION'=>'',
    //主模块
    'GROUP_AUTH_NAME'=>'Admin',
    //游客标记
    'GUEST_AUTH_ID'=>'guest',
    //是否开启游客授权访问
    'GUEST_AUTH_ON'=>false,
    //教师管理员认证号
    'TEACHER_AUTH_KEY'=>'teacher',

    //管理员模型
    'USER_AUTH_MODEL'=>'Admin',
    //管理员表
    'ADMIN_TABLE'=>$sysConfig['DB_PREFIX'].'user',
    //用户信息表
    'USER_TABLE'=>$sysConfig['DB_PREFIX'].'userinfo',
    //角色表（必配）
    'RBAC_ROLE_TABLE'=>$sysConfig['DB_PREFIX'].'role',
    //用户角色中间表（必配）
    'RBAC_USER_TABLE'=>$sysConfig['DB_PREFIX'].'role_user',
    //节点表（必配）
    'RBAC_NODE_TABLE'=>$sysConfig['DB_PREFIX'].'node',
    //权限表（必配）
    'RBAC_ACCESS_TABLE'=>$sysConfig['DB_PREFIX'].'access',
);
$security['LOGIN_MARKED']=md5($security['AUTH_TOKEN']);
return $security;