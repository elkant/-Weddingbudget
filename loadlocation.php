<?php
 session_start(); 
//a page to always output location variables and save in a session too.

include 'db.php';

 $towns=  '<option value="">select location</option>';

$getlocation='select id, value as town from location';


$rs=mysql_query($getlocation);
if(!$rs)
echo "no records found";
else
{
	while($row=mysql_fetch_array($rs))
	{
		
		
		$towns=$towns.'<option value="'.$row["id"].'">'.$row["town"].'</option>';
	
		}
  }

//close connection
mysql_close($conn);
//save
$_SESSION["towns"]=$towns;

//for ajax purpose, output the location

echo $towns;

?>