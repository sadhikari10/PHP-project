
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
        session_start();
        echo "Welcome ".$_SESSION['username'];

        if($_SESSION['username'] != null ){

        }
        else{
          header("location:login.php");
        }
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
        echo "<div class = 'firstcontainer container'>";

        while($row=mysqli_fetch_array($qry)){
            echo ' <div class="card product">';
            echo ' <div class="productInfo">';
            echo "<img src='".$row['image']." 'height='100px' width='100px'>" ;
            echo '<h3>'.$row["name"].'</h3>';
            echo '<p>Category:'.$row["category"].'</p>';
            echo '<p>Price: '.$row["price"].'</p>';
            echo '</div>';
            echo '<div class="error_edit"></div>';
            echo '<div class="edit_section">';

            echo "<button><a href='Updatedata.php?updateid=" . $row['id'] . "'>Update</a></button>";
            echo "<button><a href='?deleteid=" . $row['id'] . "'>Delete</a></button>";

            echo '</div>';
            echo '</div>'; 
        }
        echo "</div>";
?>

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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="css/manipulate.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


<?php 
echo '<a href="adminhomepage.php">Return to Home page</a>';
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>


