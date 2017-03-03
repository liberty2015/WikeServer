<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/15
 * Time: 23:01
 */

namespace Admin\Controller;


use Think\Think;

class CourseController extends CommonController
{
    public function index(){
        trace($_SESSION['current_account']);
        if($_SESSION[C('ADMIN_AUTH_KEY')]){
            if(M('course')->count()==0){
                $this->display('Course/empty');
            }else{
                $Cousr=new \Admin\Model\CourseModel();
                $course=$Cousr->getCourse();
                trace($course,'course');
                trace($_SESSION,'session');
                $this->assign("course",$course);
                $this->display();
            }
        }else{
            $id=$_SESSION['current_account']['id'];
            if(M('course')->where("uid=$id")->count()==0){
                $this->display('Course/empty');
            }else{
                $Cousr=new \Admin\Model\CourseModel();
                $course=$Cousr->getCourse($id);
                trace($course,'course');
                trace($_SESSION,'session');
                $this->assign("course",$course);
                $this->display();
            }
        }
    }
    public function editCourse(){
        $id=$_GET["id"];
        $class=D('Course')->getClass($id);
        if($class!=false){
            $direction=M("direction")->getField('id,name',true);
            $course=M("type")->select();
            $this->assign('direction',$direction);
            $this->assign('course',$course);
            trace($class,"class");
            $this->assign("class",$class);
            $this->display();
        }else{

        }
    }

    /**
     *
     */
    public function checkChapter(){
        $condition['chid']=$_GET['chid'];
        $condition['cid']=$_GET['cid'];
        /**
         *
         */
        $videoData=M("cvideo")->where($condition)->select();
        $count=array();
        $count1=array();
        $count2=array();
        foreach($videoData as $key=>$value){
            $result=M()->query("SELECT COUNT(chid) num FROM wike_stu_chapter WHERE chid=".$value['chid']." AND cid=".$value['cid']." GROUP BY(cid)");
            $count[$key]=$result[0];
            $result1=M()->query("select id,cvcontent from wike_ctest where cvideo_id=".$value['id']);
//            var_dump($result1);
            $count1[$key]=$result1;
        }
        foreach($count1 as $key=>$value){

        }
        //本章节各个视屏试题
        $this->assign('count1',$count1);
//        var_dump($count1);
        //本章节视频学习人数
        $this->assign('count',$count);
        $this->assign('videoData',$videoData);
        $this->display();
    }
    public function updateCourse(){
        $result=D('Course')->updateClass();
        if($result['status']==0){
            $this->ajaxReturn(
                array(
                    'status'=>0,
                    'msg'=>'更新成功！',
                    'FILE'=>$_FILES['image']
                )
            );
        }else if($result['status']==1){
            $this->ajaxReturn(
                array(
                    'status'=>1,
                    'msg'=>'更新失败，请稍后再试！'
                )
            );
        }else{
            $this->ajaxReturn(
                $result
            );
        }
    }
    public function getTestData(){
        $ctestid=$_GET['ctestid'];
        $result=M()->query("SELECT COUNT(stu_id) count,flag FROM `wike_stu_ctest` WHERE ctest_id=".$ctestid." group by (flag)");
        $result1=M()->query("SELECT COUNT(stu_id) count,account FROM `wike_stu_ctest` WHERE ctest_id=".$ctestid." and flag=0 group by (account)");
        $data=array(
            'data1'=>$result,
            'data2'=>$result1
        );
        $this->ajaxReturn($data);
    }
    public function checkCourse(){
        $result=D('Course')->checkClass();
        if($result){
            $_SESSION['cid']=$result['class']['id'];
            $this->assign('course',$result);
            trace($result,'result');
            $this->display();
        }else{
            $this->error();
        }

    }
    public function addCourse(){
        $direction=M("direction")->getField('id,name',true);
        $course=M("type")->select();
        trace($course,'type');
        trace($direction,'direction');
        $this->assign('url',U('Course/createCourse'));
        $this->assign('direction',$direction);
        $this->assign('course',$course);
        $this->display();
    }
    public function test(){
        $config=array(
            'secretKey'=>'sT3DKbaqWV38XGHzjVCfKcxFfRSz91M6Gcg3RHMU',
            'accessKey'=>'tGZS9LcwfQ4GwW4j6ZSL4OfESxeDla5pVComsmhv',
            'domain'=>'7xln7a.media1.z0.glb.clouddn.com',
            'bucket'=>'wike');
        $uploader=new \Think\Upload\Driver\Qiniu\QiniuStorage($config);
        $uptoken=$uploader->UploadToken($config['secretKey'],$config['accessKey'],'');
        $this->assign('uptoken',$uptoken);
        $this->display();
    }
    public function addCVideo(){
        $config=array(
            'secretKey'=>C('SECRETKEY'),
            'accessKey'=>C('ACCESSKEY'),
            'domain'=>'7xln7a.media1.z0.glb.clouddn.com',
            'bucket'=>'wike');
        $uploader=new \Think\Upload\Driver\Qiniu\QiniuStorage($config);
        $uptoken=$uploader->UploadToken($config['secretKey'],$config['accessKey'],'');
        trace($uptoken,"token");
        $this->assign('uptoken',$uptoken);
        $this->assign('cid',$_GET['cid']);
        $this->assign('chid',$_GET['chid']);
        $this->display();
    }
    public function createCourse(){
        $course=$_POST['course'];
//        dump($course);
//        dump($_FILES);
        $Cousr=new \Admin\Model\CourseModel();
        $result=$Cousr->addcourse($course);
        if($result['status']){
            $this->success($result['message'],U("Course/index"),60);
        }else{
            $this->error($result['message']);
        }
    }
    public function createChapter(){
        $chapter=$_POST['chapter'];
        dump($chapter);
        $result=M('chapter')->addAll($chapter);
        if($result){
            $this->success('添加成功',U('Course/index'),60);
        }else{
            $this->error('添加失败',60);
        }
    }
    public function edit(){

    }
    public function addChapter(){
        $id=$_GET['id'];
        $this->assign('id',$id);
        $this->display();
    }
    public function createVideo(){
        $this->uploadVideo();
        $returnData=D('Course')->addCVideo();
        $this->ajaxReturn($returnData);
    }

    private function timpToNum($timepoint){
        $numArr=explode(":",$timepoint);
        return ($numArr[0]*3600+$numArr[1]*60+$numArr[2]);
    }


    private function optionsSum($options,$glue){
        $size=count($options);
        if($size==0){
            $optionsSum=null;
            for($i=0;$i<$size;$i++){
                $optionsSum[$i]=implode($glue,$options);
            }
        }
        return $optionsSum;
    }
    public function uploadVideo(){
        if(!empty($_FILES)){
            $config=C('UPLOAD_SITEIMG_QINIU');
            $upload=new \Think\Upload($config);
            dump($upload);
            $video=$upload->upload($_FILES);
            dump($video);
            if($video){
                foreach($video as $file){
                    echo 'Uploads'.$file['savepath'].$file['savename'];
                }
            }else{
                $this->error($upload->getError());
            }
        }
    }
    public function uploadfile(){
        dump($_FILES);
        $config=C('UPLOAD_SITEIMG_QINIU');
        $upload=new \Think\Upload($config);
        dump($upload);
        $video=$upload->upload($_FILES);
        dump($video);
        if($video){
            echo 'success.';
        }else{
            echo $upload->getError();
        }
    }
}