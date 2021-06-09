<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Application view</title>
	<link rel="stylesheet" href="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/css/style.css">
</head>
<body>
	<div class="container well">
		<div class="row">
			<div class="span12">
				<header class="alert alert-info">
					<hgroup>
						<h1>Diargarfa Khairash(D.K) High School</h1>
						<h2>Admission Form</h2>
					</hgroup>
				</header><!--  .alert alert-info -->

				<a href="edit_form.php" class="pull-right">Edit</a>
				<a href="index.php" class="pull-right">Back Home</a>

				<?php 
					
					$id 			 	 = $_SESSION['student_id'];
					$name 			 	 = $_SESSION['student_name'];
					$date_of_birth 	 	 = $_SESSION['date_of_birth'];
					$class_name 	 	 = $_SESSION['class_name'];
					$f_name 		 	 = $_SESSION['f_name'];
					$m_name 		 	 = $_SESSION['m_name'];
					$f_qualification 	 = $_SESSION['f_qualification'];
					$m_qualification 	 = $_SESSION['m_qualification'];
					$present_add 	 	 = $_SESSION['present_add'];
					$permanet_add 	 	 = $_SESSION['permanet_add'];
					$f_occupation    	 = $_SESSION['f_occupation'];
					$m_occupation 	 	 = $_SESSION['m_occupation'];
					$gaurdian_name   	 = $_SESSION['gaurdian_name'];
					$relation 		 	 = $_SESSION['relation'];
					$income 		 	 = $_SESSION['income'];
					$mobile 		 	 = $_SESSION['mobile'];
					$religion 		 	 = $_SESSION['religion'];
					$group 			 	 = $_SESSION['group'];
					$gender 		 	 = $_SESSION['gender'];
					// $image 		 	 	 = $_SESSION['image'];
					// $image_name 		 = $_SESSION['image_show'];

					$list = array(
						array("Student ID", "$id"),
						array("Name", "$name"),
						array("Class Name", "$class_name"),
						array("Date of Birth", "$date_of_birth"),
						array("Father Name", "$f_name"),
						array("Mother Name", "$m_name"),
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
						array("Gender", "$gender"),
						array("Group", "$group")
						// array("Image", "$image_show")
					);

					if(count($list) > 0 ) : ?>
						<table class="table table-bordered">
							<caption><h3>Your Submited Infomation.</h3></caption>
							<tbody>
								<?php foreach($list as $row) : array_map('htmlentities', $row); ?>
									<tr>
										<td><?php echo implode('</td><td>', $row); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table><!-- .table table-bordered -->
					<?php endif; 
				?>
			</span12><!-- .span12  -->
		</div><!-- .row  -->
	</div><!-- .container  -->
</body>
</html>