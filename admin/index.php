<?php 
/**
 * After Login
 * show the main page or index.php page
 *
 * @package Online Form Fill Up
 * @since 1.0
 */
	require_once ( dirname( dirname( __FILE__ ) ) . '/init.php' );
	require_once ( dirname( __FILE__ ) . '/functions.php' ); 
	require_once ( dirname( __FILE__ ) . '/header.php' );

	if(isset($_SESSION['username'])) :
?>
	<article>
		<span style="color:green;"><?php echo 'Welcome ' . $_SESSION['username']; ?></span>
		<span class="pull-right"><a href="register_admin.php"><?php echo 'Total admin : '. show_admin(); ?></a></span><br>
		<span class="pull-right"><a href="register.php">Add Admin</a></span><br>
		<span class="pull-right"><a href="logout.php">Logout</a></span>
		
		<h2>All Applicant Here.</h2>
		<p><img src="<?php //echo show_image(); ?>" alt=""></p>
		<p><?php //echo show_image(); ?></p>

		<h4 class='pull-right label label-info'>Total Applicant :<?php echo show_applicant(); ?></h4>
		
		<form action="" name="search" class="search-box">
			<input type="text" name="search" onkeyup="findmatch();" placeholder="Search here for any ID..." size="40">
		</form><!--  .search-box -->
	</article>

	<div id="result">
		<?php 

			echo '<table class="table table-bordered">';
				$table_header = array(
					array("Student ID", "Photo", "Name", "Class Name", "Father's Name", "Religion", "Gender", "Group", "Apply Date time", "Detail")
				);

				foreach($table_header as $row) : array_map('htmlentities', $row); ?>
					<tr>
						<td><?php echo implode('</td><td>', $row); ?></td>
					</tr>
				<?php endforeach; 		

				// show all post from functions page.
				echo post_show();

			echo '</table>'; /*<!-- .table table-bordered -->*/			
		?>
	</div><!--  .result -->

	<!-- pagination show here..  -->
	<div class="pagination pagination-centered">
		<?php echo show_pagination(); ?>
	</div><!-- .pagination .pagination-centered -->

<?php 
	require_once ( dirname( __FILE__ ) . '/footer.php' ); 
	else :
		/** If admin don't login show login page */
		header('location:login.php');
	endif;
?>			