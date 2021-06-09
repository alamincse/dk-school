<?php 
	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php');
	require_once ( dirname( __FILE__ ) . '/functions.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Section Application Details.</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container well">
		<div class="row">
			<div class="span12">
				<header class="alert alert-info">
					<hgroup>
						<h1>Diargarfa Khairash(D.K) High School</h1>
						<h2>Applicant Information</h2>
					</hgroup>
				</header><!--  .alert alert-info -->
					
				<a href="index.php" class="pull-right btn btn-inverse">Back</a>
			</div><!-- .span12  -->
		</div><!-- .row  -->

		<div class="row">
			<div class="span8">
				<?php
					
					$data_show = admin_view_detail();

					if(count($data_show) > 0 ) : ?>
					<table class="table table-bordered">
						<tbody>
							<?php foreach($data_show as $row) : array_map('htmlentities', $row); ?>
								<tr>
									<td><?php echo implode('</td><td>', $row); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table><!-- .table table-bordered -->
				<?php endif; ?>
			</div><!-- .span8  -->

			<div class="span4">
				<?php 
					$picture_show = admin_show_picture();
					if(count($picture_show) > 0 ) : ?>
						<?php foreach($picture_show as $row) : array_map('htmlentities', $row); ?>
							<?php echo implode($row); ?>
						<?php endforeach; ?>
					<?php endif;
				?>
			</div><!-- .span4  -->
		</div><!-- .row  -->
	</div><!-- .container  -->
</body>
</html>