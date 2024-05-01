<?php

include 'connection.php';
$requestType = $_SERVER['REQUEST_METHOD'];
$data = array();

switch ($requestType){
    case 'POST':
        
        response(getData());
        break;
    case 'GET':
        
        response(getData());
        break;
    default :
        break;
}
function getData(){
    global $conn;
    $sql = "Select * from `allData`";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
         while ($row = mysqli_fetch_assoc($result)){
        $data[] = array("id"=>$row['id'],"name"=>$row['name'],"email"=>$row['email'],"password"=>$row['password'],"image"=>$row['image']);
    }
    }
    else {
        echo "query issue";
    }
   
    return $data;
    
}
function response($data){
    echo json_encode($data);
}
//$url = "http://localhost/apiCrud/index.php";
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURL_RETURNTRANSFER, true);
//$result = curl_exec($ch);
//$curl_close($ch);
////echo $result;
//
//$result = json_encode($result, true);
////echo $result;
//if (isset($result['status'])) {
//    if (isset($result['result'])) {
//        if ($result['result'==true]){
//            print_r($result['data']);
//            echo 'data';
//        }
//    }
//    echo '<br><br>ok';
//} else {
//    echo '<br><br>query prob';
//}
?>

