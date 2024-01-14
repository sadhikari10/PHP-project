<?php 
    session_start();
    echo "Welcome ".$_SESSION ['username'];
    if($_SESSION['username'] != null ){

    }
    else{
      header("location:login.php");
    }
    echo "<br>";
    echo '<a href="manipulate.php">Make Changes</a>';
    echo "<br>";
    echo '<a href="logout.php">Logout</a>';
   
?>