<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/28
 * Time: 0:48
 */

namespace Home\Controller;


class CourseController extends CommonController
{
    public function course(){
        $type=$_GET['id'];
        $Cour=M('course');
        $count=$Cour->where("type=$type")->count();
        if($count!=0){
            $p=getpage($count);
            $list=$Cour->where("type=$type")->order('id asc')->limit($p->firstRow,$p->listRows)->select();
//        $course=M('course')->where("type=$type")->select();
            $this->assign('course',$list);
//        $this->assign('log',$list);
            $this->assign('page',$p->show());
//            $this->assign('openid',session('openid'));
            $this->display('Index/course');
        }else{
            $this->display('Index/empty');
        }
    }
    public function chapter(){
        $id=$_GET['id'];

        $this->stucourse($id);
        $course=M('course')->where("id=$id")->select();
        $chapter=D('Index','Service')->getChapter($id);
//        dump($course);
//        dump($chapter);
//        trace($course,'course');
//        trace($chapter,'chapter');
        $this->assign('course',$course);
        $this->assign('Chapter',$chapter);
        $this->display('Index/chapter');
    }
    private function stucourse($id){
        session_start();
        $condition['stu_id']=$_SESSION['stu_id'];
        $condition['course_id']=$id;
        $course=M('stu_course');
        $courseinfo=$course->where($condition)->select();
        if($courseinfo==null){
            M()->startTrans();
            $data['course_id']=$id;
            $data['stu_id']=$_SESSION['stu_id'];
            $result=M('stu_course')->add($data);
            if($result){
                $result1=M('course')->execute("update wike_course set unum=unum+1 WHERE id=$id");
                if($result1){
                    M()->commit();
                }else{
                    M()->rollback();
                }
            }else{
                M()->rollback();
            }
        }
    }
    public function comAnswer(){

//        var_dump($_GET);
        $result=D("Course")->checkAnswer();
        if($result!=null){
            $this->ajaxReturn($result);
        }else{
            $this->ajaxReturn(array(
                "status"=>1,
                "msg"=>"回答错误"
            ));
        }
    }
    public function getTestPoint(){
        $videoId=$_GET['vid'];
        $chid=$_GET['chid'];
        $cid=$_GET['cid'];
        $result=D("Course")->getTimePoint($videoId,$chid,$cid);
        $this->ajaxReturn($result);
    }
//    private function u
}