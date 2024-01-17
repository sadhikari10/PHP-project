<?php
    session_start();
    
    echo "<div class='firstuserdiv'> Welcome ".$_SESSION['username'].'</div>';

    if($_SESSION['username'] != null ){

    }
    else{
        header("location:login.php");
    }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="css/adminoperations.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background: linear-gradient(to right, #cfe2f3, #a4c7e3);margin-bottom: 3rem">
<div class="seconduserdiv">
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
</div>
</body>
</html>
<?php
    $search = isset($_POST['txtsearch']) ? trim($_POST['txtsearch']) : "";
    $bookprice = isset($_POST['bookprice']) ? $_POST['bookprice'] : "";
    $bookcategory = isset($_POST['genre']) ? $_POST['genre'] : "";
    $sql = "SELECT * FROM product WHERE (name LIKE '%$search%'
    OR category LIKE '%$search%' OR price LIKE '%$search%')";
    if(!empty($bookcategory)) {
        $sql .= " AND category = '$bookcategory'";
    }
    if(!empty($bookprice)) {
        $sql .= " ORDER BY price $bookprice"; 
    }
    include("connection.php");
    $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
        echo "<div class = 'firstcontainer container'>";
        while($row=mysqli_fetch_array($qry)){
            echo ' <div class="card product">';
            echo ' <div class="productInfo">';
            echo "<img src='".$row['image']." 'height='150px' width='130px'>" ;
            echo '<h3>'.$row["name"].'</h3>';
            echo '<p>Category:'.$row["category"].'</p>';
            echo '<p>Price: $'.$row["price"].'</p>';
            echo '</div>';
            echo '</div>';
        }
        echo "</div>";
?>
<?php 
echo "<a href='logout.php'>Logout</a>";
?>
<footer style="height:3rem;
background-color: black;
color: white;
position: fixed;
bottom: 0;
display: flex;
justify-content: center;
align-items: center;
width: 100%">
<p>Copyright @ 2024 Sushant Adhikari. All Rights Reserved</p>
</footer> 

    