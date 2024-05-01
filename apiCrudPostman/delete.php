<?php
include 'connection.php';
$id = $_GET['deleteId'];
//echo "Received ID = $id<br>";
if (!$id){
    $id = $_POST['deleteId'];
}
//echo "Received ID = $id<br>";
//echo $id;
    $query = "delete from `allData` where id =$id";
    $result = mysqli_query($conn, $query);
    echo $query;
    
//    Deleting

    if ($result){
        echo "Deleted successfully";
//        header('location:index.php');
    }else{
        echo 'query problem';
    }

    

?>