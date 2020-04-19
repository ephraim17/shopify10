<?php 
require_once("inc/functions.php");


$requests = $_GET;
$hmac = $_GET['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array( 'hmac' => '' ));
ksort($requests);

$token = "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";
$shop = "myheroku";


$new_customer_array = array(
 	"first_name" => "Rishab",
 	"last_name" => "Kv",
 	"email" => "krishab7866565@gmail.com",
 	"phone" => "15142546011",
);

$createCustomer = shopify_call($token, $shop, "/admin/api/2020-04/customers.json", $new_customer_array, "POST");
$createCustomer = json_decode($createCustomer['response'], JSON_PRETTY_PRINT);


 ?>
