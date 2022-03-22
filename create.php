<?php

require 'server/vendor/autoload.php';

// This is your test secret API key.
$stripe = new \Stripe\StripeClient('sk_test_51KbyIEKNFDj4wXOAqdiSNxnUTMo0QQQl2TcL9TS4hd1RIkr4RZanHOJ8134ovaqdhNkCOcygKuLaNIqTO1k6hajF00LmYcLybI');
\Stripe\Stripe::setApiKey('sk_test_51KbyIEKNFDj4wXOAqdiSNxnUTMo0QQQl2TcL9TS4hd1RIkr4RZanHOJ8134ovaqdhNkCOcygKuLaNIqTO1k6hajF00LmYcLybI');

function calculateOrderAmount(array $items): int {
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // people from directly manipulating the amount on the client

	$total = 0;
	for ($i = 0; $i < count($items); $i++) {
		$total += ($items[$i]->quantity) * $items[$i]->price;
	}
	
	//convert to string to manipulate 
	$total = strval($total);
	//find index of '.'
	$index = strpos($total, ".");
	//remove decimal from customer total
	$total = substr_replace($total, '', $index, 1);
	//convert back to int
	intval($total);
	
    return $total;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);
	
    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'USD',
        'automatic_payment_methods' => [
          'enabled' => true,
        ],
		'shipping' => [
		  'name' => 'Fname LName',
		  'address' => [
			'line1' => '10 Ballad Lane',
			'city' => 'Stony Brook',
			'state' => 'NY',
			'country' => 'US',
			'postal_code' => '11790',
		  ],
		],
		'receipt_email' => 'kevin.olofson@aol.com',
    ]);
	
	$endpoint = \Stripe\WebhookEndpoint::create([
	  'url' => 'localhost/dextersTreats/webhook.php',
	  'enabled_events' => [
		'payment_intent.succeeded',
		'charge.refunded',
		'charge.dispute.created',
	  ],
	]);
	
	/**$customer = $stripe->customers->create([
		'description' => 'Example Customer',
		'email' => 'testemail@example.com',
		'payment_method' => 'pm_card_visa',
	]);**/
	
	
    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}