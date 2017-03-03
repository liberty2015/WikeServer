$(function(){
	var $player=$("#player");
	var player=$player[0];
	// player.controls=false;
	$player.on("timeupdate",function(){
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
	$player.on("ended",function(){
		$("#play").toggleClass("hide");
		$("#pause").toggleClass("hide");
	});
	$("#play").click(function(){
		if(player.paused==true){
			player.play();
			$(this).toggleClass("hide");
			$("#pause").toggleClass("hide");
		}
	});
	$("#pause").click(function(){
		if (player.paused!=true) {
			player.pause();
			$(this).toggleClass("hide");
			$("#play").toggleClass("hide");
		}
	});
	// $("#enlarge").click(function(){
	// 	var element=document.documentElement;
	// 	if (element.requestFullscreen) {
	// 		element.requestFullscreen();
	// 	}else if (element.mozRequestFullScreen) {
	// 		element.mozRequestFullScreen();
	// 	}else if (element.msRequestFullscreen) {
	// 		element.msRequestFullscreen();
	// 	}else if (element.oRequestFullscreen) {
	// 		element.oRequestFullscreen();
	// 	}else if (element.webkitRequestFullscreen) {
	// 		element.webkitRequestFullscreen();
	// 	}else{
	// 		var docHtml=document.documentElement;
	// 		var docBody=document.body;
	// 		var cssText="width:100%;height:100%;overflow:hidden;"
	// 		docHtml.style.cssText=cssText;
	// 		docBody.style.cssText=cssText;
	// 		player.style.cssText=cssText+"margin:0px;padding:0px;"
	// 		document.IsFullScreen=true;
	// 	}
	// 	$(this).toggleClass("hide");
	// 	$("#shrink").toggleClass("hide");
	// });
	// $("#shrink").click(function(){
	// 	if (player.exitFullscreen) {
	// 		player.exitFullscreen();
	// 	}else if (player.mozCancelFullScreen) {
	// 		player.mozCancelFullScreen();
	// 	}else if (player.msExitFullscreen) {
	// 		player.msExitFullscreen();
	// 	}else if (player.oCancelFullScreen) {
	// 		player.oCancelFullScreen();
	// 	}else if (player.webkitExitFullscreen) {
	// 		Document.webkitExitFullscreen();
	// 	}else{
	// 		var docHtml=document.documentElement;
	// 		var docBody=document.body;
	// 		// var cssText="width:100%;height:100%;overflow:hidden;"
	// 		docHtml.style.cssText="";
	// 		docBody.style.cssText="";
	// 		player.style.cssText="";
	// 		document.IsFullScreen=false;
	// 	}
	// 	$(this).toggleClass("hide");
	// 	$("#enlarge").toggleClass("hide");
	// });
});