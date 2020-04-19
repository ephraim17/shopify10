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
$theme = shopify_call($token, $shop, "/admin/api/2020-04/themes.json", array(), "GET");
$theme = json_decode($theme['response'], JSON_PRETTY_PRINT);

foreach ($theme as $curr_theme) {
	foreach($curr_theme as $key => $value) {
		if($value['role'] === 'main') {

			echo "Theme ID: " . $value['id'] . "<br/>";
			echo "Theme Name: " . $value['name'] . "<br/>";

		}
	}
}


 ?>
