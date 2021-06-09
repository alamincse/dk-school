<?php 
/**
 * Admin Delete option
 * @package Online Form Fill Up
 */
	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php' );
	require_once ( dirname( __FILE__ ) . '/header.php' );

	if (isset($_GET['id'])) {
		$admin_id = (int)$_GET['id'];
		$delete = mysql_query("DELETE FROM admin WHERE id = $admin_id");
		if($delete)
		{
			header('location:register_admin.php');
		}
	}
?>