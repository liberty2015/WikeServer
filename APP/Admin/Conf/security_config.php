<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/12
 * Time: 10:47
 */
$sysConfig=include('APP/Common/Conf/config.php');
//����������
$security=array(
    //������
    'TOKEN'=>true,
    'TOKEN_NAME'=>'__hash__',
    'TOKEN_TYPE'=>'md5',
    'TOKEN_RESET'=>true,
    //��֤token
    'AUTH_TOKEN'=>'wiadmin',
    //��֤mask
    'AUTH_MASK'=>'wikeadmin',
    //��¼��ʱ
    'LOGIN_TIMEOUT'=>3600,
    //����Ȩ����֤ģʽ
    'USER_AUTH_ON'=>true,
    //��¼��֤ģʽ����Ϊ(1)��¼��֤,2Ϊʵʱ��֤
    'USER_AUTH_TYPE'=>1,
    //��֤ʶ���
    'USER_AUTH_KEY'=>'wiadminae',
    //��������Ա��֤��
    'ADMIN_AUTH_KEY'=>'wikeadmin',
    //��֤�û���ģ��
    'USER_AUTH_MODEL'=>'user',
    //��֤����
    'USER_AUTH_GATEWAY'=>'Login/index',
    //������֤�Ŀ�����
    'NOT_AUTH_MODULE'=>'Login',
    'NOT_AUTH_ACTION'=>'index',
    //������֤��¼��ģ��
    'NOT_LOGIN_MODULES'=>'Login',
    //Ĭ����Ҫ��֤��ģ�顢����
    'REQUIRE_AUTH_MODULE'=>'',
    'REQUIRE_AUTH_ACTION'=>'',
    //��ģ��
    'GROUP_AUTH_NAME'=>'Admin',
    //�οͱ��
    'GUEST_AUTH_ID'=>'guest',
    //�Ƿ����ο���Ȩ����
    'GUEST_AUTH_ON'=>false,
    //��ʦ����Ա��֤��
    'TEACHER_AUTH_KEY'=>'teacher',

    //����Աģ��
    'USER_AUTH_MODEL'=>'Admin',
    //����Ա��
    'ADMIN_TABLE'=>$sysConfig['DB_PREFIX'].'user',
    //�û���Ϣ��
    'USER_TABLE'=>$sysConfig['DB_PREFIX'].'userinfo',
    //��ɫ�����䣩
    'RBAC_ROLE_TABLE'=>$sysConfig['DB_PREFIX'].'role',
    //�û���ɫ�м�����䣩
    'RBAC_USER_TABLE'=>$sysConfig['DB_PREFIX'].'role_user',
    //�ڵ�����䣩
    'RBAC_NODE_TABLE'=>$sysConfig['DB_PREFIX'].'node',
    //Ȩ�ޱ����䣩
    'RBAC_ACCESS_TABLE'=>$sysConfig['DB_PREFIX'].'access',
);
$security['LOGIN_MARKED']=md5($security['AUTH_TOKEN']);
return $security;