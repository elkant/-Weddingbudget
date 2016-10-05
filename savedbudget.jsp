<style>
.portlet-title{
	 display: inline-block;
    font-size: 18px;
    font-weight: 400;
     padding-bottom: 0px0px;
	margin: 0 0 0 0; 
	border-bottom: 1px solid #eee;
  
}

.ngdialog.ngdialog-theme-default .ngdialog-content{background: #fff; width:95%;}
</style>








<div> 
                        <section class="normal-tabs line-tab">
                           
           <div class="portlet-title col-lg-12">
						   <div class="panel-title">
                               <a>  
							   
							   
							   <h3 class="modal-title" style="text-align:center;color:#FF7FF7;">Saved Budget list </h3>
							  
								</a>
								<!--
                                <li class="">
                                    <a data-toggle="tab" onclick='showlogin();' href="#tab-register">Register</a>
                                </li>
-->
                            </div>
						</div>
						<div class="portlet-body">
                           
                                <div class="tab-content">
                                    <div id="tab-login" class="tab-pane active">
                                        <div >
                                            <div class=" btn-rounded">
                                                <form >

                                                  <div class="panel-body">
												 
				
				<div class="col-lg-10">
			
					<table  class="table table-bordered table-primary table-striped" >
					<tr>
						<td class="lblr">Name</td>
					<td class="lblr">Vendor</td>
				
					<td class="lblr">Type</td>
					<td class="lblr">Cost</td>
					
					</tr>
						<tr  ng-repeat="sb in savedBudget.saved" >
							
							<td>{{sb.name}}</td>							
							<td entity = "services" ng-model="services" fetch-data><span ng-repeat="data in services|filter:{id:sb.providerid}:true">{{data.type}}</span></td>
							<td  ng-if="sb.providerid=='5'" entity="venuetype" ng-model="venuetype" fetch-data><span ng-repeat="data in venuetype|filter:{id:sb.type}:true">{{data.value}}</span></td>
							<td ng-if="sb.providerid=='3'" entity="flowers" ng-model="flowers" fetch-data><span ng-repeat="data in flowers|filter:{id:sb.type}:true">{{data.value}}</span></td>
							<td ng-if="sb.providerid=='7'" entity="tents" ng-model="tents" fetch-data><span ng-repeat="data in tents|filter:{id:sb.type}:true">{{data.value}}</span></td>
							<td ng-if="sb.providerid=='2'" entity="caketype" ng-model="caketype" fetch-data><span ng-repeat="data in caketype|filter:{id:sb.type}:true">{{data.value}}</span></td>
							<td ng-if="sb.providerid=='10'" entity="entertainment" ng-model="entertainment" fetch-data><span ng-repeat="data in entertainment|filter:{id:sb.type}:true">{{data.value}}</span></td>
							<td ng-if="sb.type=='' || sb.type==' '" ></td>
							<td>{{sb.cost}}</td>
						</tr>	
					
					</table>
				</div>
						

                                        </div>
                                    </div>
									
									</div>
                                </div>
								<div style="text-align:center;"><button type="button" class="btn btn-default" data-ng-click="closeThisDialog()">
																		Cancel
																	</button></div>
                            </div>
							</div>
                        </section>
</div>