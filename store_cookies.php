<?php
	include("navbar.php");
?>
<html>
	<head>
		<script src="js/shopping_cart.js"></script>
		<script src="js/merch.js"></script>
		<style>
			/** code for setting up quantity selection **/
			label {
				display: inline-block;
			}
			input {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<!-- Page Start -->
		<div align="center">
			<h1 id="headline">Homemade Dog Cookies</h1>
			<!-- Items -->
			<table>
				<!-- Row 1 -->
				<tr>
					<td>
						<!-- Item 1 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test" style="width:100%">
							<h1>Oatmeal & Blueberry</h1>
							<p id="A1_price">$9.99</p>
							<p id="A1_txt">Oatmeal & Blueberries.</p>
							<label for="A1_quantity">Quantity:</label>
							<input type="text" id="A1_quantity" value="1" size="1">
							<p><button id="A1" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 2 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test2" style="width:100%">
							<h1>Peanut Butter & Oats</h1>
							<p id="A2_price">$7.99</p>
							<p id="A2_txt">Peanut butter with crunchy oats.</p>
							<label for="A2_quantity">Quantity:</label>
							<input type="text" id="A2_quantity" value="1" size="1">
							<p><button id="A2" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 3 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Chicken Liver & Gizzards</h1>
							<p id="A3_price">$4.99</p>
							<p id="A3_txt">Chicken Liver & Gizzards.</p>
							<label for="A3_quantity">Quantity:</label>
							<input type="text" id="A3_quantity" value="1" size="1">
							<p><button id="A3" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 4 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Oatmeal & Carob Chunks</h1>
							<p id="A4_price">$6.99</p>
							<p id="A4_txt">Carob.</p>
							<label for="A4_quantity">Quantity:</label>
							<input type="text" id="A4_quantity" value="1" size="1">
							<p><button id="A4" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
				</tr>
				<!-- Row 2 -->
				<tr>
					<td>
						<!-- Item 1 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Beef & Cheese</h1>
							<p id="B1_price">$6.99</p>
							<p id="B1_txt">Beef & cheese.</p>
							<label for="B1_quantity">Quantity:</label>
							<input type="text" id="B1_quantity" value="1" size="1">
							<p><button id="B1" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 2 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Chicken </h1>
							<p id="B2_price">$6.99</p>
							<p id="B2_txt">Chicken.</p>
							<label for="B2_quantity">Quantity:</label>
							<input type="text" id="B2_quantity" value="1" size="1">
							<p><button id="B2" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 3 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Turkey</h1>
							<p id="B3_price">$7.99</p>
							<p id="B3_txt">Turkey.</p>
							<label for="B3_quantity">Quantity:</label>
							<input type="text" id="B3_quantity" value="1" size="1">
							<p><button id="B3" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
					<td>
						<!-- Item 4 -->
						<div class="card">
							<img src="images/test.jpg" alt="Cookie Test3" style="width:100%">
							<h1>Bison</h1>
							<p id="B4_price">$6.99</p>
							<p id="B4_txt">Bison.</p>
							<label for="B4_quantity">Quantity:</label>
							<input type="text" id="B4_quantity" value="1" size="1">
							<p><button id="B4" onclick="addToCart(this)">Add to Cart</button></p>
						</div>
					</td>
				</tr>
			</table>
			<?php
				include("footer.php");
			?>
		</div>
	</body>
</html>