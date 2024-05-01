<?php include 'connection.php';
    $id = $_POST['updateId'];
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

 
    if (move_uploaded_file($file_tmp,$upload_dir )) {
        echo 'Image Uploaded';
    } else {
        echo 'img problem';
    }
    
    
$id = $_GET['updateId'];
echo "Received ID = $id<br>";
if (!$id){
    $id = $_POST['updateId'];
}
echo "Received ID = $id<br>";

$sql = "update `allData` set id = '$id', name = '$n',email='$e',password='$p', image='$file_name' where id=$id";
    $result = mysqli_query($conn, $sql);

$requestType = $_SERVER['REQUEST_METHOD'];

    
//    Updating
    if ($_GET['submit']==true){
    $n = $_GET['name'];
    $e = $_GET['email'];
    $p = $_GET['password'];
//    echo $e,$n,$p;
//    
    $sql = "update `allData` set id = '$id', name = '$n',email='$e',password='$p', image='$file_name' where id=$id";
    $result = mysqli_query($conn, $sql);
//    echo $result;
    if ($result){
        echo "Update successully";
//        header('location:index.php');
    }else{
        echo 'query problem';
    }
}
else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['updateId'];
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];
//    echo $e,$n,$p;
//    
    $sql = "update `allData` set id = '$id', name = '$n',email='$e',password='$p',image='$file_name' where id=$id";
    $result = mysqli_query($conn, $sql);
//    echo $result;
    if ($result){
        echo "Update successully";
//        header('location:index.php');
    }else{
        echo 'query problem';
    }
}
else
{
    echo "request type iss";
}
    

?>
