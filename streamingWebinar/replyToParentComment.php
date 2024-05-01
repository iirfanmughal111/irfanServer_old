<?php

/**
 * Sample PHP code for youtube.comments.insert
 * See instructions for running these code samples locally:
 * https://developers.google.com/explorer-help/code-samples#php
 */

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__));
}
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('webinar');
$client->setScopes([
    'https://www.googleapis.com/auth/youtube.force-ssl',
]);

// TODO: For this request to work, you must replace
//       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
//       client_secret.json file. For more information, see
//       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
$client->setAuthConfig('client_secret.json');
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

// Define the $comment object, which will be uploaded as the request body.
$comment = new Google_Service_YouTube_Comment();

// Add 'snippet' object to the $comment object.
$commentSnippet = new Google_Service_YouTube_CommentSnippet();
$parentCommentId = "UgwbexNBtwDJujEx_dB4AaABAg";
$commentSnippet->setParentId($parentCommentId);
$commentText = "Remotly commented 2";
$commentSnippet->setTextOriginal($commentText);
$comment->setSnippet($commentSnippet);

$response = $service->comments->insert('snippet', $comment);
print_r($response);
