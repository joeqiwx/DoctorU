<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doctor_nav.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doctor_chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
</head>

<body>
    <div class="top">
    <?php if (isset($this->session->userdata['logged_in_doctor'])) {
        $username = ($this->session->userdata['logged_in_doctor']['username']);?>
    <div class = "top-img"><img class="logo" src="<?php echo base_url() ?>assets/images/newLogo.png"> </div>
    <p class="title">Today is <?php echo date('M-d')  ?>.  Have a nice day, <b><?php echo $username?></p>
    </div>
    <article>
    <div class="left-div">
        <figure>
            <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
        <p class="name"><?php echo $username?></p>
        <?php } ?>    
    </figure>

    <!-- The navigation bar for the doctor side -->
        <ul>
            <li><a class="left-nav" href="<?php echo base_url('dhome') ?>">Home</a></li>
            <li><a class="left-nav" href="<?php echo base_url('Users/doctor_profile') ?>">Profile</a></li>
            <li><a class="left-nav" href="<?php echo base_url('appointment');?>">Appointment</a></li>
            <li><a class="left-nav" href="<?php echo base_url('dview');?>">Treatment plan</a></li>
            <li><a class="left-nav active" href="<?php echo base_url('Dchat') ?>">Chat</a></li>
        </ul>
    </div>

    <!-- The main content of the chat box -->
    <div class ="main-content">
        <div class="content">
            <div class="column-left">
                <div class="searchbox">
                    <input type="text" name="search" placeholder="search contact" >
                </div>

                <!-- The content of the users' friends that they want to chat -->
                <div class="chat-namelist">
                    <?php for($i = 0; $i < count($friends); $i++) {?>
                        <div class="chat-person" onclick="window.location.href='<?php echo base_url('Dchat/haveChat/'.$user_id.'/'.$friends[$i]['friend_id']);?>'">
                            <figure>
                                <img src="<?php echo base_url() ?>assets/images/amy.png"  alt="chatperson">
                            </figure>
                            <section class="chat-name">
                                <h3><?php echo $friends[$i]['friend_name']?></h3>
                                <blockquote> Patient </blockquote>
                            </section>
                        </div>
                    <?php }?>
                </div>  
            </div>

            <!-- The content of the chat log -->
            <div class="column-right">
                <div class="chat-box" id="showData">
                    
                    
                </div>
                <div class="chat-input">
                    <form action="" id="myMessage" method="post">
                        <div class ="phone-video">
                            <a href="https://doctor-chitchat.herokuapp.com" target="_blank">
                            <img class = "video" src="<?php echo base_url() ?>assets/images/video.png" alt="video">
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
        </div> 
    </div>
    <script>
        /**
            1. Use the AJAX to display the chat log in real time in doctor side
            2. Sent the message after the "send" button was click
         */
        $(function(){
            showAllMessage();
            setInterval(function(){
                showAllMessage();
            },2000);
            $('#btnSend').click(function(){
                $('#myMessage').attr('action',
                    '<?php echo base_url() ?>Dchat/addMessage/<?php echo $user_name.'/'.$patient_name.'/'.$user_id.'/'.$patient_id; ?>');
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
            
            /**
                1. Get the chat content from the back-end 
                and then show in the div box in doctor side
            */
            function showAllMessage(){
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>Dchat/showAllMessage/<?php echo $user_id; ?>/<?php echo $patient_id; ?>',
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
    </article>
</body>
</html>