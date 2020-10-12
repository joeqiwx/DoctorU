<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit">
    <title>Registration</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php echo form_open('users/registration'); ?>
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
			<div class="login-box">
			<?php echo validation_errors(); ?>
			<?php
				echo "<div class='error_msg'>";
				if (isset($message_display)) {
					echo $message_display;
				}
				echo "</div>";?>
				<div class="login-txt">Username</div>
				<input type="text" class="form-control icon01" placeholder="doctoru" name='username' id='username'>
				<div class="login-txt">Email</div>
				<input type="text" class="form-control icon02" placeholder="Email" name='email' id='email'>
				
				<div class="login-txt">Password</div>
				<div class="relative">
					<input type="password" class="form-control icon03" placeholder="Password" name='password' id='password'>
					<a role="button" class="look"></a>
				</div>
				
				<div class="login-txt">Confirm Password</div>
				<div class="relative">
					<input type="password" class="form-control icon03" placeholder="Password" name='conpassword' id='conpassword'>
					<a role="button" class="look"></a>
				</div>
				
				<div class="text-center"><button type="submit" value="Submit" class="btn btn-login" style="font-size: 0.24rem;">Sign Up</button></div>
			</div>
			<div class="login-right-p text-center">Already have an account?</div>
			<div class="text-center"><button type="button" class="btn btn-login btn-login-b"  onclick="window.location.href='<?php echo base_url('users/login'); ?>'"><span>Login</span></button></div>
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