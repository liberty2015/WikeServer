<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo C('SITE_TITLE');?></title>
    <link href="/wikewechat/Public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/wikewechat/Public/js/jquery.js"></script>
    <script src="/wikewechat/Public/js/bootstrap.min.js"></script>
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="icon">
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="/wikewechat/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/item.css" rel="stylesheet">
    <!--<link href="/Public/normalize.css" rel="stylesheet">-->
    <link href="/wikewechat/Public/css/course.css" rel="stylesheet">
    <!--<link href="/WikeWechat/Public/Visual_Admin/css/templatemo-style.css" rel="stylesheet">-->
    <link href="/wikewechat/Public/css/page.css" rel="stylesheet">
    <!--<link href="/WikeWechat/Public/NewGlobal.css" rel="stylesheet">-->
    <!--<link href="/WikeWechat/Public/Visual_Admin/css/page.css" rel="stylesheet">-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!-- jQuery -->
    <style rel="stylesheet">
        .header{
            background-color: #1fa3ff;
            border: inherit;
            -webkit-box-shadow: 0px 1px 5px #9D9B9B;
            -moz-box-shadow: 0px 1px 5px #9D9B9B;
            box-shadow: 0px 1px 5px #9D9B9B;
        }
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

</head>
<body>
    <div class="main-container">
        <div class="content-container">
            <div class="middle-layer">
                <div class="header">
                    <div style="float: left;color: #b9def0;vertical-align: middle;margin-left: 10px;margin-top: 10px">
                        <i class="fa fa-chevron-left fa-2x"></i>
                    </div>
                    <!--<span style="float: left;color: #b9def0;vertical-align: middle"></span>-->
                    <a href="<?php echo U('Index/index');?>">
                        <img src="http://wikewechat-wike.stor.sinaapp.com/Images%2FWike.png" style="height: 40px;margin:0 auto;padding-top: 5px;padding-bottom: 5px; display: block;">
                    </a>
                </div>
                <div class="content-inner">
    <div align="center">
        <img src="http://wikewechat-wike.stor.sinaapp.com/Images%2Fcry.png">
        <h3>没有找到课程。TAT</h3>
    </div>
</div>
            </div>
        </div>
        <!--<div class="footer">-->
            <!--<div class="container">-->
                <!--<footer>-->
                    <!--<p>Copyright &copy; 2015 WiKeWeChat</p>-->
                <!--</footer>-->
            <!--</div>-->
        <!--</div>-->
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