<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/15
 * Time: 23:13
 */

namespace Admin\Controller;


class LogSystemController extends CommonController
{
    //登录日志
    public function loginLog(){
        $log=$this->getLog('loginlog');
        trace($_SESSION,'session');
        $page=$log[0];
        $list=$log[1];
        $this->assign('log',$list);
        $this->assign('page',$page->show());
        $this->display();
    }
    //获取日志
    private function getLog($action){
        $Log=M($action);
        if($_SESSION[C('ADMIN_AUTH_KEY')]){
            $count=$Log->count();
            $p=getpage($count);
            $list=$Log->order('id asc')->limit($p->firstRow,$p->listRows)->select();
            return array($p,$list);
        }else{
            $email=$_SESSION['current_account']['email'];
            $count=$Log->where("email='$email'")->count();
            $p=getpage($count);
            $list=$Log->where("email='$email'")->order('logintime desc')->limit($p->firstRow,$p->listRows)->select();
            return array($p,$list);
        }
    }
}