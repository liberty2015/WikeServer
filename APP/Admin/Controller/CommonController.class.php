<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/13
 * Time: 19:03
 */
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    public function _initialize(){
        //登录过滤
        $notLoginModules=explode(',',C('NOT_LOGIN_MODULES'));
        if(!in_array(CONTROLLER_NAME,$notLoginModules)){
            $this->filterLogin();
        }
        //权限过滤
        $this->filterAccess();
        //菜单分配
        $noMenuModules=array('Login');
        if(!in_array(CONTROLLER_NAME,$noMenuModules)){
            //分配菜单
            $this->assignMenu();
        }
    }
    //登陆过滤
    protected function filterLogin(){
        $result=D('Admin','Service')->checkLogin();
        if(!$result['status']){
//            dump($_COOKIE);
            return $this->error($result['message'],U('Login/index'));
        }
    }
    //权限过滤
    protected function filterAccess(){
        if(!C('USER_AUTH_ON')){
            return ;
        }
//        $testBool=\Org\Util\Rbac::AccessDecision();
//        trace($testBool,'testBool');
//        dump($_SESSION,'SESSION');
        if(\Org\Util\Rbac::AccessDecision()){
            return ;
        }
        if(!$_SESSION[C('USER_AUTH_KEY')]){
            //登录认证号不存在
            return $this->redirect(C('USER_AUTH_GATEWAY'));
        }
        if('Login'==CONTROLLER_NAME && 'index'==ACTION_NAME){
            //首页无法进入，则登出账号
            D('Admin','Service')->logout();
        }
        return $this->error("您没有权限执行该操作");
    }
    //空操作
    public function _empty(){
        $this->error("您访问的页面不存在!");
    }
    //获取菜单
    protected function getMenu(){
        $menu=C('MENU');
        //主菜单
        $main_menu=array();
        //获取权限列表
        $access=$_SESSION['_ACCESS_LIST'];
        if(empty($access)){
            $authId=$_SESSION[C('USER_AUTH_KEY')];
            $access=\Org\Util\Rbac::getAccessList($authId);
        }
        $authGroup=strtoupper(C('GROUP_AUTH_NAME'));
        //获取主菜单
        foreach($menu as $key =>$menuItem){
            //不显示无权访问的主菜单
            if(!$_SESSION[C('ADMIN_AUTH_KEY')]&&!array_key_exists(strtoupper($key),$access[$authGroup])){
                continue;
            }
            $main_menu[$key]['name']=$menuItem['name'];
            $main_menu[$key]['target']=$menuItem['target'];
            //若默认的target用户无权访问，则显示sub_menu中的用户有权访问的第一个页面
            $actions=$access[$authGroup][strtoupper($key)];
            $action=explode('/',strtoupper($main_menu[$key]['target']));
            while(!$_SESSION[C('ADMIN_AUTH_KEY')]&&!array_key_exists($action[1],$actions)){
                $nextSubMenu=next($menu[$key]['sub_menu']);
                if(empty($nextSubMenu))break;
                $main_menu[$key]['target']=key(current($nextSubMenu));
                $action=explode('/',strtoupper($main_menu[$key]['target']));
            }
        }
        //子菜单
        $sub_menu=array();
        $ctrlName=CONTROLLER_NAME;
        $actions=$access[$authGroup];
//        trace($actions,'actions');
//        trace($access,'access');
        foreach($menu[$ctrlName]['sub_menu'] as $subitem){
//            trace($subitem,'subitem');
            $subkey=array_keys($subitem['item']);
            $route=array_shift($subkey);
            $action=explode('/',strtoupper($route));
//            trace($action,'action');
//            trace($route,'route');
            //不显示无权访问的子菜单
            if(!$_SESSION[C('ADMIN_AUTH_KEY')]
                &&(!array_key_exists($action[0],$actions)
                ||!array_key_exists($action[1],$actions[$action[0]]))){
                continue;
            }
            //判断子菜单是否配置
            if(!isset($subitem['item'])||empty($subitem['item'])){
                continue;
            }
            $routes=array_keys($subitem['item']);
//            trace($route,'route');
//            trace($routes,'routes');
            $itemName=array_values($subitem['item']);
//            trace($subitem,'subitem');
//            trace($itemName,'itemName');
            $sub_menu[$routes[0]]=$itemName[0];
        }
        unset($menu);
//        trace($sub_menu,'sub_menu');
        return array(
            'main_menu'=>$main_menu,
            'sub_menu'=>$sub_menu
        );
    }
    //分配菜单
    protected function assignMenu(){
        $menu=$this->getMenu();
//        trace($menu,'menu');
        $this->assign('main_menu',$menu['main_menu']);
        $this->assign('sub_menu',$menu['sub_menu']);
    }

    protected function getM($modelname){
        return M($modelname);
    }
    protected function returnMsgData($msg,$status){
        return array(
            'msg'=>$msg,
            'status'=>$status
        );
    }
}