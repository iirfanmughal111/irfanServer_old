<?php
require_once 'vendor/autoload.php';
require_once 'class-db.php';
  
define('GOOGLE_CLIENT_ID', '861769269826-f6ks8u0vjoun2ciorar79o3kka4nqtvi.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
  
$config = [
    'callback' => 'http://localhost/youtube/callback.php',
    'keys'     => [
                    'id' => GOOGLE_CLIENT_ID,
                    'secret' => GOOGLE_CLIENT_SECRET
                ],
    'scope'    => 'https://www.googleapis.com/auth/youtube https://www.googleapis.com/auth/youtube.upload',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
  
$adapter = new Hybridauth\Provider\Google( $config );