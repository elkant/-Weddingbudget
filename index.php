<!DOCTYPE html>
<html lang="en" data-ng-app="app01">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="emmanuel&Maureen">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="img/twb/icon.png">

    <title>The Wedding Budget</title>


    <!--common style-->

    
<link href='http://fonts.googleapis.com/css?family=Abel|Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic,900,900italic,200italic,200' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/shortcodes/shortcodes.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/stylea87f.css?4" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/style-responsivec4ca.css?1" rel="stylesheet">
    <link href="css/default-theme3860.css?v=1" rel="stylesheet">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="slider-revolution/css/extralayers.css" media="screen">
    <link rel="stylesheet" type="text/css" href="slider-revolution/css/settings.css" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body ng-controller="homeCtrl" >

    <!--  preloader start -->
<div id="tb-preloader">
    <div class="tb-preloader-wave"></div>
</div>
<!-- preloader end -->


<div class="wrapper" id="home">

        <!--header start-->
        <header id="header" class=" header-full-width transparent-header">

            <div class=" header-sticky semi-transparent ">

                <div class="container">
                    <nav id="massive-menu"  class="menuzord "  >

                        <!--logo start-->
                        <a href="index.html" class="logo-brand">
                            <img class="img-thumbnail" src="img/logo.png" style='position:relative;' alt=""/>
                        </a>
                        <!--logo end-->
<?php
//include codes to decide the menu to load
include 'menu.php';
?>

                    </nav>
                </div>
            </div>

        </header>
        <!--header end-->

		
		
	

        <!--body content start-->
		<div data-ng-view style='padding-top:100px;' id='maindiv'></div> <!-- This is the main div that will be used by angular -->
		
		
		<?php
//include codes to decide the menu to load
include 'slides.html';

//the slides page is joined with the portfolio
?>
		
       						
								
                            </div>
                        </div>
                        
                        
                    </div>
                    <!--feature border box end-->
                </div>
            </div>
            </div>
         
       </section>


        <!--body content end-->

        <!--footer 1 start -->
        <footer id="footer" class="gray text-center footer-1">
            <div class="container">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
                <a href="index.html" style='text-align:center;' class="footer-logo wow zoomIn">
                    <img class="retina img-responsive col-xs-12"   src="img/logo.png" alt="" />
                </a>
				</div>
            <div class="col-xs-2"></div>   
                <div class="social-link circle m-top-80 m-bot-80" >
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
                <div class="copyright">
                    &copy; The wedding Budget.
                </div>
                <div class="copyright-sub-title text-uppercase">
                   
                </div>
            </div>
        </footer>
        <!--footer 1 end-->
    </div>


    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menuzord.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.isotope.js"></script>
    <script src="js/imagesloadedc81e.js?2"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/visible.js"></script>
    <script src="js/smooth.js"></script>
    <script src="js/wow.min.js"></script>
	
	<!--jss from mo-->
<script type="text/javascript" src="js/angular.js"></script>
<script type="text/javascript" src="js/angular-route.js"></script>
<script type="text/javascript" src="js/angular-sanitize.min.js"></script>
<script type="text/javascript" src="js/angular-resource.min.js"></script>
<script  type="text/javascript" src="js/app01/app01.js"></script>
<!--<script  type="text/javascript" src="js/app01/app02.js"></script>-->
<script src="js/php_crud_api_transform.js"></script>
  <script src="js/ng-file-upload.js"></script>
   <script src="js/ng-file-upload-shim.js"></script>
      <script src="js/app01/uploadtry.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="slider-revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="slider-revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script src="js/imagesloaded.js"></script>

    <!-- only for single page nav -->
    <script src="js/jquery.nav.js"></script>
    
    <!--common scripts-->
    <script src="js/scriptsc9f0.js?8"></script>

    <!-- SLIDER REVOLUTION INIT  -->
    <script type="text/javascript">

        jQuery(document).ready(function() {

            jQuery('.tp-banner').show().revolution(
                    {
                        dottedOverlay:"none",
                        delay:7000,
                        // startwidth:1170,
                        // startheight:700,
                        hideThumbs:200,

                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:5,

                        navigationType:"bullet",
                        navigationArrows:"solo",
                        navigationStyle:"preview4",

                        touchenabled:"on",
                        onHoverStop:"on",

                        swipe_velocity: 0.7,
                        swipe_min_touches: 1,
                        swipe_max_touches: 1,
                        drag_block_vertical: false,

                        parallax:"mouse",
                        parallaxBgFreeze:"on",
                        parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                        keyboardNavigation:"off",

                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:20,

                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,

                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,

                        shadow:0,
                        fullWidth:"on",
                        autoHeight:"on",
                        fullScreen:"on",

                        spinner:"spinner4",

                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,

                        shuffle:"off",

                        autoHeight:"off",
                        forceFullWidth:"off",

                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,

                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0,
                        videoJsPath:"slider-revolution/videojs/",
                        fullScreenOffsetContainer: ""
                    });

        }); //ready
    </script>

	<script>
$(function() {
	if(window.location.href.indexOf('#')< 0 || window.location.href.indexOf('#/slides') > 0){
		//angular.element(document.getElementById('homeCtrl')).scope().showbudget();
	}
});

//a function to always focus on the top of angular div 

function topofpage(){
	
	//$(window).scrollTop(200);
	$(window).scrollTop($('#maindiv').offset().top);
}

// a function to trigger the login popup
function showlogin(){	
	
	 $('#triggerlogin').click();
	 $('#triggerlogin').removeClass('dropdown').addClass('dropdown open');
	 console.log("called");
}

</script>
	
	
</body>


</html>
