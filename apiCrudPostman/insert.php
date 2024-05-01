<?php

include 'connection.php';
//$requestType = $_SERVER['REQUEST_METHOD'];
//echo $requestType;
//echo "<br>ok";

    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    
   $file_name = $_FILES['image']['name'];

    $file_tmp = $_FILES['image']['tmp_name'];
    $upload_dir = "images/" ;
    
    if (file_exists($upload_dir)) {
            if (is_writable($upload_dir)) {
                $target = $upload_dir; //"dirname(__FILE__)" . "photos/";
                $target = $target . basename($_FILES['file']['name']);
                echo 'Directory ok';

            } else {
                echo 'Upload directory is not writable<br>';
            }
        } else {
            echo 'Upload directory does not exist.<br>';
        }
            $upload_dir = "images/".$file_name ;

        
    echo "$file_name -> $file_tmp -> <br>";
    if (move_uploaded_file($file_tmp,$upload_dir )) {
        echo 'Image Uploaded';
    } else {
        echo 'img problem';
    }
    
    echo $n, $p,$e,$file_name;
    $sql = "insert into `allData` (name,email,password,image) values ('$n','$e','$p','$file_name')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo"<br>data inserted";
//        header("location:index.php");
    }else{
        echo 'query problem<br>';
    }
//    echo $n, $e, $p;

?>
