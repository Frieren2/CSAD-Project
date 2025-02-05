<?php
session_start();

$quantity = count($_SESSION['selected_seats']);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/CSAD-Project';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1QolG304yn2H135ihdpykZwe',
    'quantity' => $quantity,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/index.php?page=success',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);