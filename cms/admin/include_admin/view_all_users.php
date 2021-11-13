<div class="col-xs-12">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $query ="SELECT * FROM users";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            
            echo "<td><a href='users.php?admin=$user_id'> Admin</a></td>";
            echo "<td><a href='users.php?subscriber=$user_id'> Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&edit=$user_id'>Edit</a></td>";
            echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
        </tbody>
    </table>
</div>
<?php
    if(isset($_GET['admin'])){
        $the_user_id = $_GET['admin'];
        $query = "UPDATE users SET user_role='admin' WHERE user_id=$the_user_id";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        header('Location: users.php');
    }


    if(isset($_GET['subscriber'])){
        $the_user_id = $_GET['subscriber'];
        $query = "UPDATE users SET user_role='subscriber' WHERE user_id=$the_user_id";
        $result = mysqli_query($connect,$query);
        if(!$result){
            die('Query Failed'.mysqli_error($connect));
        }
        header('Location: users.php');
    }



    if(isset($_GET['delete'])){
        
        if(isset($_SESSION['user_role'])){
            $the_user_id = mysqli_real_escape_string($connect,$_GET['delete']);
            $query = "DELETE FROM users WHERE user_id=$the_user_id";
            $result = mysqli_query($connect,$query);
            if(!$result){
                die('Query Failed'.mysqli_error($connect));
            }
            header('Location: users.php');    
            }
        
    }


?>