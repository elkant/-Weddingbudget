<?php 
session_start();


//this page prepares the dynamic content of the table contents per service providers.

$returneddata=urldecode($_POST["myvalues"]);
echo $returneddata;
$maintablerowid=$_POST["rowid"];
$totalbudget=$_POST["totalbudget"];
$itembudget=$_POST["itembudget"];
$pdid=$_POST["providertablesid"];
$othervendorscount=urldecode($_POST["othervendors"]);


 $json_output=json_decode($returneddata, true);

 $viewdetailsfunction="showproviderdetails('providerdetails','providertabs.php','".$pdid."')";


 echo '<thead><tr><th>IMAGE</th><th>PROVIDER</th><th>LOCATION</th><th>UNIT PRICE(KSHS)</th><th>VIEW DETAILS</th><th>CHOOSE</th></tr></thead>';
   // echo '<tfoot><tr><th>IMAGE</th><th>CATEGORY</th><th>PROVIDER NAME</th><th>LOCATION</th><th>UNIT PRICE(KSHS)</th><th>SELECT</th></tr></tfoot>';
   
    echo'<tbody>';

for ($a=0;$a<count($json_output["datavalues"]);$a++)
{
  $newrow="<td><div class=cart-img><img   src=".$json_output["datavalues"][$a]["image"]." alt=The wedding budget></div></td><td>".$json_output["datavalues"][$a]["item"]."</td><td>".$json_output["datavalues"][$a]["provider"]."</td><td>".$json_output["datavalues"][$a]["location"]."</td><td><b>".$json_output["datavalues"][$a]["price"]."</b></td><td><div class=cart-action>  ".$othervendorscount." </div></td>";
	
	$radiochecked='';
	if($a==0){ $radiochecked='checked="checked"';}
	
//echo '<tr><td><div  class="cart-img"> <img src="'.$json_output["datavalues"][$a]["image"].'" /></div></td><td>'.$json_output["datavalues"][$a]["item"].'</td><td>'.$json_output["datavalues"][$a]["provider"].'</td><td>'.$json_output["datavalues"][$a]["location"].'</td><td>'.$json_output["datavalues"][$a]["price"].'</td><td><input onclick="changebudget(\''.$maintablerowid.'\',\'newrowvalues\',\''.$itembudget.'\',\''.$json_output["datavalues"][$a]["price"].'\');" type="checkbox" id="box'.$a.'"></td></tr>';
echo '<tr style="width:100%;"><td><div  class="cart-img"> <img src="'.$json_output["datavalues"][$a]["image"].'" /></div></td><td>'.$json_output["datavalues"][$a]["provider"].'</td><td>'.$json_output["datavalues"][$a]["location"].'</td><td>'.$json_output["datavalues"][$a]["price"].'</td> <td><a  class="btn btn-default" onclick="hidebudgetmodal();'. $viewdetailsfunction.'"   data-target="#providermodal" >  <i  class="fa fa-play"></i> View Details</a></td> <td><input onchange="changebudget(\''.$maintablerowid.'\',\''.urldecode($newrow).'\',\''.$itembudget.'\',\''.$json_output["datavalues"][$a]["price"].'\',\'box'.$a.'_'.$json_output["datavalues"][$a]["item"].'_'.$json_output["datavalues"][$a]["price"].'\',\''.$json_output["datavalues"][$a]["item"].'\');" type="radio" name='.$json_output["datavalues"][$a]["item"].' id="box'.$a.'"  '.$radiochecked.'></td></tr>';
	
}

//myvalues

   
	

    echo'<tbody>';



?>