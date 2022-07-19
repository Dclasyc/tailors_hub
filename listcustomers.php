
  <!-- Page Content -->

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">
      List of Customers
    </h3>

 
    <div class="row">
      <div class="col-md-8 mb-3">

      <a href="addcustomers.php" class="btn mybuttons mb-3" id="addcustomers">Add New Customers</a>

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
            <th>Customer Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>D.O.B</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Modify Field</th>
          </tr>
        </thead>
        <tbody>
          <?php //include the class Club

            include_once "connection/user.php";

            //create club object
             $custobj = new User();

             //reference list clubs method
  
             $customers = $custobj->listCustomers();

             // echo "<pre>";
             // print_r($customers);
             // echo "</pre>";


          ?>

          <?php

            //loop thruogh the array
             if(count ($customers)>0){

            foreach ($customers as $key => $value) {
              $customerid = $value['customer_id'];
          ?>
          <tr>
            <td><?php echo $value['customer_id']?></td>
            <td><?php echo $value['customer_username']?></td>
            <td><?php echo $value['customer_firstname']?></td>
            <td><?php echo $value['customer_lastname']?></td>
            <td><?php echo $value['customer_gender']?></td>
            <td><?php echo $value['customer_dob']?></td>
            <td><?php echo $value['customer_email']?></td>
            <td><?php echo $value['customer_phone']?></td>
            <td>
              <a href="editcustomers.php?customerid=<?php echo $customerid ?>">Edit Customer_info</a> | 
              <a href="deletecustomers.php?customerid=<?php echo $customerid ?>&customerusername=<?php echo $value['customer_username'];?>">Delete Customer_info</a>
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