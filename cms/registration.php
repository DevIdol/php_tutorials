<?php
    include_once "include/header.php";
    include_once "include/db.php";
?>
<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(!empty($username) && !empty($password) && !empty($email)){
            $username = mysqli_real_escape_string($connect,$username);
            $password = mysqli_real_escape_string($connect,$password);
            $email = mysqli_real_escape_string($connect,$email);
            $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
//            $query ="SELECT rendSalt FROM users";
//            $rendSalt_result = mysqli_query($connect,$query);
//            if(!$rendSalt_result){
//                die('Query Failed'.mysqli_error($connect));
//            }
//            $row=mysqli_fetch_array($rendSalt_result);
//            $rendSalt = $row['rendSalt'];
//            
//            $password = crypt($password,$rendSalt);

            $query ="INSERT INTO users(username, user_password,user_email,user_role) VALUES ('$username','$password','$email','subscirber')";
            $result = mysqli_query($connect,$query);
            if(!$result){
                die('Query Failed'.mysqli_error($connect));
            }
            
            $message = "Your Account Complete Successfully";
        }else{
            $message = "Please Fill Something For Account";
        }
        
    }


?>
    <!-- Navigation -->
<?php include_once "include/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                   <h3><?php echo @$message ?></h3>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

        <hr>

        <!-- Footer -->
<?php include_once "include/footer.php"; ?>