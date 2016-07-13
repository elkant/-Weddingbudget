<?php
$servername="localhost";
$username="root";
$password="70450289";
$dbname="weddingbudget";

$conn = mysqli_connect($servername, $username, $password , $dbname);
// check connection

if(!$conn){
die("Connection failed" . mysqli_connect_error());
}
$sql="INSERT INTO providers(id, providerId, name, phoneno, email, lineitems, price, locationid, capacity, comment, imageurl, websiteurl, status) 
VALUES ('1','1','Maureen','0712345623','mmaina@gmail.com','1','1','10','1','100','Comment','imageurl','website url')";



if(mysqli_query($conn,$sql)){
echo "New record created successfully";

}
else{
echo "Error:" . $sql ."<br>" .mysql_error($conn);
}

mysqlqi_close($conn)



?>