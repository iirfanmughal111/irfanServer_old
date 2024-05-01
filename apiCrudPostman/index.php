
<?php
include 'connection.php';
        $sql = "Select * from `allData`";
      $result = mysqli_query($conn, $sql);
      header('content-type:application/json');
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
       $arr[] = $row;
          }
          echo json_encode(['status'=>true,'data'=>$arr,'result'=>'Found']);
         
          
          
      }
//      else{
//          echo 'query problem';
//      }
      
      
?>
