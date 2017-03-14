<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/11
 * Time: 20:00
 */
namespace Admin\Controller;
use Admin\Service\CommonService;
use Think\Controller;
use Think\Log;

class LoginController extends Controller{
    //登录页面
    public function index(){
        layout(false);
        trace($_SESSION,'session');
        $this->display();
    }
    //验证码检测
    function check_verify($code,$id=''){
        $verify=new \Think\Verify();
        return $verify->check($code,1);
    }
    //登录验证操作
    public function login(){
        Log::write("日志");
        if(empty($_POST['email'])){
//            dump($_POST);
//            $this->assign('witeSecond');

            $this->error("请填写登录邮箱！");
        }
        if(empty($_POST['password'])){
            $this->error("请输入密码");
        }
        if(!M('User')->autoCheckToken($_POST)){
            $this->error("登录令牌超时");
        }
//         if(!$this->check_verify($_POST['verify_code'])){
// //            dump($_POST);
// //            dump($_SESSION);
// //            echo md5($_POST['verify_code']);
//             $this->error('验证码不正确');
//         }
//        
        $admin['email']=$_POST['email'];
        $admin['password']=$_POST['password'];
        $adminService=D('Admin','Service');
        //$admin=$_POST['admin'];
        //登录认证
        $result=$adminService->login($admin);
        if($result['status']){
            $this->success($result['message'],U("Index/index"));
        }else{
//            dump($_POST);
            $this->error($result['message']);
        }
    }
    //生成验证码
    public function verify(){
//        import("ORG.Util.Image");
        ob_clean();
        $Verify=new \Think\Verify();
        $Verify->fontSize=20;
        $Verify->length=4;
        $Verify->entry(1);
    }
    //登录操作
    public function logout(){
        D('Admin','Service')->logout();
        $this->success("登出成功！",U('Login/index'));
    }

    public function register(){

    }
}