<?php
    if(isset($_POST['update'])){

        //connection to db
        include("Connection.php");

        $updateid = $_POST['updateid']; 
        //$updateid = isset($_POST['id']) ? $_POST['id'] : null;
        //capturing the data
        $pname=$_POST["productname"];
        $pprice=$_POST["productprice"];

        if(!empty($_FILES["uploadfile"]["name"])) {

            $filename =  $_FILES["uploadfile"]["name"];
            $tempname =  $_FILES["uploadfile"]["tmp_name"];
            $folder="images/".$filename;
            move_uploaded_file($tempname,$folder);

            //Update statement
            $sql="UPDATE products SET productid='$updateid',productname='$pname',productprice='$pprice',productimagename='$folder' where productid=$updateid";
        }
        else {
            $sql="UPDATE products SET productid='$updateid',productname='$pname',productprice='$pprice' where productid=$updateid";
        }
        //executing the query
        $qry=mysqli_query($connection, $sql)or die(mysqli_error($connection));
        if($qry)
        {
            header("Location:crud.php");
        }
    }
?>
