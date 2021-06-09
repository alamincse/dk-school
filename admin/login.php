<?php 
/**
 * Login page
 * @package Online Form Fill Up
 */

require_once ( dirname( dirname( __FILE__ ) ) . '/init.php' );

if( isset($_SESSION['username']) ) :
	header('location:index.php');
else :
	require_once ( dirname( __FILE__ ). '/header.php' ); 

	/** check username and password  */
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		/** get the value form text field. */
		$uname = htmlspecialchars(htmlentities(trim($_POST['username'])));
		$pass  = htmlspecialchars(htmlentities(trim($_POST['password'])));

		$errors = array();
		if ($uname && $pass) {
			
			$result = mysql_query("SELECT * FROM admin");

			if ($result) {

				while($row = mysql_fetch_assoc($result)){

					/** select username & password from database */
					$dbusername = $row['username'];
					$dbpassword = $row['password'];

					/** when username or password don't match, */
					$i = true;

					/** check username and password from field and database... */
					if ($dbusername == $uname && $dbpassword == $pass) {
						$_SESSION['username'] = $uname;

						/** Go index.php page or admin main page */
						header('location: ./');
					}
				}

				/** Don't match username or password. */
				if($i == true)
				{
					$errors[] = 'Username or Password don\'t match! Please try again.';	
					// $msg = 'Username or Password don\'t match! Please try again.';
					// header("location:login.php?msg=$msg");
				}
			}
		}else{
			// $msg = 'Please enter username and password.';
			$errors[] = 'Please enter username and password.';
			// header("location:login.php?msg=$msg");
		}
		
	}
?>

	<div class="container">
		<div class="row">
			<div class="span8 offset2 admin-login-page">
				<header>
					<h2 class="page-header admin">Admin login page</h2>
				</header>

				<?php if (isset($errors)) : ?>
					<?php if (!empty($errors)) : ?>

						<?php foreach($errors as $error) : ?>
							<div class="alert alert-error">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<p><?php echo $error; ?></p>
							</div>
						<?php endforeach; ?>						
					<?php endif; ?>
				<?php endif ?>
				

				<form action="" class="form-horizontal" method="post">
					<div class="control-group">
						<label class="control-label">Usename</label>
						<div class="controls">
							<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $_POST['username'] = '' ?>" placeholder="Username">
						</div> <!--  .controls  -->
					</div> <!--  .control-group  -->

					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : $_POST['password'] = '' ?>" placeholder="Username">
						</div> <!--  .controls  -->
					</div> <!--  .control-group  -->

					<div class="control-group">
						<div class="controls">
							<a href="password_forgot.php">Forgot your password ?</a>
						</div> <!--  .controls  -->
					</div> <!--  .control-group  -->

					<div class="control-group">
						<div class="controls">
							<input type="submit" name="submit" value="Login" class="btn btn-primary">
						</div> <!--  .controls  -->
					</div> <!--  .control-group  -->
				</form> <!--  .form-horizontal  -->
			</div> <!--  .span8 offset2  -->
		</div> <!--  .row  -->
	</div> <!--  .container  -->

<?php require_once ( dirname( __FILE__ ) . '/footer.php' ); endif;  ?>