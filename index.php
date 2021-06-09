<?php 
/**
 * Main page or Front page
 * @package Online Form Fill Up
 * @since 1.0
 */
	require_once ( dirname( __FILE__ ) . '/info.php' );
	require_once ( dirname( __FILE__ ) . '/header.php');
?>

	<div class="container well" role="content">
		<div class="row">
			<div class="span12">
				<header class="alert alert-info">
					<hgroup>
						<h1>Diargarfa Khairash(D.K) High School</h1>
						<h2>Admission Form</h2>
						<span id="showTime" style="color:#000; font-weight:bold;"></span>
					</hgroup>
				</header><!--  .alert alert-info -->

				<!--  typer show here.  -->
				<div  class="alert alert-success">
					<p class="pull-right" style="font-size:18px;">Head Line</p>
					
					<div id="typer"></div>
				</div><!--  .alert .alert-success -->

				<!-- Error or success message show here.  -->
				<?php if(isset($errors)) : ?>
					<?php if(!empty($errors)) : ?>
						<?php foreach($errors as $error) : ?>
							<div class="alert alert-error">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<p><?php echo $error; ?></p>
							</div><!-- .alert .alert-error  -->
						<?php endforeach; ?>
					<?php else : ?>
						<div class="alert alert-success">
							<a href="" class="close" data-dismiss="alert">&times;</a>
							<p>
								<?php echo 'Well done! You have successfully submited your information.'; ?>
							</p>
						</div><!--  .alert .alert-success -->
					<?php endif; ?>
				<?php endif; ?>

				<a href="#jsc" class="pull-right btn btn-info" data-toggle="modal">J.Sc Info</a>
			</div><!-- .span12  -->
		</div><!--  .row -->

		<div class="row">
			<form action="" class="form-horizontal" name="image_form" method="post" enctype="multipart/form-data" id="image_name">
				<div class="span6">
					<div class="control-group">
						<label class="control-label" for="input_student_id">Student ID:</label>
						<div class="controls">
							<input type="text" id="input_student_id" name="student_id" value="<?php echo (isset($_POST['student_id'])) ? $_POST['student_id'] : $_POST['student_id'] = ''; ?>" placeholder="Student ID" class="span2" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_student_name">Student Name:</label>
						<div class="controls">
							<input type="text" id="input_student_name" name="student_name" value="<?php echo (isset($_POST['student_name'])) ? $_POST['student_name'] : $_POST['student_name'] = ''; ?>" placeholder="Student Name" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_date">Date of Birth:</label>
						<div class="controls">
							<select name="day" id="input_date" style="width:70px;">
								<option><?php echo (isset($_POST['day'])) ? $_POST['day'] : $_POST['day'] = 'Day'; ?></option>
								<?php for($i = 1; $i<= 31; $i++) : ?>
									<option value="<?php echo $i; ?>" <?php if(isset($day) && $day == $i); ?>><?php echo $i; ?></option>
								<?php endfor; ?>
							</select>
							
							<select name="month_name" id="input_date" style="width:110px;">
								<option><?php echo (isset($_POST['month_name'])) ? $_POST['month_name'] : $_POST['month_name'] = 'Month'; ?></option>
								<?php 
									$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
									foreach($months as $month) : ?>
									<option value="<?php echo $month; ?>" <?php if(isset($month_name) && $month_name == $month); ?>><?php echo $month; ?></option>	
								<?php endforeach; ?>
							</select>

							<select name="year" id="input_date" style="width:80px;">
								<option><?php echo (isset($_POST['year'])) ? $_POST['year'] : $_POST['year'] = 'Year'; ?></option>
								<?php for($i = 1900; $i<= 2100; $i++) : ?>
									<option value="<?php echo $i; ?>" <?php if(isset($year) && $year == $i); ?>><?php echo $i; ?></option>
								<?php endfor; ?>
							</select>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_class_name">Class Name:</label>
						<div class="controls">
							<select name="class_name" id="input_class_name">
							    <option><?php echo (isset($_POST['class_name'])) ? $_POST['class_name'] : $_POST['class_name'] = 'Select Class'; ?></option>
							    <option value="Six" <?php if(isset($class_name) && $class_name == "Six"); ?>>Six</option>
							    <option value="Seven" <?php if(isset($class_name) && $class_name == "Seven"); ?>>Seven</option>
						        <option value="Eight" <?php if(isset($class_name) && $class_name == "Eight"); ?>>Eight</option>
							    <option value="Nine" <?php if(isset($class_name) && $class_name == "Nine"); ?>>Nine</option>
						        <option value="Ten" <?php if(isset($class_name) && $class_name == "Ten"); ?>>Ten</option>
	  						</select><!-- #input_class_name  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->
					
					<div class="control-group">
						<label class="control-label" for="input_father_name">Father's Name:</label>
						<div class="controls">
							<input type="text" id="input_father_name" name="f_name" value="<?php echo (isset($_POST['f_name'])) ? $_POST['f_name'] : $_POST['f_name'] = ''; ?>" placeholder="Father Name" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->


					<div class="control-group">
						<label class="control-label" for="input_mother_name">Mother's Name:</label>
						<div class="controls">
							<input type="text" id="input_mother_name" name="m_name" value="<?php echo (isset($_POST['m_name'])) ? $_POST['m_name'] : $_POST['m_name'] = ''; ?>" placeholder="Mother Name" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_father_qualification">Father's Qualification:</label>
						<div class="controls">
							<select name="f_qualification" id="input_father_qualification">
					            <option><?php echo (isset($_POST['f_qualification'])) ? $_POST['f_qualification'] : $_POST['f_qualification'] = 'Select Father Qualification'; ?></option>
						        <option value="P.Sc" <?php if(isset($m_qualification) && $m_qualification == "P.Sc"); ?>>P.Sc</option>
						        <option value="J.Sc" <?php if(isset($m_qualification) && $m_qualification == "J.Sc"); ?>>J.Sc</option>
						        <option value="S.Sc" <?php if(isset($m_qualification) && $m_qualification == "S.Sc"); ?>>S.Sc</option>
					            <option value="H.Sc" <?php if(isset($m_qualification) && $m_qualification == "H.Sc"); ?>>H.Sc</option>
						        <option value="B.A" <?php if(isset($m_qualification) && $m_qualification == "B.A"); ?>>B.A</option>
						        <option value="M.A" <?php if(isset($m_qualification) && $m_qualification == "M.A"); ?>>M.A</option>
					            <option value="B.Sc(Honours)" <?php if(isset($m_qualification) && $m_qualification == "B.Sc(Honours)"); ?>>B.Sc(Honours)</option>
					            <option value="M.Sc(Honours)" <?php if(isset($m_qualification) && $m_qualification == "M.Sc(Honours)"); ?>>M.Sc(Honours)</option>
					            <option value="B.Sc(Eng.)" <?php if(isset($m_qualification) && $m_qualification == "B.Sc(Eng.)"); ?>>B.Sc(Eng.)</option>
					            <option value="M.Sc(Eng.)" <?php if(isset($m_qualification) && $m_qualification == "M.Sc(Eng.)"); ?>>M.Sc(Eng.)</option>
					            <option value="MBBS" <?php if(isset($m_qualification) && $m_qualification == "MBBS"); ?>>MBBS</option>
					            <option value="None" <?php if(isset($m_qualification) && $m_qualification == "None"); ?>>None</option>
							</select><!--  #input_father_qualification -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->


					<div class="control-group">
						<label class="control-label" for="input_mother_qualification">Mother's Qualification:</label>
						<div class="controls">
							<select name="m_qualification" id="input_mother_qualification">
					            <option><?php echo (isset($_POST['m_qualification'])) ? $_POST['m_qualification'] : $_POST['m_qualification'] = 'Select Mother Qualification'; ?></option>
						        <option value="P.Sc" <?php if(isset($m_qualification) && $m_qualification == "P.Sc"); ?>>P.Sc</option>
						        <option value="J.Sc" <?php if(isset($m_qualification) && $m_qualification == "J.Sc"); ?>>J.Sc</option>
						        <option value="S.Sc" <?php if(isset($m_qualification) && $m_qualification == "S.Sc"); ?>>S.Sc</option>
					            <option value="H.Sc" <?php if(isset($m_qualification) && $m_qualification == "H.Sc"); ?>>H.Sc</option>
						        <option value="B.A" <?php if(isset($m_qualification) && $m_qualification == "B.A"); ?>>B.A</option>
						        <option value="M.A" <?php if(isset($m_qualification) && $m_qualification == "M.A"); ?>>M.A</option>
					            <option value="B.Sc(Honours)" <?php if(isset($m_qualification) && $m_qualification == "B.Sc(Honours)"); ?>>B.Sc(Honours)</option>
					            <option value="M.Sc(Honours)" <?php if(isset($m_qualification) && $m_qualification == "M.Sc(Honours)"); ?>>M.Sc(Honours)</option>
					            <option value="B.Sc(Eng.)" <?php if(isset($m_qualification) && $m_qualification == "B.Sc(Eng.)"); ?>>B.Sc(Eng.)</option>
					            <option value="M.Sc(Eng.)" <?php if(isset($m_qualification) && $m_qualification == "M.Sc(Eng.)"); ?>>M.Sc(Eng.)</option>
					            <option value="MBBS" <?php if(isset($m_qualification) && $m_qualification == "MBBS"); ?>>MBBS</option>
					            <option value="None" <?php if(isset($m_qualification) && $m_qualification == "None"); ?>>None</option>
							</select><!-- #input_mother_qualification  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_present_adress">Present Address:</label>
						<div class="controls">
							<textarea name="present_add" id="input_present_adress" cols="20" rows="5" placeholder = "Address Here..." required><?php echo (isset($_POST['present_add'])) ? $_POST['present_add'] : $_POST['present_add'] = ''; ?></textarea>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_permanet_adress">Permanet Address:</label>
						<div class="controls">
							<textarea name="permanet_add" id="input_permanet_adress" cols="20" rows="5" placeholder="Permanent address..." required><?php echo (isset($_POST['present_add'])) ? $_POST['present_add'] : $_POST['present_add'] = ''; ?></textarea>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->


					<div class="control-group">
						<label class="control-label" for="input_father_ocupation">Father's Occupation:</label>
						<div class="controls">
							<select name="f_occupation" id="input_father_occupation">
						        <option><?php echo (isset($_POST['f_occupation'])) ? $_POST['f_occupation'] : $_POST['f_occupation'] = 'Select Father Occupation'; ?></option>
						        <option value="Farmer" <?php if(isset($f_occupation) && $f_occupation == "Farmer"); ?>>Farmer</option>
						        <option value="Teacher" <?php if(isset($f_occupation) && $f_occupation == "Teacher"); ?>>Teacher</option>
						        <option value="Advocate" <?php if(isset($f_occupation) && $f_occupation == "Advocate"); ?>>Advocate</option>
						        <option value="Govment Servic" <?php if(isset($f_occupation) && $f_occupation == "Govment Servic"); ?>>Govment Servic</option>
						        <option value="Business" <?php if(isset($f_occupation) && $f_occupation == "Business"); ?>>Business</option>
						        <option value="None" <?php if(isset($f_occupation) && $f_occupation == "None"); ?>>None</option>
							</select><!-- #input_father_ocupation  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_mother_ocupation">Mother's Occupation:</label>
						<div class="controls">
							<select name="m_occupation" id="input_mother_occupation">
						        <option><?php echo (isset($_POST['m_occupation'])) ? $_POST['m_occupation'] : $_POST['m_occupation'] = 'Select Mother Occupation'; ?></option>
						        <option value="House Make" <?php if(isset($m_occupation) && $m_occupation == "House Make"); ?>>House Maker</option>
							    <option value="Farmer" <?php if(isset($m_occupation) && $m_occupation == "Farmer"); ?>>Farmer</option>
						        <option value="Teacher" <?php if(isset($m_occupation) && $m_occupation == "Teacher"); ?>>Teacher</option>
						        <option value="Advocate" <?php if(isset($m_occupation) && $m_occupation == "Advocate"); ?>>Advocate</option>
						        <option value="Govment servic" <?php if(isset($m_occupation) && $m_occupation == "Govment servic"); ?>>Govment Servic</option>
						        <option value="Business" <?php if(isset($m_occupation) && $m_occupation == "Business"); ?>>Business</option>
						        <option value="None" <?php if(isset($m_occupation) && $m_occupation == "None"); ?>>None</option>
							</select><!-- input_mother_ocupation  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_gaurdian_name">Gaurdian Name:</label>
						<div class="controls">
							<input type="text" id="input_gaurdian_name" name="gaurdian_name" value="<?php echo (isset($_POST['gaurdian_name'])) ? $_POST['gaurdian_name'] : $_POST['gaurdian_name'] = ''; ?>" placeholder="Gaurdian Name" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_relation_name">Relation:</label>
						<div class="controls">
							<input type="text" id="input_relation_name" name="relation" value="<?php echo (isset($_POST['relation'])) ? $_POST['relation'] : $_POST['relation'] = ''; ?>" placeholder="Relation Name" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					
					<div class="control-group">
						<label class="control-label" for="input_Father_income">Father's Income / Month:</label>
						<div class="controls">
							<input type="text" id="input_Father_income" name="income" value="<?php echo (isset($_POST['income'])) ? $_POST['income'] : $_POST['income'] = ''; ?>" placeholder="Father's Incomes" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_mobile_no">Father's Mobile:</label>
						<div class="controls">
							<input type="text" id="input_mobile_no" name="mobile" value="<?php echo (isset($_POST['mobile'])) ? $_POST['mobile'] : $_POST['mobile'] = ''; ?>"  placeholder="88017XXXXXXXX" required>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<div class="controls">
							<input type="submit" name="submit" value="Submit Info" class="btn btn-inverse">
						</div><!-- .controls  -->
					</div><!-- .control-group  -->
				</div><!--  .span6 -->

				<div class="span6">

					<div class="control-group">
						<div class="controls">
							<div id="preview">
								<p><img src="images/noimage.png" name="user_img" alt="" class="img-polaroid prevImg"></p>
							</div>
							
							<input type="file" name="image" id="photoimg" multiple>
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="input_religion">Religion:</label>
						<div class="controls">
							<select name="religion" id="input_religion">
								<option><?php echo (isset($_POST['religion'])) ? $_POST['religion'] : $_POST['religion'] = 'Select Religion'; ?></option>
							    <option value="Islam" <?php if(isset($religion) && $religion == "Islam"); ?>>Islam</option>
								<option value="Hindu" <?php if(isset($religion) && $religion == "Hindu"); ?>>Hindu</option>
								<option value="Christian" <?php if(isset($religion) && $religion == "Christian"); ?>>Christian</option>
							    <option value="Budhha" <?php if(isset($religion) && $religion == "Budhha"); ?>>Budhha</option>
								<option value="Others" <?php if(isset($religion) && $religion == "Others"); ?>>Others</option>				      
						   </select><!-- #input_religion  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="student_group">Student Group:</label>
						<div class="controls">
							<select name="group" id="student_group">
							    <option><?php echo (isset($_POST['group'])) ? $_POST['group'] : $_POST['group'] = 'Select Group'; ?></option>
							    <option value="Science" <?php if(isset($group) && $group == "Science"); ?>>Science</option>
							    <option value="Commerce" <?php if(isset($group) && $group == "Commerce"); ?>>Commerce</option>
								<option value="Arts" <?php if(isset($group) && $group == "Arts"); ?>>Arts</option>
								<option value="None" <?php if(isset($group) && $group == "None"); ?>>None</option>				      
						   </select><!-- #student_group  -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->

					<div class="control-group">
						<label class="control-label" for="sex">Sex:</label>
						<div class="controls">
							<label class="radio">
								<input type="radio" name="gender" value="Male" <?php if(isset($gender) && $gender == "Male"); ?>>Male
							</label><!-- .radio  -->	      
							<label class="radio">
								<input type="radio" name="gender" value="Female" <?php if(isset($gender) && $gender == "Female"); ?>>Female
							</label><!--  .radio -->
						</div><!-- .controls  -->
					</div><!-- .control-group  -->
				</div><!-- .span6  -->
			</form><!--  .form-horizontal .well -->
		</div><!-- .row  -->
	</div><!-- .container  -->
<?php require_once 'footer.php'; ?>



<div id="jsc" class="modal hide fade">
	<div class="modal-header">
		<a href="" class="close" data-dismiss="modal">&times;</a>
		<h3>You Must Login.</h3>
	</div><!--  .modal-header  -->

	<form action="" method="post" class="form-horizontal">
		<div class="modal-body">
			<div class="control-group">
				<label for="username" class="control-label">Username</label>
				<div class="controls">
					<input type="text" name="username" id="username" placeholder="Username">
				</div><!-- .controls  -->
			</div><!--  .control-group  -->

			<div class="control-group">
				<label for="password" class="control-label">Password</label>
				<div class="controls">
					<input type="password" name="password" id="password" placeholder="password">
				</div><!-- .controls  -->
			</div><!--  .control-group  -->
			
			<a href="password_forgot.php" class="btn btn-warning">Forgot Password?</a>
		</div><!--  .modal-body  -->

		<div class="modal-footer">
			<input type="submit" name="jsc_user_submit" value="Login" class="btn btn-primary">
		</div><!--  .modal-footer  -->
	</form><!-- .form-horizontal   -->
</div><!--  #jsc .modal hide fade -->