<?php

/* 
This is a page to count for any views of a product
 */

$itemid=$_POST["itemid"];
$date="";

include 'db.php';
//keep on cumulating views per day
//check if there is existing view counts for that itemid

$viewsexist="select views as hits from itemviews where date='".$date."' and itemid='".$itemid."' ";

$qry = mysqli_query($conn,$viewsexist) or die(mysqli_error()); //mysqli_query($conn, $getpriorityitems) or die(mysqli_error());
if($qry){
    
    
    
    
}