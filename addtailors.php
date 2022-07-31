
<?php

include_once "portal_navigation.php";

	//check if add Tailor button is clicked


if(isset($_POST['btnaddtailor'])){


	//validate inputs
		if(empty($_POST['username'])){
        $errors['username'] = "username field cannot be empty";
    	}

      if(empty($_POST['firstname'])){
       $errors['firstname'] = "Firstname field cannot be empty";
      }

      if(empty($_POST['lastname'])){
        $errors['lastname'] = "Lastname field cannot be empty";
      }

      if(empty($_POST['email'])){
        $errors['email'] = "Description field cannot be empty";
        }
 
        if(empty($_POST['phone'])){
        $errors['phone'] = "phone field cannot be empty";
    	}

        if(empty($_POST['password'])){
        $errors['password'] = "password field cannot be empty";
      }elseif (strlen($_POST['password']) <6) {
      	$errors['password'] = "password must me greater than 5 characters";
      }
       

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $firstname = $cmobj->sanitizeInputs($_POST['firstname']);
      $email = $cmobj->sanitizeInputs($_POST['email']);
      $lastname = $cmobj->sanitizeInputs($_POST['lastname']);
      $phone = $cmobj->sanitizeInputs($_POST['phone']);
      $username = $cmobj->sanitizeInputs($_POST['username']);
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];

     
      


      //create object of user class $ pass parameters to signup method;
      include_once "connection/user.php";
      $userobj = new User();


      //store what it returns in output variable
      $output = $userobj->TailorSignUp($username, $firstname, $lastname, $gender, $dob, $email, $phone, $password);

      //check if its sucessfull

      if($output == true){
        $msg = "Tailor was successfully added";
        // redirect
        header("Location:listtailors.php?m=$msg");
      }else{
        $errors[] = "Oops! could not add tailor.".$output;
      }
 	}

}


?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mt-3 offset-3">

        <h2 style="text-align:center">Tailor Info</h2>

        <div>
        <?php 

        	if(!empty($errors)){
        		echo "<ul class='alert alert-danger'>";
        			foreach($errors as $key => $value){
        				echo "<li>$value</li>";
        			}
        	}	echo "</ul>";

        ?>
        </div>

        <form action="" method="post">

        	<label class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control mb-3" value="<?php if(isset ($_POST['username'])){ echo $_POST['username'];} ?>">

        	<label class="form-label">firstname</label>
          <input type="text" name="firstname" id="firstname" class="form-control mb-3" value="<?php if(isset ($_POST['firstname'])){ echo $_POST['firstname'];} ?>">

          <label class="form-label">Lastname</label>
          <input type="text" name="lastname" id="lastname" class="form-control mb-3" value="<?php if(isset ($_POST['lastname'])){ echo $_POST['lastname'];} ?>">


          <div class="mb-3">
          <label class="form-label">Gender</label><br>
          <?php if(isset ($_POST['gender'])){ $gender = $_POST['gender'];

            echo $gender; } ?>

          <input type="radio" id="male" name="gender" value="male">
          <label for="male">Male</label><br>

          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Female</label><br>
        </div>

        <label class="form-label">Date of Birth</label>
          <input type="date" name="dob" id="dob" class="form-control mb-3" value="<?php if(isset ($_POST['dob'])){ echo $_POST['dob'];} ?>">


          <label class="form-label">Email</label>
          <input type="email" name="email" id="email" class="form-control mb-3" value="<?php if(isset ($_POST['email'])){ echo $_POST['email'];} ?>">
          

          <label class="form-label">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control mb-3"value="<?php if(isset ($_POST['phone'])){ echo $_POST['phone'];} ?>">

            <label class="form-label">Password</label>
          <input type="password" name="password" id="pswd" class="form-control mb-3">

          

          <input type="submit" name="btnsignup" class="btn mybuttons mb-3" id="btnaddtailor" value="Add Tailor">
          
        </form>

     </div>
   </div>
  </div>

  <?php 

  include_once "footer.php";

?>
 </body>
</html>