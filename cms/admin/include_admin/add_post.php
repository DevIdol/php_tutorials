<?php
    if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query ="INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";
        $query .= "VALUES ($post_category,'$post_title','$post_author','$post_date', '$post_image','$post_content','$post_tag','$post_status')";
        
        $result = mysqli_query($connect,$query);
        
        if(!$result){
            die('Query Failed'.mysqli_error($result));
        }
        echo "Complete Successfully Upload Your Post" . "<a href='post.php'>View Post</a>";
    }


?>

   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <lable class="control-label">Post Title</lable>
        <input type="text" class="form-control" name="post_title">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Post Category</lable>
        <select name="post_category_id" id="" class="form-control">
           <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connect,$query);
            if(!$result){
                die('Query Failed'.mysqli_error($result));
            }
            while($row=mysqli_fetch_assoc($result)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            ?>
            <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
            <?php
            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <lable class="control-label">Post Author</lable>
        <select name="post_author" id="" class="form-control">
           <?php
            $query = "SELECT * FROM users WHERE user_role='admin'";
            $result = mysqli_query($connect,$query);
            if(!$result){
                die('Query Failed'.mysqli_error($result));
            }
            while($row=mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
                $username = $row['username'];
            ?>
            <option value="<?php echo $user_id ?>"><?php echo $username ?></option>
            <?php
            }
            
            ?>
        </select>
    </div>
<!--
    <div class="form-group">
        <lable class="control-label">Post Author</lable>
        <input type="text" class="form-control" name="post_author">
    </div>
-->
    
    <div class="form-group">
        <lable class="control-label">Post Status</lable>
        <select name="post_status" id="" class="form-control">
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    
    <div class="form-group">
        <lable class="control-label">Post Image</lable>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Post Tag</lable>
        <input type="text" class="form-control" name="post_tag">
    </div>
    
    <div class="form-group">
        <lable class="control-label">Post Content</lable>
<!--        <textarea ></textarea>-->
   <textarea name="post_content" cols="30" rows="10" class="form-control" id="editor">
        
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    </div>

    <div class="form-group">
       <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
   </div>
</form>


