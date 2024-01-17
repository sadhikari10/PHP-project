<?php 
    include('init.php');
    if(isset($_POST['subLogin'])) {
        $name = $_POST['txtUser'];
        $password = $_POST['txtPass'];

        $sql = "SELECT * FROM users where username = '$name' AND password = '$password' ";

        $qry = mysqli_query($connection,$sql) or die(mysqli_error($connection));

        if($row = mysqli_fetch_assoc($qry)) {
           $_SESSION['user']=$name;
           header('location:sessions.php');
        }
        else {
            $_SESSION['error'] = 'User not recognized';
            header('location:sessions.php');
        }
    }

?>