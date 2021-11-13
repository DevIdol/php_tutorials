<?php


    class Car {
        private $wheel = 20;
        
        function getting (){
            return $this -> wheel;
        }
        function setting($value){
            return $this -> wheel = $value;   
        }
    }

    $bmw=new Car;

    //echo $bmw -> wheel;

    echo $bmw -> getting();

    echo $bmw -> setting(100);
    