<?php 
require_once("inc/functions.php");


$requests = $_GET;
$hmac = $_GET['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array( 'hmac' => '' ));
ksort($requests);

$token = "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";
$shop = "myheroku";


// Based on 4th video
$customers = shopify_call($token, $shop, "/admin/api/2020-04/customers.json", array(), "GET");
$customers = json_decode($customers['response'], JSON_PRETTY_PRINT);

foreach ($customers as $customer) {
	foreach($customer as $key => $value) {

			echo $value['email'] . "<br/>";

	}
}


 ?>
