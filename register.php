<?php
session_start();
?>
<section id="work_outer"  style="background:#f56eab;"><!--main-section-start-->
 <div class="container">
    <section class="main-section " id="contact">
     <div class="row">
	   <h4>Register</h4>
	   
	     <div class="col-lg-6 wow fadeInUp delay-06s">
          <div class="form">
		  
       Regsiter to keep track of your account
		 </div>
        </div>
	   
	   
	   
	  <div class="col-lg-6 wow fadeInUp delay-06s">
          <div class="form">
		  
         <div> Company name </div>
		 <div class="form-group">
		 <input ng-model="registermodel.account.id"   ng-init="registermodel.account.id=''" type="hidden" name="id">
		 <input class="form-control" ng-model="registermodel.account.name"  type="text" name="" placeholder="Your Company name *" ></div>
         <div> Email</div><div class="form-group">  <input  class="form-control"" ng-model="registermodel.account.email" type="text" name="" placeholder="Your E-mail *"></div>
         <div> Password</div><div class="form-group">  <input  class="form-control" ng-model="registermodel.account.password" type="password" name="" placeholder="Your Password *"></div>
         <div> Repeat Password</div><div class="form-group">  <input  class="form-control" type="password" name="" placeholder="Repeat Your Password *"></div>
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
