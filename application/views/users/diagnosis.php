<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Diagnosis</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/diagnosis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <style>
    #google_translate_element {
        width: 5%;
    }

    .honey img:hover{
        cursor:pointer;
    }
    </style>
</head>

<body>
<div id="google_translate_element"></div>
    <div id="nav-placeholder">
    </div>
    
    <!-- The brief introduction of the symptom checker -->
    <div class="intro-container">
        <div class="dig-title">Diagnosis</div>
        <div class="dig-text"> By clicking on the common symptoms or disease categories listed in the hive, you can get medical consultation service 
        from qualified general practitioners or specialists via text and video chat. </div>
        <div class="dig-text">If you just feel uncomfortable but your symptom is not listed in the hive, you can click the symptom check button below
         to screen for possible causes, then chat withrelevant doctors.</div>
    </div>
    
    <div class="check">
        <button onclick="window.location.href='<?php echo base_url('checker');?>'">Symptom Check ></button>
    </div>

    <!-- The honey images for the diagnosis page -->
    <div class="honey">
        <a href="<?php echo base_url('Chat/matchingDoctor');?>">
        <img src="<?php echo base_url(); ?>assets/images/ch.png" alt="" class="one" 
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'"> </a>
        <img src="<?php echo base_url(); ?>assets/images/01.png" alt="" class="two" 
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
        <img src="<?php echo base_url(); ?>assets/images/t.png" alt="" class="three"
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
        <img src="<?php echo base_url(); ?>assets/images/sight.png" alt="" class="four"
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
        <img src="<?php echo base_url(); ?>assets/images/m.png" alt="" class="five"
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
        <img src="<?php echo base_url(); ?>assets/images/s.png" alt="" class="six"
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
        <img src="<?php echo base_url(); ?>assets/images/h.png" alt="" class="seven"
        onclick="window.location.href='<?php echo base_url('Chat/matchingDoctor'); ?>'">
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