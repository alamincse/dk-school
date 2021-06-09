<?php 
/**
 * admin password success template
 * @package Online Form Fill Up 
 */
	require_once ( dirname( __FILE__ )  . '/functions.php' ); 
	require_once ( dirname( __FILE__ )  . '/header.php' ); 
?>

	<h2>Change Your Information</h2>

	<div class="alert alert-success">
		<a href="" class="close" data-dismiss="alert">&times;</a>	
		<p>
			<span><?php echo 'Congratulation! You have successfully change your password.'; ?></span>
			<span><a href="./">Back Home</a></span>
			<span>and Login.</span>
		</p>
	</div><!--  .alert .alert-success -->

	<div class="page-header">
		<p>Username : <?php echo $_SESSION['uname']; ?></p>
		<p>Email : <?php echo $_SESSION['email']; ?></p>
		<p>Password : <?php echo $_SESSION['password']; ?></p>
	</div><!-- .page-header  -->

<?php require_once ( dirname( __FILE__ ) . '/footer.php' ); ?>