<?php 
		ob_start();

		session_start();

		if(isset($_SESSION['cusername'])){

	}elseif(isset($_SESSION['tusername'])){
		
	}elseif(isset($_SESSION['adminid'])){

	}else{
		$message = "<h5>You need to login to see product details!</h5>";

                	//redirect
                	header("Location:index.php?m=$message");
                	session_destroy();
	}
 ?>

 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="get the best tailors for your various fashion needs" />
	<meta name="Keywords" content=" tailors; fashion; attires; clothes; wardrobe; male fashion; female fashion; fashion trend; tailors hub; aso ebi; trousers" />
	<meta name="author" content=" Oladipo Samuel Akarigbo" />

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/all.min.css">
	<script src="bootstrap/js/all.min.js"></script>

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
		          	

             <?php 

                if(isset($_SESSION['cusername'])){
                  echo 'Hello '.$_SESSION['cfname']." ".$_SESSION['clname'];
                }

                if(isset($_SESSION['tusername'])){
                  echo 'Hello '.$_SESSION['tfname']." ".$_SESSION['tlname'];
                }

                if(isset($_SESSION['adminid'])){
                  echo 'Hello '.$_SESSION['adminrole'];
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
		          <a class="nav-link navtext" href="logout.php">Log Out</a>
		        </li>

		        <li class="nav-item dropdown" style=" background-color: #ff8f1f; border-radius:5px !important">
      		<?php
      		if(isset($_SESSION['tusername'])){

           ?>    

          <a class="nav-link dropdown-toggle ps-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#fff;">
            Add Product/Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          	<?php 
          		echo "<li><a class='dropdown-item' href='addproduct.php'>Add Product</a></li>";

          		echo "<li><a class='dropdown-item' href='addcategories.php'>Add Category</a></li>";

          		echo "<li><a class='dropdown-item' href='tailordashboard.php'>Dashboard</a></li>";
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