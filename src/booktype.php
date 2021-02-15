
<?php
    session_start();
    $con = mysqli_connect("localhost","scyqa1","scyqa1");
    if (mysqli_connect_error($con)){
        die ("database connect error");
    }

    mysqli_select_db($con,"scyqa1");

    if(!isset($_SESSION['Username']))
    {
        die("Please log in");
    }

    $allroom=$_SESSION['allroom'][0];
    $reletype=$_SESSION['reletype'][0];
    $passport=$_SESSION['passport'];
    $start=$_SESSION['start'];
    $end=$_SESSION['end'];
    if(!isset($_SESSION['selfchoose']))
    {
      
        $sql = "INSERT INTO UseRoom(RoomID,RoomType,IsBooked,BookPassport,StartDate,EndDate) VALUES('$allroom','$reletype',1,'$passport','$start','$end')";        

        if (mysqli_query($con,$sql)){
            echo "<script> alert('book success'); parent.location.href='homepage.php'; </script>";
        }
        else{
            echo "fail to book\n" . mysqli_error($con);
        }
    }
    else
    {        
        
        $room=$_SESSION['selfchoose'];
        $sql = "INSERT INTO UseRoom(RoomID,RoomType,IsBooked,BookPassport,StartDate,EndDate) VALUES('$room','$reletype',1,'$passport','$start','$end')"; 
        if (mysqli_query($con,$sql)){
            echo "<script> alert('book success'); parent.location.href='homepage.php'; </script>";
        }
        else{
            echo "fail to book\n" . mysqli_error($con);
        }
        
    }
            mysqli_close($con);

?>
