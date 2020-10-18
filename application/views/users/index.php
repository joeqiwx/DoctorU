<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit">
    <title>Home</title>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
	<div class="login-back"></div>
	<div class="clearfix">
		<div class="pull-left login">
			<!-- <img src="<?php echo base_url(); ?>assets/images/logo.png"> -->
		</div>
		<div class="pull-right right-top">
			<div class="dropdown">
			  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    ENG
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dLabel">
			    <li><a href="">CHINESE</a></li>
			  </ul>
			</div>
		</div>
	</div>
	<div class="clearfix">
		<div class="login-left pull-left">
			<div><img src="<?php echo base_url(); ?>assets/images/home.png"></div>
		</div>
		<div class="login-right pull-right">
	        <div class="content-txt" style="background-color:transparent; font-size: 0.22rem; text-align: left;"><span style="font-weight: bold">DoctorU</span> is an online medical consultation 
			application which the user can get a medical
			consultation through mobile or website. It 
			focuses on designing an efficient video 
			consultation interface and functions so that
			broader range of users can get equal quality 
			of medical service. 
			</div>
			<!-- <div class="login-right-p text-center">Don't have account?</div> -->
			<div class="text-center"><button type="button" class="btn btn-login"  onclick="window.location.href='<?php echo base_url('users/login'); ?>'">
			<span>Get started</span>
			</button></div>
		</div>
	</div>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script>
$(function(){
var whdef = 100/1920;
var wH = window.innerHeight;
var wW = window.innerWidth;
var rem = wW * whdef;
$('html').css('font-size', rem + "px");
});
$(window).resize(function (){
var whdef = 100/1920;
var wH = window.innerHeight;
var wW = window.innerWidth;
var rem = wW * whdef;
$('html').css('font-size', rem + "px");
});
</script>
</html>