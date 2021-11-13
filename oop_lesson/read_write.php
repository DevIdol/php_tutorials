<?php

    class Car {
        var $wheel = 4 ;
        
        function action(){
            echo "This car is so beauty";
        }
    }


$car1=new Car();

$car2 = new Car();


echo $car1 -> wheel;

echo $car2 -> wheel = 6;