 <?php 

  include_once "portal_navigation.php"

?>

<!-- page content -->

<div class="container">
  <h1 class="mt-4 mb-3">
    <small>Delete Tailor</small>
  </h1>

  <?php 

    if(isset($_REQUEST['btndelete'])){
      #delete tailor
      include_once("connection/user.php");

      // create object
      $obj = new User();

      //make use of delecte method
      $obj->deleteTailor($_REQUEST['tailorid']);

     
    }

    if(isset($_REQUEST['btncancel'])){
      #redirect to list clubs
      $msg = "Talior Delete not executed";
      header("Location:dashboard.php?info=$msg");
    }

  ?>
  
  <div class="row">
    <div class="col-md-8 mb-4">
<?php 

        if(isset($_REQUEST['tailorid'])){ 
  ?>

      
      <div class="alert alert-danger">
        <h3>Are you sure you want to delete <?php echo $_REQUEST['tailorusername']; ?></h3>
      </div>

    <form method="post" action="deletetailor.php?tailorid=<?php echo $_REQUEST['tailorid'] ?>&tusername=<?php echo $_REQUEST['tailorusername'];?>">

        <button type="submit" name="btndelete" class="btn btn-danger">Yes</button>
        <button type="submit" name="btncancel" class="btn btn-secondary">NO</button>
      </form>
      
      

    </div>
  </div>

  <?php 

          }

       ?>
</div>