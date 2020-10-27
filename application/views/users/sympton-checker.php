<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/symptom-checker-nav.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
    
    <div class="progress-bar">
		<div class="title-1" id="title-1">
            <div class="subtitle">
                <div class="rectangle">
                    <p>Info</p>
                </div>
                <div class="triangle-right"></div>
            </div>
        </div>
        <div class="title-2" id="title-2" style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                <div class="rectangle">
                    <p>Symptoms</p>
                </div>
                <div class="triangle-right"></div>
            </div>
        </div>
        <div class="title-3" id="title-3"style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                <div class="rectangle">
                    <p>Possible causes</p>
                </div>
                <div class="triangle-right"></div>
            </div>
		</div>
		<div class="title-4" id="title-4"style="display:none" >
            <div class="subtitle">
                <div class="triangle-left"></div>
                 <div class="rectangle">
                    <p>Possible causes</p>
                </div>
             </div>
        </div>
    </div>
	
	<div class="main">
		<div class="information">
			<div class="section">
				<div class="heading" id="head-1">How old are you?</div>
				<select name="age" id="age" class="options">
				  <option value="none">please select</option>
				  <option value=">18"><18</option>
				  <option value="18-20">18-20</option>
				  <option value="21-30">21-30</option>
				  <option value="31-40">31-40</option>
				  <option value="41-50">41-50</option>
				  <option value="51-60">51-60</option>
				  <option value="60+">60+</option>
				</select>
			</div>
			<div class="section">
				<div class="heading" id="head-2">What is your gender at birth?</div>
				<select name="gender" id="gender" class="options">
				  <option value="none">please select</option>
				  <option value="male">male</option>
				  <option value="female">female</option>
				</select>
			</div>
			<div class="section">
				<div class="heading" id="head-3">Are you pregnant?</div>
				<select name="pregnant" id="pregnant" class="options">
				  <option value="none">please select</option>
				  <option value="yes">yes</option>
				  <option value="no">no</option>
				</select>
			</div>
			<div class="section">
				<button class="next-btn" id="next-btn" onclick="infoNext();" value="">Continue</button>
			</div>
		</div>
		<form action="" method="post" class="symptoms">
			<div class="left-checkboxes">
				<input type="checkbox" id="choking" name="Choking" value="choking">
				<label for="choking">choking</label><br>
				<input type="checkbox" id="choking-sensation" name="ChokingSensation" value="choking-sensation">
				<label for="choking-sensation">choking sensation</label><br>
				<input type="checkbox" id="cough" name="CommonCold" value="Common Cold">
				<label for="cough">cough</label><br>
				<input type="checkbox" id="epiglottis" name="Epiglottis" value="epiglottis">
				<label for="epiglottis">epiglottis</label><br>
				<input type="checkbox" id="swelling" name="Swelling" value="swelling">
				<label for="swelling">swelling</label><br>
				<input type="checkbox" id="not-breathing-sleep" name="NotBreathing" value="not-breathing-sleep">
				<label for="not-breathing-sleep">episodes of not breathing during sleep</label><br>
				<input type="checkbox" id="throwing-up" name="ThrowingUp" value="throwing-up">
				<label for="throwing-up">throwing up</label><br>
			</div>
			<div class="right-checkboxes">
				<input type="checkbox" id="goes-down" name="GoesDown" value="goes-down">
				<label for="goes-down">food or liquid goes down</label><br>
				<input type="checkbox" id="pipe" name="Pipe" value="pipe">
				<label for="pipe">wrong pipe high pitched</label><br>
				<input type="checkbox" id="breathing" name="HardBreathing" value="breathing">
				<label for="breathing">breathing</label><br>
				<input type="checkbox" id="itchy-throat" name="ItchyThroat" value="itchy-throat">
				<label for="itchy-throat">itchy throat</label><br>
				<input type="checkbox" id="vein" name="Vein" value="vein">
				<label for="vein">jugular vein a wave</label><br>
				<input type="checkbox" id="laryngeal-pain" name="LaryngealPain" value="laryngeal-pain">
				<label for="laryngeal-pain">increased laryngeal pain</label><br>
			</div>
			<div class="section">
				<button type="button" class="next-btn" id="next-btn" onclick="symptomsNext();" value="">Continue</button>
			</div>
		</form>

		<div class="causes">
		</div>
		
		<div class="description">
			<p class="description-heading"></p>
			<div class="description-section">
				<p class="description-title"></p>
				<p class="description-words"></p>
			</div>
			<div class="description-section">
				<p class="description-title"></p>
				<p class="description-words"></p>
			</div>
			<div class="description-section">
				<p class="description-title"></p>
				<p class="description-words"></p>
			</div>
			<div class="description-section">
				<p class="description-title"></p>
				<p class="description-words"></p>
			</div>
			<div class="description-btn-section">
				<button class="restart-btn" id="restart-btn" onclick="window.location.reload();">Start over</button>
				<button class="chat-btn" id="chat-btn" onclick="window.location.href='<?php echo base_url('chat');?>'">Chat with doctor</button>
			</div>
		</div>
	</div>
	
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
	
	// Symptom Checker
	var age, gender, pregnant;
	var symptoms = new Array(13);
	
	// Remove unused div
	var symptomsDiv = $('.symptoms');
	var causesDiv = $('.causes');
	var descriptionDiv = $('.description');
	$('.symptoms').remove();
	$('.causes').remove();
	$('.description').remove();
	
	function infoNext() {
		age = document.getElementById('age').value;
		gender = document.getElementById('gender').value
		pregnant = document.getElementById('pregnant').value
		
		if (age == "none" || gender == "none" || pregnant == "none") {
			alert("Fields cannot be empty!");
			return;
		} else if (gender == "male" && pregnant == "yes") {
			alert("Invalid fields");
			return;
		}
		
		document.getElementById("title-1").style.display="none";
		document.getElementById("title-2").style.display="block";
		$('.information').remove();
		$('.main').append(symptomsDiv);
	}
	
	function symptomsNext() {
		// Options
		choking = document.getElementById('choking');
		chokingSensation = document.getElementById('choking-sensation');
		cough = document.getElementById('cough');
		epiglottis = document.getElementById('epiglottis');
		swelling = document.getElementById('swelling');
		nBS = document.getElementById('not-breathing-sleep');
		throwingUp = document.getElementById('throwing-up');
		goesDown = document.getElementById('goes-down');
		pipe = document.getElementById('pipe');
		breathing = document.getElementById('breathing');
		itchyThroat = document.getElementById('itchy-throat');
		vein = document.getElementById('vein');
		laryngealPain = document.getElementById('laryngeal-pain');
		
		if (choking.checked == false && chokingSensation.checked == false && cough.checked == false &&
		    epiglottis.checked == false && swelling.checked == false && nBS.checked == false &&
		    throwingUp.checked == false && goesDown.checked == false && pipe.checked == false &&
		    breathing.checked == false && itchyThroat.checked == false && vein.checked == false &&
		    laryngealPain.checked == false) {
				alert("Please select at least one symptom!");
				return;
		}
		
		// assignment
		symptoms[0] = choking;
		symptoms[1] = chokingSensation;
		symptoms[2] = cough;
		symptoms[3] = epiglottis;
		symptoms[4] = swelling;
		symptoms[5] = nBS;
		symptoms[6] = throwingUp;
		symptoms[7] = goesDown;
		symptoms[8] = pipe;
		symptoms[9] = breathing;
		symptoms[10] = itchyThroat;
		symptoms[11] = vein;
		symptoms[12] = laryngealPain;
		
		// Remove second title
		document.getElementById("title-2").style.display="none";
	
		// Restore third title
		document.getElementById("title-3").style.display="block";
		
		// change div
		$('.symptoms').remove();
		$('.main').append(causesDiv);
		$('.main')[0].style.background = "white";
		$('.main')[0].style.boxShadow = "none";
		
		// algorithm - add more here 
		// for Symptoms
		for (var i = 0; i < symptoms.length; i++) {
			if (symptoms[i].checked == true) {
				var button = document.createElement("BUTTON");
				button.name = symptoms[i].getAttribute('name');
				button.name = symptoms[i].getAttribute('id');
				button.innerHTML = symptoms[i].getAttribute('name') + " >";
				button.onclick = function() {causesNext(symptoms[i])};
				$('.causes').append(button);
				console.log(symptoms[i].getAttribute('name'));
				// window.location.href='<?php echo base_url('checker/result'); ?>/' + symptoms[i].getAttribute('name');
				break;
			}
		}
	}
	
	function causesNext(sym) {
		
		// for different symptoms
		if (sym != null) {
			// remove div and add div
			$('.causes').remove();
			$('.main').append(descriptionDiv);
			
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>checker/result/' + sym.getAttribute('name'),
				async: false,
				dataType: 'json',
				success: function(data){
					// Add information
					$('.description-heading')[0].innerHTML = data[0].title;
					$('.description-title')[0].innerHTML = "Symptoms";
					$('.description-words')[0].innerHTML = data[0].content;
					$('.description-title')[1].innerHTML = "How Common";
					$('.description-words')[1].innerHTML = data[0].content;
					$('.description-title')[2].innerHTML = "Overview";
					$('.description-words')[2].innerHTML = data[0].content;
					$('.description-title')[3].innerHTML = "Source From";
					$('.description-words')[3].innerHTML = data[0].reference;
				},
				error: function(xhr){
					alert(xhr.responseText);
					console.log(xhr.responseText);
                    },
                    });
		} else if (document.getElementById("none") != null) {
			// NO SYMPTOMS MATCH CONDITION
			// remove div and add div
			$('.causes').remove();
			$('.main').append(descriptionDiv);
			
			// Add information
			$('.description-heading')[0].innerHTML = "No Match";
		}
		document.getElementById("title-3").style.display="none";
		document.getElementById("title-4").style.display="block";
	}
</script>

</body>
</html>
