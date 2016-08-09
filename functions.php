<?php

function url($url)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl , CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
