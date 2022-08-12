 <?php 

  include_once "portal_navigation.php"

?>

<!-- page content -->

<div class="container">
  <h1 class="mt-4 mb-3">
    <small>Delete Product</small>
  </h1>

  <?php 

    if(isset($_REQUEST['btndelete'])){
      #delete tailor
      include_once("connection/products.php");

      // create object
      $obj = new Products();

      //make use of delecte method
      $obj->deleteProductbytailor($_REQUEST['productid']);

     
    }

    if(isset($_REQUEST['btncancel'])){
      #redirect to list clubs
      $msg = "Product removal was not executed!";
      header("Location:tailordashboard.php?info=$msg");
    }

  ?>
  
  <div class="row">
    <div class="col-md-8 mb-4">
<?php 

        if(isset($_REQUEST['productid'])){ 
  ?>

      
      <div class="alert alert-danger">
        <h3>Are you sure you want to delete <?php echo $_REQUEST['productname']; ?></h3>
      </div>

    <form method="post" action="deleteproductbytailor.php?productid=<?php echo $_REQUEST['productid'] ?>&productname=<?php echo $_REQUEST['productname'];?>">

        <button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
        <button type="submit" name="btncancel" class="btn btn-secondary">NO</button>
      </form>
      
      

    </div>
  </div>

  <?php 

          }

       ?>
</div>