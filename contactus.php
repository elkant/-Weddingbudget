
            <!--contact-->
            <div class="parallax-inner dark parallax-15"  id="contact">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown">
                                    <i class="icon-map light-txt"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="light-txt">location</h4>
                                </div>
                                <div class="desc light-txt">
                                    Upper Level, Overseas Passenger <br/>
                                    Terminal, The Rocks, Sydney 2000
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown">
                                    <i class="icon-mobile light-txt"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="light-txt">call us</h4>
                                </div>
                                <div class="desc light-txt">
                                    Any time. We are open 24/7 <br/>
                                    +1 2345-67-89000
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="featured-item text-center">
                                <div class="icon wow bounceInDown">
                                    <i class="icon-envelope light-txt"></i>
                                </div>
                                <div class="title text-uppercase">
                                    <h4 class="light-txt">mail us</h4>
                                </div>
                                <div class="desc light-txt">
                                    get support via email <br/>
                                    <a class="__cf_email__" href="cdn-cgi/l/email-protection.html" data-cfemail="375a565e5b775a5644445e4152435f525a521954585a">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">

                <div class="container">

                    <div class="heading-title  text-center ">
                        <h3 class="text-uppercase"> drop us a line</h3>
                        <div class="half-txt p-top-30">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore</div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                          <!--  <form method="post" action="#" id="form" role="form" class="contact-comments">-->

                                <div class="row">

                                    <div class="col-md-6 ">

                                        <div class="form-group">
                                            <!-- Name -->
                                            <input type="text" name="name" ng-model="contactmodel.contactus.name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                            <input type="hidden" name="id" ng-model="contactmodel.contactus.id" ng-init="contactmodel.contactus.id=''" id="id">
                                        </div>
                                        <div class="form-group">
                                            <!-- Email -->
                                            <input type="email" name="email"  ng-model="contactmodel.contactus.email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                        </div>
                                        <div class="form-group">
                                            <!-- phone -->
                                            <input type="text" name="phone" id="phone"  ng-model="contactmodel.contactus.phoneno" class=" form-control" placeholder="Phone" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <div class="form-group">
                                            <!-- Comment -->
                                            <textarea name="text" id="text" class="cmnt-text form-control" ng-model="contactmodel.contactus.comment" placeholder="Comment" maxlength="400"></textarea>
                                        </div>
                                        <div class="form-group full-width">
                                            <button type="submit"   ng-click="register(contactmodel)" class="btn btn-small btn-dark-solid ">
                                                Send Message
                                            </button>
									  </div>
                                    </div>

                                </div>

                           <!-- </form>-->
                        </div>
                    </div>
                </div>

            </div>
            <!--contact-->

        </section>
