<?php
   session_start();
   include_once('includes/connection.php');
   include_once('smtp/db.php');
   include_once('includes/functions.php');
	
	if(isset($_SESSION['admin']))
	{
		if(isset($_POST['update_profile']))
		{
				$username = $_SESSION['username'];
				$roll_no = $_POST['roll_no'];
				$course = $_POST['course'];
				$branch = $_POST['branch'];
				$state = $_POST['state'];
				$phone = $_POST['phone'];
				$password = $_POST['password'];
				if( empty($roll_no) || empty($course) ||empty($branch) ||empty($state) ||empty($password) || empty($phone))
				{
					echo "<script> alert('All fields are required !!');</script>";
				}
				else
				{
					$sql = "UPDATE register SET roll_no = ?, course = ?, branch = ?, state = ?, phone = ?, password = ? WHERE mmid = ?";
						$query = $pdo->prepare($sql);
						$query->bindValue("1", $roll_no);
						$query->bindValue("2", $course);
						$query->bindValue("3", $branch);
						$query->bindValue("4", $state);
						$query->bindValue("5", $phone);
						$query->bindValue("6", $password);
						$query->bindValue("7", $username);
						$query->execute();
					echo "<script> alert('Your profile updated successfully !');</script>";
				}
		}
		if(isset($_POST['complaintus']))
		{
			$mmid = $_POST['mmid'];
			$password = $_POST['password'];
			$complaint = $_POST['complaint'];
			
			if(empty($mmid) || empty($password))
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
					$query = $pdo->prepare('INSERT into complaints(mmid,complaint)values(?,?)');
						$query->bindValue(1, $mmid);
						$query->bindValue(2, $complaint);
						$query->execute();
					echo "<script> alert('Your complaint submitted successfully !');</script>";
				}
				else
				{
					echo "<script> alert('Wrong credentials !');</script>";
				}
			}
		}
	}
	
	if(isset($_POST['forget']))
		{
			$email = $_POST['email'];
			
			if(empty($email))
			{
				echo "<script> alert('Hey, You even forgot to enter email address !');</script>";
			}
			else
			{
				$count=mysqli_query($connection,"SELECT id FROM register WHERE email = '$email'");
			
				if(mysqli_num_rows($count) < 1)
				{	
					echo "<script> alert('Your email not found, Create a NEW registration !');</script>";
				}
				else
				{
					$user = new Functions;
					$users = $user->fetch_forgetdetails($email);
					$name = $users['name'];
					$mmid = $users['mmid'];
					$password = $users['password'];
					include 'smtp/Send_Mail.php';
				require_once('smtp/class.smtp.php');
				$to=$email;
				$subject="Forget Password Mohana Mantra 2k14";
				$body='<!DOCTYPE html>
<html lang="en">
<head>
  <link href="http://fonts.googleapis.com/css?family=Exo+2:900" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Skranji" rel="stylesheet" type="text/css">
	<style>

	.dl-horizontal dt {
    float: left;
    width: 160px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .dl-horizontal dd {
    margin-left: 180px;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
	
	.text-danger {
  color: #b94a48;
}

.text-danger:hover {
  color: #953b39;
}

	.lead {
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: 200;
  line-height: 1.4;
}
	
	.text-center {
  text-align: center;
}
	.text-info {
  color: #3a87ad;
}

.text-info:hover {
  color: #2d6987;
}</style>
<body>
		<center>
			<h1 class="text-info text-center" style="font-family: "Exo 2", sans-serif;">
				<b>Mohana Mantra 2k14</b>
			</h1>
			<p class="lead text-center">
				Hi <span class="text-danger" style="font-family: "Skranji", cursive;letter-spacing: 2px;"><b>' . $name . '</b></span> ,<br>You forget your MMID and PASSWORD details right ???<br/>Here they are,
			</p>
				<h3 style=""><dl class="dl-horizontal">
					<dt style="color:#0099cc;">
						MM id
					</dt>
					<dd>' . $mmid . ' </dd>
					<dt style="color:#0099cc;">
						Password
					</dt>
					<dd>
						' . $password .
					'</dd>
				</dl>
				</h3>
			<p class="lead text-center">
				Be prepare to experience a fest of its own kind.<br>Regards,<br>Mohana Mantra Team.
			</p>
			<p class="text-danger text-center">
				<b style="color:red;">Note:</b> The reply to this email is not considered.
			</p>
			<div>
				
			</div>
			
		</center>
</body>
</html>
';
				Send_Mail($to,$subject,$body);
					echo "<script> alert('Your forget MMID and PASSWORD details are sent to your email !');</script>";
				}
			}
		}
	
if(isset($_POST['login']))
{ 
	$mmid = $_POST['mmid'];
	$password = $_POST['password'];
	if(empty($mmid) || empty($password))
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
			$_SESSION['username'] = $mmid;
			$_SESSION['admin'] = true;
			header('Location: index.php');
			exit();
		}
		if(!isset($_SESSION['username']))
		{
			echo "<script> alert('Incorrect login details !');</script>";
		}
	}
}
	
	if(isset($_POST['register']))
   {
		$name = $_POST['name'];
		$college = $_POST['college'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

			$count=mysqli_query($connection,"SELECT id FROM register WHERE email = '$email'");
			
			if(mysqli_num_rows($count) < 1)
			{
					$mmid = new Functions;
					$mmids = $mmid->fetch_mmids();
					if(!isset($mmids['0']))
					{	
						$mm_no = 1;
					}
					else
					{	
						$mmid = new Functions;
						$mmids = $mmid->fetch_mmids();
						$array = $mmids['mmid'];
						if($array[2] != 0)
						{
							$mm_no = $array[2] . $array[3] . $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[3] != 0)
						{
							$mm_no = $array[3] . $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[4] != 0)
						{
							$mm_no = $array[4] . $array[5] . $array[6] . $array[7];
						}
						else if($array[5] != 0)
						{
							$mm_no = $array[5] . $array[6] . $array[7];
						}
						else if($array[6] != 0)
						{
							$mm_no = $array[6] . $array[7];
						}
						else if($array[7] != 0)
						{
							$mm_no = $array[7];
						}
						$mm_no = $mm_no + 1;
					}
				
					$tot = strlen($mm_no);
					
					switch($tot)
					{
						case 1 :
								$zeros = "00000";
									break;
						case 2 :
								$zeros = "0000";
									break;
						case 3 :
								$zeros = "000";
									break;
						case 4 :
								$zeros = "00";
									break;
						case 5 :
								$zeros = "0";
					}					
					$mmid = "MM" . $zeros . $mm_no; 
					
					$randstr = ""; 
					  for($i=0; $i<5; $i++){ 
						 $randnum = mt_rand(0,61); 
						 if($randnum < 10){ 
							$randstr .= chr($randnum+48); 
						 }else if($randnum < 36){ 
							$randstr .= chr($randnum+55); 
						 }else{ 
							$randstr .= chr($randnum+61); 
						 } 
					  } 
					$password = $randstr; 
				  	
				mysqli_query($connection,"INSERT INTO register(name,college,phone,email,mmid,password) VALUES('$name','$college','$phone','$email','$mmid','$password');");

				include 'smtp/Send_Mail.php';
				require_once('smtp/class.smtp.php');
				$to=$email;
				$subject="Mohana Mantra Email verification";
				$body='<!DOCTYPE html>
<html lang="en">
<head>
  <link href="http://fonts.googleapis.com/css?family=Exo+2:900" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Skranji" rel="stylesheet" type="text/css">
	<style>

	.dl-horizontal dt {
    float: left;
    width: 160px;
    overflow: hidden;
    clear: left;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  .dl-horizontal dd {
    margin-left: 180px;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
  .dl-horizontal dd:before,
  .dl-horizontal dd:after {
    display: table;
    content: " ";
  }
  .dl-horizontal dd:after {
    clear: both;
  }
	
	.text-danger {
  color: #b94a48;
}

.text-danger:hover {
  color: #953b39;
}

	.lead {
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: 200;
  line-height: 1.4;
}
	
	.text-center {
  text-align: center;
}
	.text-info {
  color: #3a87ad;
}

.text-info:hover {
  color: #2d6987;
}</style>
<body>
		<center>
			<h1 class="text-info text-center" style="font-family: "Exo 2", sans-serif;">
				<b>Mohana Mantra 2k14</b>
			</h1>
			<p class="lead text-center">
				Hi <span class="text-danger" style="font-family: "Skranji", cursive;letter-spacing: 2px;"><b>' . $name . '</b></span> ,<br>We are happy to inform that you are successfully registered with Mohana Mantra.
			</p>
				<h3 style=""><dl class="dl-horizontal">
					<dt style="color:#0099cc;">
						MM id
					</dt>
					<dd>' . $mmid . ' </dd>
					<dt style="color:#0099cc;">
						Password
					</dt>
					<dd>
						' . $password .
					'</dd>
				</dl>
				</h3>
			<p class="lead text-center">
				Be prepare to experience a fest of its own kind.<br>Regards,<br>Mohana Mantra Team.
			</p>
			<p class="text-danger text-center">
				<b style="color:red;">Note:</b> The reply to this email is not considered.
			</p>
			<div>
				
			</div>
			
		</center>
</body>
</html>
';
				Send_Mail($to,$subject,$body);

				echo '<script> alert("Your MMID and PASSWORD are sent to your mail.");</script>';	

			}
			else
			{
				echo "<script> alert('The email is already taken, please try new.');</script>";
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
	<?php
	
	
	
	?>
	<style>
	.rotate-img{ 
    -moz-animation:3.1s rotateRight infinite linear; 
    -webkit-animation:3.1s rotateRight infinite linear; 
		}

		@-moz-keyframes rotateRight{
			0%{ -moz-transform:rotate(0deg); -moz-transform-origin:50% 50%; }
			100%{ -moz-transform:rotate(360deg); }
		}

		@-webkit-keyframes rotateRight{
			0%{ -webkit-transform:rotate(0deg); -webkit-transform-origin:50% 50%; }
			100%{ -webkit-transform:rotate(360deg); }
		}
		
		}
	</style>
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
	<script src="modal/bootstrap.js"></script>
	<script src="modal/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="boxes/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="boxes/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="boxes/css/component.css" />
	<script src="boxes/js/snap.svg-min.js"></script>

<link rel="stylesheet" href="homecount/css/alba-coming.css" media="all">
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
		                        <li><a class="active" href="index.php"><b>HOME</b></a></li>
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

    <section id="home">
    	<div class="container">
		

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="top:50px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="color:black;"  id="myModalLabel">TECH TREAT</h4>
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
    		
    	</div>    	
</section><!--/#home-->
 <section id="perfomars-slide" >
		<div class="container">
		<div class="row">
    	<div id="latest-event-content" class="col-sm-12">
				<div class="bg">
				
                <div style="margin-top:-50px;" >
					<img class="round-logo-rot text-center rotate-img" src="2.png" style="margin-top:-130px;width:200px;height:200px;"></img>
					<img class="round-logo text-center " src="1.png" style="margin-top:-100px;width:140px;height:140px;"></img>
				</div>
			
				<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 outerblock">
				
					<div class="col-xs-12 highblock back-colored">
						<div class="col-xs-12 title-highblock">
							<div class="col-xs-1">
							</div>
							<div class="col-xs-10 text-center">
							
							</div>
							
						</div>
						<div class="col-xs-12 count-highblock" id="defaultCountdown">

						</div>
						<center><h1 style="margin-top:-20px;">Time left to blast the castle roofs...</h1></center>
					</div>
					
					<div class="col-xs-12 lowblock">
						<a href="https://www.facebook.com/MohanaMantraSVEI" target="_blank">
						<div class="col-xs-12 newsblock">
							<div class="col-xs-2 newsblock-in">
								<h2>FACEBOOK</h2>
							</div>
							<div class="col-xs-8 newsblock-in">
								<h2>/MohanaMantraSVEI</h2>
							</div>
						</div>
						</a>
						<a href="https://twitter.com/MohanaMantra14" target="_blank">
						<div class="col-xs-12 newsblock">
							<div class="col-xs-2 newsblock-in">
								<h2>TWITTER</h2>
							</div>
							<div class="col-xs-8 newsblock-in">
								<h2>@MohanaMantra14</h2>
							</div>
						</div>
						</a>
						<a href="https://gmail.com" target="_blank">
						<div class="col-xs-12 newsblock">
							<div class="col-xs-2 newsblock-in">
								<h2>E-MAIL</h2>
							</div>
							<div class="col-xs-8 newsblock-in">
								<h2>MohanaMantraIndia@gmail.com</h2>
							</div>
						</div>
						</a>
						<div class="col-xs-12 menublock text-center">
							<span class="">Social Media</span>
						</div>
					</div>
					</a>
				</div>     
                </div>
        </div>
		</div>
    </div>
    </section><!--/#perfomars-slide-->
 
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
		
		<script>
			$('#myTab a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
		</script>
		<script type="text/javascript" src="homecount/js/jquery.min.js"></script>
		<script type="text/javascript" src="homecount/js/jquery-ui-1.10.4.custom.min.js"></script>
		
		<script type="text/javascript" src="homecount/js/jquery.countdown.js"></script>
		<script type="text/javascript" src="homecount/js/plugins.js"></script> 
		<script type="text/javascript" src="homecount/js/coming.js"></script> 
</body>

</html>