<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo C('SITE_TITLE');?>后台管理</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="icon">
    <link href="/wikewechat/img/wike_favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="/wikewechat/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/templatemo-style.css" rel="stylesheet">
    <link href="/wikewechat/Public/css/page.css" rel="stylesheet">
    <script src="/wikewechat/Public/js/jquery.js"></script>
    <script src="/wikewechat/Public/js/bootstrap.min.js"></script>
    <script src="/wikewechat/Public/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
    <script type="text/javascript" src="/wikewechat/Public/js/templatemo-script.js"></script>      <!-- Templatemo Script -->
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
        <script src="/wikewechat/Public/js/wike.js"></script>
<div class="templatemo-content-container">
    <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-2">
            <i class="fa fa-video-camera fa-2x"></i>
            <h2 class="templatemo-inline-block">Course Chapter</h2>
            <hr>
            <div class="table-responsive">
                <form class="form-group-sm" method="post" action="<?php echo U('Course/createChapter');?>">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                        <tr>
                            <td>Chapter Name</td>
                            <td>describtion</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" value="" name="chapter[0][chname]" class="input"></td>
                            <td><textarea rows="2" wrap="hard" name="chapter[0][describtion]" class="input"></textarea>
                                <input type="hidden" value="<?php echo ($id); ?>" name="chapter[0][cid]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <span class="fa fa-plus-circle fa-2x" style="float: right;cursor: pointer" id="btn-1"></span>
                    <span class="fa fa-minus-circle fa-2x" style="float: right;cursor: pointer" id="btn-2"></span>
                    <br><br>
                    <button type="submit" class="templatemo-white-button" style="float: right">提交</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#btn-1").click(function () {
            var x = new Number($("#table1 tbody tr").length).toString();
            var name1 = "chapter[x][chname]";
            var str1 = name1.replace('x', x);
            var name2 = "chapter[x][describtion]";
            var str2 = name2.replace('x', x);
            var name3="chapter[x][cid]";
            var str3=name3.replace('x',x);
            $("#table1").append("<tr><td><input type='text' value=''></td><td><textarea rows='2' wrap='hard'></textarea><input type='hidden' value=<?php echo ($id); ?>></td></tr>");
            var att1 = document.createAttribute("name");
            att1.value = str1;
            var att2 = document.createAttribute("name");
            att2.value = str2;
            var tr1 = $("#table1 tbody tr").last().find("input:visible");
            tr1.attr("name", str1);
            var tr2 = $("#table1 tbody tr").last().find("textarea");
            tr2.attr("name", str2);
            var tr3=$("#table1 tbody tr").last().find("input:hidden");
            tr3.attr("name",str3);
        });
        $("#btn-2").click(function () {
            $("#table1 tbody tr").last().remove();
        });
    });
</script>
        <footer class="text-right">
    <p>Copyright &copy; 2016 WiKeWeChat
        | Connect to <a href="http://www.cnblogs.com/libertycode/" target="_blank">http://www.cnblogs.com/libertycode/</a></p>
</footer>
    </div>
</div>



</body>
</html>