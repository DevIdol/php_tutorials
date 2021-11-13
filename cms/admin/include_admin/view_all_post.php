<?php
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $checkBoxValue){
            $bulk_option = $_POST['bulk_option'];
            
            switch($bulk_option){
                case 'published':
                    $query = "UPDATE posts SET post_status='$bulk_option' WHERE post_id=$checkBoxValue";
                    $result = mysqli_query($connect,$query);
                    if(!$result){
                        die('Query Failed'.mysqli_error($connect));
                    }
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status='$bulk_option' WHERE post_id=$checkBoxValue";
                    $result = mysqli_query($connect,$query);
                    if(!$result){
                        die('Query Failed'.mysqli_error($connect));
                    }
                    break;
                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id=$checkBoxValue";
                    $result = mysqli_query($connect,$query);
                    if(!$result){
                        die('Query Failed'.mysqli_error($connect));
                    }
                    break;
                case 'clone':
                    $query ="SELECT * FROM posts WHERE post_id=$checkBoxValue";
                    $result = mysqli_query($connect,$query);
                    while($row = mysqli_fetch_assoc($result)){
                        $post_id = $row ['post_id'];
                        $post_author = $row ['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row ['post_category_id'];
                        $post_status = $row ['post_status'];
                        $post_image = $row ['post_image'];
                        $post_tag = $row ['post_tag'];
                        $post_post_comment_count = $row ['post_comment_count'];
                        $post_date = $row ['post_date'];
                        $post_content = $row ['post_content'];
                    }
                    $clone_insert_query="INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag,post_status) VALUES ($post_category_id,'$post_title','$post_author',now(),'$post_image', '$post_content','$post_tag','$post_status')";
                    $clone_result=mysqli_query($connect,$clone_insert_query);                 break;
            }
        }
    }



?>
<form action="" method="post">
<table class="table table-bordered table-hover">
   <div id="buildOptionContainer">
      <div class="col-xs-4 form-group">
       <select name="bulk_option" id="selectAllBox" class="form-control">
           <option value="">Select Option</option>
           <option value="clone">Clone</option>
           <option value="published">Publish</option>
           <option value="draft">Draft</option>
           <option value="delete">Delete</option>
       </select>
       </div>
       <div class="form-group col-xs-2">
           <input type="submit" name="apply" value="Apply" class="btn btn-primary">
           <input type="submit" name="add_new" value="Add New" class="btn btn-success">
       </div>
   </div>
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Post View Count</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
<?php
    $query ="SELECT * FROM posts";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($result)){
        $post_id = $row ['post_id'];
        $post_author = $row ['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row ['post_category_id'];
        $post_status = $row ['post_status'];
        $post_image = $row ['post_image'];
        $post_tag = $row ['post_tag'];
        $post_post_comment_count = $row ['post_comment_count'];
        $post_view_count = $row ['post_view_count'];
        $post_date = $row ['post_date'];
        
        echo "<tr>";
        ?>
        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id ?>'></td>
        <?php
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";
        
        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
        $category_name = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($category_name)){
            $category_id = $row['cat_id'];
            $post_category_name = $row['cat_title'];
            echo "<td>{$post_category_name}</td>";
        }
        
        
        
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-responsive' width='100px' src='../images/{$post_image}'></td>";
        echo "<td>{$post_tag}</td>";
        
        $comment_count_query = "SELECT * FROM comment WHERE comment_post_id=$post_id";
        $comment_count_result = mysqli_query($connect,$comment_count_query);
        $comment_count = mysqli_num_rows($comment_count_result);
        
        echo "<td>{$comment_count}</td>";
        echo "<td><a href='post.php?reset=$post_id'>{$post_view_count}</a></td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a onclick=\"javaScript: return confirm('Are You Sure You Want To Delete') \" href='post.php?delete=$post_id'>Delete</a></td>";
        echo "<td><a href='post.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
        echo "</tr>";
    }
    
?>
    </tbody>
</table>
</form>
                       
<?php

    if(isset($_GET['delete'])){
        $delete_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = $delete_post_id";
        $result = mysqli_query($connect,$query);
        header('Location: post.php');
    }

    if(isset($_GET['reset'])){
        $reset_post_id = $_GET['reset'];
        $query = "UPDATE posts SET post_view_count=0 WHERE post_id=$reset_post_id";
        $result = mysqli_query($connect,$query);
        header('Location: post.php');
    }

?>
               