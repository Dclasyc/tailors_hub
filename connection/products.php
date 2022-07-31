<?php 

	include_once "dbconnector.php";

	//class definition
	class Products{
		// member variables

		public $price;
		public $categories;
		public $product;
		public $imageurl;
		public $conn; // database  connoection handler


		//member methods
		public function __construct(){
			//open DB connection

			$this->conn = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

			// check if connected

			if($this->conn->connect_error){
				die("Failed to Connect".$this->conn->connect_error);
			}
		}


		#begin listproduct method

		public function listProducts(){
			//prepare statment
			$statement = $this->conn->prepare("SELECT * FROM product ORDER BY product_id DESC");

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}

		#End listproducts method



		#begin get all product information

		public function getproductinfo(){
			//prepare statement
			$statement = $this->conn->prepare("SELECT * FROM product JOIN tailors ON product.tailor_id = tailors.tailor_id;");

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}


		#End get all product information



		public function insertProducts($name, $description, $price, $category, $tailorid){
				// prepare statement

			// var_dump($name,$description, $price, $imageurl, $category, $tailorid);
			// 	exit();

			$statement = $this->conn->prepare("INSERT INTO product(product_name, product_desc, product_price, productimage_url, category_id, tailor_id)VALUES(?,?,?,?,?,?)");


				$ext = array('jpg','png','jpeg','gif');

				//create object of PictureUpload
				include_once "connection/pictureupload";
				$obj = new Pictures;
				$imageurl = $obj->uploadAnyFile("designs/",3024876, $ext);

				// echo "<pre>";
				// print_r($imageurl);
				// echo "<pre>";
				// exit();
				

				if(array_key_exists('success', $imageurl)){

					$filename = $imageurl['success'];
			

			//bind parameters
			$statement->bind_param("ssisii", $name, $description, $price, $filename, $category, $tailorid);

			//execute
			$statement->execute();

			// var_dump($statement->affected_rows);
			// exit();

			if($statement->affected_rows == 1){
				return true;
			}else{
				return false.$statement->error;
				}

			}else{ 
				return $imageurl['error'];
			
			}
		}
		#end insert products

		#start Edit products


		public function editproduct($productname, $productdesc, $productprice,$productcategory){
			// prepare trhe statement

		$statement = $this->conn->prepare("UPDATE product SET product_name=?, product_desc=?, product_price=?, product_category=? WHERE product_id=?");

			//bind parameters

			$statement->bind_param("ssisi", $productname, $productdesc, $productprice, $productcategory,$productid);

			//execute

			$statement->execute();

			//check if update was successfully done

			 return $statement->affected_rows;

		}

		#End Edit Products

		#Begin Delete Product

		public function deleteProduct($id){
			// prepare the statment
			$statement = $this->conn->prepare("DELETE FROM product WHERE product_id=?");

			// bind parameters
			$statement->bind_param("i",$id);

			//execute

			$statement->execute();

			// check if record was deleted
			if($statement->affected_rows == 1){
				//redirect to listclubs
				$msg ="product was successfully deleted!";
				header("Location:listproducts.php?m=$msg");
				exit;
			}else{
				//redirect to List Products

				$msg = "Oops! Could not delete product record.";
				header("Location:listproducts.php?err=$msg");
				exit;
			}
		}

		#End Delete Products



		#start insert category


		public function addCategories($categoryname){
			// prepare the statement
			$statement = $this->conn->prepare("INSERT INTO product_category(category_name) VALUES(?)");

			//bind parameters
			
			$statement->bind_param('s',$categoryname);

			//execute
			$statement->execute();

			if($statement->affected_rows == 1){
				return true;
			}else{
				return false;
			}
		}

		# End insert Category


		# Start get categories

		public function getCategories(){
			//prepare statement

			$statement = $this->conn->prepare("SELECT * FROM product_category ORDER BY category_name ASC");
			

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;
		}

		# End get categories

		# start get categories for edit

		public function getCategoryForEdit($catid){
			// prepare statement
			$statement = $this->conn->prepare("SELECT * FROM product_category WHERE category_id=?");

			// bind the parameter
			$statement->bind_param("i", $catid);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			return $result->fetch_assoc();
		}

		#End get categories for edit




		# start get products regarding to tailor id

		public function getTailorProduct($tailorid){
			// prepare statement
			$statement = $this->conn->prepare("SELECT * FROM product WHERE tailor_id=?");

			// bind the parameter
			$statement->bind_param("i", $tailorid);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

			
		}

		#End get products regarding to tailor id


		# start get products by categories

		public function getProductByCategory($catid){
			// prepare statement
			$statement = $this->conn->prepare("SELECT * FROM product JOIN tailors ON product.tailor_id = tailors.tailor_id WHERE product.category_id =?");

			// bind the parameter
			$statement->bind_param("i", $catid);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}else{
				echo "<div class='alert alert-success' style='width:inherit'><h3 style='text-align:center'>No Products Has Been Listed Under This Category!</h3></div>";
			}
			
				return $data;
			}

			
	


		#End get products by categories



		# start get products regarding to tailor id for edit

		public function getProductForEdit($productid){
			// prepare statement
			$statement = $this->conn->prepare("SELECT * FROM product WHERE product_id=?");

			// bind the parameter
			$statement->bind_param("i", $productid);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			return $result->fetch_assoc();
		}

		#End get products regarding to tailor id for id




		#start Edit category

		public function editCategory($categoryname, $categoryid){
			// prepare trhe statement

			$statement = $this->conn->prepare("UPDATE product_category SET category_name=? WHERE category_id=?");

		//bind parameters

			$statement->bind_param("si", $categoryname, $categoryid);

		//execute prepared statement
		$statement->execute();
		//check if inserted successful

		if($statement->error){
			return "<div class='alert alert-danger'>oops something happenned! Please Fill all neccessary fields</div>".$statement->error;
		}else{
			return "<div class='alert alert-success'>Update was successful</div>";
		} 
	}


		#End Edit category

		#Begin Delete category

		public function deleteCategory($id){
			// prepare the statment
			$statement = $this->conn->prepare("DELETE FROM product_category WHERE category_id=?");

			// bind parameters
			$statement->bind_param("i",$id);

			//execute

			$statement->execute();

			// check if record was deleted
			if($statement->affected_rows == 1){
				//redirect to listclubs
				$msg ="category was successfully deleted!";
				header("Location:listcategories.php?m=$msg");
				exit;
			}else{
				//redirect to listclubs
				$msg = "Oops! Could not delete record.";
				header("Location:listcategories.php?err=$msg");
				exit;
			}
		}

		#End Delete Categories



		#Start insert feedback

			public function addReviews($comment, $productid, $customerid, $tailorid){
			// prepare the statement
			$statement = $this->conn->prepare("INSERT INTO review(review_comment,product_id,customer_id,tailor_id) VALUES(?,?,?,?)");

			//bind parameters
			
			$statement->bind_param('siii',$comment, $productid, $customerid, $tailorid);

			//execute
			$statement->execute();

			if($statement->affected_rows == 1){
				return true;
			}else{
				return false.$statement->error;
			}
		}

	
		#End insert feedback


		#Start fetch Feedback/Reviews

			public function getReviews($id){
			//prepare statement

		$statement = $this->conn->prepare("SELECT review.review_comment, customer.customer_firstname, customer.customer_lastname,
												tailors.tailor_username
											 	FROM review 
												JOIN tailors ON review.tailor_id = tailors.tailor_id
												JOIN customer ON review.customer_id = customer.customer_id
												JOIN product ON review.product_id = product.product_id
												WHERE review.product_id =? ");
			
			$statement->bind_param("i",$id);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;
		}


		#End fetch Review



		#Start fetch tailor phone number from product clicked

			public function gettailorphone($id){
			//prepare statement

		$statement = $this->conn->prepare("SELECT tailors.tailor_phone
											 	FROM tailors 
												JOIN product ON tailors.tailor_id = product.tailor_id
												WHERE product.product_id =?;");
			
			$statement->bind_param("i",$id);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;
		}


		#End fetch Review


		#Start Count Products for Admin

		public function getTotalProducts(){

        $statement = $this->conn->prepare("SELECT COUNT(*) as total FROM product");

        
        //execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}

		#End Count Products for Admin


		#Start Count Products for tailor

		public function getTailorTotalProducts($tailorid){

        $statement = $this->conn->prepare("SELECT COUNT(*) as myproducts FROM product WHERE tailor_id=?");

        // Bind parameters

        $statement->bind_param("i",$tailorid);
        //execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}

		#End Count Products for Tailor


		#Start Count Categories

		public function getTotalCategories(){

        $statement = $this->conn->prepare("SELECT COUNT(*) as total FROM product_category");

        
        //execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			$data = array();
			if($result->num_rows > 0){
				#fetch row
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
			}
			return $data;

		}

		#End Count Categories

	}

 ?>