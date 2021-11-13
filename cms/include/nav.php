
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Beautiful CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php
                  $query = "SELECT * FROM categories";
                  $result = mysqli_query($connect,$query);
                    
                  if(!$result ){
                      die("Query Failed " . mysqli_error($connect));
                  }

                while($row = mysqli_fetch_assoc($result)){
                    $cat_id=$row['cat_id'];
                    $cat_title = $row['cat_title'];
                ?>
                   
                    <li>
                        <a href="#"><?php echo $cat_title ?></a>
                    </li>
                 <?php   
                }
                ?>
                   <li><a href="admin/index.php">Admin</a></li>
                   <li><a href="registration.php">Register</a></li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>