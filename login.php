<?php 
	
	ob_start();
	
	include_once("navigation.php");


?>


    <?php 
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					
						include_once "connection/user.php";

						// create user object
						$obj =  new User();

						// make use of login method
						$customerlogin = $obj->customerLogin($_POST['email'], $_POST['password']);

						$adminlogin = $obj->adminLogin($_POST['email'], $_POST['password']);

						$tailorlogin = $obj->tailorLogin($_POST['email'], $_POST['password']);

						if ($customerlogin == true) {
							# redirect user to dashboard/landing page
							header("Location: tailorshub.php");
						
						}

						if ($tailorlogin == true) {
							# redirect user to dashboard/landing page
							header("Location: tailorshub.php");
							
						}

						if ($adminlogin == true) {
							# redirect user to dashboard/landing page
							header("Location: tailorshub.php");
							
						}
						else{
							echo "<div class='alert alert-danger'>Invalid email address or password</div>";
						}
						
					}
					
    ?>			

  <div class="row" style="width:98%">
  <div class="row mt-5 mb-5" style="justify-content: center; margin-left: 10px;">
		<div class="col-md-5 ">
			 <h2 style="text-align:center">Login</h2>

				<form action="" method="post" class="form-control mt-3 p-5" id="loginsignupforms">
						
				<div class="mb-3">
					<label for="email">E-mail</label>
					<input type="email" name="email" id="email" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
				</div>

				<div class="mb-3">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>

				<button type="submit" class="btn mybuttons mt-3 form-control">Login</button>
					
				
				</form>

				<p style="text-align:center">Don't have an account? click<a href="customersignup.php"> here</a> to sign up</p>


			</div>
		</div>
	</div>

	<?php 

		include_once "footer.php";

	 ?>
