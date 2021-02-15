<?php
    $con = mysqli_connect("localhost","scyqa1","scyqa1");
    if (mysqli_connect_error($con)){
        die ("database connect error");
    }

    mysqli_select_db($con,"scyqa1");

    $ifexist = "SELECT Username FROM User WHERE Username = '$_POST[UserName]'";
    $result = mysqli_query($con,$ifexist);
    if(mysqli_num_rows($result))
    { echo"<script>alert('Username has been registered');history.go(-1);</script>";}
    else
    {
    $sql = "insert into User (Username,Password,Name,Passport,Email,Telephone)
      values ('$_POST[UserName]','$_POST[Password]','$_POST[Name]','$_POST[Passport]','$_POST[Email]','$_POST[Phone]')";
    if (mysqli_query($con,$sql)){
        echo "insert success";
    }
    else{
        echo "fail to insert\n" . mysqli_error($con);
    }
    }
    mysqli_close($con);
?>
