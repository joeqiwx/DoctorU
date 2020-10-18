<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <style>
    #google_translate_element {
        width: 5%;
    }
    </style>
</head>

<body>
<div id="google_translate_element"></div>
    <div id="nav-placeholder">
    </div>
    <ul>
    <?php if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);?>
    <button onclick="window.location.href='<?php echo base_url('users/profile'); ?>'"> <i class="far fa-user" ></i>&nbsp;<?php echo $username?></button>
    <?php } else { ?>
        <button onclick="window.location.href='<?php echo base_url('users/login'); ?>'"> <i class="far fa-user" ></i>&nbsp;Login</button>
        <?php } ?>
        <li><a class="nav" href="#">Setting</a></li>
        <li><a class="nav" href="<?php echo base_url('chat'); ?>">Chat</a></li>
        <li><a class="nav" href="<?php echo base_url('user_calendar')?>">Treatment Plan</a></li>
        <li><a class="active" href="#">Diagnosis</a></li>
        <li><a class="nav" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('users/homePage'); ?>">Home</a></li>
    </ul>
    <div class="intro-container">
        <p>Diagnosis</p>
    </div>
    <div class="check">
        <button onclick="window.location.href='<?php echo base_url('checker');?>'">Symptom Check ></button>
    </div>
    <div class="honey">
        <a href="<?php echo base_url('Chat/matchingDoctor');?>">
        <img src="<?php echo base_url(); ?>assets/images/ch.png" alt="" class="one" > </a>
        <img src="<?php echo base_url(); ?>assets/images/01.png" alt="" class="two">
        <img src="<?php echo base_url(); ?>assets/images/t.png" alt="" class="three">
        <img src="<?php echo base_url(); ?>assets/images/sight.png" alt="" class="four">
        <img src="<?php echo base_url(); ?>assets/images/m.png" alt="" class="five">
        <img src="<?php echo base_url(); ?>assets/images/s.png" alt="" class="six">
        <img src="<?php echo base_url(); ?>assets/images/h.png" alt="" class="seven">
    </div>
    <div class="dia"><img src="<?php echo base_url(); ?>assets/images/diagnosis.svg" alt=""></div>

    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>