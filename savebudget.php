<?php 
session_start();

if(isset($_SESSION['userid'])){
    
 $customerid=$_SESSION['userid'];   
}
else {
    
$customerid="unknown";    
    
}


                            //id:uid,
                            //title:title,
                            //date:dateform,
                            //budgetsource:budgetsource

//get session status of access from a certain page 
if($_POST["providerid"]!=null){    
$providerID=$_POST["providerid"]; //get providerid
}

if($_POST["id"]!=null){    
$budgetid=$_POST["id"]; //get providerid
}

if($_POST["title"]!=null){    
$title=$_POST["title"]; //get providerid
}

if($_POST["budgetsource"]!=null){    
$budgetsource=$_POST["budgetsource"]; //get providerid
}

if($_POST["date"]!=null){    
$date=$_POST["date"]; //get providerid
}


$price=$_POST["price"];     //get price per item
$location=$_POST["location"];   //location 
$htmlcode=$_POST["htmlcode"];   //

include 'db.php';

$checkexisting=" select budgetid from budget where htmlcode like '".$htmlcode."' ";


$query=" insert into budget(budgetid,customerid,providerID,price,location,htmlcode,budgetsource,date,title) values('".$budgetid."','".$customerid."','".$providerID."','".$price."','".$location."','".$htmlcode."','".$budgetsource."','".$date."','".$title."') ";





$executeexisting=mysqli_query($conn,$checkexisting) or die(mysql_error());
if($executeexisting)
{
        if(mysqli_num_rows($executeexisting)==0 ){
        //insert existing 
         echo $query;
            
        if(mysqli_query($conn,$query)){
            
            echo " <font color='green'>budget saved successfully </font>";
            
        }
         
            
        }
        else {
            
           echo "<font color='orange'> budget already saved </font>";
            
        }
                
            
             
	



		
	}
	

 
 

mysqli_close($conn);

?>