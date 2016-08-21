<?php
session_start();
?>

            <div class="page-content" ng-controller="listCtrl">

                <div class="container">
                    <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> Edit your services </h3>
                        <div class="half-txt p-top-30">Provide as much details as possible </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                           <!-- <form method="post" action="#" id="form" role="form" class="contact-comments-->
								<div class="row">

                                   
										  <div class="col-md-6">
										<section id="work_outer"><!--main-section-start-->

  <div class="container">
    <section class="main-section contact" id="contact">
     <div class="row">
          <div  >
          <div class="form" >
		  <table class="col-lg-10 wow fadeInUp delay-06s">
           <tr><td class="control-label">Name</td>
		   <td><div class="form-group"><input class="form-control" type="text" name="" disabled data-ng-model="datamodel.provider.name" placeholder="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
		   <input type="hidden" data-ng-model="datamodel.provider.id" > <input type="hidden" data-ng-model="datamodel.provider.accountid"></div>
		   </td></tr>
           <tr><td  class="form-group"> Email</td><td>
		   <div class="form-group"> <input class="form-control " type="text" name="" disabled data-ng-model="datamodel.provider.email" placeholder="Your E-mail *" ></div></td></tr>
			<tr><td  class="form-group">County</td><td  > <div class="form-group">
		   <select  class="form-control" name="" value="Location" data-ng-init="getSelectData('county');"   data-ng-model="datamodel.provider.county" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
             <option value="">Choose a County</option>		  
		     <option ng-repeat="cnty in county" ng-selected="cnty.id==datamodel.provider.county" value="{{cnty.id}}">{{cnty.value}}</option>		  
		   </select></div>
		   </td>
		   </tr>  
		   <tr><td  class="form-group"> Give a specific area e.g. town </td>
		   <td><div  class="form-group"><input class="form-control" type="text" name=""  data-ng-model="datamodel.provider.area" placeholder="Specify Area" ><div></td></tr>
			
			
			<tr><td class="control-label"> Website Url</td>
			<td><div  class="form-group"> 
			<input class="form-control"  data-ng-model="datamodel.provider.websiteurl" type="text" name="" placeholder="Website url" ></div></td></tr>
			  
		<tr><td class="control-label"> Upload a beautiful picture</td>
		   <td><div  class="form-group"> 
		   <input type="text" class="form-control" ng-model="datamodel.provider.img" placeholder="Awesome Image ">
		   <input type="file" data-file-model="myFile"  />
		   <button ng-click="uploadFile()">upload me<!--add upload image --></button>
			</div> </td></tr> 
		  <!-- Gowns -->
		   <tr><td class="control-label">  Other Details</td><td><div  class="form-group"> 
		   <textarea class="form-control"  placeholder="Description" data-ng-model="datamodel.provider.comments" cols="0" rows="0" >Other Details</textarea></div></td></tr>
          
			 
             
			</table>
	  
	   <table class="table table-condensed bordered col-lg-12" >
	        <tr ng-repeat ="(pdIndex,pd) in datamodel.provider_detail"> 
			<td><select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('providertype');"  data-ng-model="pd.providerid" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
				<option value="">Choose a provider</option>	
				<option ng-repeat="ptype in providertype "  ng-selected="ptype.id==pd.providerid" value ="{{ptype.id}}">{{ptype.type}}</option>       
				</select>
			</td>


		   <td><input class="form-control  " type="text" name=""  placeholder="Cost" data-ng-model="pd.cost" ></td>
		   <td><input class="form-control  " type="text" name="" placeholder="Capacity" data-ng-model="pd.capacity" ></td>
		   
		   <td ng-if="pd.providerid=='1' || pd.providerid=='5'"> 
		   <select class="form-control"  placeholder="Capacity" data-ng-model="pd.capacity"  id="no{{$index+1}}"  ng-init="getSelectData('capacityoptions')" >
		   <option  ng-repeat="capoptions in capacityoptions" ng-selected="capoptions.id==pd.capacity"  id="{{capoptions.id}}">{{capoptions.value}}</option>
		   </select>
		   </td>
		   <td ng-if="pd.providerid!='2'"><input class="form-control" type="text" name=""  placeholder="Type" data-ng-model="pd.type" ></td>
		   <td >  
		   <select class="form-control"  placeholder="Cake Type" data-ng-model="pd.type"  id="type{{$index+1}}"  ng-init="getSelectData('caketype');" >
		   <option  ng-repeat="ck in caketype"  id="{{ck.id}}">{{ck.value}}</option>
		   </select>
		    </td>
		    <td ng-if="datamodel.provider.providerId=='10'">
			<select class="form-control input-text"  ng-load="getSelectData('entertainment')" ng-model="pd.entertainment">
			<option ng-repeat="ent in entertainment"   ng-selected="ent.id==pd.entertainment" value="{{ent.id}}">{{ent.value}}</option>
			</select>			
			</td>
		   <td ng-if="pd.providerid=='2'"><input class="form-control" placeholder="Unit of Measure" type="text" name="" data-ng-model="pd.uom" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Physical Address" data-ng-model="pd.location" ></td>
		   <td ng-if="pd.providerid=='5'"><input class="form-control" type="text" name="" placeholder="Area" data-ng-model="pd.area" ></td>
		   <td ><input class="form-control" type="text" name="" placeholder="Image" data-ng-model="pd.img" ></td>
		   <td ><input class="form-control  " type="text" name="" placeholder="Small description" data-ng-model="pd.description" ></td>
		   		
		<td class="col-lg-3" style="padding-left:20px; "> <button type="button" data-ng-click="addRows(datamodel.provider_detail,pdIndex)">
			Add Provider </button></td>
			
	   
		    </tr>
			</table>
		 </td></tr>
			
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

                          <!--  </form>-->
                        </div>
                    </div>
                </div>

            </div>
            <!--contact-->

        </section>
