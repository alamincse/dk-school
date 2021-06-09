<?php 
/**
 * Description: Password information/password change.
 * @author  AL-AMIN
 * @package Online Admission same oDesk test ans.
 */
	require_once ( dirname( __FILE__ ) . '/init.php' );
	
	/**
	 * password change
	 */
	function change_password(){
		session_start();
		$error = array();

		if(isset($_POST['password_change'])){
			$username = htmlentities(trim($_POST['username']));
			$email    = htmlentities(trim($_POST['email']));

			$query = mysql_query("SELECT * FROM jsc_user");
			while($row = mysql_fetch_array($query)){
				$db_username = $row['username'];
				$db_email = $row['email'];

				if(empty($username) || empty($email)){
					$error[] = 'Please Select Username and Email.';
				}else{ 

					if($username != $db_username){
						$error[] = 'Username is not correct.';
					}

					// if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					// 	$error[] = 'Please Select a valid email address.';
					// }

					if($email != $db_email){
						$error[] = 'Email is not correct.';
					}
				}

				if($username == $db_username && $email == $db_email){
					header('location:password_change.php');
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
				}
			}
		}

		return $error;
	}

	/**
	 * submit confirm password.
	 * @author AL-AMIN	
	 */
	function confirm_password_change(){
		session_start();
		$errors = array();
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];

		if(isset($_POST['confirm_password_change'])){
			$new_password 	  = htmlentities(trim($_POST['Newpassword']));
			$confirm_password = htmlentities(trim($_POST['Confirmpassword']));
			$show_captcha     = htmlentities(trim($_POST['show_captcha']));
			$captcha 		  = htmlentities(trim($_POST['captcha']));

			$query = mysql_query("SELECT * FROM jsc_user");
			while($row = mysql_fetch_array($query)){

				if(empty($new_password) || empty($confirm_password)){
					$errors[] = 'Please Select Password Field and than submit again.';
				}elseif($new_password != $confirm_password){
					$errors[] = 'Don\'t match your password.';
				}elseif(empty($captcha)){
					$errors[] = 'Please select Captcha Field.';
				}elseif($show_captcha != $captcha){
					$errors[] = 'Don\'t match Captcha. please try again.';
				}else{ 
					mysql_query("UPDATE jsc_user SET password = '$new_password' WHERE email = '$email'");
					
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $new_password;
					header('location:password_successful.php');
				}
			}
		}

		return $errors;
	}


	/**
	 * J.Sc Information 
	 * @author  AL-AMIN
	 * @package Online Admission
	 */
	function jsc_information(){
		$errors = array();

		if(isset($_POST['submit'])){
			$student_id  	 = htmlentities(trim($_POST['studentID']));
			$student_name 	 = htmlentities(trim($_POST['student-name']));
			$class_roll 	 = htmlentities(trim($_POST['class-roll']));
			$day 	         = htmlentities(trim($_POST['day']));
			$month_name 	 = htmlentities(trim($_POST['month']));
			$year 	         = htmlentities(trim($_POST['year']));
			$f_name 		 = htmlentities(trim($_POST['father-name']));
			$m_name  		 = htmlentities(trim($_POST['mother-name']));
			$gaurdian_name   = htmlentities(trim($_POST['gaurdian-name']));
			$relation        = htmlentities(trim($_POST['relation']));
			$f_qualification = htmlentities(trim($_POST['f_qualification']));
			$m_qualification = htmlentities(trim($_POST['m_qualification']));
			$present_add     = htmlentities(trim($_POST['present_add']));
			$permanet_add    = htmlentities(trim($_POST['permanet_add']));
			$f_occupation    = htmlentities(trim($_POST['f_occupation']));
			$m_occupation    = htmlentities(trim($_POST['m_occupation']));
			$income 	     = htmlentities(trim($_POST['income']));
			$mobile 		 = htmlentities(trim($_POST['mobile']));
			$religion 		 = htmlentities(trim($_POST['religion']));
			$group 			 = htmlentities(trim($_POST['group']));		
			$board 			 = htmlentities(trim($_POST['board']));		
			$year 			 = htmlentities(trim($_POST['pass-year']));		
			$roll 			 = htmlentities(trim($_POST['roll']));		
			$reg 			 = htmlentities(trim($_POST['reg']));		
			$image 			 = htmlentities(trim($_POST['image']));


			if(empty($student_id) || empty($student_name) || empty($class_roll) || empty($day) || empty($month_name) || empty($year) || empty($f_name) || empty($m_name) || empty($f_qualification) || empty($m_qualification) || empty($present_add) || empty($permanet_add) || empty($f_occupation) || empty($m_occupation) || empty($gaurdian_name) || empty($relation) || empty($income) || empty($mobile) || empty($religion) || empty($group) || empty($year) || empty($board) || empty($roll) || empty($reg) || empty($image)){
				$errors[] = 'Some fields are required Please check it and than submit again.';
			}else{

				if(!is_numeric($roll)){
					$errors[] = 'Roll must be prositive number.';
					// echo "<script type='text/javascript'>alert('wrong');</script>";
				}elseif(!is_numeric($reg)){
					$errors[] = 'Registration number must be prositive';
				}elseif(strlen($roll) > 10){
					$errors[] = 'Roll number length must be 10 disit.';
				}elseif(strlen($reg) > 10){
					$errors[] = 'Registration number length must be 10 disit.';
				}elseif($board == 'Select Board'){
					$errors[] = 'Please select board name.';
				}elseif(!is_numeric($student_id) || !is_numeric($income)){
					$errors[] = 'Student ID and Monthly Income must be a number.';
				}elseif($income < 0){
					$errors[] = 'Income must be a positive';
				}elseif((empty($day) || $day == 'Day') || (empty($month_name) || $month_name == 'Month') || (empty($year) || $year== 'Year')){
					$errors[] = 'Please Select Day or Month Name or Year, For Your Birth Day.';
				}elseif(strlen($student_name) > 50 || strlen($f_name) >50 || strlen($m_name) > 50){
					$errors[] = 'Student Name or Father\'s Name or Mother\'s Name is too long.';
				}elseif(empty($f_qualification) || $f_qualification == "Select Father Qualification"){
					$errors[] = 'You have no yet Father Qualification.';
				}elseif(empty($m_qualification) || $m_qualification == "Select Mother Qualification"){
					$errors[] = 'You have no yet Mother Qualification.';
				}elseif(empty($f_occupation) || $f_occupation == "Select Father Occupation"){
					$errors[] = 'You have no yet Father Occupation.';
				}elseif(empty($m_occupation) || $m_occupation == "Select Mother Occupation"){
					$errors[] = 'You have no yet Mother Occupation.';
				}elseif(empty($religion) || $religion == "Select Religion"){
					$errors[] = 'You have no yet Religion.';
				}elseif(empty($group) || $group == "Select Group"){
					$errors[] = 'You have no yet Group.';
				}elseif(empty($_POST['gender'])){
					$errors[] = 'You have no yet Gender.';
				}else{
					$gender = $_POST['gender']; 
				}

				// check ID before you applicaiton.
				$query = mysql_query("SELECT * FROM jsc_info_science WHERE s_id = $student_id");

				$mysql_num_row = mysql_num_rows($query);

				if($mysql_num_row == 0){
					//$errors[] = 'success.';
				}else if($mysql_num_row >= 1){
					$errors[] = 'Sorry, Your ID already Exists. Please try another ID.';
				}	

			} /* end else. */

			
			/**
			 * photo upload...
			 * Author: AL-AMIN
			 * @package Online admission
			 */
			// $name = $_FILES["image"]["name"];
			// $extension = strtolower(substr($name, strpos($name, '.') + 1));
			// $tmp_name = $_FILES["image"]["tmp_name"];

			// if(isset($name)){
			
			// 	if(!empty($name)){

			// 		if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'png'){
						
			// 			//Check it when photo size must be 30720Kb or 30KB.
			// 			if($_FILES['image']['size'] < 30720){

			// 				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			// 				$image_name = addslashes($_FILES['image']['name']);

			// 			}else{
			// 				$errors[] = 'Picture size must be 30KB';
			// 			}
			// 		}else{
			// 			$errors[] = 'Picture must be a jpg/jpeg/gif/png';
			// 		}
			// 	}else{
			// 		$errors[] = 'Please choose a Picture.';
			// 	}
			// }
			

			
			// Don't get error...
			if(empty($errors)){
				$date_of_birth = $day.'-'.$month_name.'-'.$year;

				


				// insert data into database field from the form field....
				if($group == 'Science'){

					// Science group collection.
					$bangla 	   = htmlentities(trim($_POST['bangla']));		
					$english 	   = htmlentities(trim($_POST['english']));		
					$math 		   = htmlentities(trim($_POST['math']));		
					$religion      = htmlentities(trim($_POST['religion']));		
					$health_sports = htmlentities(trim($_POST['health_sports']));		
					$bangladesh    = htmlentities(trim($_POST['bangladesh']));		
					$physice 	   = htmlentities(trim($_POST['physice']));		
					$chemistry 	   = htmlentities(trim($_POST['chemistry']));		
					$biology 	   = htmlentities(trim($_POST['biology']));		
					$higher_math   = htmlentities(trim($_POST['higher_math']));		
					$optional 	   = htmlentities(trim($_POST['optional']));

					if(empty($bangla) || empty($english) || empty($math) || empty($religion) || empty($health_sports) || empty($bangladesh) || empty($physice) || empty($chemistry) || empty($higher_math) || empty($biology) || empty($optional)){
						$errors[] = 'Please Select your registered subject name.';
					}else{
						$sql = mysql_query("INSERT INTO jsc_info_science VALUES ('', '$student_id', '$student_name', '$class_roll', '$f_name', '$m_name', '$gaurdian_name', '$gaurdian_relation', '$date_of_birth', '$f_qualification', '$m_qualification', '$present_add', '$permanet_add', '$f_occupation', '$m_occupation', '$income', '$mobile', '$religion', '$group', '$gender', '$board', '$year', '$roll', '$reg', '$image', '$bangla', '$english', '$math', '$religion_subject', '$health_sports', '$bangladesh', '$physice', '$chemistry', '$biology', '$higher_math', '$optional' NOW())");
					}
				}elseif($group == 'Commerce'){

					// Commerce group collection.
					$bangla 	   	  = htmlentities(trim($_POST['bangla']));		
					$english 	   	  = htmlentities(trim($_POST['english']));		
					$math 		   	  = htmlentities(trim($_POST['math']));		
					$religion_subject = htmlentities(trim($_POST['religion_subject']));		
					$health_sports 	  = htmlentities(trim($_POST['health_sports']));		
					$science       	  = htmlentities(trim($_POST['science']));		
					$business 	   	  = htmlentities(trim($_POST['business']));		
					$finance 	   	  = htmlentities(trim($_POST['finance']));		
					$accounting    	  = htmlentities(trim($_POST['accounting']));		
					$optional 	   	  = htmlentities(trim($_POST['optional']));

					if(empty($bangla) || empty($english) || empty($math) || empty($religion) || empty($health_sports) || empty($science) || empty($business) || empty($finance) || empty($accounting) || empty($optional)){
						$errors[] = 'Please Select your registered subject name.';
					}else{
						$sql = mysql_query("INSERT INTO jsc_info_arts VALUES ('', '$student_id', '$student_name', '$class_roll', '$f_name', '$m_name', '$gaurdian_name', '$gaurdian_relation', '$date_of_birth', '$f_qualification', '$m_qualification', '$present_add', '$permanet_add', '$f_occupation', '$m_occupation', '$income', '$income', '$mobile', '$religion', '$group', '$gender', '$board', '$year', '$roll', '$reg', '$image', '$bangla', '$english', '$math', '$religion_subject', '$health_sports', '$science', '$business', '$finance', '$accounting', '$optional', NOW())");
					}
				}else{

					// Arts group collection.
					$bangla 	   		= htmlentities(trim($_POST['bangla']));		
					$english 	   		= htmlentities(trim($_POST['english']));		
					$math 		   		= htmlentities(trim($_POST['math']));		
					$religion_subject 	= htmlentities(trim($_POST['religion_subject']));		
					$health_sports 		= htmlentities(trim($_POST['health_sports']));		
					$science       		= htmlentities(trim($_POST['science']));		
					$history 	   		= htmlentities(trim($_POST['history']));		
					$geography 	   		= htmlentities(trim($_POST['geography']));		
					$economics    		= htmlentities(trim($_POST['economics']));		
					$civics_citizenship = htmlentities(trim($_POST['civics_citizenship']));		
					$optional 	   		= htmlentities(trim($_POST['optional']));

					if(empty($bangla) || empty($english) || empty($math) || empty($religion) || empty($health_sports) || empty($science) || empty($history) || empty($geography) || empty($economics) || empty($civics_citizenship) || empty($optional)){
						$errors[] = 'Please Select your registered subject name.';
					}else{
						$sql = mysql_query("INSERT INTO jsc_info_arts VALUES ('', '$student_id', '$student_name', '$class_roll', '$f_name', '$m_name', '$gaurdian_name', '$gaurdian_relation', '$date_of_birth', '$f_qualification', '$m_qualification', '$present_add', '$permanet_add', '$f_occupation', '$m_occupation', '$income', '$income', '$mobile', '$religion', '$group', '$gender', '$board', '$year', '$roll', '$reg', '$image', '$bangla', '$english', '$math', '$health_sports', '$religion_subject', '$history', '$geography', '$science', '$economics', '$civics_citizenship', '$optional', NOW())");
					}
				}
			}
		}

		return $errors;
	}
?>

