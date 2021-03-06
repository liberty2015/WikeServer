<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WikeWeChat - Login</title>
    <link href="/WikeServer/img/wike_favicon.ico" type="image/x-icon" rel="icon">
    <link href="/WikeServer/img/wike_favicon.ico" type="image/x-icon" rel="shortcut icon">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <script src="/WikeServer/Public/js/jquery-1.11.2.min.js"></script>
    <link href='http://fonts.useso.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="/WikeServer/Public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/templatemo-style.css" rel="stylesheet">
    <link href="/WikeServer/Public/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/js/html5shiv.min.js"></script>
    <script src="/Public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="light-gray-bg">
<div class="templatemo-content-widget templatemo-login-widget white-bg">
    <header class="text-center">
        <div class="square"></div>
        <h1><?php echo C('SITE_TITLE');?></h1>
    </header>
    <form action="<?php echo U('Login/login');?>" class="templatemo-login-form" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                <input type="email" class="form-control" placeholder="xxxx@xxxx.com" name="email" id="email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
                <input type="password" class="form-control" placeholder="******" name="password" id="password">
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox squaredTwo">
                <input type="checkbox" id="c1" name="cc" />
                <label for="c1"><span></span>Remember me</label>
            </div>
            <div>
                <input type="text" id="verify_code" name="verify_code" class="form-control" placeholder="Identifying Code" width="100px">
                <img src="<?php echo U('Login/verify');?>" title="看不清？点我刷新" onclick="this.src+='?rand='+Math.random();">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="templatemo-blue-button width-100" id="submit">Login</button>
        </div>
    </form>
</div>
<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
    <p>Not a registered user yet? <strong><a href="#" class="blue-text">Sign up now!</a></strong></p>
</div>

</body>
</html>