<?php 

session_start();

	unset($username);
	session_destroy();

	header("Location: index.php");
		

?>