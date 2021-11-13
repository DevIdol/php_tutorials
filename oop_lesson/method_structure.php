<?php

    class Car {
        function best_car(){
            echo "Hello Customer This Car is the best in the world";
        }
        function confort_car(){
            echo "Hello Customer This Car is the good in the world";
        }
        function vip_car(){
            echo "Hello Customer This Car is the vip in the world";
        }
    }

    $first_gen=new Car();
    $second_gen = new Car();
    $third_gen = new Car();

    $second_gen -> vip_car();

    echo "<br>";

    $third_gen -> best_car();

