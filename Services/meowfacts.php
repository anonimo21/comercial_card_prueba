<?php

//$apiUrl = 'https://meowfacts.herokuapp.com/';

function getApiData(string $url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}