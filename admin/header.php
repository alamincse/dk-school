<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Section view Applicant</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="../js/timeShow.js"></script>
	<script type="text/javascript">
		function findmatch(){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('result').innerHTML = xmlhttp.responseText;
				}
			}

			// document.search.search.value -- 1st search is form name search and 2nd search is field name and than value.
			xmlhttp.open('GET', 'auto_search.php?search='+document.search.search.value, true);
			xmlhttp.send();
		}

		// Date show here.
		var d = new Date();
		var month = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		var today = d.getDate()+' '+month[d.getMonth()]+' '+d.getFullYear();
	</script>
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

					<p>
						<span><script>document.write(today);</script></span> at
						<span id="showTime" style="color:#000; font-weight:bold;"></span>
					</p>
				</header><!--  .alert alert-info -->

				