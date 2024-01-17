<form method="post" action="insertRecord.php">
    <fieldset>
        <legend>Enter Customer Details</legend>
        <label>First Name:</label>
        <input type="text" name="firstname"><br><br>
        <label>Surname:</label>
        <input type="text" name="surname"><br><br>
        <label>Email:</label>
        <input type="text" name="email"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <label>Gender:</label>
        <select name="gender">
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select><br><br>
        <label>Age:</label>
        <input type="text" name="age"><br><br>
        <input type="Submit" name="submit" value="Insert">

    </fieldset>
</form>
<?php 
    include 'selectRecord.php';
?>