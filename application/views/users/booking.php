<!DOCTYPE html>
<!-- saved from url=(0057)https://deco3801-zelda.uqcloud.net/DoctorU/users/homePage -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title> booking</title>
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    </head>
<body>
    <ul class="nav-ul">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"> <i class="far fa-user"></i>&nbsp;abc</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="<?php echo base_url('users/profile'); ?>">Profile</a>
                <a href="<?php echo base_url('users/logout'); ?>" id="logout">Logout</a>
            </div>
        </div>
        <li><a class="nav" href="#">Setting</a></li>
        <li><a class="nav" href="<?php //echo base_url('chat'); ?>">Chat</a></li>
        <li><a class="nav" href="<?php //echo base_url('user_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" href="<?php //echo base_url('users/diagnosis'); ?>">Diagnosis</a></li>
        <li><a class="active" href="<?php //echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="#">Home</a></li>
    </ul>
    <div class="progress-bar" id="progress-bar">

        <div class="title-1" id="title-1">
            <div class="subtitle">
                <div class="rectangle">
                    <p>Department</p>
                </div>
                <div class="triangle-right"></div>
            </div>
        </div>
        <div class="title-2" id="title-2" style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                <div class="rectangle">
                    <p>Distance&Language</p>
                </div>
                <div class="triangle-right"></div>
            </div>
        </div>
        <div class="title-3" id="title-3"style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                <div class="rectangle">
                    <p>Date&time</p>
                </div>
                <div class="triangle-right"></div>
            </div>
        </div>
        <div class="title-4" id="title-4"style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                 <div class="rectangle">
                    <p>Doctor</p>
                </div>
                
             </div>
        </div>

    </div>
    <div class="main">
        <div class="department-page"id="department-page"  >
            <div class="departemnt-title"> please choose a medical department:</div>
            <div class="departemnt-content">
                <div class="column" id="departmentChoose" value="">
                    <div class="index">A</div>
                    <input type="radio" name="department" class="department" value="Anesthetics" onclick = changeColor()>Anesthetics </br>
                    <div class="index">B</div>
                    <input type="radio" name="department" class="department" value="Breast Screen" onclick = changeColor()>Breast Screen </br>
                    <div class="index">C</div>
                    <input type="radio" name="department" class="department" value="Cardiology"  onclick = changeColor()>Cardiology </br>
                    <div class="index">E</div>
                    <input type="radio" name="department" class="department" value="Ear,nose and throat(ENT)" onclick = changeColor()>Ear,nose and throat(ENT) </br>
                    <input type="radio" name="department" class="department" value="Elderly services department" onclick = changeColor()>Elderly services department </br>
                    <div class="index">G</div>
                    <input type="radio" name="department"class="department" value="Gastroenterology" onclick = changeColor()>Gastroenterology</br>
                    <input type="radio" name="department"class="department" value="General Surgery" onclick = changeColor()>General Surgery </br>
                    <input type="radio" name="department"class="department" value="Gynrcology" onclick = changeColor()>Gynrcology </br>
                </div>
                <div class="column">
                    <div class="index">H</div>
                    <input type="radio" name="department" class="department" value="Hematology" onclick = changeColor()>Hematology </br>
                    <div class="index">N</div>
                    <input type="radio" name="department" class="department" value="Neonatal Unit" onclick = changeColor()>Neonatal Unit </br>
                    <input type="radio" name="department" class="department" value="Neurology" onclick = changeColor()>Neurology </br>
                    <input type="radio" name="department" class="department" value="Nurtrition and dietetics" onclick = changeColor()>Nurtrition and dietetics </br>
                    <div class="index">O</div>
                    <input type="radio" name="department" class="department" value="Obstetrics and gynaecology units" onclick = changeColor()>Obstetrics and gynaecology units </br>
                    <input type="radio" name="department" class="department" value="Oncology" onclick = changeColor()>Oncology </br>
                    <input type="radio" name="department" class="department" value="Ophthalmology" onclick = changeColor()>Ophthalmology </br>
                    <input type="radio" name="department" class="department" value="Orthopedics" onclick = changeColor()>Orthopedics </br>
                    <div class="index">P</div>
                    <input type="radio" name="department" class="department" value="Physiotherapy" onclick = changeColor()>Physiotherapy</br>
                </div>
                <div class="column">
                    <div class="index">R</div>
                    <input type="radio" name="department" class="department" value="Renal Unit" onclick = changeColor()>Renal Unit </br>
                    <div class="index">S</div>
                    <input type="radio" name="department" class="department" value="Sexual Health" onclick = changeColor()>Sexual Health </br>
                    <div class="index">U</div>
                    <input type="radio" name="department" class="department" value="Urology" onclick = changeColor()>Urology </br>
                    <button onclick="departContinue()" id="contiue-btn"> Continue</button>
                </div>
                
                </div>
                
            </div>
        
            <div class="distance-language-page" id="distance-language-page" style="display:none">
                <div class="dl-content">
                    <div class="distance">
                        <div class="distance-title" id="distanceChoose" value=""> Please choose the distance range:</div>
                        <div class="column">
                            <input type="radio" name="department" class="distance" value="Any distance">Any distance </br>
                            <input type="radio" name="department" class="distance" value="Within 1.0 km">Within 1.0 km </br>
                            <input type="radio" name="department" class="distance" value="Within 5.0 km">Within 5.0 km </br>
                            <input type="radio" name="department" class="distance" value="Within 10.0 km">Within 10.0 km </br>
                            <input type="radio" name="department" class="distance" value="Within 20.0 km">Within 20.0 km </br>
                            <input type="radio" name="department"class="distance" value="Within 50.0 km">Within 50.0 km</br>
                            
                        </div>  
                        
                    </div>
                    <div class="language">
                        <div class="language-title" id="languageChoose" value=""> Please choose the doctor’s language(s):</div>
                        <div class="language-column">
                            <div class="column">
                                <input type="checkbox" name="english" class ="language" value="English" onclick = changeLanguageBtn()>English</br>
                                <input type="checkbox" name="mandarin" class ="language" value="Mandarin" onclick = changeLanguageBtn()>Mandarin</br>
                                <input type="checkbox" name="cantonese" class ="language" value="Cantonese" onclick = changeLanguageBtn()>Cantonese</br>
                                <input type="checkbox" name="arabic" class ="language" value="Arabic" onclick = changeLanguageBtn()>Arabic</br>
                                <input type="checkbox" name="vietnamese" class ="language" value="Vietnamese" onclick = changeLanguageBtn()>Vietnamese</br>
                                <input type="checkbox" name="italian" class ="language" value="Italian" onclick = changeLanguageBtn()>Italian</br>
                                <input type="checkbox" name="greek " class ="language" value="Greek" onclick = changeLanguageBtn()>Greek </br>

                            </div>
                            <div class="column">
                                    <input type="checkbox" name="korean" class ="language" value="Korean" onclick = changeLanguageBtn()>Korean</br>
                                    <input type="checkbox" name="japanese" class ="language" value="Japanese" onclick = changeLanguageBtn()>Japanese</br>
                                    <input type="checkbox" name="punjabi" class ="language" value="Punjabi" onclick = changeLanguageBtn()>Punjabi</br>
                                    <input type="checkbox" name="french" class ="language" value="French" onclick = changeLanguageBtn()>French</br>
                                    <input type="checkbox" name="hindi" class ="language" value="Hindi" onclick = changeLanguageBtn()>Hindi</br>
                                    <input type="checkbox" name="spanish" class ="language" value="Spanish" onclick = changeLanguageBtn()>Spanish</br>
                                    <input type="checkbox" name="german" class ="language" value="German" onclick = changeLanguageBtn()>German </br>
                                    
                            </div>
                        </div>
                    </div>
            </div>
            <div class="ld-btn">
                <button onclick="dllastContinue()" id="d-btn"> Last-step</button>
                <button onclick="dlContinue()" id="l-btn" > Continue</button>
            </div>
        </div>
        <div class="date-time-page" id="date-time-page" style="display:none" >
            <div class="date-time-content">
                <div class="date-column">
                    <div class="date-title" id="dateChoose" value="" > Please choose the appointment date:</div>
                    <div id="date-column"  class="select-date-time">
                        <div class="date-subtitle">Date:</div>
                        <!-- <select name="select-date" class="select-date-time" id="dateSelect" onmousedown="if(this.options.length>7){this.size=8}" 
                            onblur="this.size=0" onchange="this.size=0"> -->
                        <div id="date">
                            <div class="date-left">
                            <input type="radio" name="date" value="today">Oct-6</br>
                            <input type="radio" name="date" value="plus1">Oct-7</br>
                            <input type="radio" name="date" value="plus2">Oct-8</br>
                            <input type="radio" name="date" value="plus3">Oct-9</br>
                            <input type="radio" name="date" value="plus4">Oct-10</br>
                            <input type="radio" name="date" value="plus5">Oct-11</br>
                            <input type="radio" name="date" value="plus6">Oct-12</br>
                            </div>
                            <div class="date-right">
                            <input type="radio" name="date" value="plus7">Oct-13</br>
                            <input type="radio" name="date" value="plus8">Oct-14</br>
                            <input type="radio" name="date" value="plus9">Oct-15</br>
                            <input type="radio" name="date" value="plus10">Oct-16</br>
                            <input type="radio" name="date" value="plus11">Oct-17</br>
                            <input type="radio" name="date" value="plus12">Oct-18</br>
                            <input type="radio" name="date" value="plus13">Oct-19</br>
                            </div>
                        </div>
                    </div> 
                    <button onclick="dtlastContinue()" id="date-btn"> Last-step</button>
                </div>  
                <div class="time-column">
                    <div class="time-title" id="timeChoose" value=""> Please choose the appointment time:</div>
                    <div id="time-column" class="timeSelect">
                        <!-- <select name="select-time" class="select-date-time" id="timeSelect" onmousedown="if(this.options.length>7){this.size=8}" 
                            onblur="this.size=0" onchange="this.size=0"> -->
                        <div class="time-subtitle">Time:</div>
                        <div id="time">
                            <div class= time-left>
                                <div class="am">AM</div>
                                <input type="radio" name="time" value="9:00 - 9.30" onclick = changeTimeBtn() >9:00 - 9.30</br>
                                <input type="radio" name="time" value="9:30 - 10:00" onclick = changeTimeBtn() >9:30 - 10:00</br>
                                <input type="radio" name="time" value="10:00 - 10.30" onclick = changeTimeBtn()>10:00 - 10.30</br>
                                <input type="radio" name="time" value="10:30 - 11:00" onclick = changeTimeBtn()>10:30 - 11:00</br>
                                <input type="radio" name="time" value="11:00 - 11.30" onclick = changeTimeBtn()>11:00 - 11.30</br>
                            </div>
                            <div class="time-right">
                                <div class="pm">PM</div>
                                <input type="radio" name="time" value="13:00 - 13:30" onclick = changeTimeBtn()>13:00 - 13:30</br>
                                <input type="radio" name="time" value="13:30 - 14:00" onclick = changeTimeBtn()>13:30 - 14:00</br>
                                <input type="radio" name="time" value="14:00 - 14:30" onclick = changeTimeBtn()>14:00 - 14:30</br>
                                <input type="radio" name="time" value="14:30 - 15:00" onclick = changeTimeBtn()>14:30 - 15:00</br>
                                <input type="radio" name="time" value="15:00 - 15:30" onclick = changeTimeBtn()>15:00 - 15:30</br>
                                <input type="radio" name="time" value="15:30 - 16:00" onclick = changeTimeBtn()>15:30 - 16:00</br>
                            </div>
                    </div>
                    </div> 
                    <button onclick="dtContinue()" id="time-btn"> Continue</button>
                </div>  
            </div>            
        </div>
        <div class="doctor-page" id="doctor-page" style="display:none">
            <div class="doctor" id="doctor" >
                <div class="doctor-title"> Please choose the doctor:</div>
                    <div class="content">
                        <div class="column-left">
                            <div class="searchbox">
                                <input type="text" name="search" placeholder="search contact" >
                            </div>
                
                            <div class="doctor-namelist">
                                <div class="doctor-person">
                                    <figure>
                                        <img src="<?php echo base_url(); ?>assets/images/amy.png"   alt="doctorperson">
                                    </figure>
                                    <section class="doctor-name">
                                        <h3>Amy</h3> 
                                    </section>
                                </div>
                                <div class="doctor-person">
                                    <figure>
                                        <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                    </figure>
                                    <section class="doctor-name">
                                        <h3>Amy</h3>
                                    </section>
                                </div>
                                <div class="doctor-person">
                                    <figure>
                                        <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                    </figure>
                                    <section class="doctor-name">
                                        <h3>Amy</h3>
                                    </section>
                                </div>
                                <div class="doctor-person">
                                    <figure>
                                        <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                    </figure>
                                    <section class="doctor-name">
                                        <h3>Amy</h3>
                                    </section>
                                </div>
                                <div class="doctor-person">
                                    <figure>
                                        <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                    </figure>
                                    <section class="doctor-name">
                                        <h3>Amy</h3>
                                    </section>
                                </div>
                                <div class="doctor-person">
                                        <figure>
                                            <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                        </figure>
                                        <section class="doctor-name">
                                            <h3>Amy</h3>
                                        </section>
                                </div>
                            </div>
                                
                            </div>
                            <div class="column-right">
                                <div class="right-person">
                                        <figure>
                                            <img src="<?php echo base_url(); ?>assets/images/amy.png"  alt="doctorperson">
                                        </figure>
                                        <section class="right-name">
                                            <h3>Amy</h3>
                                        </section>
                                </div>
                                <div class="doctor-box">
                                    <div id="specialist" class="label">
                                        <img src="<?php echo base_url(); ?>assets/images/medical.png"  alt="specialist-icon">
                                        <div>Specialist: cardiology</div>
                                    </div>
                                    <div id="Language" class="label">
                                        <img src="<?php echo base_url(); ?>assets/images/language.png"  alt="language-icon">
                                        <div>Language: English & Mandarin</div>
                                    </div>
                                    <div id="working-hour" class="label">
                                        <img src="<?php echo base_url(); ?>assets/images/working.png"  alt="working-icon">
                                        <div class="working">
                                            <div>Working Hours:</div>
                                            <div class="working-time"> Mon - Fri:  9am - 4pm</div>
                                            <div class="working-time"> Sat & Sun: 1pm - 4pm</div>
                                        </div>
                                    </div>
                                    <div id="email" class="label">
                                        <img src="<?php echo base_url(); ?>assets/images/icon02.png"  alt="email">
                                        <div><?php echo $this->session->userdata['logged_in']['email'];?></div>
                                    </div>
                                    <div id="hospital" class="label">
                                        <img src="<?php echo base_url(); ?>assets/images/hospital.png"  alt="hospital">
                                        <div>Primary Office: XXX Hospital</div>
                                    </div>
                                </div>
                                <button  id="select-btn" onclick="window.location.href='<?php echo base_url('Booking/sendEmail');?>'"> select</button>
                                
                            </div>
                        </div> 
                <div class="doctor-btn">
                    <button onclick="doctorLast()" id="doctor-last-btn"> Last-step</button>
                    <button onclick="doctorContinue()" id="doctor-continue-btn"> Continue</button>
                </div>
        </div>
    </div>
    <div class="check-page" id="check-page" style="display:none">
        <div class="check">
            <div class="check-title"> Please check and confirm your booking information:</div>
            <div class="check-info">
                <div> Visiting Person: Amy</div>
                <div> Hospital : XXX</div>
                <div> Doctor : Ben</div>
                <div> Department : Cardiology</div>
                <div> Treatment Time : Oct 06 2020, 10:00 A.M.</div>
            </div>
            <div class="check-btn">
                    <button onclick="checkLast()" id="check-last-btn"> Last-step</button>
                    <button onclick="checkConfirm()" id="check-confirm-btn"> Confirm</button>
            </div>
        </div>
    </div>
    <div id="popLayer" style="display:none;">
            <!-- content of the windows -->
        <div class="pop-title">Success</div>
        <div class="pop-content">Your booking has been confirmed.</div>
        <div class="pop-content">Check your email for details.</div>

        <button id="ok-btn" onclick="closeWindows()">OK </button>
    </div>
</div>

            
</body>
<script>
    function changeColor() {
        var departmentBtn = document.getElementById("contiue-btn");
        departmentBtn.style.background = "#157EE6";
    }
    function changeLanguageBtn() {
        var languageBtn = document.getElementById("l-btn");
        languageBtn.style.background = "#157EE6";
    }
    function changeTimeBtn() {
        var timeBtn = document.getElementById("time-btn");
        timeBtn.style.background = "#157EE6";
    }
    function departContinue(){
        var choosed = document.getElementsByClassName("department");
        var hasChoosed = false;
        
        for(var i=0; i<choosed.length; i++) {  
            if (choosed[i].checked == true){
                hasChoosed = true;
                var dptValue =document.getElementById("departmentChoose").value = choosed[i].value;
                console.log(dptValue);
            }
        } 
        if(hasChoosed == false){
            alert("Please choose one department");
				return;
        }
        document.getElementById("title-1").style.display="none";
        document.getElementById("department-page").style.display="none";
        document.getElementById("title-2").style.display="block";
        document.getElementById("distance-language-page").style.display="block";
    }
    function dlContinue(){
        var choosed = document.getElementsByClassName("distance")
        var secondChoosed = document.getElementsByClassName("language")
        var hasChoosed = false
        var hasSecondChoosed = false
        for(var i=0; i<choosed.length; i++) {  
            if (choosed[i].checked == true){
                hasChoosed = true;
                var distanceValue = document.getElementById("distanceChoose").value = choosed[i].value;
                console.log(choosed[i].value);
            }
        } 
        if(hasChoosed == false){
            alert("Please choose the distance");
				return;
        }
        for(var i=0; i<secondChoosed.length; i++) {  
            if (secondChoosed[i].checked == true){
                hasSecondChoosed = true;
                var languageValue = document.getElementById("languageChoose").value = secondChoosed[i].value;
                console.log(languageValue);
            }
        } 
        if(hasSecondChoosed == false){
            alert("Please choose at least one language");
				return;
        }
        document.getElementById("title-2").style.display="none";
        document.getElementById("distance-language-page").style.display="none";
        document.getElementById("title-3").style.display="block";
        document.getElementById("date-time-page").style.display="block";
    }
    function dllastContinue(){
        document.getElementById("title-1").style.display="block";
        document.getElementById("department-page").style.display="block";
        document.getElementById("title-2").style.display="none";
        document.getElementById("distance-language-page").style.display="none";
    }
    function dtContinue(){        
        // var dateValue = document.getElementById("dateChoose").value = document.getElementById("dateSelect").value;
        // var timeValue = document.getElementById("timeChoose").value = document.getElementById("timeSelect").value;
        // console.log(dateValue);
        // console.log(timeValue);
        document.getElementById("title-4").style.display="block";
        document.getElementById("doctor-page").style.display="block";
        document.getElementById("title-3").style.display="none";
        document.getElementById("date-time-page").style.display="none";
    }
    function dtlastContinue(){
        document.getElementById("title-3").style.display="none";
        document.getElementById("date-time-page").style.display="none";
        document.getElementById("title-2").style.display="block";
        document.getElementById("distance-language-page").style.display="block";
    }
    function doctorLast(){
        document.getElementById("title-3").style.display="block";
        document.getElementById("date-time-page").style.display="block";
        document.getElementById("title-4").style.display="none";
        document.getElementById("doctor-page").style.display="none";
    }
    function doctorContinue(){
        document.getElementById("progress-bar").style.display="none";
        document.getElementById("doctor-page").style.display="none";
        document.getElementById("check-page").style.display="block";
    }
    function checkLast(){
        document.getElementById("progress-bar").style.display="block";
        document.getElementById("doctor-page").style.display="block";
        document.getElementById("check-page").style.display="none";
    } 

    function checkConfirm() {
        var popLayer = document.getElementById("popLayer"); // display the content
        popLayer.style.display = "block";
    };

    function closeWindows() {
        var popLayer = document.getElementById("popLayer");
        popLayer.style.display = "none";
    }
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
</html>
