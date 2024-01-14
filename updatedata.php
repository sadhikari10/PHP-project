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
            header("Location: manipulate.php");
        }
    }
?>

<?php 
    if(isset($_GET['updateid'])) {
        session_start();
        echo "Welcome ".$_SESSION ['username'];
        if($_SESSION['username'] != null ){

        }
        else{
          header("location:login.php");
        }
        $id = $_GET['updateid'];
        $sql = "SELECT * FROm product WHERE id=$id";
        include("Connection.php");
        $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($qry);
        $oldname = $row['name'];
        $oldprice = $row['price'];
        $oldcategory = $row['category'];
        $oldimage = $row['image'];
    }
?>
<link href="css/register.css" rel="stylesheet">
<form method="post" action="" name="category" enctype="multipart/form-data">
    <div class="form-container">
    <fieldset class="field-container">
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
    </div>
</form>