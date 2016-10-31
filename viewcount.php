<?php

/* 
This is a page to count for any views of a product
 */

$itemid=$_GET["itemid"];
//here we are using server date.

//
$date=date("Y-m-d");

include 'db.php';

$viewcount=0;
//keep on cumulating views per day
//check if there is existing view counts for that itemid

$viewsexist="select views as hits from itemviews where date='".$date."' and itemid='".$itemid."' ";


$qry = mysqli_query($conn,$viewsexist) or die(mysqli_error()); //mysqli_query($conn, $getpriorityitems) or die(mysqli_error());
if($qry){
    while ($row = mysqli_fetch_array($qry)) 
    {
        
    $viewcount=$row["hits"]+1;    
     
   $updateviews=" update itemviews set views='".$viewcount."' where date='".$date."' and itemid='".$itemid."' ";
   
   if(mysqli_query($conn, $updateviews)){
       
    echo " views updated";   
   }
   else {
    echo "views not updated";   
       
   }
    
    }//end of while loop   
    
    
    
}
if($viewcount==0) {
   $viewcount=$viewcount+1;
    //insert
     $insertviews=" insert into itemviews (itemid,views,date) values ('".$itemid."','".$viewcount."','".$date."')";
 
   if(mysqli_query($conn, $insertviews)){
       
    echo " views inserted";   
   }
   else {
    echo "views not updated";   
       
   }
    
    
}



mysqli_close($conn);

