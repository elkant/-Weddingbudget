<style>
.portlet-title{
	 display: inline-block;
    font-size: 18px;
    font-weight: 400;
     padding-bottom: 0px0px;
	margin: 0 0 0 0; 
	border-bottom: 1px solid #eee;
  
}

.ngdialog.ngdialog-theme-default .ngdialog-content{background: #fff;}
</style>
<div ng-controller="uploadImgCtrl">
                        <section class="normal-tabs line-tab">
                           
           <div class="portlet-title col-lg-12">
						   <div class="panel-title">
                               <a>  <h4 style="text-align: center;">
                                  Choose a Document 
                                </h4>
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
					<table class="table-condensed borderless">
						<tr>
							<td class="lblr">Attach
							</td>
							<td>
							
							<input id="fileselect" type="file" file-model="myFile"/>
							</td>
						</tr>	
					
					</table>
				</div>
						<div class="col-lg-10">                                         
									      
																
														
                                             

                                                    <div class="col-lg-12 form-group" style=" padding-top:10%;">
                                                     <div class="col-lg-6"><button type="button" class="btn btn-default"  ng-click="uploadFiles(myFile,_field)">Upload {{_field}}</button>
																		
																	</button></div>
																 <div class="col-lg-6">	<button type="button" class="btn btn-default" data-ng-click="closeThisDialog()">
																		Cancel
																	</button></div>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
									
									</div>
                                </div>
                            </div>
							</div>
                        </section>
</div>