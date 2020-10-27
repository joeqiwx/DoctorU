<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Fira+Code|Roboto&display=swap" rel="stylesheet">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
</head>
<style>
    .dropdown-content {
    display: none;
    position: absolute;
    margin-left: 79%;
    margin-top: 2%;
    min-width: 160px;
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

<body>
<div>

</div>
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
        <li><a class="active" href="<?php echo base_url('Chat'); ?>">Chat</a></li>
        <li><a class="nav" href="<?php echo base_url('User_calendar')?>">Treatment Plan</a></li>
        <li><a class="nav" href="<?php echo base_url('Ddiagnosis'); ?>">Diagnosis</a></li>
        <li><a class="nav" href="<?php echo base_url('Booking'); ?>">Booking</a></li>
        <li><a class="nav" href="<?php echo base_url('Home'); ?>">Home</a></li>
    </ul>   
        <div class="content">
        <div class="column-left">
            <div class="searchbox">
                <input type="text" name="search" placeholder="search contact" >
            </div>

            <div class="chat-namelist">
                <?php for($i = 0; $i < count($friends); $i++) {?>
                    <div class="chat-person" onclick="window.location.href='<?php echo base_url('Chat/haveChat/'.$user_id.'/'.$friends[$i]['friend_id']);?>'">
                        <figure>
                            <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
                        </figure>
                        <section class="chat-name">
                            <h3><?php echo $friends[$i]['friend_name']?></h3>
                            <blockquote> Doctor </blockquote>
                        </section>
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="column-right">
            <div class="now-chatname"> Talking to <?php echo $doctor_name; ?></div>
            <div class="chat-box" id="showData">
            </div>
            <div class="chat-input">
                <form action="" id="myMessage" method="post">
                    <div class ="phone-video">
                        <a href="https://doctor-chitchat.herokuapp.com" target="_blank">
                        <img title ="video call" class = "video" src="<?php echo base_url() ?>assets/images/video.png" alt="video">
                        </a>
                    </div>
                    <div class="input-button">
                        <textarea type="text" name="chat-input" placeholder="input content" ></textarea>
                        <button id="btnSend" type="button">
                            Send
                            <img class = "send" src="<?php echo base_url() ?>assets/images/send.png" alt="send">
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
  
        <script>
            $(function(){
                showAllMessage();
                setInterval(function(){
                    showAllMessage();
                },2000);
                $('#btnSend').click(function(){
                    $('#myMessage').attr('action',
                        '<?php echo base_url() ?>chat/addMessage/<?php echo $user_name.'/'.$doctor_name.'/'.$user_id.'/'.$doctor_id; ?>');
                    var url = $('#myMessage').attr('action');
                    var data = $('#myMessage').serialize();
                    //validate form
                    var chat = $('textarea[name=chat-input]');
                    var result = '';
                    if(chat.val()==''){
                        chat.parent().parent().addClass('has-error');
                    }else{
                        chat.parent().parent().removeClass('has-error');
                        result +='1';
                    }

                    if(result=='1'){
                        $.ajax({
                            type: 'ajax',
                            method: 'post',
                            url: url,
                            data: data,
                            async: false,
                            dataType: 'json',
                            success: function(response){
                                if(response.success){
                                    $('#myMessage')[0].reset();
                                    showAllMessage();
                                }else{
                                    alert('Error');
                                }
                            },
                            error: function(){
                                alert('Could not add data');
                            }
                        });
                    }
                });
                
                //function
                function showAllMessage(){
                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url() ?>chat/showAllMessage/<?php echo $user_id; ?>/<?php echo $doctor_id; ?>',
                        //url: '<?php //echo base_url() ?>//information/showAllMessage',
                        async: false,
                        dataType: 'json',
                        success: function(data){

                            var mess = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                mess +='<div style="display:flex; flex-direction: column;">'+
                                    '<span style= "margin:0 auto; text-align:center; color:white; background-color:#B0C4DE;padding:3px 5px 3px 5px;border-radius:3px;font-size:12px;">'+ data[i].created_at + '</span>'+
                                    '<div style=" display:flex;margin:10px 0 0 0;">' +
                                    '<div style=" font-size:13px;padding-top:10px; padding-left:10px; width:5%;">'+ data[i].sender_name + ':' + '</div>'+
                                    '<div style = "background-color: #fff; padding: 5px 8px; display: inline-block;  border-radius: 4px; margin:5px 0 5px 0px;  position: relative;">'+data[i].message + '</div>'+'</div>'+
                                    '</div>';
                            }
                            $('#showData').html(mess);
                        },
                        error: function(xhr){
                            alert('Could not get Data from Database');
                            alert(xhr.responseText);
                            console.log(xhr.responseText);
                    },
                    });
                }

            });
        </script>
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
    </script>
</body>

</html>