<?php
    ini_set('display_errors',1);
    ini_set('displaying_startup_errors',1);
    error_reporting(E_ALL);
?>
<h1>Processing Input from HTML Forms</h1>
<h2>Login Form using GET</h2>
<form method="post" action="forms.php">
<fieldset>
		<legend>
			Login
		</legend>
		<label for="email">Email: </label>
		<input type="text" name="txtEmail"/><br />
		<label for="passwd">Password: </label>
		<input type="password" name="txtPass" /><br />
		<input type="submit" value="Submit" name="loginSubmit"  />
		<input type="reset" value="Clear" />
	</fieldset>
</form>

<?php 
   if(isset($_POST['loginSubmit'])){
        if(!empty($_POST['txtEmail'])){
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPass'];

            echo "Email: $email Password: $password";
        }
        else{
            echo "Email must not be empty";
        }
   }
   else {
    //
   }
?>

<form method="post" action="forms.php">
	<fieldset>
		<legend>Comments</legend>
		<label for="email">Email: </label>
		<input type="text" name="email" value="<?php 
            if(isset($_POST['email'])) { 
                echo $_POST['email'];
            }
            ?>"><br />
		<textarea rows="4" cols="50" name="textbox"> <?php 
            if(isset($_POST['textbox'])) {
                //htmlspecialcharacters used to covert special characters to their html entites
                //parameter ent_quotes helps issues with attribute values enclosed in quotes
                //utf-8 specifies character encoding.
                echo htmlspecialchars($_POST['textbox'], ENT_QUOTES,'UTF-8');
                }
            ?></textarea><br />
		<label for="Click">Click to Confirm: </label>
		<input type="checkbox" name="Click" value="agree"><br />
		<input type="submit" value="Submit" name="CommentSubmit"/>
		<input type="reset" value="Clear" />
	</fieldset>
</form>
<?php 
    if(isset($_POST['CommentSubmit'])) {
        if(!empty($_POST['email'])) {   
            $email  = $_POST['email'];
            $text = $_POST['textbox'];
            if(isset($_POST['Click'])){
                $confirm = 'Agreed <br>';
            }
            else{
                $confirm = 'Not Agreed<br>';
            }

            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "Email: $email <br>";
                echo "Comments: $text <br>";
                echo "Confirm: $confirm <br>";
            }
            else{
                echo "Invalid email address.";
            }  
        }
        else{
            echo "Email must not be empty";
        }
    }
?>

<h1>Tax Calculator</h1>
<form method="post" action="forms.php"> 
    <fieldset>
        <legend>Without TAX calculator</legend>
        <label>After Tax Price : </label>
        <input type="text" name="pricebox" value="<?php 
            if(isset($_POST['pricebox'])) {
                echo $_POST['pricebox'];
            }
        ?>">
        <label>Tax Rate</label>
        <input type="text" name="ratebox" value="<?php 
            if(isset($_POST['ratebox'])) {
                echo $_POST['ratebox'];
            }
        ?>">
        <input type="Submit" name="Submit" value="Submit">
        <input type="Reset" name="Clear">
    </fieldset>
</form>

<?php
    if(isset($_POST['Submit'])) {
        if(empty($_POST['pricebox']) || empty($_POST['ratebox'])) {
            echo "All Fields Required";
        }
       else {
            $tax = $_POST['pricebox'];
            $rate = $_POST['ratebox'];
            if(filter_var($tax,FILTER_VALIDATE_INT)) {
                if(filter_var($rate,FILTER_VALIDATE_FLOAT)) {
                    
                    $beforetax = number_format((100*$tax)/(100 + $rate),2);
                    echo "Price before tax = £$beforetax";
                }
                else {
                    echo "Please enter a whole number for tax rate";
                }
            }
            else {
                echo "Please enter the price in the format 9.99";
            }
        }
    }
?>

<h1>Passing Data Appended to an URL</h1>
<h2>Pick a category</h2>
<a href="forms.php?cat=Films">Films</a>
<a href="forms.php?cat=Books">Books</a>
<a href="forms.php?cat=Music">Music</a>

<?php 

    if (isset($_GET['cat'])) {
        echo '<br>The category selected is '. $_GET["cat"];
    }
    else{
        //
    }
    echo "<br><a href='../watIndex.html'>Return to Portfolio</a>";

?>