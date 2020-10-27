
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.js"></script>
    <style type="text/css">
* {
    margin: 0;
}

body {
    background: #2174f8;
    text-decoration: none;
}


.top{
    margin-top: 20px;
    display: flex;
    /* justify-content:space-around; */

}

.title{
    margin-top: 15px;
    width: 90%;
}
.top img{
    width: 160px;
    height: 70px;
}
button {
    float: right;
    background-color: #157EE6; 
    border-radius: 8px;
    border: none;
    color: white;
    padding: 8px 32px;
    margin-left: 3vw;
    margin-top: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    cursor: pointer;
    border-style:solid;
    border-width:1.5px;
    border-color: white;
}
.title {
    color: white;
    font-size: 25px;
    text-align: center;
}

.left-div {
    /* display: block;
    position: relative;
    top: 10vh; */
    /* width: 200px; */
    display: flex;
    flex-direction: column;
    width: 15%;
}
.left-div img{
    
    width:80px;
    height:80px;
    margin-bottom: 20px;
}
.left-div figure{
    margin-left: 50px;
    display: flex;
    flex-direction: column;
}

.name{
    margin-left: -5px;
    background-color: white;
    width: 90px;
    height: 30px;
    border-radius: 10px;
    margin-left: 0 auto;
    color:#2174f8;
    padding-top:3px ;
    text-align: center;

}
ul {
    margin-top:20px ;
    list-style-type: none;
}
li{
    margin: 20px 0 20px 0;
}
li a {
    margin:10px;
    display: inline;
    color: white;
    text-align: center;
    text-decoration: none;
    font-family: 'Fira Code', monospace;
    font-size: 18px;
    font-weight: 400;

}
.active{
    color: #EF8354;
    text-decoration: underline;
}
li a:hover {
    color: #EF8354;
    transition: 0.3s;
}
article{
    display: flex;
    margin-top:30px ;
}

.content{
    margin:0 auto;
    width: 1384px;
    height: 640px;
    padding-bottom: 15px;
    background-color: #F2F2F2;
    border-radius: 10px;

}
</style>

	<script>
		$(document).ready(function(){
			var calendar = $('#calendar').fullCalendar({
                defaultView: 'listMonth',
                height: 600,
                contentHeight: 500,
                aspectRatio: 0.5,
				themeSystem: 'bootstrap4',
				editable: true,
				header:{
					left:'',
					center:'title',
					right:''
				},
				events:"<?php echo base_url();?>appointment/load",
				selectable:true,
				selectHelper:true,
				select:function (start, end, allDay) {
					var title = prompt("Please enter event title.");
					if(title){
						var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
						var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
						$.ajax({
							url:"<?php echo base_url(); ?>appointment/insert",
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
						url: "<?php echo base_url(); ?>appointment/update",
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
						url: "<?php echo base_url(); ?>appointment/update",
						type: "POST",
						data: {title: title, start: start, end: end, id: id},
						success: function () {
							calendar.fullCalendar('refetchEvents');
							alert("Update successfully.");
						}
					})


				},
			}
			)
		})

	</script>

</head>
<body>
<div class="top">
    <div class = "top-img"><img class="logo" src="<?php echo base_url() ?>assets/images/logoSquare.png"> </div>
    <p class="title"><b>Appointment</p>
    </div>
    <article>
    <div class="left-div">
        <figure>
            <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
        <p class="name"><?php echo $this->session->userdata['logged_in_doctor']['username']; ?></p>
    </figure>
        <ul>
            <li><a class="left-nav active" href="">Home</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Users/doctor_profile') ?>">Profile</a></li>
            <li><a class="left-nav" href="<?php echo base_url('appointment');?>">Appointment</a></li>
            <li><a class="left-nav" href="<?php echo base_url('dview');?>">Treatment plan</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Dchat') ?>">Chat</a></li>

        </ul>
        </div>
    <div class ="content">
        </br>
        <div class="container">
	        <div id="calendar"></div>
        </div>
    </div>
    </article>
    

</body>
</html>