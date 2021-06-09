<?php 
	/**
	 * Show Subject List when you select One
	 * @author  AL-AMIN
	 * @package dk_high_school(Online admission).
	 * @access private
	 */
	$religion = $_POST['religion'];
	$group    = $_POST['group'];

	if($religion == 'islam' && $group == 'science'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'ISLAM AND MORAL EDUCATION (111)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'BANGLADESH AND GLOBAL STUDIES (150)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
		
		echo "<h5>Elective Subject</h5>";

		$subs = array('7' =>'PHYSICS (136)', '8' => 'CHEMISTRY (137)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
			
		$elective_subs = array('', 'HIGHER MATHEMATICS (126)', 'BIOLOGY(138)');	
			echo "9. ";
			echo "<select name='elective-subs' class='elective-subs'>";		
			foreach($elective_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";


		echo "<h5>Optional Subject</h5>";

		$optional_subs = array(' ', 'BIOLOGY(138)', 'HIGHER MATHEMATICS (126)', 'ARTS AND CARFTS(148)',	'ACCOUNTING(146)',	'MUSIC(149)', 'AGRI. STUDIES(134)',	'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'GEOGRAPHY AND ENVIRONMENT(110)', 'VOCATIONAL EDUCATION(130)');
		echo "10. ";
		echo "<select name='optional-subs' class='optional-subs'>";
			foreach($optional_subs as $sub) :?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

	}else
	/**
	 * when you select religion Islam and group Commerce 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'islam' && $group == 'commerce'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'ISLAM AND MORAL EDUCATION (111)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'SCIENCE (127)', '7' => 'BUSINESS ENTERPRENEURSHIP (143)', '8' => 'FINANCE AND BANKING (152)', '9' => 'ACCOUNTING (146)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}

		echo "<h5>Optional Subject</h5>";
		echo "10. ";
		$optional_subs = array('GEOGRAPHY AND ENVIRONMENT(110)', 'BANGLADESH AND GLOBAL STUDIES(150)', 'HOME SCIENCE(151)', 'ARTS AN CRAFTS(148)', 'COMPUTER STUDIES(131)', 'AGRICULTURE STUDIES(134)', 'MUSIC(149)', 'VOCATIONAL EDUCATION(130)');
		
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Islam and group Arts 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'islam' && $group == 'arts'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'ISLAM AND MORAL EDUCATION (111)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'HISTORY OF BANGLADESH AND WORLD CIVILIZATION (153)', '7' => 'GEOGRAPHY AND ENVIRONMENT (110)', '8' => 'SCIENCE (127)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}

		echo "9. ";
		$subs = array('CIVICS AND CITIZENSHIP(140)', 'ECONOMICS(141)');
		echo "<select name='' class='optional-subs'>";
			foreach($subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('MUSIC(149)', 'FINE ARTS(148)', 'PHYSICAL EDUCATION(GYMNASTICS)(147)', 'ACCOUNTING(146)', 'ECONOMICS(141)', 'CIVICS AND CITIZENSHIP(140)', 'BASIC TRADE(135)', 'AGRICULTURE STUDIES(134)', 'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'ARABIC(121)', 'HIGHER ENGLISH(120)', 'HIGHER BANGLA(119)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

	}else
	/**
	 * when you select religion Hindu and group Science 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'hindu' && $group == 'science'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'HINDU AND MORAL EDUCATION (112)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'BANGLADESH AND GLOBAL STUDIES (150)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
		
		echo "<h5>Elective Subject</h5>";

		$subs = array('7' =>'PHYSICS (136)', '8' => 'CHEMISTRY (137)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}

		$elective_subs = array(' ', 'HIGHER MATHEMATICS (126)', 'BIOLOGY(138)');	
			echo "9. ";
			echo "<select name='' class='elective-subs'>";		
			foreach($elective_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";


		echo "<h5>Optional Subject</h5>";

		$optional_subs = array(' ', 'BIOLOGY(138)', 'HIGHER MATHEMATICS (126)', 'ARTS AND CARFTS(148)',	'ACCOUNTING(146)',	'MUSIC(149)', 'AGRI. STUDIES(134)',	'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'GEOGRAPHY AND ENVIRONMENT(110)', 'VOCATIONAL EDUCATION(130)');
		echo "10. ";
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
		
	}else
	/**
	 * when you select religion Hindu and group arts 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'hindu' && $group == 'arts'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'HINDU AND MORAL EDUCATION (112)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'HISTORY OF BANGLADESH AND WORLD CIVILIZATION (153)', '7' => 'GEOGRAPHY AND ENVIRONMENT (110)', '8' => 'SCIENCE (127)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}
		
		echo "9. ";
		$subs = array('CIVICS AND CITIZENSHIP(140)', 'ECONOMICS(141)');
		echo "<select name='' class='optional-subs'>";
			foreach($subs as $sub) :?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('MUSIC(149)', 'FINE ARTS(148)', 'PHYSICAL EDUCATION(GYMNASTICS)(147)', 'ACCOUNTING(146)', 'ECONOMICS(141)', 'CIVICS AND CITIZENSHIP(140)', 'BASIC TRADE(135)', 'AGRICULTURE STUDIES(134)', 'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'ARABIC(121)', 'HIGHER ENGLISH(120)', 'HIGHER BANGLA(119)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Hindu and group commerce 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'hindu' && $group == 'commerce'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'HINDU AND MORAL EDUCATION (112)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'SCIENCE (127)', '7' => 'BUSINESS ENTERPRENEURSHIP (143)', '8' => 'FINANCE AND BANKING (152)', '9' => 'ACCOUNTING (146)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('GEOGRAPHY AND ENVIRONMENT(110)', 'BANGLADESH AND GLOBAL STUDIES(150)', 'HOME SCIENCE(151)', 'ARTS AND CRAFTS(148)', 'COMPUTER STUDIES(131)', 'AGRICULTURE STUDIES(134)', 'MUSIC(149)','HOME SCIENCE(151)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

	}else
	/**
	 * when you select religion Christian and group science 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'christian' && $group == 'science'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'CHRISTIAN RELIGION AND MORAL EDUCATION (114)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'BANGLADESH AND GLOBAL STUDIES (150)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
		
		echo "<h5>Elective Subject</h5>";

		$subs = array('7' =>'PHYSICS (136)', '8' => 'CHEMISTRY (137)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
			
		$elective_subs = array('', 'HIGHER MATHEMATICS (126)', 'BIOLOGY(138)');	
			echo "9. ";
			echo "<select name='elective-subs' class='elective-subs'>";		
			foreach($elective_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";


		echo "<h5>Optional Subject</h5>";

		$optional_subs = array(' ', 'BIOLOGY(138)', 'HIGHER MATHEMATICS (126)', 'ARTS AND CARFTS(148)',	'ACCOUNTING(146)',	'MUSIC(149)', 'AGRI. STUDIES(134)',	'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'GEOGRAPHY AND ENVIRONMENT(110)', 'VOCATIONAL EDUCATION(130)');
		echo "10. ";
		echo "<select name='optional-subs' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Christian and group arts 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'christian' && $group == 'arts'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'CHRISTIAN RELIGION AND MORAL EDUCATION (114)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'HISTORY OF BANGLADESH AND WORLD CIVILIZATION (153)', '7' => 'GEOGRAPHY AND ENVIRONMENT (110)', '8' => 'SCIENCE (127)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}
		
		echo "9. ";
		$subs = array('CIVICS AND CITIZENSHIP(140)', 'ECONOMICS(141)');
		echo "<select name='' class='optional-subs'>";
			foreach($subs as $sub) :?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('MUSIC(149)', 'FINE ARTS(148)', 'PHYSICAL EDUCATION(GYMNASTICS)(147)', 'ACCOUNTING(146)', 'ECONOMICS(141)', 'CIVICS AND CITIZENSHIP(140)', 'BASIC TRADE(135)', 'AGRICULTURE STUDIES(134)', 'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'ARABIC(121)', 'HIGHER ENGLISH(120)', 'HIGHER BANGLA(119)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) :?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Christian and group commerce 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'christian' && $group == 'commerce'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'CHRISTIAN RELIGION AND MORAL EDUCATION (114)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'SCIENCE (127)', '7' => 'BUSINESS ENTERPRENEURSHIP (143)', '8' => 'FINANCE AND BANKING (152)', '9' => 'ACCOUNTING (146)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('GEOGRAPHY AND ENVIRONMENT(110)', 'BANGLADESH AND GLOBAL STUDIES(150)', 'HOME SCIENCE(151)', 'ARTS AND CRAFTS(148)', 'COMPUTER STUDIES(131)', 'AGRICULTURE STUDIES(134)', 'MUSIC(149)','HOME SCIENCE(151)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Buddha and group science 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'buddha' && $group == 'science'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'BUDDHIST RELIGION AND MORAL EDUCATION (113)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'BANGLADESH AND GLOBAL STUDIES (150)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
		
		echo "<h5>Elective Subject</h5>";

		$subs = array('7' =>'PHYSICS (136)', '8' => 'CHEMISTRY (137)');
		
			foreach($subs as $v => $sub){
				echo "<p>". $v. '. ' . $sub."</p>";
			}
			
		$elective_subs = array('', 'HIGHER MATHEMATICS (126)', 'BIOLOGY(138)');	
			echo "9. ";
			echo "<select name='elective-subs' class='elective-subs'>";		
			foreach($elective_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";


		echo "<h5>Optional Subject</h5>";

		$optional_subs = array(' ', 'BIOLOGY(138)', 'HIGHER MATHEMATICS (126)', 'ARTS AND CARFTS(148)',	'ACCOUNTING(146)',	'MUSIC(149)', 'AGRI. STUDIES(134)',	'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'GEOGRAPHY AND ENVIRONMENT(110)', 'VOCATIONAL EDUCATION(130)');
		echo "10. ";
		echo "<select name='optional-subs' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Buddha and group arts 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'buddha' && $group == 'arts'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'BUDDHIST RELIGION AND MORAL EDUCATION (113)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'HISTORY OF BANGLADESH AND WORLD CIVILIZATION (153)', '7' => 'GEOGRAPHY AND ENVIRONMENT (110)', '8' => 'SCIENCE (127)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}
		
		echo "9. ";
		$subs = array('CIVICS AND CITIZENSHIP(140)', 'ECONOMICS(141)');
		echo "<select name='' class='optional-subs'>";
			foreach($subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('MUSIC(149)', 'FINE ARTS(148)', 'PHYSICAL EDUCATION(GYMNASTICS)(147)', 'ACCOUNTING(146)', 'ECONOMICS(141)', 'CIVICS AND CITIZENSHIP(140)', 'BASIC TRADE(135)', 'AGRICULTURE STUDIES(134)', 'COMPUTER STUDIES(131)', 'HOME SCIENCE(151)', 'ARABIC(121)', 'HIGHER ENGLISH(120)', 'HIGHER BANGLA(119)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}else
	/**
	 * when you select religion Buddha and group commerce 
	 * @author  AL-AMIN
	 * @package Online admission.
	 */	
	if($religion == 'buddha' && $group == 'commerce'){
		$subs = array('1' => 'BANGLA(101-102)', '2' => 'ENGLISH(106-107)', '3' => 'MATHEMATICS(109)', '4' => 'BUDDHIST RELIGION AND MORAL EDUCATION (113)',	'5' => 'PHYSICAL EDUCATION, HEALTH AND SPORTS (147)', '6' => 'SCIENCE (127)', '7' => 'BUSINESS ENTERPRENEURSHIP (143)', '8' => 'FINANCE AND BANKING (152)', '9' => 'ACCOUNTING (146)');
		
		foreach($subs as $v => $sub){
			echo "<p>". $v. '. ' . $sub."</p>";
		}

		echo "<h5>Optional Subject</h5>";
		echo "10. ";

		$optional_subs = array('GEOGRAPHY AND ENVIRONMENT(110)', 'BANGLADESH AND GLOBAL STUDIES(150)', 'HOME SCIENCE(151)', 'ARTS AND CRAFTS(148)', 'COMPUTER STUDIES(131)', 'AGRICULTURE STUDIES(134)', 'MUSIC(149)','HOME SCIENCE(151)', 'VOCATIONAL EDUCATION(130)');
		echo "<select name='' class='optional-subs'>";
			foreach($optional_subs as $sub) : ?>
				<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
			<?php endforeach;
		echo "</select>";
	}
?>