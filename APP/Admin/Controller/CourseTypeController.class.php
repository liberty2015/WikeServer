<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/15
 * Time: 23:06
 */

namespace Admin\Controller;


class CourseTypeController extends CommonController
{
    //查看类型页面
    public function index(){
        if(M('direction')->count()==0){
            $this->display('CourseType/empty');
        }else{
            $course=D('CourseType','Service')->getCourseDirection();
            $this->assign('direction',$course);
            $this->display();
        }
    }
    //添加方向页面
    public function addDirection(){
//        $url=U('CourseType/createDirection');
//        $this->assign('url',$url);
        $this->display();
    }
    //添加类型页面
    public function addType(){
        $this->assign('did',$_GET['id']);
        $this->display();
    }
    //创建方向
    public function createDirection(){
        $course=D('CourseType','Service');
        $name=$_POST['direction'];
        $result=$course->adddirection($name);
        if($result['status']){
            $this->success($result['message'],U('CourseType/index'));
        }else{
            $this->error($result['message']);
        }
    }
    //创建类型
    public function createType(){
        $course=D('CourseType','Service');
        $type=$_POST['type'];
        $result=$course->addtype($type);
        if($result['status']){
            dump($_POST);
            $this->success($result['message'],U('CourseType/index'));
        }else{
            $this->error($result['message']);
        }
    }
    //
    public function type(){
        $id=$_GET['id'];
        $name=M('direction')->where("id=$id")->getField('name');
        $info=M('type')->where("did=$id")->select();
        $this->assign('id',$id);
        $this->assign('name',$name);
        $this->assign('info',$info);
        $this->display();
    }
}