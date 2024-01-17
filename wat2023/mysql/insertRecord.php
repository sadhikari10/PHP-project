<?php
//Make connection to database
include 'connection.php';
//(a)Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];


//(b)Construct INSERT query using variables holding data gathered
$query="INSERT INTO customer (FirstName, LastName, Email,Password,Gender,Age) VALUES
 ('$firstname', '$surname','$email','$password','$gender','$age')";

 //echo $query;
 //exit();


    
//Temporarily echo $query for debugging purposes	
 //   echo "Firstname : $firstname <br>";
 //   echo "Surname : $surname <br>";
 //   echo "Email : $email <br>";
  //  echo "Password : $password <br>";
 //   echo "Gender : $gender <br>";
   // echo "Age : $age <br>";

//run $query
   if(mysqli_query($connection,$query)) {
        echo "Record inserted successfully.";
   }
   else{
        echo "ERROR: Could not able to execute ".mysqli_error($connection);
   }


    } echo "<br><a href='../watIndex.html'>Return to Portfolio</a>";
		
?>
