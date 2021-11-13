<?php 
    include_once "include_admin/admin_header.php"; 
    include_once "include_admin/function.php";
?>
    <div id="wrapper">

        <!-- Navigation -->
<?php include_once "include_admin/admin_nav.php"; ?>

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
                    <div class="col-xs-6">
                       <?php
                            insert_category();
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="" class="control-label">Category Name</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Create Category" name="submit">
                            </div>
                        </form>
                        <br><br>
                        
                    <?php
                      
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include_once "include_admin/update_category.php";
                        }
                    ?>
                        
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $query ="SELECT * FROM categories";
                              $result = mysqli_query($connect,$query);
                              if(!$result){
                                  die('Query Failed' . mysqli_error($connect));
                              }
                              while($row = mysqli_fetch_assoc($result)){
                                  $cat_id = $row['cat_id'];
                                  $cat_title = $row ['cat_title'];
                                  echo "<tr>";
                                  echo "<td>{$cat_id}</td>";
                                  echo "<td>{$cat_title}</td>";
                                  echo "<td><a href='admin_categories.php?edit=$cat_id'>Edit</a></td>";
                                  echo "<td><a href='admin_categories.php?delete=$cat_id'>Delete</a></td>";
                                  echo "</tr>";
                              }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

<?php include_once "include_admin/admin_footer.php"; ?>
<?php
  delete_category();
?>