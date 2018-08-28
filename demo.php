<?php

require_once('php-google-analytics.php');

$ga = new php_google_analytics;

// Create Transaction
$data = [
  'v' => 1, // API version
  'tid' => 'UA-110582966-2', // Tracking ID (like UA-XXXXX-Y)
  'cid' => $ga->get_cid(), // Client ID
  't' => 'transaction',
  'ti' => 846478558, // Unique transaction (order) id
  'ta' => 'Affiliation', // Transaction affiliation
  'tr' => 100, // Order total
  'ts' => 10, // Order shipping
  'cu' => 'USD' // Currency
];

$res = $ga->send($data);

var_dump($res); // true or false, if error

// Add item(s) to Transaction

// demo order items
$items = [
  [
    'tid' => 'UA-110582966-2', // Tracking ID (like UA-XXXXX-Y)
    'cid' => $ga->get_cid(), // Client ID
    'ti' => 846478558, // Unique transaction (order) id (same as above)
    'in' => 'First Item', // Name
    'ip' => 50, // Price (for one item!)
    'iq' => 1, // Quantity
    'ic' => 'gdYcjx', // Item code / SKU
    'cu' => 'USD' // Currency
  ],
  [
    'tid' => 'UA-110582966-2',
    'cid' => $ga->get_cid(),
    'ti' => 846478558,
    'in' => 'Second Item',
    'ip' => 50,
    'iq' => 1,
    'ic' => 'avUobx',
    'cu' => 'USD'
  ]
];

// Send demo items

foreach ($items as $key => $value) {
  $data = [
    'v' => 1, // API version
    'tid' => $value['tid'],
    'cid' => $value['cid'],
    't' => 'item',
    'ti' => $value['ti'],
    'in' => $value['in'],
    'ip' => $value['ip'],
    'ic' => $value['ic'],
    'iq' => $value['iq'],
    'cu' => $value['cu']
  ];

  $res = $ga->send($data);

  var_dump($res); // true or false, if error
}

