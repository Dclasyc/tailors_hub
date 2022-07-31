 <?php ?>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h3 class="mt-4 mb-3">
      List of Tailors
    </h3>

 
    <div class="row">
      <div class="col-md-8 mb-3">

      <a href="addtailors.php" class="btn mybuttons mb-3">Add New Tailors</a>

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
            <th>Tailor Id</th>
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
             $tailorobj = new User();

             //reference list clubs method
  
             $tailors = $tailorobj->listTailors();

             // echo "<pre>";
             // print_r($clubs);
             // echo "</pre>";


          ?>

          <?php

            //loop thruogh the array
             if(count ($tailors)>0){

            foreach ($tailors as $key => $value) {
              $tailorid = $value['tailor_id'];
              $tailorusername = $value['tailor_username']
          ?>
          <tr>
            <td><?php echo $value['tailor_id']?></td>
            <td><?php echo $value['tailor_username']?></td>
            <td><?php echo $value['tailor_firstname']?></td>
            <td><?php echo $value['tailor_lastname']?></td>
            <td><?php echo $value['tailor_gender']?></td>
            <td><?php echo $value['tailor_dob']?></td>
            <td><?php echo $value['tailor_email']?></td>
            <td><?php echo $value['tailor_phone']?></td>
            <td>
              <a href="edittailors.php?tailorid=<?php echo $tailorid ?>" class="btn btn-success mb-1 disabled">Edit Tailor_info</a>  
              <a href="deletetailor.php?tailorid=<?php echo $tailorid ?>&tailorusername=<?php echo $value['tailor_username'];?>" class="btn btn-danger form-control">Delete Tailor_info</a>
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