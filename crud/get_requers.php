<?php
  print_r($_GET);
    $id= 10;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Request</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               <form action="" method="get">
                    <a href="get_requers.php?id=<?php echo $id ?>">Click Here</a>       
               </form>
           </div>
       </div>
   </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>