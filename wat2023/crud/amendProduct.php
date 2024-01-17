
<?php
if(isset($_GET['id'])) {
    $updateid = $_GET['id'];
    $sql = "SELECT * FROm products WHERE productid=$updateid";
    include("Connection.php");
    $qry = mysqli_query($connection,$sql) or die(mysqli_error($connection));
    $row = mysqli_fetch_array($qry);
    $oldname = $row['productname'];
    $oldprice = $row['productprice'];
    $oldimage = $row['productimagename'];
}
?>

<form action="updateProduct.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Enter New Product Details</legend>

        <input type="hidden" name="updateid" value="<?php echo $updateid; ?>">
        <label>Product Name:<label><br>
        <input type="text" name="productname" value="<?php
            echo $oldname;
        ?>"><br><br>
        <label>Price:<label><br>
        <input type="text" name="productprice" value="<?php
            echo $oldprice
        ?>"><br><br>
         <label>Old Image</label><br>
        <img src='<?php
         echo $oldimage?>' height='100px' width='100px'
         ><br> 

        <label>Image to upload :</label><br>
        <input type="file" name="uploadfile"><br>

        <input type="submit" name="update" value="update">
        <input type="Reset" value="Clear">
    </fieldset>
</form>