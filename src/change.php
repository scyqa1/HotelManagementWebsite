<?php
session_start();
$con = mysqli_connect("localhost","scyqa1","scyqa1");
if (mysqli_connect_error($con)){
die( "database connect error");
}

mysqli_select_db($con,"scyqa1");

$username = $_SESSION['Username'];

$sql = "SELECT * FROM User where Username = '$username' AND Password = '$_POST[oldpassword]'" ;
$user = mysqli_query($con,$sql);

if(!mysqli_num_rows($user))
{
echo "<script> alert('incorrect password');parent.location.href='changepass.html'; </script>";
}
else
{
$sql1 = "UPDATE User 
SET Password='$_POST[newpassword]'
WHERE Username = '$username'" ;
$result = mysqli_query($con,$sql1);
echo "<script> alert('change success');parent.location.href='homepage.php'; </script>";
}
mysqli_close($con);

?>
