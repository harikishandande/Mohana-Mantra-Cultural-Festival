<?php
   session_start();
   include_once('includes/connection.php');
   include_once('smtp/db.php');
   include_once('includes/functions.php');
   
   if(isset($_POST['submit']))
   {
		$name = $_POST['name'];
		$roll_no = $_POST['roll_no'];
		$course = $_POST['course'];
		$branch = $_POST['branch'];
		$college = $_POST['college'];
		$state = $_POST['state'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
	
		$email=mysqli_real_escape_string($connection,$_POST['email']); 

		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

		if(preg_match($regex, $email))
		{  
			$activation=md5($email.time()); // Encrypted email+timestamp

			$count=mysqli_query($connection,"SELECT id FROM register WHERE email = '$email'");
			if(mysqli_num_rows($count) < 1)
			{
				mysqli_query($connection,"INSERT INTO register(name,roll_no,course,branch,college,state,phone,email,activation) VALUES('$name','$roll_no','$course','$branch','$college','$state','$phone','$email','$activation');");

				include 'smtp/Send_Mail.php';
				$to=$email;
				$subject="Mohana Mantra Email verification";
				$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
				Send_Mail($to,$subject,$body);

				$msg= "Registration successful, please activate email.";	

			}
			else
			{
				$msg= '<font color="#cc0000">The email is already taken, please try new.</font>';	
			}
		}
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mohana Mantra | MM 2k13</title>
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
	
<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com

var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 
</script>
    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.php">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.php">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.php">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.php">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.php">
	
	
	<link rel='stylesheet' id='captionpro_scrtipscss-css'  href='css/captionstyle.css' type='text/css' media='all' />
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">
	<link rel="stylesheet" href="css/screen.css">
	<link rel="stylesheet" href="css/lightbox.css">

  <style type="text/css" title="dynamic-css" class="options-output">
	
	.alignnone
	{
		margin:15px;
	}
	
    .cappro p{
      line-height:20px;
      font-weight:500;
      color:#fff;
      font-size:18px;
    }.cappro-wrapper figure{
      border-top:5px solid #dddddd;
      border-bottom:5px solid #dddddd;
      border-left:5px solid #dddddd;
      border-right:5px solid #dddddd;
    }.cappro-wrapper figure{
      margin-top:1;
      margin-right:2;
      margin-bottom:3;
      margin-left:4;
    }
  </style>
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
					<!--		<li class="dropdown"><a href="#"><b>SPOT EVENTS</b><i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
                                        <li><a href="first.php?group=11">SPOT LIGHT</a></li>
                                        <li><a href="first.php?group=12">SPORTS</a></li>
                                        <li><a href="first.php?group=13">LAN GAMING</a></li>
                                        <li><a href="first.php?group=14">TREASURE HUNT</a></li>
                                    </ul>
								</li>
					-->			<li><a href="first.php?group=10"><b>WORKSHOPS</b></a></li>
								<li ><a href="pro-temp.php"><b>PROSHOWS</b><i></i></a>
						<!--		<ul role="menu" class="sub-menu">
                                        <li><a href="pro.html">PRO NIGHT</a></li>
                                        <li><a href="band.html">BAND NIGHT</a></li>
                                        <li><a href="choreo.html">CHOREO NIGHT</a></li>
                                    </ul>
						-->		</li>
								<li><a href="sponsors.php"><b>SPONSORS</b></a></li>
								<li><a href="connect.php"><b>CONNECT</b></a></li>
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
								<img src="boxes/img/1.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2><b>Computers</b></h2>
									<p>CSE,IT,CSSE</p>
								</figcaption>
							</figure>
						</a>
					
						<a href="first.php?group=2" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/2.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2><b>Electronics</b></h2>
									<p>EEE,ECE,EIE</p>
								</figcaption>
							</figure>
						</a>
					
						<a href="first.php?group=3" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/3.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2><b>Robotics</b></h2>
									<p>All Departments</p>
								</figcaption>
							</figure>
						</a>
						
						<a href="first.php?group=4" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
								<img src="boxes/img/4.png" />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2><b>Quiz</b></h2>
									<p>All Departments</p>
								</figcaption>
							</figure>
						</a>
			</section>
      </div>
    </div>
  </div>
</div>
    
 <div id="pricing-table" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<h2 class="heading" style="float:left;">&nbsp;&nbsp;<strong style="color:#DC3515">M</strong>ohana <strong style="color:#DC3515">M</strong>antra 2<strong style="color:#DC3515">K</strong>13 <strong>GALLERY</strong></h2 >	
			</div>
			<div id="latest-event-content" class="row">
				<div class="image-row">
					<div class="image-set" style="align:center;">
						<div class="col-sm-4 col-xs-4">
							<a class="example-image-link" href="mm2k13_gallery/1.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/1 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4">
							<a class="example-image-link" href="mm2k13_gallery/2.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/2 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4">
							<a class="example-image-link" href="mm2k13_gallery/3.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/3 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/4.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/4 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/5.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/5 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/6.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/6 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/7.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/7 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/8.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/8 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/9.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/9 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/10.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/10 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/11.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/11 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/12.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/12 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/22.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/22 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/23.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/23 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/15.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/15 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/16.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/16 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/17.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/17 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/18.JPG" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="mm2k13_gallery/18 - Copy.JPG" alt="" /></a>
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/19.JPG" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="mm2k13_gallery/19 - Copy.JPG" alt=""/></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
							<a class="example-image-link" href="mm2k13_gallery/20.JPG" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="mm2k13_gallery/20 - Copy.JPG" alt="" /></a>
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						<div class="col-sm-4 col-xs-4" style="margin-top:50px;">
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:-250px;">
						</div>
						<div class="col-sm-4 col-xs-4" style="margin-top:-100px;">
						</div>
					</div>
				</div>
				<div class="image-row" >
					<div class="image-set" >
						
					</div>
				</div>
			</div>
    	</div>	
    </div><!--/#contact-page-->

 <?php include_once('sponsor_bottom.php'); ?>
 
 <?php include_once('footer.php'); ?>
 
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.js"></script>

	<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2196019-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>

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