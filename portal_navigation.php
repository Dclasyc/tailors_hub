<?php 
		ob_start();

		session_start();
 ?>

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
			

<nav class="navbar sticky-top navbar-expand-lg navbar-light" id="navdiv">
  <div class="container-fluid">

    <a class="" href="tailorshub.php">
		  <img src="images/navlogoedit.png" alt="logo" height="80" style="border-radius: 50%;">
	 </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #ff950a;">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navigation_item">

         
		        <li class="nav-item">
		          <a class="nav-link navtext" href="#">
		          	Hello

             <?php 

                if(isset($_SESSION['cusername'])){
                  echo $_SESSION['cfname']." ".$_SESSION['clname'];
                }

                if(isset($_SESSION['tusername'])){
                  echo $_SESSION['tfname']." ".$_SESSION['tlname'];
                }

                if(isset($_SESSION['adminid'])){
                  echo $_SESSION['adminrole'];
                }

             ?>
		          </a>
		        </li>

		        <li class="nav-link navtext" id="login_signup_divider">  |</li>

		        <?php 

		        	if(isset($_SESSION['adminid'])){

                  echo "<li class='nav-item'> <a class='nav-link navtext' href='dashboard.php'>Dashboard</a> </li>" ;

                }

		         ?>

		        <li class="nav-item">
		          <a class="nav-link navtext" href="logout.php">Log Out </a>
		        </li>

		        <li class="nav-item dropdown" style=" background-color: #ff8f1f; border-radius:5px !important">
      		<?php
      		if(isset($_SESSION['tusername'])){

           ?>    

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#fff;">
            Add Product/Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          	<?php 
          		echo "<li><a class='dropdown-item' href='addproduct.php'>Add Product</a></li>";

          		echo "<li><a class='dropdown-item' href='addcategories.php'>Add Category</a></li>";
          	 ?>
          </ul>

          

       	 </li>

       	 	<?php 
       	 		}
       	 	 ?>
      </ul>
      
        <a href="addproduct.php"><button class="btn" id="btnsell" type="button">SELL PRODUCTS</button></a>
      
    </div>
  </div>
</nav>