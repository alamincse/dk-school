<?php 
	require_once ( dirname( dirname( __FILE__ ) ). '/init.php' );
	
	if(isset($_GET['search'])){
		$search_item = $_GET['search'];
	}

	if($search_item || empty($search_item)){
		echo '<table class="table table-bordered">';
			$table_header = array(
				array("Student ID", "Photo", "Name", "Class Name", "Father's Name", "Religion", "Gender", "Group", "Application Date-time", "Detail")
			);

			foreach($table_header as $row) : array_map('htmlentities', $row); ?>
				<tr>
					<td><?php echo implode('</td><td>', $row); ?></td>
				</tr>
			<?php endforeach; 

			// database query for auto search.
			$query = mysql_query("SELECT * FROM adminssion_info WHERE s_id LIKE '".mysql_real_escape_string($search_item)."%' ");
			
			$chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '#', '@', '$', '%', '^', '&', '*');
			
			// check the character in search option.
			foreach($chars as $char) :
				if($search_item == $char ) : ?>
					<div class="alert alert-error">
						<a href="" class="close" data-dismiss="alert">&times;</a>
						<p><?php echo 'Sorry, You have type a character. Please type a disit and than show result.'; exit(); ?></p>
					</div><!-- .alert .alert-error  -->
				<?php endif; 
			endforeach; // end foreach loop.
			
			// ID length match.	
			if(strlen($search_item) < 7) :

				// Don't match your id in database.
				if(mysql_num_rows($query) >= 1) :
					
					while($row_name = mysql_fetch_assoc($query)){
						$rows = $row_name;
						$application_id = $rows['id'];
						$time = strtotime($rows['time']);
						$show_time = strftime("%B %d, %Y at %I: %M %p", $time);
						$id 		= $rows['s_id'];
						$name 		= ucfirst($rows['s_name']);
						$class_name = $rows['cls_name'];
						$f_name 	= $rows['f_name'];
						$religion 	= $rows['religion'];
						$group 		= $rows['s_group'];
						$gender 	= $rows['sex'];
						$photo      = "<a class='thumbnail' style='width:70px; height:70px;' href='admin_view_detail.php?id=$application_id'><img src=get_image.php?id=$application_id style = 'width:70px; height:70px;'></a>";						

						$view = "<a href='admin_view_detail.php?id=$application_id'>view</a>";
						$list = array(
							array("$id", "$photo", "$name", "$class_name", "$f_name", "$religion", "$gender", "$group", "$show_time", "$view")
						); ?>

						<tbody>
							<?php foreach($list as $row) : array_map('htmlentities', $row); ?>
								<tr>
									<td><?php echo implode('</td><td>', $row); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						
					<?php } // end while loop.

				else : ?>
					
					<div class="alert alert-error">
						<a href="" data-dismiss="alert" class="close">&times;</a>
						<p><?php echo 'Sorry, Don\'t match Your ID. Please try again.'; ?></p>
					</div><!--  .alert .alert-error -->
				
				<?php endif;

			else : ?>

				<div class="alert alert-error">
					<a href="" data-dismiss="alert" class="close">&times;</a>
					<p><?php echo 'Student ID length must be 6 disit.'; ?></p>
				</div><!--  .alert .alert-error -->
			
			<?php endif; 
		echo '</table>'; /*<!-- .table .table-bordered -->*/
	} // end if condition. 
?>