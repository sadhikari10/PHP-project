<?php
        session_start();
        echo "<table border=1; padding:100px>";
        echo "<tr><th>ID</th> <th>Image</th> <th>Product Name</th> <th>Price</th> <th>Category</th></tr>";

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

        echo "Welcome".$_SESSION['username'];

        if($_SESSION['username'] != null ){

        }
        else{
          header("location:login.php");
        }
 
        //connection to db
        include("Connection.php");

        //executing the query
        $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($qry)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td><img src='".$row['image']." 'height='100px' width='100px'></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['category']."</td>";
        }
        echo "</table>";
        
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
    <input type="Submit" name="submit" value="Search">
</form>
<?php 
echo "<a href='logout.php'>Logout</a>";
?>
    