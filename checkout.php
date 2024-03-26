<?php
	session_start(); // Start the session if it's not already started
	require __DIR__ . "/vendor/autoload.php";

	$stripe_secret_key = "sk_test_51H9pL8JAnPTBVxGIblQOVVjD1G5pMD5fLu0UTFSvFPEferC8CauG2cv4aOCcrBRGhK0CC74BNnrhRzeW5rTCRBzA006SBre8oB";

	\Stripe\Stripe::setApiKey($stripe_secret_key);

	$total = 0; // Initialize total variable

	// Check if total exists in session
	if(isset($_SESSION['cart_total'])){
		$total = $_SESSION['cart_total'];
	} else {
		// Handle case when total is not found in session
		echo "Total not found in session.";
		exit; // Stop further execution
	}

	// Create Stripe checkout session with the total amount
	$checkout_session = \Stripe\Checkout\Session::create([
		"mode" => "payment",
		"success_url" => "http://localhost/web/success.php",
		"cancel_url" => "http://localhost/web/cart_view.php",
		"line_items" => [
			[
				"quantity" => 1,
				"price_data" => [
					"currency" => "cad",
					"unit_amount" => $total * 100, // Convert total to cents as Stripe requires amount in smallest currency unit
					"product_data" => [
						"name" => "Order Total" // You may want to adjust the product name as needed
					]
				]
			]
		]
	]);

	http_response_code(303);
	header("Location: " . $checkout_session->url);
?>
