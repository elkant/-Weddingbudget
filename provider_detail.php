
<?php
session_start();
?>
<!--editCtrl-->
            <div class="page-content" ng-controller="editCtrl" >

                <div class="container">

                    <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> Register your services </h3>
                        <div class="half-txt p-top-30">Provide as much details as possible </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <form >

                                <div class="row">

                                   
										  <div class="col-md-6">
										<section id="work_outer"><!--main-section-start-->

  <div class="container">
    <section class="main-section contact" id="contact">
     <div class="row">
          <div>
          <div class="form" >
		  <table class="col-lg-10 wow fadeInUp delay-06s">
           <tr><td class="control-label">Name</td>
		   <td><div class="form-group"><input class="form-control" disabled type="text" name=""  data-ng-model="datamodel.provider.name" ng-init=" datamodel.provider.name='<?php if(isset($_SESSION["name"])) {
							echo $_SESSION["name"];} ?>'"  placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
		   <input type="hidden" data-ng-model="datamodel.provider.id" > <input type="hidden" data-ng-model="datamodel.provider.accountid" ng-init=" datamodel.provider.accountid='<?php if(isset($_SESSION["id"])) {
							echo $_SESSION["id"];} ?>'" >  </div>
		   </td></tr>
           <tr><td  class="form-group"> Email</td><td>
		   <div class="form-group"> <input class="form-control" disabled type="text" name=""  data-ng-model="datamodel.provider.email" ng-init=" datamodel.provider.email='<?php if(isset($_SESSION["email"])) {
							echo $_SESSION["email"];} ?>'" placeholder="Your E-mail *" ></div></td></tr>
			<tr><td  class="form-group">County</td><td  > <div class="form-group">
		   <select  class="form-control" name="" value="Location" data-ng-init="getSelectData('county');"   data-ng-model="datamodel.provider.county" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a County</option>		  
		     <option ng-repeat="cnty in county" ng-selected="" value="{{cnty.id}}">{{cnty.value}}</option>		  
		   </select></div>
		   </td>
		   </tr>  
		   <tr><td  class="form-group"> Give a specific area e.g. town </td>
		   <td><div  class="form-group"><input class="form-control" type="text" name=""  data-ng-model="datamodel.provider.area" placeholder="Specify Area" ><div></td></tr>
		   <tr><td class="control-label"> Website Url</td>
			<td><div  class="form-group"> 
			<input class="form-control"  data-ng-model="datamodel.provider.websiteurl" type="text" name="" placeholder="Website url" ></div></td></tr>
			  
		   <tr><td class="control-label">  Other Details</td><td><div  class="form-group"> 
		   <textarea class="form-control"  placeholder="Description" data-ng-model="datamodel.provider.comments" cols="0" rows="0" >Other Details</textarea></div></td></tr>
          
			 
             
			<tr>			
		<td class="col-lg-3" style="padding-left:20px; "> 	<div  class="form-group"> <button type="button" data-ng-click="addRow('provider_detail')">
			Add Provider </div></button></td>
			</tr>
	  
	   <tr><td colspan="3">
	   <table class="table table-condensed bordered" style="width:100%">
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
	        <tr ng-repeat ="pd in datamodel.provider_detail"> 
			
			<td><select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('providertype');"  data-ng-model="pd.providerid" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
				<option value="">Choose a provider</option>	
				<option ng-repeat="ptype in providertype " value ="{{ptype.id}}">{{ptype.type}}</option>       
				</select>
			</td>


		   <td><input class="form-control  " type="text" name=""  placeholder="Cost" data-ng-model="pd.cost" ></td>
		   
		   <td ng-if="pd.providerid=='1' || pd.providerid=='5' || pd.providerid=='7'"> 
		   <select class="form-control"  placeholder="Capacity" data-ng-model="pd.capacity"  id="no{{$index+1}}"  ng-init="getSelectData('capacityoptions')" >
		   <option  ng-repeat="capoptions in capacityoptions" id="{{capoptions.id}}" ng-value="{{capoptions.id}}">{{capoptions.value}}</option>
		   </select>
		   </td>
		   <!--<td ng-if="pd.providerid=='3'"><input class="form-control" type="text" name=""  placeholder="Type" data-ng-model="pd.type" ></td>-->
		   
		   <td ng-if="pd.providerid=='3'" >  
		   <select class="form-control"  data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('flowers');" >
		   <option  ng-repeat="flw in flowers"  id="{{flw.id}}">{{flw.value}}</option>
		   </select>
		    </td>
		   
		     <td ng-if="pd.providerid=='7'" >  
		   <select class="form-control"  data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('tents');" >
		   <option  ng-repeat="tent in tents"  id="{{tent.id}}" ng-value="{{tent.id}}">{{tent.value}}</option>
		   </select>
		    </td>
		   
		   
		   <td ng-if="pd.providerid=='2'" >  
		   <select class="form-control"  placeholder="Cake Type" data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('caketype');" >
		   <option  ng-repeat="ck in caketype"  id="{{ck.id}}" ng-value="ck.id">{{ck.value}}</option>
		   </select>
		    </td>
			
		   <td ng-if="pd.providerid=='11'" >  
		   <select class="form-control"  placeholder="Chair Type" data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('chairtype');" >
		   <option  ng-repeat="chair in chairtype"  id="{{chair.id}}" ng-value="chair.id">{{chair.value}}</option>
		   </select>
		   </td>
		   
		    <td ng-if="pd.providerid=='5'" >  
		   <select class="form-control"  placeholder="Venue Type" data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('venuetype');" >
		   <option  ng-repeat="venue in venuetype"  id="{{venue.id}}" ng-value="venue.id">{{venue.value}}</option>
		   </select>
		   </td>
			
			
			
		    <td ng-if="datamodel.provider.providerId=='10'"><select class="input-text"  ng-load="getSelectData('entertainment')">
			<option ng-repeat="ent in entertainment" ng-selected="ent.value=ent.id" value="{{ent.id}}">{{ent.value}}</option>
			</select>			
			</td>
		   <td ng-if="pd.providerid=='2'"><input class="form-control" placeholder="Unit of Measure" type="text" name="" data-ng-model="pd.uom" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Physical Address" data-ng-model="pd.location" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Area" data-ng-model="pd.area" ></td>
		  
			<td class="file-upload">			
			<input type="text" class="form-control" ng-model="pd.img"  ><input type="file" file-model="myFile"  />
			<button ng-click="uploadFiles(myFile)">upload me</button>
		  </td>
		  <!-- <input type="file" ngf-select="onFileSelect(pd.img)" ng-model="pd.img" name="fileToUpload"   ngf-pattern="'image/*'" ngf-max-size="2M">-->
		   <!--<form action="upload.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit">
				 <button  type="file" class="btn btn-toolbar" data-ng-click="uploadDocument(datamodel.provider.fileToUpload)" >
															
				</button>
			</form>-->
		   
		   
		 
		   <td ><input class="form-control  " type="text" name="" placeholder="Small description" data-ng-model="pd.description" ></td>
		    </tr>
			</table>
		 </td>
		 </tr>
			
			</table>
          </div>
        </div>
      </div>
    </section>
  </div>
  </section>
 <div class="col-md-6 form-group">
                                       
                                        <div class="form-group full-width">
                                            <button type="submit" class="btn btn-small btn-dark-solid " data-ng-click="saveCustomer(datamodel)" >
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
