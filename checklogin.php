
<?php
function checkLogin($user, $pass,$role){
        $admin = "admin";
        $adminpass = "admin123";
        $user_role = "Admin";

        if($admin == $user && $adminpass == $pass && $user_role == $role){
            header("Location:admin.php");
            exit();
        }
        else{
            header("Location:login.php?msg=Credentials not valid");
            exit();
        }
    }
?>