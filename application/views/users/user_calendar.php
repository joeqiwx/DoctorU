<!DOCTYPE html>
<html>
<head>
	<title>Calendar </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.js"></script>
    <style>
    .dropdown-content {
    
    left: 76.5vw;
    top: 5vh;
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

    .userbutton {
        position:relative;
        
    }
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
    <a href="<?php echo base_url('Users/logout'); ?>">Logout</a>
  </div>
  </div>
    <?php } else { ?>
        <button onclick="window.location.href='<?php echo base_url('users/login'); ?>'"> <i class="far fa-user" ></i>&nbsp;Login</button>
        <?php } ?>
        <li><a class="nav" href="<?php echo base_url('chat'); ?>">Chat</a></li>
        <li><a class="active" href="<?php echo base_url('user_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" href="<?php echo base_url('Ddiagnosis'); ?>">Diagnosis</a></li>
        <li><a class="nav" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('Home'); ?>">Home</a></li>
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
<br />
<br />
<br />
<div class="box">
<div class="container">
	<div id="calendar"></div>
</div>
<div class="tip">
	<img onclick="popWindows()" id = "tip" src="<?php echo base_url() ?>assets/images/qmark.png" alt="tips">
</div>

    <div id="popLayer" style="display:none">
            <!-- content of the windows -->
            <div class="pop-title">Tips</div>
            <div class="pop-content">On this page, the user can see the treatment plan and reminders customized by the doctor. The user can also record his physical condition and treatment feeling to help the doctor get feedback in time to adjust the treatment plan.</div>


            <button id="ok-btn" onclick="closeWindows()">Close </button>
    </div>

    <div id="mouseOver" style="display:none">
            <!-- content of the windows -->
            <div class="pop-content">
			    <div id="eventTitle"> Event : </div>
                <div id="eventTime"> Time: </div>
			</div>
    </div>
</body>
<script>
		$(document).ready(function(){
			var calendar = $('#calendar').fullCalendar({
				themeSystem: 'bootstrap4',
				editable: true,
				header:{
					left:'prev,next day, today',
					center:'title',
					right:'month,agendaWeek,agendaDay,listWeek'
				},
				events:"<?php echo base_url();?>user_calendar/load",
				customRender: true,
				selectable:true,
				selectHelper:true,
				select:function (start, end, allDay) {
					var title = prompt("Please enter event title.");
					if(title){
						var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
						var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
						$.ajax({
							url:"<?php echo base_url(); ?>user_calendar/insert",
							type:"POST",
							data:{title:title, start:start, end:end},
							success: function () {
								calendar.fullCalendar('refetchEvents');
								alert("Added successfully.");

							}
						})
					}
				},


				editable:true,
				eventResize:function (event) {
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
					var title = event.title;
					var id = event.id;
					$.ajax({
						url: "<?php echo base_url(); ?>user_calendar/update",
						type: "POST",
						data: {title: title, start: start, end: end, id: id},
						success: function () {
							calendar.fullCalendar('refetchEvents');
							alert("Update successfully.");
						}
					})
				},

				eventDrop:function (event) {
					var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
					var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
					var title = event.title;
					var id = event.id;
					$.ajax({
						url: "<?php echo base_url(); ?>user_calendar/update",
						type: "POST",
						data: {title: title, start: start, end: end, id: id},
						success: function () {
							calendar.fullCalendar('refetchEvents');
							alert("Update successfully.");
						}
					})


				},

					eventClick:function (event) {
						if(confirm("Remove it?")){
							var id = event.id;
							$.ajax({
								url:"<?php echo base_url(); ?>user_calendar/delete",
								type:"POST",
								data: {id:id},
								success: function () {
									calendar.fullCalendar('refetchEvents');
									alert("Remove successfully.");
								}
							})
						}
					},
 
					eventMouseover: function (event, $el) { 
						var popLayer = document.getElementById("mouseOver");
						popLayer.style.display = "block";
						var title = event.title;
						var time = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss"); 
						$("#eventTitle").append(title);
						$("#eventTime").append(time);
						popLayer.style.position = "absolute";
						var left = $el.clientX + "px";
						var top = $el.clientY + "px";
						popLayer.style.left = left;
						popLayer.style.top = top;
					},

					eventMouseout: function(event) {
						var popLayer = document.getElementById("mouseOver");
						popLayer.style.display = "none";
						$("#eventTitle").empty();
						$("#eventTitle").append("Event: ");
						$("#eventTime").empty();
						$("#eventTime").append("Time :");
					}
			}
			)
		})
		
		function closeWindows() {
                var popLayer = document.getElementById("popLayer");
                popLayer.style.display = "none";
            }
		function popWindows() { 
			var popLayer = document.getElementById("popLayer");
			popLayer.style.display = "block";
		}
	</script>
<style type="text/css">
.box{
	display:flex;
	flex-direction:row;
}#mouseOver {
    padding-top:10px;
    z-index: 21;
    position: absolute;
    top: 30%;
    left: 50%;
    margin-left: -250px;
    width: 250px;
    height: 150px;
    border-radius: 10px;
    background-color: #f7f7f7;
    text-align: center;
    border-style:solid;
    border-width: 2px;
    color: #0F0E0E;
}
#popLayer {
    padding-top:10px;
    z-index: 21;
    position: absolute;
    top: 30%;
    left: 50%;
    margin-left: -250px;
    width: 500px;
    height: 210px;
    border-radius: 10px;
    background-color: #f7f7f7;
    text-align: center;
    border-style:solid;
    border-width: 2px;
    color: #0F0E0E;
}
#eventTitle {
	height: auto;  
    word-wrap:break-word;  
    word-break:break-all;  
    overflow: hidden;
	width:180px;
}
.pop-title{
    font-size: 20px;
	line-height: 37px;
	font-weight:bold;
}
.pop-content{
	margin-left: 10px;
	margin-right:10px;
	text-align: left;

}
#ok-btn{
    background-color: #157EE6; 
    border-radius: 8px;
    border: none;
    color: white;
    padding: 5px 20px;
    margin-top:20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
	cursor: pointer;
	margin-right: 200px;
}
#tip {
	position: absolute;
	top:90%;
	left:90%;
    width: 25px;
	height: 25px;
	z-index:21;
 
}

</style>
</html>