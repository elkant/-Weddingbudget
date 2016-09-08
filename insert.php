<?php
$servername="localhost";
$username="root";
$password="70450289";
$dbname="weddingbudget";

// create connection
$conn = new mysqli($servername,$username,$password,$dbname);

//check connection

if($conn -> connect_error){

die("Connection Failed:" . $conn->connect_error);
}
else{ echo "Connection successfull";}



$jsondatas = '[{"id":"108124505876479","name":"Wakeboarding"},{"id":"112003352149145","name":"Bouldering"},{"id":"110008522357035","name":"Handball"}]';

$datas = json_decode($jsondatas, true);


foreach($datas as $column){
foreach($column as $key => $value){
$cols[]=$key;
$vals[] = $value;

}
$colnames =implode(",",$cols);
$colvals="'".implode("','", $vals)."'";




echo $colnames;
echo '<br>';
echo $colvals;




$sql= "INSERT INTO tryinsert ($colnames) VALUES ($colvals)";
echo $sql;
 


//$result = mysql_query($sql) or die(mysql_error());
	
//echo $result;


//$sql1 = mysql_query($sql);
   // $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
  //  if (!$conn) {
      //  die("Connection failed: " . mysqli_connect_error());
   // }

    
//$mysql= mysqli_query($mysqli,"INSERT INTO tryinsert ($colnames) VALUES ($colsvals)")
unset($cols,$vals);

}

// $JSON_data=[{id:1, type:'Catering'},{id:2,type:'Wedding Cake'}];

		// $query = mysqli_prepare("INSERT INTO `providers` (`col1`,`col2`,`col3`)
    // VALUES(?,?,?)");

	
	// $result = json_decode($JSON_data);
	// echo "Error:  " . ;
   
	
	
// $jsondata='{"data": [{"id": "MY_ID/insights/page_views_login_unique/day","name": "page_views_login_unique", "period": "day", "values": [{"value": 1,"end_time": "2012-05-01T07:00:00+0000"},{"value": 6,"end_time": "2012-05-02T07:00:00+0000"},{"value": 5,"end_time": "2012-05-03T07:00:00+0000"}]';
	
	// $user = json_decode($jsondata);
// foreach($user->data as $mydata)

    // {
         // echo $mydata->name . "\n";
         // foreach($mydata->values as $values)
         // {
              // echo $values->value . "\n";
         // }
    // }  	
	
$json = '[{"id":"108124505876479","name":"Wakeboarding"},{"id":"112003352149145","name":"Bouldering"},{"id":"110008522357035","name":"Handball"}]';
$data = json_decode($json, true);
$sports = array();
$keys=[];
$columns=[];

foreach($data as $row){
foreach($row as $key => $val){
//echo $key . ':' . $val;
$keys .= $key .',';
$columns .= '"' . $val .'","';
//echo '<br>';
//echo $key .',';
$value .= ','.$val;
//echo $value;


	
}

//echo $keys;
//echo $columns ;
foreach (array($keys) as  $a) {
$query= 'INSERT INTO tryinsert ("'.array($keys[$a]).'") VALUES ("'.$columns.'")';
echo '<br>';
echo $query;
}

}

// foreach($keys as  $a=>$b){
// $query= 'INSERT INTO tryinsert ("'.$keys[$c].'") VALUES ("'.$columns.'")';
// echo $query;}


// foreach ($data as as $i=>$k) {
    // $sports[] = $item['name'];
	// $keys[] = $item['id'];

// }	

foreach (array_keys($data[0]) as $i=>$k) {
echo $k;

$output = implode('","', $sports);
$columns = implode('","', $keys);

	$values= $sports[$k];
$cols = $keys[$k];
	
//echo $output .  $columns;

	//$query= 'INSERT INTO tryinsert ("'.$cols.'") VALUES ('.$values.')';

	 //echo $query;
	 
	}
	
	
	// $data = (array)$data;
		// $keys = implode('","',str_split(str_repeat('!', count($data))));
		// $values = implode(',',str_split(str_repeat('?', count($data))));
		// $params = array_merge(array_keys($data),array_values($data));
		// array_unshift($params, $data[0]);
		 // $result = ('INSERT INTO "!" ("'.$keys.'") VALUES ('.$values.')');
		 // echo $result;
//echo $params;
	
	
	// if($conn -> query($query) === TRUE){
			// echo "New Record created successfully";
			// }
			// else{
			// echo "Error:  " . $sql . "<br>" . $conn->error;}
//$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
//$success = array('status' => "Success", "msg" => "Created Successfully.", "data" => $customer);
//$this->response($this->json($success),200);
			
	
	//}
	
	
// mysql_query("INSERT INTO suspiciousactivity (ID,Notes)
// VALUES ('".$arr[0]['a']."','".$arr[0]['b']."')")or die(mysql_error());
	
	
	
			// foreach($JSON_data as $key => $value) {
			// $query->bind_param('sss',$value["prop1"],$value["prop2"],$value["prop3"];
			// $query->execute();
				// }




// $sql="INSERT INTO providers(id, providerId, name, phoneno, email, lineitems, price, locationid, capacity, comment, imageurl, websiteurl, status) 
// VALUES ('1','1','Maureen','0712345623','mmaina@gmail.com','1','1','10','1','100','Comment','imageurl','website url')";

// if($conn -> query($sql) === TRUE){
// echo "New Record created successfully";
// }
// else{
// echo "Error:  " . $sql . "<br>" . $conn->error;}

























$jsondata ='{
"customer_id": "1",
"products":[ {
"product_id": "1",
"product_qty": "2"
}, {
"product_id": "2",
"product_qty": "4"
}, {
"product_id": "3",
"product_qty": "12"
}, {
"product_id": "4",
"product_qty": "22"
}],
"order_totalamount": "100"
}';



// $arr = json_decode($jsondata,true);
 //  $arrays = (array)$arrays;
// $sql = 'INSERT INTO stations (`';

// $sql.=  implode('`,`', array_keys( $arr[0] ) );

// $sql.= '`) values (\'';

// $sql.=  implode('\',\'',  $arr[0]  );

// $sql.= '\')';


//convert json object to php associative array
$data = json_decode($jsondata, true);



//get the employee details
$cus_id = $data['customer_id'];
$order_totalamount = $data['order_totalamount'];
$order_totalamount = $data['order_totalamount'];

foreach($data['products'] as $key => $val)
{  
    $product_id = $val['product_id'];
	echo "bbbbb". $product_id;
    $product_qty = $val['product_qty'];
	
	

    //insert into mysql table
    $sql = "insert into `order`(cm_id,product_id,product_quantity,order_totalamount,order_id,order_date) values ($cus_id,$product_id,$product_qty,$order_totalamount,$cus_id,CURDATE())";

    echo $sql;
    //$sql1 = mysql_query($sql);
 //   $conn = mysqli_connect($host, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(!mysqli_query($conn,$sql))
    {
        die('Error ::: ' . mysql_error());
    }
}










$conn -> close();













?>