
<?php

include_once "portal_navigation.php";

if(isset($_SESSION['tusername'])){

  }else{
    $message = "<h5>You need to login as tailor list your products!</h5>";

                  //redirect
                  header("Location:index.php?m=$message");
                  session_destroy();
  }

	//check if add categories button is clicked


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnaddproduct'])){


	//validate inputs
		if(empty($_POST['productname'])){
        $errors['productname'] = "Product name field cannot be empty";
    	}

    if(empty($_POST['productdescription'])){
        $errors['productdescription'] = "Product description field cannot be empty";
      }

    if(empty($_POST['productprice'])){
        $errors['productprice'] = "Product price field cannot be empty";
      }


    if(empty($_POST['category'])){
        $errors['category'] = "Category field cannot be empty";
      }

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $productname = $cmobj->sanitizeInputs($_POST['productname']);
      $productdescription = $cmobj->sanitizeDescription($_POST['productdescription']);


      //create object of user class $ pass parameters to signup method;
      include_once "connection/products.php";
      $productobj = new Products();

      $productprice = ($_POST['productprice']);
      $productcategory =($_POST['category']);
      $tailorid =$_SESSION['t_id'];
      
      

      //store what it returns in output variable
      $output = $productobj->insertProducts($productname, $productdescription, $productprice, $productcategory, $tailorid);

      //check if its sucessfull

      if($output == true){
        $msg = "product was successfully added. Add a new product?";
        // redirect
        header("Location:addproduct.php?m=$msg");
      }else{
        $errors[] = "Oops! could not add product.".$output;
      }
 	}

}


?>

  <div class="row" style="width:98%; justify-content:center;">
    <div class="col-md-6 mt-3 mb-3 ms-3">

        <h2 style="text-align:center">Product Information</h2>



        <div>
          
          

      <?php
        if(isset($_REQUEST['m'])){
      ?>

      <div class="alert alert-success">
        <?php echo $_REQUEST['m']; ?>
      </div>

      <?php

      }
      
      ?>
      </div>

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

        <form action="" method="post" class="mb-3 p-3 form-control" enctype="multipart/form-data">

        	<label class="form-label">Product name</label>
          <input type="text" name="productname" id="productname" class="form-control mb-3" value="<?php if(isset ($_POST['productname'])){ echo $_POST['productname'];} ?>">

          <label class="form-label">Product Description</label>
          <textarea name="productdescription" id="productdescription" class="form-control mb-3"></textarea>

          <label class="form-label">Product Price</label>
          <input type="number" name="productprice" id="productprice" class="form-control mb-3" value="<?php if(isset ($_POST['productprice'])){ echo $_POST['productprice'];} ?>">

          
          <label>Product Image</label>
          <input type="file" class="form-control mb-3" id="productimage" name='myfile'>
            

          <div class="">
            <label for="category">Product Category</label>
            <select name="category" id="category" class="form-select">
              <option value="">Choose Category</option>
              <?php 
                  include_once "connection/products.php";
                  $categoryobj = new Products();
                  $categories = $categoryobj->getCategories();

                  foreach ($categories as $key => $value) {
                    $categoryid = $value['category_id'];
                    $categoryname = $value['category_name'];

                    echo "<option value='$categoryid'>$categoryname</option>";
                  }
              ?>
          </div>

          <input type="hidden" name="tailorid" value="<?php echo $_SESSION['t_id'] ?>">
          

          <input type="submit" name="btnaddproduct" class="btn mybuttons mt-3" id="btnaddproduct" value="Add Product">
          
        </form>

     </div>
   </div>


  <?php 

  include_once "footer.php";

?>
