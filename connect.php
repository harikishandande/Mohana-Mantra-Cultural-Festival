<?php
   session_start();
   include_once('includes/connection.php');
   include_once('includes/functions.php');
   
   if(isset($_POST['allotme']))
{
	$mmid = $_POST['mmid'];
	$password = $_POST['password'];
	$fromdate = $_POST['fromdate'];
	$fromtime = $_POST['fromtime'];
	$todate = $_POST['todate'];
	$totime = $_POST['totime'];
	if(empty($mmid) || empty($password) || empty($fromdate) || empty($fromtime) || empty($todate) || empty($totime))
	{
		echo "<script> alert('All fields are required !');</script>";
	}
	else
	{
		$query = $pdo -> prepare("SELECT * FROM register WHERE mmid = ? AND password= ?");
		$query->bindValue(1, $mmid);
		$query->bindValue(2, $password);
		$query->execute();
		$num = $query->rowCount();
		if($num==1)
		{	
			$query = $pdo->prepare('INSERT into hospitality(mmid,fromdate,fromtime,todate,totime)values(?,?,?,?,?)');
				$query->bindValue(1, $mmid);
				$query->bindValue(2, $fromdate);
				$query->bindValue(3, $fromtime);
				$query->bindValue(4, $todate);
				$query->bindValue(5, $totime);
				$query->execute();
			echo "<script> alert('Successfully submitted !');</script>";	
		}
		else
		{
			echo "<script> alert('Wrong credentials !');</script>";
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
    <title>Mohana Mantra | Connect With Us</title>
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
								<li><a class="active" href="connect.php"><b>CONNECT</b></a></li>								
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
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

  	<div id="about-us">
  		<div class="container">
  			<div class="bg">
  				<div class="about">
  					<h2 class="heading"><strong>HOSPITALITY</strong></h2>
  					<div class="row">  		
		  				<div class="col-sm-12">
						
		  					<div class="about-content">
		  						<h2 style="text-align:center;">Hello Guys !!</h2>
								<p style="font-size:20px;letter-spacing: 1px;line-height:35px;"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Looking to meet some fun in Mohana Mantra? Let’s begin with making a MM Id for you! To start this journey, click on the REGISTER TAB to the right!! It is your identity while connecting with us before and during the fest. With an MM Id you will be able to track your events of interest and the ones you have successfully registered with.
<br/>
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MM Id can be generated online by using our Register Tab OR on the day of the fest (All events require you to have a MM Id to REGISTER and PARTICIPATE).</p>
			  					
		  					</div>
							<ul class="nav nav-tabs" role="tablist" id="myTab">
								<li class="active"><a href="#1" role="tab" data-toggle="tab"><b style="padding-left:60px;padding-right:60px;">ACCOMMODATION</b></a></li>
								<li class=""><a href="#2" role="tab" data-toggle="tab"><b style="padding-left:60px;padding-right:60px;">PAYMENT OPTIONS</b></a></li>
								<li class=""><a href="#3" role="tab" data-toggle="tab"><b style="padding-left:60px;padding-right:60px;">BANK DETAILS</b></a></li>
								<li class=""><a href="#4" role="tab" data-toggle="tab"><b style="padding-left:60px;padding-right:60px;">TRANSPORTATION</b></a></li>
							</ul>

							<div class="tab-content ">
								<div class="tab-pane active" id="1">
									<br/>
									<div class="row">
										<div class="col-md-6">
										<ul style="font-size:16px;letter-spacing: 0px;line-height:35px;">
											<li>
												Mohana Mantra Participants will be accommodated in Vidyanikethan Hostels or in Private <span>facilities in town. Students housed in Tirupati will be provided with transport facility to and</span> <span>from the College.</span>
											</li>
											
											<li>
												Students can get help with accommodation at the Hospitality desk on campus OR prior to <span>fest by contacting us. Minimal fees for Rs.700 will be collected for 3 days. For participants</span> <span>requesting housing for less than 3 days a charge of Rs.250 per day shall be charged.</span>
											</li>
											<li>
												You are of at most importance to us. We hope to make your stay here a good experience.
											</li>
											<li>
												For Queries regarding Accommodation you can contact our Hospitality Core heads.
											</li>
										</ul>
										<dl style="font-size:20px;letter-spacing: 2px;line-height:35px;" class="dl-horizontal">
											<dt>
												Mandeep
											</dt>
											<dd>
												+91 7416365725
											</dd>
											<dt>
												Manoj
											</dt>
											<dd>
												+91 9676967205
											</dd>
											<dd>
												hospitality.mm2k14@gmail.com
											</dd>
										</dl>
										</div>
										<div class="col-md-6">
											<br/>
											<form action="connect.php" class="form-horizontal" role="form" method="POST">
												<div class="form-group">
													 <label for="inputEmail3" class="col-sm-3 control-label">MM id</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="mmid" PlaceHolder="MM id" />
													</div>
												</div>
												<div class="form-group">
													 <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" name="password" PlaceHolder="Password"/>
													</div>
												</div>
												<div class="form-group">
													<label for="inputPassword3" class="col-sm-3 control-label">Accommodation</label>
													<div class="col-sm-9">
														<div class="row">
															<div class="col-sm-6">
																<label class="control-label">From</label>
															<div class="radio">
															<label>
																<input type="radio" name="fromdate" value="30/10/2014" >
																	29/10/2014
															</label>
															</div>
															<div class="radio">
															<label>
																<input type="radio" name="fromdate" value="30/10/2014">
																	30/10/2014
															</label>
															</div>
															<div class="radio">
															  <label>
																<input type="radio" name="fromdate" value="31/10/2014">
																	31/10/2014
																</label>
															</div>
																<label class="control-label"><abbr title="Starts from 29 th Oct 2014 evening 05:00 PM">Arrival Time</abbr></label>
																<br/><br/>
																<select class="form-control" name="fromtime" >
																	<option value=""><< SELECT >></option>
																	<option value="12:00 AM">12:00 AM</option>
																	<option value="01:00 AM">01:00 AM</option>
																	<option value="02:00 AM">02:00 AM</option>
																	<option value="03:00 AM">03:00 AM</option>
																	<option value="04:00 AM">04:00 AM</option>
																	<option value="05:00 AM">05:00 AM</option>
																	<option value="06:00 AM">06:00 AM</option>
																	<option value="07:00 AM">07:00 AM</option>
																	<option value="08:00 AM">08:00 AM</option>
																	<option value="09:00 AM">09:00 AM</option>
																	<option value="10:00 AM">10:00 AM</option>
																	<option value="11:00 AM">11:00 AM</option>
																	<option value="12:00 PM">12:00 PM</option>
																	<option value="01:00 PM">01:00 PM</option>
																	<option value="02:00 PM">02:00 PM</option>
																	<option value="03:00 PM">03:00 PM</option>
																	<option value="04:00 PM">04:00 PM</option>
																	<option value="05:00 PM">05:00 PM</option>
																	<option value="06:00 PM">06:00 PM</option>
																	<option value="07:00 PM">07:00 PM</option>
																	<option value="08:00 PM">08:00 PM</option>
																	<option value="09:00 PM">09:00 PM</option>
																	<option value="10:00 PM">10:00 PM</option>
																	<option value="11:00 PM">11:00 PM</option>
																</select>
															</div>
															<div class="col-sm-6">
																<label class="control-label">To</label>
																<div class="radio">
																<label>
																	<input type="radio" name="todate" value="30/10/2014" >
																		30/10/2014
																</label>
																</div>
																<div class="radio">
																  <label>
																	<input type="radio" name="todate" value="31/10/2014">
																		31/10/2014
																	</label>
																</div>
																<div class="radio">
																  <label>
																	<input type="radio" name="todate" value="01/11/2014">
																		01/11/2014
																	</label>
																</div>
																<label class="control-label"><abbr title="Vacating ends 01 st Nov 2014 night 12:00 AM">Vacating Time</abbr></label>
																<br/><br/>
																<select class="form-control" name="totime" >
																	<option value=""><< SELECT >></option>
																	<option value="12:00 AM">12:00 AM</option>
																	<option value="01:00 AM">01:00 AM</option>
																	<option value="02:00 AM">02:00 AM</option>
																	<option value="03:00 AM">03:00 AM</option>
																	<option value="04:00 AM">04:00 AM</option>
																	<option value="05:00 AM">05:00 AM</option>
																	<option value="06:00 AM">06:00 AM</option>
																	<option value="07:00 AM">07:00 AM</option>
																	<option value="08:00 AM">08:00 AM</option>
																	<option value="09:00 AM">09:00 AM</option>
																	<option value="10:00 AM">10:00 AM</option>
																	<option value="11:00 AM">11:00 AM</option>
																	<option value="12:00 PM">12:00 PM</option>
																	<option value="01:00 PM">01:00 PM</option>
																	<option value="02:00 PM">02:00 PM</option>
																	<option value="03:00 PM">03:00 PM</option>
																	<option value="04:00 PM">04:00 PM</option>
																	<option value="05:00 PM">05:00 PM</option>
																	<option value="06:00 PM">06:00 PM</option>
																	<option value="07:00 PM">07:00 PM</option>
																	<option value="08:00 PM">08:00 PM</option>
																	<option value="09:00 PM">09:00 PM</option>
																	<option value="10:00 PM">10:00 PM</option>
																	<option value="11:00 PM">11:00 PM</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-3 col-sm-9">
														 <button type="submit" class="btn" name="allotme">ALLOT ME</button>
													</div>
												</div>
											</form>
										</div>
									</div>							
								</div>
								<div class="tab-pane" id="2">
									<br/>
									<div class="row">
										<div style="font-size:20px;letter-spacing: 0px;line-height:35px;margin-left:40px;">
											Once you have added all the events to your cart. Use one of the following payment methods to <span>register yourself. Intimate us of your successful payment and we shall get back to you within 24</span> <span>hours.</span>
										</div>
										<ul style="font-size:16px;letter-spacing: 0px;line-height:35px;">
											<li>
												The online transaction gateway. Simplest and quickest payment method. Pay with your <span>Debit/Credit Cards or Net banking.</span>
											</li>
											<li>
												You could also make an Account to Account transfer using bank details.
											</li>
											
											<li>
												Draw a Demand Draft for the total registration fee (use bank details) and send <span>to us a soft copy of the DD. As with all other payment methods we will acknowledge</span> <span>your registration. You will be required to bring your DD along with you on the day of</span> <span>the fest to participate and finish the transaction.</span>
											</li>
										</ul>
										<dl style="font-size:20px;letter-spacing: 2px;line-height:35px;" class="dl-horizontal">
											
											<dt>
												Vamshi
											</dt>
											<dd>
												+91 7680991996
											</dd>
											<dd>
												finance.mm2k14@gmail.com
											</dd>
										</dl>
									</div>							
								</div>
								<div class="tab-pane" id="3">
									<br/>
									<div class="row">
										<dl style="font-size:20px;letter-spacing: 2px;line-height:50px;" class="dl-horizontal">
											<dt style="width:350px;">
												Name
											</dt>
											<dd style="padding-left:200px;">
												Mohana Mantra
											</dd>
											<dt style="width:350px;">
												Andhra Bank Account Number
											</dt>
											<dd style="padding-left:200px;">
												154010100043093
											</dd>
											<dt style="width:350px;">
												IFSC Code
											</dt>
											<dd style="padding-left:200px;">
												ANDB0001540
											</dd>
										</dl>
										<p style="font-size:18px;padding-left:50px;">Andhra Bank,<br/>Sree Vidyanikethan Engineering College,</p>
										<p style="font-size:18px;padding-left:50px;">A. Rangampet, Chandagiri, Tirupati, Andhra Pradesh.</p>
									</div>							
								</div>
								<div class="tab-pane" id="4">
									<br/>
									<div class="row">
										<p style="font-size:18px;padding-left:20px;">Bus Facility to the Campus will be available from the</p>
										<ul style="font-size:16px;letter-spacing: 0px;line-height:35px;">
											<li>
												Bus Station.
											</li>
											<li>
												Railway Station.
											</li>
											<li>
												Mahati Auditorium.
											</li>
											<li>
												Lotus Temple, Iskcon.
											</li>
											<li>
												Balaji Colony.
											</li>
											<li>
												Annamayya Circle.
											</li>
										</ul>
										<p style="font-size:18px;padding-left:20px;">(Participants enjoying our hospitality will be provided with transport facility)</p>	
										<dl style="font-size:20px;letter-spacing: 2px;line-height:35px;" class="dl-horizontal">
											<dt>
												Sai Kiriti
											</dt>
											<dd>
												+91 8143355442
											</dd>
											<dt>
												Pavan Krishna
											</dt>
											<dd>
												+91 9700581070
											</dd>
											<dd>
												logistics.mm2k14@gmail.com
											</dd>
										</dl>
									</div>							
								</div>
							</div>
							<script>
							  $(function () {
								$('#myTab a:last').tab('show')
							  })
							</script>
		  				</div>
	  				</div> 
  				</div>
  				
  							
  			</div>
  		</div>
  	</div><!--/#About Us-->
   	<?php include_once('sponsor_bottom.php'); ?>
	<?php include_once('footer.php'); ?>

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
	</body>
</html>