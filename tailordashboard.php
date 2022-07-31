<?php 

  include_once "portal_navigation.php"

 ?>

 <!-- Page Content -->
  
  <div class="container-fluid">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 ml-2" style="text-align: center;">

      <?php 

        if(isset($_SESSION['tusername'])){
          echo $_SESSION['tfname'];
        }
      ?>
      <small>Dashboard</small>
    </h1>

    <form method="post" action="">
      
    

         <div class="row mb-3" style="padding-left: 30px;">

          <!-- dashboard side panel -->
           <div class="col-md-2 pl-3" style="min-height: 400px; background-color:#fff; box-shadow: 0px 0px 3px 1px;">
                 <div style="width: 100%; height: 200px; box-shadow: 0px 0px 3px 1px; display: flex; justify-content: center; align-items: center;" class="mb-3 mt-3">
                   <h3 style="text-align:center">
                     <?php 

                          if(isset($_SESSION['t_id'])){
                          echo $_SESSION['tfname'].' '.$_SESSION['tlname'];

                         }
                     ?>
                   </h3>
                 </div>

                  <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="listmyproducts" id="listmyproducts" value="See Products">
                 </div>

                 <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="addproduct" id="addproduct" value="Add Product">
                 </div>

                 <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="addcategory" id="addcategory" value="Add Category">
                 </div>

                 
            </form>


         </div>

           <!-- dashboard main panel -->
           <div class="col-md-9 p-5" id="dasboardscreen" style="min-height: 10px; background-color:#fff; box-shadow: 0px 0px 3px 1px; margin-left: 30px;">

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
            if(isset($_REQUEST['info'])){

              echo $_REQUEST['info'];
            }
            ?>

      


              <!-- overview cards -->
           <div class="row">

                <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-users" style='font-size:24px'></i>
                </div>
                <?php 
                  include_once "connection/products.php";
                  $objcount = new Products;

                  $counttailorproduct = $objcount->getTailorTotalProducts($_SESSION['t_id']);
                  foreach ($counttailorproduct as $key => $value) {

                    // echo "<pre>";
                    //  print_r($counttailorproduct);
                    //  echo "</pre>";

                    
                 ?>
                <div class="mr-5"><?php echo $value['myproducts'];?> Products Listed</div>

                <?php 
                  }
                 ?>

              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
                  

        </div>
             
           </div>
         </div>
        </div>


  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" language="Javascript">
    $(document).ready(function(){
      $("#listmyproducts").click(function(){

        $.ajax({
          url:"listtailorproducts.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

      //list customers

      $("#addproduct").click(function(){

        $.ajax({
          url:"addproduct.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

      $("#addcategory").click(function(){

        $.ajax({
          url:"addcategories.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

      $("#listcategories").click(function(){

        $.ajax({
          url:"listcategories.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

    });







  </script>




  <?php 

    include_once "footer.php"

   ?>