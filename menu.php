<?php   ?>
                   
						
						
                        <!--mega menu start-->
						<!-- filter items based on session -->
						<!-- The topofpage scrolls one to the top of the page for focus on the angular template-->
						
						<div class='navbar  navbar-nav collapse navbar-collapse'>
                        <ul class="menuzord-menu pull-right  light " >
                            <li class="active">
                                <a onclick='topofpage();' href="index.php">Home</a>
                            </li>
							<li  class="">
                                <a onclick='topofpage();' href="#/budget">Budget</a>
                            </li>
                            <!--<li  class="">
                                <a onclick='topofpage();' href="#login">Login</a>
                            </li> -->
							
							 <li  class="dropdown"  id='triggerlogin'>
							 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<span class="caret"></span></a>
                             <ul class="dropdown-menu" style='width:500px;padding:4px;'>
                             
							<?php include'login_ui.php'; ?>
							 
							 
                             </ul>
                              </li>
							
						
                            <li  class="">
                                <a onclick='topofpage();' href="#/register">Register</a>
                            </li>
                           
                            <!--<li  class="">
                                <a href="#service">Services</a>
                            </li> -->
                            
                           <!-- <li  class="">
                                <a href="#blog">Blog</a>
                            </li> -->
                            
                           
           <li><a href="#/contactus">Contact Us </a></li>
           <li><a href="#/providers">Providers  </a></li>
           <li><a href="#/edit">Edit Provider </a></li>
           <li><a href="#/search">Search </a></li>
                        </ul>
					</div>
				
                        <!--mega menu end-->
						
						
		  
		  
		  