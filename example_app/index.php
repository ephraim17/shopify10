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

<?php
		
 <div class="Polaris-ResourceList-Item__Container" id="<?php echo $value['id']; ?>">
  <div class="Polaris-ResourceList-Item__Owned">
    <div class="Polaris-ResourceList-Item__Media"><span aria-label="<?php echo $value['first_name'] $value['last_name']; ?>" role="img" class="Polaris-Avatar Polaris-Avatar--styleOne Polaris-Avatar--sizeMedium Polaris-Avatar--hasImage"><img src="https://proxy.shopifycdn.com/16983defcb012be02ede59be90f7d934694cb2562566df9332cdc17780e9d287/www.gravatar.com/avatar/2bac83b65b4a376b52108a5017b187b9.jpg?s=5760&amp;d=https%3A%2F%2Fcdn.shopify.com%2Fs%2Fassets%2Fadmin%2Fcustomers%2Fpolaris%2Favatar-7-ba99683716479a61aebb1c268b6c7439d287cca814ef0cb2c159f63ef616117f.png"
          class="Polaris-Avatar__Image" alt="" role="presentation"></span></div>
  </div>
  <div class="Polaris-ResourceList-Item__Content">
    <div class="Polaris-Stack Polaris-Stack--alignmentCenter">
      <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
        <h3><span class="Polaris-TextStyle--variationStrong"><?php echo $value['first_name'] $value['last_name']; ?></span></h3><span class="Polaris-TextStyle--variationSubdued"><?php echo $value['email']; ?></span>
      </div>
      <div class="Polaris-Stack__Item"><span class="Polaris-Badge">No metafields</span></div>
    </div>
  </div>
</div>
		}
	}

 ?>
