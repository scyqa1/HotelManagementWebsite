<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />


<title>croom booking</title>
</head>
<body>
<nav> Manage Booking <a style="line-height:1.6em;margin-top:3px" href="manage.php" >refresh</a></nav>
<div>
	<div> Room number
		<input type="text" style="width:150px" placeholder="Please enter ROOM ID" id="" name="">
		<button type="submit" id="" name="">Search</button>
	</div>


	<div>
	<table>
		<thead>
			<tr>
				<th width="80">Room ID</th>
				<th width="100">Start date</th>
                                <th width="100">End date</th>
				<th width="150">Passport ID</th>
				<th width="70">State</th>
				<th width="100">Change state</th>
			</tr>
		</thead>


		<?php
		$con = mysqli_connect("localhost","scyqa1","scyqa1");
		if (mysqli_connect_error($con)){
		        die ("database connect error");
		}

		mysqli_select_db($con,"scyqa1");

		$roomstate = "SELECT * FROM UseRoom";

		$result=mysqli_query($con,$roomstate);
		while($row=mysqli_fetch_array($result)){
		echo"<tbody>
			<tr>
				<td>";
                echo $row['RoomID'];
		$ID=$row['RoomID'];
                echo"</td>
				<td>";
		echo $row['StartDate']; 
		$delestart=$row['StartDate'];
		echo"</td>
				<td>";
		echo $row['EndDate']; 
		$deleend=$row['EndDate'];
		echo"</td>
				<td>";
		echo $row['BookPassport'];
		echo"</td>
				<td>booked</td>
				<td>
					<form method='post' action='delete.php'>
					<input type='hidden' name='roomID' value='$ID'>
					<input type='hidden' name='delestart' value='$delestart'>
					<input type='hidden' name='deleend' value='$deleend'>
					<button type='submit' style='width:100px'>cancel book</button>
					</form>
				</td>
			</tr>
		</tbody>";
                }
                ?>
		 



	</table>
	</div>
</div>

</body>
</html>
