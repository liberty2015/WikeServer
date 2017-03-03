<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/13
 * Time: 0:17
 */
namespace Admin\Service;
use Admin\Service;
class AdminService extends CommonService{
    //登录验证操作
    public function login($admin){
        $Admin=$this->getM($this->getModelName());
        //邮箱验证�
        if(!$this->existAccount($admin['email'])){
            return array("message"=>'邮箱不存在',
                "status"=>false,
                );
        }
        $account=$Admin->where("email='{$admin['email']}'")->find();
        //密码验证
        if($account['password']!=$this->encrypt($admin['password'])){
            return array("message"=>'密码不正确',
                "status"=>false,
                );
        }
        $loginMarked=C('LOGIN_MARKED');
        $shell=$this->genShell($account['id'],$account['password']);
        //生成session
        $_SESSION[$loginMarked]=$shell;
        $_SESSION['current_account']=$account;
        //生成cookie
        $shell.='_'.time();
        setcookie($loginMarked,$shell,0,'/');

        //权限认证
        if(C('USER_AUTH_ON')){
            $_SESSION[C('USER_AUTH_KEY')]=$account['id'];
            if($account['is_super']){
                $_SESSION[C('ADMIN_AUTH_KEY')]=true;
            }else{
                $_SESSION[C('ADMIN_AUTH_KEY')]=false;
            }
            //缓存访问权限
            \Org\Util\Rbac::saveAccessList();

        }
        //更新最后登录时间
        $Admin->where("id={$account['id']}")->save(array('logintime'=>time()));
        $this->loginlog($admin['email']);
        return array("message"=>"登录验证成功",
            "status"=>true,
            );
    }
    //登出操作
    public function logout(){
        $this->unsetLoginMarked();
        if(C('USER_AUTH_ON')){
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION[C('ADMIN_AUTH_KEY')]);
        }
        session_destroy();
    }
    //获取模型名
    public function getModelName(){
        return 'User';
    }
    //是否存在账号
//    public function existAccount($email){
//        if($this->getM($this->getModelName())->where("email='{$email}'")->count()>0){
//            return true;
//        }
//        return false;
//    }
    //密码加密ݼ���
//    private function encrypt($data){
////        echo C('AUTH_MASK').$data;
////        echo md5(C('AUTH_MASK').md5($data));
//        return md5(C('AUTH_MASK').md5($data));
//    }
    //�生成shell
    private function genShell($id,$password){
        return md5($password.C('AUTH_TOKEN')).$id;
    }
    //销毁登录标记
    private function unsetLoginMarked(){
        $loginMarked=C('LOGIN_MARKED');
        setcookie("{$loginMarked}",null,-3600,'/');
        unset($_SESSION[$loginMarked],$_COOKIE[$loginMarked]);
        return;
    }
    //检查登录状态
    public function checkLogin(){
        $loginMarked=C('LOGIN_MARKED');
        //是否已登录
        if(!isset($_COOKIE[$loginMarked])){
            return array("message"=>'尚未登录，请先登录！',
                "status"=>false);
        }
        //是否登录超时
        $cookie=explode('_',$_COOKIE[$loginMarked]);
        $timeout=C('LOGIN_TIMEOUT');
//        dump($_COOKIE);
        if(time()>end($cookie)+$timeout){
            $this->unsetLoginMarked();
            return array("message"=>'登录超时，请重新登录！',
                "status"=>false);
        }
//        //是否账号异常
//        if($cookie[0]!=$_SESSION[$loginMarked]){
//            $this->unsetLoginMarked();
//            return array("message"=>'账号异常，请重新登录！',
//                "status"=>false);
//        }
        //重新设置过期时间
        setcookie($loginMarked,$cookie[0].'_'.time(),0,'/');
        return array("message"=>"",
            "status"=>true);
    }
    //登记登录日志
    private function loginlog($email){
        $data['host']=get_client_ip(0);
        $data['email']=$email;
        $data['logintime']=time();
        M('loginlog')->add($data);
    }

}