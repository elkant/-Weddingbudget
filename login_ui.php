

                        <section class="normal-tabs line-tab">
                           

						   <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" onclick='showlogin();' href="#tab-login">Login</a>
                                </li>
								<!--
                                <li class="">
                                    <a data-toggle="tab" onclick='showlogin();' href="#tab-register">Register</a>
                                </li>
-->
                            </ul>
							
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="tab-login" class="tab-pane active">
                                        <div class="login register ">
                                            <div class=" btn-rounded">
                                                <form >
<!--<input class="input-text" type="text" ng-model="auth.email"  name="" value="Username *" ></li>
	    <li><input class="input-text" type="text" name="" ng-model="auth.pwd" value="Password *"></li>
        <li><input class="input-btn animated wow flipInY delay-08s" type="submit" ng-click="login(auth)"  value="Login"></li></ul>
      </nav>-->
                                                    <div class="form-group">
                                                        <input type="text"   ng-model="auth.email" name="username" id='username' onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue" value="" class="form-control" placeholder="Login ID">
                                                    </div>

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
                                    </div>
									<!--
                                    <div id="tab-register" class="tab-pane">
                                        <form class=" login" action="#" method="post">

                                            <div class="form-group">
                                                <input type="text"  class="form-control" placeholder="Name">
                                            </div>

                                            <div class="form-group">
                                                <input type="text"  class="form-control" placeholder="Email">
                                            </div>

                                            <div class="form-group">
                                                <input type="text"  class="form-control" placeholder="User Name">
                                            </div>

                                            <div class="form-group">
                                                <input type="text"  class="form-control" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <input type="password"  class="form-control" placeholder="Choose Password">
                                            </div>

                                            <div class="form-group">
                                                <input type="password"  class="form-control" placeholder="Confirm Password">
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-small btn-dark-solid full-width " id="login-form-submit"
                                                        name="login-form-submit" value="login">Register
                                                </button>
                                            </div>

                                        </form>
                                    </div>
									-->
									
                                </div>
                            </div>
                        </section>
