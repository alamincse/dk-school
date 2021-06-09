<?php 
	session_start();
	
	// mysql connect...
	$conn = mysql_connect('localhost', 'root', '');
	$db   = mysql_select_db('dk_school_admission', $conn);
?>