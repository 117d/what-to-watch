<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{

			$query = "INSERT INTO users (username, password, user_type) VALUES ('$username','$password', 1)";

			mysqli_query($db, $query);
			header("Location: login.php");
			die;
		} else
		{
			header('Refresh:3; url=../index.html');
            echo '<h1> Something went wrong. Try again </h1>';
            exit; 
		}
	}
  
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>REGISTER</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../main.css'>
    <script src='main.js'></script>
    <script src="https://kit.fontawesome.com/772775928a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
</head>
<body class="dark">
    <!-- Header -->
    <header>
        <div class="header-cont">
            <nav>
                <a href="../index.html" class="logo-with-title">
                     <p><img src="../images/favicon.ico" alt="Home"/>What to watch?</p>
                </a>
                <div class="nav-links">
                    <button id="button-demo" onclick="changeColor()" ><i class="far fa-sun"></i></button> 
                    <a href="../index.html#how-to">How To Use</a>
                    <a href="../index.html#start">Get Started</a>
                    <a href="../index.html#landing-page">About</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="signup-main-text">
            <h1>sign up</h1>
        </div>
        <div class="login-form">
         <form method="post" action="" name="signup-form">
            <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
            </div>
            <button type="submit" id="submitbtn" value="register">Register</button>
            <a href="login.php">Already a user? Click to Login</a>
        </form>
</div>
    </main>
   <!-- Footer -->
    <footer>
        <img src="../images/favicon.ico" alt="Home"/>
        <p>What to Watch?</p>
        <p>2021</p>
    </footer>
</body>
</html>

