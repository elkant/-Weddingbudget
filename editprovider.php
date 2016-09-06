
<?php
session_start();
?>
<style>
.maindetails{
	width:60%;
}
</style>

<!--editCtrl-->
            <div class="page-content" ng-controller="listCtrl" >

                <div class="container">

                  

<div><div class="col-lg-12">
 <div class="col-lg-3"><img class="img img-responsive"  src="img/sideflower.jpg" alt="" ></div>
 <div class="col-lg-6">  <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> Edit your service details </h3>
                        <div class="half-txt p-top-30">Provide as much details as possible </div>
                    </div></div>
<div class="col-lg-3"><img class="img img-responsive" style="float:right" src="img/leftsideflower.jpg" alt="" ></div> <!--<img  src="img/curvedflower.jpg" alt="">--> 
   </div> 
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
		   <td><div class="form-group"><input class="form-control maindetails" disabled type="text" name=""  data-ng-model="datamodel.provider.name" ng-init=" datamodel.provider.name='<?php if(isset($_SESSION["name"])) {
							echo $_SESSION["name"];} ?>'"  placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
		   <input type="hidden" data-ng-model="datamodel.provider.id" > <input type="hidden" data-ng-model="datamodel.provider.accountid" ng-init=" datamodel.provider.accountid='<?php if(isset($_SESSION["id"])) {
							echo $_SESSION["id"];} ?>'" >  </div> 
							
							
		   </td></tr>
           <tr><td  class="form-group"> Email</td><td>
		   <div class="form-group"> <input class="form-control maindetails" disabled type="text" name=""  data-ng-model="datamodel.provider.email" ng-init=" datamodel.provider.email='<?php if(isset($_SESSION["email"])) {
							echo $_SESSION["email"];} ?>'" placeholder="Your E-mail *" ></div></td></tr>
			<tr><td  class="form-group">County</td><td  > <div class="form-group">
		   <select  class="form-control maindetails" name="" value="Location" data-ng-init="getSelectData('county');"   data-ng-model="datamodel.provider.county" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a County</option>		  
		     <option ng-repeat="cnty in county" ng-selected="cnty.id==datamodel.provider.county"  value="{{cnty.id}}">{{cnty.value}}</option>		  
		   </select></div>
		   </td>
		   </tr>  
		   <tr><td  class="form-group"> Give a specific area e.g. town </td>
		   <td><div  class="form-group"><input class="form-control maindetails" type="text" name=""  data-ng-model="datamodel.provider.area" placeholder="Specify Area" ><div></td></tr>
		   <tr><td class="control-label"> Website Url</td>
			<td><div  class="form-group"> 
			<input class="form-control maindetails"  data-ng-model="datamodel.provider.websiteurl" type="text" name="" placeholder="Website url" ></div></td></tr>
			  
		   <tr><td class="control-label">  Other Details</td><td><div  class="form-group"> 
		   <textarea class="form-control maindetails" placeholder="Description" data-ng-model="datamodel.provider.comments" cols="0" rows="0" >Other Details</textarea></div></td></tr>
          
			 
             
			<tr>			
		<td class="col-lg-3" style="padding-left:20px; "> 	<div  class="form-group"> <button type="button" data-ng-click="addRow('provider_detail')">
			Add Service </div></button></td>
			</tr>
	  
	   <tr><td colspan="3">
	   <table class="table table-bordered table-primary table-striped" style="width:100%">
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
	       <tr ng-repeat ="(pdIndex,pd) in datamodel.provider_detail"> 
			 <td ng-if="pd.img!=''" > <span class="fileupload-preview thumbnail "><img src="uploads/{{pd.img}}" class="editimg" alt=""></span></td>
			<td><select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('services');"  data-ng-model="pd.providerid" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
				<option value="">Choose a provider</option>	
				<option ng-repeat="ptype in services "   ng-selected="ptype.id==pd.providerid" value="{{ptype.id}}">{{ptype.type}}</option>       
				</select>
			</td>


		   <td><input class="form-control  " type="text" name=""  placeholder="Cost" data-ng-model="pd.cost" ></td>
		   
		   <td ng-if="pd.providerid=='1' || pd.providerid=='5' || pd.providerid=='7'"> 
		   <select class="form-control"  placeholder="Capacity" data-ng-model="pd.capacity"  id="no{{$index+1}}"  ng-init="getSelectData('capacityoptions')" >
		   <option  ng-repeat="capoptions in capacityoptions" id="{{capoptions.id}}" ng-selected="capoptions.id==pd.capacity" ng-value="{{capoptions.id}}">{{capoptions.value}}</option>
		   </select>
		   </td>
		   <!--<td ng-if="pd.providerid=='3'"><input class="form-control" type="text" name=""  placeholder="Type" data-ng-model="pd.type" ></td>-->
		   
		   
		    <td ng-if="pd.providerid=='5'" >  
		   <select class="form-control"  data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('venuetype');" >
		   <option  ng-repeat="venue in venuetype"  id="{{venue.id}}" ng-value="{{venue.id}}">{{venue.value}}</option>
		   </select>
		    </td>
		   
		   
		   <td ng-if="pd.providerid=='3'" >  
		   <select class="form-control"  data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('flowers');" >
		   <option  ng-repeat="flw in flowers"  id="{{flw.id}}" ng-selected="flw.id==pd.type" ng-value="{{flw.id}}">{{flw.value}}</option>
		   </select>
		    </td>
			
			
		   
		     <td ng-if="pd.providerid=='7'" >  
		   <select class="form-control"  data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('tents');" >
		   <option  ng-repeat="tent in tents"  id="{{tent.id}}"  ng-selected="tent.id==pd.type" ng-value="{{tent.id}}">{{tent.value}}</option>
		   </select>
		    </td>
		   
		   
		   <td ng-if="pd.providerid=='2'" >  
		   <select class="form-control"  placeholder="Cake Type" data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('caketype');" >
		   <option  ng-repeat="ck in caketype"  id="{{ck.id}}" ng-selected="ck.id==pd.type" ng-value="{{ck.id}}">{{ck.value}}</option>
		   </select>
		    </td>
		    <td ng-if="datamodel.provider.providerId=='10'"><select class="input-text"  ng-load="getSelectData('entertainment')">
			<option ng-repeat="ent in entertainment" ng-selected="ent.value=ent.id" value="{{ent.id}}">{{ent.value}}</option>
			</select>			
			</td>
		   <td ng-if="pd.providerid=='2'"><input class="form-control" placeholder="Unit of Measure" type="text" name="" data-ng-model="pd.uom" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Physical Address" data-ng-model="pd.location" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Area" data-ng-model="pd.area" ></td>
		  
		   <td  ng-if="pd.img==''">		
			<!--<span><input type="file"  ng-model="pd.img" file-model="image"  /></span>
			<span><button ng-click="uploadFiles(image)">upload me </button></span>-->
			
			<!--<input type="file" ng-model="pd.img"  file-model="myFile" />
			<button ng-click="uploadFiles(myFile,pdIndex)">up</button>-->
			 <a href class="fa fa-paperclip"  data-ng-click="uploadDocument(pdIndex)"  tooltip="Add Document">
															
			</a>
			 
		   </td>
		   <td ><textarea class="form-control  " type="text" name="" placeholder="Small description" data-ng-model="pd.description" >small description</textarea></td>
	    
		    <!--<td> <button type="button" data-ng-click="addRows(datamodel.provider_detail,pdIndex)">
			<span ng-if="">+ </span>
			<span ng-if="">- </span>
			
			</button></td>-->
			
			
			<td ng-show="$last"> <a href data-ng-click="addRows(datamodel.provider_detail,pdIndex)"  class='fa fa-plus'></a></td>
             <td  ng-show="pdIndex != 0" >
             <a href ng-click="removeRow(pdIndex,'provider_detail')" class='fa fa-minus' >
			
			</a>			</td>
		   
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
                                            <button type="submit" class="btn btn-small btn-dark-solid " data-ng-click="updateCustomer(datamodel)" >
                                                Update 
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
