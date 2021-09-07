<?php
 session_start();
 include('login/connection.php');

$username = '';

 if(!isset($_SESSION['user_type'])){
    header('Refresh:3; url=index.html');
    echo '<h1> To access your profile you need to be registered </h1>';
    exit; 
 }
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('login.php');
}
 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>What To Watch?</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <script src="https://kit.fontawesome.com/772775928a.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body class="dark">
    <!-- Header -->
    <header>
        <div class="header-cont" id="header">
            <nav>
                <a href="index.html" class="logo-with-title">
                     <p><img src="images/favicon.ico" alt="Home"/>What to watch?</p>
                </a>
                <div class="nav-links">
                    <button id="button-demo2" onclick="titleIncrease()" ><i class="fas fa-text-height"></i></button> 
                    <button id="button-demo" onclick="changeColor()" ><i class="far fa-lightbulb"></i></button> 
                    <a href="index.html">Home</a>
                    <a href="login/logout.php">Log Out</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="user-layout">
            <h1>WELCOME, </h1><?php echo $username; ?>
            <a href="index.html#start">Get Started</a>
        </div>

       
    </main>
    <!-- Footer -->
    <footer>
        <img src="images/favicon.ico" alt="Home"/>
        <p>What to Watch?</p>
        <p>2021</p>
    </footer>
</body>
</html>