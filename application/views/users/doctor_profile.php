<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
if (isset($this->session->userdata['logged_in_doctor'])) {
	$username = ($this->session->userdata['logged_in_doctor']['username']);
	$email = ($this->session->userdata['logged_in_doctor']['email']);
} 
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>docter profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doctor_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
</head>

<body>
    <div class="top">
    <?php if (isset($this->session->userdata['logged_in_doctor'])) {
        $username = ($this->session->userdata['logged_in_doctor']['username']);?>
    <div class = "top-img"><img class="logo" src="<?php echo base_url() ?>assets/images/newLogo.png"> </div>
    <p class="title">Today is <?php echo date('M-d')  ?>.  Have a nice day, <b><?php echo $username?></p>
    </div>
    <article>
    <div class="left-div">
        <figure>
            <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
        <p class="name"><?php echo $username?></p>
        <?php }?>
    </figure>
        <ul>
            <li><a class="left-nav" href="<?php echo base_url('dhome') ?>">Home</a></li>
            <li><a class="left-nav active" href="<?php echo base_url('Users/doctor_profile') ?>">Profile</a></li>
            <li><a class="left-nav" href="<?php echo base_url('appointment');?>">Appointment</a></li>
            <li><a class="left-nav" href="<?php echo base_url('dview');?>">Treatment plan</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Dchat') ?>">Chat</a></li>
        </ul>
    </div>
    <div class ="content">
		<div class="section">
			<div class="heading">Username</div>
			<input type="text" class="textbox" placeholder=<?php echo $username?> name="username" id="username" value="" disabled="true">
        </div>
        
		<div class="section">
			<div class="heading">Email</div>
			<input type="text" class="textbox" placeholder=<?php echo $email?> name="email" id="email" value="" disabled="true">
           
        </div>
		<div class="section">
			<div class="heading">Specialities</div>
			<input type="text" class="textbox" placeholder="Hematology & Oncology" name="specialities" id="specialities" value="" disabled="true">
		</div>
		<div class="section">
			<div class="heading">Languages</div>
			<input type="text" class="textbox" placeholder="English & Mandarin" name="languages" id="languages" value="" disabled="true">
		</div>
		<div class="section">
			<div class="heading">Phone</div>
			<input type="text" class="textbox" placeholder="" name="phone" id="phone" value="" disabled="true">
		</div>
		<div class="section">
			<div class="heading">Working Hours</div>
			<input type="text" class="textbox" placeholder="" name="working-hours" id="working-hours" value="" disabled="true">
		</div>
		<div class="section">
			<div class="heading">Primary Office</div>
			<input type="text" class="textbox" placeholder="" name="primary-office" id="primary-office" value="" disabled="true">
		</div>
		<div class="section">
			<button class="back-btn" id="back-btn" onclick="backConfirm();" value="" style="display: none;">Back</button>
			<button class="edit-update-btn" id="edit-update-btn" onclick="enableEdit();">Edit</button>
		</div>
         
    </div>
    </article>
    
    <script>
    var beingEdited = false;
    
    function enableEdit() {
        if (beingEdited) {
            disable();
            beingEdited = false;
        } else {
            enable();
            beingEdited = true;
        }
    }
    
    function backConfirm() {
        var x = confirm("Your change won't be saved!");
        if (x) {
            // Don't save
            clearText();
            disable();
        }
    }
    
    function enable() {
        document.getElementById('edit-update-btn').innerHTML = "Update";
        document.getElementById('username').removeAttribute("disabled");
        document.getElementById('email').removeAttribute("disabled");
        document.getElementById('specialities').removeAttribute("disabled");
        document.getElementById('languages').removeAttribute("disabled");
        document.getElementById('phone').removeAttribute("disabled");
        document.getElementById('working-hours').removeAttribute("disabled");
        document.getElementById('primary-office').removeAttribute("disabled");
        document.getElementById('back-btn').style.display = "inline-block";
    }
    
    function disable() {
        document.getElementById('edit-update-btn').innerHTML = "Edit";
        document.getElementById('username').setAttribute("disabled", true);
        document.getElementById('email').setAttribute("disabled", true);
        document.getElementById('specialities').setAttribute("disabled", true);
        document.getElementById('languages').setAttribute("disabled", true);
        document.getElementById('phone').setAttribute("disabled", true);
        document.getElementById('working-hours').setAttribute("disabled", true);
        document.getElementById('primary-office').setAttribute("disabled", true);
        document.getElementById('back-btn').style.display = "none";
    }
    
    function clearText() {
        document.getElementById('username').value = "";
        document.getElementById('email').value = "";
        document.getElementById('specialities').value = "";
        document.getElementById('languages').value = "";
        document.getElementById('phone').value = "";
        document.getElementById('working-hours').value = "";
        document.getElementById('primary-office').value = "";
        document.getElementById('back-btn').value = "";
    }
    </script>
    
</body>
</html>
