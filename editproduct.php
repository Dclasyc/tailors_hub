
<?php

include_once "portal_navigation.php";

include_once "connection/products.php";
      $prodobj = new Products();


      // fetch existing data
      $data = $prodobj->getProductForEdit($_REQUEST['productid']);



      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";

	//check if add categories button is clicked


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btneditproduct'])){


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

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $productname = $cmobj->sanitizeInputs($_POST['productname']);
      $productdescription = $cmobj->sanitizeDescription($_POST['productdescription']);


      //update record

      //create object of user class $ pass parameters to signup method;
      include_once "connection/products.php";
      $productobj = new Products();

      $productprice = ($_POST['productprice']);
      $productcategory = ($data['category_id']);
      $tailorid =$_SESSION['t_id'];


      
      // Update product in database
      

      //reference insert product
      $output = $productobj->editproductbytailor($productname, $productdescription, $productprice, $productcategory, $data['product_id']);

      //check if its sucessfull

      if($output === 1){
        $msg = "product was successfully updated.";
        // redirect
        header("Location:tailordashboard.php?m=$msg");
      }elseif ($output == 0){
          $msgs = "No Changes were made!";
            header("Location: tailordashboard.php?m=$msgs");
        }else{
          $errors[] = "Oops! Could not update product. ".$output;
       }
 	}

}


?>

  <div class="row" style="width: 98%; justify-content:center;">
    <div class="col-md-6 mt-3 ms-3 p-3">

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

        <form name="addproduct" id="addproduct" action="editproduct.php?productid=<?php if(isset($_REQUEST['productid'])){
          echo $_REQUEST['productid'];
        }?>" method="post" class="mb-5" enctype="multipart/form-data">

        	<label class="form-label">Product name</label>
          <input type="text" name="productname" id="productname" class="form-control mb-3" value="<?php if(isset ($data['product_name'])){ echo $data['product_name'];} ?>">

          <label class="form-label">Product Description</label>
          <textarea name="productdescription" id="productdescription" class="form-control mb-3" ><?php if(isset ($data['product_desc'])){ echo $data['product_desc'];} ?></textarea>

          <label class="form-label">Product Price</label>
          <input type="number" name="productprice" id="productprice" class="form-control mb-3" value="<?php if(isset ($data['product_price'])){ echo $data['product_price'];} ?>">

          
          <label>Product Image</label>
          <input type="file" class="form-control mb-3" id="productimage" name='myfile' >
            

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

                    if ($categoryid == $data['category_id']) {
                    echo "<option value ='$categoryid' selected>$categoryname</option>";
                  }else{

                    echo "<option value='$categoryid'>$categoryname</option>";
                  }
                }
                
              
              ?>
          </div>

          <input type="hidden" name="tailorid" value="<?php echo $_SESSION['t_id'] ?>">
          

          <input type="submit" name="btneditproduct" class="btn mybuttons mt-3" id="btneditproduct" value="Update Product">
          
        </form>

     </div>
   </div>


  <?php 

  include_once "footer.php";

?>
 </body>
</html>