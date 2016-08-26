<!--portfolio-->
            <div class="page-content p-bot-0" id="portfolio">
                <div class="container-fluid">

                    <div class="row">
                         <div class="text-center">
                            <ul class="portfolio-filter">
                                <li >
								        <select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('services');"  data-ng-model="searchmodel.category" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
										<option value="">Choose a provider</option>	
										<option ng-repeat="ptype in services " value ="{{ptype.id}}">{{ptype.type}}</option>       
										</select>
										
								</li>
                                <li> <input  class="form-control" data-ng-model="searchmodel.cost" type="text" name="" placeholder="Cost "></li>
                                <li><button class="btn btn-small btn-dark-solid "  ng-click="search(searchmodel)" >Search </button></li>

                            </ul>
                        </div>
					<div class="col-md-8">
                        <div class="portfolio  portfolio-gallery gutter m-bot-0 inline-block">

                            <div class="portfolio-item col-md-4" ng-repeat="(pdIndex,pd) in resultmodel.provider_detail">
							   <div class="thumb">
<!--<img src="img/twb/wedding_venue1.jpg" alt="">-->
                                    <div class="portfolio">
                                        <div class="col-md-2">
                                           <!-- <a href="img/twb/wedding_venue1.jpg" class="popup-gallery" title="Title 5"> <i class="icon-basic_magnifier"></i>  </a>
                                          -->
										</div>
										 <div class="price-col wow fadeInLeft">
                                        <div class="portfolio-description" > 
												<ul style='text-align:left;' >	
												
													<li> <h1 style='color:#f400a1;text-align:left;' class='well well-sm' ><b>  {{resultmodel.provider.name}} </b> </h1>
                              </li>					<div class="duration"></div>
                                           		 	  <li>{{resultmodel.provider.email}}</li>
													  <li>{{resultmodel.provider.websiteurl}}</li>
													 		<li ng-if="pd.providerid!=''">{{pd.providerid}}</li>
															<li ng-if="pd.capacity!=''">{{pd.capacity}}</li>
															<li ng-if="pd.location!=''">{{pd.location}}</li>
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

                           


                        </div>
						</div>
						<div class="col-md-4">
						<div class="portfolio portfolio-gallery gutter m-bot-0 inline-block">
						  <div class="portfolio-item" >
						        <div class="thumb">
                                    <!--<img src="img/twb/wedding_cake7.jpg" alt="">-->
									
									 <div class="price-col wow fadeInLeft">
                                <h1 style='color:green;text-align:left;' class='well well-sm' ><b> My Budget </b> </h1>
                                <div class="p-value">
                                    <div class="dollar">
                                       <p>Total: {{totalcost}}</p>   <span>&nbsp; KSHS </span>
                                    </div>
                                    <div class="duration">                                   
                                    </div>
                                </div>
                                <ul style='text-align:left;'  ng-repeat="items in cart">
                                    <li>{{items.type}}</li>
                                    <li>{{items.img}}</li>
                                    <li>{{items.cost}}</li>
                                    
                                </ul>
                                
                            </div>
                        
									
									
									
									
									</div>
                                </div>
                            </div>
								
							</div>
							</div>
							<div><p>Total: {{totalcost}}</p></div>
							
                    </div>
                </div>
            </div>
            <!--portfolio-->
		
