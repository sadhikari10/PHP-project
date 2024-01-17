<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>
    <style>
        table,th,td{
            border:2px solid black;
        }

    </style>
</head>
<body>
<?php 
    include 'connection.php';
    $query="SELECT * FROM products";
    $result=mysqli_query($connection, $query);
    echo "<table>";
    echo "<tr>";
    echo "<th>ProductName</th>";
    echo "<th>Price</th>";
    echo "<th>Image</th>";
    echo "<th>Amend</th>";
    echo "<th> Delete</th>";
    echo "</tr>";
    while ($row=mysqli_fetch_assoc($result)){ 
        echo "<tr>";
        echo "<td>".$row['productname']."</td>";
        echo "<td>".$row['productprice']."</td>";
        echo "<td><img src='".$row['productimagename']." 'height='100px' width='100px'></td>";
        echo '<td><a href="amendProduct.php?id='. $row['productid'].'">Amend</a></td>';
        echo '<td><a href="deleteProduct.php?id='. $row['productid'].'">Delete</a></td>';
    }
    echo '</tr></table>';

?>
</body>
</html>


