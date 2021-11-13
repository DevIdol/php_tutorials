<?php include_once "db.php"; ?>
<?php session_start(); ?>
<?php

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connect,$username);
        $password = mysqli_real_escape_string($connect,$password);
        
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        while($row = mysqli_fetch_array($result)){
            $db_id=$row['user_id'];
            $db_username=$row['username'];
            $db_password=$row['user_password'];
            $db_firstname=$row['user_firstname'];
            $db_lastname=$row['user_lastname'];
            $db_role=$row['user_role'];
        }
        
//        $password = crypt($password,$db_password);
        
        if($password = password_verify($password,$db_password)){
            $_SESSION['username'] = $db_username;
            $_SESSION['user_password'] = $db_password;
            $_SESSION['user_firstname'] = $db_firstname;
            $_SESSION['user_lastname'] = $db_lastname;
            $_SESSION['user_role'] = $db_role;
            header('Location: ../admin/index.php');
        }else{
            header('Location: ../index.php');
        }
    }


?>