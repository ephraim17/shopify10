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
 	"customer" => array(
    "first_name" => "Rishab",
 	  "last_name" => "Kv",
 	  "email" => "krishab7866565@gmail.com",
 	  "phone" => "15142546011",
  )
);

$createCustomer = shopify_call($token, $shop, "/admin/api/2020-04/customers.json", $new_customer_array, "POST");
$createCustomer = json_decode($createCustomer['response'], JSON_PRETTY_PRINT);

echo var_dump($createCustomer);


 ?>
