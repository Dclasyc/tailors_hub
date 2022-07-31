<?php 

	include_once "portal_navigation.php";

	// var_dump($_REQUEST);

 ?>

 <?php 

        if($_SERVER['REQUEST_METHOD'] == 'GET' || isset($_GET['btnviewbycategories'])){

        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";

        

    	}

        ?>

<!-- BODY OF WEBPAGE -->

<div class="container" id="parentdiv" style="background-color: rgba(218, 227, 231, 0.4);">	

	<div class="row mb-3" id="sidepanel_and_landingpics_div" style="display: flex; flex-wrap: nowrap;">

		<div class="col-lg-12" id=indexpicsdiv>

				<?php
                  include_once "connection/products.php";
                  $prodobj = new Products();
                  $productlist = $prodobj->getProductByCategory($_GET['categoryid']);

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