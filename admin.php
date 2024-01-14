


        <h1>Displaying ALL Data </h1>
        <?php
          echo "<table border=1; padding:100px>";
          echo "<tr><th>Image</th> <th>ID</th> <th>Product Name</th> <th>Price</th> <th>Category</th> <th>Update/Delete</th></tr>";
   
          $sql="SELECT * from product";

          //connection to db
          include("Connection.php");

          //executing the query
          $qry=mysqli_query($conn, $sql)or die(mysqli_error($conn));

          while($row=mysqli_fetch_array($qry)){
            $id= $row['id'];
            $name= $row['name'];
            $price =  $row['price'];
            $category =  $row['category'];
            $image = $row['image'];
            echo "<tr>";
            echo "<td>$image</td>";
            echo "<td>$id</td>";
            echo "<td>$name</td>";
            echo "<td>$$price</td>";
            echo "<td>$category</td>";
            echo "<td><button><a href = ''>Update</a></button>";
           echo "<button><a href = ''>Delete</a></button></td>";
            echo "</tr>";
          }
          echo "</table>";
        
        ?>




