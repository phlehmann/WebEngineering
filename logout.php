<?php
	// opens current session
	session_start();
	
	// destroys current session
	session_destroy();
	
	// redirects to login area
	header('Location: login.php');
	exit;
?>