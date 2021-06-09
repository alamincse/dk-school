<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Website SEO -->
    <meta name="description" content="Admission Form"/>
    <meta name="keywords" content="Diargarfa Khairash(D.K) High School, Admission Form, Admission, Admission Info, Admission Information, Government Information, Schools Information, High School Informatin"/>
    <meta name="author" content="Bangladesh Government" />
	<title>
		<?php
			// extract the filename
			$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
			if (strtolower($title) == 'index') {
				echo 'D.K High School.';
			}else{
				// capitalize all words
				$title = ucwords($title);
				$title = $title.' - D.K High School.';
				echo $title;
			}
		?>
	</title>

	<!--  Stylesheet  -->
	<link rel="stylesheet" href="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/css/style.css">
	<script type="text/javascript" src="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/js/jquery-1.7.2.js"></script>
	<script>
		$(document).ready(function(){
			$("#photoimg").change(function(){
				var file = document.getElementById("photoimg").files[0];
				var readImg = new FileReader();
				readImg.readAsDataURL(file);
				readImg.onload = function(e) {
					$('.prevImg').attr('src',e.target.result).fadeIn();
				}		
			})	
		})
	</script>	
</head>
<body>