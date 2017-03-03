<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/20
 * Time: 13:28
 */

namespace Admin\Service;


class CourseTypeService
{
    public function adddirection($name){
        $dirt=M('direction');
        $data['name']=$name;
        $result=$dirt->add($data);
        unset($dirt);
        if($result){
            return array(
                'message'=>'创建成功',
                'status'=>true
            );
        }else{
            return array(
                'message'=>'创建失败',
                'status'=>false
            );
        }
    }
    public function getCourseDirection(){
        $direction=M()->table(C('DB_PREFIX')."direction")->select();
        $course=array();
        foreach($direction as $key=>$value){
            $id=$value['id'];
            $select=M('type')->where("did=$id")->select();
            $cour=array(
                $key=>array(
                    'id'=>$value['id'],
                    'name'=>$value['name'],
                    'course'=>$select
                )
            );
            $course=array_merge($course,$cour);
        }
        return $course;
    }

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
    public function addtype($type){
        $result1=$this->uploadImage($_FILES['image']);
        if($result1['status']){
            $data['tdev']=$result1['save_dev'];
        }else{
            return array(
                'message'=>$result1['message'],
                'status'=>false
            );
        }
        $Type=M('type');
        $Type->startTrans();
        $data['name']=$type['name'];
        $data['did']=$type['did'];
//        dump($data);
        $result=$Type->add($data);
        if($result){
            $Type->commit();
            return array(
                'message'=>'创建成功',
                'status'=>true
            );
        }else{
            $Type->rollback();
            return array(
                'message'=>'创建失败',
                'status'=>false
            );
        }
    }
}