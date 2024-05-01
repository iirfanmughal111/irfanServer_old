<?php

$a = $_POST['n1'];
$b = $_POST['n2'];
$op = $_POST['op'];

$res = 0;
$error = false;
switch ($op) {
    case "+":

        $res = $a + $b;
        break;
    case "-":
        $res = $a - $b;
        break;
    case "*":
        $res = $a * $b;
        break;
    case "/":
        if ($a == 0) {
            $res = "Error!! Your first value = $a so divions can not be performed.";
            $error = true;
        } else if ($b == 0) {
            $res = "Error!! Your second value = $b so divions can not be performed. Answer is infiniy.";
            $error = true;
        } else {
            $res = $a / $b;
        }
        break;
    case "%":
        $res = $a % $b;
        break;
    default:
        echo "chose the write operation<br>";
        break;
}
if (!$res == 0 and $error == false) {
    echo "Result:<br> $a $op $b = $res.";
} else if ($error = true) {
    echo $res;
}

//phpinfo();  
?>

