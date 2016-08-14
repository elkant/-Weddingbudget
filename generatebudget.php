<?php 
include 'db.php';

$location=$_GET["loc"];
$amount=$_GET["amt"];

//our query will search for data from wishlist table , which collects the most viewed ('purchased' ) items per service 

//data will be entered on the wishlist based on the users interaction with the system

//this can be a money making point where we may have providers pay to have their service recommended to users..

//we can add advertisement/feature end date to use it to control when a users paid featuring expires ; )

//Note; The wishlist table may not be of a good structure coz of repetition but will be of use in quick capturing and loading of data..

//===================Questions needing discussion on the budget section================================== 

//??if there are no providers in the location one has entered, what happens?, do we get providers from a main town like nairobi?

//??are we working towards categorizing the added items by providers to (cheap, avg, expensive) based on location and displaying to a user via the budget packages

//??or we are working to determine what a users amount can purchase, if so, we need to have our own table of basic items in a wedding and respective priority  , 
//
//we need to have a table of basic items/products for a wedding and the respective  price ( cheap, avg, expensive to be determined by a dropdown that a user select) and priority based on the price data entered by various vendors.

//we may give users ability to remove the items they may not need in their list , this will mean the system picks another item next on priority  

//This may not have links to the providers price since its an average. 

//Note: we need to do a research and determine the priority of wedding items 


//limit of items in one category is 200
	$categorylimit=" limit 200";

//prepare a where string that will take care of location and budget status in the query


$jsonval='{"alldata":[';


$budgetitems="<ul style='text-align:left;'>";

$wheresubquery="1=1 and ";


if($location!='' && !empty($location)){
	
$wheresubquery=" ( location='".$location."' ) and ";	
	
}


//this will help in easy navigation of
//we need a json file that contains various prices per each valid service thatfallas within the budget 

//e.g. "Catering":[{"price":"12000","serviceid":"45625423","providerid":"132","location":'1'},{"price":"12200","serviceid":"576254298","providerid":"122","location":'1'} ]

/**


// This appends a new element to $d, in this case the value is another array


*/

$outerrowcount=-1;

$getpriorityitems="select priority, type as itemname, services.id as itemid from budgetpriority join services on budgetpriority.serviceid=services.id  ";


$executequery=mysql_query($getpriorityitems) or die(mysql_error());
if($executequery)
{
	while($row=mysql_fetch_array($executequery))
	{
		$outerrowcount++;
	 $jsonval=$jsonval.'[';
		
	// start searching the best vendors for each of the items fetched in the priority table.

	//get the prices of the services/items from the priority table. 
	//the wishlist table should have all entered data by default as its entered by the providers
	
	//we can give priority to featured items in future
	//currently, we will only watch the first item, but we should fetch a list of items, then display the first per category, a user can then change the list
	
	$wishlistquery="select provider_detail.img as img, name as providername, provider_detail.pdid as id, provider.providerId as providerid, hits ,location.value as location ,provider_detail.cost as avgprice , provider_detail.type as itemid from provider_detail join provider on provider.providerId = provider_detail.providerid join location on location.id=provider_detail.location  where $wheresubquery  type='".$row["itemid"]."' order by hits desc $categorylimit  ";
	
	//echo $wishlistquery ."<br/>";
	$rowcount=0;
	//save the optimal price based on hits to the views list.
	//
	$deductamount=0;
	$innerqry=mysql_query($wishlistquery) or die(mysql_error());
	if($innerqry){
		//do a while loop
		$extrarow=0;//a variable to help add one extra row beyond the budget amount
		
		//$subarray = array();  
		
		while($innerrow=mysql_fetch_array($innerqry)){
			
			
		// if the  amount balance can afford the next item , add it to the found budget json list.
		//have a json data file 
  if($innerrow["avgprice"]<=$amount){
	  //set the first select result per item as the amount
	  if($deductamount==0){
	$deductamount=$innerrow["avgprice"];
//echo $amount." - ".$deductamount ."<br/>";
  }
	//pick the price of the first item  as the one reccomended budget. 
	//use hits/views to order items
	
	$jsonval=$jsonval.'{"image":"'.$innerrow["img"].'","item":"'.$row["itemname"].'","price":"'.$innerrow["avgprice"].'","serviceid":"'.$innerrow["itemid"].'","provider":"'.$innerrow["providername"].'","location":"'.$innerrow["location"].'","providerstableid":"'.$innerrow["id"].'"}';

//e.g. "Catering":[{"price":"12000","serviceid":"45625423","providerid":"132","location":'1'},{"price":"12200","serviceid":"576254298","providerid":"122","location":'1'} ]

//e.g. "Cakes":[{"price":"12000","serviceid":"45625423","providerid":"132","location":'1'},{"price":"12200","serviceid":"576254298","providerid":"122","location":'1'} ]
	
	
  // add that item in a json list.. this will leave room for editing
    
	$rowcount++;	  
  } else {
	  $extrarow++;
	  if($extrarow==1){
		  
		  //append the last bonus row beyond our budget .. currently not implemented
		  
	  }
	  
  }
		
			
		
			
		}
		
		$amount=$amount-$deductamount;
		
	}
	
	 $jsonval=$jsonval.']';

		}
  }
  
$jsonval=$jsonval.']}';
  

	$newjsonval=str_replace("][","],[",$jsonval);
    $newjsonval1=str_replace("}{","},{",$newjsonval);
    $newjsonval2=str_replace("[],","",$newjsonval1);//if blank row comes at row one or middle
    $newjsonval3=str_replace(",[]","",$newjsonval2);//if blank row comes at end of row
    $newjsonval4=str_replace('[]','[{"image":"img/error-avatar.png"}]',$newjsonval3);//if no data qualifies, then dont display data
	
  $jsondata = json_encode($newjsonval4);
  echo   $jsondata;
  
//close connection
mysql_close();



?>


