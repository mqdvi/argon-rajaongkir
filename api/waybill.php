<?php

require '../env.php';

$key = RAJAONGKIR_KEY;

$waybill = $_GET['waybill'];
$courier = $_GET['courier'];

if (empty($waybill) || empty($courier)) return "Data is invalid.";

// CURLOPT_POSTFIELDS => "waybill=000457954444&courier=sicepat",

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
  	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
  	CURLOPT_MAXREDIRS => 10,
  	CURLOPT_TIMEOUT => 30,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => "POST",
  	CURLOPT_POSTFIELDS => "waybill={$waybill}&courier={$courier}",
  	CURLOPT_HTTPHEADER => array(
    	"content-type: application/x-www-form-urlencoded",
		"key: {$key}"
  	),
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
