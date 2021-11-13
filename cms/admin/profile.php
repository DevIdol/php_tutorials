<?php
    include_once "include_admin/admin_header.php";
?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        while($row = mysqli_fetch_array($result)){
            $user_id = $row ['user_id'];
            $username = $row ['username'];
            $user_password = $row ['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row ['user_lastname'];
            $user_email = $row ['user_email'];
            $user_image = $row ['user_image'];
            $user_role = $row ['user_role'];
        }
    }

?>
<?php
    if(isset($_POST['edit_user'])){
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        $username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $user_role=$_POST['user_role'];
        
        
//        $post_image=$_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
//        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        
        $query ="UPDATE users SET username='$username',user_password='$user_password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_email='$user_email',user_role='$user_role' WHERE username='$username'";
        
        $result = mysqli_query($connect,$query);
        
    }



?>

    <div id="wrapper">;
        

        <!-- Navigation -->
<?php include_once "include_admin/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <lable class="control-label">First Name</lable>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Last Name</lable>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">User Name</lable>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">User Email</lable>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Password</lable>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    
    <div class="form-group">
       <select name="user_role" id="" class="form-control">
         <option value='<?php echo $user_role ?>'><?php echo $user_role ?></option>
         <?php
            if($user_role == 'admin'){
                echo "<option value='subscriber'>Subscirber</option>";
            }else{
                echo "<option value='admin'>Admin</option>";
            }
         ?>
       </select>
    </div>    
   <div class="form-group">
       <input type="submit" name="edit_user" value="Profile Update" class="btn btn-primary">
   </div>
</form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include_once "include_admin/footer.php" ?>