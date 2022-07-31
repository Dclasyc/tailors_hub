
<?php

include_once "portal_navigation.php";

//fetch existing data

include_once "connection/products.php";
$catobj = new Products();

$data = $catobj->getCategoryForEdit($_REQUEST['categoryid']);


      echo "<pre>";
      print_r($data);
      echo "</pre>";

 if(isset($_POST['btneditcategories'])){

	//validate inputs
		if(empty($_POST['categories'])){
        $errors['categories'] = "category field cannot be empty";
    	}

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $categoryname = $cmobj->sanitizeDescription($_POST['categories']);


      //create object of user class $ pass parameters to signup method;
      include_once "connection/products.php";
      $categoryobj = new Products();


      //store what it returns in output variable
      $output = $categoryobj->editCategory($categoryname, $_REQUEST['categoryid']);

      //check if its sucessfull

      if($output == true){
        $msg = "category was successfully updated";
        // redirect

        if(isset($_SESSION['tusername'])){
           header("Location:addcategories.php?m=$msg");
        }else{
           header("Location:dashboard.php?m=$msg");
        }

      }else{
        $errors[] = "Oops! could not update category.".$output;
      }

    }
  }


?>

<div class="container">
  <div class="row">
    <div class="col-md-6 mt-3 offset-3">

        <h2 style="text-align:center">Edit Category Info</h2>

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

        <form name="addcategories" action="editcategory.php?categoryid=<?php if(isset($_REQUEST['categoryid'])){echo $_REQUEST['categoryid'];} ?>" method="post">

        	<label class="form-label">Edit Category</label>
          <input type="text" name="categories" id="categories" class="form-control mb-3" value="<?php if(isset ($data['category_name'])){echo $data['category_name'];} ?>">

           <?php 

                  if(!empty($errors['category_name'])) {
                    echo "<div class='text-danger'>".$errors['category_name']."</div>";
                  }

              ?>
          

          <input type="submit" name="btneditcategories" class="btn btn-primary" id="btnaddcategories" value="Edit Category">
          
        </form>

     </div>
   </div>
  </div>

  
 </body>
</html>