<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "SELECT * FROM users WHERE username = '$username' limit 1";
			$result = mysqli_query($db, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
                    if($user_data['password'] === $password)
					{
                        $_SESSION['username'] = $user_data['username'];
                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['user_type'] = $user_data['user_type'];
                        //if($user_data['username'] === 'admin'){
                        if($_SESSION['user_type'] == 0){
                            
                            header("Location: admin.php");
                            die;
                        }
                        else{
                            header("Location: ../index.html");
                            die;
                        }
						
					}
				}
			}
			
			echo "<p id='logInError'>Username incorrect</p>" ;
		} else
		{
			echo "<p id='logInError'>Username incorrect</p>" ;
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
        <div class="login-main-text">
            <h1>log in</h1>
        </div>
        <div class="login-form">
         <form method="post" action="" name="signup-form" class="loginform">
            <div class="form-element">
            <label>Username</label>
            <input type="text" id="inputfield" name="username" pattern="[a-zA-Z0-9]+" required />
            </div>
            <div class="form-element">
            <label>Password</label>
            <input type="password" id="inputfield" name="password" required />
            </div>
            <button type="submit" id="logbtn" value="login">Log In</button>
            <a href="register.php">Not a user? Click to Register</a>
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
