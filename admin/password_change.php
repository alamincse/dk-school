<?php 
/**
 * password change template
 * @package dk_high_school
 */
	require_once ( dirname( __FILE__ ) . '/functions.php' ); 
	require_once ( dirname( __FILE__ ) . '/header.php' );
	var_dump(send_email());
	if($_SESSION['email']) :
?>

	<h2 class="page-header" style="padding-left:250px;">Change Password</h2>

	<!-- Error message show here.  -->
	<?php 
		$errors = admin_confirm_password_change();
		if($errors) : ?>
			<?php foreach($errors as $error) : ?>
				<div class="alert alert-error">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><?php echo $error; ?></p>
				</div><!-- .alert .alert-error  -->
			<?php endforeach; ?>
		<?php endif; 
	?>
						

	<form action="" method="post" class="form-horizontal">
		<div class="control-group">
			<label for="email" class="control-label">Your Email</label>
			<div class="controls">
				<input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" readonly>
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->

		<div class="control-group">
			<label for="New Password" class="control-label">New Password</label>
			<div class="controls">
				<input type="password" name="Newpassword" id="New Password" placeholder="New Password">
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->

		<div class="control-group">
			<label for="Confirm Password" class="control-label">Confirm Password</label>
			<div class="controls">
				<input type="password" name="Confirmpassword" id="Confirm Password" placeholder="Confirm Password">
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->
		
		<div class="control-group">
			<div class="controls">
				<input type="submit" name="confirm_password_change" value="Change Password" class="btn btn-inverse">	
				<a href="./" class="btn btn-warning">Cancel</a>
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->
	</form><!-- .form-horizontal  -->

<?php 
	require_once ( dirname( __FILE__ ) . '/footer.php' ); 
	else :
		echo '<h2 style="color:red;">Oops! page cann\'t be found.</h2><br><a href="./">Login</a>';
	endif;
?>