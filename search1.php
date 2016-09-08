<!--portfolio-->
            <div class="page-content p-bot-0" id="portfolio">
                <div class="container-fluid">

                    <div class="row">
                         <div class="text-center">
                            <ul class="portfolio-filter">
                                <li style="margin-right:2%" >
								        <select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('services');"  data-ng-model="searchmodel.category" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
										<option value="">Choose a provider</option>	
										<option ng-repeat="ptype in services" value ="{{ptype.id}}">{{ptype.type}}</option>       
										</select>
										
								</li>
                                <li style="margin-right:2%"> <input style="box-shadow: none;border: 1px solid #e5e5e5; border-radius: 3px;width:100%;height:34px; " data-ng-model="searchmodel.cost" type="text" name="" placeholder="Cost "></li>
                                <li style="margin-right:2%"><button class="btn btn-small btn-dark-solid "  ng-click="search(searchmodel)" >Search </button></li>

                            </ul>
                        </div>
					<div class="col-md-8">
                        <div class="portfolio  portfolio-gallery gutter m-bot-0 inline-block">

                            <div class="portfolio-item col-md-4" ng-repeat="(pdIndex,pd) in resultmodel.provider_detail">
							   <div class="thumb">
<!--<img src="img/twb/wedding_venue1.jpg" alt="">-->
                                    <div class="portfolio">
                                       <div class="price-col wow fadeInLeft">
											<div class="portfolio-description" > 
												<ul style='text-align:left;' >	
												
													<li> <h1 style='color:#f400a1;text-align:left;' class='well well-sm' ><b>  {{resultmodel.provider.name}} </b> </h1>
                              </li>					<div class="duration"></div>
                                           		 	  <li> <img src="uploads/{{pd.img}}" class="editimg" alt=""></li>
			</li>
                                           		 	  <li>{{resultmodel.provider.email}}</li>
													  <li>{{resultmodel.provider.websiteurl}}</li>
													 		<li ng-if="pd.providerid!=''"  >
															<span ng-repeat="serv in services | filter:{id:pd.providerid}:true" >{{serv.type}}</span>
															</li>
															<li ng-if="pd.capacity!=''">
															 <div entity = "capacityoptions" ng-model="capacityoptions" fetch-data><span ng-repeat="data in capacityoptions|filter:{id:pd.capacity}:true">{{data.value}}</span></div>
							     
															</li>
															<li ng-if="pd.location!=''">
															<div entity = "location" ng-model="location" fetch-data><span ng-repeat="data in location|filter:{id:pd.location}:true">{{data.value}}</span></div>
															</li>
															<li ng-if="pd.area!=''">{{pd.area}}</li>
															<li ng-if="pd.uom!=''"> {{pd.uom}}<li>
															<li ng-if="pd.cost!=''">{{pd.cost}}</li>
													
															<li><button ng-click="addtocart(pd,pdIndex)" >
																<span ng-if="!pd.label">Add</span>
																<span ng-if="pd.label!=''">{{pd.label}}</span>
																</button>
															 </li>
															 </ul>
											</div>
											</div>
                                    </div>
                                </div>
                            </div>
<div ng-if="resultmodel.length==0">
<h3 style="text-align:center;">
<div class="cart-img">
<img title="" data-toggle="popover" data-trigger="hover" data-content="No data found" src="img/error-avatar.png" alt="" data-original-title="Indicator">
</div>

No records found</h3></div>
                           


                        </div>
						</div>
						<div class="col-md-4" ng-if="cart.length!='' || cart.length!=0">
						<div class="portfolio portfolio-gallery gutter m-bot-0 inline-block">
						  <div class="portfolio-item" >
						  <div class="portfolio">
                                       <div class="price-col wow fadeInLeft">
											<div class="portfolio-description" > 
						        <div class="thumb">
                                  <div >
                                    <h1 style='color:green;text-align:left;' class='well well-sm' ><b> My Budget </b> </h1>
                                    <div class="p-value">
                                    <div class="dollar">
                                       <p>Total: {{totalcost}}</p>   <span>&nbsp; KSHS </span>
                                    </div>
                                    <div class="duration">                                   
                                    </div>
                                </div>
								<table class="table table-bordered table-primary table-striped">
								<tr>
								<th>Vendor</th>
								<th>Type</th>
								<th>Cost</th>
								</tr>
                                <tr style='text-align:left;'  ng-repeat="items in cart">
								<td entity = "services" ng-model="services" fetch-data><span ng-repeat="data in services|filter:{id:items.providerid}:true">{{data.type}}</span></td>
				<!--Venue-->    <td  ng-if="items.providerid=='5'" entity="venuetype" ng-model="venuetype" fetch-data><span ng-repeat="data in venuetype|filter:{id:items.type}:true">{{data.value}}</span></td>
				<!--Flowers--> <td ng-if="items.providerid=='3'" entity="flowers" ng-model="flowers" fetch-data><span ng-repeat="data in flowers|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--Tents--><td ng-if="items.providerid=='7'" entity="tents" ng-model="tents" fetch-data><span ng-repeat="data in tents|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--cake--><td ng-if="items.providerid=='2'" entity="caketype" ng-model="caketype" fetch-data><span ng-repeat="data in caketype|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--entmainent--><td ng-if="items.providerid=='10'" entity="entertainment" ng-model="entertainment" fetch-data><span ng-repeat="data in entertainment|filter:{id:items.type}:true">{{data.value}}</span></td>
																
								<td>{{items.cost}}</td>
                                    
                                </tr>
								</table>
                                
                            </div>
                        
									
									
									
									
									</div>
                                </div>
                            </div>
								
							</div>
							</div>
							
							
                    </div>
                </div>
            </div>
            <!--portfolio-->
		
