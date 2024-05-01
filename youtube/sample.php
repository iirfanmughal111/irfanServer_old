<?php

/**
 * Sample PHP code for youtube.videos.insert
 * See instructions for running these code samples locally:
 * https://developers.google.com/explorer-help/code-samples#php
 *
 * ADDITIONAL NOTES:
 * 1. This sample code uploads a file and can't be executed via this interface.
 *    To test this code, you must run it locally using your own API credentials.
 *    See: https://developers.google.com/explorer-help/code-samples#php
 * 2. This example makes a multipart upload request. We recommend you consider
 *    using resumable uploads instead, particularly if you are transferring
 *    large files or there's a high likelihood of a network interruption or
 *    other transmission failure. For more information, see:
 *    https://developers.google.com/api-client-library/php/guide/media_upload
 */

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__));
}
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('webinar');
$client->setScopes([
    'https://www.googleapis.com/auth/youtube.upload',
]);

// TODO: For this request to work, you must replace
//       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
//       client_secret.json file. For more information, see
//       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
$client->setAuthConfig('YOUR_CLIENT_SECRET_FILE.json');
$client->setAccessType('offline');

// Request authorization from the user.
$authUrl = $client->createAuthUrl();
printf("Open this link in your browser:\n%s\n", $authUrl);
print('Enter verification code: ');
$authCode = trim(fgets(STDIN));

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($accessToken);

// Define service object for making API requests.
$service = new Google_Service_YouTube($client);

// Define the $video object, which will be uploaded as the request body.
$video = new Google_Service_YouTube_Video();

// TODO: For this request to work, you must replace "YOUR_FILE"
//       with a pointer to the actual file you are uploading.
//       The maximum file size for this operation is 274877906944.
$response = $service->videos->insert(
  'snippet',
  $video,
  array(
    'data' => file_get_contents("video.mp4"),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'multipart'
  )
);
print_r($response);
