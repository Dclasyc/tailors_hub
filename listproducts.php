 <?php 

 ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">
      List of Products
    </h3>

 
    <div class="row">
      <div class="col-md-8 mb-3">


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
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product_Description</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Category ID</th>
            <th>Tailor ID</th>
            <th>Modify Field</th>
          </tr>
        </thead>
        <tbody>
          <?php //include the class Club

            include_once "connection/products.php";

            //create club object
             $productobj = new Products();

             //reference list clubs method
  
             $product = $productobj->listProducts();

             // echo "<pre>";
             // print_r($product);
             // echo "</pre>";


          ?>

          <?php

            //loop thruogh the array
             if(count ($product)>0){

            foreach ($product as $key => $value) {
              $productid = $value['product_id'];
          ?>
          <tr>
            <td><?php echo $value['product_id']?></td>
            <td><?php echo $value['product_name']?></td>
            <td><?php echo $value['product_desc']?></td>
            <td><?php echo $value['product_price']?></td>
            <td><?php echo $value['productimage_url']?></td>
            <td><?php echo $value['category_id']?></td>
            <td><?php echo $value['tailor_id']?></td>
            <td>
            <a href="editproducts.php?categoryid=<?php echo $productid ?>" class="btn btn-success form-control mb-1" >Edit</a>
            <a href="deleteproduct.php?productid=<?php echo $productid ?>&productname=<?php echo $value['product_name'];?>" class="btn btn-danger form-control"> Delete</a>
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