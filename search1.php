<!--portfolio-->
<div class="smallbg">
            <div class="page-content p-bot-0" id="portfolio">
                <div class="container-fluid">

                    <div class="row">
                         <div class="text-center">
                            <ul class="portfolio-filter">
                                <li style="margin-right:2%" >
								        <select class="form-control"  id="id{{$index+1}}"  ng-init="getSelectData('services');"  data-ng-model="searchmodel.category" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue">
										<option value="">Choose a provider </option>	
										<option ng-repeat="ptype in services" value ="{{ptype.id}}">{{ptype.type}}</option>       
										</select>
										
								</li>
                                <li style="margin-right:2%"> <input style="box-shadow: none;border: 1px solid #e5e5e5; border-radius: 3px;width:100%;height:34px; " data-ng-model="searchmodel.cost" type="text" name="" placeholder="Cost "></li>
                                <li style="margin-right:2%"><button class="btn btn-small btn-dark-solid "  ng-click="search(searchmodel)" >Search </button></li>
                                <li  ng-if="savedBudget.length !=0 && savedBudget.length !='' "style="margin-right:2%"><button class="btn btn-small btn-dark-solid "  ng-click="showSaved(x)" >Show Budget </button></li>

                            </ul>
                        </div>
						<div class="col-md-12">
					<div class="col-md-9">
					
					<div class="portfolio  portfolio-gallery gutter m-bot-0 inline-block">
				
							   <div class="table-responsive">
					<table class="price-col col-md-9 table table-bordered table-condensed table-primary table-striped" style="background-color:rgba(204, 0, 153,0.9); opacity:.9;   font-family:Arial; font-size: 16px; line-height: 1.428571429; color: black;
					" >
					<!--<tr><td>{{x}}</td></tr>
					<tr ng-repeat="n in x.saved"><td>{{n.id}}</td></tr>-->
					
					<tr ng-repeat="(pdIndex,pd) in resultmodel.provider" >
														<td><b>  {{pd.name}} </b> </td>
                                                        <td> <img src="uploads/{{pd.img}}" class="editimg" alt=""></td>
			                                            <td>{{pd.email}}</td>
													    <td>{{pd.websiteurl}}</ts>
													 		<td ng-if="pd.providerid!=''"  >
															<span ng-repeat="serv in services | filter:{id:pd.providerid}:true" >{{serv.type}}</span>
															</td>
															<td ng-if="pd.capacity!=''">
															 <div entity = "capacityoptions" ng-model="capacityoptions" fetch-data><span ng-repeat="data in capacityoptions|filter:{id:pd.capacity}:true">{{data.value}}</span></div>
							     
															</td>
															<td ng-if="pd.location!=''">
															<div ng-if="pd.location!=''" entity = "location" ng-model="location" fetch-data><span ng-repeat="data in location|filter:{id:pd.location}:true">{{data.value}}</span></div>
															</td>
															<td ng-if="pd.area!=''">{{pd.area}}</td>
															<td ng-if="pd.uom!=''"> {{pd.uom}}<td>
															<td ng-if="pd.cost!=''">{{pd.cost}}</td>
													
															<td><button ng-click="addtocart(pd,pdIndex)" >
																<span ng-if="!pd.label">Add</span>
																<span ng-if="pd.label!=''">{{pd.label}}</span>
																</button>
															 </td>
															 </tr>
					</table>
					
					</div></div>
					
					
                     <!--   <div class="portfolio  portfolio-gallery gutter m-bot-0 inline-block col-md-8">
						<div class="portfolio-item col-md-4" ng-repeat="(pdIndex,pd) in resultmodel.provider" style="height:500px;">
							   <div class="thumb">
<!--<img src="img/twb/wedding_venue1.jpg" alt="">-->
                                   <!-- <div class="portfolio">
                                       <div class="price-col wow fadeInLeft">
											<div class="portfolio-description" > 
											
											
												<ul style='text-align:left;' >	
												
													<li> <h1 style='color:#f400a1;text-align:left;' class='well well-sm' ><b>  {{pd.name}} </b> </h1>
                                                     </li>	
													  <li> <img src="uploads/{{pd.img}}" class="editimg" alt=""></li>
			                                           </li>
                                           		 	  <li>{{pd.email}}</li>
													  <li>{{pd.websiteurl}}</li>
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
                            </div> -->
<div  ng-if="resultmodel.length==0" class="price-col">
<h3 style="text-align:center;">
<div class="cart-img">
<img title="" data-toggle="popover" data-trigger="hover" data-content="No data found" src="img/error-avatar.png" alt="" data-original-title="Indicator">
</div>

No records found</h3></div>
                           


                        </div>
					
						<div class="col-md-3" ng-if="cart.length!='' || cart.length!=0">
						<div class=" portfolio-gallery gutter m-bot-0 inline-block">
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
									<button type="submit" ng-click="saveToLocal(cart)">	Save Budget</button>										
                                    </div>
						
									
                                </div>
								<table class="table table-condensed borderless">
								<tr>
								<th>Vendor</th>
								<th>Type</th>
								<th>Cost</th>
								</tr>
                                <tr style='text-align:left;'  ng-repeat="(itemsIndex,items) in cart">
								
								<td entity = "services" ng-model="services" fetch-data><span ng-repeat="data in services|filter:{id:items.providerid}:true">{{data.type}}</span></td>
				<!--Venue-->    <td  ng-if="items.providerid=='5'" entity="venuetype" ng-model="venuetype" fetch-data><span ng-repeat="data in venuetype|filter:{id:items.type}:true">{{data.value}}</span></td>
				<!--Flowers--> <td ng-if="items.providerid=='3'" entity="flowers" ng-model="flowers" fetch-data><span ng-repeat="data in flowers|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--Tents--><td ng-if="items.providerid=='7'" entity="tents" ng-model="tents" fetch-data><span ng-repeat="data in tents|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--cake--><td ng-if="items.providerid=='2'" entity="caketype" ng-model="caketype" fetch-data><span ng-repeat="data in caketype|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--entmainent--><td ng-if="items.providerid=='10'" entity="entertainment" ng-model="entertainment" fetch-data><span ng-repeat="data in entertainment|filter:{id:items.type}:true">{{data.value}}</span></td>
					<!--entmainent--><td ng-if="items.type=='' || items.type==' '" ></td>
																
								<td>{{items.cost}}</td>
								
									<td><button ng-click="addtocart(items,itemsIndex)" >
															<span>-</span>
																</button>
									</td>
                                  
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
            </div>
            <!--portfolio-->
			
					<script type="text/javascript">
    $(document).ready(function() {
        welcome();
		
    });
	
	
		$(window).scroll(function(e){ 
		console.log("scrolling");
	  var $el = $('.fixedElement'); 
	  var isPositionFixed = ($el.css('position') == 'fixed');
	  if ($(this).scrollTop() > 50 && !isPositionFixed){ 
		$('.fixedElement').css({'position': 'fixed', 'top': '0px'}); 
	  }
	  if ($(this).scrollTop() < 50 && isPositionFixed)
	  {
		$('.fixedElement').css({'position': 'static', 'top': '0px'}); 
	  } 
});
	
	
function fixfooter(){
	var b=$("#footer").offset().left;
	$("#footer").css("position","absolute");
	$("#footer").css("left",b);
	$("#footer").css("bottom","0.5em");
}

function welcome(){
	
	$('.smallbg').css('background-image', 'url(../-Weddingbudget/img/background/'+getRandomIntInclusive(1, 20)+'.jpg)');
	$('.smallbg').css('background-size', 'cover');
}

function getRandomIntInclusive(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

</script>

		
