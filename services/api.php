<?php
 	require_once("Rest.inc.php");
	//include('../config/config.php');
	class API extends REST {
	
		public $data = "";
		
		const DB_SERVER = "127.0.0.1";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "weddingbudget";

		private $db = NULL;
		private $mysqli = NULL;
		

				// create connection
				

		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
		
		/*
		 *  Connect to Database
		*/
		private function dbConnect(){
			$this->mysqli = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
		}
		
		
				
		
		/*
		 * Dynmically call the method based on the query string
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404); // If the method not exist with in this class "Page not found".
		}
				
		private function login(){
		session_start();
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			// $email = $this->_request['email'];		
			// $password = $this->_request['pwd'];
			
				$credential = json_decode(file_get_contents("php://input"),true);
				  $email = $credential['email'];
			   $password = $credential['pwd'];
			
			if(!empty($email) and !empty($password)){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					//$query="SELECT accountid, name, email FROM account WHERE email = '$email' AND password = '".md5($password)."' LIMIT 1";
					$query="SELECT id, name, email FROM account WHERE email = '$email' AND password = '$password' LIMIT 1";
					
					$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

					
					if($r->num_rows > 0) {
					
							$result = $r->fetch_assoc();
							//$row  = mysql_fetch_array($r);
						
							$_SESSION['id']= $result['id'];
							$_SESSION['name']= $result['name'];
							$_SESSION['email']=$email;							 
													 
							//header("location: budget.html");
							if(isset($_SESSION["email"])) {
							
								header("Location:budget.html");
								}
			
														
						// If success everythig is good send header as "OK" and user details
							$this->response($this->json($result), 200);
					}
							$this->response('', 204);	// If no records "No Content" status
				}
			}
			$error = array('status' => "Failed", "msg" => "Invalid Email address or Password");
			$this->response($this->json($error), 400);
		}
		
		private function customers(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			session_start();
			if(isset($_SESSION["id"]))
				{
							$id= $_SESSION["id"];
							 
							
				//$id =$_SESSION["id"];
		
			 //$accountid = $this->_request['accountid'];	
			
			$query="SELECT * from provider where accountid='$id'";
			
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				//$result = array();
				$result = array(
					'provider' => array(),
					'provider_detail' => array()
				);
               while($row = $r->fetch_assoc()){
					$result['provider'] = $row;
					$query2="SELECT * FROM provider_detail where id = '".$row['id']."'";
					//echo 'DAMN QUERY    '.$query2;
						$r2 = $this->mysqli->query($query2) or die($this->mysqli->error.__LINE__);

						if($r2->num_rows > 0){
						while($row = $r2->fetch_assoc()){
						$result['provider_detail'][]= $row;
								}					
						}				

				}
			$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
				}
		}
		
		
		
		
		
		private function fetchitems(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			 $category = $this->_request['category'];		
			 $cost = $this->_request['cost'];
			 
			// echo $category;
			// echo $cost;
			
		
			$query="SELECT * from provider_detail where providerid='$category' and cost='$cost'";
			//echo $query;
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				//$result = array();
				$result = array(
					'provider' => array(),
					'provider_detail' => array()
				);
               while($row = $r->fetch_assoc()){
					$result['provider_detail'][] = $row;
					$query2="SELECT * FROM provider where id = '".$row['id']."'";
					//echo 'DAMN QUERY    '.$query2;
						$r2 = $this->mysqli->query($query2) or die($this->mysqli->error.__LINE__);

						if($r2->num_rows > 0){
						while($row = $r2->fetch_assoc()){
						$result['provider']= $row;
								}					
						}				

				}
			
			$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		private function fetch(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$tablename =$this->_request['tablename'];
			$id = $this->_request['id'];
			$pid = $this->_request['pid'];		
				
			if($id > 0){	
				$query="SELECT *  FROM $tablename where id=$id and pid=$pid";
			
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					echo $json($result);
					$this->response($this->json($result), 200); // send user details
				}
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		
		private function selectdata(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$tablename =$this->_request['tablename'];
			
		   //  echo $tablename;
			//if($id > 0){	
				$query="SELECT *  FROM $tablename";
			//echo $query;
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				/* if($r->num_rows > 0) {
					$result = $r->fetch_assoc();	
					//echo $result;
					$this->response($this->json($result), 200); // send user details
				} */
				
				$result = array();
				while($row = $r->fetch_assoc()){
						//$result= $row;
						$result[$tablename][] = $row;
						//echo $result[$tablename];
								
								}	
								$this->response($this->json($result), 200);	
							
			//}
			
			
			
			
			$this->response('',204);	// If no records "No Content" status
		}
		
		
		
		
		
		private function insertCustomer(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$customer = json_decode(file_get_contents("php://input"),true);
			$column_names = array($customer);
			$keys = array_keys($customer);
			$columns = '';
			$values = '';
			foreach($column_names as $desired_key){ // Check the customer received. If blank insert blank into the array.
			   if(!in_array($desired_key, $keys)) {
			   		$$desired_key = '';
				}else{
					$$desired_key = $customer[$desired_key];
				}
				$columns = $columns.$desired_key.',';
				$values = $values."'".$$desired_key."',";
			}
			$query = "INSERT INTO angularcode_customers(".trim($columns,',').") VALUES(".trim($values,',').")";
			if(!empty($customer)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer Created Successfully.", "data" => $customer);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	//"No Content" status
		}
		
		
		
		
		// for fetching vendor details		
		private function fetchdata(){
		session_start();
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			// $email = $this->_request['email'];		
			// $password = $this->_request['pwd'];
			
				//$credential = json_decode(file_get_contents("php://input"),true);
				//$id = $credential['id'];
			  // $accountid = $credential['pwd'];
			
		
				//if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					//$query="SELECT accountid, name, email FROM account WHERE email = '$email' AND password = '".md5($password)."' LIMIT 1";
					$query="SELECT * FROM provider where id='1' LIMIT 1";
					
					$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

					
					if($r->num_rows > 0) {
					
							$result = $r->fetch_assoc();
							//$row  = mysql_fetch_array($r);
						
							//$_SESSION['accountid']= $result['accountid'];
						
							//$_SESSION['email']=$email;							 
													 
							//header("location: budget.html");
							if(isset($_SESSION["email"])) {
							
								header("Location:budget.html");
								}
			
														
						// If success everythig is good send header as "OK" and user details
							$this->response($this->json($result), 200);
					}
							$this->response('', 204);	// If no records "No Content" status
				//}
			
			$error = array('status' => "Failed", "msg" => "Invalid Email address or Password");
			$this->response($this->json($error), 400);
		}
		
		
							protected function basicinsert(){
										
										$datas = json_decode(file_get_contents("php://input"),true);
										
										 //$servername="localhost";
													// $username="root";
													 //$password="";
													 //$dbname="weddingbudget";
													 
													//$conn = new mysqli($servername,$username,$password,$dbname);
														// if($conn -> connect_error){

														// die("Connection Failed:" . $conn->connect_error);
														// }
														// else{ echo "Connection successfull";}
												$id= uniqid();
												//echo 'ID HERER '.$id;
											
										    	foreach($datas as $column => $value){

															//echo 'aaaa '.$column ;
															foreach($value as $key => $value){
															//echo 'key '.$key .'value. '.$value;
															
															$cols[]=$key;
															$vals[] = $value;
															
															// $value['id']=$id;
															 
															      if($key=='id'){
																	$vals[0]=$id;
																	} 
															}
													  $colnames =implode(",",$cols);
													  $colvals="'".implode("','", $vals)."'";	
		                                               $sql= "INSERT INTO $column ($colnames) VALUES ($colvals)";
													   //echo $sql;
														if(!empty($datas)){
															    $r = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
																$success = array('status' => "Success", "msg" => "Registration Successfully.", "data" => $datas);
																$this->response($this->json($success),200);
															}else
																$this->response('',204);	// "No Content" status
														}
											
		
		
		}
		
			protected function insertCustomers() {
										$datas = json_decode(file_get_contents("php://input"),true);
										
										 $servername="localhost";
													 $username="root";
													 $password="";
													 $dbname="weddingbudget";
													 
													$conn = new mysqli($servername,$username,$password,$dbname);
														if($conn -> connect_error){

														die("Connection Failed:" . $conn->connect_error);
														}
														else{ echo "Connection successfull";}
											foreach($datas as $column => $value){
														foreach($value as $key => $value){
																$cols[]=$key;
																$vals[] = $value;
													}			
													$colnames =implode(",",$cols);
													$colvals="'".implode("','", $vals)."'";
													if($colvals=="'Array'"){
															foreach($vals as $items ){
																	foreach($items as $keys => $value){
																			$arraycols[]=$keys;
																			$arrayvals[] = $value;
																	}
													$colnames1=implode(",",$arraycols);
													$colvals1="'".implode("','", $arrayvals)."'";
																}
													echo $colnames1.'======'.$colvals1;
															}
													$query= "INSERT INTO $column ($colnames) VALUES ($colvals)";
													if($colvals=="'Array'"){
																			 $query= "INSERT INTO $column ($colnames1) VALUES ($colvals1)";
															}
								
															if(!empty($datas)){
																$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
																$success = array('status' => "Success", "msg" => "Customer ".$id." Updated Successfully.", "data" => $datas);
																$this->response($this->json($success),200);
															}else
																$this->response('',204);	// "No Content" status
														}
											}	


											// insert with array 
												protected function insert(){
																$id= uniqid();
																
																//echo uniqid;
											    $servername="localhost";
												$username="root";
												$password="";
												$dbname="weddingbudget";
														$sql='';
														$sql1='';
														$colnames1 ='';
														$colvals1='';
												 
												 // create connection
												$conn = new mysqli($servername,$username,$password,$dbname);

												//check connection

												if($conn -> connect_error){
												die("Connection Failed:" . $conn->connect_error);
												}
												else{ echo "Connection successfull at insert";}
												$arr = json_decode(file_get_contents("php://input"),true);
																echo $arr;
															//$arr = json_decode($json2, true); 
															foreach($arr as $key => $arrays){
															$column =$key;
														
															

																foreach($arrays as $array){
																
																
															if (!is_array($array)) {
															 foreach((array)$arrays as $keys => $values){
																	   $cols[]=$keys;
																	   $vals[] = $values;
																
																if($keys=='id'){
																	$vals[0]=$id;
																	}
																 
															$colnames =implode(",",$cols);
															$colvals="'".implode("','", $vals)."'";	
															} 
															//unset($cols, $vals);
															} 
															else{
															  
																	foreach($array as $key => $value){
																	   $cols[]=$key;
																	   $vals[] = $value;
																		
																		if($key=='id'){
																		
																		$vals[0]=$id;
																	
																		}
																	}
															$colnames1 =implode(",",$cols);
															$colvals1="'".implode("','", $vals)."'";	
																	
												
																	}
                                                        unset($cols, $vals);
													     if($colnames1!=''){
															$sql= "INSERT INTO $column ($colnames1) VALUES ($colvals1)";												
												                   echo 'first insert '.$sql;
																   echo "<br />";
																   if(mysqli_query($conn,$sql)){
																  echo 'New record created successfully for id   '. $id;
																   }
																							}
															}
															$sql1= "INSERT INTO $column ($colnames) VALUES ($colvals)";
															echo 'second insert '.$sql1;
															 if(mysqli_query($conn,$sql1)){
																  echo 'New record created successfully for id   '. $id;
															       }
														           
															
																} 
															
														
																	}


												// update 	


	// insert with array 
												protected function update(){
															
																
																//echo uniqid;
											    $servername="localhost";
												$username="root";
												$password="";
												$dbname="weddingbudget";
														$sql='';
														$sql1='';
														$colnames1 ='';
														$colnames2 ='';
														$colvals1='';
												 $id1='';
												 $pid1='';
												 // create connection
												$conn = new mysqli($servername,$username,$password,$dbname);

												//check connection

												if($conn -> connect_error){
												die("Connection Failed:" . $conn->connect_error);
												}
												else{ echo "Connection successfull at update";}
												$arr = json_decode(file_get_contents("php://input"),true);
															foreach($arr as $key => $arrays){
															$column =$key;
														     foreach($arrays as $array){
																	if (!is_array($array)) {
																	foreach((array)$arrays as $keys => $values){
																	   $cols[]=$keys."='".$values."'";
																	   $vals[] = $values;
																  if($key=='id'){
																		   $id=$arrays['id'];
																		   $pid=$arrays['pid'];
																		//  echo 'KEY   '.$array['id']; 
																		   
																	   }
															$colnames =implode(",",$cols);
															$colvals="'".implode("','", $vals)."'";	
															
															} 
															} 
															else{
															  
																	foreach($array as $key => $value){
																	   $cols[]=$key."='".$value."'";
																	   $insertcols[]= $key;
																	   $vals[] = $value;
																	   
																	   if($key=='id'){
																		   $id=$array['id'];
																		   $pid=$array['pdid'];
																		 }
																	   }
															$colnames1 =implode(",",$cols);
															$colnames2= implode(",",$insertcols);
															$colvals1="'".implode("','", $vals)."'";	
																	}
																
                                                        unset($cols, $vals);
														  unset($insertcols, $vals);
													     if($colnames1!=''){
															 if($pid!=''){
															$sql= "UPDATE $column SET $colnames1 where id = '".$id."'  and pdid = '".$pid."'";
															 if(mysqli_query($conn,$sql)){
																 echo 'Provider Detail Updated  successfully for id '. $id;
																	}
															 }
															 else{
													
															 $sqlinsert= "INSERT INTO $column ($colnames2) VALUES ($colvals1)";	
																 if(mysqli_query($conn,$sqlinsert)){
																  echo 'New record created successfully for id'. $sqlinsert;
																   }
																	echo $sqlinsert;																   
															 }
												
												             	}
															}
															$sql1= "UPDATE $column SET $colnames where id = '".$id."' and pid = '".$pid."'";
															//echo 'second insert '.$sql1;
															 if(mysqli_query($conn,$sql1)){
																
															      //$success = array('status' => "Success", "msg" => "Created Successfully.", "data" => $sql1);
				                                                  //$this->response($this->json($success),200);
																		}
														           
															
																} 
															
														
																	}







												
												

// insert with array 
													

											// insert without insertng capacity as an array
		
		
										protected function insert_previous() {
										 
											$datas = json_decode(file_get_contents("php://input"),true);
											
												//$jsondata='{"providers":{"name":"maureen","email":"maureen@gmail.com",
												//"providerId":"1","cost":"120","websiteurl":"www.bestweds.com","comments":"ok"},"capacity":[{"no":"50-100","cost":"10"}],"vehicle":[{"type":"","capacity":""}]}';

											
											 $servername="localhost";
												$username="root";
												$password="";
												$dbname="weddingbudget";

												 
												 // create connection
												$conn = new mysqli($servername,$username,$password,$dbname);

												//check connection

												if($conn -> connect_error){

												die("Connection Failed:" . $conn->connect_error);
												}
												else{ echo "Connection successfull";}
											//$datas = json_decode($jsondata,true);

										foreach($datas as $column => $value){
											foreach($value as $key => $value){
														$cols[]=$key;
														$vals[] = $value;
														}
											$colnames =implode(",",$cols);
											$colvals="'".implode("','", $vals)."'";
																					if($colvals=="'Array'"){
																					foreach($vals as $items ){
																					 foreach($items as $keys => $value){
																					$arraycols[]=$keys;
																					$arrayvals[] = $value;
																					}
																					 $colnames1=implode(",",$arraycols);
																					$colvals1="'".implode("','", $arrayvals)."'";
																					}}

																					 
																					if($colvals=="'Array'"){
																					 $sql= "INSERT INTO $column ($colnames1) VALUES ($colvals1)";
																					 } 
																					 else{
																					 
																					 $sql.= "INSERT INTO $column ($colnames) VALUES ($colvals)";}
																					 echo $sql;
																					if(mysqli_query($conn,$sql)){
																					echo "New record created successfully";

																					}
																					unset($cols, $vals);
																					unset($arraycols, $arrayvals);
																					// else{
																					// echo "Error:" . $sql ."<br>" .mysql_error($conn);
																					// }

																					// mysqlqi_close($conn);


																					}
												
											  }
		
		
		private function updateCustomer(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$customer = json_decode(file_get_contents("php://input"),true);
			$id = (int)$customer['id'];
			$column_names = array('customerName', 'email', 'city', 'address', 'country');
			$keys = array_keys($customer['customer']);
			$columns = '';
			$values = '';
			foreach($column_names as $desired_key){ // Check the customer received. If key does not exist, insert blank into the array.
			   if(!in_array($desired_key, $keys)) {
			   		$$desired_key = '';
				}else{
					$$desired_key = $customer['customer'][$desired_key];
				}
				$columns = $columns.$desired_key."='".$$desired_key."',";
			}
			$query = "UPDATE angularcode_customers SET ".trim($columns,',')." WHERE customerNumber=$id";
			if(!empty($customer)){
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Customer ".$id." Updated Successfully.", "data" => $customer);
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// "No Content" status
		}
		
		private function deleteCustomer(){
			if($this->get_request_method() != "DELETE"){
				$this->response('',406);
			}
			$id = (int)$this->_request['id'];
			if($id > 0){				
				$query="DELETE FROM angularcode_customers WHERE customerNumber = $id";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$success = array('status' => "Success", "msg" => "Successfully deleted one record.");
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// If no records "No Content" status
		}
		
		
		
		
		
		
		
		
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	
	// Initiiate Library
	
	$api = new API;
	$api->processApi();
?>