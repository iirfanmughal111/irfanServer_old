<?php
// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new Google\Client();
$client->setApplicationName("Client_Library_Examples");
$client->setAuthConfig('client_secret.json');
$client->setDeveloperKey("AIzaSyDQaaQXGPSW_4xTmz5x_lwxI0tNkBuDQag");
$client->addScope('https://www.googleapis.com/auth/youtube.force-ssl');

// $service = new Google\Service\Books($client);
// $query = 'Henry David Thoreau';
// $optParams = [
//   'filter' => 'free-ebooks',
// ];
// $results = $service->volumes->listVolumes($query, $optParams);

// foreach ($results->getItems() as $item) {
//   echo $item['volumeInfo']['title'], "<br /> \n";
// }


?>