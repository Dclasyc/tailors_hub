<?php 

  include_once "portal_navigation.php"

 ?>

 <!-- Page Content -->
  
  <div class="container-fluid">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 ml-2" style="text-align: center;">

      <?php 

        if(isset($_SESSION['adminid'])){
          echo $_SESSION['adminrole'];
        }
      ?>
      <small>Dashboard</small>
    </h1>

    <form method="post" action="">
      
    

         <div class="row mb-3" style="padding-left: 30px;">

          <!-- dashboard side panel -->
           <div class="col-md-2 pl-3" style="min-height: 400px; background-color:#fff; box-shadow: 0px 0px 3px 1px;">
                 <div style="width: 100%; height: 200px; box-shadow: 0px 0px 3px 1px; display: flex; justify-content: center; align-items: center;" class="mb-3 mt-3">
                   <h3>
                     <?php 

                        if(isset($_SESSION['adminid'])){
                         echo $_SESSION['adminrole'];
                         }
                     ?>
                   </h3>
                 </div>

                  <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="listtailors" id="listtailors" value="List Tailors">
                 </div>

                 <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="listcustomers" id="listcustomers" value="List Customers">
                 </div>

                 <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="listproducts" id="listproducts" value="List Products">
                 </div>

                 <div class="mb-3">
                   <input type="button" class="btn mybuttons form-control" name="listcategories" id="listcategories" value="List Categories">
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
             
           </div>
         </div>
        </div>


  <script type="text/javascript" src="jquery/jquery.min.js"></script>
  <script type="text/javascript" language="Javascript">
    $(document).ready(function(){
      $("#listtailors").click(function(){

        $.ajax({
          url:"listtailors.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

      //list customers

      $("#listcustomers").click(function(){

        $.ajax({
          url:"listcustomers.php",
          type:"POST",
          success:function(data){
          $('#dasboardscreen').html(data);
        },
        })
      })

      $("#listproducts").click(function(){

        $.ajax({
          url:"listproducts.php",
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