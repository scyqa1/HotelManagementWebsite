<?php

$con = mysqli_connect("localhost","scyqa1","scyqa1");
if (mysqli_connect_error($con)){
die( "database connect error");
}

mysqli_select_db($con,"scyqa1");

$sql = "SELECT * FROM User where Username = '$_POST[userid]' AND Password = '$_POST[pwd]'" ;
$user = mysqli_query($con,$sql);

if(mysqli_num_rows($user))
{
session_start();
$row=mysqli_fetch_array($user);
$_SESSION['Username'] = $_POST['userid'];
$_SESSION['passport'] = $row['Passport'];
echo "<script> alert('login success');parent.location.href='homepage.php'; </script>";
}
else
{
echo "<script> alert('Username or Password is not correct');parent.location.href='userlogin.php'; </script>";
}
mysqli_close($con);

?>

