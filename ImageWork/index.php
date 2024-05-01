<?php


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

?>
<html>
    <body>

        <form method = "POST" enctype = "multipart/form-data">
            <input type = "file" name = "image" />
            <input type = "submit"/>
        </form>

    </body>
</html>