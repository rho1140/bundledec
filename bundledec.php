<?php
// Listen for the POST request 
$payload = json_decode(file_get_contents('php://input'));



//What we want the webhook to do 
//The URL that we want to send a PUT request to.
$url = 'https://store-njwk9edm.mybigcommerce.com/api/v2/products/20961';
$fields = json_encode(array("description" => "Trigger1"));
$headers = array(
	'Content-type: application/json',
    'Authorization: Basic '. base64_encode("lucian:6b02cfb11c15b43b564106e3debccfcf1b41a625")
);

//Initiate cURL
$ch = curl_init($url);
//Use the CURLOPT_PUT option to tell cURL that
//this is a PUT request.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

//Execute the request.
$return = curl_exec($ch);
curl_close($ch);


?>
