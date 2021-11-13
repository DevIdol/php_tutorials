<?php
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'admin';
    $db['db_pass'] = 'jostthang';
    $db['db_name'] = 'cms';

    foreach($db as $key => $value){
        define(strtoupper($key),$value);
    }

    $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(!$connect){
        echo "Database Not Connect";
    }

?>