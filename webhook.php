<?php

	require 'vendor/autoload.php';

	// This is your test secret API key.
	\Stripe\Stripe::setApiKey('sk_test_51KbyIEKNFDj4wXOAqdiSNxnUTMo0QQQl2TcL9TS4hd1RIkr4RZanHOJ8134ovaqdhNkCOcygKuLaNIqTO1k6hajF00LmYcLybI');
	// Replace this endpoint secret with your endpoint's unique secret
	// If you are testing with the CLI, find the secret by running 'stripe listen'
	// If you are using an endpoint defined with the API or dashboard, look in your webhook settings
	// at https://dashboard.stripe.com/webhooks

	$endpoint_secret = 'whsec_b025bf29eea7ad1b20066fee6df239273d1a038faa4e2bff7d449380ed809f56';

	$payload = @file_get_contents('php://input');
	$event = null;

	try {
	  $event = \Stripe\Event::constructFrom(
		json_decode($payload, true)
	  );
	} catch(\UnexpectedValueException $e) {
	  // Invalid payload
	  echo '⚠️  Webhook error while parsing basic request.';
	  http_response_code(400);
	  exit();
	}
	if ($endpoint_secret) {
	  // Only verify the event if there is an endpoint secret defined
	  // Otherwise use the basic decoded event
	  $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
	  try {
		$event = \Stripe\Webhook::constructEvent(
		  $payload, $sig_header, $endpoint_secret
		);
	  } catch(\Stripe\Exception\SignatureVerificationException $e) {
		// Invalid signature
		echo '⚠️  Webhook error while validating signature.';
		http_response_code(400);
		exit();
	  }
	}

	// Handle the event
	switch ($event->type) {
	  case 'payment_intent.succeeded':
		$paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
		// Then define and call a method to handle the successful payment intent.
		// handlePaymentIntentSucceeded($paymentIntent);
		print_r("Worked");
		break;
	  case 'payment_method.attached':
		$paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
		// Then define and call a method to handle the successful attachment of a PaymentMethod.
		// handlePaymentMethodAttached($paymentMethod);
		break;
	  case 'charge.dispute.created':
		$chargeDispute = $event->data->object; //(Should) contain a \Stripe\chargeDispute
		// handleChargeDispute($chargeDispute);
		break;
	  default:
		// Unexpected event type
		error_log('Received unknown event type');
	}

	http_response_code(200);
?>