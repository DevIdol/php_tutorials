<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array Function</title>
</head>
<body>
    <?php
        $count = [15,78,58,98,67,96,32,54,69,7];
        
        echo max($count);
        echo '<br>';
        echo min($count);
        echo "<br>";
        echo "<pre>";
        echo print_r($count);
        echo "</pre>";
        sort($count);
        echo "<br>";
        print_r($count);
        
    
    
    ?>
</body>
</html>