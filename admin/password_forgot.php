<?php 
/**
 * Forgot password template
 * @package dk_high_school
 */

	require_once ( dirname( __FILE__ ) . '/header.php' );
	require_once ( dirname( __FILE__ ) . '/functions.php' );
?>
	<div class="page-header">
		<h3>Forgot your password...???</h3>
		<p>Please select the Below information.</p>  
	</div>

	<!-- Error message show here.  -->
	<?php 
		$errors = admin_change_password(); 
	 	if(isset($errors)) : ?>
		
		<?php if(!empty($errors)) : ?>
			<?php foreach($errors as $error) : ?>
				<div class="alert alert-error">
					<a href="" class="close" data-dismiss="alert">&times;</a>
					<p><?php echo $error; ?></p>
				</div><!-- .alert .alert-error  -->
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?>

	<form action="" method="post" class="form-horizontal">
		<div class="control-group">
			<label for="email" class="control-label">Email</label>
			<div class="controls">
				<input type="email" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $_POST['email'] = '' ?>" placeholder="Email">
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->
		
		<div class="control-group">
			<div class="controls">
				<input type="submit" name="password_change" value="Submit" class="btn btn-inverse">	
			</div><!-- .controls  -->
		</div> <!--  .control-group  -->
	</form><!-- .form-horizontal  -->

<?php require_once ( dirname( __FILE__ ) . '/footer.php' ); ?>