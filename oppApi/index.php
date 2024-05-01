<?php 
include 'connection.php';
$obj = new Database;
$obj->insert('allData2',['name'=>'opp','email'=>'oop@php.com','password'=>'123']);
//$obj->update('allData',['name'=>'opp1','email'=>'oop1@php.com','password'=>'1231'],'id="14"');
//$obj->delete('allData','id="14"');
//$obj->update('allData',['name'=>'opp1','email'=>'oop1@php.com','password'=>'1231'],'id="14"');

echo "Dispaly result is: <br>";
//$obj->select('allData','id, name',null,'name="opp"','id',null);

print_r($obj->get_result());

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Opp - Php</title>
    </head>
    <body>


        <div class="container my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <?php

//
//                    class fruits {
//
//                        public $name;
//                        public $color;
//                        
//
//
//                        public function __construct($n, $c) {
//                            $this->name = $n;
//                            $this->color = $c;
//                        }
//
//                        function get_name() {
//                            return $this->name;
//                        }
//
//                        function get_color() {
//                            return $this->color;
//                        }
//                        
//                        protected function intro() {
//                            echo "This is a parent class with fruit {$this->name} and color {$this->color}<br> ";
//
//                        }
//
//                    }
//                    class apple extends fruits{
//                        public $weight;
//                         public function __construct($n, $c,$w) {
//                            $this->name = $n;
//                            $this->color = $c;
//                            $this->weight = $w;
//
//                        }
//                        public function message(){ 
////                            $this->intro();
//                            echo "This is fruit class - a chiled class<br> Fruit is = {$this->name}, color is = {$this->color}, and wight is = {$this->weight}.";
//                           
//                        }
//                    }
//                    
////                    $apple = new fruits('Apple', 'red');
////                    $mango = new fruits('Mango', 'yellow');
//
////                    echo $apple->get_name();
////                    echo '<br>';
////                    echo $apple->get_color();
////                    echo '<br>';
////                    echo $mango->get_name();
////                    echo '<br>';
////                    echo $mango->get_color();
//                    $app = new apple('Mango','Yellow','32g');
////                    $app->intro();
//                    $app->message();

                    
                    
//                  Interface Work
                    
//                    interface Animal {
//
//                        public function makesound();
//                    }
//
//                    class cat implements Animal {
//
//                        public function makesound() {
//                            echo "<br>meow";
//                        }
//
//                    }
//
//                    class dog implements Animal {
//
//                        public function makesound() {
//                            echo "<br>bark";
//                        }
//
//                    }
//
//                    class mouse implements Animal {
//
//                        public function makesound() {
//                            echo "<br>squeak";
//                        }
//
//                    }
//
//                    $c = new cat();
//                    $d = new dog();
//                    $m = new mouse();
//                    $arr = array($c,$d,$m);
//                    foreach ($arr as $i){
//                        echo $i->makesound();
//                    }
//                    
                    ?>

                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>