
            <!--contact-->
            

          

                <div class="container">

                    <div class="heading-title  text-center " style="margin-top: 90px;">
                        <h3 class="text-uppercase">Drop us a line</h3>
                       <!-- <div class="half-txt p-top-30"></div> -->
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

           
            <!--contact-->

