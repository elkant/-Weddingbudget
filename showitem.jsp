<style>
.portlet-title{
	 display: inline-block;
    font-size: 18px;
    font-weight: 400;
     padding-bottom: 0px0px;
	margin: 0 0 0 0; 
	border-bottom: 1px solid #eee;
  
}
.iconsize{ font-size: 26px;}
.ngdialog.ngdialog-theme-default .ngdialog-content{background: #fff; width:55%;}
</style>








<div> 
                        <section class="normal-tabs line-tab">
                           
           <div class="portlet-title col-lg-12">
						   <div class="panel-title">
                               <a>  
							   
							   
							   <h3 class="modal-title" style="text-align:center;color:#FF7FF7;" >{{viewitem.name}} </h3>
							  
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
												 
				
				<div class="col-lg-12">
			
						
							<div class="col-lg-4"> <img  class="img img-responsive" src="uploads/{{viewitem.img}}" class="editimg" alt=""></div>
							
							<div class="col-lg-8" style="text-align:justify;">
									

<div>
          <div class="service-list">
            <div class="service-list-col1"> <i class="icon-doc"></i> </div>
            <div class="service-list-col2">
              <p><div entity = "services" ng-model="services" fetch-data><span ng-repeat="data in services|filter:{id:viewitem.providerid}:true"><i class="iconsize icon-heart"></i>&nbsp; &nbsp; &nbsp; {{data.type}}</span></div>
							</p>
             
            </div>
          </div>
          <div class="service-list">
           
            <div class="service-list-col2">
              <p> <div  ng-if="viewitem.providerid=='5'" entity="venuetype" ng-model="venuetype" fetch-data><span ng-repeat="data in venuetype|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
				 <div ng-if="viewitem.providerid=='3'" entity="flowers" ng-model="flowers" fetch-data><span ng-repeat="data in flowers|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
				 <div ng-if="viewitem.providerid=='7'" entity="tents" ng-model="tents" fetch-data><span ng-repeat="data in tents|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
				 <div ng-if="viewitem.providerid=='2'" entity="caketype" ng-model="caketype" fetch-data><span ng-repeat="data in caketype|filter:{id:viewitem.type}:true"><i class=" iconsize icon-cap_chef"> &nbsp; &nbsp;&nbsp; &nbsp;{{data.value}}</i></span></div>
				 <div ng-if="viewitem.providerid=='10'" entity="entertainment" ng-model="entertainment" fetch-data><span ng-repeat="data in entertainment|filter:{id:viewitem.type}:true"><i class="iconsize icon-camera_video">&nbsp; &nbsp;&nbsp; &nbsp;{{data.value}}</i></span></div>
							</p>
           
            </div>
          </div>
          <div class="service-list">
          
            <div class="service-list-col2">
               <p><i class="iconsize icon-link"></i><a href="{{viewitem.websiteurl}}">&nbsp; &nbsp; {{viewitem.websiteurl}}</a></p>
             
            </div>
          </div>
          <div class="service-list">
            <div class="service-list-col1"> </div>
            <div class="service-list-col2">
              <p><i class="iconsize icon-ecommerce_money"></i> &nbsp; &nbsp; Kshs.  &nbsp;{{viewitem.cost}}</p>
           
            </div>
          </div>
        
        </div>
									
						<!--	<div entity = "services" ng-model="services" fetch-data><span ng-repeat="data in services|filter:{id:viewitem.providerid}:true">{{data.type}}</span></div>
							<div  ng-if="viewitem.providerid=='5'" entity="venuetype" ng-model="venuetype" fetch-data><span ng-repeat="data in venuetype|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
							<div ng-if="viewitem.providerid=='3'" entity="flowers" ng-model="flowers" fetch-data><span ng-repeat="data in flowers|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
							<div ng-if="viewitem.providerid=='7'" entity="tents" ng-model="tents" fetch-data><span ng-repeat="data in tents|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
							<div ng-if="viewitem.providerid=='2'" entity="caketype" ng-model="caketype" fetch-data><span ng-repeat="data in caketype|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
							<div ng-if="viewitem.providerid=='10'" entity="entertainment" ng-model="entertainment" fetch-data><span ng-repeat="data in entertainment|filter:{id:viewitem.type}:true">{{data.value}}</span></div>
							<div ng-if="viewitem.type=='' || viewitem.type==' '" ></div>
							<div>{{viewitem.websiteurl}}</div>
							<div>{{viewitem.cost}}</div>
							<div>{{viewitem.cost}}</div>-->
						</div>
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