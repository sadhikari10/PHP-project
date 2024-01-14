<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $age_range = $_POST["age"];
    $address = trim($_POST["address"]);
    $phone_number = trim($_POST["phonenumber"]);


    if(empty($username)) {
        echo "Please fill out the username";
    }

    elseif(strlen($username) <6) {
        echo "Username must have at least 6 characters.";
    }
    
    elseif(empty($pass)) {
        echo "Please enter a password";
    }

    elseif (!preg_match('/(?=.*[a-z])/', $pass)) {
        echo "The password must contain one lowercase letter.";
    }

    elseif (!preg_match('/(?=.*[A-Z])/', $pass)) {
        echo "The password must contain one uppercase letter.";
    }
 
    elseif (!preg_match('/(?=.*\d)/', $pass)) {
        echo "The password must contain one number.";
    }

    elseif(empty($address)) {
        echo "Please enter your address";
    }

    elseif(empty($phone_number)) {
        echo "Please enter your phone number";
    }

    elseif(empty($age_range)) {
        echo "Please select your age range";
    }

    elseif(empty($email)) {
        echo "Please enter your email";
    }

    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "Email must be in  @gmail.com format";
    }

    elseif(!isset($_POST["terms"])) {
        echo "Please check the terms and conditions box before processing";
    }

    else {
        $password = md5(trim($_POST["password"]));
        include('Connection.php');
        $sql = "INSERT INTO register(username, password,email, age, address,phonenumber) 
        VALUES('$username','$password','$email','$age_range','$address','$phone_number')";
        $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($qry) {
            header("Location:homepage.php");
            exit();
        }
        else {
            header("Location:register.php");
        }
    }
}
?>

