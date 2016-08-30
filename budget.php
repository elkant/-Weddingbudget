<?php  session_start();  ?>
 <link href="css/style3860.css?v=1" rel="stylesheet">
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="datatables/media/css/jquery.dataTables.css" rel="stylesheet">
 <style>

input[type=radio]:checked ~ .check {
  border: 5px solid #0DFF92;
}

input[type=radio]:checked ~ .check::before{
  background: #0DFF92;
}

</style>
 
 
<!-- Portfolio -->
<section  class="content"> 

<!-- Container -->
<div class="container portfolio-title"> 

<!-- Section Title -->
<div class="section-title well" style='border-color:#FF7FF7;'>
<h2 style='text-align:left;background-color:white;'  >  <span class="timer" data-from="0" data-to="" data-speed="1000"  id='budgetreturned'></span></h2>
<form class="form-inline">


<select  type="text" onchange='callpackage();' class="form-control" id='packages' name='packages'  > 
<option value=''> choose budget package </option>
<option value='1000000'> Gold package (1M) </option>
<option value='500000'> Silver package (500K)</option>
<option value='100000'> Platnum package (100K) </option>

</select>
 <b>OR</b>
<input id='budget_amount' onkeypress='return numbers(event);'  name='budget_amount'  type="number" class="form-control " style=;border-color:;  placeholder="Enter your amount">
<select  type="text" class="form-control" id='budget_location' name='budget_location'  > 
</select>
<button type="submit" id='generatebtn' class="btn btn-sm btn-rounded btn-dark-solid text-uppercase" onclick='budgetgenerator(0);'>
see results
</button> 



<button type="submit" data-toggle='modal' data-target='#savedbudget'  class="btn btn-sm btn-rounded btn-default" onclick='loadbudget()'> <i class='fa fa-view'> </i>
View saved budget
</button> 
<span id='loading'></span> 
<input type='hidden' id='bv' name='bv'>
</form>	   
</div>
<!--/Section Title --> 

</div>
<!-- Container -->


<section class="normal-tabs line-tab">
<ul class="nav nav-tabs">
<li class="active">
<a data-toggle="tab"  href="#tab-autobudget">Budget Results</a>
</li>
<!--
<li class="">
<a data-toggle="tab"  href="#tab-services">Custom Budget</a>
</li>
-->
</ul>

<div class="panel-body" style='width:98%;'>
<div class="tab-content">
<div id="tab-autobudget" class="tab-pane active">
<div class="login register ">
<div class=" btn-rounded">
<form  class=" " action="#" method="post">

<!----a search section--->
<!----a location input field--->

<dl class="accordion">

<div class="table-responsive">
                            <table class="table cart-table table-responsive" id='budgettable' >
							
								
                            </table>
							
                            </div>
							

</dl>

<!--price table-->
 <dl class="accordion">
<div class="row price-table-row">


<!--3 column price table-->

<div class="price-col wow fadeInLeft col-md-4">
<h1 onclick="buttonpackage('1000000');topofpage();" style='color:green;text-align:left;' class='well well-sm p-btn' ><img src='img/twb/goldring.jpg' width='46px' class='img-thumbnail'><b> Gold Package</b> </h1>
<h6><b>1M  Kshs</b></h6>
</div>




<div class="price-col  wow fadeInUp col-md-4">
<h1 onclick="buttonpackage('500000');topofpage();" style='color:orange;text-align:left;' class='well well-sm p-btn'> <img src='img/twb/silverring.jpg' width='46px' class='img-thumbnail'><b> Silver Package</b></h1>
<h6><b>500K  kshs</b></h6>

</div>




<div class="price-col wow fadeInRight col-md-4">
<h1 onclick="buttonpackage('100000');topofpage();" style='color:gray;' class='well well-sm p-btn' ><img src='img/twb/platinumring.jpg' width='46px' class='img-thumbnail'><b> Platinum Package</b></h1>
<h6><b> 100K kshs</b></h6>
</div>

<!--3 column price table-->




</dl>



<!--price table-->
<div id='allmodals'></div>

<!---saved budget modal--->
<div class="modal fade" id="savedbudget" role="dialog">
<div class="modal-dialog " style="width:95%;">
<div class="modal-content">
<div class="modal-header">
<button type="button"  class="close" data-dismiss="modal">
&times;</button>
 <h3 class="modal-title" style="text-align:center;color:#FF7FF7;">Saved Budget list </h3> 
 </div><div class="modal-body"> <div id="savedbudgetdata"><p>    No saved budgets yet    </p></div>
 </div>
 <div class="modal-footer">
 <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
 </div>
 </div>
 </div>

</form>
</div>

</div>
</div>
<!--
<div id="tab-services" class="tab-pane">
<form class=" login" action="#" method="post">

</form>
</div>
-->

</div>
</div>
</section>



</section>





  <!-- Modal -->
 
  
<script></script>

<script type="text/javascript" src="datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/pouchdb-5.3.1.min.js"></script>
<script>

//a n ajax that loads towns
	$.ajax({
		url:'loadlocation.php',
		type:'get',
		dataType:'html',
		success: function(data){
			$('#budget_location').html(data);
			
			//console.log(data);
			
		}
		
	});
	
	
	// called by big buttons
	
		function buttonpackage(amt)
	
	{
	
$("#packages").val(amt);

$("#budget_amount").val(amt);
budgetgenerator(amt);
	
		
	}
	
	
	
	
	//called by dropdown package
	function callpackage ()
	
	{
	
var amt=$("#packages").val();

if (amt===""){
	
	amt=0;
}

$("#budget_amount").val(amt);
budgetgenerator(amt);
	
		
	}
	
	var currentjsondata="";
	
	//an ajax that forwards user inputs to budget generator for algorithimn excecution and returns results
function budgetgenerator(amt){
	
	$("#generatebtn").prop("disabled",true);//disable generate button until  aresponse comes from ajax
	var budgetvalue=0;
	
	if(amt>0){
		
	budgetvalue=amt;	
		
	        }
	else {
		
		budgetvalue=$("#budget_amount").val();
		
	    }
	
	
	var budgetlocation=$("#budget_location").val();
	var budgetindexarray= new Array();
	$("#loading").html("<img src='img/loading.gif'>");
$.ajax({
		url:'generatebudget.php?amt='+budgetvalue+'&loc='+budgetlocation,
		type:'post',
		dataType:'json',
		success: function(data){
		currentjsondata=data;
		budgetdisplay(data);
		
		}//end of budget success
		
	});	

}
	
	function budgetdisplay(data){
		
		
		
		$("#loading").html("");
		$("#generatebtn").prop("disabled",false);
		var totalbudget=0;
		
var newtable="<thead><tr><th>Image</th><th>Category</th><th>Provider Name</th><th>Location</th><th>Unit Price (Kshs) </th><th>Edit Budget</th></tr></thead><tbody>";
                                
          var jdata=JSON.parse(data);
         
			
            console.log(jdata.alldata); 
            console.log(jdata.alldata[0][0].image); 
			if(jdata.alldata[0][0].image==='img/error-avatar.png'){
            newtable+="<tr><td><div  class='cart-img'><img title='Indicator' data-toggle='popover' data-trigger='hover' data-content='No data found' src='"+jdata.alldata[0][0].image+"' alt=''></div></td><td colspan='5'><a href='#' style='color:red;'>Sorry No wedding item available at that cost. kindly input a higher amount of money </a></td></tr>";
            $("#budgetreturned").html("");         
			}
			else {
                            
		//find the length of data
		for(var i=0;i<jdata.alldata.length;i++){
			//check if data is blank
			
				if(jdata.alldata[i]!==''){
					//show a view for one vendor or next as a scroll symbol of a list of vendors
					var multiple_providers_icon='<button  class="btn btn-default" ><i data-toggle=modal data-target=#budgetmodal class="fa fa-play" ></i> Edit Provider</button>';
					var one_provider_icon="<button   class='btn btn-default' ><i data-toggle='modal' data-target='#providermodal' class='fa fa-play'></i> View details</button> ";
					
					var othervendorscount="";
					var initiatemodal="";
					var rowdata0=JSON.stringify(jdata.alldata[i]);
					 //rowdata=rowdata0.replace(/"/g, "'");
				rowdata=encodeURIComponent('{"datavalues":'+rowdata0+'}');
					 

					if(jdata.alldata[i].length >1)
					{
						
					othervendorscount=multiple_providers_icon+"<span  class=badge>"+jdata.alldata[i].length +"</span>";	
					initiatemodal="onclick='showdetails(\"otherproviders\",\"compareproviders.php\",\""+rowdata+"\",\""+jdata.alldata[i][0].price+"\",\""+i+"\",\""+encodeURIComponent(othervendorscount.replace(/"/g, "~"))+"\",\""+jdata.alldata[i][0].providerstableid+"\");' data-toggle='modal' data-target='#budgetmodal'";	
					}
					else 
					{
					
                    //othervendorscount=one_provider_icon+"<span class=badge>"+jdata.alldata[i].length +"</span>";	
                    othervendorscount=one_provider_icon;	
                    initiatemodal="onclick='showdetails(\"providerdetails\",\"providertabs.php\",\"nodata\",\"nodata\",\"nodata\",\"nodata\",\""+jdata.alldata[i][0].providerstableid+"\");' data-toggle='modal' data-target='#providermodal'";	
										
						
					}
					
				//conribute to a 
	newtable+="<tr "+initiatemodal+" id='tablerow"+i+"'  ><td><div class='cart-img'><img title='"+jdata.alldata[i][0].provider+"'  src='"+jdata.alldata[i][0].image+"' alt=''></div></td><td><a href='#'>"+jdata.alldata[i][0].item+"</a></td><td>"+jdata.alldata[i][0].provider+"</td><td><div class='cart-action'>"+jdata.alldata[i][0].location+"</div></td><td><b>"+jdata.alldata[i][0].price+"</b></td><td><div class='cart-action'>  "+othervendorscount+" </div></td></tr>";
            	totalbudget+=parseInt(jdata.alldata[i][0].price);
			                             }
			//console.log(data[i]);
		}
		         }
		 newtable+="</tbody>";
		
	$("#budgettable").html(newtable);
	$("#allmodals").html('<div class="modal fade" id="providermodal" role="dialog"><div class="modal-dialog " style="width:95%;"><div class="modal-content"><div class="modal-header"><button type="button" onclick="showbudgetmodal();" class="close" data-dismiss="modal">&times;</button> <h3 class="modal-title" style="text-align:center;color:#FF7FF7;"> Provider Details </h3> </div><div class="modal-body"> <div id="providerdetails"><p>     provider details here    </p></div></div><div class="modal-footer"><button type="button" onclick="showbudgetmodal();" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>'
	+'<div class="modal fade" id="budgetmodal" role="dialog"><div class="modal-dialog " style="width:95%;"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button> <h3 class="modal-title" style="text-align:center; color:#FF7FF7;" id="tableheader">Edit Provider</h3> </div><div class="modal-body"> <table id="otherproviders" class="table table-responsive display" cellspacing="0" ></table> </div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>');
	
	if(totalbudget>0){
	
	$("#budgetreturned").html("<i class='fa fa-dollar'></i> Budget Results "+totalbudget+"  <button style='margin-right:2px;' type='submit' id='savebudgetbtn' class='btn btn-sm btn-rounded btn-info' onclick='savebudget();'> <i class='fa fa-save'> </i> save budget </button>  "
	+" <div id='budgetsavedalert' style='display:none;' role='alert' class='alert alert-danger'> <button aria-label='Close' data-dismiss='alert' class='close' type='button'><span aria-hidden='true'>×</span></button> <i class='fa fa-lg fa-check-circle-o'></i> <strong>Budget Saved </strong> successfully. </div>  ");
	$("#bv").val(totalbudget);
	$("#budgetreturned").data("to",totalbudget);
	}
//budgetreturned
		
		   $('[data-toggle="popover"]').popover(); 
		
		
		
	}
	
	
	//a function to load other selected providers via data table
	//samefunction should load provider details
	
	function showdetails(tableid,sendurl,jsondata,itembudget,rowid,othervendorscount,providertablesid){
		var mydata="";
		var mybudget="";
		var ttlbudget=$("#bv").val();
		if(jsondata!=="nodata"){
		//compare and edit providers	
			mydata=jsondata;
			mybudget=itembudget;
		// ttlbudget=i;
		
	//add options too on url	
		$.ajax({
			url:sendurl,
			data:{				
				 myvalues:mydata,
                 itembudget:mybudget,
                 totalbudget:ttlbudget,
                 rowid:rowid,
                othervendors:othervendorscount,
              providertablesid:providertablesid				
			},
			dataType:'html',
			type:'post',
			success:function(data){
				
			//here you have received a table with the other available vendors. 	
			
			$("#"+tableid).html(data);	
			$('#otherproviders').DataTable();	
			}
			
		});
		
	}
	//show details of the provider.
	else {
		
		showproviderdetails(tableid,sendurl,providertablesid);
		
		
		
	}
	}
	
	
	function showproviderdetails(tableid,url,pdid){
		
	$.ajax({
			url:url,
			data:{				
				 pdid:pdid			
			},
			dataType:'html',
			type:'post',
			success:function(data){
				
			//here you have received a table with the other available vendors. 	
			
			$("#"+tableid).html(data);	
			//$('#otherproviders').DataTable();	
			}
			
		});	
		
		
	}
	
	//a function to toggle the viewdetails and edit providers modals depending on whether one clicked view details at what modal.

	var ismodalminimized="";

function hidebudgetmodal(){
	
	$('#budgetmodal').modal('hide');
$('#providermodal').modal('show');  
ismodalminimized="yes";	
}

function showbudgetmodal(){
	if(ismodalminimized==="yes"){
	$('#budgetmodal').modal('show');
$('#providermodal').modal('hide'); 
ismodalminimized="";
 
	}	
}	
	
	var radiobuttonarray =  []; 
	var categoryarray =  []; 
	//if a user alters the current vendor
	function changebudget(tablerow,newrowvalues,oldbudget,newbudget,checkboxid,category){
	

	$("#tablerow"+tablerow).html(newrowvalues.replace(/~/g,"'"));

	
	
	//check if checkbox contains a certain checkbox
	

	
	var iscategoryadded=categoryarray.indexOf(category);
	console.log(category+"___ is added as a category#"+iscategoryadded);
	if(iscategoryadded >=0 ){
		//the old budget should now have changed
		//get the old budget price form the radiobuttonid
		
		var replacecontent=radiobuttonarray[iscategoryadded].split("_");
		
		//replacecontent should be of format boxid_item_price
		
		//the third element is the old budget
		
		var olderbudget=replacecontent[2];
		
		delete radiobuttonarray[iscategoryadded]; //store all the newly selected radio buttons
		radiobuttonarray[iscategoryadded]=checkboxid;
		
	//remove from array,  deduct from budget , add new budget,  	
	var newttlbudget=parseInt($("#bv").val())-parseInt(olderbudget);	
newttlbudget=newttlbudget+parseInt(newbudget);	

$("#budgetreturned").html("<i class='fa fa-dollar'></i> Budget Results "+newttlbudget);
$("#tableheader").html(" New total budget is  "+newttlbudget);
	$("#bv").val(newttlbudget);	
		
	}
	else if(iscategoryadded ===-1){
		
		//at the first time of editing budget, we expect our radio array to be empty
		
		radiobuttonarray.push(checkboxid);
		categoryarray.push(category);
		
		console.log("array added "+radiobuttonarray.toString());
		var newttlbudget=parseInt($("#bv").val())-parseInt(oldbudget);	
newttlbudget=newttlbudget+parseInt(newbudget);	

$("#budgetreturned").html("<i class='fa fa-dollar'></i> Budget Results "+newttlbudget);
$("#tableheader").html(" New total budget is  "+newttlbudget);
	$("#bv").val(newttlbudget);	
		
		
	}
	
	//
	

	
	
	}
	
	
	
  function numbers(evt)
{
var charCode=(evt.which) ? evt.which : event.keyCode
if(charCode > 31 && (charCode < 48 || charCode>57))
return false;
return true;
}	
	
	


//prevent form submit
$("form").submit(function(e)
{
    return false;
});
	
	
</script>


<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});



//local storage

var budgetdb = new PouchDB('budget');

function savebudget() {
	var currenttabledata="";
	
	currenttabledata=$("#budgettable").html();
	
	console.log(""+currenttabledata);
	
var today = new Date();
var budgetvalue=$("#bv").val();
var dateis=""+today;
var dateform=dateis.substring(0,16);
var uid=new Date().valueOf();	
   budgetdetails=
        {_id:""+uid,//unique identifier
	    code:currenttabledata,  //the whole json results. as loaded from search.
        datesaved:dateform, //date of saving
		amount:budgetvalue,
        completed: false};
  budgetdb.put(budgetdetails, function callback(err, result) 
                              {
    if (!err) 
	{
      console.log('budget added succesfully');
	  $("#budgetsavedalert").show();
	  
    }
	else {
		
		console.log(err);
	}
               });
}

// a code to load the budget from local storage

function loadbudget()
{
	var mdata="<table class='table cart-table table-responsive' ><tr ><th>Date</th><th>Amount</th><th>View</th></tr>";
	budgetdb.allDocs({include_docs:true,ascending: true}).then(function (doc) 
       {
    
     for(a=0;a<doc.total_rows;a++){
	    var dat={};
	   
	   dat=doc.rows[a];
	 console.log(dat.doc.datesaved);

mdata+="<tr ><td>"+dat.doc.datesaved+"</td><td>"+dat.doc.amount+" Kshs.</td><td><button class='btn btn-default' onclick=\"showdbtable('"+dat.doc._id+"');\" >View</button></td></tr>";
if(a===(doc.total_rows-1)){ mdata+="</table>"; $("#savedbudgetdata").html(mdata); }
}	   
		
	});
	
	
	
}


function showdbtable(myid){
	
		budgetdb.get(myid).then(function (doc) {
			$('#savedbudget').modal('hide');
 $("#budgettable").html(doc.code);
 	

});
	
}

</script>






