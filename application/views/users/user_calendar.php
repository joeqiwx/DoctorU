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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.js"></script>

	
	

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
					}
			}
			)
		})

	</script>

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
        <li><a class="nav" href="#">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('users/homePage'); ?>">Home</a></li>
    </ul>
<br />
<br />
<br />

<div class="container">
	<div id="calendar"></div>
</div>
</body>
</html>