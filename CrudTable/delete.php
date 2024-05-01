<?php
include 'connection.php';
$id = $_GET['deleteId'];
echo $id;
    $query = "delete from `allData` where id =$id";
    $result = mysqli_query($conn, $query);
    
//    Deleting

    if ($result){
        header('location:index.php');
    }else{
        echo 'query problem';
    }

    

?>