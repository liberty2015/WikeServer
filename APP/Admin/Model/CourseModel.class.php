<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/24
 * Time: 23:11
 */

namespace Admin\Model;
use Think\Model;

class CourseModel extends Model
{
    public function uploadImage($file){
        $config=C('Upload');
        $upload=new \Think\Upload($config['image']);
        $info=$upload->uploadOne($file);
        if(!$info){
            return array(
                'message'=>$upload->getError(),
                'status'=>false
            );
        }else{
            return array(
                'save_dev'=>'Uploads'.$info['savepath'].$info['savename'],
                'status'=>true
            );
        }
    }
    public function getClass($id){
        if($id!=null){
            $condition['id']=$id;
            $class=$this->table(C('DB_PREFIX')."course")->where($condition)->select();
            trace($class,"class");
//            $dir=$class[0]['direction'];
//            $condition['id']=$dir;
//            $dirname=$this->table(C('DB_PREFIX')."direction")->where($condition)->getField("name");
//            trace($dirname,"dirname");
//            $class[0]['direction']=$dirname;
//            $type=$class[0]['type'];
//            $condition['id']=$type;
//            $typename=$this->table(C('DB_PREFIX')."type")->where($condition)->getField("name");
//            trace($typename,"typename");
//            $class[0]['type']=$typename;
            return $class;
        }else{
            return false;
        }
    }
    public function checkClass(){
        $id=$_GET['id'];
        if($id!=null){
            $condition['id']=$id;
            $class=$this->table(C('DB_PREFIX')."course")->where($condition)->select();
            if($class!=null||$class!=false){
            $dir=$class[0]['direction'];
            $condition['id']=$dir;
            $dirname=$this->table(C('DB_PREFIX')."direction")->where($condition)->getField("name");
            trace($dirname,"dirname");
            $class[0]['direction']=$dirname;
            $type=$class[0]['type'];
            $condition['id']=$type;
            $typename=$this->table(C('DB_PREFIX')."type")->where($condition)->getField("name");
            trace($typename,"typename");
            $class[0]['type']=$typename;
                $condition1['cid']=$id;
//                $chapter=$this->table(C('DB_PREFIX')."chapter")->where($condition1)->getField('chname',true);
//                $chapter=$this->table(C('DB_PREFIX')."chapter")->where($condition1)->field('chname')->select();
                $chapter=$this->query("select * from wike_chapter where cid='$id'");
                if($chapter!=null||$chapter!=false){
                    $course=array(
                        'class'=>$class[0],
                        'chapter'=>$chapter
                    );
                    return $course;
                }else{

                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function updateClass(){
        $course=$_POST['course'];
        $id=$course['id'];
        if($id!=null){
            trace($_FILES,'File');
            if(!empty($_FILES['image']['tmp_name'])){
                $result=$this->uploadImage($_FILES['image']);
                if($result["status"]){
                    $course['pdev']= $result['save_dev'];
                    $condition['id']=$id;
                    $result1=$this->table(C('DB_PREFIX')."course")->where($condition)->save($course);
                    if($result1===false){
                        return array(
                            'status'=>1
                        );
                    }else{
                        return array(
                            'status'=>0
                        );
                    }
                }else{
                    return array(
                        'status'=>2,
                        'msg'=>$result['message']
                    );
                }
            }else{
                $condition['id']=$id;
                $result1=$this->table(C('DB_PREFIX')."course")->where($condition)->save($course);
                if($result1){
                    return array(
                        'status'=>0
                    );
                }else{
                    return array(
                        'status'=>1
                    );
                }
            }

        }
    }
    private function timpToNum($timepoint){
        $numArr=explode(":",$timepoint);
        return ($numArr[0]*3600+$numArr[1]*60+$numArr[2]);
    }


    private function optionsSum($options,$glue){
        $optionsSum=null;
        $size=count($options);
        if($size>0){
            for($i=0;$i<$size;$i++){
                $optionsSum[$i]=implode($glue,$options[$i]);
            }
        }
        return $optionsSum;
    }
    private function answerSum($answer){
        $size=count($answer);
        $answerSum=null;
        for($i=0;$i<$size;$i++){
            $answerSum[$i]=implode("-",$answer[$i]);
        }
        return $answerSum;
    }
    public function addCVideo(){
        $cvideo=$_POST['cvideo'];
        $cytype=$_POST['cytype'];
        $time=$_POST['time'];
        $options=$this->optionsSum($_POST['options'],"///");
        $cvcontent=$_POST['cvcontent'];
        $answer=$this->answerSum($_POST['answer']);
        $cvanalysis=$_POST['$cvanalysis'];
        $this->startTrans();
        $result=M('cvideo')->add($cvideo);
        $CVTest=M('ctest');
        if($result){
            if($cytype!=null){
                $size=count($cytype);
                for($i=0;$i<$size;$i++){
                    $ctitem=array(
                        "cvideo_id"=>$result,
                        "cvcontent"=>$cvcontent[$i],
                        "cvanswer"=>$answer[$i],
                        "cvtimepoint"=>$this->timpToNum($time[$i]),
                        "cvoptions"=>$options[$i],
                        "cvtype"=>$cytype[$i],
                        "cvanalysis"=>$cvanalysis[$i]
                    );
                    $result1=$CVTest->add($ctitem);
                    if(!$result1){
                        $this->rollback();
                        return array(
                            'msg'=>"添加失败",
                            'status'=>1
                        );
//                        $this->ajaxReturn($this->returnMsgData("添加失败",1));
                        break;
                    }
                }
                if($i==$size){
                    $this->commit();
                    return array(
                        'msg'=>"添加成功",
                        'status'=>0
                    );
//                    $this->ajaxReturn($this->returnMsgData("添加成功",0));
                }

            }
//            $this->success('添加成功',U('Course/index'));

        }else{
            dump($cvideo);
//            $this->ajaxReturn($this->returnMsgData("添加失败",1));
            return array(
                'msg'=>"添加失败",
                'status'=>1
            );
//            $this->error('添加失败','',100);
        }
    }
    public function addcourse($course)
    {
        $result1 = $this->uploadImage($_FILES['image']);
        $data = $course;
        $data['uid']=$_SESSION[C('USER_AUTH_KEY')];
        if ($result1['status']) {
            $data['pdev'] = $result1['save_dev'];
        } else {
            return array(
                'message' => $result1['message'],
                'status' => false
            );
        }
//        dump($data);
//        $Course = new Model();
        $this->startTrans();
//        $Course->startTrans();
        $result = $this->Table(C('DB_PREFIX')."course")->add($data);
        echo $result;
        if ($result) {
            if ($data['chapter'] != null) {
                $chapter = $data['chapter'];
//                foreach ($chapter as $value) {
//                    $value['cid'] = $result1;
//                }
                $count=count($chapter);
                for($i=0;$i<$count;$i++){
                    $chapter[$i]['cid']=$result;
                }
                $result1 = $this->table(C('DB_PREFIX').'chapter')->addAll($chapter);
                if($result1){
                    $this->commit();
                    return array(
                        'message'=>'添加成功',
                        'status'=>true
                    );
                }else{
                    $this->rollback();
                    return array(
                        'message'=>'添加失败',
                        'status'=>false
                    );
                }
            }
        }
    }

    public function getCourse($uid=""){
        if($uid=="") {
            $course = M()->table(C('DB_PREFIX') . "course")->select();
        }else{
            $condition['uid']=$uid;
            $course = M()->table(C('DB_PREFIX') . "course")->where($condition)->select();
        }
        $Course=array();
        if($course!=null){
            foreach($course as $key=>$value){
                $id=$value['id'];
                $select=M('chapter')->where("cid=$id")->select();
                $cour=array(
                    $key=>array(
                        'id'=>$value['id'],
                        'name'=>$value['cname'],
                        'chapter'=>$select
                    )
                );
                $Course=array_merge($Course,$cour);
            }
        }
        return $Course;
    }
}