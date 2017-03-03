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
        ﻿<script src="/wikewechat/Public/js/wike.js"></script>
<link href="/wikewechat/Public/css/wike.css" rel="stylesheet">
<script src="/wikewechat/Public/js/jquery.js"></script>
<script src="/wikewechat/Public/js/echarts.min.js"></script>
<div class="wike-content-container">
        <h3>本章节学习情况</h3>
        <hr>
        <h4>本章节视频目录</h4>
        <span class="wike-item-control">
        <a href="<?php echo U('Course/addCVideo',array('cid'=>$videoData[0]['cid'],'chid'=>$videoData[0]['chid']));?>">
            <i class="fa fa-plus"></i>添加视频
        </a>
        </span>
        <table class="course_table">
            <tr>
                <td>视频名称</td>
                <td>视频地址</td>
            </tr>
            <?php if(is_array($videoData)): $i = 0; $__LIST__ = $videoData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($data[vname]); ?></td>
                <td><?php echo ($data[vdev]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <h4>学生学习情况</h4>
        <div id="main1" style="width: 600px;height: 400px"></div>
        <script>
            var myChart=echarts.init(document.getElementById('main1'));
            var option={
                title:{
                    text:'各节课分布情况'
                },
                tooltip:{},
                legend:{data:['人数']},
                xAxis:{
                    data:[
                    <?php
 foreach($videoData as $key => $value) { echo "\"".$value[vname]."\","; } ?>
                    ]
                },
                yAxis:{},
                series:[{
                    name:'人数',
                    type:'bar',
                    data:[
                    <?php
 $length=count($count); for($i=0;$i<$length;$i++){ echo "\"".$count[$i]['num']."\","; } ?>]
                }]
            };
            myChart.setOption(option);
        </script>
        <h4>课程试题情况</h4>
        <?php
 for($i=0;$i<count($videoData);$i++){ echo "<h5>".$videoData[$i]['vname']."</h5>"; $len=count($count1[$i]); if($len>0){ echo "<select name="."\"ctestid"."\" id="."\"ctestid".$i."\" onchange='selectChange(".$i.")'>"; echo "<option></option>"; for($j=0;$j<$len;$j++){ echo "<option value=".$count1[$i][$j]['id'].">".$count1[$i][$j]['cvcontent']."</option>"; } echo "</select>"; echo "<font style='color: #5ED66E;'><--选择题目</font>"; }else{ echo "<p>无</p>"; } echo "<hr>"; } ?>
        <script type="text/javascript">
        	function selectChange(id){
        		var $this=$(this);
        		var $select=$("#ctestid"+id);
        		var select=$select.val();
        		// if($('#chart'+select)){
        		// 	$('#chart'+select).remove();
        		// }
        		$select.next("div").remove();
        		$select.next("div").remove();
        		if(select!=""){
        		$.ajax({
        			type:"GET",
        			url:"<?php echo U('Course/getTestData');?>",
        			data:"ctestid="+select,
        			success:function(data){
        				
        				$select.after("<div id='chart_"+select+"' style='width:600px;height:400px;'></div>");
        				var myChart1=echarts.init(document.getElementById('chart_'+select));
        				var chartdata1=data['data1'];
        				var chartdata2=data['data2'];
        				if(chartdata1[0]!=undefined){
        					var tmp=chartdata1[0];
        				var tmp2=chartdata1[1];
        				if (tmp.flag=='0') {
        					data1=tmp;
        					if(tmp2==undefined){
        						data2={count:'0',flag:'1'};
        					}else{
        						data2=tmp2;
        					}
        				}else{
        					data2=tmp;
        					if (tmp2==undefined) {
        						data1={count:'0',flag:'0'};
        					}else{
        						data1=tmp2;
        					}
        				}
        			}else{
        				data1={count:'0',flag:'0'};
        				data2={count:'0',flag:'1'};
        			}
        				
            			var option={
                		title:{
                    		text:'该试题回答情况'
                		},
                		tooltip:{},
                		legend:{data:['人数']},
                		xAxis:{
                    		data:[
                    			'答对','没有答对'
                    		]
                		},
                		yAxis:{},
                		series:[{
                    		name:'人数',
                    		type:'bar',
                    	data:[
                    		data1.count,data2.count
                    		]
                		}]
            			};
            		myChart1.setOption(option);
            		$('#chart_'+select).after("<div id='chart1_"+select+"' style='width:600px;height:400px;'></div>");
            			var myChart2=echarts.init(document.getElementById('chart1_'+select));
            			if(chartdata2[0]!=undefined){
        					var tmp=chartdata2[0];
        				var tmp2=chartdata2[1];
        				if (tmp.account=='1') {
        					data1=tmp;
        					if(tmp2==undefined){
        						data2={count:'0',account:'1'};
        					}else{
        						data2=tmp2;
        					}
        				}else{
        					data2=tmp;
        					if (tmp2==undefined) {
        						data1={count:'0',account:'2'};
        					}else{
        						data1=tmp2;
        					}
        				}
        			}else{
        				data1={count:'0',account:'1'};
        				data2={count:'0',account:'2'};
        			}
            			var option1={
                		title:{
                    		text:'该试题答对部分情况'
                		},
                		tooltip:{},
                		legend:{data:['人数']},
                		xAxis:{
                    		data:[
                    			'两次才答对','一次就答对'
                    		]
                		},
                		yAxis:{},
                		series:[{
                    		name:'人数',
                    		type:'bar',
                    	data:[
                    		data1.count,data2.count
                    		]
                		}]
            			};
            		myChart2.setOption(option1);
        			}
        	});
        	}
        	}
        </script>
</div>
        <footer class="text-right">
    <p>Copyright &copy; 2016 WiKeWeChat
        | Connect to <a href="http://www.cnblogs.com/libertycode/" target="_blank">http://www.cnblogs.com/libertycode/</a></p>
</footer>
    </div>
</div>



</body>
</html>