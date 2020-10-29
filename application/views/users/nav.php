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
    position:relative;
    margin-left:77.5vw;
    }
    </style>
</head>

<body>
    <ul>
    <?php if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);?> 
   <button onclick="myFunction()" class="dropbtn"> <i class="far fa-user" ></i>&nbsp;<?php echo $username?></button>
    <div id="myDropdown" class="dropdown-content">
    <a href="<?php echo base_url('users/profile'); ?>">Profile</a>
    <a href="<?php echo base_url('Users/logout'); ?>">Logout</a> 
  </div>
 
    <?php } else { ?>
        <button onclick="window.location.href='<?php echo base_url('users/login'); ?>'"> <i class="far fa-user" ></i>&nbsp;Login</button>
        <?php } ?>
  </div>
        <li><a class="nav" href="<?php echo base_url('Chat'); ?>">Chat</a></li>
        <li><a class="nav" id='calendar' href="<?php echo base_url('User_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" id="diagnosis" href="<?php echo base_url('Ddiagnosis'); ?>">Diagnosis</a></li>
        <li><a class="nav" id="booking" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" id="home" href="<?php echo base_url('Home'); ?>">Home</a></li>

  </div>
    </ul>
    <script>
    // Dropdown button
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
    <script>
        if (window.location.href == 'https://deco3801-zelda.uqcloud.net/DoctorU/Home' ) {
            var home = document.getElementById('home');
            home.className = "active";
        }
        if (window.location.href == 'https://deco3801-zelda.uqcloud.net/DoctorU/users/login') {
            var home = document.getElementById('home');
            home.className = "active";
        }
        if (window.location.href == 'https://deco3801-zelda.uqcloud.net/DoctorU/Booking') {
            var booking = document.getElementById('booking');
            booking.className = "active";
        }
        if (window.location.href == 'https://deco3801-zelda.uqcloud.net/DoctorU/Ddiagnosis') {
            var diagnosis = document.getElementById('diagnosis');
            diagnosis.className = "active";
        }
        if (window.location.href == 'https://deco3801-zelda.uqcloud.net/DoctorU/checker') {
            var diagnosis = document.getElementById('diagnosis');
            diagnosis.className = "active";
        }
    </script>
</body>
</html>