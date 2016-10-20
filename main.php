<?php
//session_start();
?>



            <div class="page-content" ng-controller="listCtrl">
<div>							
 <div class="">  
 <!--<div ><h4 class="text-uppercase" style="text-align:center;">  </h4></div>-->
 
                       <div class=" text-center">
                        <h3 class="text-uppercase"> Generate/Create Budget </h3>
                        <div class="half-txt p-top-30"> Are you a bride to be? groom to be? wedding planner? Helping plan a wedding? Lets help you budget for that wedding</div>
                        <div class="half-txt p-top-30"> <b>We have three great options for you. </b></br></div>
                        <div class="half-txt p-top-30"> </div>
						
						</div>
					
						<div class="col-md-12">
						<!--<ol>
						<li> Enter the budget amount of your wedding then we will break it down for you according to a priority matrix </li>
						<li>Choose a package, an estimate of what you plan to spend for you wedding  </li>
						<li>Create your own budget, add or remove providers to your budget </li>
						
						
						</ol>-->
						<div class="row ">
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
                                    <i class="icon-multiple_paper"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="">Enter your estimated budget amount</h4>
                                </div>
                                <div class="desc ">
                                    Enter the budget amount of your wedding then  <br> we will break it down for you according to a priority matrix
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
                                    <i class="icon-basic_elaboration_todolist_star"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="">Packages</h4>
                                </div>
                                <div class="desc">
                                    Choose a package, an estimate of what you plan to spend for you wedding  <br>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
                                    <i class="icon-basic_todolist_pencil"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="">How about you create your own budget</h4>
                                </div>
                                <div class="desc ">
                                   Search for a provider and add or remove providers to your budget<br>
								   Get a final cost estimate of all the providers you have selected 
                                 
                                </div>
                            </div>
                        </div>
                    </div>
						</div>
                    </div>
 <div class="divider d-border d-solid d-single text-center">
<i class="fa fa-xing"></i>
</div>
</div> 
<div class="">
<section id="work_outer">

  <div>
    <section class="main-section contact" id="contact">
	 
     <div class="row">
          <div   class="col-lg-10 col-lg-offset-1">
          <div class="form" >
 
             <div responsivetabs id="htab" class="htab">
									<ul class="resp-tabs-list">
										<li  class="resp-tab-item resp-tab-active">Generate a Budget </li>
										<li  class="resp-tab-item">Create Your Own Budget</li>
									</ul>
									<div class="resp-tabs-container">
										<div class="row">
										 
                                            <div class="col-lg-12 btn-rounded">
											<div class="form ">
                                                <div ng-include="'budget.php'"></div>
												</div>
                                            </div>
                           
                                        </div>
										
										 <div class="row">
									  
	
          <div class="form">
		  
        
			   
			   <div ng-include="'search1.php'"></div>
		 
		  
		
		 </div>
        </div>
		
		 
		
      </div>
	
    </section>
  </div>
											
											
										</div>
									
										
								   </div>
							</div>
 
 
 

  
</section>

