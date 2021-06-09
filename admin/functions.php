<?php
/**
  * Function create for dk_high_school.
  * @author  AL-AMIN
  * @package online admission(dk_high_school). 
  *
  * @access  private	  
  */ 

	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php');

	/**
	 * show total applicant
	 */
	function show_applicant(){
		$applicant = mysql_query("SELECT * FROM adminssion_info");
		$total_applicant = mysql_num_rows($applicant);
		return $total_applicant;
	}


	/**
	 * show total register admin
	 */
	function show_admin()
	{
		$admin = mysql_query("SELECT * FROM admin");
		$total_admin = mysql_num_rows($admin);
		return $total_admin;
	}

	/**
	 * show all admin in admin section
	 */
	function show_admin_name()
	{
		$query = mysql_query("SELECT * FROM admin ORDER BY id DESC");

		/** store total row in admin table */
		$row_count = mysql_num_rows($query);

		if($row_count > 0)
		{
			while($row_name = mysql_fetch_assoc($query)){
				$rows = $row_name;
				$time = strtotime($rows['time']);
				$show_time = strftime("%B %d, %Y at %I: %M %p", $time);
				$admin_id = $rows['id'];
				$fullname = ucfirst($rows['fullname']);
				$username = $rows['username'];
				$email    = $rows['email'];

				
				$view = "<a href='delete_admin.php?id=$admin_id'>Delete</a>";
				$list = array(
					array("$fullname", "$username", "$email", "$show_time", "$view")
				); ?>
						
				<tbody>
					<?php foreach($list as $row) : array_map('htmlentities', $row); ?>
						<tr>
							<td><?php echo implode('</td><td>', $row); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
					
				<?php  
			}
		}
		else
		{
			/** If no admin add, then this message show */
			echo '<span  class="alert alert-warning">Oops! No admin add. Please Don\'t logout. You can add minimum one admin for login, then logout.</span><br><br>';
		}
	}


	/**
	 * admin password change
	 */
	function admin_change_password(){
		
		$error = array();

		if(isset($_POST['password_change'])){
			
			$email = htmlentities(trim($_POST['email']));
			
			if(empty($email))
			{
				$error[] = 'Please Select Email.';
			}
			else if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) 
			{
				$error[] = 'Please enter a vaild email address.';
			}
			else
			{
				$query = mysql_query("SELECT * FROM admin");

				/** check row number */
				$row_count = mysql_num_rows($query);

				if($row_count > 0)
				{
					while($row = mysql_fetch_array($query))
					{
						
						$db_email = $row['email'];
						
						/** store condition for error message */
						if($email != $db_email)
						{
							$email = 1;
						}

						if($email == $db_email)
						{
							$_SESSION['email'] = $email;

							header('location:password_change.php');
						}
					}

					/** Don't get email, where admin table. show error message */
					if($email == 1)
					{
						$error[] = 'Email is not correct.';
					}
				}
			}
		}

		return $error;
	}



	function send_email()
	{
		return $test;
	}

	/**
	 * submit confirm password.
	 * @author AL-AMIN	
	 */
	function admin_confirm_password_change(){
		$errors = array();
		$email = $_SESSION['email'];

		if(isset($_POST['confirm_password_change'])){
			$new_password 	  = htmlentities(trim($_POST['Newpassword']));
			$confirm_password = htmlentities(trim($_POST['Confirmpassword']));

			$query = mysql_query("SELECT * FROM admin");
			while($row = mysql_fetch_array($query)){
				
				/** store username */
				$username = $row['username'];

				if(empty($new_password) || empty($confirm_password)){
					$errors[] = 'Please Select Password Field and than submit again.';
				}elseif($new_password != $confirm_password){
					$errors[] = 'Don\'t match your password.';
				}else{ 
					mysql_query("UPDATE admin SET password = '$new_password' WHERE email = '$email'");
					
					$_SESSION['uname'] = $username;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $new_password;
					header('location:password_success.php');
				}
			}
		}

		return $errors;
	}


	/**
	 * pagination show with all post
	 * @access private
	 */
	function post_show(){

		$perpage = 10;

		if(isset($_GET['page'])){
			$page = intval($_GET['page']);
		}else{
			$page = 1;
		}

		$calc = $perpage * $page;
		$start = $calc - $perpage;

		$query = mysql_query("SELECT * FROM adminssion_info ORDER BY id DESC limit $start, $perpage");

		while($row_name = mysql_fetch_assoc($query)){
			$rows = $row_name;
			$application_id = $rows['id'];
			$time = strtotime($rows['time']);
			$show_time = strftime("%B %d, %Y at %I: %M %p", $time);
			$id 		= $rows['s_id'];
			$name 		= ucfirst($rows['s_name']);
			$class_name = $rows['cls_name'];
			$f_name 	= $rows['f_name'];
			$religion 	= $rows['religion'];
			$group 		= $rows['s_group'];
			$gender 	= $rows['sex'];

			// Image show from get_image.php page.
			$photo = "<a class='thumbnail'><img src=get_image.php?id=$application_id style = 'width:70px; height:70px;'></a>";
			
			$view = "<a href='admin_view_detail.php?id=$application_id'>view</a>";
			$list = array(
				array("$id", "$photo", "$name", "$class_name", "$f_name", "$religion", "$gender", "$group", "$show_time", "$view")
			); ?>
					
			<tbody>
				<?php foreach($list as $row) : array_map('htmlentities', $row); ?>
					<tr>
						<td><?php echo implode('</td><td>', $row); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
				
			<?php 
		}
	}

	
	/**
	 * pagination show  
	 * @access private
	 */
	function show_pagination(){ 
		$perpage = 10;

		if(isset($_GET['page'])){
			$page = intval($_GET['page']);
		}else{
			$page = 1;
		}

		$calc = $perpage * $page;
		$start = $calc - $perpage;

		$query = mysql_query("SELECT * FROM adminssion_info limit $start, $perpage");
		$row_count = mysql_num_rows($query);

		if($row_count){
			// For pagination .
			$i = 0;
			echo "<ul>";

			if(isset($page)){
				$query = mysql_query("SELECT count(*) As Total FROM adminssion_info");
				$row_count = mysql_num_rows($query);
				
				if($row_count){
					$result = mysql_fetch_array($query);
					$total = $result['Total'];
				}

				$total_page = ceil($total / $perpage);
				if($page <= 1){
					echo "<li><a href=''>Prev</a></li>";	
				}else{
					$j = $page - 1;
					echo "<li><a href='index.php?page=$j'>Prev</a></li>";
				}
				
				for($i=1; $i <= $total_page; $i++){
					if($i<>$page){
						echo "<li><a href='index.php?page=$i'>$i</a></li>";
					}else{
						echo "<li class='active'><a href='index.php'>$i</a></li>";
					}
				}
				
				if($page == $total_page ){
					echo "<li><a href=''>Next</a></li>";
				}else{
					$j = $page + 1;
					echo "<li><a href='index.php?page=$j'>Next</a></li>";
				}
			}

			echo "</ul>";
		}
	}


	/**
	 * Admin show detail
	 * @author  AL-AMIN
	 * @package Online admission
	 */
	function admin_view_detail(){
		if(isset($_GET['id'])){
			$id = (int)$_GET['id'];

			$query = mysql_query("SELECT * FROM adminssion_info WHERE id=$id");
			while($row_name = mysql_fetch_assoc($query)){
				$rows = $row_name;
				$application_id = $rows['id'];

				$time = strtotime($rows['time']);
				$show_time = strftime("%B %d, %Y at %I: %M %p", $time);
				$id 			 	 = $rows['s_id'];
				$name 			 	 = ucfirst($rows['s_name']);
				$date_of_birth 	 	 = $rows['Date_of_Birth'];
				$class_name 	 	 = $rows['cls_name'];
				$f_name 		 	 = $rows['f_name'];
				$m_name 		 	 = $rows['m_name'];
				$f_qualification 	 = $rows['f_Qualification'];
				$m_qualification 	 = $rows['m_Qualification'];
				$present_add 	 	 = $rows['Present_Adress'];
				$permanet_add 	 	 = $rows['Permanet_Adress'];
				$f_occupation    	 = $rows['f_ocupation'];
				$m_occupation 	 	 = $rows['m_ocupation'];
				$gaurdian_name   	 = $rows['Gaurdian_Name'];
				$relation 		 	 = $rows['relation'];
				$income 		 	 = $rows['incom'];
				$mobile 		 	 = $rows['mobile'];
				$religion 		 	 = $rows['religion'];
				$group 			 	 = $rows['s_group'];
				$gender 		 	 = $rows['sex'];	
			} 

			$list = array(
				array("Student ID", "$id"),
				array("Student Name", "$name"),
				array("Date of Birth", "$date_of_birth"),
				array("Class Name", "$class_name"),
				array("Father's Name", "$f_name"),
				array("Mother's Name", "$m_name"),
				array("Father Qualification", "$f_qualification"),
				array("Mother Qualification", "$m_qualification"),
				array("Present Address", "$present_add"),
				array("Permanet Address", "$permanet_add"),
				array("Father Occupation", "$f_occupation"),
				array("Mother Occupation", "$m_occupation"),
				array("Gaurdian Name", "$gaurdian_name"),
				array("Relation", "$relation"),
				array("Father's Monthly Income", "$income TK."),
				array("Mobile Number", "$mobile"),
				array("Religion", "$religion"),
				array("Group", "$group"),
				array("Gender", "$gender"),
				array("Apply time", "$show_time")
			);
		}

		return $list;
	}


	/**
	 * Picture show / admin area pic
	 * @author  AL-AMIN
	 * @package dk_high_school
	 */
	function admin_show_picture(){
		if(isset($_GET['id'])){
			$id = (int)$_GET['id'];
			$query = mysql_query("SELECT * FROM adminssion_info WHERE id=$id");
			while($row_name = mysql_fetch_assoc($query)){
				$rows 			= $row_name;
				$application_id = $rows['id'];
				$name 			= strtoupper($rows['s_name']);
				$name 			= "<div class='applicant_name'><a href='admin_view_detail.php?id=$application_id'>".$name."</a></div>";
				$photo 			= "<a class='thumbnail' style='width:170px; height:200px;' href='admin_view_detail.php?id=$application_id'><img src=get_image.php?id=$application_id style = 'width:170px; height:200px;'></a>";						
			} 

			$new_list = array(
				array("$photo", "$name")
			);
		}

		return $new_list;
	}
?>