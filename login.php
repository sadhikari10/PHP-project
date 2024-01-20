<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="form-container">
        <form name="login.php" method="post" enctype="multipart/form-data">
            <fieldset class="field-container">
                <legend>Login</legend>
                <label>Username : </label><br>
                <input type="text" name="username" value = "<?php
                    if(isset($_POST['username'])) { 
                        echo $_POST['username'];
                    }
                ?>"><br>
                <label>Password : </label><br>
                <input type="password" name="password" value = "<?php
                    if(isset($_POST['password'])) { 
                        echo $_POST['password'];
                    }
                ?>"><br>
                <label>Select role</label>
                <select name="role" id="role" required>
                    <option>Select </option>
                    <option value="Admin" <?php 
                        if(isset($_POST['role']) && $_POST['role'] == 'Admin'){
                            echo 'selected';
                        }
                    ?>>Admin</option>
                    <option value="User" <?php 
                        if(isset($_POST['role']) && $_POST['role'] == 'User'){
                            echo 'selected';
                        }
                    ?>>User</option>
                </select><br>
                <input type="Submit" name="Login" value="Login">
                
            </fieldset>
            
        </form>
    </div>
    <div class='homediv'>
        <a href='index.php'>Homepage</a>
    </div>
<?php
    if(isset($_POST["Login"])) {
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
        $role = $_POST["role"];
        if(empty($username)){
            echo "<div class='error'>Please fill out the username</div>";
        }
        elseif(empty($password)){
            echo "<div class='error'>Please fill out the password</div>";
        }
        elseif(empty($role)){
            echo "<div class='error'>Please fill out the role</div>";
        }
        else{
            if($role =="Admin"){
                include("connection.php");
                $sql = "SELECT * from admin"; 
                $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($qry)){
                    $dataname =  $row['username'];
                    $datapassword = $row['password'];
                    if($dataname == $username && $datapassword == md5($password)){
                        //username=admin
                        //password=admin123
                        session_start();
                        $_SESSION['username'] = $dataname;
                        header("location:adminhomepage.php");
                        break;
                    }
                    else {
                        echo "<div class='error'>Invalid username or password</div>";
                    }
                }        
            }   

            if($role == "User"){
                include("connection.php");
                $sql = "SELECT * from register";          
                $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                while($row=mysqli_fetch_array($qry)){
                    $dataname =  $row['username'];
                    $datapassword = $row['password'];
                    if($dataname == $username && $datapassword == md5($password)){  
                        session_start();
                        $_SESSION['username'] = $dataname;
                        header("location:userdisplay.php");
                            break;
                        }
                        else {
                            echo "<div class='error'>Invalid username or password</div>";
                        }
                }   
            }
        }
    }    
?>
<footer class="footer">
    <p>Copyright @ 2024 Sushant Adhikari. All Rights Reserved</p>
</footer> 
</body>
</html>