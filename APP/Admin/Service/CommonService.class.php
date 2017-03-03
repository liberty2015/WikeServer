<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/13
 * Time: 0:21
 */
namespace Admin\Service;

use Think\Model;

abstract class CommonService{
    public function getCount(array $where){
        return $this->getM()->where($where)->count();
    }
    protected function getM($modelname){
        return M($modelname);
    }
    protected function getD($modelname){
        return D($modelname);
    }
    protected function encrypt($data){
//        echo C('AUTH_MASK').$data;
//        echo md5(C('AUTH_MASK').md5($data));
        return md5(C('AUTH_MASK').md5($data));
    }
    //是否存在账号
    public function existAccount($email){
        if($this->getM($this->getModelName())->where("email='{$email}'")->count()>0){
            return true;
        }
        return false;
    }
    /*
     * 获取模型名称
     */
    protected abstract function getModelName();
    //获取相应URL
    public function getUrl($action,$info){
        $urllist=array();
        for($i=0;$i<count($info);$i++){
            $id=$info[$i]['id'];
            $urllist[$i]=U(CONTROLLER_NAME."/".$action,"id=$id");
        }
        return $urllist;
    }
}