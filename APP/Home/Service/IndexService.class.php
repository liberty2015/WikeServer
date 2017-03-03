<?php

/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/23
 * Time: 14:30
 */
namespace Home\Service;
use Think\Model;
class IndexService
{
    public function getCourseType(){
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
    public function getChapter($cid=""){
        $chapter=M()->table(C('DB_PREFIX')."chapter")->where("cid=$cid")->select();
        session_start();
        $stu_id=$_SESSION['stu_id'];
        $course=array();
        foreach($chapter as $key=>$value){
            $id=$value['id'];
            $select=M('cvideo')->where("cid=$cid and chid=$id")->select();
            $condition['stu_id']=$stu_id;
            $condition['cid']=$cid;
            $condition['chid']=$id;
            foreach($select as $key1=>$value1){
                $condition['cvideo_id']=$select[$key1]['id'];
                $chstatus=M('stu_chapter')->where($condition)->getField('status');
//                dump($chstatus);
                if(isset($chstatus)){
                    $select[$key1]['status']=$chstatus;
                }
            }
//            dump($select);
//            dump($chstatus);
//            if(isset($chstatus)){
//                $cour=array(
//                    $key=>array(
//                        'id'=>$value['id'],
//                        'chname'=>$value['chname'],
//                        'cvideo'=>$select,
//                        'chstatus'=>$chstatus
//                    )
//                );
//            }else{
                $cour=array(
                    $key=>array(
                        'id'=>$value['id'],
                        'chname'=>$value['chname'],
                        'cvideo'=>$select
                    )
                );
//            }
            $course=array_merge($course,$cour);
        }
        return $course;
    }
}