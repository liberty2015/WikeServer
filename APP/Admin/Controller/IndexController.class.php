<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Image;

class IndexController extends CommonController {
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//        layout(false);
        trace($_COOKIE,'cookie');
        trace($_SESSION,'session');
        $authId=$_SESSION['wiadminae'];
        $access=\Org\Util\Rbac::getAccessList($authId);
        trace($access);
        $currentAccount=$_SESSION['current_account'];
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $this->assign('currentAccount',$currentAccount);
        $this->assign('user_ip',$user_ip);
        $this->display();
    }
    public function test(){
        echo S('test','hello world',array('type'=>'memcache','prefix'=>'think','expire'=>3600));
        $value=S('test');
        echo $value;
    }
    public function test1(){
//        echo 'hello';
        S(array('type'=>'memcache','prefix'=>'think','expire'=>3600));
        $value=S('test');
        echo $value;
        dump($value);
    }
    //个人信息
    public function userInfo(){
        $id=$_SESSION['current_account']['id'];
        $sql="select * from wike_userinfo,wike_user where wike_user.id=$id and wike_user.infoid=wike_userinfo.id";
        $userinfo=M()->query($sql);
        trace($_SESSION,'session');
        $this->assign('userinfo',$userinfo);
        $this->display("UserManger/userinfo");
    }
}