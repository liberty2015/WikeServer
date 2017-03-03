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
                <link href="/wikewechat/Public/css/wike.css" rel="stylesheet">
<link rel="stylesheet" href="/wikewechat/Public/css/video.css">
<!-- <script src="/wikewechat/Public/js/jquery.js"></script> -->
<script src="/wikewechat/Public/js/video.js"></script>
<div class="content-inner">
    <div style="text-align: center;padding-top: 5px">
        <h1 style="margin: 0.4em 0"><b><?php echo ($course[0][cname]); ?></b></h1>
        <span style="color: #99a1a6;">
        <i class="fa fa-user"></i>
        学习人数:<?php echo ($course[0][unum]); ?>
        </span>
    </div>
    <div id="pcover" style="margin-top: 5px;margin-bottom: 5px;display: block">
        <img src="http://wikewechat-wike.stor.sinaapp.com/<?php echo ($course[0][pdev]); ?>" width="100%" height="50%">
    </div>
    <!--<div id="pvideo">-->
        <!--&lt;!&ndash;<video id="video" width="100%" height="50%" controls>&ndash;&gt;-->
            <!--&lt;!&ndash;您的浏览器不支持video标签&ndash;&gt;-->
        <!--&lt;!&ndash;</video>&ndash;&gt;-->
        <!---->
    <!--</div>-->
    <div id="pvideo" class="player">
        <video id="player" width="100%" height="50%" autoplay>
            <source src="">
        </video>
        <div class="controller" id="controller">
            <div id="play" class="play">
                <span class="icon icon-play"></span>
            </div>
            <div id="pause" class="pause hide">
                <span class="icon icon-pause"></span>
            </div>
            <div class="progressBarContainer">
                <dir id="progressBar"></dir>
            </div>

            <div id="enlarge" class="enlarge">
                <span class="icon icon-enlarge"></span>
            </div>
            <div id="shrink" class="shrink hide">
                <span class="icon icon-shrink"></span>
            </div>
            <div class="currentTime" id="currentTime">
                0:00
            </div>
        </div>
    </div>
    <div>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active">
                <a href="#chapter" data-toggle="tab">章节</a>
            </li>
            <li>
                <a href="#describtion" data-toggle="tab">课程介绍</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade in active" id="chapter">
                <?php if(is_array($Chapter)): $i = 0; $__LIST__ = $Chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div style="vertical-align: middle" id="accordion">
                            <h6 class="h4">
                                <a data-toggle="collapse" data-parent="#accordion" href="#coll<?php echo ($key); ?>" class="act" style="text-decoration: none">
                                <i class="fa fa-bars" style="display: inline-block;text-align: center;margin-right: 5px;"></i>
                                第<?php echo ($key+1); ?>章 <?php echo ($data[chname]); ?>
                                </a>
                            </h6>
                        <div id="coll<?php echo ($key); ?>" class="collapse in">
                            <?php if(is_array($Chapter[$key][cvideo])): $i = 0; $__LIST__ = $Chapter[$key][cvideo];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><div>
                                <h6 class="p2" onclick="VideoUrl('<?php echo ($sub[vdev]); ?>','<?php echo ($sub[id]); ?>','<?php echo ($sub[cid]); ?>','<?php echo ($sub[chid]); ?>')">
                                    <i class="fa fa-video-camera fa-1x"></i>
                                    <?php echo ($sub['vname']); ?>
                                </h6>
                                <?php if(!empty($sub[status])): if(($sub[status] == 2)): ?><i class="chapter-complete"></i>
                                        <?php else: ?><i class="chapter-uncomplete"></i><?php endif; ?>
                                    <?php else: ?><div class="chapter-no"></div><?php endif; ?>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="tab-pane fade" id="describtion">
                <h4 class="h4">课程名称</h4>
                <h5 class="h5"><?php echo ($course[0][cname]); ?></h5>
                <h4 class="h4">课程介绍</h4>
                <p class="p1">介绍：<?php echo ($course[0][describtion]); ?></p>
            </div>
        </div>
    </div>
    </div>
<div id="openModel" class="modelDialog">
    <!--<div>-->
        <!--<img src="/Public/Q.png">-->
        <!--<p class="question">请回答以下问题：</p>-->
        <!--<h3></h3>-->
        <!--<hr/>-->
    <!--</div>-->
</div>

<script>
	function timeupdate(event,video){
                        var vtime=parseInt(video.currentTime);
                        var returndata1=event.data;
                        if(returndata1!=undefined){
                        var length=event.data.length;
                        
                        for(var i=0;i<length;i++){
                            if (vtime==returndata1[i].cvtimepoint){
                                video.pause();
                                $("#play").toggleClass("hide");
                                $("#pause").toggleClass("hide");
                                ++video.currentTime;
                                exitFullScreen();
                                $("#openModel").css({"z-index":"2147483648","opacity":1});
                               var replacestr=returndata1[i].cvcontent.replace("<","&lt;");
                                $("#openModel").append("<div><img src='/wikewechat/Public/img/Q.png'><p class='question'>请回答以下问题：</p><h3></h3></div>");
                                $("#openModel > div >h3").text(replacestr);
                                $("body").css("overflow","hidden");
                                $("#openModel>div").append("<form id='question'></form>");
                                    switch (returndata1[i].cvtype){
                                        case "1":{
                                            var n=returndata1[i].cvoptions.split("///");
                                            var size= n.length;
                                            for (var j=0;j<size;j++){
                                                var option=String.fromCharCode(65+j);
                                                var replaceOption=n[j].replace("<","&lt;");
                                                $("#question").append("<div><input type='radio' name='answer' value='"+option+"'/>"+option+"  "+replaceOption+"</div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        case "2":{
                                            var n1=returndata1[i].cvoptions.split("///");
                                            var size1= n1.length;
                                            for (var k=0;k<size1;k++){
                                                var option1=String.fromCharCode(65+k);
                                                var replaceOption1=n1[k].replace("<","&lt;");
                                                $("#question").append("<div><input type='checkbox' name='answer[]' value='"+option1+"'/>"+option1+"  <span>"+replaceOption1+"</span></div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        case "3":{
                                            var n2=returndata1[i].cvoptions.split("///");
                                            var size2= n2.length;
                                            for (var l=0;l<size2;l++){
                                                $("#question").append("<div><input type='text' placeholder='请输入答案。' name='answer["+l+"]' class='form-control'></div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        default:break;
                                    }
                            }
                        }
                    }
                    }
    //点击视频播放代码
    function VideoUrl(turl,id,cid,chid){
        $.ajax({
            type:"GET",
            url:"<?php echo U('Course/getTestPoint');?>",
            contentType:"application/json;charset=utf-8",
            dataType:"json",
            data:"vid="+id+"&cid="+cid+"&chid="+chid,
            success:function(data){
                if($("#pcover").css("display")=="block"){
                    $("#pcover").css("display","none");
                    $("#pvideo").css("display","block");
                }
//                var node=document.getElementById("pvideo").firstElementChild;;
//                if (node!=null){
//                    document.getElementById("pvideo").removeChild(node);
//                }
                if(data.status==0){
                    var returnData=data.data;
//                    var $video=$("<video></video>");
//                    var video=$video[0];
//                    $video.attr("width","100%");
//                    $video.attr("height","50%");
//                    $video.attr("controls","controls");
//                    $video.attr("id","videobox");
//                    $video.autoplay=true;
//                    $video.append("<source src='"+turl+"'>");
                    var $video=$("#pvideo>video");
                    $video.autoplay=true;
                    var video=$video[0];
                    video.controls=false;
                    video.src=turl;
                    video.autoplay=true;
                    video.play();
                    
                    $video.off("timeupdate");
                    $video.on("timeupdate",returnData,function(event){
                        var vtime=parseInt(video.currentTime);
                        var length=event.data.length;
                        var returndata1=event.data;
                        for(var i=0;i<length;i++){
                            if (vtime==returndata1[i].cvtimepoint){
                                video.pause();
                                $("#play").toggleClass("hide");
                                $("#pause").toggleClass("hide");
                                ++video.currentTime;
                                exitFullScreen();
                                $("#openModel").css({"z-index":"2147483648","opacity":1});
                               var replacestr=returndata1[i].cvcontent.replace("<","&lt;");
                                $("#openModel").append("<div><img src='/wikewechat/Public/img/Q.png'><p class='question'>请回答以下问题：</p><h3></h3></div>");
                                $("#openModel > div >h3").text(replacestr);
                                $("body").css("overflow","hidden");
                                $("#openModel>div").append("<form id='question'></form>");
                                    switch (returndata1[i].cvtype){
                                        case "1":{
                                            var n=returndata1[i].cvoptions.split("///");
                                            var size= n.length;
                                            for (var j=0;j<size;j++){
                                                var option=String.fromCharCode(65+j);
                                                var replaceOption=n[j].replace("<","&lt;");
                                                $("#question").append("<div><input type='radio' name='answer' value='"+option+"'/>"+option+"  "+replaceOption+"</div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        case "2":{
                                            var n1=returndata1[i].cvoptions.split("///");
                                            var size1= n1.length;
                                            for (var k=0;k<size1;k++){
                                                var option1=String.fromCharCode(65+k);
                                                var replaceOption1=n1[k].replace("<","&lt;");
                                                $("#question").append("<div><input type='checkbox' name='answer[]' value='"+option1+"'/>"+option1+"  <span>"+replaceOption1+"</span></div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        case "3":{
                                            var n2=returndata1[i].cvoptions.split("///");
                                            var size2= n2.length;
                                            for (var l=0;l<size2;l++){
                                                $("#question").append("<div><input type='text' placeholder='请输入答案。' name='answer["+l+"]' class='form-control'></div>");
                                            }
                                            $("#question").append("<input type='hidden' value='2' name='opportunity'>");
                                            $("#openModel>div").append("<input type='button' value='提交' class='submitBtn' onclick='submitAnswer("+returndata1[i].id+","+returndata1[i].cvtype+")'>");
                                            break;
                                        }
                                        default:break;
                                    }
                            }
                        }
                    });
                    $video.on("timeupdate",function(){
                        var totaltime=player.duration;
                        var currenttime=player.currentTime;
                        var progress=(currenttime/totaltime)*100;
                        $("#progressBar").css("width",progress+"%");
                        var time=parseInt(currenttime);
                        if (time<10) {
                            $("#currentTime").text("0:0"+time);
                        }else if(time>=10&&time<60){
                            $("#currentTime").text("0:"+time);
                        }else if (time>=60) {
                            var min=parseInt((time/60));
                            var second=time-min*60;
                        if (second<10) {
                            $("#currentTime").text(min+":0"+second);
                        }else{
                            $("#currentTime").text(min+":"+second);
                        }
                    }
                });
//                    $("#pvideo").append($video);
                }else if(data.status==1){
//                    var $video=$("<video></video>");
//                    var video=$video[0];
//                    $video.attr("width","100%");
//                    $video.attr("height","50%");
//                    $video.attr("controls","controls");
//                    $video.attr("id","videobox");
//                    $video.autoplay=true;
//                    $video.append("<source src='"+turl+"'>");
//                    $("#pvideo").append($video);
                    var $video=$("#pvideo");
//                    $video.autoplay=true;
                    var video=$video[0];
                    video.autoplay=true;
                    video.controls=false;
                    video.src=turl;
                    video.play();
                }
                $("#play").toggleClass("hide");
                $("#pause").toggleClass("hide");
            },
            error:function(data){

            }

        });
    }

    
    function submitAnswer(id,type){
        var dataStr=$("#question").serialize();
        $.ajax({
            type:"GET",
            url:"<?php echo U('Course/comAnswer');?>",
            dataType:"json",
            data:dataStr+"&id="+id+"&type="+type,
            contentType:"application/json;charset=utf-8",
            success:function(data){
                if (data.status==0){
                    $("#openModel >div").remove();
                    $("#openModel").append("<div style='border-left-color:#00ff36;height: auto '><img src='/wikewechat/Public/img/right.png' style='width: 80px'>" +
                            "<h3 style='position: absolute;top: 45px;left: 90px;'>恭喜您，答对了！</h3>" +
                            "<div style='margin: 10px 40px 10px 40px'><p>题目解析："+data.analy+"</p></div>" +
                            "<button class='submitBtn' onclick='exitModelDialog()'>确定</button></div>");
                }else if (data.status==1){
                    $("#openModel >div").remove();
                    $("#openModel").append("<div style='border-left-color:#ff0000;height: auto '><img src='/wikewechat/Public/img/wrong.png' style='width: 80px'>" +
                            "<h3 style='position: absolute;top: 45px;left: 90px;'>回答错误，请继续加油！</h3>" +
                            "<div style='margin: 10px 40px 10px 40px'><p>题目解析："+data.analy+"</p></div>" +
                            "<button class='submitBtn' onclick='exitModelDialog()'>确定</button></div>");

                }else if(data.status==2){
                    $("#openModel input[type='hidden']").val("1");
                    $("#openModel>div").css("border-left-color","#ff0000");
                    $("#openModel img").attr("src","/wikewechat/Public/img/wrong.png");
                    $("#openModel>div>p").text("回答错误，您还有一次机会");
                    $("#openModel>div>p").css("color","#ff0000");
                }
                $("#play").toggleClass("hide");
                $("#pause").toggleClass("hide");
            },
            error:function(data){
                $("#openModel >div").remove();
                $("#openModel").append("<div style='border-left-color:#00ff36;height: 150px '><img src='/wikewechat/Public/img/wrong.png' style='width: 80px'>" +
                        "<h3 style='position: absolute;top: 45px;'>发生未知错误，请刷新页面重试！</h3>" +
                        "<div></div></div>");
            }
        });
    }

    function exitModelDialog(){
        $("#openModel>div").remove();
        $("#openModel").css({"z-index":"-1","opacity":0});
        $("body").css("overflow","scroll");
        var $video=$("#pvideo>video");
        var video=$video[0];
        video.play();

    }
    // function fullScreen(){
    //     var element=document;
    //     if (element.requestFullscreen) {
    //         element.requestFullscreen();
    //     }else if (element.mozRequestFullScreen) {
    //         element.mozRequestFullScreen();
    //     }else if (element.msRequestFullscreen) {
    //         element.msRequestFullscreen();
    //     }else if (element.oRequestFullscreen) {
    //         element.oRequestFullscreen();
    //     }else if (element.webkitRequestFullscreen) {
    //         element.webkitRequestFullscreen();
    //     }else{
    //         var docHtml=document.documentElement;
    //         var docBody=document.body;
    //         var cssText="width:100%;height:100%;overflow:hidden;"
    //         docHtml.style.cssText=cssText;
    //         docBody.style.cssText=cssText;
    //         player.style.cssText=cssText+"margin:0px;padding:0px;"
    //         document.IsFullScreen=true;
    //     }
    //     $("#enlarge").toggleClass("hide");
    //     $("#shrink").toggleClass("hide");
    // }
    function exitFullScreen(){
        if (document.exitFullscreen){
            document.exitFullscreen();
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }else if(document.mozCancelFullScreen){
            document.mozCancelFullScreen();
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }else if(document.msExitFullScreen){
            document.msExitFullScreen();
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }else if(document.oRequestFullScreen){
            document.oRequestFullScreen();
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }else if(document.webkitExitFullscreen){
            document.webkitExitFullscreen();
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }else {
            var docHtml=document.documentElement;
            var docBody=document.body;
            var videobox=document.getElementById("player");
            docHtml.style.cssText="";
            docBody.style.cssText="";
            videobox.style.cssText="";
            document.IsFullScreen=false;
            $("#shrink").toggleClass("hide");
            $("#enlarge").toggleClass("hide");
        }
        
    }
    // $("#enlarge").click(fullScreen());
    $("#shrink").click(exitFullScreen());

</script>
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