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
        <!--<link rel="stylesheet" href="/uploadify/uploadify.css">-->
<script src="/wikewechat/Public/js/jquery.js"></script>
<!--<script src="/uploadify/jquery.uploadify.min.js"></script>-->
<script src="/wikewechat/Public/js/wike.js"></script>
<link href="/wikewechat/Public/css/wike.css" rel="stylesheet">
<div class="templatemo-content-container">
    <div class="templatemo-flex-row flex-content-row">
        <div class="templatemo-content-widget white-bg col-2">
            <i class="fa fa-video-camera fa-2x"></i>
            <h2 class="templatemo-inline-block">课程章节</h2>
            <hr>
            <div class="table-responsive">
                <form class="form-group-sm" method="post" id="formdata">
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                        <tr>
                            <td>课程名称</td>
                            <td>上传视频</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" value="" name="cvideo[vname]" class="input">
                                </div>
                                <input type="hidden" name="cvideo[vdev]" id="video">
                                <input type="hidden" name="cvideo[chid]" value="<?php echo ($chid); ?>">
                                <input type="hidden" name="cvideo[cid]" value="<?php echo ($cid); ?>">
                            </td>
                            <td>
                                <div class="input-group">
                                    <div tabindex="500" class="form-control" id="input0a"></div>
                                    <div class="input-group-btn">
                                        <a tabindex="500" class="btn btn-default btn-file" href="#" id="browse">
                                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp;Browse ...<input type="file" name="image" value="选择" id="file-a">
                                        </a>
                                        &nbsp;
                                        <a tabindex="500" class="btn btn-default btn-file" href="#" id="start_upload">
                                            <i class="glyphicon glyphicon-upload"></i>&nbsp;Upload
                                        </a>
                                    </div>
                                </div>
                                <div class="progress progress-striped active" style="display: none;" id="progress">
                                    <div id="progressbar" class="progress-bar" role="progressbar" aria-valuemax="100" aria-valuemin="0"></div>
                                    <span id="percent"></span>
                                </div>
                                <p style="color: red">(仅限.rmvb、.flv、.swf、MP4格式)</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br/>
                    <i class="fa fa-file-text fa-2x"></i>
                    <h3 style="display: inline">添加题目</h3>
                    <!--<div class="checkboxThree">-->
                        <!--<input type="checkbox" id="checkboxInput">-->
                        <!--<label id="checkboxlabel" for="checkboxInput"></label>-->
                    <!--</div>-->
                    <hr>
                    <div class="questionContainer">
                        <!--<h4>题目</h4>-->
                        <!--<label style="margin-bottom: 10px"><span style="color: red;">*</span>题型</label>-->
                        <!--<select class="form-control" style="display: inline-block;width: auto" name="questiontype" id="questiontype">-->
                            <!--<option value="0">请选择一种题型</option>-->
                            <!--<option value="1">单选题</option>-->
                            <!--<option value="2">多选题</option>-->
                            <!--<option value="3">填空题</option>-->
                        <!--</select>-->
                        <div id="questionBox">
                            <div id="addTableBtn" class="btn btn-success" style="width: 100%;margin-top:10px " onclick="addTableBox()">
                                <span><i class="glyphicon glyphicon-plus"></i>添加题目</span>
                            </div>
                        </div>
                    </div>

                    <!--<div class="questionContainer">-->
                        <!---->
                    <!--</div>-->

                    <br><br>
                    <button type="submit" class="templatemo-white-button" style="float: right" id="submitbtn" onclick=submitData("<?php echo U('Course/createVideo');?>","<?php echo U('Course/index');?>")>提交</button>
                </form>
                <p id="test"></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/wikewechat/plupload/js/plupload.full.min.js"></script>
<script>
    $(document).ready(function(){
        var uploader=new plupload.Uploader({
            browse_button:'browse',
            url:'http://upload.qiniu.com/',
            filters:{
                mime_types:[
                    {title:'Video files',extensions:'rmvb,flv,swf,MP4'}
                ],
                max_file_size:'200mb',
                prevent_duplicates:true
            },
            multipart:true,
            multipart_params:{
                'token':'<?php echo ($uptoken); ?>',
                'accept':''
            },
            flash_swf_url : '/plupload/js/Moxie.swf',
            silverlight_xap_url : '/plupload/js/Moxie.xap'
        });
        uploader.init();
        uploader.bind('FilesAdded',
         function(uploader,files){
            var span="<div style='overflow: hidden;text-overflow: ellipsis;'><span class='glyphicon glyphicon-file'></span>"+files[0].name+"</div>";
            if(typeof(files[0].name)!="undefined"){
                document.getElementById("input0a").innerHTML=span;
//                $("input0a").html(span);
            }
        });
        uploader.bind('UploadProgress',function(uploader,file){
            var progressbar=document.getElementById("progressbar");
            progressbar.setAttribute("aria-valuenow",file.percent);
            progressbar.style.width=file.percent+"%";
            var percent=document.getElementById("percent");
            percent.innerHTML=file.percent+"%完成";
        });
        uploader.bind('FileUploaded',function(uploader,file,responseObject){
            var p=JSON.parse(responseObject.response);
            document.getElementById('video').setAttribute("value", "http://7xln7a.media1.z0.glb.clouddn.com/"+p.key);
        });
        uploader.bind('UploadComplete',function(uploader,files){
            alert('上传完成！');
            document.getElementById('progress').style.display="none";
        });
//        uploader.init();
        document.getElementById('start_upload').onclick=function(){
            uploader.start();
            document.getElementById('progress').style.display="block";
        }
    });
//    $('#timepickerBox').timepicker();
</script>
        <footer class="text-right">
    <p>Copyright &copy; 2016 WiKeWeChat
        | Connect to <a href="http://www.cnblogs.com/libertycode/" target="_blank">http://www.cnblogs.com/libertycode/</a></p>
</footer>
    </div>
</div>



</body>
</html>