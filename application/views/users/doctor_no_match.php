<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>No Matched</title>
    <style>
        #popLayer {
            padding-top:20px;
            z-index: 21;
            position: absolute;
            top: 40%;
            left: 50%;
            margin-left: -200px;
            width: 400px;
            height: 130px;
            border-radius: 10px;
            background-color: #f7f7f7;
            opacity:1;
            text-align: center;
            font-size: 20px;
            line-height: 37px;
            border-style:solid;
            border-width: 2px;
        }
        .match{
            background-color: #157EE6;
            border-radius: 8px;
            border: none;
            color: white;
            padding: 8px 20px;
            margin-top:20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="popLayer">

    <!-- Content of the pop up windows -->
    <div class="content">
        You don't have any patient!
    </div>

    <button class="match" onclick="window.location.href='<?php echo base_url('Dview');?>'">
       Back to home page
    </button>
</div>
</body>
</html>

