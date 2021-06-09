<?php 
	session_start(); 
	if(!isset($_SESSION['username'])){
		header('location:index.php');
		exit();
	}

	require_once ( dirname( __FILE__ ) . '/header.php');
	require_once ( dirname( __FILE__ ) . '/user_functions.php');
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
					
					<ul class="nav nav-pills pull-right pass">
						<li><a href=""><?php echo 'Welcome ' .$_SESSION['username']; ?></a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul><!-- .nav .nav-pills .pull-right .pass -->
				</header><!--  .alert alert-info -->

				<?php 
					// store all information by $errors variable from jec_information() Function.
					$errors = jsc_information() ;
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

				<div class="jsc-info">
					<h3>J.Sc Information</h3>

					<form action="" class="form-horizontal" method="post" name="search_form">
						<div class="row">
							<div class="span12">
								<ul class="nav nav-pills form-header-list">
									<li><label>Student ID: <input type="text" name="studentID" style="width:125px;" placeholder="Student ID" required></label></li>
									
									<li>
										<label>Passing Year 
											<select style="width:80px;" name="pass-year">
												<?php for($i = 2010; $i <= 2030; $i++): ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</label>
									</li>

									<li>
										<label>Board
											<select style="width:150px;" name="board">
												<?php $boards = array('Select Board', 'Dhaka', 'Chittagong', 'Rajshahi', 'Khulna', 'Sylhet', 'Barisal', 'Jessore', 'Comilla', 'Dinajpur', 'Madrasah', 'BTEB', 'BOU'); 
													foreach($boards as $Board) :
												?>
													<option value="<?php echo $Board; ?>"><?php echo $Board; ?></option>
												<?php endforeach; ?>
											</select>
										</label>
									</li>

									<li>
										<label>Roll <input type="text" name="roll" placeholder="Roll No." class="span2" required></label>	
									</li>

									<li>
										
										<label>Reg <input type="text" name="reg" placeholder="Registration No." class="span2" required></label>	
									</li>
								</ul><!--  .nav .nav-pills .form-header-list -->


								<div class="page-header"></div><!-- .page-header  -->

								<div class="alert alert-success">
									<h3>Student Information</h3>
								</div><!--  .alert .alert-success -->
							</div><!-- .span12  -->
						</div><!--  .row -->

					
						<div class="row">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="class-roll">Class Roll:</label>
									<div class="controls">
										<input type="text" id="class-roll" name="class-roll" placeholder="Class Roll." required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input-student-name">Student's Name:</label>
									<div class="controls">
										<input type="text" id="input-student-name" name="student-name" placeholder="Student Name" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input-father-name">Father's Name:</label>
									<div class="controls">
										<input type="text" id="input-father-name" name="father-name" placeholder="Father Name" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input-mother-name">Mother's Name:</label>
									<div class="controls">
										<input type="text" id="input-mother-name" name="mother-name" placeholder="Mother Name" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input-gaurdian">Gaurdian Name:</label>
									<div class="controls">
										<input type="text" id="input-gaurdian" name="gaurdian-name" placeholder="Gaurdian Name" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="gaurdian">Gaurdian Relation:</label>
									<div class="controls">
										<input type="text" id="gaurdian" name="relation" placeholder="Gaurdian Relation" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_date">Date of Birth:</label>
									<div class="controls">
										<select name="day" id="input_date" style="width:70px;">
											<option>Day</option>
											<?php for($i = 1; $i<= 31; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
										
										<select name="month" id="input_date" style="width:110px;">
											<?php 
												$months = array('Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
												foreach($months as $month) : ?>
												<option value="<?php echo $month; ?>"><?php echo $month; ?></option>	
											<?php endforeach; ?>
										</select>

										<select name="year" id="input_date" style="width:80px;">
											<option>Year</option>
											<?php for($i = 1900; $i<= 2100; $i++) : ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endfor; ?>
										</select>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_father_qualification">Father Qualification:</label>
									<div class="controls">
										<select name="f_qualification" id="input_father_qualification">
								            <option>Select Father Qualification</option>
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
									<label class="control-label" for="input_mother_qualification">Mother Qualification:</label>
									<div class="controls">
										<select name="m_qualification" id="input_mother_qualification">
								            <option>Select Mother Qualification</option>
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
										<textarea name="present_add" id="input_present_adress" cols="20" rows="5" placeholder = "Address Here..." required></textarea>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_permanet_adress">Permanet Address:</label>
									<div class="controls">
										<textarea name="permanet_add" id="input_permanet_adress" cols="20" rows="5" placeholder = "Address Here..." required></textarea>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->


								<div class="control-group">
									<label class="control-label" for="input_father_ocupation">Father Occupation:</label>
									<div class="controls">
										<select name="f_occupation" id="input_father_occupation">
									        <option>Select Father Occupation</option>
									        <option value="Farmer" <?php if(isset($f_ocupation) && $f_ocupation == "Farmer"); ?>>Farmer</option>
									        <option value="Teacher" <?php if(isset($f_ocupation) && $f_ocupation == "Teacher"); ?>>Teacher</option>
									        <option value="Advocate" <?php if(isset($f_ocupation) && $f_ocupation == "Advocate"); ?>>Advocate</option>
									        <option value="Govment Servic" <?php if(isset($f_ocupation) && $f_ocupation == "Govment Servic"); ?>>Govment Servic</option>
									        <option value="Business" <?php if(isset($f_ocupation) && $f_ocupation == "Business"); ?>>Business</option>
									        <option value="None" <?php if(isset($f_ocupation) && $f_ocupation == "None"); ?>>None</option>
										</select><!-- #input_father_ocupation  -->
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_mother_ocupation">Mother Occupation:</label>
									<div class="controls">
										<select name="m_occupation" id="input_mother_occupation">
									        <option>Select Mother Occupation</option>
									        <option value="House Make" <?php if(isset($m_ocupation) && $m_ocupation == "House Make"); ?>>House Maker</option>
										    <option value="Farmer" <?php if(isset($m_ocupation) && $m_ocupation == "Farmer"); ?>>Farmer</option>
									        <option value="Teacher" <?php if(isset($m_ocupation) && $m_ocupation == "Teacher"); ?>>Teacher</option>
									        <option value="Advocate" <?php if(isset($m_ocupation) && $m_ocupation == "Advocate"); ?>>Advocate</option>
									        <option value="Govment servic" <?php if(isset($m_ocupation) && $m_ocupation == "Govment servic"); ?>>Govment Servic</option>
									        <option value="Business" <?php if(isset($m_ocupation) && $m_ocupation == "Business"); ?>>Business</option>
									        <option value="None" <?php if(isset($m_ocupation) && $m_ocupation == "None"); ?>>None</option>
										</select><!-- input_mother_ocupation  -->
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_Father_income">Father's Income / Month:</label>
									<div class="controls">
										<input type="text" id="input_Father_income" name="income" placeholder="Father's Income" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="input_mobile_no">Father's Mobile:</label>
									<div class="controls">
										<input type="text" id="input_mobile_no" name="mobile" placeholder="+880 XXXX-XXXXXX" required>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->
							</div><!-- .span6  -->

							<div class="span6">	
								<div class="control-group">
									<div class="controls">
										<p><img src="images/noimage.png" name="user_img" alt="" class="img-polaroid"></p>
										<input type="file" name="image">
									</div><!-- .controls  -->
								</div><!-- .control-group  -->


								<div class="control-group">
									<label class="control-label" for="select">Nationality:</label>
									<div class="controls">
										<select name="select-name" id="select" onchange="populate(this.id, 'use')">
											<option value="select-item">Select Nationality</option>
											<option value="bangladeshi">Bangladeshi</option>
											<option value="others">Others</option>
										</select>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="select">Where you are ?</label>
									<div class="controls">
										<select name="option-name" id="use">
											<!--  show Nationality when you want. -->
											<option value="">Please Select Nationality</option>
										</select>
									</div><!-- .controls  -->
								</div><!-- .control-group  -->
									

								<div class="control-group">
									<label class="control-label" for="religion">Religion:</label>
									<div class="controls">
										<select name="religion" id="religion">
										    <option value="s_religion">Select Religion</option>
										    <option value="islam">Islam</option>
											<option value="hindu">Hindu</option>
											<option value="christian">Christian</option>
										    <option value="buddha">Buddha</option>
									   </select><!-- #input_religion  -->
									</div><!-- .controls  -->
								</div><!-- .control-group  -->

								<div class="control-group">
									<label class="control-label" for="group">Student Group:</label>
									<div class="controls">
										<select name="group" id="group">
											<option value="s_group">Select Group</option>
											<option value="science">Science</option>
											<option value="commerce">Commerce</option>
											<option value="arts">Arts</option>
										</select>
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

								<h4 class="lead">Registered Subjects</h4>
								<div id="registered">
									<!--  Search Ajax and than show Registered Subjects. -->
								</div><!-- #registered-subjects  -->
							</div><!-- .span6  -->
						</div><!--  .row -->	

						<div class="control-group">
							<div class="controls">
								<input type="submit" name="submit" value="Save" class="btn btn-inverse">
								<a href="admin/index.php" target="_blank" class="btn btn-inverse">Student List</a>
								<a href="jsc_info.php" target="_blank" class="btn btn-inverse">Form</a>
							</div><!-- .controls  -->
						</div><!-- .control-group  -->
					</form><!--  .form-horizontal -->
				</div><!-- .jsc-info  -->
			</div><!-- .span12  -->
		</div><!--  .row -->
	</div><!-- .container .well -->
<?php require_once 'footer.php'; ?>