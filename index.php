<?php

$urlRumahSakitUmum = "http://api.jakarta.go.id/v1/rumahsakitumum";
$urlKelurahan = "http://api.jakarta.go.id/v1/kelurahan";
$authorization = "LdT23Q9rv8g9bVf8v/fQYsyIcuD14svaYL6Bi8f9uGhLBVlHA3ybTFjjqe+cQO8k";
$joinData = [];

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: '. $authorization
  ));
curl_setopt($ch, CURLOPT_URL, $urlRumahSakitUmum);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
$dataRumahSakitUmum = json_decode(curl_exec($ch), true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: '. $authorization
  ));
curl_setopt($ch, CURLOPT_URL, $urlKelurahan);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
$dataKelurahan = json_decode(curl_exec($ch), true);

$joinData =[
    "status" => $dataKelurahan['status'],
    "count" => $dataKelurahan['count'],
    "data" => $dataRumahSakitUmum['data']
];

print_r ($joinData);
curl_close($ch);
