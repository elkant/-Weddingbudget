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
			
			
				$credential = json_decode(file_get_contents("php://input"),true);
				  $username = $credential['username'];
			   $password =$credential['pwd'];
			    $pwd=  md5($password);
				//echo $pwd;
			if(!empty($username) and !empty($password)){

					//$query="SELECT accountid, name, email FROM account WHERE email = '$email' AND password = '".md5($password)."' LIMIT 1";
$query="SELECT id, name, username,type FROM account WHERE username = '$username'  AND password = '$pwd' LIMIT 1";

					
					$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

					
					if($r->num_rows > 0) {
					
							$result = $r->fetch_assoc();
							//$row  = mysql_fetch_array($r);
						
							$_SESSION['id']= $result['id'];
							$_SESSION['name']= $result['name'];
							$_SESSION['username']=$result['username'];							 
							$_SESSION['type']= $result['type'];	
							
								$idvalue=$result['id'];	
								
							//header("location: budget.html");
							if(isset($_SESSION["username"])) {
							
							//	header("Location:budget.php");
								}
								
				$selectquery="SELECT * FROM provider WHERE accountid = '$idvalue' LIMIT 1";
                $check = $this->mysqli->query($selectquery) or die($this->mysqli->error.__LINE__);
                 if($check->num_rows > 0) {
					
						$_SESSION['content']= "edit"; 
						header("Location:#/providers");
				 }else{
					  echo "";
					 	$_SESSION['content']= "new"; 
						header("Location:#/edit");
				 }
			
														
						// If success everythig is good send header as "OK" and user details
						    $success = array('status' => "Success", "msg" => "Login successfull", "data" => $result, "redirect" => $_SESSION['content']);
							$this->response($this->json($success), 200);
							
							//$success = array('status' => "Success", "msg" => "Registration Successfully.", "data" => $datas);
							//$this->response($this->json($success),200);
							
					}
							$this->response('No record match ', 204);	// If no records "No Content" status
				
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
		
		
		
		
		
		private function fetchitems1(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			 $category = $this->_request['category'];		
			 $cost = $this->_request['cost'];
			 $query="SELECT * from provider_detail where providerid='$category' OR cost='$cost'";

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
						//echo 'query----->'. $query2;					
						$r2 = $this->mysqli->query($query2) or die($this->mysqli->error.__LINE__);

						if($r2->num_rows > 0){
						while($rows = $r2->fetch_assoc()){
							echo 'row--->'.$rows;
						$result['provider']= $rows;
								}					
						}				

				}
			
			$this->response($this->json($result), 200); // send user details
			}
			$this->response('',204);	// If no records "No Content" status
		}
		
		
			
		private function fetchitems(){	
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			
			 $category = $this->_request['category'];		
			$cost="";
			
			 if($cost=='undefined'){
				 $cost="";
			 }else{
				  $cost = $this->_request['cost'];
				 
			 }
			// $query="SELECT * from provider_detail.provider where providerid='$category' OR cost='$cost' where ";
			// $getpriorityitems="select priority, type as itemname, services.id as itemid from budgetpriority join
			 //services on budgetpriority.serviceid=services.id  ";
   
	
	           $query="SELECT * from provider JOIN provider_detail ON  provider.id=provider_detail.id where provider_detail.providerid='$category' OR provider_detail.cost='$cost'";

			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);

			if($r->num_rows > 0){
				$result = array();
				
               while($row = $r->fetch_assoc()){
					$result['provider'][]= $row;
					
								

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
			    $query="SELECT *  FROM $tablename";
				$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
				$result = array();
				while($row = $r->fetch_assoc()){
						
						$result[$tablename][] = $row;
						
								}	
								$this->response($this->json($result), 200);	
							$this->response('',204);	// If no records "No Content" status
						}
		
		
		
		
							protected function basicinsert(){
										
										$datas = json_decode(file_get_contents("php://input"),true);
										
										
												$id= uniqid();
												
											
										    	foreach($datas as $column => $value){
															foreach($value as $key => $value){
														
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
															
															
															
											protected function basicinsert1(){
										
										$datas = json_decode(file_get_contents("php://input"),true);
										
										
												$id= uniqid();
												
											
										    	foreach($datas as $column => $value){
															foreach($value as $key => $value){
														
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
		
			                protected function register() {
									$id= uniqid();
									$username;
										$datas = json_decode(file_get_contents("php://input"),true);
										  foreach($datas as $column => $value){
														foreach($value as $key => $value){
															
														
															
															if($key=='password'){
																$value = md5($value);
															}
															if($key=='id'){
															
																$value = $id;
															}
															if($key=='username'){
																$username = $value;
															}
																$cols[]=$key;
																$vals[] = $value;
																
																
													}			
													$colnames =implode(",",$cols);
													$colvals="'".implode("','", $vals)."'";
																					
												//	echo $colnames.'======'.$colvals;
                                         $checkquery="SELECT  username FROM account WHERE username = '$username'";
											$r = $this->mysqli->query($checkquery) or die($this->mysqli->error.__LINE__);

													
													if($r->num_rows > 0) {
														
														$success = array('status' => "Failed", "msg" => "Username already taken", "data" => $datas);
																$this->response($this->json($success),200);
														
													}else{
												
													$query= "INSERT INTO $column ($colnames) VALUES ($colvals)";

															if(!empty($datas)){
																$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
																$success = array('status' => "Success", "msg" => "Registration Successfully. Kindly Login", "data" => $datas);
																$this->response($this->json($success),200);
															}else
																$this->response('',204);	// "No Content" status
										            }}
											}	


											// insert with array 
												protected function insert(){
																$id= uniqid();
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
																  /*  if(mysqli_query($conn,$sql)){
																  echo 'New record created successfully for id   '. $id;
																   } */
																   
														$r = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
																							}
															}
															$sql1= "INSERT INTO $column ($colnames) VALUES ($colvals)";
															echo 'second insert '.$sql1;
															/*  if(mysqli_query($conn,$sql1)){
																  echo 'New record created successfully for id   '. $id;
															       } */
														    $r = $this->mysqli->query($sql1) or die($this->mysqli->error.__LINE__);
														           
															
																} 
															
														
																	}


												protected function update(){
												$arr = json_decode(file_get_contents("php://input"),true);
															foreach($arr as $key => $arrays){
															$column =$key;
														     foreach($arrays as $array){
																	if (!is_array($array)) {
																	foreach((array)$arrays as $keys => $values){
																	   $cols[]=$keys."='".$values."'";
																	   $vals[] = $values;
																 // if($key=='id'){
																		   $id=$arrays['id'];
																		   $pid=$arrays['pid'];
																		//  echo 'KEY   '.$array['id']; 
																		   
																	  // }
																	  
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
															 /* if(mysqli_query($conn,$sql)){
																
																	} */
																	
													           $r = $this->mysqli->query($sql) or die($this->mysqli->error.__LINE__);
															 }
															 else{
													
															 $sqlinsert= "INSERT INTO $column ($colnames2) VALUES ($colvals1)";	
																/*  if(mysqli_query($conn,$sqlinsert)){
																
																   } */
															$r = $this->mysqli->query($sqlinsert) or die($this->mysqli->error.__LINE__);
																															   
															 }
												
												             	}
																	
															}
																
															$sql1= "UPDATE $column SET $colnames where id = '".$id."' and pid = '".$pid."'";
														     echo 'PROVIDER update>>>>>>'.$sql1;
															//if(mysqli_query($conn,$sql1)){
															      //$success = array('status' => "Success", "msg" => "Created Successfully.", "data" => $sql1);
				                                                  //$this->response($this->json($success),200);
																	//	}
															     $r = $this->mysqli->query($sql1) or die($this->mysqli->error.__LINE__);
														           
															
																} 
															
														
																	}
									private function delete(){
												if($this->get_request_method() != "DELETE"){
													$this->response('',406);
												}
												$id = $this->_request['id'];
												$pdid = $this->_request['pdid'];
												$tablename = $this->_request['tablename'];
												echo 'ID    ------>>> '+$id;
												if($id > 0){				
													$query="DELETE FROM $tablename WHERE id = '$id' and pdid=$pdid";
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