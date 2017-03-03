<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo C('SITE_TITLE');?></title>
    <link href="/wikewechat/Public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/wikewechat/Public/js/jquery.js"></script>
    <script src="/wikewechat/Public/js/bootstrap.js"></script>
    <link href="/wikewechat/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/item.css" rel="stylesheet">
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="icon">
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="/wikewechat/Public/css/templatemo-style.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/page.css" rel="stylesheet">
    <!--<link href="/WikeWechat/Public/NewGlobal.css" rel="stylesheet">-->
    <!--<link href="/WikeWechat/Public/Visual_Admin/css/page.css" rel="stylesheet">-->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- jQuery -->
    <style rel="stylesheet">
        .navbar-inverse{
            background-color: #1fa3ff;
            border: inherit;
            /*height: 60px;*/
            /*min-width: 320px;  max-width: 480px;*/
        }
        .navbar-inverse .navbar-toggle{
            border-color: #b9def0;
        }
        .navbar-inverse .navbar-collapse{
            border-color: #1fa3ff;
        }
        .navbar-inverse .navbar-form{
            border-color: #1fa3ff;
        }
        .navbar-inverse .navbar-toggle:focus,.navbar-inverse .navbar-toggle:hover{
            background-color:#36A1DB;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#click").click(function(){
                $("#menu").toggleClass("spmenu-actived");
                $("#shadow").toggleClass("spmenu-shadow");
                $("body").toggleClass("html-body-overflow");
                $("#shadow").toggleClass("spemnu-noshadow");
//                $("body").toggleClass("html-body-auto");
            });
            $("#shadow").click(function(){
                $("#menu").toggleClass("spmenu-actived");
                $("#shadow").toggleClass("spmenu-shadow");
                $("body").toggleClass("html-body-overflow");
                $("#shadow").toggleClass("spemnu-noshadow");
//                $("body").toggleClass("html-body-auto");

            });
            // $("#click").click(function(){
            // 	$("#menu").addClass("spmenu-remove")
            // })
        });
//        var useragent=navigator.userAgent;
//        if(useragent.match(/MicroMessenger/i)!='MicroMessenger'){
//            alert('请通过微信客户端访问！');
//            var opened=window.open('about:blank','_self');
//            opened.opener=null;
//            opened.close();
//        }
    </script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="click">
                <span class="sr-only">Toggle navigation</span>
                <!--<span class="glyphicon glyphicon-user" style="color: #b9def0"></span>-->
                <span class="icon-bar" style="color: #b9def0"></span>
                <span class="icon-bar" style="color: #b9def0"></span>
                <span class="icon-bar" style="color: #b9def0"></span>
                <span class="icon-bar" style="color: #b9def0"></span>

            </button>
            <a style="padding: 10px 10px;" href="#"><img alt="Brand" src="http://wikewechat-wike.stor.sinaapp.com/Images%2FWike.png" style="margin-top: 1%" ></a>
        </div>
    </div>
</nav>
<div class="spmenu" id="menu">
    <ul>
        <li>
            <form class="navbar-form" role="search" method="post" action="<?php echo U('Search/search');?>">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="搜索课程" name="search">
                                <span class="input-group-btn" id="basic-search">
                                    <button class="btn btn-success" type="submit" >GO!</button>
                                </span>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        <hr>
        <li><a href="<?php echo U('User/course');?>"><i class="fa fa-book fa-2x"></i>我的课程</a></li>
        <hr>
        <li><i class="fa fa-bar-chart fa-2x"></i>我的学习情况</li>
        <hr>
        <li><i class="fa fa-comments fa-2x"></i>我的社区</li>
        <hr>
        <li><a href="<?php echo U('User/info');?>"><i class="fa fa-user fa-2x"></i>个人信息</a></li>
    </ul>
</div>
<div id="shadow" class="spemnu-noshadow"></div>
<div class="templatemo-content col-1 light-gray-bg">
    <div class="row">
        <div class="templatemo-content-container">
            <div class="templatemo-content-widget white-bg">
                <?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="codelist">
                        <h2 style="font-size: 18px;font-weight: bold;margin: 18px 0;border-bottom: 1px solid #eaeaea;">
                            <span class="glyphicon glyphicon-th-list"></span><?php echo ($data[name]); ?>
                        </h2>
                        <?php if(is_array($course[$key][course])): $i = 0; $__LIST__ = $course[$key][course];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><a class="item-top item-1" target="_self" href="<?php echo U('Course/course',array(id=>$sub[id]));?>">
                                <h4 style="font-weight: bold;text-align: center;color: #464242;font-size: small;font-family: 黑体">
                                    <?php echo ($sub[name]); ?>
                                </h4>
                                <img src="http://wikewechat-wike.stor.sinaapp.com/<?php echo ($sub[tdev]); ?>" height="45" width="45"
                                     style="clear: both;display: block;margin:auto;">
                            </a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="rollbar" style="display: block">
    <ul>
        <li>
            <a href="javascript:(scrollTo(0,0));">
                <i class="fa fa-angle-up"></i>
            </a>
            <h6>
                去顶部
                <i></i>
            </h6>
        </li>
    </ul>
</div>
<!--</div>-->
</body>
</html>