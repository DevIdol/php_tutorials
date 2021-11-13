<?php
    if(isset($_GET['edit'])){
        $user_id = $_GET['edit'];
        $query ="SELECT * FROM users WHERE user_id=$user_id";
        $result = mysqli_query($connect,$query);
        
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
        while($row = mysqli_fetch_assoc($result)){
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $username = $row['username'];
            $user_role = $row['user_role'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
        }
    }

    if(isset($_POST['edit_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        
        
//        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query ="UPDATE users SET username='$username',user_password='$user_password', user_firstname='$user_firstname',user_lastname='$user_lastname',user_email='$user_email', user_role='$user_role' WHERE user_id=$user_id";

        
        $result = mysqli_query($connect,$query);
        
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
    }


?>

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
        <lable class="control-label">Full Name</lable>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">User Role</lable>
        <select name="user_role" id="" class="form-control">
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
            <?php
                if($user_role == 'admin'){
                    echo '<option value="subscriber">Subscriber</option>';
                }else{
                    echo '<option value="admin">Admin</option>';
                }
    
    
            ?>
        </select>
    </div>
<!--
    <div class="form-group">
        <lable class="control-label">Post Image</lable>
        <input type="file" name="image">
    </div>
-->
    
    <div class="form-group">
        <lable class="control-label">Email Address</lable>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Password</lable>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    

    <div class="form-group">
       <input type="submit" name="edit_user" value="Update User" class="btn btn-primary">
   </div>
</form>


