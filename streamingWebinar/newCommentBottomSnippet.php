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
