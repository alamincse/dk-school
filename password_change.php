<?php 
/**
 * password change template
 * @package dk_high_school
 */
	require_once ( dirname( __FILE__ ) . '/user_functions.php'); 
	require_once ( dirname( __FILE__ ) . '/header.php');
?>

	<div class="container well">
		<div class="row">
			<div class="span12">
				<header class="alert alert-info">
					<hgroup>
						<h1>Diargarfa Khairash(D.K) High School</h1>
						<h2>Admission Form</h2>
						<span id="showTime" style="color:#000; font-weight:bold;"></span>
					</hgroup>
				</header><!--  .alert alert-info -->

				<h2 class="page-header" style="padding-left:250px;">Change Password</h2>

				<!-- Error message show here.  -->
				<?php 
					$errors = confirm_password_change();
					if($errors) : ?>
						<?php foreach($errors as $error) : ?>
							<div class="alert alert-error">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<p><?php echo $error; ?></p>
							</div><!-- .alert .alert-error  -->
						<?php endforeach; ?>
					<?php endif; ?>
						

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
							<?php 
								$length = rand(5, 8);
								$string = '';
								$char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*#.,&%@$!^';
								for($i=0; $i<$length; $i++){
									$string .= $char[rand(0, strlen($char) -1)];
								}
							?>
							<p><input type="text" name="show_captcha" style="height:115px; font-size: 35px; font-family: Comic Sans MS; font-style: italic; color: lightsteelblue; border: 2px solid #82C5C5; width: 210px;" value="<?php echo $string; ?>" readonly></p>
							<p><input type="text" name="captcha" placeholder="Captcha Select"></p>
						</div><!-- .controls  -->
					</div> <!--  .control-group  -->
					
					<div class="control-group">
						<div class="controls">
							<input type="submit" name="confirm_password_change" value="Change Password" class="btn btn-inverse">	
							<a href="index.php" class="btn btn-warning">Cancel</a>
						</div><!-- .controls  -->
					</div> <!--  .control-group  -->
				</form><!-- .form-horizontal  -->
			</div><!-- .span12  -->
		</div><!-- .row  -->
	</div><!-- .container .well  -->
<?php require_once 'footer.php'; ?>