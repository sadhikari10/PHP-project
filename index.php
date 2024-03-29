
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to right, #cfe2f3, #a4c7e3);">
    

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="wat2023/watIndex.html">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    

    <?php
    date_default_timezone_set('Asia/Kathmandu');
    $currentTime = date('H');

// Determine the appropriate greeting based on the time
    if ($currentTime >= 0 && $currentTime < 12) {
        $greeting = "Good morning visitor";
    } 
    elseif ($currentTime >= 12 && $currentTime < 17) {
        $greeting = "Good afternoon visitor";
    } 
    else {
        $greeting = "Good evening visitor";
    }

// Display the greeting
echo "<h1 style='text-align:center;'>$greeting</h1>";
echo '<h1 style="text-align:center;">Welcome to homepage of Adhikari\'s Library</h1>' ;
?>
</body>

<footer style="height:3rem;
    background-color:black;
    color:white;
    position:absolute;
    bottom:0;
    display:flex;
    justify-content: center;
    align-items: center;
    width:100vw;">
    <p>Copyright @ 2024 Sushant Adhikari. All Rights Reserved</p>
</footer> 
</html>