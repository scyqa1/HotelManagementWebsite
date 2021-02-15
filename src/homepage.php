<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Sunny Isle</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="./sunny.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        function show_flight() {
            $("#flight-search").removeClass("hide");
            $("#hotel-search").addClass("hide");
        }
        function show_hotel() {
            $("#flight-search").addClass("hide");
            $("#hotel-search").removeClass("hide");
        }
    </script>
    <style>
        .hide{
            display: none;
        }
    </style>


</head>

<body class="home"  style="background-image: url(./456.jpg);background-size:cover">

<div>
	<div id="container">
	
		<!--start header -->
		<header id="header">
			<div id="logo">
				<strong>Sunny Isle</strong>&nbsp;Hotel
			</div>	

			<div id="navigation">
				<ul id="nav">              
					<li><a href="homepage.php">book now</a></li>
					<li><a href="browse.php">brief introduction</a></li>
					<li><a href="userlogin.php">log in</a></li>
                                        <li>
                                        <?php
                                            session_start();
                                            if(!isset($_SESSION['Username']))
                                            {
                                               echo"<nobr style='position:relative; top:15px;color:green'>Please log in</nobr>";
                                            }
                                            else{
                                                  echo"<nobr style='position:relative; top:20px;color:green'>Hello</nobr> ".$_SESSION['Username']."<a href='changepass.html'>change password</a>";
                                            }
                                        ?>
                                       </li>
				</ul>

			</div>
			
	
		</header>

		

		<section id="content">
			<div class="two-third">
				<div id="searchmodule" class="tabs">
					<ul class="tab-control">
						<li><a onclick="show_flight()">book room</a></li>
						<li><a onclick="show_hotel()">change schedule</a></li>
					</ul>
					<div id="flight-search" class="tab-content" style="overflow:auto">
						<form action="book.php" method="post">
							
							<div class="field">
								<label for="flight-to">Our Location:</label>
								<input type="text" id="flight-to" class="input-text" placeholder="Sunny Isle" autocomplete="off" />
							</div>
							<div class="field half">
								<label for="flight-depart">Check In:</label>
								<input type="Date" id="flight-depart" class="input-text input-cal" name="start" placeholder="2019-05-01" autocomplete="off" />
							</div>
							<div class="field half even">
								<label for="flight-return">Check Out:</label>
								<input type="Date" id="flight-return" class="input-text input-cal" name="end" placeholder="2019-05-01" autocomplete="off" />
							</div>
                                                        <input type="Date" style="display:none" name="isempty"/>
							<div class="field half">
								<label for="flight-class">Room Type:</label>
								<select id="flight-class" name="roomclass">
								<option>--Please Select--</option>
									<option value=4>VIP room</option>
									<option value=1>Large room with double beds</option>
									<option value=2>Large room with a large single bed</option>
									<option value=3>Small room with a single bed</option>
								</select>
							</div>

							<button class="submit" onclick="book()">book</button>
							<br class="clear" />
						</form>
					</div>
					
					<div id="hotel-search" class="tab-content hide">
						<form method='post' action='delete.php'>
								<table border="1">    
										<tr>
											<th colspan="5"> Your book order has following contents</th>
										</tr>
										<tr>
											<td> room ID </td>
											<td> check time </td>

											<td> delete </td>
										</tr>
										<?php
										session_start();
										$con = mysqli_connect("localhost","scyqa1","scyqa1");
										if (mysqli_connect_error($con)){
										        die ("database connect error");
										}

										mysqli_select_db($con,"scyqa1");

                                                          			if(isset($_SESSION['Username'])){
                                                                 		$passport = $_SESSION['passport'];
										$roomorder = "SELECT * FROM UseRoom WHERE BookPassport = '$passport'";

										$result=mysqli_query($con,$roomorder);
                                                                                while($row=mysqli_fetch_array($result)){
                                                                                echo"
										<tr>
											<td> ";
										echo $row['RoomID']; 
										$ID=$row['RoomID']; 
										$start = $row['StartDate'];
										$end = $row['EndDate'];
										echo   "</td>
											
											 <input type='hidden' name='roomID' value='$ID'> 
											<td> 
											<div class='field half'>
												<label for='hotel-depart'>check in:</label>
												<input type='text' name='delestart' id='hotel-depart' class='input-text input-cal' placeholder='$start' value='$start' autocomplete='off' />
											</div>
											<div class='field half even'>
												<label for='hotel-return'>check out:</label>
												<input type='text' name='deleend' id='hotel-return' class='input-text input-cal' placeholder='$end' value='$end' autocomplete='off' />
											</div>	
											</td>

											<td> <button input='submit'>delete</a> </td>
                                                                                        
										</tr>";
										}
										}else{
										echo"You don 't have any book order now";}

                                                                                ?>
										
							    </table>	
						</form>
					</div>
					<!--hotel search -->

										

				</div>
			</div>

		</section>
	
	</div>
	
</div>

</body>
</html>
