<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">
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
        <div w3-include-html="nav.html"></div>
    </div>
    <div class="blocks">
        <div class="function" onclick="window.location.href='<?php echo base_url('Ddiagnosis'); ?>'"><i class="fas fa-user-md"></i>
            <p>Diagnosis</p>
        </div>
        <div class="function" onclick="window.location.href='<?php echo base_url('Booking'); ?>'"><i class="fas fa-book-medical"></i>
            <p>Consultation Booking</p>
        </div>
        <div class="function" onclick="window.location.href='<?php echo base_url('User_calendar'); ?>'"><i class="fas fa-calendar-alt"></i>
            <p>Treatment Plan</p>
        </div>
        <div class="function" onclick="window.location.href='<?php echo base_url('Chat'); ?>'"><i class="fas fa-comments"></i>
            <p>Online Chat</p>
        </div>
    </div>
    <div class="container"><img src="<?php echo base_url(); ?>assets/images/background.jpg" alt=""></div>
    <!-- <p>Translate this page:</p>
    <div id="google_translate_element"></div> -->

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>


</html>