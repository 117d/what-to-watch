<?php
    session_start();
    include('connection.php');

    $update = false;
    $user_id = "";
    $username="";

    if (($_SESSION['user_type']) != 0) {
        header('Refresh:3; url=../index.html');
        echo '<h1> You are not allowed to view this page </h1>';
        exit; 
    }

    if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];

        mysqli_query($db, "UPDATE users SET user_id='$user_id', username='$username' WHERE user_id=$user_id");
        $_SESSION['message'] = "User updated!"; 
        header('location: admin.php');
    }

    
	if (isset($_GET['edit'])) {
		$user_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE user_id=$user_id");

		if(mysqli_num_rows($record) < 1){
            echo '<h1>Something is wrong</h1>';
        }
        else{
             if (mysqli_num_rows($record) == 1 ) {
		    	$n = mysqli_fetch_array($record);
		    	$user_id = $n['user_id'];
		    	$username = $n['username'];
	    	}
        }
	}

    if (isset($_GET['del'])) {
        $user_id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE user_id=$user_id");
        $_SESSION['message'] = "User deleted!"; 
        header('location: admin.php');
    }

    if (isset($_POST['save'])) {
		//$user_id = $_POST['user_id'];
		$username = $_POST['username'];

		mysqli_query($db, "INSERT INTO users (username) VALUES ('$username')"); 
		$_SESSION['message'] = "User saved"; 
		header('location: admin.php');
	}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../main.css'>
    <script src='../main.js'></script>
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
                    <a href="../index.html">Home</a>
                    <a href="logout.php">Log Out</a>
                </div>
            </nav>
        </div>
    </header>
    <main>
        

        <div class="admin-main-text">
            <h1>admin</h1>
        </div>
        <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="search-criteria">

        <form method="post" action="admin.php" >
		    <div class="input-group">
		    	<label id="login-det">User ID</label>
		    	<input type="text" name="user_id" value="<?php echo $user_id; ?>">
	    	</div>
	    	<div class="input-group">
		    	<label id="login-det">Username</label>
		    	<input type="text" name="username" value="<?php echo $username; ?>">
	    	</div>
	    	<div class="input-group">
              <?php if ($update == true): ?>
	          <button class="btn" id="admin-button" type="submit" name="update" style="background: #556B2F;" >Update</button>
              <?php else: ?>
              <button class="btn" id="admin-button" type="submit" name="save" >Save</button>
              <?php endif ?>
		    </div>
	    </form>

        <!-- PRINT TABLE WITH THE USER DATABASE -->
         
         <?php $results = mysqli_query($db, "SELECT * FROM users"); ?>

<table>
	<thead>
		<tr>
			<th>UserID</th>
            <th>Username</th>
            <th>User Type</th>
			<th colspan="3">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['user_id']; ?></td>
			<td><?php echo $row['username']; ?></td>
            <td><?php echo $row['user_type']; ?></td>

			<td>
				<a href="admin.php?edit=<?php echo $row['user_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="admin.php?del=<?php echo $row['user_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
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