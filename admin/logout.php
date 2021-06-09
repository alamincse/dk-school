<?php 
/**
 * Logout page
 */
	session_start();
	session_destroy();
	header('Location:login.php?msg=you have successfully logout');
?>