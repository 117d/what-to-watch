<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['user_type']);
}

header("Location: ../index.html");
die;