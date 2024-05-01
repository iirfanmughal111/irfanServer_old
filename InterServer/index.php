<?php
if (isset($_POST['submit'])) {
    echo 'clicked';
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    $form_data = array(
        'name' => $n,
        'email' => $e,
        'password' => $p,
    );
    $str = http_build_query($form_data);
    $url = 'http://localhost/apiCrudPostman/insert.php';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result_url = curl_exec($ch);
   
    echo $result_url; 
    sleep(2);
    header("location:display.php");
} 
//else {
//    echo 'not clicked';
//}
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


        <div class="container my-5">
             <div class="row bg-secondary rounded">
                <div class="col-12 ">
                    <h1 class="text-center fw-bold text-white">Inter Server Work</h1>
                </div>
            </div>
            <div class="row d-flex my-5 justify-content-center">
                <div class="col-6 mt-5">
                    <form method="post">
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

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
</html>