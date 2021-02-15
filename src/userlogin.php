<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>LOG IN</title>
<link href="./login.css" rel="stylesheet" type="text/css">
    <script>
    function check() {
        if (document.getElementById("userid").value=="") {
            alert("Empty Username");
            document.getElementById("userid").focus();
            return false;
        }
        else if (document.getElementById("pwd").value=="") {
            alert("Empty Password");
            document.getElementById("pwd").focus();
            return false;
        }
        else{
            return true;
        }

    }
</script>
</head>

<body style="background-image: url(./456.jpg);background-size:cover">

<div id="login-box">
   <div class="login-top" style="float:right" ><a href="homepage.php" target="_blank"  >Home page</a></div>
   <div class="login-top" style="float:left; position:relative; left:20px  "><a href="Register_.html" target="_blank">Register</a></div>
      <div class="login-main">
<?php
session_start();
if(isset($_SESSION['Username'])){
echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have already log in\n";}
?>
      <form name="form1" method="post" action="login.php" onsubmit="return check()">
         <dl>
	      <dt></dt>
	      <dd><input type="text" name="userid" id="userid" placeholder="Please Enter User Name" ></dd>
	      <dt></dt>
	      <dd><input type="password" name="pwd" id="pwd" placeholder="Please Enter Your Password"></dd>
	      <dt></dt>
		   <dd>
            <input type="submit" class="ZLoginButton" value="Submit">
         </dd>
	      </dl>
	   </form>
      </div>
</div>

</body>
</html>
