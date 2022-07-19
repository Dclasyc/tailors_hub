 <?php 


      include_once "portal_navigation.php";
 ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">
      List of Categories
    </h3>

 
    <div class="row">
      <div class="col-md-8 mb-3">

      <a href="addcategories.php" class="btn mybuttons mb-3" id="addcategory">Add New Category</a>

      <?php
        if(isset($_REQUEST['m'])){
      ?>

      <div class="alert alert-success">
        <?php echo $_REQUEST['m']; ?>
      </div>

      <?php
      }

      ?>

      <?php
        if(isset($_REQUEST['err'])){
      ?>

      <div class="alert alert-danger">
        <?php echo $_REQUEST['err']; ?>
      </div>

      <?php
      }

      ?>

      <?php if (isset($_REQUEST['info'])){
      ?>
      <div class="alert alert-info">
        <?php echo $_REQUEST['info'];?>
      </div>

      <?php
      }
      ?>
 
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Modify Field</th>
          </tr>
        </thead>
        <tbody>
          <?php //include the class Club

            include_once "connection/products.php";

            //create club object
             $categoryobj = new Products();

             //reference list clubs method
  
             $categories = $categoryobj->getCategories();

             // echo "<pre>";
             // print_r($categories);
             // echo "</pre>";


          ?>

          <?php

            //loop thruogh the array
             if(count ($categories)>0){

            foreach ($categories as $key => $value) {
              $categoryid = $value['category_id'];
          ?>
          <tr>
            <td><?php echo $value['category_id']?></td>
            <td><?php echo $value['category_name']?></td>
            <td>
              <a href="editcategory.php?categoryid=<?php echo $categoryid ?>" class="btn btn-success mb-1">Edit Category</a>
              <a href="deletecategory.php?categoryid=<?php echo $categoryid ?>&categoryname=<?php echo $value['category_name'];?>" class="btn btn-danger"> Delete Category</a>
            </td>

          </tr>

          <?php 
          } 

        }
          ?>
          
        </tbody>
      </table>
        
      </div>

    </div>
    <!-- /.row -->

  </div>

  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" language="Javascript">
    







  </script>