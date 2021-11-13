<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Function Parameters</title>
</head>
<body>
    <?php
//        function example($name){
//            echo "Hello ".$name;
//        }
//        example('Developer');
    
    function add_number($num1,$num2,$num3){
        $sum= $num1 + $num2 - $num3;
        echo $sum;
    }
    add_number(200,500,100);
    ?>
</body>
</html>