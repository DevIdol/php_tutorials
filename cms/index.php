<?php
    include_once "include/header.php";
    include_once "include/db.php";
?>
    <!-- Navigation -->
<?php include_once "include/nav.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                $par_page=5;
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else{
                    $page='';
                }
                if($page='' || $page=1){
                    $page_one=0;
                }else{
                    $page_one= ($page * 5) -5;
                }
    
                $post_count_query = "SELECT * FROM posts WHERE post_status='published'";
                $fine_count = mysqli_query($connect,$post_count_query);
                $count = mysqli_num_rows($fine_count);
                $count = ceil($count/5);
            
                $query ="SELECT * FROM posts WHERE post_status='published' LIMIT $page_one,$par_page";
                $result = mysqli_query($connect,$query);

                if(!$result){
                    die('Query Failed ' . mysqli_error($result));
                }

                while($row = mysqli_fetch_assoc($result)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,200);
            ?>
                   <h2>
                        <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    </a>
                    
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
            <?php
                    }
    
            ?>
                <!-- Blog Post -->
            <ul class="pager">
                <?php
                    for($i=1;$i<=$count;$i++){
                        if($i == $page){
                            echo "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";	    
                        }else{
                            echo "<li><a href='index.php?page=$i'>$i</a></li>";	
                        }

                        
                    }
                
                
                ?>
            </ul>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

<?php include_once "include/sidebar.php" ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include_once "include/footer.php"; ?>