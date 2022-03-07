<html>
	<head>
		<!-- Tab Icon -->
		<link rel="icon" href="">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Permanent+Marker&family=Supermercado+One&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
		<!-- Connect to Database -->
            <?php
                $connection = mysqli_connect('localhost', 'kolofson', 'Freedom7926!', 'dextershomemadetreats');
                //check 
                if (!$connection) {
                    die("Couldn't connect");
				}
			?>
		<!-- Navigation Bar -->
		<ul>
			<li><a href="index.php">Home</a></li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Our Store</a>
				<div class="dropdown-content">
					<a href="store_cookies.php">Cookies</a>
					<a href="store_limitedTimeCookies.php">Limited Time Treats</a>
					<a href="store_chewSticks.php">Chew Sticks</a>
				</div>
			</li>
			<li><a href="dexter.php">About Dexter</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
			<li><a href="ourfurryfriends.php">Our Furry Taste Testers</a></li>
			<li><a href="shopping_cart.php">Cart <i style="font-size:16px;color:white" class="fa">&#xf07a;</i></a></li>
		</ul>
	</body>
</html>