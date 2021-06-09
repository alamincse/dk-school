<?php 
	/**
	 *	
	 * Description: Online Admission, home page/front page.
	 * @author  AL-AMIN
	 * @package Admission	 
	 * @access  public
	 */
	require_once ( dirname( __FILE__ ) . '/init.php');

	if(isset($_POST['submit'])){
		$student_id  	 = htmlentities(trim($_POST['student_id']));
		$student_name 	 = htmlentities(trim($_POST['student_name']));
		$day 	         = htmlentities(trim($_POST['day']));
		$month_name 	 = htmlentities(trim($_POST['month_name']));
		$year 	         = htmlentities(trim($_POST['year']));
		$class_name 	 = htmlentities(trim($_POST['class_name']));
		$f_name 		 = htmlentities(trim($_POST['f_name']));
		$m_name  		 = htmlentities(trim($_POST['m_name']));
		$f_qualification = htmlentities(trim($_POST['f_qualification']));
		$m_qualification = htmlentities(trim($_POST['m_qualification']));
		$present_add     = htmlentities(trim($_POST['present_add']));
		$permanet_add    = htmlentities(trim($_POST['permanet_add']));
		$f_occupation    = htmlentities(trim($_POST['f_occupation']));
		$m_occupation    = htmlentities(trim($_POST['m_occupation']));
		$gaurdian_name   = htmlentities(trim($_POST['gaurdian_name']));
		$relation   	 = htmlentities(trim($_POST['relation']));
		$income 	     = htmlentities(trim($_POST['income']));
		$mobile 		 = htmlentities(trim($_POST['mobile']));
		$religion 		 = htmlentities(trim($_POST['religion']));
		$group 			 = htmlentities(trim($_POST['group']));		

		$errors = array();

		if(empty($student_id) || empty($student_name) || empty($day) || empty($month_name) || empty($year) || empty($class_name) || empty($f_name) || empty($m_name) || empty($f_qualification) || empty($m_qualification) || empty($present_add) || empty($permanet_add) || empty($f_occupation) || empty($m_occupation) || empty($gaurdian_name) || empty($relation) || empty($income) || empty($mobile) || empty($religion) || empty($group)){
			$errors[] = 'Some fields are required Please check it and than submit again.';
		}else{

			// check student_id, date_of_birth and income...
			if(!is_numeric($student_id) || !is_numeric($income)){
				$errors[] = 'Student ID and Monthly Income must be a number.';
			}else{
				if($income < 0){
					$errors[] = 'Income must be a positive';
				}
			}

			// check date of birth option area.
			if((empty($day) || $day == 'Day') || (empty($month_name) || $month_name == 'Month') || (empty($year) || $year== 'Year')){
				$errors[] = 'Please Select Day or Month Name or Year, For Your Birth Day.';
			}

			// check s_name, f_name and m_name...
			if(strlen($student_name) > 50 || strlen($f_name) >50 || strlen($m_name) > 50){
				$errors[] = 'Student Name or Father Name or Mother Name is too long.';
			}

			// class name select.
			if(empty($class_name) || $class_name == "Select Class"){
				$errors[] = 'You have no yet class.';
			}else{
				$class_name = $_POST['class_name'];
			}

			// Select Father Qualification.
			if(empty($f_qualification) || $f_qualification == "Select Father Qualification"){
				$errors[] = 'You have no yet Father Qualification.';
			}else{
				$f_qualification = $_POST['f_qualification'];
			}

			// Select Mother Qualification.
			if(empty($m_qualification) || $m_qualification == "Select Mother Qualification"){
				$errors[] = 'You have no yet Mother Qualification.';
			}else{
				$m_qualification = $_POST['m_qualification'];
			}

			// Select Father Occupation
			if(empty($f_occupation) || $f_occupation == "Select Father Occupation"){
				$errors[] = 'You have no yet Father Occupation.';
			}else{
				$f_occupation = $_POST['f_occupation'];
			}

			// Select Mother Occupation
			if(empty($m_occupation) || $m_occupation == "Select Mother Occupation"){
				$errors[] = 'You have no yet Mother Occupation.';
			}else{
				$m_occupation = $_POST['m_occupation'];
			}

			// check mobile no.
			if(!preg_match("/^01(1|5|6|7|8|9)\d{8}$/", $mobile)){
				$errors[] = 'Please enter your valid mobile number.';
			}else{
				$mobile = $_POST['mobile'];
			}
			
			// Select Religion.
			if(empty($religion) || $religion == "Select Religion"){
				$errors[] = 'You have no yet Religion.';
			}else{
				$religion = $_POST['religion'];
			}

			// Select Group.
			if(empty($group) || $group == "Select Group"){
				$errors[] = 'You have no yet Group.';
			}else{
				$group = $_POST['group'];
			}
			

			// select gender.
			if(empty($_POST['gender'])){
				$errors[] = 'You have no yet Gender.';
			}else{
				$gender = $_POST['gender']; 
			}

			// Check you ID before apply.
			$query = mysql_query("SELECT * FROM adminssion_info WHERE s_id = $student_id");

			$mysql_num_row = mysql_num_rows($query);

			if($mysql_num_row == 0){
				//$errors[] = 'success.';
			}else if($mysql_num_row >= 1){
				$errors[] = 'Sorry, Your ID already Exists. Please try another ID.';
			}			
		} // end else.



		
		/**
		 * photo upload...
		 */
		$name = $_FILES["image"]["name"];
		$extension = strtolower(substr($name, strpos($name, '.') + 1));
		$tmp_name = $_FILES["image"]["tmp_name"];

		if(isset($name)){
		
			if(!empty($name)){

				if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png'){
					
					//Check it when photo size must be 1048576Kb or 1MB.
					if($_FILES['image']['size'] < 1048576){

						$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
						$image_name = addslashes($_FILES['image']['name']);

					}else{
						$errors[] = 'Picture size must be 1MB';
					}
				}else{
					$errors[] = 'Picture must be a jpg/jpeg/gif/png';
				}
			}else{
				$errors[] = 'Please choose a Picture.';
			}
		}
		

		/**
		 * Don't get error...
		 */
		if(empty($errors)){
			$date_of_birth = $day.'-'.$month_name.'-'.$year;

			// mysql connection here..
			// insert data into database field from the form field....
			$sql = mysql_query("INSERT INTO adminssion_info VALUES ('', '$student_id', '$student_name', '$date_of_birth', '$class_name', '$f_name', '$m_name', '$f_qualification', '$m_qualification', '$present_add', '$permanet_add', '$f_occupation', '$m_occupation', '$gaurdian_name', '$relation', '$income', '$mobile', '$religion', '$group', '$gender', '$image', '$image_name', NOW())");

			if($sql){
				$_SESSION['student_id'] = $student_id;
				$_SESSION['student_name'] = $student_name;
				$_SESSION['date_of_birth'] = $date_of_birth;
				$_SESSION['class_name'] = $class_name;
				$_SESSION['f_name'] = $f_name;
				$_SESSION['m_name'] = $m_name;
				$_SESSION['f_qualification'] = $f_qualification;
				$_SESSION['m_qualification'] = $m_qualification;
				$_SESSION['present_add'] = $present_add;
				$_SESSION['permanet_add'] = $permanet_add;
				$_SESSION['f_occupation'] = $f_occupation;
				$_SESSION['m_occupation'] = $m_occupation;
				$_SESSION['gaurdian_name'] = $gaurdian_name;
				$_SESSION['relation'] = $relation;
				$_SESSION['income'] = $income;
				$_SESSION['mobile'] = $mobile;
				$_SESSION['religion'] = $religion;
				$_SESSION['group'] = $group;
				$_SESSION['gender'] = $gender;
				// header('location:new.php');
			}
		}

	}else{
		/**
		 * check J.Sc user login option
		 * @author AL-AMIN
		 */
		if(isset($_POST['jsc_user_submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$errors = array();

			$query = mysql_query("SELECT * FROM jsc_user");
			while($row = mysql_fetch_assoc($query)){
				$db_username = $row['username'];
				$db_password = $row['password'];

				if(empty($username) || empty($password)){
					$errors[] = 'Please Select username and password.';
				}else{ 

					if($username != $db_username || $password != $db_password){
						$errors[] = 'Username or Password is not correct.';
					}
				}

				if($username == $db_username && $password == $db_password){
					$_SESSION['username'] = $username;
					header('location:jsc_info.php');
				}
			}
		}
	}
?>