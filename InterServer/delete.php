<?php


    $id = $_GET['deleteId'];
//    echo "My sending id = $id<br>";

    $form_data = array(
        'deleteId' => $id,

    );
    $str = http_build_query($form_data );
//    echo "my str = $str<br>";
    $url = 'http://localhost/apiCrudPostman/delete.php';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result_url = curl_exec($ch);
   
    echo $result_url; 
    header("location: display.php");

