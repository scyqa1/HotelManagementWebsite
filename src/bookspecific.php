<?php
	session_start();
	$_SESSION['selfchoose']=$_POST['selfchoose'];
        echo "<script> parent.location.href='booktype.php'; </script>";
?>
