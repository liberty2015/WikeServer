<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo C('SITE_TITLE');?>后台管理</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href="/WikeServer/img/wike_favicon.ico" type="image/x-icon" rel="icon">
    <link href="/WikeServer/img/wike_favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="/WikeServer/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/templatemo-style.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/page.css" rel="stylesheet">
    <script src="/WikeServer/Public/js/jquery.js"></script>
    <script src="/WikeServer/Public/js/bootstrap.min.js"></script>
    <script src="/WikeServer/Public/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="/WikeServer/Public/js/templatemo-script.js"></script>      <!-- Templatemo Script -->
</head>
<body>
<!-- Left column -->
<div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
            <div class="square"></div>
            <h1><?php echo C('SITE_TITLE');?></h1>
        </header>
        <div class="profile-photo-container">
            <img src="http://wikewechat-wike.stor.sinaapp.com/Images%2FWikeAdmin.jpg" alt="Profile Photo" class="img-responsive">
            <div class="profile-photo-overlay"></div>
        </div>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
    <ul>
        <!--<li><a href="#" class="active"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>-->
        <!--<li><a href="data-visualization.html"><i class="fa fa-bar-chart fa-fw"></i>Charts</a></li>-->
        <!--<li><a href="data-visualization.html"><i class="fa fa-database fa-fw"></i>Data Visualization</a></li>-->
        <!--<li><a href="maps.html"><i class="fa fa-map-marker fa-fw"></i>Maps</a></li>-->
        <!--<li><a href="manage-users.html"><i class="fa fa-users fa-fw"></i>Manage Users</a></li>-->
        <!--<li><a href="preferences.html"><i class="fa fa-sliders fa-fw"></i>Preferences</a></li>-->
        <!--<li><a href="<?php echo U('Login/logout');?>"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>-->
        <?php if(is_array($main_menu)): $i = 0; $__LIST__ = $main_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu_item): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($menu_item['target']);?>"><?php echo ($menu_item['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li><a href="<?php echo U('Login/logout');?>"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
    </ul>
</nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
    <div class="row">

        <nav class="templatemo-top-nav col-lg-12 col-md-12">
            <ul class="text-uppercase" style="float: left">
                <!--<li>-->
                    <!--<?php echo date('Y-m-d H:i:s');?>-->
                <!--</li>-->
            <!--</ul>-->
            <!--<ul class="text-uppercase" style="float: right">-->
                <!--<li>-->
                    <!--欢迎您，<?php echo ($_SESSION['current_account']['email']); ?>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href=""><span class="fa fa-sign-out fa-fw"></span>退出系统</a>-->
                <!--</li>-->
                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$submenu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($key);?>"><?php echo ($submenu); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </nav>
    </div>
</div>
        <script src="/WikeServer/Public/js/wike.js"></script>
<link href="/WikeServer/Public/css/wike.css" rel="stylesheet">
<div class="templatemo-content -container">
    <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-2">
            <i class="fa fa-video-camera fa-2x"></i>
            <h2 class="templatemo-inline-block">Course Information</h2>
            <hr>
            <div class="table-responsive">
                <form class="form-group-sm" method="post" action="<?php echo U('Course/createCourse');?>" enctype="multipart/form-data">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" value="" name="course[cname]"></td>
                        </tr>
                        <tr>
                            <td>Direction:</td>
                            <td>
                                <select size="1" name="course[direction]" id="select1">
                                    <option selected="selected" value="0"></option>
                                    <?php if(is_array($direction)): $i = 0; $__LIST__ = $direction;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($data); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td>
                                <select size="1" name="course[type]" id="select2">
                                    <option selected="selected" value="0"></option>
                                    <?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>" parentid="<?php echo ($vo[did]); ?>"><?php echo ($vo[name]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Difficulty:</td>
                            <td>
                                <select size="1" name="course[clevel]">
                                    <option>初级</option>
                                    <option>中级</option>
                                    <option>高级</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cover Picture</td>
                            <td>
                                <div class="input-group">
                                    <div tabindex="500" class="form-control" id="input0a"></div>
                                    <div class="input-group-btn">
                                        <div tabindex="500" class="btn btn-primary btn-file">
                                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp;Bowse ...<input type="file" name="image" value="选择图片" id="file-a">
                                        </div>
                                    </div>
                                </div>
                                <p style="color: red">(仅限.jpg、.png、.jpeg格式)</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Chapter:</td>
                            <td>
                                <table class="table table-striped table-bordered" id="table1">
                                    <thead>
                                    <tr>
                                        <td>Chapter Name</td>
                                        <td>describtion</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" value="" name="course[chapter][0][chname]"></td>
                                        <td><textarea rows="2" wrap="hard" name="course[chapter][0][describtion]" class="form-control"></textarea></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <span class="fa fa-plus-circle fa-2x" style="float: right" id="btn1"></span>
                                <span class="fa fa-minus-circle fa-2x" style="float: right" id="btn2"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Describtion</td>
                            <td>
                                <textarea rows="2" wrap="hard" name="course[describtion]" class="form-control"></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <button type="submint" class="templatemo-white-button" style="float: right">完成</button>
                </form>
            </div>
        </div>
    </div>
</div>
        <footer class="text-right">
    <p>Copyright &copy; 2016 WiKeWeChat
        | Connect to <a href="http://www.cnblogs.com/libertycode/" target="_blank">http://www.cnblogs.com/libertycode/</a></p>
</footer>
    </div>
</div>



</body>
</html>