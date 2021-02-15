<?php
$con = mysqli_connect("localhost","scyqa1","scyqa1");
if (mysqli_connect_error($con)){
die( "database connect error");
}

mysqli_select_db($con,"scyqa1");
session_start();
$roomtype=$_POST['roomclass'];
$start=$_POST['start'];
$end=$_POST['end'];
$isempty=$_POST['isempty'];

if(!isset($_SESSION['Username']))
{
echo "<script> alert('Please log in first');parent.location.href='userlogin.html'; </script>"; 
}
else if($start==$isempty)
{
echo "<script>alert('Please enter your check-in date'); history.go(-1);</script>";
}
else if($start<date('Y-m-d'))
{
echo "<script>alert('Please enter a valid check-in date'); history.go(-1);</script>";
}
else if($end==$isempty)
{
echo "<script>alert('Please enter your check-out date'); history.go(-1);</script>";
}
else if(($start>$end)||($start==$end))
{
echo "<script>alert('Please enter a valid stay duration'); history.go(-1);</script>";
}
else if(($roomtype!=1) && ($roomtype!=2) && ($roomtype!=3) && ($roomtype!=4))
{
echo "<script>alert('Please select a room type'); history.go(-1);</script>";
}
else
{

$rooms="SELECT DISTINCT RoomID From UseRoom WHERE RoomType='$roomtype' AND ((StartDate > '$start' AND StartDate < '$end') OR( EndDate > '$start' AND EndDate < '$end'))";
$sametyperoom="SELECT RoomID, RoomType From Room WHERE RoomType='$roomtype' AND RoomID NOT IN ($rooms)";

$result=mysqli_query($con,$sametyperoom);
$allroom = array();
$reletype = array();
while($row=mysqli_fetch_array($result)){
  $allroom[]=$row['RoomID'];
  $reletype[]=$row['RoomType'];
}


$_SESSION['allroom'] = array();
$_SESSION['allroom'] =$allroom;
$_SESSION['reletype'] = array();
$_SESSION['reletype'] =$reletype;
$_SESSION['start'] =$start;
$_SESSION['end'] =$end;
mysqli_close($con);
echo"<script> parent.location.href='bookmessage.html'; </script>";
}

?>
