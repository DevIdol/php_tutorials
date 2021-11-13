<?php

    class GreenHackers {
    
    }


    class Car{
        
    }

//    $classes=get_declared_classes();
//
//    foreach($classes as $class){
//        echo $class . "<br>";
//    }


    if(class_exists('GreenHacker')){
        echo "This Class is exist";
    }else{
        echo "This Class is not exist";
    }