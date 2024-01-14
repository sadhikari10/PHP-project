<?php 
    include("Connection.php");
    if(isset($_POST['submit'])) {
        $search = $_POST['search'];
        echo "<table border=1; padding:100px>";
        echo "<tr><th>ID</th> <th>Image</th> <th>Product Name</th> <th>Price</th> <th>Category</th></tr>";
        $sql = "SELECT * FROM product WHERE name LIKE '%$search%'
        OR category LIKE '%$search%' " ;

        $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        while($row=mysqli_fetch_array($qry)){
        
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td><img src='".$row['image']." 'height='100px' width='100px'></td>";
            
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['category']."</td>";
            
        //     $id = $row['id'];
        //     echo '<td><button><a href="Updatedata.php?updateid='.$id.'">Update</a></button>
        //     <button><a href="?deleteid='.$id.'">Delete</a></button></td>';
        //    echo "</tr>";
            }
            echo "</table>";
    }      
        
?>