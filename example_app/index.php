<?php 
require_once("inc/functions.php");


$requests = $_GET;
$hmac = $_GET['hmac'];
$serializeArray = serialize($requests);
$requests = array_diff_key($requests, array( 'hmac' => '' ));
ksort($requests);

$token = "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";
$shop = "myheroku";

//Product and Product Images
$image = "";
$title = "";

$collectionList = shopify_call($token, $shop, "/admin/api/2020-04/custom-collections.json", array(), 'GET');
$collectionList = json_decode($collectionList['response'], JSON_PRETTY_PRINT);
$collection_id = $collectionList['custom_collections'][0]['id'];

$collects = shopify_call($token, $shop, "/admin/api/2020-04/collects.json", array("collection_id"=>$collection_id), "GET");
$collects = json_decode($collects['response'], JSON_PRETTY_PRINT);

foreach ($collects as $collect) {
	foreach($collect as $key => $value) {
		$products = shopify_call($token, $shop, "/admin/api/2020-04/products/" . $value['product_id'] . ".json", array("collection_id"=>$collection_id), "GET");
		$products = json_decode($products['response'], JSON_PRETTY_PRINT);

		$images = shopify_call($token, $shop, "/admin/api/2020-04/products/" . $value['product_id'] . "/images.json", array("collection_id"=>$collection_id), "GET");
		$images = json_decode($products['response'], JSON_PRETTY_PRINT);


		 $image = $images['images']['src'];
         $title = $products['product']['title'];




	}
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Shopify Example App</title>
 </head>
 <body>
 	<h1>Shopify Example App</h1>
 	<img src="<?php echo $image; ?>" style="width:250px;">
 	<p><?php echo $title; ?></p>
 </body>
 </html>
