<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/27
 * Time: 20:05
 */

namespace Home\Controller;


use Think\Controller;

class SearchController extends CommonController
{
    public function search(){
        $keyword=$_POST['search'];
        if($keyword==""){
            $this->error('您没有输入任何搜索字符！');
        }
        $keys=explode(" ",$keyword);
        $sql="(cname LIKE '%$keys[0]%') or (describtion LIKE '%$keys[0]%')";
        for($i=1;$i<count($keys);$i++){
            $sql.=" OR (cname LIKE '%$keys[i]%') OR (describtion LIKE '%$keys[i]%')";
        }
        $course=M('course')->where($sql)->select();
        if(!$course){
            $this->display('Index/empty');
        }
        $count=M('course')->where($sql)->count();
        $this->assign('count',$count);
        $this->assign('course',$course);
        $this->display('Search/search');
    }
}