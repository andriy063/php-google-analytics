<?php

require_once('php-google-analytics.php');

// New instance
$ga = new php_google_analytics;

// Create Transaction
$data = [


];


$res = $ga->send($data);
var_dump($res); // true or false, if error

// Add item(s) to Transaction

