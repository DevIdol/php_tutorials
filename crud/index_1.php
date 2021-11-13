<?php
    $connect = mysqli_connect('localhost','root','','loginapp');
    if(!$connect){
        echo "Connect Failed";
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connect,$username);
        $password = mysqli_real_escape_string($connect,$password);
        if($username && $password){
            $query ="INSERT INTO users(username, password) VALUES ('$username','$password')";
            $result = mysqli_query($connect,$query);
            if(!$re
               sult){
                die('Query Failed');
            }else{
                echo "<h2 class='text-center'>Successfully Insert Data</h2>";
            }
        }
    }

    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-8">
                <form action="" method="post">
                   <br><br>
                    <div class="form-group">
                        <input type="text" placeholder="Please Enter Your Name" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Please Enter Your Name" name="password" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="Log In" class="btn btn-primary">
                </form>           
           </div>
       </div>
   </div>    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>