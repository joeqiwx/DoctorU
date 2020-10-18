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
    .dropdown-content {
    display: none;
    position: absolute;
    left: 86vw;
    top: 10.5vh;
    background-color: #157EE6; 
    min-width: 130px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 8px;
    }

    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    .dropdown a:hover {
    background-color: #EF8354;
    color: white;
    }

    .show {display: block;}
    </style>
</head>

<body>
    <ul>
    <div class="dropdown">
    <?php if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);?>
    <button onclick="myFunction()" class="dropbtn"> <i class="far fa-user" ></i>&nbsp;<?php echo $username?></button>
    <div id="myDropdown" class="dropdown-content">
    <a href="<?php echo base_url('users/profile'); ?>">Profile</a>
    <a href="#about">Logout</a>
  </div>
  </div>
    <?php } else { ?>
        <button onclick="window.location.href='<?php echo base_url('users/login'); ?>'"> <i class="far fa-user" ></i>&nbsp;Login</button>
        <?php } ?>
        <li><a class="nav" href="#">Setting</a></li>
        <li><a class="nav" href="<?php echo base_url('chat'); ?>">Chat</a></li>
        <li><a class="nav" href="<?php echo base_url('user_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" href="<?php echo base_url('users/diagnosis'); ?>">Diagnosis</a></li>
        <li><a class="nav" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('users/homePage'); ?>">Home</a></li>
    </ul>
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