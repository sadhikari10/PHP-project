<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Web Applications and Technologies</title>
      <link type="text/css" rel="stylesheet" href="main.css">
   </head>
   <body>
      <header>
         <h1>Sushant Adhikari c7356690</h1> 
      </header>
      
      <section id="container">
         <h1>Fundamentals of PHP</h1>

         <?php
            echo "<h2>Selection</h2>";
            $day = date('l');
          // $day = "Wednesday";
            echo 'it\'s '.$day;
            echo "<br>";

            if($day == "Wednesday"){
                echo "it's midweek";
            }
            else{
                echo "it's not midweek";
            }

            echo "<br>";

            //time in the day(24 hour)
            $time = date("h");
            if($time>12){
                echo "Good Morning";
            }
            elseif($time>=12 && $time<=18) {
                echo "Good Afternoon";
            }
            else{
                echo "Good Night";
            }

            //password variable
            echo "<br>";
            $password = 'password';
            if(strlen($password)>4 && strlen($password)<10) {
                echo "Password length is valid";
            }
            else{
                echo "Password length is invalid";
            }

            //either username or password
            echo "<br>";
            if($password == 'password' || $password == 'username') {
                echo "Password valid";
            }
            else {
                echo "Password Invalid";
            }


            //ticket company
            echo "<br>";
            echo"<br>";

            $ticket_price = 25;
            $age = 15;
            $membership = true; 

            if($age<12 && $membership == false) {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : No <br>";
                echo "Final ticket price : ".$ticket_price-(50/100*$ticket_price);
            }
            elseif($age<12 && $membership == true) {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : Yes <br>";
                echo "Final ticket price : ".$ticket_price-(60/100*$ticket_price);
            }
            elseif($age>=12 && $age<=18 && $membership == false) {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : No <br>";
                echo "Final ticket price : ".$ticket_price-(25/100*$ticket_price);
            }
            elseif($age>=12 && $age<=18 && $membership == true) {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : Yes <br>";
                echo "Final ticket price : ".$ticket_price-(35/100*$ticket_price);
            }
            elseif($age>18 && $membership == false) {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : No <br>";
                echo "Final ticket price : ".$ticket_price-(25/100*$ticket_price);
            }
            else {
                echo "Initial Ticket Price : $ticket_price <br>";
                echo "Age : $age <br>";
                echo "Member : Yes <br>";
                echo "Final ticket price : ".$ticket_price-(35/100*$ticket_price);
            }
          
            //array
            echo "<h1>Arrays</h1>";
            echo "<h2>Simple Arrays</h2>";

            $products = array("t-shirt","cap","mug");
            print_r($products);
            echo "<br>";

            $products[1] = "shirt";
            print_r($products);
            echo "<br>";

            array_push($products,"skirt");
            print_r($products);
            echo "<br><br>";

            echo "Items in my products array<br>";
            echo "The item at index[2] is: ".$products[2];
            echo "<br>The item at index[3] is: ".$products[3];
            echo "<br>";

            echo "<h2>Associative Arrays</h2>";
            $customer = array('CustID'=>12,'CustName'=>'Sarah','CustAge'=>23,'CustGender'=>'F');
            print_r($customer);
            echo "<br>";
            $customer['CustAge'] = 32;
            $customer['CustEmail'] = 'sarah@gmail.com';
            print_r($customer);
            echo "<br>";
            echo "Items in my customer array";
            echo "<br>The item at index[CustName] is: ".$customer['CustName'];
            echo "<br>The item at index[CustEmail] is: ".$customer['CustEmail'];

            echo"<h2>Multi-Dimensional Arrays</h2>";
            $stock = array(
                "id1"=>array("description"=>"t-shirt","price"=>9.99,"stock"=>100,"colour"=>array("blue","green","red")),
                "id2"=>array("description"=>"cap","price"=>4.99,"stock"=>50,"colour"=>array("blue","black","grey")),
                "id3"=>array("description"=>"mug","price"=>6.99,"stock"=>30,"colour"=>array("yellow","green","pink"))
            );
            echo "This is my order: <br>";
            echo $stock["id1"]["colour"][1]." ".$stock["id1"]["description"]."<br>";
            echo "Price: £".$stock["id1"]["price"]."<br>";
            echo $stock["id2"]["colour"][2]." ".$stock["id2"]["description"]."<br>";
            echo "Price: £".$stock["id2"]["price"];

            echo "<h1>Loops</h1>";
            echo "<h2>While Loop</h2>";

            $counter = 1;
            while($counter<6) {
                echo 'Count :'.$counter.'<br>';
                $counter ++;
            }
            echo "<br><br>";

            $shirtPrice = 9.99;
            $counter = 1;
            echo '<table>';

            echo "<tr><th>Quantity</th> <th>Price</th></tr>";
            while($counter<=10) {
                $total = number_format(($counter * $shirtPrice),2);
                echo "<tr><td>$counter</td> <td>£$total</td><tr>";
                $counter++;
            }
            echo "</table>";

            echo "<h2>For Loops</h2>";
            $names=array("Peter","Kat","Laura","Ali","Pppacatapetal");
            for($i=0;$i<5;$i++){
                echo $names[$i].'<br>';
            }

            echo "<h2>Foreach Loops</h2>";
            $names = array("Peter"=>"c123456","Kat"=>"c654321","Laura"=>"c987654","Ali"=>"c654987","Popacatapetal"=>"c765984");
            foreach($names as $key=>$value) {
                echo "Name: $key ID: $value <br>";
            }

            $city = array('Peter'=>'LEEDS','Kat'=>'bradford','Laura'=>'wakeField');
            print_r($city);
            echo "<br>";
            foreach($city as $key=>$value) {
                $city[$key] = ucfirst(strtolower($value));
            }

            print_r($city);


		?>
      </section>
      <footer>   
         <small> <a href="../watIndex.html">Return to Portfolio</a></small>
      </footer>
   </body>
</html>
