<?php
//Work on updataId
$id = $_GET['updateId'];

  $form_data = array(
        'singleId' => $id,
    );
    $str = http_build_query($form_data);

    $url = 'http://localhost/apiCrudPostman/singleFetch.php';

    $Singlech = curl_init();
    
curl_setopt($Singlech, CURLOPT_URL, $url);
curl_setopt($Singlech, CURLOPT_POST, 1);

curl_setopt($Singlech, CURLOPT_POSTFIELDS, $str);

curl_setopt($Singlech, CURLOPT_RETURNTRANSFER, true);

$result_url = curl_exec($Singlech);

//    echo $result_url;
    $value = json_decode($result_url);
   echo $value[12];
   echo $result_url->email;
   // echo $value[0]->wmail;

//
//
if (isset($_POST['submit'])) {

    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    $form_data = array(
        'updateId'=>$id,
        'name' => $n,
        'email' => $e,
        'password' => $p,
    );
    $str = http_build_query($form_data);
    $url = 'http://localhost/apiCrudPostman/edit.php';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result_url = curl_exec($ch);

    echo $result_url;
    header("location:display.php");
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
                <div class="col-10 mt-5">
                    <form method="post">
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

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
</html>