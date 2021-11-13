<div class="col-xs-12">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In Responsive To</th>
                <th>Date</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $query ="SELECT * FROM comment";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        while($row = mysqli_fetch_assoc($result)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
            
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
            $select_post_id_query = mysqli_query($connect,$query);
            if(!$select_post_id_query){
                die('Query Failed'.mysqli_error($connect));
            }
            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            }

            echo "<td>{$comment_date}</td>";
//            $query = "SELECT * FROM categories WHERE cat_id=$post_category";
//            $category = mysqli_query($connect,$query);
//            if(!$category){
//                die('Query Failed'.mysqli_error($category));
//            }
//            while($row = mysqli_fetch_assoc($category)){
//                $cat_id = $row['cat_id'];
//                $cat_title = $row ['cat_title'];
//                echo "<td>{$cat_title}";
//
//            }
//            echo "<td>{$post_category}</td>";
            
            echo "<td><a href='comment.php?approved=$comment_id'> Approve</a></td>";
            echo "<td><a href='comment.php?unapproved=$comment_id'> Unapprove</a></td>";
            echo "<td><a href='comment.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</div>
<?php
    if(isset($_GET['unapproved'])){
        $comment_id = $_GET['unapproved'];
        $query = "UPDATE comment SET comment_status='unapproved' WHERE comment_id=$comment_id";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        header('Location: comment.php');
    }


    if(isset($_GET['approved'])){
        $comment_id = $_GET['approved'];
        $query = "UPDATE comment SET comment_status='approved' WHERE comment_id=$comment_id";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        header('Location: comment.php');
    }



    if(isset($_GET['delete'])){
        $comment_id = $_GET['delete'];
        $query = "DELETE FROM comment WHERE comment_id=$comment_id";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        header('Location: comment.php');
    }


?>