<?php   ?>
                   
						
						
                        <!--mega menu start-->
						<!-- filter items based on session -->
						<!-- The topofpage scrolls one to the top of the page for focus on the angular template-->
						
						
                        <ul class="menuzord-menu pull-left  light" >
                            <li class="active">
                                <a onclick='topofpage();' href="index.php">Home</a>
                            </li>
							<li  class="">
                                <a onclick='topofpage();' href="#/budget">Budget</a>
                            </li>
                            <li  class="">
                                <a onclick='topofpage();' href="#/register">Register</a>
                            </li>
							<li><a onclick='topofpage();' href="#/contactus">Contact Us </a></li>
							<li ng-if="<?php echo $_SESSION['type']=='provider'?>"><a href="#/providers">Providers  </a></li>
							<li ng-if="<?php echo $_SESSION['type']=='provider'?>"><a href="#/edit">Edit Provider </a></li>
          <!-- <li><a onclick='topofpage();' href="#/search">Search </a></li>-->
                        </ul>
				
				
                        <!--mega menu end-->
						
						
		  
		  
		  