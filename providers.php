
<?php
session_start();
?>
<section id="work_outer"><!--main-section-start-->

  <div class="container">
    <section class="main-section contact" id="contact">
     <div class="row">
          <div  >{{datamodel}}
          <div class="form" >
		  <table class="col-lg-12 wow fadeInUp delay-06s">
           <tr><td class="control-label">Name </td>
		   <td><input class="input-text animated wow" type="text" name=""  data-ng-model="datamodel.provider.name" value="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
		   <input type="hidden" data-ng-model="datamodel.provider.id" > <input type="hidden" data-ng-model="datamodel.provider.accountid" ng-init=" datamodel.provider.accountid='<?php if(isset($_SESSION["email"])) {
							echo $_SESSION["email"];} ?>'" >
		   </td></tr>
           <tr><td class="control-label"> Email</td><td>  <input class="input-text animated wow  " type="text" name=""  data-ng-model="datamodel.provider.email" value="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td></tr>
			<tr><td class="control-label">County</td><td> 
		   <select class="input-text animated wow  " name="" value="Location" data-ng-init="getSelectData('county');"   data-ng-model="datamodel.provider.county" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a County</option>		  
		     <option ng-repeat="cnty in county" value="{{cnty.id}}">{{cnty.value}}</option>		  
		   </select>
		   </td>
		   </tr>  
		   <tr><td class="control-label"> Give a specific area e.g. town </td>
		   <td><input class="input-text animated wow" type="text" name=""  data-ng-model="datamodel.provider.area" value="Specify Area" ></td></tr>
			

		   

		  <tr><td class="control-label"> Provider Type</td>
		   <td><select class="input-text animated wow  "   data-ng-init="getSelectData('providertype');"  data-ng-model="datamodel.provider.providerId" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
				<option value="">Choose a provider</option>	
				<option ng-repeat="ptype in providertype " value ="{{ptype.id}}">{{ptype.type}}</option>       
				</select>
			</td></tr>

		  
			
		  <!-- <input class="input-text animated wow  "  data-ng-model="datamodel.provider.img" type="file" name="fileToUpload" value="pics" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
		  -->

		 
		    <!-- <input type="file" ngf-select="onFileSelect(file)"  name="fileToUpload"   ngf-pattern="'image/*'" ngf-max-size="2M">-->
			


			<!--<form action="upload.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit">
				 <button  type="file" class="btn btn-toolbar" data-ng-click="uploadDocument(datamodel.provider.fileToUpload)" >
															
				</button>
			</form>-->
		   
		  

		  
		  
		  
	
		  
		  
		  <!--venue-->
		  
		  
		   <tr ng-if="datamodel.provider.providerId=='5'"><td class="control-label">Venue Location </td><td> 
		   <select class="input-text animated wow  " name="" value="Location"  data-ng-model="datamodel.provider.vlocation" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a venue location</option>		  
		     <option ng-repeat="venues in location" value="{{venues.id}}">{{venues.value}}</option>		  
		   </select>
		   </td>
		   </tr>
		    <tr ng-if="datamodel.provider.providerId=='5'"> <td class="control-label"> Specify area </td>
		    <td><input class="input-text animated wow  " type="text" name="" value="area"  data-ng-model="datamodel.provider.varea" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
		    </tr>
			
		
			<!--for an fields that capture capacity eg cost, vehicle,-->
		   <tr ng-if="datamodel.provider.providerId=='1' || datamodel.provider.providerId=='5'" ng-repeat="ccity in datamodel.capacity">
		   <td class="control-label" >Capacity</td/>
		   <td class="col-lg-6"> 
		   <select class="input-text"  data-ng-model="ccity.no"  ng-init="getSelectData('capacityoptions')" >
		   <option  ng-repeat="capoptions in capacityoptions"     id="{{capoptions.id}}">{{capoptions.value}}</option>
		    </select>
			</td>
			
			<td class="col-lg-3" style="padding-left:20px; ">
			<input class="input-text" type="text" name=" " value="Cost Per Capacity *"  data-ng-model="ccity.cost" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
			<input class="input-text" type="hidden"  data-ng-model="ccity.providerid" ng-init="ccity.providerid=datamodel.provider.providerId" >
			
			</td>
			<td class="col-lg-3" style="padding-left:20px; ">  <button type="button" data-ng-click="addRow('capacity')">Add Capacity</button></td>
			
			</tr>
			
			
			
			
			<!-- FOR CAKE TYPE -->
			-----{{datamodel.caketype}}
			 <tr ng-if="datamodel.provider.providerId=='2'" ng-repeat="cake in datamodel.cake">
		   <td class="control-label" >Cake type</td/>
		   <td class="col-lg-6"> 
		   <select class="input-text"  data-ng-model="cake.type"  ng-init="getSelectData('caketype')" >
		   <option  ng-repeat="ck in caketype"  id="{{ck.id}}">{{ck.value}}</option>
		    </select>
						
			</td>
			
			
			<td class="col-lg-3" style="padding-left:20px; ">
			<input class="input-text" type="hidden"  data-ng-model="cake.providerid" ng-init="cake.providerid=datamodel.provider.providerId" >
			<input class="input-text" type="text" name=" " value="Cost Per Kg *"  data-ng-model="cake.cost" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
			</td>
			<td>per Kg</td>
			<td class="col-lg-3" style="padding-left:20px; ">  <button type="button" data-ng-click="addRow('cake')">Add Cake</button></td>
			
			</tr>
			<tr ng-if="datamodel.provider.providerId=='10'">
			<td class="control-label">Sound</td>
			<td><select class="input-text"><option ng-repeat="snd in sound" value="{{snd.id}}">{{snd.value}}</option></select></td>
			</tr>
		   
			<tr ng-if="datamodel.provider.providerId=='10'">
			<td class="control-label">Entertainment</td>
			<td><select class="input-text"  ng-init="getSelectData('entertainment')">
			<option ng-repeat="ent in entertainment" value="{{ent.id}}">{{ent.value}}</option>
			</select>			
			</td>
			</tr>
			<tr ng-if="datamodel.provider.providerId=='10'"><td class="control-label">Additional Services</td>
			<td>
			<ul class="list-inline">
			<li ng-repeat="ent in entertainment"  ng-init="getSelectData('entertainment')">
			<label>{{ent.value}} &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="checkbox"  data-ng-model="datamodel.provider.enttype" value="{{ent.id}}" name="entertainment"/>
			</li>
			</ul></tr>
			<tr ng-repeat="vehicles in datamodel.vehicle" ng-if="datamodel.provider.providerId=='9'">
			<td class="control-label">Vehicle Type</td>
			<td class="col-lg-6">  <input class="input-text animated wow  "  data-ng-model="vehicles.type" type="text" name="" value="Vehicle Type*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
		    <td class="col-lg-3">	<input class="input-text" type="hidden"  data-ng-model="vehicles.providerid" ng-init="vehicles.providerid=datamodel.provider.providerId" > 
			<input class="input-text animated wow  "  data-ng-model="vehicles.capacity" type="text" name="" value="Vehicle Capacity*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
			<td class="col-lg-3">  <input class="input-text animated wow  "  data-ng-model="vehicles.cost" type="text" name="" value="Vehicle Cost*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
		   <td class="col-lg-3" style="padding-left:20px; ">  <button type="button" data-ng-click="addVehicle('vehicle')">Add Vehicle</button></td>
			</tr>
			
		
		    <tr ng-repeat="flower in datamodel.flowers" ng-if="datamodel.provider.providerId=='3'">
			<td class="control-label">Flower Type <!-- uom--></td>
			<td class="col-lg-6">  <input class="input-text animated wow  "  data-ng-model="flower.type" type="text" name="" value="Vehicle Type*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
			<td class="col-lg-3">  <input class="input-text animated wow  "  data-ng-model="flower.cost" type="text" name="" value="Vehicle Type*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
		    <td class="col-lg-3">	<input class="input-text" type="hidden"  data-ng-model="flower.providerid" ng-init="flower.providerid=datamodel.provider.providerId" >
			<input class="input-text animated wow  "  data-ng-model="flower.uom" type="text" name="" value="Flower No*" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td>
			<td class="col-lg-3" style="padding-left:20px; ">  <button type="button" data-ng-click="addVehicle('flowers')">Add Flower</button></td>
			</tr>

			 
		   <tr><td class="control-label"> General Cost </td><td>  <input class="input-text animated wow  "  data-ng-model="datamodel.provider.cost" type="text" name="" value="Cost" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td></tr>
		   <tr><td class="control-label"> Website Url</td><td>  <input class="input-text animated wow  "  data-ng-model="datamodel.provider.websiteurl" type="text" name="" value="Website url" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue"></td></tr>
		  
		   <tr><td class="control-label"> Upload a beautiful picture</td>
		   <td >
		   <input type="text" class="input-text" ng-model="datamodel.provider.img"><input type="file" data-file-model="myFile"  /><button ng-click="uploadFile()">upload me<!--add upload image --></button>
			 </td></tr> 
		  <!-- Gowns -->
		   <tr><td class="control-label">  Other Details</td><td><textarea class="input-text text-area animated wow  delay-06s"   data-ng-model="datamodel.provider.comments" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Other Details</textarea></td></tr>
          
			 
              <tr><td class="control-label"> </td><td> <input class="input-btn animated wow  delay-08s" data-ng-click="saveCustomer(datamodel)"  type="submit" value="Register "></td></tr>
		
			
			</table>
          </div>
        </div>
      </div>
    </section>
  </div>
  </section>
  <style>  
  
  .control-label {
	text-align: right;
    padding-right: 8%;
	width:30%;
   
  }
.main-section.contact {
    padding: 0 0 100px;
}

#work_outer {
    background: #f9f9f9;
    padding: 50px 0px;
    position: relative;
}

.input-text {
    padding: 10px 10px;
    border: 1px solid #ccc;
    width: 100%;
    height: 43.5px;
    display: block;
    border-radius: 5px;
    font-size: 12.5px;
    color: #aaa;
    font-family: 'Lato', sans-serif;
    margin: 0 0 10px 0;
    transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
}
  </style>
  
 