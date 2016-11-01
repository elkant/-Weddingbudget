<?php 
session_start();


//this page prepares the dynamic content of the table contents per service providers.

$serviceid=$_POST["pdid"];
//query to load data from the table



$query=" select name , provider_detail.cost as cost,capacity,services.type as itemname, provider.phoneno, provider.websiteurl, provider.email , location.value as town,  provider_detail.area,  provider_detail.img,  provider_detail.timestamp, description, IFNULL(views,0) as hits ,provider_detail.id as mainid from provider_detail   join ( provider join location on provider.county=location.id) on provider_detail.id=provider.id join services on services.id=provider_detail.providerid left join itemviews on itemviews.itemid = provider_detail.id where provider_detail.pdid='".$serviceid."'";


include 'db.php';


$executequery=mysqli_query($conn,$query) or die(mysql_error());
if($executequery)
{
	while($row=mysqli_fetch_array($executequery))
	{
            echo "<input type='hidden' id='idyangu' value='".$row["mainid"]."'>";
		//details for [provider name] as a [product] supplier
	echo "<div class='panel panel-danger'>";
      echo '<div class="panel-heading">Details for <i> <b>'.$row["name"].'</b> </i> as a <i> <b>'.$row["itemname"] .'</b> </i> supplier </div>';
      echo "<div class='panel-body'><table class='table table-responsive'>";
	  
	 echo '<tr><td> <div class="row">   <div class="col-sm-6"> <b>Category </b></div> </td><td ><div class="col-sm-6"> '.$row["itemname"].' </div>   </div> </td></tr>';
	 echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Provider Name</b> </div> </td><td> <div class="col-sm-6">'. $row["name"] .'</div>   </div> </td></tr> ';
	 echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Price </b></div> </td><td> <div class="col-sm-6">'. $row["cost"] .'</div>   </div> </td></tr> ';
	 echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Views </b></div>  </td><td> <div class="col-sm-6">'. $row["hits"] .'</div>   </div> </td></tr>';
	 echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Date added </b></div> </td><td> <div class="col-sm-6"> '.substr($row["timestamp"],0,10).' </div>   </div> </td></tr> ';
     echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Town </b></div> </td><td> <div class="col-sm-6">'. $row["town"] .'</div>   </div> </td></tr> ';
     echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Area </b></div> </td><td> <div class="col-sm-6">'. $row["area"] .'</div>   </div> </td></tr> ';
     echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Email </b> </div> </td><td> <div class="col-sm-6">'. $row["email"] .'</div>   </div> </td></tr> ';
     echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Phone Number </b> </div> </td><td> <div class="col-sm-6"> '.$row["phoneno"] .'</div>   </div> </td></tr> ';
     echo '<tr><td>  <div class="row">   <div class="col-sm-6"> <b>Description </b> </div> </td><td> <div class="col-sm-6">'. $row["description"] .'</div>   </div> </td></tr>';
     echo '<tr><td colspan="2">  <div class="row">   <div class="col-sm-12"> <img src="uploads/'.$row["img"].'" class="image img-responsive"  alt="image"/></div>   </div> </td></tr>';

	  
	  echo "</table></div>";
  
	echo " </div> ";	
		
		
	}
	
}
 
 

mysqli_close($conn);

?>
<script>
    
    var itemid=$("#idyangu").val();
    console.log(itemid);
$.ajax({
    
			url:'viewcount.php',
			data:{itemid:itemid
			     },
			dataType:'html',
			type:'get',
			success:function(data){
				 	
				
			}			
		}); 
</script>