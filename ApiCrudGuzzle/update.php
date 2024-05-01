<?php
//Work on updataId


require_once "vendor/autoload.php";
  $id = $_GET['updateId'];

use GuzzleHttp\Client;
  
$client = new Client();
  
$response = $client->request('POST', 'http://localhost/apiCrudPostman/singleFetch.php', [
    'query' => [
        'singleId' => $id,
       
    ]
]);
$body = $response->getBody();
$arr_body = json_decode($body);
$n = $arr_body->name;
$e= $arr_body->email;
$p = $arr_body->password;
$i = $arr_body->image;


if (isset($_POST['submit'])) {

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

        $response = $client->request('POST', "http://localhost/apiCrudPostman/edit.php", [
        'multipart' => [
        [
        'name' => 'image', // name value requires by endpoint
        'contents' => fopen(getcwd().'/'.$file_name, 'r'),
        'filename' => $file_name,
        'headers' => array('Content-Type' => mime_content_type(getcwd().'/'.$file_name))
        ],
                 [
        'name' => 'updateId', // name value requires by endpoint
        'contents' => $id,

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

    header("location:index.php");
}
//    echo $n, $e, $p;
//            $n = "static";
//            $e = "static@gmail.com";
//            $p = 123;
//                 $form_data = array(
//                'name' => $n,
//                'email' => $e,
//                'password' => $p,
//            );
//            $str = http_build_query($form_data);
//            $url = 'http://localhost/apiCrudPostman/insert.php';
//                
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_POST, 1);
//
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
//
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//            $result_url = curl_exec($ch);
//
//            echo $result_url;
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


        <div class="container">
            <div class="row d-flex my-5 justify-content-center">
                <div class="col-8 mt-5">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Fname" >Name</label>
                            <input type="text" class="form-control" id="name"  value="<?php echo $n ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control"  id="email" name="email"  value="<?php echo $e ?>" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control"  name="password"  value="<?php echo $p ?>"  id="password">
                        </div>
                           <div class="mb-3">
                            <label for="formFile" class="form-label">Chose your new image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
                <div class ="col-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="../apiCrudPostman/images/<?php echo $i?>">
                </div>
            </div>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
</html>