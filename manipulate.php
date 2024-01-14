
<?php
    if(isset($_POST["submit"])){
        
        $filename =  $_FILES["uploadfile"]["name"];
        $tempname =  $_FILES["uploadfile"]["tmp_name"];
        $folder="images/".$filename;
        move_uploaded_file($tempname,$folder);

        //capturing the data
        $pname=$_POST["productname"];
        $pprice=$_POST["productprice"];
        $pcategory=$_POST["productcategory"];
        //  $pimage=$_POST["imagefile"];

        //Insert statement
        $sql="INSERT INTO product(name, price, category,image)
        VALUES('$pname', '$pprice', '$pcategory','$folder')";

        //connection to db
        include("connection.php");

        //executing the query
        $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
        if($qry){
            echo"<h1>Data Inserted</h1>";
        }
    }
?>




<?php
        session_start();
        echo "Welcome ".$_SESSION['username'];

        if($_SESSION['username'] != null ){

        }
        else{
          header("location:login.php");
        }
        
        echo "<table border=1; padding:100px>";
        echo "<tr><th>ID</th> <th>Image</th> <th>Product Name</th> <th>Price</th> <th>Category</th> <th>Update/Delete</th></tr>";

      //  if(isset($_POST['submit']) && isset($_POST['sort'])) {
         //   $search = $_POST['search'];
         //   $sort = $_POST['price'];
          //  $sql = "SELECT * FROM product WHERE name LIKE '%$search%'
           // OR category LIKE '%$search%' ORDER BY price $sort";
       // }
        // $search = trim($_POST['txtsearch']);
        // $valprice = $_POST['bookprice'];
        // $bookcategory = $_POST['genre'];

        $search = isset($_POST['txtsearch']) ? trim($_POST['txtsearch']) : "";
        $valprice = isset($_POST['bookprice']) ? $_POST['bookprice'] : "";
        $bookcategory = isset($_POST['genre']) ? $_POST['genre'] : "";
        

        $sql = "SELECT * FROM product WHERE (name LIKE '%$search%'
        OR category LIKE '%$search%' OR price LIKE '%$search%')";

        if(!empty($valprice)) {
            $sql .= " ORDER BY price $valprice"; 
        }

        if(!empty($bookcategory)) {
            $sql .= " AND category = '$bookcategory'";
        }

       
 
        //connection to db
        include("connection.php");

        //executing the query
        $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($qry)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td><img src='".$row['image']." 'height='100px' width='100px'></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['category']."</td>";
            $id = $row['id'];
            echo '<td><button><a href="Updatedata.php?updateid='.$id.'">Update</a></button>
            <button><a href="?deleteid='.$id.'">Delete</a></button></td>';
           echo "</tr>";
        }
        echo "</table>";
        
?>

<!-- 
$id = $row['id'];
            echo '<td><button><a href="Updatedata.php?updateid='.$id.'">Update</a></button>
            <button><a href="?deleteid='.$id.'">Delete</a></button></td>';
           echo "</tr>"; -->
<form method="post" action="" name="category" enctype="multipart/form-data">
    <fieldset>
        <legend>Add product</legend>
        <label>Product Name</lable><br>
        <input type="text" name="productname" >
        <br>
        <label>Product price</lable><br>
        <input type="text" name="productprice" >
        <br>
        <label>Category</lable><br>
        <input type="radio" name="productcategory" value="Fiction">
        <label>Fiction</label><br>
        <input type="radio" name="productcategory" value="Thriller">
        <label>Thriller</label><br>
        <input type="radio" name="productcategory" value="Biography">
        <label>Biography</label><br>
        <input type="radio" name="productcategory" value="History">
        <label>History</label><br><br>


        <label>Image to upload :</label><br>
        <input type="file" name="uploadfile"><br>

        <input type="submit" name="submit" value="Insert">
        
    </fieldset>
</form>

<?php 
    include("connection.php");
    //getting the deleteid from url
    if(isset($_GET['deleteid'])) {

        //storing the id in a variable
        $id = $_GET['deleteid'];

        $sql = "DELETE from product where id=$id";

        $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        if($qry) {
            header('Location:manipulate.php');
        }
    }
    
?>

<form method="post" action="" enctype="multipart/form-data">
    <label>Search</label>
    <input type="text" name="txtsearch">

    <label>Select Price</label>
    <select name="bookprice">
        <option value="">Select</option>
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>

    <label>Select category</label>
    <select name="genre">
        <option value = "">Select</option>
        <option value="Fiction">Fiction</option>
        <option value="Thriller">Thriller</option>
        <option value="Biography">Biography</option>
        <option value="History">History</option>
    </select>
    <input type="Submit" name="search" value="Search">
</form>

<?php 
echo '<a href="adminhomepage.php">Return to Home page</a>';
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>


