<?php
    if(isset($_POST["update"])){
        

        //connection to db
        include("connection.php");

        
        $id = $_GET['updateid']; 
        $pname=$_POST["productname"];
        $pprice=$_POST["productprice"];
        $pcategory=$_POST["productcategory"];
        if(empty($pcategory)) {
            $pcategory = $oldcategory; 
        }


        if(!empty($_FILES["uploadfile"]["name"])) {

            $filename =  $_FILES["uploadfile"]["name"];
            $tempname =  $_FILES["uploadfile"]["tmp_name"];
            $folder="images/".$filename;
            move_uploaded_file($tempname,$folder);
            //Update statement
            $sql="UPDATE product SET id='$id',name='$pname',price='$pprice',category='$pcategory',image='$folder' where id=$id";
        }
        else {
            $sql="UPDATE product SET id='$id',name='$pname',price='$pprice',category='$pcategory' where id=$id";
        }

        //executing the query
        $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
        if($qry)
        {
            header("Location: adminoperations.php");
        }
    }
?>

<?php 
    if(isset($_GET['updateid'])) {
        session_start();
        // echo "Welcome ".$_SESSION ['username'];
        echo "<div class='secondadmindiv'>Welcome ".$_SESSION['username']."</div>";
        if($_SESSION['username'] != null ){

        }
        else{
          header("location:login.php");
        }
        $id = $_GET['updateid'];
        $sql = "SELECT * FROm product WHERE id=$id";
        include("connection.php");
        $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($qry);
        $oldname = $row['name'];
        $oldprice = $row['price'];
        $oldcategory = $row['category'];
        $oldimage = $row['image'];
    }
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="css/adminoperations.css" rel="stylesheet">

        <!-- <link href="css/adminoperations.css" rel="stylesheet"> -->
    </head>
    <body style="background: linear-gradient(to right, #cfe2f3, #a4c7e3);">    
        <form method="post" action="" name="category" enctype="multipart/form-data" class="addingproduct">
            <!-- //<div class="form-container"> -->
                <fieldset class="card field">
                    <legend>Add product</legend>
                    <label>Product Name</lable><br>
                    <input type="text" name="productname" value="<?php 
                        echo $oldname;
                    ?>" >
                    <br>
                    <label>Product price</lable><br>
                    <input type="text" name="productprice" value="<?php
                        echo $oldprice;
                    ?>">
                    <br>


                    <label> Update Category</lable><br>
                    <input type="radio" name="productcategory" value="Fiction" <?php 
                    if($oldcategory == 'Fiction') {
                        echo 'checked';
                    }
                    else{
                        echo '';

                    }
                    ?>> <!-- Checks if the old value is Fiction and stores the value if true oterwise returns a null value -->
                    <label>Fiction</label><br>
                    <input type="radio" name="productcategory" value="Thriller" <?php 
                    if($oldcategory == 'Thriller') {
                        echo 'checked';
                    }
                    else{
                        echo '';

                    }
                    ?>>
                    <label>Thriller</label><br>
                    <input type="radio" name="productcategory" value="Biography" <?php 
                    if($oldcategory == 'Biography') {
                        echo 'checked';
                    }
                    else{
                        echo '';

                    }
                    ?> >
                    <label>Biography</label><br>
                    <input type="radio" name="productcategory" value="History" <?php 
                    if($oldcategory == 'History') {
                        echo 'checked';
                    }
                    else{
                        echo '';

                    }
                    ?>>
                    <label>History</label><br><br>
                    <label>Old Image</label><br>
                    <img src='<?php
                    echo $oldimage?>' height='100px' width='100px'
                    ><br> 

                    <label>Image to upload :</label><br>
                    <input type="file" name="uploadfile">

                    <input type="submit" name="update" value="update">
                </fieldset>
            <!-- </div> -->
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    </body>
</html>