<?php
include("connection.php");

session_start();

if ($_SESSION['username'] == null) {
    header("location:login.php");
    exit();
}

if (isset($_POST["submit"])) {
    $filename =  $_FILES["uploadfile"]["name"];
    $temporaryname =  $_FILES["uploadfile"]["tmp_name"];
    $folder="images/".$filename;
    move_uploaded_file($temporaryname,$folder);

    $pname=$_POST["productname"];
    $pprice=$_POST["productprice"];
    $pcategory=$_POST["productcategory"];

    $sql="INSERT INTO product(name, price, category,image)
    VALUES('$pname', '$pprice', '$pcategory','$folder')";

    $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if($qry){
        echo"<h1>Data Inserted</h1>";
    }
}

$search = isset($_POST['txtsearch']) ? trim($_POST['txtsearch']) : "";
$valprice = isset($_POST['bookprice']) ? $_POST['bookprice'] : "";
$bookcategory = isset($_POST['genre']) ? $_POST['genre'] : "";

$sql = "SELECT * FROM product WHERE (name LIKE '%$search%'
    OR category LIKE '%$search%' OR price LIKE '%$search%')";

if (!empty($bookcategory)) {
    $sql .= " AND category = '$bookcategory'";
}

if (!empty($valprice)) {
    $sql .= " ORDER BY price $valprice";
}

$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $deleteSql = "DELETE FROM product WHERE id = $id";
    $deleteQry = mysqli_query($conn, $deleteSql) or die(mysqli_error($conn));

    if ($deleteQry) {
        header('Location:adminoperations.php');
        exit();
    }
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body style="background: linear-gradient(to right, #cfe2f3, #a4c7e3);margin-bottom: 3rem">
    <div class="firstadmindiv">
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
    </div>

    <div class='secondadmindiv'>Welcome <?php echo $_SESSION['username']; ?></div>

    <?php
    echo "<div class = 'firstcontainer container'>";
    while ($row = mysqli_fetch_array($qry)) {
        echo '<div class="card product">';
        echo ' <div class="productInfo">';
        echo "<img src='" . $row['image'] . " 'height='150px' width='130px'>";
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>Category:' . $row["category"] . '</p>';
        echo '<p>Price: $' . $row["price"] . '</p>';
        echo '</div>';
        echo '<div class="error_edit"></div>';
        echo '<div class="edit_section">';
        echo "<button><a href='updatedata.php?updateid=" . $row['id'] . "'>Update</a></button>";
        echo "<button><a href='?deleteid=" . $row['id'] . "'>Delete</a></button>";
        echo '</div>';
        echo '</div>';
    }
    echo "</div>";
    ?>

    <form method="post" action="" name="category" enctype="multipart/form-data" class="addingproduct">
        <fieldset >
            <legend>Add Book</legend>
            <label>Book Name</label><br>
            <input type="text" name="productname"><br>
            <label>Book price</label><br>
            <input type="text" name="productprice"><br>
            <label>Category</label><br>
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
    echo '<a href="adminhomepage.php">Return to Admin home page</a><br>';
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
</body>
</html>
