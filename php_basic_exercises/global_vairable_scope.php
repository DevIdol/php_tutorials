<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Global Variable and Scope</title>
</head>
<body>
    <?php
        $x = "outsite";
        function scope(){
            global $x;
             //$x = "insite";
            echo $x;
        }
        echo $x;
        echo "<br>";
        scope();
    
    ?>
</body>
</html>