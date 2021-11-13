<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Function</title>
</head>
<body>
    <?php
        
//        function example(){
//            echo "Green Hackers";
//        }
//        
//        example();
//        echo " Student";
        function x(){
            echo 200 + 250 ;
        }
        function y(){
            echo "Your Result is = ";
        }
        function z(){
            echo y().x();
        }
        z();
    
    ?>
</body>
</html>