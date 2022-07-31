

<?php 

	//include constants
	include_once "dbconnector.php";

	//Class definition

	class User{
		//member variables
		public $usename;
		public $firstname;
		public $lastname;
		public $phone;
		public $email;
		public $gender;
		public $dob;
		public $password;
		public $conn; // DB Connnection Handler


		//member Functions

		#begin constructor
		public function __construct(){
			//create mysqli object
			$this->conn = new Mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);

			// check if connected

			if($this->conn->connect_error){
				die("connection Failed! ".$this->conn->connect_error);
			}
		}

		#end Constructor;

		#begin Customer Signup
		public function CustomerSignUp($username, $fname, $lname, $gender, $dob, $email, $phone, $password){
			//initialize members variables


			//hash password
			$pswd = password_hash($password, PASSWORD_DEFAULT);

			//prepare statement
			$statement = $this->conn->prepare("INSERT INTO customer(customer_username, customer_firstname, customer_lastname, customer_gender, customer_dob, customer_email, customer_phone, customer_password) VALUES(?,?,?,?,?,?,?,?)"); //this has to be in sync with your table


			//bind this just created to the parameters in the function above
			$statement->bind_param("ssssssss",$username, $fname, $lname, $gender, $dob, $email, $phone, $pswd);

			//execute
			$statement->execute();


			//since we are inserting, we use affected_row
			if($statement->affected_rows == 1){
				return true;
			}else{
				return false;

			}

			
		}
		#End customer signup


			#begin Tailor Signup
		public function TailorSignUp($username, $fname, $lname, $gender, $dob, $email, $phone, $password){
			//initialize members variables


			//hash password
			$pswd = password_hash($password, PASSWORD_DEFAULT);

			//prepare statement
			$statement = $this->conn->prepare("INSERT INTO tailors(tailor_username, tailor_firstname, tailor_lastname, tailor_gender, tailor_dob, tailor_email, tailor_phone, tailor_password) VALUES(?,?,?,?,?,?,?,?)"); //this has to be in sync with your table


			//bind this just created to the parameters in the function above
			$statement->bind_param("ssssssss",$username, $fname, $lname, $gender, $dob, $email, $phone, $pswd);

			//execute
			$statement->execute();


			//since we are inserting, we use affected_row
			if($statement->affected_rows == 1){
				return true;
			}else{
				return false;

			}

			
		}
		#End Tailor signup



		#begin customer login

		public function customerLogin($email, $password){
			// prepare statment
			$statement = $this->conn->prepare("SELECT * FROM customer WHERE customer_email = ?");

			//bind the parameter $email in the function above to the email_address form the database
			$statement->bind_param("s",$email);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			if($result->num_rows == 1){
				$row = $result->fetch_assoc();


				//check if password match
				if(password_verify($password, $row['customer_password'])){

					//create session variables

					session_start();
					$_SESSION['c_id'] = $row['customer_id'];
					$_SESSION['cfname']= $row['customer_firstname'];
					$_SESSION['clname'] = $row['customer_lastname'];
					$_SESSION['cusername'] = $row['customer_username'];
					$_SESSION['cemail'] = $row['customer_email'];


					return true;

				}else{
					return false;

					}

				}else{
					return false;
			}


		}
		#end customer login



		#begin Tailor login

		public function tailorLogin($email,$password){
			// prepare statment
			$statement = $this->conn->prepare("SELECT * FROM tailors WHERE tailor_email = ?");

			//bind the parameter $email in the function above to the email_address form the database
			$statement->bind_param("s",$email);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			if($result->num_rows == 1){
				$row = $result->fetch_assoc();


				//check if password match
				if(password_verify($password, $row['tailor_password'])){

					//create session variables

					session_start();
					$_SESSION['t_id'] = $row['tailor_id'];
					$_SESSION['tfname']= $row['tailor_firstname'];
					$_SESSION['tlname'] = $row['tailor_lastname'];
					$_SESSION['tusername'] = $row['tailor_username'];
					$_SESSION['temail'] = $row['tailor_email'];

                  
                

					return true;

				}else{
					return false;

					}

				}else{
					return false;
			}

			
		}
		#end Tailor login


		#Start Admin Login

		public function adminLogin($email,$password){
			// prepare statment
			$statement = $this->conn->prepare("SELECT * FROM admin WHERE admin_email = ?");

			//bind the parameter $email in the function above to the email_address form the database
			$statement->bind_param("s",$email);

			//execute
			$statement->execute();

			//get result
			$result = $statement->get_result();

			if($result->num_rows == 1){
				$row = $result->fetch_assoc();


				//check if password match
				if(password_verify($password, $row['admin_password'])){

					//create session variables

					session_start();
					$_SESSION['adminid'] = $row['admin_id'];
					$_SESSION['adminemail']= $row['admin_email'];
					$_SESSION['adminrole'] = $row['admin_role'];


					return true;

				}else{
					return false;

					}

				}else{
					return false;
			}

			
		}


		# End Admin Login


		# Start Get Tailors

			public function listTailors(){
			//prepare statment
			$statement = $this->conn->prepare("SELECT * FROM tailors");

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

		# End Get tailors


		#Start list customers


			public function listCustomers(){
			//prepare statment
			$statement = $this->conn->prepare("SELECT * FROM customer");

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


		#End List Customers


		#Start Count Tailors


		public function getTotalTailors(){

        $statement = $this->conn->prepare("SELECT COUNT(*) as total FROM tailors");

        
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

		#End Count Tailors


		#Start Count Customers

		public function getTotalCustomers(){

        $statement = $this->conn->prepare("SELECT COUNT(*) as total FROM customer");

        
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

		#End Count Tailors


		#Begin Delete Tailors

		public function deleteTailor($id){
			// prepare the statment
			$statement = $this->conn->prepare("DELETE FROM tailors WHERE tailor_id=?");

			// bind parameters
			$statement->bind_param("i",$id);

			//execute

			$statement->execute();

			// check if record was deleted
			if($statement->affected_rows == 1){
				//redirect to listclubs
				$msg ="category was successfully deleted!";
				header("Location:dashboard.php?m=$msg");
				exit;
			}else{
				//redirect to listclubs
				$msg = "Oops! Could not delete record.";
				header("Location:dashboard.php?err=$msg");
				exit;
			}
		}

		#End Delete Tailors


		#Begin Delete Tailors

		public function deleteCustomer($id){
			// prepare the statment
			$statement = $this->conn->prepare("DELETE FROM customer WHERE customer_id=?");

			// bind parameters
			$statement->bind_param("i",$id);

			//execute

			$statement->execute();

			// check if record was deleted
			if($statement->affected_rows == 1){
				//redirect to listclubs
				$msg ="category was successfully deleted!";
				header("Location:dashboard.php?m=$msg");
				exit;
			}else{
				//redirect to listclubs
				$msg = "Oops! Could not delete record.";
				header("Location:dashboard.php?err=$msg");
				exit;
			}
		}

		#End Delete Tailors

	}



?>




