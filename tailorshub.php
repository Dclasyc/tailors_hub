<?php 

	include_once "portal_navigation.php";

	// var_dump($_SESSION)

 ?>





<!-- BODY OF WEBPAGE -->

<div class="container-fluid" id="parentdiv" style="background-color: rgba(218, 227, 231, 0.4);">	


	<div class="row mb-3">


		<div class="col-lg-12 " id="adsdiv">

			
			
			<!-- Ads Div -->

				<div id="carouselExampleControls" class="carousel slide hidden-lg" data-bs-ride="carousel">
			  <div class="carousel-inner">
			  	<div class="carousel-item">
			      <img src="images/cara7.jpg" class="d-block w-100" alt="carouse1 image" style="height:400px">
			    </div>
			    <div class="carousel-item">
			      <img src="images/cara3.jpg" class="d-block w-100" alt="carouse2 image" style="height:400px">
			    </div>
			    <div class="carousel-item active">
			      <img src="images/cara51.jpg" class="d-block w-100" alt="carouse2 image" style="height:400px">
			    </div>
			    <div class="carousel-item">
			      <img src="images/cara62.jpg" class="d-block w-100" alt="carouse3 image" style="height:400px">
			    </div>
			    <div class="carousel-item">
			      <img src="images/cara41.jpg" class="d-block w-100" alt="carousel4 image" style="height:400px">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>


		</div>
		
	</div>


	
	<div class="row mb-3" id="sidepanel_and_landingpics_div" style="display: flex; flex-wrap: nowrap;">
		
		<div class="col-lg-4" id="sidepanel">

			<h5 style="text-align:" class="">SEE PRODUCTS BY CATEGORIES</h5>

			<!-- Populate Categories here -->
		
						<?php
                  include_once "connection/products.php";
                  $categoryobj = new Products();
                  $categories = $categoryobj->getCategories();

                  // $options = "<option value''>--Categories--</option>";

                  foreach ($categories as $key => $value) {
                    $categoryid = $value['category_id'];
                    $categoryname = $value['category_name'];
                    
                 
            ?>

       
				<form method="get" action="tailorshubbycategory.php">

				<button type="submit" name="btnviewbycategories" style="border:0px">
				<div class='row sidepanellist' class='sidepanellist' id='menscasual' style='display:flex; justify-content: space-between;'>

				<h4>
					<input type="hidden" name="categoryid" value="<?php echo $categoryid ?>">
					<?php 
							echo $categoryname
					 ?>
				</h4>
			</div>
			</button>
			</form>

			<?php 

					 }

			 ?>

		</div>
		


		<div class="col-lg-8" id=indexpicsdiv>

				<?php
                  include_once "connection/products.php";
                  $prodobj = new Products();
                  $productlist = $prodobj->getproductinfo();

                  if(count($productlist)> 0){
                  foreach ($productlist as $key => $value) {
                  	$productid = $value['product_id'];
                    $productimage = $value['productimage_url'];
                    $productprice = $value['product_price'];
                    $productname = $value['product_name'];
                    $productdesc = $value['product_desc'];
                    $tailorusername = $value['tailor_username'];
                    $tailorid = $value['tailor_id'];
                         
            ?>
      <form method="post" action="productinformation.php">
				<div class="card landingpagepics">
				<img  class="card-img-top" src= "<?php echo 'designs/'.$productimage?>" alt="Card image">
					  
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $productname ?></h5>
					    <p class="card-text">&#8358 <?php echo number_format($productprice,2) ?>
					    	
					    	
                  <input type="hidden" name="price" value="<?php echo $value['product_price']; ?>">
                  <input type="hidden" name="productid" value="<?php echo $value['product_id']; ?>">
                  <input type="hidden" name="productname" value="<?php echo $value['product_name']; ?>">
                  <input type="hidden" name="productpicture" value="<?php echo $value['productimage_url']?>">
                  <input type="hidden" name="productdescription" value="<?php echo $value['product_desc']; ?>">
                  <input type="hidden" name="tailorusername" value="<?php echo $value['tailor_username']; ?>">
                  <input type="hidden" name="tailorid" value="<?php echo $value['tailor_id']; ?>">

          			<button class="btn ms-4" id="btnorder" name="btnorder">Order</button>
					    </p>

					  </div>
				</div>
</form>
						
										

				<?php 

						}
					}

				 ?>

				




			</div>


		</div>
		
	</div>





	<!-- FOOTER SECTION -->

	<?php 

		include_once "footer.php"

	 ?>


</body>
</html>