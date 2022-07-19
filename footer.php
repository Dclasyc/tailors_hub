	<!-- FOOTER SECTION -->

	<div class="container-fluid" id=footerdiv>

		<footer>
		<div class="container-fluid" style="display: flex; justify-content: center;">
			<div>

			<h5>Copyright &copy; <?php include_once "connection/dbconnector.php"; echo date('Y') .' '. APP_NAME;?>. All rights reserved.</h5>

			</div>

		</div>
		</footer>


</body>
</html>
<?php 
		ob_end_flush();
 ?>