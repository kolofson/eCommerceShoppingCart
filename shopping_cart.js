//global variables
let newItem;

//Store Pages
function addToCart(item) {
	//grab id of item being added to cart
	var itemName = item.id + "_txt"; 
	//get element
	var addProduct = document.getElementById(itemName);
	//get product name
	addProduct = addProduct.textContent;
	//get info for product object 
	itemName = item.id + "_price";
	var priceId = document.getElementById(itemName); 
	var price = priceId.textContent;
	//get quantity that customer selected for new item
	let qId = item.id + "_quantity";
	let qElement = document.getElementById(qId);
	var quantity = qElement.value;
	//convert to integer
	quantity = parseInt(quantity);
	//omit dollar sign to convert to decimal
	price = price.substr(1, price.length);
	price = parseFloat(price);
	var size = "N/A";
	//Create Object
	let p = new merch(addProduct, price, quantity, size);
	newItem = p;
	//send item to shopping cart
	createCart(p);
}

function createCookie(name, value, days) {
	var expires;
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function createCart(item) {
	//grab cookie data
	let cart = getCookie("cart");
	let cookieData = [];
	//check if cart is empty or item already exists within the cart
	if (!cart.includes(item.name)) {
		//check for old cart items from previous sessions
		if (cart === "") {
			//create cart
			cookieData.push(item);
		} else {
			//add current items with new item
			cookieData = JSON.parse(cart);
			cookieData.push(item);
		}
		
	} else {
		//add to quantity
		cookieData = JSON.parse(cart);
		//find existing quantity
		let oldQuantityItem = cookieData.find(isItem);
		item.quantity += oldQuantityItem.quantity;
		//remove old object and replace with new updated object
		let index = cookieData.findIndex(isItemIndex);
		cookieData.splice(index, 1, item);
	} 
	//create cookie / update cookie (Cart)
	cookieData = JSON.stringify(cookieData);
	createCookie("cart", cookieData, 31);
}

function isItem(product) {
	//flips through shopping list until finds item
  return product.name === newItem.name;
}

function isItemIndex(i) {
	if (i.name === newItem.name) {
		return i;
	}	
}
