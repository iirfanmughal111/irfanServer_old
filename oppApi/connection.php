<?php
class Database{
      private $servername = "localhost";
      private $username = "root";
      private $dbpassword = "Admin12$";
      private $database = "tables";
      
      //Connection
      private $mysqli = "";
      private $result = array();
      private $conn = false;
      
      public function __construct(){
          if (!$this->conn){
              $this->mysqli = new mysqli($this->servername,$this->username,$this->dbpassword,$this->database);
              $this->conn=true;
              if ($this->mysqli->connect_error){
                  array_push($this->result,$this->mysqli->connect_error);
              }
          }
          else{
          return true;
          }
      }
      public function insert($table, $params = array()) {
          if ($this->tableExist($table)){
              $table_cols = implode(', ', array_keys($params));
              $table_vals = implode("', '", $params);
              $sql = "Insert into $table ($table_cols) values ('$table_vals')";
              if ($this->mysqli->query($sql)){
                  array_push($this->result, $this->mysqli->insert_id);
                  return true;
                  
              }else{
                  array_push($this->result, $this->mysqli->error);
                  return false;
              }
          }
          
      }
      
            public function update($table, $params = array(),$where=null) {
                if ($this->tableExist($table)){
                    $args = array();
                    foreach ($params as $key=>$value){
                        $args[] = "$key = '$value'";
                    }
                    $sql = "update $table set ". implode(', ', $args); 
                    if ($where !=null){
                        $sql .= "where $where";
                        echo $sql;
                        
                    }
                    if ($this->mysqli->query($sql)){
                        array_push($this->result, $this->mysqli->affected_rows);
                        return true;
                    }
                    else{
                        array_push($this->result, $this->mysqli->error);
                    }
                }else{
                    
                    return false;
                }
          
      }
      
      
            public function delete($table,$where=null) {
                if ($this->tableExist($table)){
                    $sql = "DELETE FROM $table ";
                    if ($where!= null){
                        $sql .="WHERE $where";
                       
                    }
                    if ($this->mysqli->query($sql)){
                        array_push($this->result, $this->mysqli->affected_rows);
                        return true;
                    }
                    else{ echo $sql;
                        echo '<br>';
                        array_push($this->result, $this->mysqli->error);
                    }
                    
                }else
                { 
                    return false;
                
                }
                
          
      }
      
      
            public function select($table,$rows = "*", $join = null,$where = null, $order = null, $limit=null ) {
                if ($this->tableExist($table)){
                    $sql = "select $rows from $table";
                    if ($join != null){
                        $sql .= "join $join";
                    }
                    if ($where != null){
                        $sql .= " where $where";
                    }
                    if ($order != null){
                        $sql .= " order by $order";
                    }
                    if ($limit != null){
                        $sql .= " limit 0,$limit";
                    }
                    echo $sql; 
                    $query = $this->mysqli->query($sql);
          if ($query){
              $this->result = $query->fetch_all(MYSQLI_ASSOC);
              return true;
              
          }else{
              array_push($this->result, $this->mysqli->error);
              return false;
          }
                }
                else{
                    return false;
                }

      }
//      public function sql ($sql){
//        
//      }
      private function tableExist($table){
          $sql = "SHOW TABLES from $this->database LIKE '$table'";
          $tableInDb = $this->mysqli->query($sql);
          if ($tableInDb->num_rows==1){
              return true;
          }
          else{
                $created = false;
                  $sql = "CREATE TABLE IF NOT EXISTS $table (
                          ID int(111) AUTO_INCREMENT,
                          NAME varchar(255),
                          EMAIL varchar(255),
                          PASSWORD varchar(255),
                          PRIMARY KEY(id)
                          )";
                  ECHO $sql;
                   $query = $this->mysqli->query($sql);
                   if ($query){
                       $created = true;
//                       echo 'created';
                   }
                   else{
                       $created = false;
//                       echo 'query issue';
                   }

                
//              array_push($this->result,$table. " was not existed but created new one.");
              return $created;
          }
          
      }
      public function  get_result(){
          $val = $this->result;
          $this->result = array();
          return $val;
      }

      public function __desstruct(){
                if ($this->conn){
                    if($this->mysqli->close()){
                        $this->conn = false;
                        return true;
                    }
                }
                else{
                    return false;
                }

      }
}
    
          
      ?>

