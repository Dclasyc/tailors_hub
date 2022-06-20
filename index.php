<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"> -->

	<!-- <link rel="stylesheet" type="text/css" href="finalproject.css"> -->

	<style>
  <?php include "finalproject.css" ?>
</style>

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

	<title>Tailors Hub</title>
</head>
<body>


			<!-- Navigation panel -->
			

<div >
<nav class="navbar navbar-expand-lg navbar-light" id="navdiv">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php">
		  <img src="images/navlogo.jpg" alt="logo" height="50">
	 </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #ff950a;">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navigation_item">
         
		        <li class="nav-item">
		          <a class="nav-link navtext" href="signin.php">Log In</a>
		        </li>

		        <li class="nav-link navtext" id="login_signup_divider">|</li>

		        <li class="nav-item">
		          <a class="nav-link navtext" href="signup.php">Sign Up</a>
		        </li>
      </ul>
      
        <a href="#"><button class="btn" id="btnsell" type="button">SELL PRODUCTS</button></a>
      
    </div>
  </div>
</nav>
</div>


		<!-- BODY OF WEBPAGE -->

<div class="container-fluid" id="parentdiv" style="background-color: rgba(218, 227, 231, 0.4);">	


	<div class="row mb-3">


		<div class="col-lg-12 " id="adsdiv">
			
			<!-- Ads Div -->

				<div id="carouselExampleControls" class="carousel slide hidden-lg" data-bs-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="images/ads3.jpg" class="d-block w-100" alt="carousel image" style="height:300px">
			    </div>
			    <div class="carousel-item">
			      <img src="images/ads2.jpg" class="d-block w-100" alt="carousel image" style="height:300px">
			    </div>
			    <div class="carousel-item">
			      <img src="images/ads1.jpg" class="d-block w-100" alt="carousel image" style="height:300px">
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

			<div class="row sidepanellist" class="sidepanellist" id="menscasual">
				<h4>Men's Casual</h4>
			</div>


			<div class="row sidepanellist" id="womenscasual">
				<h4>Women's Casual</h4>
			</div>


			<div class="row sidepanellist" id="mensnative">
				<h4>Men's Native</h4>
			</div>


			<div class="row sidepanellist" id="womensnative">
				<h4>Women's Native</h4>
			</div>


			<div class="row sidepanellist" id="mensformal">
				<h4>Men's Corporate</h4>
			</div>

			<div class="row sidepanellist" id="womensformal">
				<h4>Women's Corporate</h4>
			</div>

			<div class="row sidepanellist" id="menswedding">
				<h4>Men's Bridal</h4>
			</div>


			<div class="row sidepanellist" id="womenswedding">
				<h4>Women's Bridal</h4>
			</div>


		</div>


		<div class="col-lg-8" id=indexpicsdiv>
			
				<div class="card landingpagepics">

						<img class="card-img-top" src="images/mens/menscasual.jpg" alt="Card image">
					  <div class="card-body">
					    <h5 class="card-title">N-Price</h5>
					    <p class="card-text">Details of item</p>
					  </div>
						
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>

				<div class="card landingpagepics">
					
				</div>



		</div>


	</div>
		
	</div>




	<!-- FOOTER SECTION -->

	<div id=footerdiv>

		<div id="overlay"></div>
		
	</div>


</body>
</html>