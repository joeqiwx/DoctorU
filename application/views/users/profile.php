<!doctype html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
} else {
	header("location: login");
}
?>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
</head>

<body>
    <ul>
    <?php if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);?>
    <button onclick="window.location.href='<?php echo base_url('users/profile'); ?>'"> <i class="far fa-user" ></i>&nbsp;<?php echo $username?></button>
    <?php } else { ?>
        <button onclick="window.location.href='<?php echo base_url('users/login'); ?>'"> <i class="far fa-user" ></i>&nbsp;Login</button>
        <?php } ?>
        <li><a class="nav" href="<?php echo base_url('chat'); ?>">Chat</a></li>
        <li><a class="nav" href="<?php echo base_url('user_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" href="<?php echo base_url('users/diagnosis'); ?>">Diagnosis</a></li>
        <li><a class="nav" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('Home'); ?>">Home</a></li>
    </ul>
    <div class="profile-box">
        <div class="section">
            <div class="heading">Username</div>
            <input type="text" class="textbox" placeholder=<?php echo $username?> name='username' id='username' value="" disabled/>
        </div>
        <div class="section">
            <div class="heading">Email</div>
            <input type="text" class="textbox" placeholder=<?php echo $email?> name='email' id='email' value="" disabled/>
        </div>
        <div class="section">
            <div class="heading">Age</div>
            <input type="text" class="textbox" placeholder="" name='age' id='age' value="" disabled/>
        </div>
        <div class="section">
            <div class="heading">Gender</div>
            <input type="text" class="textbox" placeholder="" name='gender' id='gender' value="" disabled/>
        </div>
        <div class="section">
            <div class="heading">Allergy</div>
            <input type="text" class="textbox" name='allergy' id='allergy' value="" disabled/>
        </div>
        <div class="section">
            <div class="heading">Medical history</div>
            <textarea type="text" class="textarea" name='med-history' id='med-history' disabled></textarea>
        </div>
        <div class="section">
            <button class="back-btn" id="back-btn" onclick="backConfirm();">Back</button>
            <button class="edit-update-btn" id="edit-update-btn" onclick="enableEdit();">Edit</button>
        </div>
    </div>
    
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
        document.getElementById('age').removeAttribute("disabled");
        document.getElementById('gender').removeAttribute("disabled");
        document.getElementById('allergy').removeAttribute("disabled");
        document.getElementById('med-history').removeAttribute("disabled");
        document.getElementById('back-btn').style.display = "inline-block";
    }
    
    function disable() {
        document.getElementById('edit-update-btn').innerHTML = "Edit";
        document.getElementById('username').setAttribute("disabled", true);
        document.getElementById('email').setAttribute("disabled", true);
        document.getElementById('age').setAttribute("disabled", true);
        document.getElementById('gender').setAttribute("disabled", true);
        document.getElementById('allergy').setAttribute("disabled", true);
        document.getElementById('med-history').setAttribute("disabled", true);
        document.getElementById('back-btn').style.display = "none";
    }
    
    function clearText() {
        document.getElementById('username').value = "";
        document.getElementById('email').value = "";
        document.getElementById('age').value = "";
        document.getElementById('gender').value = "";
        document.getElementById('allergy').value = "";
        document.getElementById('med-history').value = "";
        document.getElementById('back-btn').value = "";
    }
    </script>
  
</body>
</html>