<?php 
/**
 * Forgot password template
 * @package dk_high_school
 */
	require_once ( dirname( __FILE__ ) . '/user_functions.php' );
	require_once ( dirname( __FILE__ ) . '/header.php' );
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

				<div class="page-header">
					<h3>Forgot your password...???</h3>
					<p>Please select the Below information.</p>  
				</div>

				<!-- Error message show here.  -->
				<?php 
					$errors = change_password(); 
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
						<label for="username" class="control-label">Username</label>
						<div class="controls">
							<input type="text" name="username" id="username" placeholder="Username">
						</div><!-- .controls  -->
					</div> <!--  .control-group  -->

					<div class="control-group">
						<label for="email" class="control-label">Email</label>
						<div class="controls">
							<input type="email" name="email" id="email" placeholder="Email">
						</div><!-- .controls  -->
					</div> <!--  .control-group  -->
					
					<div class="control-group">
						<div class="controls">
							<input type="submit" name="password_change" value="Submit" class="btn btn-inverse">	
						</div><!-- .controls  -->
					</div> <!--  .control-group  -->
				</form><!-- .form-horizontal  -->
			</div><!-- .span12  -->
		</div><!-- .row  -->
	</div><!-- .container .well  -->
</body>
</html>