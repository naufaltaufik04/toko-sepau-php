<?php

$myKey = "bcdbd44fc1eb96bb197b03ea81da732c";
$curl = curl_init();

$kotaAwal = 501;
$kotaTujuan = 114;
$_SESSION['beratTotal'] = 5230;
$courier = "jne";
$service = "OKE";


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin= $kotaAwal &destination= $kotaTujuan &weight= ". $_SESSION['beratTotal'] . "&courier=jne",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: $myKey"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

//decode json
$response_data = json_decode($response);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if($response_data->rajaongkir->status->code == 200){
        foreach ($response_data->rajaongkir->results as $result) {
            if($result->code == $courier){
                foreach($result->costs as $costs){
                    if($costs->service == $service){
                        foreach($costs->cost as $cost){
                            echo $cost->value;
                        }
                    }
                }
            }
        }                                            
    }
}

?>