<?php

/**
 * Sample PHP code for youtube.commentThreads.insert
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
// $a  = header("Location: https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=861769269826-f6ks8u0vjoun2ciorar79o3kka4nqtvi.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Firfan%2FstreamingWebinar%2F&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube.force-ssl&approval_prompt=auto");
// echo $authUrl;
// echo "a = $a";
// $url=$authUrl;


// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $a = curl_exec($ch); // $a will contain all headers

// $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

// Uncomment to see all headers

// echo "<pre>";
// print_r($a);echo"<br>";
// echo "</pre>";


// echo $url; // Voila

// $headers = @get_headers($url);
// $final_url = "";

// for ($i=0;$i<=count($headers);$i++)
// {
//     if (substr($headers[$i],0,10) == 'Location: ')
//     {
//     $final_url = trim(substr($headers[$i],10));
//     break;
//     }
//     // echo $headers[$i];
//     // echo "<br>";
    
// }
//  if ("https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=861769269826-f6ks8u0vjoun2ciorar79o3kka4nqtvi.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Firfan%2FstreamingWebinar%2F&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube.force-ssl&approval_prompt=auto" == "https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=861769269826-f6ks8u0vjoun2ciorar79o3kka4nqtvi.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Firfan%2FstreamingWebinar%2F&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fyoutube.force-ssl&approval_prompt=auto"){
//   echo 'same...';
//  }
//  else {
// echo 'd';
//  }
//     sleep(5);
//     echo $final_url;
// echo $authUrl;

// printf("Open this link in your browser:\n%s\n", $authUrl);
printf("Open this link in your browser:\n%s\n", $authUrl);

print('Enter verification code: ');
$authCode = trim(fgets(STDIN));

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($accessToken);

// Define service object for making API requests.
$service = new Google_Service_YouTube($client);

// Define the $commentThread object, which will be uploaded as the request body.
$commentThread = new Google_Service_YouTube_CommentThread();

// Add 'snippet' object to the $commentThread object.
$commentThreadSnippet = new Google_Service_YouTube_CommentThreadSnippet();
$commentThreadSnippet->setChannelId('UCo5AYE6zfF61Davq2rl7CTw');
$comment = new Google_Service_YouTube_Comment();
$commentSnippet = new Google_Service_YouTube_CommentSnippet();
$commentSnippet->setTextOriginal('Api Comment with video ID from local server  for checking redirection');
$comment->setSnippet($commentSnippet);
$commentThreadSnippet->setTopLevelComment($comment);
$commentThreadSnippet->setVideoId('1kJYVHgUTP4');
$commentThread->setSnippet($commentThreadSnippet);

$response = $service->commentThreads->insert('snippet', $commentThread);
print_r($response);
