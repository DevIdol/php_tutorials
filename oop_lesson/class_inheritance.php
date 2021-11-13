<?php


    class Car {
        
        public $wheel = 4 ;
        private $door = 4 ;
        protected $sofa = 6 ;
        function car_activity(){
            echo "Wheel = ";
            echo $this -> wheel;
            echo "<br>";
            echo "Door = ";
            echo $this -> door;
            echo "<br>";
            echo "Sofa = ";
            echo $this -> sofa;
            echo "<br>";
            echo "This car is So Beautiful This Car Name is BMW";
        }
    }

    class Truck extends Car {
        function car_activity(){
            echo "Wheel = ";
            echo $this -> wheel = 12;
            echo "<br>";
            echo "Door = ";
            echo $this -> door = 2;
            echo "<br>";
            echo "Sofa = ";
            echo $this -> sofa = 5;
            echo "<br>";
            echo "This car is So Beautiful This Car Name is Container";
        }
    }

    $bmw=new Car;

    $container = new Truck;

    $bmw -> car_activity();
    echo "<br>";
    $container -> car_activity();

    