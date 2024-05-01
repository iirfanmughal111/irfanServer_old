<?php
require_once "vendor/autoload.php";

use GuzzleHttp\Client;

//try {
//    $client = new Client();
//  
//    $response = $client->request('POST', "http://localhost/ImageWork/", [
//        'multipart' => [
//            [
//                'name'     => 'image', // name value requires by endpoint
//                'contents' => fopen(getcwd().'/blog2.jpg', 'r'),
//                'filename' => 'blog2.jpg',
//                'headers'  => array('Content-Type' => mime_content_type(getcwd().'/blog2.jpg'))
//            ]
//        ]
//    ]);
//  
//    if (200 == $response->getStatusCode()) {
//        $response = $response->getBody();
//        $arr_result = json_decode($response);
//        print_r($arr_result);
//    }
//} catch (\Exception $e) {
//    echo $e->getMessage();
//} 
if (isset($_FILES['image']) and isset($_POST['submit'])) {


    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    $client = new Client();


    header("location:index.php");


    $file_name = $_FILES['image']['name'];

    $file_tmp = $_FILES['image']['tmp_name'];
    $upload_dir = "images/";

    $upload_dir = "images/" . $file_name;

    try {
        $client = new Client();

        $response = $client->request('POST', "http://localhost/apiCrudPostman/insert.php", [
        'multipart' => [
        [
        'name' => 'image', // name value requires by endpoint
        'contents' => fopen(getcwd().'/'.$file_name, 'r'),
        'filename' => $file_name,
        'headers' => array('Content-Type' => mime_content_type(getcwd().'/'.$file_name))
        ],
             [
        'name' => 'name', // name value requires by endpoint
        'contents' => $n,

        ],
             [
        'name' => 'email', // name value requires by endpoint
        'contents' => $e,

        ],
             [
        'name' => 'password', // name value requires by endpoint
        'contents' => $p,

        ],

        ]
        ]);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}

//if (isset($_POST['submit'])) {
//    echo 'clicked';
//    $n = $_POST['name'];
//    $e = $_POST['email'];
//    $p = $_POST['password'];
//
//    $client = new Client();
//
//
//    $response = $client->request('GET', 'http://localhost/apiCrudPostman/insert.php', [
//        'query' => [
//            'name' => $n,
//            'email' => $e,
//            'password' => $p
//        ]
//    ]);
//    header("location:index.php");
//}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Data Fetching</title>
    </head>
    <body>


        <div class="container my-5">
            <div class="row bg-secondary rounded">
                <div class="col-12 ">
                    <h1 class="text-center fw-bold text-white">Guzzle Work</h1>
                </div>
            </div>
            <div class="row d-flex my-5 justify-content-center">
                <div class="col-6 mt-5">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="Fname" >Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control" id="email"  name="email" " aria-describedby="emailHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" name="password"  id="password">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chose your image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
</html>