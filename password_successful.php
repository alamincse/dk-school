<?php 
/**
 * password success template
 * @package dk_high_school
 */
	session_start();
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
				
				<h2>Change Your Information</h2>

				<div class="alert alert-success">
					<a href="" class="close" data-dismiss="alert">&times;</a>	
					<p>
						<span><?php echo 'Congratulation! You have successfully change your password.'; ?></span>
						<span><a href="index.php">Back Home</a></span>
						<span>and Login for J.Sc information.</span>
					</p>
				</div><!--  .alert .alert-success -->

				<div class="page-header">
					<p>Username : <?php echo $_SESSION['username']; ?></p>
					<p>Email : <?php echo $_SESSION['email']; ?></p>
					<p>Password : <?php echo $_SESSION['password']; ?></p>
				</div><!-- .page-header  -->
			</div><!-- .span12  -->
		</div><!-- .row  -->
	</div><!-- .container .well  -->
</body>
</html>