<?php
      $servername = "localhost";
      $username = "root";
      $password = "Admin12$";
      $database = "tables";
      
      //Connection
      $conn = new mysqli($servername,$username,$password,$database);
      if ($conn -> connect_error ){
      die("Connection Failed!!!" . $conn->connect_errno);
      
      }
      else{
        //  echo 'connection establised';
      }
          
      ?>

