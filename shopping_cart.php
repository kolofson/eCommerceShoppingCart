<?php
	include("navbar.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/cart.css" rel="stylesheet" type="text/css">
		<link href="css/checkout.css" rel="stylesheet" type="text/css">
		<script src="js/shopping_cart.js"></script>
	</head>
	<body onload="establishCart()">
		<?php
			session_start();
		?>
		<div align="center">
			<h1 id="headline">Checkout</h1>
			<!-- Cart Code -->
			<div class="row">
				<div class="col-75">
					<div class="container">
						<form action="/confirmPurchase.php" method="post">
							<div class="row">
								<div class="col-50">
									<h3>Billing Address</h3>
									<label for="fname"><i class="fa fa-user"></i> Full Name</label>
									<input type="text" id="fname" name="firstname" placeholder="John M. Doe">
									<label for="email"><i class="fa fa-envelope"></i> Email</label>
									<input type="text" id="email" name="email" placeholder="john@example.com">
									<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
									<input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
									<label for="city"><i class="fa fa-institution"></i> City</label>
									<input type="text" id="city" name="city" placeholder="San Diego">
									<div class="row">
										<div class="col-50">
										<label for="state">State</label>
										<input type="text" id="state" name="state" placeholder="NY">
									</div>
									<div class="col-50">
										<label for="zip">Zip</label>
										<input type="text" id="zip" name="zip" placeholder="10001">
									</div>
								</div>
							</div>
							<div class="col-50">
								<h3>Payment</h3>
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
								  <i class="fa fa-cc-visa" style="color:navy;"></i>
								  <i class="fa fa-cc-amex" style="color:blue;"></i>
								  <i class="fa fa-cc-mastercard" style="color:red;"></i>
								  <i class="fa fa-cc-discover" style="color:orange;"></i>
								</div>
								<label for="cname">Name on Card</label>
								<input type="text" id="cname" name="cardname" placeholder="John More Doe">
								<label for="ccnum">Credit card number</label>
								<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
								<label for="expmonth">Exp Month</label>
								<input type="text" id="expmonth" name="expmonth" placeholder="March">
								<div class="row">
								  <div class="col-50">
									<label for="expyear">Exp Year</label>
									<input type="text" id="expyear" name="expyear" placeholder="2022">
								  </div>
								  <div class="col-50">
									<label for="cvv">CVV</label>
									<input type="text" id="cvv" name="cvv" placeholder="123">
								  </div>
								</div>
							</div>
						</div>
						<label>
						  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
						</label>
						<input type="submit" value="Continue to checkout" class="btn">
						</form>
					</div>
				</div>
				<div class="col-25">
					<div class="container">
						<h4 id="startHere">Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b id="cartItems"></b></span></h4>
						<!-- Cart Items Displayed on Web Page -->
						<hr>
						<p>Total <span class="price" style="color:black"><b id="totalPrice"></b></span></p>
					</div>
				</div>
			</div>
			<?php
				include("footer.php");
			?>
			<!-- Body close div -->
		</div>
		<script>
			function establishCart() {
				let cart = getCookie("cart");
				let cookieData = [];
				let total = 0;
				cookieData = JSON.parse(cart);
				document.getElementById("cartItems").innerHTML = cookieData.length;
				//add cart items to page
				for (let i = 0; i < cookieData.length; i++) {
					let item = cookieData[i].name;
					let itemPrice = cookieData[i].price;
					$("<p><a href='store_cookies.php'></a>" + item + "<span class='price'>" + itemPrice + "</span></p>").insertAfter("#startHere");
					total += itemPrice;
				}
				total = parseFloat(total).toFixed(2);
				document.getElementById("totalPrice").innerHTML = "$" + total;
			}
		</script>
	</body>
</html>