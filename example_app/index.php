<?php

$username = 'nahbeel';
$url = 'https://api.github.com/orgs/thephpleague/members';
$process = curl_init($url);
curl_setopt($process, CURLOPT_USERAGENT, $username);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);
$results = json_decode($return);

foreach ($results as $result) {
   echo '<img src="' . $result->avatar_url . '" width="9%">';
}

curl_close($process);


?>
