<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/17
 * Time: 15:47
 */

namespace Admin\Service;


use Think\Model;

class UserService extends CommonService
{
    //获取相应模型名称
    protected function getModelName(){
        return 'user';
    }
    //更新用户信息
    public function update($userinfo){
        $User=new Model();
        $User->startTrans();
        $flag=false;
        $flag1=false;
        $id=$userinfo['id'];
        $data['email']=$userinfo['email'];
        $date['remark']=$userinfo['access'];
        //$data['status']=($userinfo['status']=='启用')?1:0;
        if($userinfo['status']=='启用'){
            $data['status']=1;
        }elseif($userinfo['status']=='禁用'){
            $data['status']=0;
        }
        if($userinfo['access']=="超级管理员"){
            $data['is_super']=1;
            $data['remark']='超级管理员';
            $flag1=true;
        }else{
            $data['is_super']=0;
        }
        dump($data);
        $name=$userinfo['name'];
        $sex=$userinfo['sex'];
        $job=$userinfo['job'];
        $describe=$userinfo['describtion'];
        $result1=$User->table(C('DB_PREFIX').'user')->where("id=$id")->save($data);
//        echo $result1;
        if($result1>=0) {
            $result2 = $User->execute("update wike_userinfo set name='$name',sex='$sex',job='$job',describtion='$describe' WHERE wike_userinfo.id=(select infoid from wike_user WHERE wike_user.id=$id)");
//            echo $result2;
            if ($result2>=0) {
//                if($flag1){
                    $access=$userinfo['access'];
                $role['role_id']=$User->table(C('DB_PREFIX').'role')->where("name='$access'")->getField('id');
//                    $role['user_id']=$id;
                $result3=$User->table(C('DB_PREFIX').'role_user')->where("user_id='$id'")->save($role);
//                }
                if($result3>=0){
                    $User->commit();
                    $flag = true;
                }else{
                    $flag = false;
                }
            }else{
                $flag = false;
            }
        } else{
            $flag=false;
        }
        if(!$flag){
            $User->rollback();
            return array(
                'message'=>'更新失败',
                'status'=>false
            );
        }else{
            return array(
                'message'=>'更新成功',
                'status'=>true
            );
        }
    }
    //添加用户信息
    public function adduser($userinfo){
        $User=new Model();
        $User->startTrans();
        $flag=false;
        $data['name']=$userinfo['name'];
        $data['sex']=$userinfo['sex'];
        $data['job']=$userinfo['job'];
        $data['describtion']=$userinfo['describtion'];
        $result=$User->table(C('DB_PREFIX').'userinfo')->add($data);
        if($result){
            $user['infoid']=$result;
            if($user['infoid']!=null){
                $user['email']=$userinfo['email'];
                $user['password']=$this->encrypt($userinfo['password']);
                $user['remark']=$userinfo['access'];
                if($userinfo['access']=='超级管理员'){
                    $user['is_super']=1;
                }else{
                    $user['is_super']=0;
                }
                if($userinfo['status']=='启用'){
                    $user['status']=1;
                }elseif($userinfo['status']=='禁用'){
                    $user['status']=0;
                }
                $result1=$User->table(C('DB_PREFIX').'user')->add($user);
                $email=$userinfo['eamil'];
                $role1=$userinfo['access'];
                if($result1){
//                    $role['user_id']=$User->table(C('DB_PREFIX').'user')->where("email='$email'")->getField('id');
                    $role['user_id']=$result1;
                    $role['role_id']=$User->table(C('DB_PREFIX').'role')->where("name='$role1'")->getField('id');
                    if($role['user_id']!=null&&$role['role_id']!=null){
                        $result2=$User->table(C('DB_PREFIX').'role_user')->add($role);
                        if($result2){
                            $User->commit();
                            $flag=true;
                        }else $flag=false;
                    }
                    else $flag=false;
                }else $flag=false;
            }
        }else $flag=false;
        if(!$flag){
            $User->rollback();
            unset($User);
            return array(
                'message'=>'添加失败',
                'status'=>false
            );
        }else{
            unset($User);
            return array(
                'message'=>'添加成功',
                'status'=>true,
            );
        }
    }
    //删除用户信息
    public function deleteUser($id){
        $User=new Model();
        $User->startTrans();
        if($User->table(C('DB_PREFIX')."user")->where("id=$id")->count()<=0){
            return array(
                'message'=>'删除失败',
                'status'=>false
            );
        }
        //获取用户信息表id
        $infoid=$User->table(C('DB_PREFIX')."user")->where("id=$id")->getField("infoid");
//        if($infoid!=null){
        //删除用户表信息
        $result1=$User->table(C('DB_PREFIX')."user")->delete($id);
        if(!$result1||$result1==0){
            $User->rollback();
            return array(
                'message'=>'删除失败',
                'status'=>false
            );
        }
        //删除用户信息表的信息
        $result=$User->table(C('DB_PREFIX')."userinfo")->delete($infoid);
        if(!$result||$result==0){
            $User->rollback();
            return array(
                'message'=>'删除失败',
                'status'=>false
            );
        }
//        }
        //删除用户角色表信息
        $result2=$User->table(C('DB_PREFIX')."role_user")->where("user_id=$id")->delete();
        if(!$result2||$result2==0){
            $User->rollback();
            return array(
                'message'=>'删除失败',
                'status'=>false
            );
        }
        $User->commit();
        return array(
            'message'=>'删除成功',
            'status'=>true
        );
    }
    //获取用户信息
    public function getUserTable($id=""){
        if($id!=""){
            $sql="select * from wike_userinfo,wike_user where wike_user.id=$id and wike_user.infoid=wike_userinfo.id";
            return M()->query($sql);
        }else{
            $sql="select wike_user.id,name,email from wike_userinfo,wike_user where wike_user.infoid=wike_userinfo.id;";
            $userTable=M()->query($sql);
            return $userTable;
        }
    }

    //获取相应URL
    public function getUrl($action,$user){
        $urllist=array();
        for($i=0;$i<count($user);$i++){
            $id=$user[$i]['id'];
            $urllist[$i]=U(CONTROLLER_NAME."/".$action,"id=$id");
        }
        return $urllist;
    }
    //获取角色列表
    public function getRoleList(){
        return $this->getM('role')->getField('name',true);
    }
}