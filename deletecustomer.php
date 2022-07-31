 <?php 

  include_once "portal_navigation.php"

?>

<!-- page content -->

<div class="container">
  <h1 class="mt-4 mb-3">
    <small>Delete Customer</small>
  </h1>

  <?php 

    if(isset($_REQUEST['btndelete'])){
      #delete customer
      include_once("connection/user.php");

      // create object
      $obj = new User();

      //make use of delect method
      $obj->deleteCustomer($_REQUEST['customerid']);

     
    }

    if(isset($_REQUEST['btncancel'])){
      #redirect to list clubs
      $msg = "Customer delete not executed";
      header("Location:dashboard.php?info=$msg");
    }

  ?>

  <div class="row">
    <div class="col-md-8 mb-4">
      <?php 

        if(isset($_REQUEST['customerid'])){
      ?>
      <div class="alert alert-danger">
        <h3>Are you sure you want to delete <?php echo $_REQUEST['customerusername']; ?></h3>
      </div>

    <form method="post" action="deletecustomer.php?customerid=<?php echo $_REQUEST['customerid'] ?>&customerusername=<?php echo $_REQUEST['customerusername'];?>">

        <button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
        <button type="submit" name="btncancel" class="btn btn-secondary">NO</button>
      </form>
      <?php
        }
      ?>
    </div>
  </div>
</div>