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
<link href="/wikewechat/Public/css/wike.css" rel="stylesheet">
<script src="/wikewechat/Public/js/jquery.js"></script>
<script src="/wikewechat/Public/js/validate.js"></script>
<script>
    function ImgPreView(){
        var file=document.getElementById("file-b");
        var img=document.getElementById("img");
        var fileList=file.files;
        var length=fileList.length;
        if (length>0){
            img.innerHTML="";
        }
        for (var i=0;i<fileList.length;i++){
            img.innerHTML+="<img id='imgCover"+i+"' name='preView'/>";
            var imgPreview=document.getElementById("imgCover"+i);
            if (file.files&&file.files[i]){
                imgPreview.style.width="220px";
                imgPreview.style.height="130px";
                imgPreview.src=window.URL.createObjectURL(file.files[i]);
            }else{
                file.select();
                var imgSrc=document.selection.createRange().text;
                alert(imgSrc);
                imgPreview.style.width="220px";
                imgPreview.style.height="130px";
                try {
                    imgPreview.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)"
                    imgPreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src=imgSrc;
                }catch (e){
                    alert("您上传的图片格式不正确，请重新选择！");
                    return false;
                }
            }
            return true;
        }
    }
</script>
<div class="wike-content-container">
    <h2>编辑课程</h2>
    <hr>
    <div class="form-container">
        <form id="class-form" enctype="multipart/form-data" method="post" action="<?php echo U('Course/updateCourse');?>">
            <table class="course_table">
                <tr>
                    <input type="hidden" value="<?php echo ($class[0][id]); ?>" name="course[id]">
                    <td>课程名称：</td>
                    <td><input class="form-control require" value="<?php echo ($class[0][cname]); ?>" name="course[cname]" required></td>
                </tr>
                <tr>
                    <td>方向：</td>
                    <td>
                        <span>
                            <select class="require" size="1" name="course[direction]" id="select1" required>
                                <option selected="selected" value></option>
                                <?php if(is_array($direction)): $i = 0; $__LIST__ = $direction;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($data); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </span></td>
                </tr>
                <tr>
                    <td>类型：</td>
                    <td>
                        <span>
                            <select class="require" size="1" name="course[type]" id="select2" required>
                                <option selected="selected" value></option>
                                <?php if(is_array($course)): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>" parentid="<?php echo ($vo[did]); ?>"><?php echo ($vo[name]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>难度：</td>
                    <td><span>
                        <select  class="require" id="level" size="1" name="course[clevel]" required>
                            <option></option>
                            <option value="0">初级</option>
                            <option value="1">中级</option>
                            <option value="2">高级</option>
                        </select>
                    </span></td>
                </tr>
                <tr>
                    <td>描述：</td>
                    <td>
                        <textarea  class="form-control require" rows="3" cols="10" name="course[describtion]" >
                            <?php echo ($class[0][describtion]); ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>课程封面：<br>
                        <div tabindex="500" class="btn btn-primary btn-file">
                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp;Bowse ...<input type="file" name="image" value="选择图片" id="file-b" multiple onchange="ImgPreView()">
                        </div>
                        <!--<a tabindex="500" class="btn btn-default btn-file" href="#" id="browse" onclick="changeImgCover()">-->
                            <!--<i class="glyphicon glyphicon-folder-open"></i>&nbsp;修改-->
                            <!--<input type="file" name="image" id="file-b" onchange="javascript:ImgPreView()">-->
                        <!--</a>-->
                    </td>
                    <td>
                        <div id="img">
                            <img id="imgCover" src="http://wikewechat-wike.stor.sinaapp.com/<?php echo ($class[0][pdev]); ?>" name="preView">
                        </div>
                    </td>
                </tr>
            </table>
            <button class="btn btn-default" type="submit" onclick="sendUpdate()">提交修改</button>
        </form>
    </div>
</div>
<script>
    var level=document.getElementById("level");
    var select1=document.getElementById("select1");
    var select2=document.getElementById("select2");
    var levelSelect="<?php echo $class[0][clevel]; ?>";
    var select1Value="<?php echo $class[0][direction];?>"
    var select2Value="<?php echo $class[0][type];?>"
    for (var i=0;i<level.options.length;i++){
        if (level.options[i].value==levelSelect){
            level.options[i].selected=true;
            break;
        }
    }
    for (var i=0;i<select1.options.length;i++){
        if(select1.options[i].value==select1Value){
            select1.options[i].selected=true;
            break;
        }
    }
    for (var i=0;i<select2.options.length;i++){
        if(select2.options[i].value==select2Value){
            select2.options[i].selected=true;
            break;
        }
    }


    function sendUpdate(){
        $("#class-form").html5Validate(
                function(){
                    var dataStr=$("#class-form").serialize();
                    var formData=new FormData($("#class-form")[0]);
                    formData.append('file',$('#file-b')[0].files[0]);
            $.ajax({
                type:"post",
                url:"<?php echo U('Course/updateCourse');?>",
                contentType:false,
                dataType:"json",
                data:formData,
                processData:false,
                cache:false,
                success:
                    function(data){
                    if (data.status==0){
                        $("button").append("<span style='color: red'>"+data.msg+"</span>");
                        setTimeout(function(){
                            window.location.href="<?php echo U('Course/index');?>";
                        },3000);
                    }else if(data.status==1){
                        alert(data.msg);
                    }
                }
                    ,
                error:
                        function(data){
                    alert("更新失败，请稍后再试。");
                }
            });
                }
        );

    }
</script>
        <footer class="text-right">
    <p>Copyright &copy; 2016 WiKeWeChat
        | Connect to <a href="http://www.cnblogs.com/libertycode/" target="_blank">http://www.cnblogs.com/libertycode/</a></p>
</footer>
    </div>
</div>



</body>
</html>