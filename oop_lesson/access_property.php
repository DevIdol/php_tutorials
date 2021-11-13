<?php


    class Car {
        
        public $wheel = 4 ;
        
        private $door = 6 ;
        
        protected $sofa = 5 ;
        
        
        function car_drive(){
            
            echo $this -> wheel;
            
            echo $this -> door;
            
            echo $this -> sofa;
            
            echo "Hello Customer This car is preety good in the world";
        }
        
    }


    $bmw = new Car();

    echo $bmw -> wheel;

    echo "<br>";

    echo $bmw -> car_drive();