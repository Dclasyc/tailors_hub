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


		#begin getproduct method

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

		#End getproducts method

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


		public function editproduct($productname, $productdesc, $productprice, $productimage){
			// prepare trhe statement

		$statement = $this->conn->prepare("UPDATE product SET product_name=?, product_desc=?, product_price=?, productimage_url=? WHERE product_id=?");

			//bind parameters

			$statement->bind_param("ssis", $productname, $productdesc, $productprice, $productimage);

			//execute

			$statement->execute();

			//check if update was successfully done

			 return $statement->affected_rows;

		}

		#End Edit Products

		#Begin Delete Product

		public function deleteProduct($id){
			// prepare the statment
			$statement = $this->conn->prepare("DELETE FROM product WHERE category_id=?");

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

				$msg = "Oops! Could not delete club record.";
				header("Location:listcategories.php?err=$msg");
				exit;
			}
		}

		#End Delete Categories
	}

 ?>