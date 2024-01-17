<h3>Login</h3>
<?php 
    include('init.php');
    if($_SESSION['user'] != null){
        echo "Welcome".$_SESSION['user'];
        echo "<a href='protected.php'>protected page</a>";
        echo "<a href='logout.php'>Logout </a>";
    }
    else {
        header("location:loginform.php");
        echo $_SESSOIN['error'];
    }
?>