	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="span12">
					<p class="copyright">
						<span>&copy; 2013 All Rights Reseved.</span>
						<span class="pull-right">Developer <a href="http://facebook.com/alaminbosscseru09" target="_blank">AL-AMIN</a></span>
					</p><!-- .copyright  -->
				</div><!--  .span12 -->
			</div><!-- .row  -->
		</div><!--  .container  -->
	</div><!-- .footer  -->

	<!--  javascript -->
	<script type="text/javascript" src="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/js/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/js/timeShow.js"></script>

	<!--  typing master for header section. -->
    <script type="text/javascript" src="<?php echo "http://". $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/js/jquery.typer.js"></script>
    <script>
        var win = $(window),
            foo = $('#typer');
            // var a = '<a href="#">click</a>'; // click other page..
        foo.typer([ 'Admission is coming soon  D.K High School.', 'Quickly apply for admission.', 'It\'s a admission form...', 'Now online admission is going on...']);

        // create font size....
        win.resize(function(){
            var fontSize = Math.max(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));

            foo.css({
                fontSize: fontSize * 0.13 + 'px'
            });
        }).resize();


       	/**
       	 *
       	 * Show subject when you want any religion or group.
       	 * Author:AL-AMIN. 
       	 */
		$('document').ready(function(){
			$('body').on('click', function(){
				var religion = $('#religion').val();
				var group = $('#group').val();
				
				$.ajax({
					async:false,
					type:'POST',
					url:'show_subject.php',
					data:{
						religion:religion,
						group:group,
					},
					success:function(msg){
						$('#registered').html(msg);
					}
				});
			});
		});
    </script>
</body>
</html>