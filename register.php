<?php
session_start();
?>



            <div class="page-content" ng-controller="listCtrl">

                <div class="container">
                    <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> Register  </h3>
                        <div class="half-txt p-top-30">Helps us keep trac of your account </div>
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


     <div class="row">
	   <h4></h4>
	   
	     <div class="col-lg-6 wow fadeInUp delay-06s">
          <div class="form">
		  
      image needed for register
		 </div>
        </div>
	   
	   
	   
	  <div class="col-lg-6 wow fadeInUp delay-06s">
          <div class="form">
		  
         <div> Company name </div>
		 <div class="form-group">
		 <input ng-model="registermodel.account.id"   ng-init="registermodel.credentials.account.id=''" type="hidden" name="id">
		 <input class="form-control" ng-model="registermodel.credentials.account.name"  type="text" name="" placeholder="Your Company name *" ></div>
         <div> Email</div><div class="form-group">  <input  class="form-control" ng-model="registermodel.credentials.account.email" type="text" name="" placeholder="Your E-mail *"></div>
         <div> Password</div><div class="form-group">  <input  class="form-control" ng-model="registermodel.credentials.account.password" type="password" name="" placeholder="Your Password *"></div>
         <div> Repeat Password</div><div class="form-group">  <input  class="form-control" ng-model="registermodel.pwdcheck.rptpwd" type="password"   name="" placeholder="Repeat Your Password *"></div>
		 <div class="form-group full-width">
		 <button type="submit" class="btn btn-small btn-dark-solid "  ng-click="register(registermodel)" >
                                                Register 
               </button>
		 
		  
		
		 </div>
        </div>
		
		 
		
      </div>
    </section>
  </div>
</section>
