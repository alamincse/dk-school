<?php 
/**
 * Registration page/ add admin page
 * @package Online Form Fill Up
 */
	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php' );
	require_once ( dirname( __FILE__ ) . '/functions.php' ); 
	require_once ( dirname( __FILE__ ) . '/header.php' );

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{

		/** get the value form text field.... */
		$fullname = htmlspecialchars(htmlentities(trim($_POST['fullname'])));
		$username = htmlspecialchars(htmlentities(trim($_POST['username'])));
		$email    = trim($_POST['email']);
		$password = htmlspecialchars(htmlentities(trim($_POST['password'])));
		$c_pass   = htmlspecialchars(htmlentities(trim($_POST['c_pw'])));

		/** Human section */
		$contact_math = htmlspecialchars(htmlentities(trim($_POST['contact_math'])));
		$contact_sum  = htmlspecialchars(htmlentities(trim($_POST['contact_sum'])));

		$errors = array();

		if (!empty($fullname) || !empty($username) || !empty($email) || !empty($password) || !empty($c_pass)) 
		{
			if (strlen($fullname) > 30 || strlen($username) > 50 || strlen($fullname) >100 || strlen($password) > 150 || strlen($email) >255) 
			{
				$errors[] = 'One or more fields contains too many characters.';
			}

			/** email validation.... */
			else if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
				$errors[] = 'Please enter a vaild email address.';
			}
			else if($password != $c_pass)
			{
				$errors[] = 'Don\'t match your password. Please try again.';
			}
			else if($contact_math != $contact_sum)
			{
				$errors[] = 'Don\'t match your summation.';
			}
			else
			{
				/**
				 * Don't allow same username or same email, where before you registration.
				 */
				$query = mysql_query("SELECT * FROM admin");
				
				/** check row number */
				$row_count = mysql_num_rows($query);

				if($row_count > 0)
				{
					while($row = mysql_fetch_assoc($query))
					{
						/** store database username & email */
						$db_uname = $row['username'];
						$db_email = $row['email'];

						/** store value when database username is same */
						if($db_uname == $username)
						{
							$db_uname = 1;
						}

						/** store value when database email is same */
						else if($db_email == $email)
						{
							$db_email = 2;
						}
					}

					/** check when database username are same  */
					if($db_uname == 1)
					{
						$errors[] = 'Username already exits. Please try another username.';
					}

					/** check when database email are same */
					else if($db_email == 2)
					{
						$errors[] = 'E-mail already exits. Please try another E-mail.';	
					}
					else
					{
						/** Fainally add your request into admin table */
						mysql_query("INSERT INTO admin VALUES('', '$fullname', '$username', '$email', '$password', NOW())");
					}
				}
				else
				{
					/** If no admin add in admin table. I mean when admin is zero (0) in admin table, then this section in run */
					mysql_query("INSERT INTO admin VALUES('', '$fullname', '$username', '$email', '$password', NOW())");
				}
			}
		}		
		else
		{
			$errors[] = 'Some fields are required. Please try again.';
		}
	}
?>
<div class="container">
	<?php 
				
		echo '<span style="color:green;">Welcome ' . $_SESSION['username'] . '</span>';
			
		echo '<span class="pull-right"><a href="logout.php">Logout</a></span><br><br>';

		echo "Total Admin : " . '<span class="label label-info">' . show_admin() . '</span>';
	?>
	<div class="row">
		<div class="span8 offset2 admin-login-page">
			<header>
				<h2 class="page-header admin">
					<span>Admin registration page</span>	
				</h2>
			</header>
			<?php if (isset($errors)) : ?>
				<?php if (!empty($errors)) : ?>

					<?php foreach($errors as $error) : ?>
						<div class="alert alert-error">
							<a href="" class="close" data-dismiss="alert">&times;</a>
							<p><?php echo $error; ?></p>
						</div> <!--  .alert alert-error  -->
					<?php endforeach; ?>
							
				<?php else : ?>
					<div class="alert alert-success">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><?php echo 'Thank you for registering. Now you can add new admin in this site.'; ?></p>
					</div> <!--  .alert alert-success  -->
				<?php endif; ?>
			<?php endif ?>
	
			<form action="" method="post" class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Fullname</label>
					<div class="controls">
						<input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $_POST['fullname'] = ''; ?>" placeholder="Full name"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->

				<div class="control-group">
					<label class="control-label">Username</label>
					<div class="controls">
						<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $_POST['username'] = ''; ?>" placeholder="Username"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->

				<div class="control-group">
					<label class="control-label">Email:</label>
					<div class="controls">
						<input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $_POST['email'] = ''; ?>" placeholder="E-mail"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->

				<div class="control-group">
					<label class="control-label">Password:</label>
					<div class="controls">
						<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : $_POST['password'] = ''; ?>" placeholder="Password"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->

				<div class="control-group">
					<label class="control-label">Confirm Password:</label>
					<div class="controls">
						<input type="password" name="c_pw" value="<?php echo isset($_POST['c_pw']) ? $_POST['c_pw'] : $_POST['c_pw'] = ''; ?>" placeholder="Confirm Password"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->

				<div class="control-group">
					<label class="control-label">Are you human ?</label>
					<?php 
						$first  = rand(1,9);
						$second = rand(1,9);
					?>
					<div class="controls">
						<input type="text" name="contact_math" placeholder="<?php printf('%d + %d = ?', $first, $second); ?>"/>
					</div> <!--  .controls  -->
				</div> <!--  .control-group  -->
				

				<div class="control-group">
					<div class="controls">
						<input type="hidden" name="contact_sum" value="<?php echo $first + $second; ?>" ><br><br>
						
						<button type="submit" class="btn btn-inverse">Add Admin</button>
						<a href="./" class="btn btn-danger">Cancel</a>
					</div><!--  .controls  -->
				</div><!--  .controls-group  -->
			</form> <!--  .form-horizontal  -->
		</div> <!--  .span8 offset2  -->
	</div> <!--  .row  -->
</div> <!--  .container  -->

<?php require_once ( dirname( __FILE__ ) . '/footer.php' ); ?>