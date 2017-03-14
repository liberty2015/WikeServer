<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015-10-18
 * Time: 18:35
 */
namespace Home\Controller;

use Home\Model\UserModel;
use Think\Controller;
use Think\Log;

class UserController extends CommonController{
    protected $useModel;
//    public function info(){
//        session_start();
////        $openid=$_SESSION['openid'];
////        $wechat=new Wechat(C('WECHAT_CONF'));
//        $stu_id=session('stu_id');
//        $condition['SID']=$stu_id;
////        $info=M("student_information","")->where($condition)->find();
//        $model=new \Think\Model();
//        $info=$model->query("select Name,SID,College,Specialty,Grade,Class from student_information where SID='$stu_id'");
////        $user=$wechat->getUserInfo($openid);
////        $info["nickname"]=$user["nickname"];
////        $info['headimgurl']=$user["headimgurl"];
//        $this->assign("info",$info);
//        $this->display("User/info");
//    }
    public function course(){
        session_start();
        $stu_id=$_SESSION['stu_id'];
        $condition['stu_id']=$stu_id;
        $StuCour=M('stu_course');
        $courseid=$StuCour->where($condition)->getField("course_id",true);
        if($courseid!=null){
            $Cour=M('course');
            $course=array();
            foreach($courseid as $key=>$id){
                $cour=$Cour->where("id=$id")->select();
                $course[$key]=$cour[0];
            }
            $this->assign("course",$course);
            $this->display('Index/course');
        }else{
            $this->display('Index/empty');
        }
    }

    public function loginByPhone(){
        $loginName=$_POST['loginName'];
        $loginPassword=$_POST['loginPassword'];
        $UserModel=new UserModel();
        $result=$UserModel->loginByPhone($loginName,$loginPassword);
        if ($result){

        }
    }

    public function loginByEmail(){
        $loginName=$_POST['loginName'];
        $loginPassword=$_POST['loginPassword'];
        $UserModel=new UserModel();
        $result=$UserModel->loginByEmail($loginName,$loginPassword);
        if ($result){

        }
    }

    public function registerByPhone(){
        Log::write("日志");
        $stu['phone']=$_POST['loginName'];
        $stu['loginPassword']=$_POST['loginPassword'];
        $stu['gender']=$_POST['gender'];
        $stu['nickName']=$_POST['nickName'];
        $stu['self_describe']=$_POST['self_describe'];
        $stu['head_img']=$_POST['head_img'];
        $stu['page_img']=$_POST['page_img'];
        $stu['name']=$_POST['name'];
        Log::write(dump($_POST));
//        var_dump($stu);
//        var_dump($_POST);
//        print_r($_POST);
        $UserModel=new UserModel();
        $result=$UserModel->registerByPhone($stu);
        if ($result){
            $status=array("success"=>true);
            echo json_encode($status);
        }else {
            $status=array("success"=>false);
            echo json_encode($status);
        }
    }

    public function registerByEmail(){
//        dump($_POST);
        $stu['email']=$_POST['loginName'];
        $stu['loginPassword']=$_POST['loginPassword'];
        $stu['gender']=$_POST['gender'];
        $stu['nickName']=$_POST['nickName'];
        $stu['self_describe']=$_POST['self_describe'];
        $stu['head_img']=$_POST['head_img'];
        $stu['page_img']=$_POST['page_img'];
        $stu['name']=$_POST['name'];
        $UserModel=new UserModel();
        $result=$UserModel->registerByEmail($stu);
        if ($result){
            $status=array("success"=>true);
            echo json_encode($status);
        }else {
            $status=array("success"=>false);
            echo json_encode($status);
        }
    }
}