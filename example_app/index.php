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
		
?>

<ul>
	<li><a href="customer.php?id=<?php echo $value[id] ?>"><?php echo $value[first_name] . ' ' . $value[last_name]; ?></a><br/>
	<small><?php echo $value[email]; ?></small></li>
</ul>

<a href="account.php">Create an account</a>

	
<?php
		}
	}

 ?>
