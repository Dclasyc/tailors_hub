	<!-- FOOTER SECTION -->

	<div class="container-fluid" id=footerdiv>

		<footer>
		<div class="row" style="display: inline-block; justify-content: center;">
			<div class="row" id="footerinnerdiv">

			<h5 style="text-align:center">Copyright &copy; <?php include_once "connection/dbconnector.php"; echo date('Y') .' '. APP_NAME;?>. All rights reserved</h5>

			</div>

			<div class="row">
				<h6 style="text-align:center"><i class="fa fa-envelope"></i> Akarigbooladipo@gmail.com</h6>
			</div>

		</div>
		</footer>


</body>
</html>
<?php 
		ob_end_flush();
 ?>