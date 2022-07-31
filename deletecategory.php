 <?php 

  include_once "portal_navigation.php"

?>

<!-- page content -->

<div class="container">
  <h1 class="mt-4 mb-3">
    <small>Delete Category</small>
  </h1>

  <?php 

    if(isset($_REQUEST['btndelete'])){
      #delete category
      include_once("connection/products.php");

      // create object
      $obj = new Products();

      //make use of delect method
      $obj->deleteCategory($_REQUEST['categoryid']);

     
    }

    if(isset($_REQUEST['btncancel'])){
      #redirect to list clubs
      $msg = "Category not executed";
      header("Location:listcategories.php?info=$msg");
    }

  ?>

  <div class="row">
    <div class="col-md-8 mb-4">
      <?php                                                                                                                                
        if(isset($_REQUEST['categoryid'])){
      ?>
      <div class="alert alert-danger">
        <h3>Are you sure you want to delete <?php echo $_REQUEST['categoryname']; ?></h3>
      </div>

    <form method="post" action="deletecategory.php?categoryid=<?php echo $_REQUEST['categoryid'] ?>&categoryname=<?php echo $_REQUEST['categoryname'];?>">

        <button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
        <button type="submit" name="btncancel" class="btn btn-secondary">NO</button>
      </form>
      <?php
        }
      ?>
    </div>
  </div>
</div>