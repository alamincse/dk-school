<?php 
/**
 * After Login
 * show the main page or index.php page
 *
 * @package Online Form Fill Up
 * @since 1.0
 */
	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php' );
	require_once ( dirname( __FILE__ ) . '/functions.php' ); 
	require_once ( dirname( __FILE__ ) . '/header.php' );
	
	echo '<span style="color:green;">Welcome ' . $_SESSION['username'] . '</span>';
	echo '<span class="pull-right"><a href="register.php">Add Admin</a></span><br>';
	echo '<span class="pull-right"><a href="logout.php">Logout</a></span><br><br>';

	echo "Total Admin : " . '<span class="label label-info">' . show_admin() . '</span>';

	echo "<a href='./' class='pull-right btn btn-info'>Back</a><br><br>";

	
	echo '<table class="table table-bordered">';
		$table_header = array(
			array("Fullname", "Username", "E-mail", "Adding time", "Delete")
		);

		foreach($table_header as $row) : array_map('htmlentities', $row); ?>
			<tr>
				<td><?php echo implode('</td><td>', $row); ?></td>
			</tr>
		<?php endforeach; 		
		
		show_admin_name();

	echo '</table>'; /*<!-- .table table-bordered -->*/	
?>

<?php require_once ( dirname( __FILE__ ) . '/footer.php' ); ?>