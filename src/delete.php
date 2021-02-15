<?php
session_start();

$con = mysqli_connect("localhost","scyqa1","scyqa1");
if (mysqli_connect_error($con)){
die( "database connect error");
}

mysqli_select_db($con,"scyqa1");

$sql = "DELETE FROM UseRoom WHERE StartDate = '$_POST[delestart]' AND EndDate = '$_POST[deleend]' AND RoomID = '$_POST[roomID]'" ;
$result = mysqli_query($con,$sql);

mysqli_close($con);

echo "<script> alert('delete success');history.go(-1); </script>";

?>
