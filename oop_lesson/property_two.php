<?php


    class Car {
        
        var $wheel = 4 ;
        
        var $door = 4 ;
        
        var $sofa = 5 ;
        
        
        function car_drive(){
            echo "Wheel = ";
            echo $this -> wheel = 6;
            echo "<br>";
            echo "Door = ";
            echo $this -> door = 6;
            echo "<br>";
            echo "Hello Customer This car is preety good in the world";
        }
        
    }


    $bmw = new Car();

    $kia = new Car();

    $track = new Car();


    $bmw -> car_drive();