<?php include_once "include_admin/admin_header.php"; ?>
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
                    <?php
                        if(isset($_GET['source'])){
                            $source=$_GET['source'];
                        }else{
                            $source = '';
                        }
                        
                        switch($source){
                            case 'add_post':
                            include_once "include_admin/add_post.php";
                            break;
                                
                            case 'edit_post':
                            include_once "include_admin/edit_post.php";
                            break;
                                
                            case '200':
                            echo 'Nice Value 200';
                            break;
                                
                            default:
                            include_once 'include_admin/view_all_post.php';
                        }
                    
                    ?>
                    
                </div>
                <!-- /.row -->

<?php include_once "include_admin/admin_footer.php"; ?>