<?php

/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/20
 * Time: 12:14
 */
namespace Admin\Model;
use Think\Model;
class CourseTypeModel extends Model
{
    protected $tableName ='direction';
    public function addDirection($name){

        $dirt=M('direction');
        $data['name']=$name;
        $result=$dirt->add($data);
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
}