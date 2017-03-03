<?php
/**
 * Created by PhpStorm.
 * User: acfun
 * Date: 2017/2/14
 * Time: 20:35
 */

namespace Home\Model;


use Think\Model;

class UserModel extends Model
{
    protected $trueTableName="wike_stu";
    public function loginByPhone($loginName,$loginPassword){
        if ($loginName!=null&&$loginPassword!=null){
            $loginPassword=md5($loginPassword);
            $condition['phone']=$loginName;
            $condition['password']=$loginPassword;
            $result=$this->where($condition)->select();
            if ($result!=null){
                return $result;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function loginByEmail($loginName,$loginPassword){
        if ($loginName!=null&&$loginPassword!=null){
            $loginPassword=md5($loginPassword);
            $condition['email']=$loginName;
            $condition['password']=$loginPassword;
            $result=$this->where($condition)->select();
            if ($result!=null){
                return $result;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function registerByPhone($stu){
        $stu['loginPassword']=md5($stu['loginPassword']);
        $data['password']=$stu['loginPassword'];
        $data['gender']=$stu['gender'];
        $data['nickName']=$stu['nickName'];
        $data['phone']=$stu['phone'];
        $data['self_describe']=$stu['self_describe'];
        $data['head_img']=$stu['head_img'];
        $data['page_img']=$stu['page_img'];
        $result=$this->add($data);
        return $result;
    }

    public function registerByEmail($stu){
        $stu['loginPassword']=md5($stu['loginPassword']);
        $data['password']=$stu['loginPassword'];
        $data['gender']=$stu['gender'];
        $data['nickName']=$stu['nickName'];
        $data['email']=$stu['email'];
        $data['self_describe']=$stu['self_describe'];
        $data['head_img']=$stu['head_img'];
        $data['page_img']=$stu['page_img'];
        $result=$this->add($data);
        return $result;
    }
}