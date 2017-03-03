<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/9/5
 * Time: 11:15
 */

namespace Home\Controller;

use Think\Controller;
use Com\Wechat;
session_start();
class WeChatController extends Controller
{
    //初始化wechat对象的参数
    private static $options=array(
        'token'=>'weixin',
        'encodingaeskey'=>'urgNMq4sj3v5pDiAlbOEeEmvMFaFWLf5fDgGruuJdim',
        'appid'=>'wxd0f31430520ab461',
        'appsecret'=>'2da58b0691f59453e8f3997aaea2b1b1'
        );
    //wechat对象
    private static $weiObj;
    //初始化函数
    function _initialize(){
        self::$weiObj=new Wechat(self::$options);
    }
    //入口函数
    public function index(){
//        echo 'hello';
//        $options=array(
//            'token'=>'weixin',
//            'encodingaeskey'=>'urgNMq4sj3v5pDiAlbOEeEmvMFaFWLf5fDgGruuJdim',
//            'appid'=>'wxd0f31430520ab461',
//            'appsecret'=>'2da58b0691f59453e8f3997aaea2b1b1'
//        );
//        $weObj=new Wechat($options);
        $weObj=self::$weiObj;
        $weObj->valid();
//        $WikeIndex=U("Index/index");
        $type = $weObj->getRev()->getRevType();
        $this->demo($weObj,$type);
        $menu=$weObj->getMenu();
        $newmenu=array(
            "button"=>
                array(
                array('name'=>'进入微课', 'type'=>'click', 'key'=>'menu1'),
                 array(
                     'name'=>'个人中心',
                     'sub_button'=>array(
                         array('name'=>'我的课程', 'type'=>'view', 'url'=>'http://wikewechat.sinaapp.com'),
                         array('name'=>'我的学习情况', 'type'=>'view', 'url'=>'http://wikewechat.sinaapp.com'),
                         array('name'=>'我的讨论组', 'type'=>'view', 'url'=>'http://wikewechat.sinaapp.com')
                     )
                 )
                ),
        );
        $result=$weObj->createMenu($newmenu);
    }
    //创建菜单
//    public function createMenu($accessToken){
//        $WikeIndex=U("Index/index");
//        $arr=array(
//            'button'=>array(
//                array(
//                    'name'=>urlencode("进入微课"),
//                    'type'=>'view',
//                    'url'=>$WikeIndex
//                ),
//                array(
//                    'name'=>urlencode("个人中心"),
//                    'sub_button'=>array(
//                        array(
//                            'name'=>urlencode("我的课程"),
//                            'type'=>'view',
//                            'url'=>''
//                        ),
//                        array(
//                            'name'=>urlencode("我的学习情况"),
//                            'type'=>'view',
//                            'url'=>''
//                        ),
//                        array(
//                            'name'=>urlencode("我的社区"),
//                            'type'=>'view',
//                            'url'=>''
//                        )
//                    )
//                )
//            )
//        );
//        $menuPostString=urldecode(json_encode($arr));
//        $menuPostUrl="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$accessToken;
//        $ch=curl_init();
//        curl_setopt($ch,CURLOPT_URL,$menuPostUrl);
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch,CURLOPT_POST,1);
//        curl_setopt($ch,CURLOPT_POSTFIELDS,$menuPostString);
//        curl_exec($ch);
//        curl_close($ch);
//    }
    //自动回复
    public function demo($weObj,$data){
        switch ($data){
            case Wechat::MSGTYPE_EVENT:{
                $event=$weObj->getRevEvent();
                switch($event['event']){
                    case Wechat::EVENT_SUBSCRIBE:{
                        $openId=$weObj->getRevFrom();
                        $userInfo=$weObj->getUserInfo($openId);
                        $userNickname=$userInfo['nickname'];
                        $weObj->text("欢迎订阅WikeClass,$userNickname")->reply();
                    };
                    case Wechat::EVENT_MENU_CLICK:{
                        switch($event['key']){
                            case 'menu1':{

                                $openId=$weObj->getRevFrom();
                                $url="'".'http://wikewechat.sinaapp.com/'.U('WeChat/route',"openid=$openId")."'";
                                $weObj->text("<a href=$url>点击进入微课系统</a>")->reply();
                            }
                        }
                    }
//                    default:
////                        $weObj->replyText("欢迎访问WikeClass！您的事件类型：{$data['Event']}，EventKey：{$data['EventKey']}");
//                        $weObj->text("欢迎订阅")->reply();
                };
            };
            case Wechat::MSGTYPE_TEXT:{
                    $content=$weObj->getRevContent();
                    switch($content){
                        case "1":$weObj->text("<a href='http://wikewechat.sinaapp.com'>点击进入</a>")->reply();
                        case "2":{
                            $newData=array(
                                "0"=>array(
                                    'Title'=>"点击进入",
                                    'Description'=>'Wike微课公众平台开发视频教程',
                                    'PicUrl'=>'http://7xln7a.media1.z0.glb.clouddn.com/Wike.jpg',
                                    'Url'=>'http://wikewechat.sinaapp.com'
                                )
                            );
                            $weObj->news($newData)->reply();
                        }
                    }
            }
            default:
        }
    }
    //路由 判断用户是否第一次使用 如果是 则需要录入个人信息 不是 则进入微网站首页
    public function route(){
        layout(false);
//        $this->weiObj->valid();
        $openid=$_GET['openid'];
        $condition['openid']=$openid;
//        echo $openid;
        $id=M('stu')->where($condition)->select();
        if($id==null){
//            $_SESSION['openid']=$openid;
            session(array('openid'=>'id01','expire'=>3600,'type'=>'memcache'));
            session('openid',$openid);
            $this->assign('token',$openid);
            $this->display();
        }else{
            session(array('name'=>'openid','expire'=>3600));
            session('openid',$openid);
//            $_SESSION['openid']=$openid;
            $this->success('页面跳转中...',U('Index/index'));
        }
//        $this->display();
    }
    //个人信息录入函数
    public function data(){
        $info['openid']=$_POST['token'];
        $info['stu_id']=$_POST['stu_id'];
        $info['name']=$_POST['name'];
        $result=M('stu')->add($info);
        if($result){
            $this->success('页面跳转中...',U('Index/index'));
        }else{
            $this->error('发生错误！');
        }
    }
    //获取个人信息的函数
    public static function getUserInfor($openid){
        return self::$weiObj->getUserInfo($openid);
    }
}