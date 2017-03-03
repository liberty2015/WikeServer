<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/15
 * Time: 23:09
 */

namespace Admin\Controller;


class UserMangerController extends CommonController
{
    //查看用户列表
    public function index(){
        $user=D('User','Service');
        $userTable=$user->getUserTable();
        $urllist=$user->getUrl("getUserInfo",$userTable);
        $urllist1=$user->getUrl("edit",$userTable);
        $urllist2=$user->getUrl('delete',$userTable);
        trace($userTable,'userTable');
        trace(CONTROLLER_NAME,"CONTROLLER");
        trace(strtolower(ACTION_NAME),"ACTION");
        trace($urllist,"url");
        unset($user);
        $this->assign("userTable",$userTable);
        $this->assign("url",$urllist);
        $this->assign("url1",$urllist1);
        $this->assign("url2",$urllist2);
        $this->display();
    }

    //用户编辑页面
    public function edit(){
        $user=D('User','Service');
        $userid=$_GET['id'];
        $userinfo=$user->getUserTable($userid);
        $rolelist=$user->getRoleList();
        $this->assign('userinfo',$userinfo);
        $this->assign('role',$rolelist);
        trace($rolelist,'role');
        trace($userinfo,'userinfo');
        unset($user);
        $this->assign('url',U('UserManger/submitUserinfo'));
        $this->display();
    }
    //提交更新信息
    public function submitUserinfo(){
        $userinfo=$_POST['user'];
        if(isset($userinfo)){
            $update=D('User','Service');
            $result=$update->update($userinfo);
            if(!$result['status']){
                $this->error($result['message']);
            }else{
                $this->success($result['message'],U('UserManger/index'));
            }
        }else{
            $this->error('更新失败');
        }
    }
    //创建用户
    public function addUser(){
        $userinfo=$_POST['user'];
        if(isset($userinfo)){
            $adduser=D('User','Service');
            $result=$adduser->adduser($userinfo);
            if(!$result['status']){
                $this->error($result['message']);
            }else{
                $this->success($result['message'],U('UserManger/index'));
            }
        }else{
            $this->error('添加失败');
        }
    }
    //添加用户页面
    public function add(){
        $user=D('User','Service');
        $rolelist=$user->getRoleList();
        $this->assign('role',$rolelist);
        $this->assign('url',U('UserManger/addUser'));
        unset($user);
        $this->display();
    }
    //删除用户
    public function delete(){
        $id=$_GET['id'];
        if(!isset($id)){
            $this->error('删除失败');
        }
        $del=D('User','Service');
        $result=$del->deleteUser($id);
        if($result['status']){
            $this->success($result['message'],U('UserManger/index'));
        }else{
            $this->error('删除失败');
        }
    }
    //用户信息页面
    public function getUserInfo(){
        $userid=$_GET['id'];
        $user=D('User','Service');
        $userinfo=$user->getUserTable($userid);
        trace($userinfo,"userinfo");
        unset($user);
        $this->assign("userinfo",$userinfo);
        $this->display("UserManger:userinfo");
    }
}