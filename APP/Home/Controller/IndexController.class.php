<?php
namespace Home\Controller;
use Think\Controller;
session_start();
class IndexController extends CommonController {
    private $openid;
    function _initialize(){
        $this->openid=session('openid');
    }
    public function index(){
//        session('[start]');
        session_start();
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        layout(false);
        $course=D('Index','Service')->getCourseType();
//        dump($_SESSION);
//        dump($_POST);
        if($course!=null){
//            $openid=session('openid');
//            $condition['openid']=$openid;
//            $this->openid=M('stu')->where($condition)->getField("openid");
            $this->assign('course',$course);
//            session('stu_id',$this->stu_id);
            trace($_SESSION,'session');
//            $stu_id="";
            if($_POST['stu_id']!=null&&$_POST['stu_id']!=""){
                $stu_id=$_POST['stu_id'];
            }else{
                $stu_id=$_SESSION['stu_id'];
            }
//            $stu_id=130202031032;
//            session(array('name'=>'stu_id','expire'=>3600));
//            session('stu_id',$stu_id);
//            session_cache_expire(3600);
            $_SESSION['stu_id']=$stu_id;
//            $_SESSION['stu_id']=130202031032;
            $this->display();
        }
    }

    public function typeList(){
        $course=D('Index','Service')->getCourseType();
        $result=json_encode($course);
        echo $result;
    }
}








