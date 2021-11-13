<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
//        $username = "mgmg";
//        $password = 123456;
//    
//    if($password == "123456"){
//        echo "Welcome To My Site";
//    }else{
//        echo "Try Again";
//    }
    
    $username = "mgmg";
    $password = 123456;
    
    if($username == "mg" and $password == 123456){
        echo "Welcome to my site";
    }else if($username =="mg" or $password == "12345"){
        echo "Please Check Your User Name or Password";
    }else{
        echo "Try Again";
    }
    
    
    ?>
</body>
</html>




<!--
and     =>     true     true     true
               true     false    false
               false    true     false
               false    false    false
               
or     =>      true     true     true
               true     false    true
               false    true     true
               false    false    false
-->

