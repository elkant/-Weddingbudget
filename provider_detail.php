
<?php
session_start();
?>

<style>

.maindetails{
	width:60%;
}
.featured-item .icon i {
    font-size: 26px;
}
</style>
<!--editCtrl-->
            <div class="page-content" ng-controller="editCtrl" >

              

                <div class="col-md-12">
 <div class="col-md-3"><img class="img-responsive" src="img/sideflower.jpg" alt="" ></div>
 <div class="col-md-6">  <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> Register your services </h3>
                        <div class="half-txt p-top-30">Provide as much details as possible </div>
                    </div>
</div>
<div class="col-md-3"><img  class="img img-responsive" src="img/leftsideflower.jpg" alt="" ></div><!----> <!--<img  src="img/curvedflower.jpg" alt="">--> 
   </div>   

  <div >
  
                    <div class="row">
					     <div class="col-md-12">
						 
						 
						 
                            <form data-ng-submit="saveCustomer(datamodel);" >

                                <div class="row">

                                   
										  <div class="col-md-6">
										<section id="work_outer"><!--main-section-start-->

  <div class="container">
    <section class="main-section contact" id="contact">
     <div class="row">
	 <form>
          <div>
          <div class="form" >
		  <table class="col-md-12">
		 	  <tr><td>  
	  <div class="col-md-12  col-md-offset-3 text-center">
                        <h3 class="text-uppercase"> basic details</h3>
                        <div class="half-txt p-top-30"></div>
                    </div>
	  
	  
	  </td></tr>
	  <tr><td></td></tr><tr><td></td></tr>
		  <tr><td>
		  <table class="col-md-8 wow fadeInUp delay-06s  col-md-offset-3" ><tbody>
           <tr><td class="control-label">Name</td>
		   <td><div class="form-group"><input class="form-control maindetails" disabled type="text" name=""  data-ng-model="datamodel.provider.name" ng-init=" datamodel.provider.name='<?php if(isset($_SESSION["name"])) {
							echo $_SESSION["name"];} ?>'"  placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
		    </div> 
							
							
		   </td></tr>
           <tr><td  class="form-group"> Email</td><td>
		   <div class="form-group">
		   <input type="hidden" data-ng-model="datamodel.provider.id" > <input type="hidden"  data-ng-model="datamodel.provider.accountid" ng-init=" datamodel.provider.accountid='<?php if(isset($_SESSION["id"])) {
							echo $_SESSION["id"];} ?>'" > 
			<input class="form-control maindetails"  type="text" name=""  data-ng-model="datamodel.provider.email"  disabled ng-init="datamodel.provider.email='<?php if(isset($_SESSION["username"])) {
							echo $_SESSION["username"];} ?>'" placeholder="Your E-mail *" ></div></td></tr>
			<tr><td  class="form-group">County</td><td  > <div class="form-group">
		   <select  class="form-control maindetails" name="" required value="Location" data-ng-init="getSelectData('county');"   data-ng-model="datamodel.provider.county" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a County</option>		  
		     <option ng-repeat="cnty in county" ng-selected="" value="{{cnty.id}}">{{cnty.value}}</option>		  
		   </select></div>
		   </td>
		   </tr>  
		   <tr><td  class="form-group"> Give a specific area e.g. town </td>
		   <td><div  class="form-group"><input class="form-control maindetails" required type="text" name=""  data-ng-model="datamodel.provider.area" placeholder="Specify Area" ><div></td></tr>
		   <tr><td class="control-label"> Website Url</td>
			<td><div  class="form-group"> 
			<input class="form-control maindetails"  data-ng-model="datamodel.provider.websiteurl" type="text" name="" placeholder="Website url" ></div></td></tr>
			  
		   <tr><td class="control-label">  Other Details</td><td><div  class="form-group"> 
		   <textarea class="form-control maindetails" placeholder="Description" required data-ng-model="datamodel.provider.comments" cols="0" rows="0" >Other Details</textarea></div></td></tr>
          
			 
             
		
	  
	  </table>
	  </tr></td>
	  <tr><td>  
	  <div class="col-md-12  col-md-offset-3 text-center">
                        <h3 class="text-uppercase"> Add your details</h3>
                        <div class="half-txt p-top-30">Add your various packages. e.g if you provide catering at different prices enter all your package details here. Remember provide as much details as possible </div>
                    </div>
	  
	  
	  </td></tr>
	  <tr class="col-md-12  col-md-offset-3"><td><h3></h3></td></tr>
	  <tr><td>
	   <table class=" col-md-12  col-md-offset-3 table table-bordered table-primary table-striped" id="no-more-tables">
	  <!-- <tr>
	   <th>Provider</th>
	   <th>Cost</th>
	   <th>Capacity</th>
	   <th>Type</th>
	   <th>Entertainment</th>
	   <th>Physical Address</th>
	   <th>Area</th>
	   <th>Image</th>
	   <th>Small Description</th>
	   </tr>-->
	            <div  style="display:none" entity = "services" ng-model="services" fetch-data></div>
				<div  style="display:none" entity ="capacityoptions" ng-model="capacityoptions" fetch-data></div>
				<div  style="display:none" entity ="venuetype" ng-model="venuetype" fetch-data></div>
				<div  style="display:none" entity ="flowers" ng-model="flowers" fetch-data></div>
				<div  style="display:none" entity ="tents" ng-model="tents" fetch-data></div>
				<div  style="display:none" entity ="caketype" ng-model="caketype" fetch-data></div>
				<div  style="display:none" entity ="entertainment" ng-model="entertainment" fetch-data></div>
				
	       <tr ng-repeat ="(pdIndex,pd) in datamodel.provider_detail"> 
		 
			<td data-title="Provider type">
		
			<select class="form-control"  id="id{{$index+1}}"  required data-ng-model="pd.providerid" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
				<option value="">Choose a service</option>	
				<option  id="{{ptype.id}}" ng-repeat="ptype in services " value ="{{ptype.id}}">{{ptype.type}}</option>       
				</select>
			</td>


		   <td data-title="Cost"><input class="form-control"  required type="text" name=""  placeholder="Cost" data-ng-model="pd.cost" ></td>
		   
		   <td data-title="Capacity"  ng-if="pd.providerid=='1' || pd.providerid=='5' || pd.providerid=='7'"> 
		   <select class="form-control"  id="capacity{{$index+1}}"  required  data-ng-model="pd.capacity" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue" >
		 <option value="">Choose a capacity</option>	
		   <option  ng-repeat="capoptions in capacityoptions" id="{{capoptions.id}}" value="{{capoptions.id}}">{{capoptions.value}}</option>
		   </select>
		   </td>
		   <!--<td ng-if="pd.providerid=='3'"><input class="form-control" type="text" name=""  placeholder="Type" data-ng-model="pd.type" ></td>-->
		   
		   
		    <td data-title="Type" ng-if="pd.providerid=='5'" >  
		   <select class="form-control"  id="venue{{$index+1}}" data-ng-model="pd.type"  required id="type{{$index+1}}"  >
		   <option value="">Choose a Venue</option>	
		   <option  ng-repeat="venue in venuetype"  id="{{venue.id}}" value="{{venue.id}}">{{venue.value}}</option>
		   </select>
		    </td>
		   
		   
		   <td data-title="Flowers" ng-if="pd.providerid=='3'" >  
		   <select class="form-control" id="flw{{$index+1}}"  data-ng-model="pd.type"  required  id="type{{$index+1}}"   >  
		   <option value="">Choose a Flower</option>
		   <option  ng-repeat="flw in flowers"  id="{{flw.id}}" value="{{flw.id}}">{{flw.value}}</option>
		   </select>
		    </td>
			
			
		   
		     <td data-title="Tents" ng-if="pd.providerid=='7'" >  
		   <select class="form-control" id="tents{{$index+1}}"  data-ng-model="pd.type"  required  id="type{{$index+1}}"   >
		     <option value="">Choose a Tent</option>	
		   <option  ng-repeat="tent in tents"  id="{{tent.id}}" ng-value="{{tent.id}}">{{tent.value}}</option>
		   </select>
		    </td>
		   
		   
		   <td data-title="Cake type" ng-if="pd.providerid=='2'" >  
		   <select class="form-control"  placeholder="Cake Type" required data-ng-model="pd.type"  id="type{{$index+1}}"  >
		     <option value="">Choose a Cake</option>	
		   <option  ng-repeat="ck in caketype"  id="{{ck.id}}" ng-value="{{ck.id}}">{{ck.value}}</option>
		   </select>
		    </td>
		    <td data-title="Entertainment" ng-if="datamodel.provider.providerId=='10'">
			<select class="form-control"  placeholder="Entertainment Type" required data-ng-model="pd.type"  required  id="type{{$index+1}}"  >
			<option ng-repeat="ent in entertainment" ng-selected="ent.value=ent.id" value="{{ent.id}}">{{ent.value}}</option>
			</select>			
			</td>
		   <td data-title="UOM" ng-if="pd.providerid=='2'"><input class="form-control" required  placeholder="Unit of Measure" type="text" name="" data-ng-model="pd.uom" ></td>
		   <td data-title="Address" ng-if="pd.providerid=='5'"><input class="form-control" required  type="text" name="" placeholder="Physical Address" data-ng-model="pd.location" ></td>
		   <td data-title="Area" ng-if="pd.providerid=='5'"><input class="form-control" required type="text" name="" placeholder="Area" data-ng-model="pd.area" ></td>
		   <td data-title="Description"><textarea class="form-control  " type="text" required name="" placeholder="Small description" data-ng-model="pd.description" >small description</textarea></td>
			
		   <td ng-if="pd.img==''" data-title="Image">
			<!--<input type="file" ng-model="pd.img"  file-model="myFile"  onchange="angular.element(this).scope().uploadFiles(this,pdIndex)" />
			<label for="file" >Choose image</label>	-->
			<!--<button ng-click="uploadFiles(myFile,pdIndex)">Upload</button>-->
			<!-- <a href class="fa fa-paperclip"  data-ng-click="uploadDocument(pdIndex)"  tooltip="Add Document">-->
			
                      <div class="">
																	<div class="featured-item text-center">
																		<div class="icon " style="visibility: visible; ">
																			<a href=""  data-ng-click="uploadDocument(pdIndex)" ><i class="fa fa-paperclip"></i></a>
																		</div>
																	   
																	</div>
																</div>



			
			</a>
			
		  </td>
		   <td ng-if="pd.img!=''" > <span class="fileupload-preview thumbnail "><img src="uploads/{{pd.img}}" class="editimg" alt=""></span></td>
		 <!--  <td><a href ng-click="removeRow(pdIndex,'provider_detail')">-</a></td>-->	

			<td ng-show="$last"> <a href data-ng-click="addRow('provider_detail')"  class='fa fa-plus'></a></td>
             <td  ng-show="pdIndex != 0" >
             <a href ng-click="removeRow(pdIndex,'provider_detail')" class='fa fa-minus' >
			
			</a>			</td>

		   </tr>
			</table>
		 </td>
		 </tr>
			
			</table>
			</td></tr>
          </div>
        </div>
      </div>
    </section>
  </div>
  </section>
 <div class="col-md-12 col-md-offset-6 form-group" style="padding-left:30%">
                                       
                                        <div class="col-md-6 form-group full-width">
                                            <button type="submit" class="btn btn-small btn-dark-solid "  >
                                                Register 
                                            </button>
                                        </div>
                                    </div>
										
                                    </div>

                                   

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--contact-->

        </section>
