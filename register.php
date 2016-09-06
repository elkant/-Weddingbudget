<?php
session_start();
?>



            <div class="page-content" ng-controller="listCtrl">

                        <div class="col-md-10 col-md-offset-1">
                           <!-- <form method="post" action="#" id="form" role="form" class="contact-comments-->
							
 <div class="col-lg-12">  <div >
                        <h3 class="text-uppercase" style="text-align:center;"> Register  </h3>
                        
  </div> 
</div> 
            

										  <div class="col-md-6">
										<section id="work_outer"><!--main-section-start-->

  <div class="container">
    <section class="main-section contact" id="contact">
	 
     <div class="row">
          <div  >
          <div class="form" >
 
             <div responsivetabs id="htab" class="htab">
									<ul class="resp-tabs-list">
										<li  class="resp-tab-item resp-tab-active">Login </li>
										<li  class="resp-tab-item">Register</li>
									</ul>
									<div class="resp-tabs-container">
										<div class="row">
										 <div class="col-lg-3 wow fadeInUp delay-06s">
										  <div class="form">
										  
										<img class="img img-responsive" src="img/bdsilhouette.jpg" alt=""> 
									   
										 </div>
										</div>
                                            <div class="col-lg-6 btn-rounded">
											<div class="form">
                                                <form class="">
												 <div>Email </div>
                                                    <div class="form-group">
                                                        <input type="text"   ng-model="auth.email" name="username" id='username' onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue" value="" class="form-control" placeholder="Login ID">
                                                    </div>
												<div>Password </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" ng-model="auth.pwd" id='password' onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue" value="" class="form-control " placeholder="Password">
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-small btn-dark-solid full-width"  ng-click="login(auth)"  value="login">Login
                                                        </button>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="checkbox" value="remember-me" id="checkbox1"> <label for="checkbox1">Remember me</label>
                                                        <a class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                                                    </div>

                                                </form>
												</div>
                                            </div>
                            <div class="col-lg-3 wow fadeInUp delay-06s">
										  <div class="form">
										  
										<img class="img img-responsive" src="img/logins.jpg" alt=""> 
									   
										 </div>
										</div>
                                        </div>
										
										 <div class="row">
									   <h4></h4>
									   
										 <div class="col-lg-6 wow fadeInUp delay-06s">
										  <div class="form">
										  
										<img class="img img-responsive" src="img/silhouette.jpg" alt=""> 
									   
										 </div>
										</div>
	   
	   
	   
	  <div class="col-lg-6 wow fadeInUp delay-06s">
	
          <div class="form">
		  
         <div> Company name </div>
		 <div class="form-group">
		 <input ng-model="registermodel.account.id"   ng-init="registermodel.credentials.account.id=''" type="hidden" name="id">
		 <input class="form-control" ng-model="registermodel.credentials.account.name"  type="text" name="" placeholder="Your Company name *" ></div>
         <div> Email</div><div class="form-group">  <input  class="form-control" ng-model="registermodel.credentials.account.email" type="text" name="" placeholder="Your E-mail *"></div>
         <div> Type</div><div class="form-group">  
		 <select  class="form-control" ng-model="registermodel.credentials.account.type" >
		 <option></option>
		 <option value="user">User</option>
		 <option value="provider">Provider/Vendor</option>
		 </select></div>
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
											
											
										</div>
									
										
								   </div>
							</div>
 
 
 

  
</section>
