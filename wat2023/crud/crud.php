<h1>Manage Products</h1>
<?php 
    include 'displayProducts.php';
?>
<form action="insertProduct.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Enter New Product Details</legend>
        <label>Product Name:<label><br>
        <input type="text" name="productname"><br><br>
        <label>Price:<label><br>
        <input type="text" name="productprice"><br><br>
        <label>Image Filename:</label><br>
        <input type="file" name="filename"><br><br>
        <input type="Submit" name="submit" value="Submit">
        <input type="Reset" value="Clear">
    </fieldset>
</form>
<?php
    echo "<br><a href='../watIndex.html'>Return to Portfolio</a>";
?>