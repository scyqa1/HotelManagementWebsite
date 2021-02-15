<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>choose room number</title>

<link href="./roomtype.css" rel="stylesheet" type="text/css">

</head>
<body  style="background-image: url(./456.jpg);background-size:cover">


    <div class="location">
    
    <?php
    session_start();
    if(!isset($_SESSION['Username']))
    {
        echo"Please log in";
    }
    ?>
                                           
    <?php

    session_start();

    echo"<div style='color:red'>  Room Type(Payment at the hotel):";
    if($_SESSION['reletype'][0]==1){echo"Large room with double beds";}
    if($_SESSION['reletype'][0]==2){echo"Large room with a large single bed";}
    if($_SESSION['reletype'][0]==2){echo"Small room with a single bed";}
    if($_SESSION['reletype'][0]==2){echo"VIP room";}
    
    $option = array();
    $option = $_SESSION['allroom'];
    for($i=0;$i<count($option);$i++){
      echo"<div class='room_row'>     
                <div class='room_name'> ";
      echo"<form action='bookspecific.php' method='post' style='color:yellow'>";
      echo $_SESSION['allroom'][$i];
      $specific=$_SESSION['allroom'][$i];
      echo"<span  style='color:#00AF00; float:right'> vacant</span> ";
      echo"<button type='submit' class='btn_yd'  name='selfchoose' value='$specific'>book</button>";
      echo"</form> ";
      echo"</div>   
              </div>";
    }
    
    ?>             
          
          </div>

</body>
</html>
