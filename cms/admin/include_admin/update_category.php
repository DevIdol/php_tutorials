<?php
                            if(isset($_POST['edit'])){
//                                $cat_id = $_GET['edit'];
                                $cat_title = $_POST['cat_title'];
                                $query ="UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$cat_id";
                                $result = mysqli_query($connect,$query);
                                if(!$result){
                                    die('Query Failed'.mysqli_error($result));
                                }
                            }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="" class="control-label">Edit Category</label>
                        <!-- edit php code-->
                        <?php
                            if(isset($_GET['edit'])){
                                $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
                                $result = mysqli_query($connect,$query);
                                if(!$result){
                                    die('Query Failed'.mysqli_error($result));
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                        ?>
                        <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?>">
                        <?php
                                }
                            }
                        ?>
                                
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Category" name="edit">
                            </div>
                        </form>