<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "b5be2222d87feee2e9148858b8b69725";
$scopes = "read_orders,write_products";
$redirect_uri = "https://shopifyapp10.herokuapp.com/example_app/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();
