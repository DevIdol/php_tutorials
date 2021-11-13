<?php
    echo $_POST['username'];

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