<?php
//Make connection to database
include 'connection.php';
//(a)Gather from $_POST[]all the data submitted and store in variables
if(isset($_POST['submit'])) {
    
    $productname=$_POST['productname'];
    $productprice=$_POST['productprice'];

    $filename =  $_FILES["filename"]["name"];
    $tempname =  $_FILES["filename"]["tmp_name"];
    $folder="images/".$filename;
    move_uploaded_file($tempname,$folder);


//(b)Construct INSERT query using variables holding data gathered
$query="INSERT INTO products (productname,productprice,productimagename) VALUES
 ('$productname','$productprice','$folder')";

if(mysqli_query($connection,$query)){
    header("Location:crud.php");
}
else{
    echo "Query could not be executed".mysqli_error($connection);
}


   

    }
		
?>
