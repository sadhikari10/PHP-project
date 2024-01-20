<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link href="css/register.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <div class="form-container">
        <form action="" method="post"enctype="multipart/form-data">
            <fieldset class="field-container">
                <legend>User Registration Form</legend>
                <label>Username :</label><br>
                <input type="text" name="username" value = "<?php
                    if(isset($_POST['username'])) { 
                        echo $_POST['username'];
                    }
                ?>"><br>
                <label>Password :</label><br>
                <input type="password" name="password" value = "<?php
                    if(isset($_POST['password'])) { 
                        echo $_POST['password'];
                    }
                ?>"><br>
                <label>Email :</label><br>
                <input type="text" name="email" value = "<?php
                    if(isset($_POST['email'])) { 
                        echo $_POST['email'];
                    }
                ?>"><br>
                <label>Select your age range: </label><br>
                <select name="age" id="agerange">
                    <option value="" <?php 
                        if(!isset($_POST['age']) || empty($_POST['age'])){
                            echo 'selected';
                        }
                        else{
                            echo '';
                        }
                    ?>>Select an age range</option>
                    <option value="1-14" <?php 
                        if(isset($_POST['age']) && $_POST['age'] == '1-14'){
                            echo 'selected';
                        }
                    ?>>1-14</option>
                    <option value="15-24" <?php 
                        if(isset($_POST['age']) && $_POST['age'] == '15-24'){
                            echo 'selected';
                        }
                    ?>>15-24</option>
                    <option value="25-64" <?php 
                        if(isset($_POST['age']) && $_POST['age'] == '25-64'){
                            echo 'selected'; //dynamically mark the option as selected in case these are previously selected
                        }
                    ?>>25-64</option>
                    <option value="65-100" <?php 
                        if(isset($_POST['age']) && $_POST['age'] == '65-100'){
                            echo 'selected';
                        }
                    ?>>65-100</option>
                </select><br>
                <label>Address :</label><br>
                <input type="address" name="address" value = "<?php
                    if(isset($_POST['address'])) { 
                        echo $_POST['address'];
                    }
                ?>"><br>
                <div>
                    <input type="checkbox" name="terms" <?php
                    if(isset($_POST['terms'])){
                        echo 'checked';
                    }
                    ?>>
                    <label>Terms and Conditions</label><br>
                </div>
                <input type="Submit" name="Submit">
            </fieldset>
        </form>
    </div>
    <div class='homediv'>
        <a href='index.php'>Homepage</a>
    </div>
</body>
</html>
<?php 
    if (isset($_POST['Submit'])) {
        $username = trim($_POST["username"]);
        $pass = trim($_POST["password"]);
        $email = trim($_POST["email"]);
        $age_range = $_POST["age"];
        $address = trim($_POST["address"]);
        if(empty($username)) {

            echo "<div class='error'>Please fill out the username</div>";
        }

        elseif(strlen($username) <6) {
            echo "<div class='error'>Username should contain at lest 6 letters</div>";
        }

        elseif(empty($pass)) {
            echo "<div class='error'>Password field is required</div>";
        }

        elseif (!preg_match('/(?=.*[a-z])/', $pass)) {
            echo "<div class='error'>Password must contain one lowercase letter</div>";
        }

        elseif (!preg_match('/(?=.*[A-Z])/', $pass)) {
            echo "<div class='error'>Password must contain one uppercase letter</div>";
        }
    
        elseif (!preg_match('/(?=.*\d)/', $pass)) {
            echo "<div class='error'>Password must contain one number</div>";
        }

        elseif(empty($email)) {
            echo "<div class='error'>Email field is empty. Pease provide an email</div>";
        }

        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "<div class='error'>Email does not have  @gmail.com format</div>";
        }

        elseif(empty($age_range)) {
            echo "<div class='error'>Age range is not selected</div>";
        }

        elseif(empty($address)) {
            echo "<div class='error'>Address field is empty</div>";
        }

        elseif(!isset($_POST["terms"])) {
            echo "<div class='error'>Terms and conditions box has not been checked.</div>";
        }

        else {
            $password = md5(trim($_POST["password"]));
            include('connection.php');
            $sql = "INSERT INTO register(username, password,email, age, address) 
            VALUES('$username','$password','$email','$age_range','$address')";
            $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            if($qry) {
                header("Location:index.php");
                exit();
            }
            else {
                header("Location:register.php");
            }
        }
    }
?>
<footer class="footer">
        <p>Copyright @ 2024 Sushant Adhikari. All Rights Reserved</p>
</footer>




