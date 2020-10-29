<!DOCTYPE html>
<!-- saved from url=(0054)https://deco3801-zelda.uqcloud.net/DoctorU/users/login -->

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>docter treatment plan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />
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
</head>

<body>
    <div class="top">
    <?php if (isset($this->session->userdata['logged_in_doctor'])) {
        $username = ($this->session->userdata['logged_in_doctor']['username']);?>
    <div class = "top-img"><img class="logo" src="<?php echo base_url() ?>assets/images/logoSquare.png"> </div>
    <p class="title">Today is <?php echo date('M-d')  ?>.  Have a nice day, <b><?php echo $username?></p>
    </div>
    <article>
    <div class="left-div">
        <figure>
            <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
        <p class="name"><?php echo $username?></p>
        <?php } ?>    
    </figure>
        <ul>
            <li><a class="left-nav" href="<?php echo base_url('dhome') ?>">Home</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Users/doctor_profile') ?>">Profile</a></li>
            <li><a class="left-nav" href="<?php echo base_url('appointment');?>">Appointment</a></li>
            <li><a class="active" href="<?php echo base_url('dview');?>">Treatment plan</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Dchat') ?>">Chat</a></li>
        </ul>
    </div>
    <div class ="content" >
    <form class="form-inline my-2 my-lg-0" style="margin-left:480px;">
			<span class="input-group-addon">Search</span>
			<input type="text" name="search_text" id="search_text" placeholder="Search patient information" class="form-control" style="text-align:center; width:400px;"/>
		</form>
        <div id="result"></div>

        
</div>
<div style="clear:both"></div>
<br />
<br />
<br />
<br />
    </div>
    </article>
    
</body>
<script>
	$(document).ready(function(){
		function load_data(query)
		{
			$.ajax({
				url:"<?php echo base_url(); ?>Dview/fetch",
				method:"POST",
				data:{query:query},
				success:function(data){
					$('#result').html(data);
				}
			})
		}

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '') {
				load_data(search);
			}
		});
	});
</script>
</html