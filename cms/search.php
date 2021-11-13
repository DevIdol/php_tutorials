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
                if(isset($_POST['search'])){
                    $search = $_POST['search'];
                    $query ="SELECT * FROM posts WHERE post_tag LIKE '%$search%' ";
                    $result = mysqli_query($connect,$query);
                    if(!$result){
                        die('Query Failed' . mysqli_error($connect));
                    }

                    $count = mysqli_num_rows($result);
                    if($count > 0){

                        if(!$result){
                            die('Query Failed ' . mysqli_error($result));
                        }

                        while($row = mysqli_fetch_assoc($result)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                    ?>
                            
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
            <?php
                    }
                    }else{
                        echo "<h1>No Result</h1>";
                    }
                    }
    
            ?>

                <!-- Blog Post -->
                
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
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