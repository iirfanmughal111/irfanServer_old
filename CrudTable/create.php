<?php
include 'connection.php';
if (isset($_POST['submit'])){
    echo 'clicked';
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    $sql = "insert into `allData` (name,email,password) values ('$n','$e','$p')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo"data inserted";
        header("location:index.php");
    }else{
        echo 'query problem';
    }
//    echo $n, $e, $p;
}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Add new user</title>
    </head>
    <body>

        <div class="container">
            <div class="row d-flex my-5 justify-content-center">
            <div class="col-10 mt-5">
            <form method="post">
            <div class="form-group">
                <label for="Fname" >Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="emailAddress">Email address</label>
                <input type="email" class="form-control" id="email" name="email" " aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input type="password" class="form-control" name="password"  id="password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form> 
        </div>
        </div>
        </div>
        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>