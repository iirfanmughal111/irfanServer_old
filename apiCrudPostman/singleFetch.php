<?php
include 'connection.php';
$id = $_GET['singleId'];
if (!$id){
    $id = $_POST['singleId'];
}
//echo $id;
//
$query = "select * from `allData` where id =$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $n = $row['name'];
    $e = $row['email'];
    $p = $row['password'];
    
    echo json_encode($row);
//    echo $row;
//    
//    
//    $query = "select * from `allData` where id =$id";
//    $result = mysqli_query($conn, $query);
//    echo $query;
//    
////    Deleting
//
//    if ($result){
//        echo "Deleted successfully";
////        header('location:index.php');
//    }else{
//        echo 'query problem';
//    }

  


//$query = "select * from `allData` where id =$id";
//    echo "<br>query = $query";
//    $result = mysqli_query($conn, $query);
//    $row = mysqli_fetch_assoc($result);
//    $n = $row['name'];
//    $e = $row['email'];
//    $p = $row['password'];
//    echo "<br>email= $row<br>";

