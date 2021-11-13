
<?php
    
    if(isset($_POST['submit'])){
			echo "Hello Green Hackers Students";
		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submit</title>
</head>
<body>
    <from action="" method="post">
        <input type="text" placeholder="User Name" name="username"><br><br>
        <input type="password" placeholder="Password" name="password"><br><br>
		<input type="submit" name="submit">
    </from>
</body>
</html>
