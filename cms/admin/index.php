<?php include_once "include_admin/admin_header.php"; ?>
    <div id="wrapper">
    <?php
      $session = session_id();
      $time = time();
      $session_user_time_out = 60;
      $time_out = $time - $session_user_time_out;
        
        $query = "SELECT * FROM user_online WHERE session='$session'";
        $result = mysqli_query($connect,$query);
        $user_count = mysqli_num_rows($result);
        if($user_count == NULL){
            mysqli_query($connect,"INSERT INTO user_online(session, time) VALUES ('$session' ,$time)");
        }else{
            mysqli_query($connect,"UPDATE user_online SET session='$session', time=$time WHERE session='$session'");
        }
        $userOnline_query = mysqli_query($connect,"SELECT * FROM user_online WHERE time>$time_out");
        $useronline_count = mysqli_num_rows($userOnline_query);
    ?>

        <!-- Navigation -->
<?php include_once "include_admin/admin_nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>
                               <?php echo $_SESSION['username'];?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                           
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                      $active_query = "SELECT * FROM posts WHERE post_status='published'";
                      $active_result = mysqli_query($connect,$active_query);
                      if(!$active_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $active_post_count=mysqli_num_rows($active_result);
                        
                        
                    $draft_query = "SELECT * FROM posts WHERE post_status='draft'";
                      $draft_result = mysqli_query($connect,$draft_query);
                      if(!$draft_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $draft_post_count=mysqli_num_rows($draft_result);
                        $total_post_count = $active_post_count +$draft_post_count;
                        
                        echo "<div class='huge'>{$total_post_count}</div>";
                    ?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                      $unapproved_query = "SELECT * FROM comment WHERE comment_status='unapproved'";
                      $unapproved_result = mysqli_query($connect,$unapproved_query);
                      if(!$unapproved_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $unapproved_comment_count=mysqli_num_rows($unapproved_result);
                        
                        
                      $approved_query = "SELECT * FROM comment WHERE comment_status='approved'";
                      $approved_result = mysqli_query($connect,$approved_query);
                      if(!$approved_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $approved_comment_count=mysqli_num_rows($approved_result);
                        $total_comment = $unapproved_comment_count + $approved_comment_count;
                        echo "<div class='huge'>{$total_comment}</div>";
                    ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                      $admin_query = "SELECT * FROM users WHERE user_role='admin'";
                      $admin_result = mysqli_query($connect,$admin_query);
                      if(!$admin_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $admin_user_count=mysqli_num_rows($admin_result);
                        
                     $subscriber_query = "SELECT * FROM users WHERE user_role='subscriber'";
                      $subscriber_result = mysqli_query($connect,$subscriber_query);
                      if(!$subscriber_result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $subscriber_user_count=mysqli_num_rows($subscriber_result);
                        $total_user_count= $admin_user_count +$subscriber_user_count;
                        echo "<div class='huge'>{$total_user_count}</div>";
                    ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                      $query = "SELECT * FROM categories";
                      $result = mysqli_query($connect,$query);
                      if(!$result){
                          die('Query Faile'.mysqli_error($connect));
                      }
                        $categories_count=mysqli_num_rows($result);
                        echo "<div class='huge'>{$categories_count}</div>"
                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="admin_categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                </div>
<div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Count'],
          ["Active Post", <?php echo $active_post_count; ?>],
          ["Draft Post", <?php echo $draft_post_count; ?>],
          ["Approved Comments", <?php echo $approved_comment_count; ?>],
          ["Unapproved Comments", <?php echo $unapproved_comment_count; ?>],
          ["Admin", <?php echo $admin_user_count; ?>],
          ["Subscriber", <?php echo $subscriber_user_count; ?>],
          ["Categories", <?php echo $categories_count; ?>],
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by Count' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
</div>

<?php include_once "include_admin/admin_footer.php"; ?>