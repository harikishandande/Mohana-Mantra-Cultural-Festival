<?php
   session_start();
   include_once('includes/connection.php');
   include_once('includes/functions.php');
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mohana Mantra | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">    
    <link href="css/prettyPhoto.css" rel="stylesheet"> 
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/sc-player-standard.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/presets/preset1.css" id="preset" rel="stylesheet" type="text/css">
	<link href="css/switcher.css" rel="stylesheet" type="text/css">
	
	<script src="modal/bootstrap.js"></script>
	<script src="modal/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="boxes/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="boxes/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="boxes/css/component.css" />
	<script src="boxes/js/snap.svg-min.js"></script>
	

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.php">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.php">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.php">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.php">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.php">

	
	 <link rel="stylesheet" type="text/css" href="spotevents/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="spotevents/css/common.css" />
        <link rel="stylesheet" type="text/css" href="spotevents/css/style7.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="spotevents/js/modernizr.custom.79639.js"></script> 
</head><!--/head-->

<body>
	<header id="navigation">      
        <div class="navbar" role="banner">
            <div class="container">
            	<div class="row">
            		<div class="col-sm-1">
            			<div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <a class="navbar-brand" href="index.php"><h1><img src="images/logo.png" alt="logo"></h1></a>
		                </div>
            		</div>
            		<div class="col-sm-11">
            			<nav class="navbar-right collapse navbar-collapse">
		                    <ul class="nav navbar-nav">                                                                     
		                        <li><a href="index.php"><b>HOME</b></a></li>
		                        <li class="dropdown"><a href="#"><b>TECHNOHOLIK</b><i class="fa fa-angle-down"></i></a>
		                        	<ul role="menu" class="sub-menu">
										<li><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">TECH TREAT</a></li>
										<li><a href="first.php?group=15">MANAGEMENT</a></li>
		                        		<li><a href="second.php?group=0&id=1">PAPER PRESENTATION</a></li>
										<li><a href="second.php?group=0&id=2">POSTER PRESENTATION</a></li>
		                        	</ul>
		                        </li>                         
		                        <li class="dropdown"><a href="#"><b>KALAKSHETRA</b><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="first.php?group=5">MUSIC</a></li>
                                        <li><a href="first.php?group=6">DANCE</a></li>
                                        <li><a href="first.php?group=7">LITERARY</a></li>
                                        <li><a href="first.php?group=8">FINE ARTS</a></li>
                                        <li><a href="first.php?group=9">THEATRE ARTS</a></li>
                                    </ul>
                                </li>
								<li class="dropdown"><a class="active"  href="#"><b>SPOT EVENTS</b><i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
                                        <li><a href="spot.php?group=11">SPOT LIGHT</a></li>
                                        <li><a href="spot.php?group=12">SPORTS</a></li>
                                        <li><a href="spot.php?group=13">LAN GAMING</a></li>
                                        <li><a href="spot.php?group=14">TREASURE HUNT</a></li>
                                    </ul>
								</li>
								<li><a href="first.php?group=10"><b>WORKSHOPS</b></a></li>
								<li ><a href="pro-temp.html"><b>PROSHOWS</b><i></i></a>
						<!--		<ul role="menu" class="sub-menu">
                                        <li><a href="pro.html">PRO NIGHT</a></li>
                                        <li><a href="band.html">BAND NIGHT</a></li>
                                        <li><a href="choreo.html">CHOREO NIGHT</a></li>
                                    </ul>
						-->		</li>
								<li><a href="sponsors.html"><b>SPONSORS</b></a></li>
							<!--	<li><a href="team.html"><b>OUR TEAM</b></a></li>  	--> 								
		                    </ul>
		                </nav>
            		</div>
            	</div> 
            </div>
        </div>
    </header> <!--/#navigation-->

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="top:50px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;"  id="myModalLabel">EVENT BOX</h4>
      </div>
      <div class="modal-body">
			<section id="grid" class="grid clearfix">
						<a href="first.php?group=1" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/2.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2>Computers</h2>
									<p>CSE,IT,CSSE</p>
								</figcaption>
							</figure>
						</a>
					
						<a href="first.php?group=2" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/2.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2>Electronics</h2>
									<p>EEE,ECE,EIE</p>
								</figcaption>
							</figure>
						</a>
					
						<a href="first.php?group=3" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/2.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2>Robotics</h2>
									<p>All Departments</p>
								</figcaption>
							</figure>
						</a>
						
						<a href="first.php?group=4" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/2.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2>Quiz</h2>
									<p>All Departments</p>
								</figcaption>
							</figure>
						</a>
			</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
	switch($_GET['group'])
	{
		case 1:
		    $heading = "Computer";
			break;
		case 2:
		    $heading = "Electronic";
			break;
		case 3:
		    $heading = "Robotic";
			break;
		case 4:
		    $heading = "Quiz";
			break;
		case 5:
		    $heading = "Music";
			break;
		case 6:
		    $heading = "Dance";
			break;
		case 7:
		    $heading = "Literary";
			break;
		case 8:
		    $heading = "Fine Art";
			break;
		case 9:
		    $heading = "Theatre Art";
			break;
		case 10:
		    $heading = "Workshop";
			break;
		case 11:
		    $heading = "Spot";
			break;
		case 12:
		    $heading = "Sport";
			break;
		case 13:
		    $heading = "LAN Gaming";
			break;
		case 14:
		    $heading = "Treasure Hunt";
			break;
	}
	
?>
    <section id="perfomars-slide">
		<div class="container">
    	<div id="latest-event-content" class="col-sm-12 bg">
                        <div class="">
							<h2 class="heading"><?php echo $heading;?> <strong>Events</strong></h2 >   
							<ul class="ch-grid">
							<?php 
							    $count =0;
								$function = new Functions;
								$functions = $function->eventone($_GET['group']);
								foreach ($functions as $function)
								{ $count++;
							?>
				<a href="second.php?id=<?php echo $function['id'];?>">
					<li>
						<div class="ch-item">				
							<div class="ch-info">
								<div class="ch-info-front ch-img-1"><img src="counter strike.png"/></div>
								<div class="ch-info-back">
									<h3><?php echo $function['event'];?></h3>
								</div>	
							</div>
						</div>
					</li>
				</a>
							
							<?php  } ?>
							</ul>
                        </div>                                       
        </div>
    </div>
	
    </section><!--/#perfomars-slide-->

<section class="sponsor-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12">    			
				
	    			<div id="sponsor-slider" class="sponsor carousel slide bg" data-ride="carousel">	    				
	    				<h2 class="heading">Event <strong>Sponsors</strong></h2>
	    				<div class="carousel-inner">
	    					<div class="item active">
	    						<div class="item-part">
	    							<div class="col-sm-4 col-xs-4">
			    						<a href="#"><img class="img-responsive" src="images/home/sponsor1.png" alt=""></a>
				    				</div>
				    				<div class="col-sm-4 col-xs-4">
				    					<a href="#"><img class="img-responsive" src="" alt=""></a>
				    				</div>
				    				<div class="col-sm-4 col-xs-4">
				    					<a href="#"><img class="img-responsive" src="" alt=""></a>
				    				</div>
	    						</div>

			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
		    				</div>
		    				<div class="item">
		    					<div class="item-part">
			    					<div class="col-sm-4 col-xs-4">
			    						<a href="#"><img class="img-responsive" src="images/home/sponsor1.png" alt=""></a>
				    				</div>
				    				<div class="col-sm-4 col-xs-4">
				    					<a href="#"><img class="img-responsive" src="" alt=""></a>
				    				</div>
				    				<div class="col-sm-4 col-xs-4">
				    					<a href="#"><img class="img-responsive" src="" alt=""></a>
				    				</div>
			    				</div>
			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
			    				<div class="col-sm-4 col-xs-4">
			    					<a href="#"><img class="img-responsive" src="" alt=""></a>
			    				</div>
		    				</div>
	    				</div>	    				
	    				<a class="sopnsor-left-control" href="#sponsor-slider" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="sopnsor-right-control" href="#sponsor-slider" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>	    				
	    			</div>
    			</div>
    		</div>
    	</div>
    </section><!--/.sponsor-section-->

   	<footer id="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="updates-links bg">
                        <div class="col-sm-6 col-md-4">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/MohanaMantraSVEI&amp;width=350&amp;height=390&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=true&amp;show_border=false&amp;appId=188185154705090" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:390px;" allowTransparency="true"></iframe>						
                                          
                        </div>
                        <div class="col-sm-6 col-md-3 col-md-offset-1">
                            <div class="quick-links">
                       <span style="margin-left:70px;"><h3><i class="fa fa-bolt"></i> QUICK CLICKS</h3>
                           <ul >
								
									<li style="margin-left:50px;margin-top:20px;"><a href="#">MM 2K12</a></li>
                                    <li style="margin-left:50px;margin-top:20px;"><a href="#">ABOUT US</a></li>
                                    <li style="margin-left:50px;margin-top:20px;"><a href="#">CONTACT US</a></li>
                                    <li style="margin-left:50px;margin-top:20px;"><a href="#">OUR TEAM</a></li>
									
                                </ul>
						</span>		
                                <div class="social-link">
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>                          
                        </div>
                        <div class="col-sm-12 col-md-4">
							<a class="twitter-timeline" href="https://twitter.com/MohanaMantra14" data-widget-id="512827352749842432">Tweets by @MohanaMantra14</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>
                    <div class="footer text-center bg">
                        developed by <a href="http://www.codingworld.in">Coding World</a> </p> 
                    </div><!--/#footer-->
                </div>                
            </div>
        </div>    
    </footer><!--/#footer-widget-->

   
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/sc-player.js"></script> 
    <script type="text/javascript" src="js/soundcloud.player.api.js"></script> 
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
   	<script type="text/javascript" src="js/jquery.flexslider.js"></script>
   	<script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
   	<script type="text/javascript" src="js/switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(window).load(function() {
				// The slider being synced must be initialized first
				$('#carousel').flexslider({
					animation: "slide",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					itemWidth: 41,
					itemMargin: 0,
					asNavFor: '#slider'
				});

				$('#slider').flexslider({
					directionNav: false,
					animation: "fade",
					controlNav: false,
					animationLoop: false,
					slideshow: false,
					sync: "#carousel"
				});
			});
		});
		
	</script>
	<script>
			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
		
		<script>
			$('#myTab a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
		</script>
</body>

</html>