<?php
	include("navbar.php");
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/cart.css" rel="stylesheet" type="text/css">
		<link href="css/checkout.css" rel="stylesheet" type="text/css">
		<link href="css/shopping_cart.css" rel="stylesheet" type="text/css">
		<script src="js/shopping_cart.js"></script>
		<script src="https://js.stripe.com/v3/"></script>
		<script src="js/checkout.js" defer></script>
	</head>
	<body onload="establishCart()">
		<div align="center">
			<h1 id="headline">Checkout</h1>
			<!-- Cart Code -->
			<div class="col-25">
					<div class="container">
						<h4 id="startHere">Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b id="cartItems"></b></span></h4>
						<hr>
						<p>Total <span class="price" style="color:black"><b id="totalPrice"></b></span></p>
					</div>
				</div>
				<form id="payment-form">
					<input type="text" id="email" placeholder="Enter email address"/>
					<input type="text" id="name" placeholder="Name on Card"/>
					<div id="payment-element">
					<!--Stripe.js injects the Payment Element-->
					</div>
					<input type="text" id="address" placeholder="123 Street St."/>
					<button id="submit">
						<div class="spinner hidden" id="spinner"></div>
						<span id="button-text">Pay now</span>
					 </button>
					<div id="payment-message" class="hidden"></div>
				</form> 
			<?php
				include("footer.php");
			?>
			<!-- Body close div -->
		</div>
		<script>
			let total = 0;
			let cart = getCookie("cart");
			let cookieData = [];
			cookieData = JSON.parse(cart);
			
			function establishCart() {
				document.getElementById("cartItems").innerHTML = cookieData.length;
				//add cart items to page
				for (let i = 0; i < cookieData.length; i++) {
					let item = cookieData[i].name;
					let itemPrice = cookieData[i].price;
					let quantity = cookieData[i].quantity;
					//removes whitespace
					let codeName = item.replace(/\s/g, "");
					//remove &
					var that = this;
					codeName = codeName.replace("&", "");
					$("<p><input type='button' value='-' class='removeItem' onclick='removeItemFromCart(this)' /><input type='button' value='+' class='addItem' onclick='addItemQuantity(this)' /><a id='" + codeName + "' href='store_cookies.php'>" + item + '</a> (' + quantity + ') ' + "<span class='price'>" + itemPrice + "</span></p>").insertAfter("#startHere");
					total += (itemPrice * quantity);
				}
				total = parseFloat(total).toFixed(2);
				document.getElementById("totalPrice").innerHTML = "$" + total;
			}
			
			function removeItemFromCart(e) {
				//remove item from cookie and reload page to update cart
				let ri = $(e).next().next().attr('id');
				//find the item that needs to be removed
				for (let i = 0; i < cookieData.length; i++) {
					let currentItem = cookieData[i];
					let item = currentItem.name;
					item = item.replace(/\s/g, "");
					item = item.replace("&", "");
					if (item === ri) {
						if (currentItem.quantity === 1) {
							cookieData.splice(i, 1);
						} else {
							currentItem.quantity -= 1;
						}
						break;
					} 
				}
				//update cookie
				cookieData = JSON.stringify(cookieData);
				createCookie("cart", cookieData, 31);
				//update page to reflect changes
				window.location.replace("shopping_cart.php");
			}
			
			function addItemQuantity(e) {
				let itemName = $(e).next().attr('id');
				for (let i = 0; i < cookieData.length; i++) {
					let item = cookieData[i];
					let itemN = item.name.replace(/\s/g, "");
					itemN = itemN.replace("&", "");
					if (itemName === itemN) {
						item.quantity += 1;
						cookieData.splice(i, 1, item);
						break;
					}
				}
				//update cookie & webpage
				console.log(cookieData);
				cookieData = JSON.stringify(cookieData);
				createCookie("cart", cookieData, 31);
				window.location.replace("shopping_cart.php");
			}
		</script>
	</body>
</html>