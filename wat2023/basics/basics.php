<?php 
    echo "My name is Sushant Adhikari.<br> My student ID is c7356690";
    
    //My first PHP.
    echo "<h1>Using Escape Characters</h1>";
    echo "\"most programmers say it's better to use 'echo' rather than 'print'\" says who? ";
    echo "<br><br>";
    $name = "Sushant Adhikari";
    $age = 22;
    
    echo 'Hi my name is ' .$name.' and I am ' .$age.' years old';
    echo "<br><br> Mi nombre ed $name y tengo $age anos de edad";

    echo "<h2>Functions</h2>";

    //gettype()returns the type of variable used to store the value
    echo gettype($name);
    echo '<br />';
    //strlen() returns the length of the string
    echo strlen($name);
    echo '<br />';
    //strtoUpper()returns the string value in uppercase.
    echo strtoUpper($name);

    echo "<h2>Arithmetic</h2>";
    $num1 = 9;
    $num2 = 12;

    echo "num1 = $num1 <br>";
    echo "num2 = $num2 <br>";
    echo "num1 x num2 = ".$num1*$num2."<br>";
    echo "num1 as a percentage of num2 = ".($num1/$num2 * 100 )."% <br>";
    echo "num2 divided by num1 = ".floor($num2/$num1)." remainder ".$num2%$num1;
    echo "<br><br><br>";

    $height = 1.61;
    echo "Name : $name<br>";
    echo "Age : $age<br>";
    echo "Height in Meters : $height<br>";
    echo "height in Feet and inches : ".floor((($height*100)/2.54)/12)."ft ". (($height*100)/2.54)%12 ."ins";
    echo "<br><a href='../watIndex.html'>Return to Portfolio</a>";

?>