<?php 

	include_once "portal_navigation.php";


//check if add Post feedback button is clicked

	if(isset($_SESSION['cusername'])){

	}elseif(isset($_SESSION['tusername'])){
		
	}else{
		$message = "<h5>You need to login to see product details!</h5>";

                	//redirect
                	header("Location:index.php?m=$message");
                	session_destroy();
	}


if(isset($_POST['btnpostreview']) && $_SESSION['cusername']){


	//validate inputs
		if(empty($_POST['postreview'])){
        $errors['postreview'] = "Review field cannot be empty";
    	}

      if (empty($errors)) {


      //Sanitize input

      include_once "connection/common.php";
      $cmobj = new Common;

      //make use of sanitizeinput method
      $reviewcomment = $cmobj->sanitizeDescription($_POST['postreview']);


      //create object of user class $ pass parameters to signup method;
      include_once "connection/products.php";
      $reviewobj = new Products();

      $customerid =$_SESSION['c_id'];


      //store what it returns in output variable
      $reviewoutput = $reviewobj->addReviews($reviewcomment,$_POST['productid'], $customerid, $_POST['tailorid'],);

      //check if its sucessfull

      if($reviewoutput == true){
        $msg = "Review was successfully added";

      }else{
        $errors[] = "Oops! could not add post review. Only buyers can post reivews of items purchased".$reviewoutput;
      }
 	}

}

 ?>

 <!-- Body 0f Page -->

 <div class="row mt-3" style="width:98%; justify-content: center;">
 	<div class="row" id="top">

 		<!-- 1st div -->

 		<div class="col-md-7 col-lg-8 m-3">

 		<?php 

        if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['btnorder'])){

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        

    	}

        ?>


 			<div class="productinfoimg mt-2 mb-3" id="prodinfocarddetaildiv">
					<img class="card-imginfo-top" id="productinfopicture" src="designs/<?php echo $_POST['productpicture']?>" alt="<?php echo $_POST['productname'] ?>">
					  <div class="card-body mt-4">

					  	<div id="card-title-div" class="mb-5">
					  		
					  	  <h1 class="card-title" id="productname"><?php echo $_POST['productname'] ?></h1>
					    </div>

					    <div class="mb-5" id="carddescriptiondiv">
					 	   <h3 class="card-text">Description</h3>
					 	   <p class="card-text"><?php echo $_POST['productdescription'] ?></p>
					    </div>

					    <div class="mb-5" id="cardbuttondiv">
					    	<a href="#top"><button type="button" class="btn mybuttons mt-3" id="btnseesellerdetails">See Seller Details</button></a>
					    </div>

					  </div>
				</div>

			
 			
 		</div>
 		<!-- End of 1st Div -->




 		<!-- 2nd div -->

 	<div class="col-md-4 col-lg-3 mt-4 ms-3">

 			<div id="prodpricediv" class="sideprodinfodiv mb-3">
 				<h1>&#8358 <?php echo number_format($_POST['price']) ?></h1>
 			</div>
 		
 			<div class="sideprodinfodiv mb-3 p-3" id="productusername" style="display:flex; flex-wrap: wrap; justify-content: center;">
 				<h1><?php echo $_POST['tailorusername'] ?></h1>
 				<?php
 				include_once "connection/products.php"; 
 				$objcontact = new Products();
                $tcontact = $objcontact->gettailorphone($_POST['productid']);

                  if(count($tcontact) > 0){
                  foreach ($tcontact as $key => $value) {

                  	$tailorcontact = $value['tailor_phone'];
                   
                 ?>
 				<button type="button" class="btn mybuttons mt-3 mb-2 form-control" id="sellerbtn" style="justify-content:center;"><i class="fa fa-mobile-alt" style="color:#ff8f1f; font-size: 30px;"></i> <b style="font-size :25px;"><?php echo $tailorcontact ?></b></button>
 				<?php 
 					}
 				}
 				 ?>
 			</div>

 			<div class="sideprodinfodiv mb-3 p-3" id="productfeedbackdiv">
 				<button type="button" class="btn mt-2 mb-2 form-control" id="btnfeedback"><b>Leave Feedback</b></button>

 				
 					<div id="feedbacktext">
 						<div id="feedbacksuccessalert" class="row ps-1 pe-1"></div>
 						<form action="" method="post">

 							<textarea cols="35" rows="5" name="postreview"></textarea>
 							<button type="submit" name="btnpostreview" id="btnpostreview" class="btn mybuttons" style="align-self: flex-start;">Post</button>

 				  <input type="hidden" name="price" value="<?php echo $_POST['price']; ?>">
                  <input type="hidden" name="productid" value="<?php echo $_POST['productid']; ?>">
                  <input type="hidden" name="productname" value="<?php echo $_POST['productname']; ?>">
                  <input type="hidden" name="productpicture" value="<?php echo $_POST['productpicture']?>">
                  <input type="hidden" name="productdescription" value="<?php echo $_POST['productdescription']; ?>">
                  <input type="hidden" name="tailorusername" value="<?php echo $_POST['tailorusername']; ?>">
                  <input type="hidden" name="tailorid" value="<?php echo $_POST['tailorid']; ?>">

 							</form>

 					</div>
 				

 			</div>

 			<div class="sideprodinfodiv mb-3 p-2" id="productsafetyinfo">
 				<h5>Safety Information</h5>

 				<ol style="text-align: start">

 					<li>
 						Don't pay upfront, including for fees for delivery.
 					</li>

 					<li>
 						 Meet the seller at a public place you have ascertained safe.
 					</li>
 					
 					<li>
 						 On delivery, check the delivered item and ensure it matches what you want.
 					</li>
					
					
 					<li>
 						 Only pay when you are satisfied of product delivered.
 					</li>
					
 				</ol>
 			</div>
 		
 			<div class="sideprodinfodiv mb-3 p-2" >

 				<?php
                  include_once "connection/products.php";
                  $objreview = new Products();
                  $reviewslist = $objreview->getReviews($_POST['productid']);

                  if(count($reviewslist)> 0){
                  foreach ($reviewslist as $key => $value) {

                  	$customerfeedback = $value['review_comment'];
                    $tailorname = $value['tailor_username'];
                    $customerfname =$value['customer_firstname'];
                    $customerlname =$value['customer_lastname'];
                ?>
                <h4 style="color: black;">Customer Reviews on <?php echo $tailorname ?></h4>
 				<div style="">
 					<h6 style="text-align: start"><?php echo "$customerfname"." "."$customerlname" ?></h6>
 					<p style="text-align: start">
 						- <?php echo $customerfeedback ?>
 					</p><br>
 					
 				</div>
 			<?php 
 					}
 				}else{ echo "<p> No reviews yet </p>";};
 			 ?>
 			</div>

 	</div>
 		<!-- End of 2nd Div -->

 	</div>

 </div>
<script type="text/javascript" src="jquery/jquery.min.js"></script>
 <script type="text/javascript">
 	
 $(document).ready(function(){

// Hide and show feedback button
	$('#feedbacktext').hide();
  	$('#btnfeedback').click(function(){

  		$('#feedbacktext').toggle(500);   
  
	}); 


	// for review section

	   $("form").submit(function(){


	   	if (!$('#postreview').val()) {
            document.getElementById('feedbacksuccessalert').innerHTML = "<div class='alert alert-danger'><h6>Kindly input a valid review!</h6></div>";
        }else{

	   	var dataString = $(this).serializeArray();

        $.ajax({
          url:"productinformation.php",
          type:"POST",
          data: dataString,
          success:function(data){
          $('#feedbacksuccessalert').html("<div id='message' class='alert alert-success'></div>");
          $('#message').html("<h6>Feedback Submitted!</h6>")
        },

        });

    	} // else closing curly brace
        
      })

})

 

   // if($(this).val() == 'register'){

   //    $('#formold').hide(3000);
      

   //  }else{
   //    $('#formold').show(3000);
   //    $('#formnew').hide(2000);
   //  }

   // })

//    $(document).ready(function(){
//   $("button").click(function(){
//     $("p").toggle();
//   });
// });


// $('#submit').click(function() {
//         if (!$('#name').val()) {
//             alert('Enter your name!');
//         }
//     })

 </script>


 
 </body>
 </html>