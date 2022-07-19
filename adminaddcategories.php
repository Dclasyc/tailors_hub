
<?php

	//check if addcategories button is clicked


if(isset($_POST['btnaddcategories'])){


	//validate inputs
		if(empty($_POST['categories'])){
        $errors['categories'] = "category field cannot be empty";
    	}

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $categories = $cmobj->sanitizeInputs($_POST['categories']);


      //create object of user class $ pass parameters to signup method;
      include_once "connection/products.php";
      $categoryobj = new Product();


      //store what it returns in output variable
      $output = $categoryobj->addCategories($categoryname);

      //check if its sucessfull

      if($output == true){
        $msg = "category was successfully added";
        // redirect
        header("Location:listcategories.php?m=$msg");
      }else{
        $errors[] = "Oops! could not add category.".$output;
      }
 	}

}


?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mt-3 offset-3">

        <h2 style="text-align:center">Category Info</h2>

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

        	<label class="form-label">Add New Category</label>
          <input type="text" name="categories" id="categories" class="form-control mb-3" value="<?php if(isset ($_POST['categories'])){ echo $_POST['categories'];} ?>">
          

          <input type="submit" name="btnaddcategories" class="btn btn-primary" id="btnaddtailor" value="Add Category">
          
        </form>

     </div>
   </div>
  </div>

  <?php 

  include_once "footer.php";

?>
 </body>
</html>