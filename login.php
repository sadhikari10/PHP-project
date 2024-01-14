<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form name="login.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Login</legend>
            <label>Username : </label><br>
            <input type="text" name="username"><br>
            <label>Password : </label><br>
            <input type="password" name="password"><br>
            <select name="role" id="role" required>
                <option>Select </option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select><br>
            <input type="Submit" name="Login" value="Login">
        </fieldset>
    </form>
    <?php
    if(isset($_POST["Login"])) {
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
        $role = $_POST["role"];
        if(empty($username)){
            echo "Please fill out the username";
        }
        elseif(empty($password)){
            echo "Please fill out the password";
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
                        session_start();
                        $_SESSION['username'] = $dataname;
                        header("location:Manipulate.php");
                        break;
                    }
                    else {
                        echo "Invalid username or password";
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
                        echo "Invalid username or password";
                    }
                }   
            }
        }
    }
    ?>
</body>
</html>