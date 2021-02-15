<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Sunny Isle</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="./sunny.css" rel="stylesheet" type="text/css">

</head>

<body class="blog" style="background-image: url(./456.jpg);background-size:cover">

<div>
	<div id="container">
	
		<!--start header -->
			<header id="header">
			<div id="logo">
				<strong>Sunny Isle</strong>&nbsp;Hotel
			</div>	

			<div id="navigation">
				<ul>
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
		<!--end header -->
		
		
		<div class="subheader">
			<div class="left">
				<span class="page-title">Hotel Room Type Introduction</span>
				<span class="page-desc">Welcome to Sunny Isle</span>			</div>
		</div>
		<!--subheader -->
		
		
		<div id="content">
			<div class="tag-filter-container">
				<div class="one-half">
					<div class="post-item">
						<div class="image-place">
						<img src="2.jpg" alt="image" style="height:150px;width:150px"/>						</div>
						<div class="post-content">
							<h2 class="post-title">Large room</h2>
							<p class="post-excerpt">double beds</p>
						</div>
						<div class="post-meta">
							<span>$:500</span>
							<a class="read-more" href="homepage.php" onclick="bookroom()">book now</a>						</div>
					</div>
				</div>
				
				<div class="one-half">
					<div class="post-item">
						<div class="image-place">
						<img src="1.jpg" alt="image" style="height:150px;width:150px"/>						</div>
						<div class="post-content">
							<h2 class="post-title"><a>Large room</a></h2>
							<p class="post-excerpt">a large single bed</p>
						</div>
						<div class="post-meta">
							<span>$:550</span>
							<a class="read-more" href="homepage.php" onclick="bookroom()">book now</a>						</div>
					</div>
				</div>
				
				<div class="one-half">
					<div class="post-item">
						<div class="image-place">
						<img src="3.jpg" alt="image" style="height:150px;width:150px"/>						</div>
						<div class="post-content">
							<h2 class="post-title"><a>Small room</a></h2>
							<p class="post-excerpt">a single bed</p>
						</div>
						<div class="post-meta">
							<span>$:300</span>
							<a class="read-more" href="homepage.php" onclick="bookroom()">book now</a>						</div>
					</div>
				</div>
				
				<div class="one-half">
					<div class="post-item">
						<div class="image-place">
						<img src="4.jpg" alt="image" style="height:150px;width:150px"/>						</div>
						<div class="post-content">
							<h2 class="post-title"><a>VIP room</a></h2>
							<p class="post-excerpt">best service</p>
						</div>
						<div class="post-meta">
							<span>$:1300</span>
							<a class="read-more" href="homepage.php" onclick="bookroom()">book now</a>						</div>
					</div>
				</div>
				
			</div>

		</div>
	
	</div>
	
</div>
</body>
</html>
