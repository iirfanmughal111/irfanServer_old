<?php
$id = $_GET['deleteId'];
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;
  
$client = new Client();
  
$response = $client->request('POST', 'http://localhost/apiCrudPostman/delete.php', [
    'query' => [
        'deleteId' => $id,
        
    ]
]);



header("location:index.php");
//get status code using $response->getStatusCode();
  
//$body = $response->getBody();
//$arr_body = json_decode($body);


