<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
//GetRequest
        
//require_once "vendor/autoload.php";
//  
//use GuzzleHttp\Client;
//  
//$client = new Client([
//    // Base URI is used with relative requests
//        'base_uri' => 'https://reqres.in',
//
//]);
//  
//$response = $client->request('GET', '/api/users', [
//    'query' => [
//        'page' => '2',
//    ]
//]);
//  
//if ($response->getStatusCode()==200) {
//
//$body = $response->getBody();
//$arr_body = json_decode($body);
//print_r($arr_body);
//}else {
//    echo "404";
//}

        
//PostRequest


//require_once "vendor/autoload.php";
////  
//use GuzzleHttp\Client;
////  
//$client = new Client([
//    // Base URI is used with relative requests
//    'base_uri' => 'https://reqres.in',
//]);
//  
//$response = $client->request('POST', '/api/users', [
//       'form_params' => [
//       'foo' => 'bar',
//       'baz' => ['hi', 'there!']
//   ]
////    'json' => [
////        'name' => 'Samsung',
////        'job' => 'Developer IT'
////    ]
//]);
//  
////get status code using $response->getStatusCode();
//  
//$body = $response->getBody();
//$arr_body = json_decode($body);
//print_r($arr_body);
     
        
//        PutRequest
//        
//        require_once "vendor/autoload.php";
//  
//use GuzzleHttp\Client;
//  
//$client = new Client([
//    // Base URI is used with relative requests
//    'base_uri' => 'https://reqres.in',
//]);
//  
//$response = $client->request('PUT', '/api/users/2', [
//    'json' => [
//        'name' => 'Sam1',
//        'job' => 'Developer1'
//    ]
//]);
  
        
        
        //        MyApis
        
        
        require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;
  
$client = new Client();
  
$response = $client->request('POST', 'http://localhost/apiCrudPostman/Fetching.php', [
//    'json' => [
//        'name' => 'Sam1',
//        'job' => 'Developer1'
//    ]
]);




//get status code using $response->getStatusCode();
  
$body = $response->getBody();
$arr_body = json_decode($body);

        

//CopyFile

        ?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Guzzle Work Inter </title>
        <style>
            .table td,th{
                vertical-align: middle !important;
            }
            
        </style>
    </head>
    <body>

        <div class="container mt-5">
            <div class="row bg-secondary rounded">
                <div class="col-12 ">
                    <h1 class="text-center fw-bold text-white">Guzzle Work</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end my-5">
                    <a class="btn btn-primary" href="insert.php">Add new</a>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class='ps-5'>ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
//      Reading All Rows


for ($i = 0; $i < count($arr_body); $i++) {

    $id = $arr_body[$i]->id;
    $name = $arr_body[$i]->name;
    $email = $arr_body[$i]->email;
    $password = $arr_body[$i]->password;
    $image = $arr_body[$i]->image;

    $i++;
    echo "<tr>
        <th scope='row' class=' border-end  border-1'>$i</th>
      <td class='ps-5'>$id</td>
      <td>$name</td>
      <td>$email</td>
      <td>$password</td>
        <td><img src='../apiCrudPostman/images/$image' style='height:60px;width:60px;'></td>

      <td><a href='update.php?updateId=$id' class='btn btn-primary btn-sm'>  Update</a></td>
      <td><a href='delete.php?deleteId=$id' class='btn btn-danger btn-sm'>Delete</a></td>
    </tr>";
    $i--;
}
?>

                        </tbody>
                    </table>


                </div>

            </div>

        </div>

<?php ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
