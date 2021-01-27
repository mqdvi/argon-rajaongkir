<?php

require '../env.php';

$key = RAJAONGKIR_KEY;

$origin = $_GET['origin'];
$destination = $_GET['destination'];
$weight = $_GET['weight'];
$courier = $_GET['courier'];

if (empty($origin) || empty($destination) || empty($weight) || empty($courier)) {
    return "Data is invalid.";
}

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://pro.rajaongkir.com/api/v2/internationalCost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin={$origin}&destination={$destination}&weight={$weight}&courier={$courier}",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: {$key}"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
