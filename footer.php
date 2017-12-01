<footer id="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="updates-links bg">
                        <div class="col-sm-6 col-md-4">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/MohanaMantraSVEI&amp;width=350&amp;height=390&amp;colorscheme=dark&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=188185154705090" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:390px;" allowTransparency="true"></iframe>						
                                          
                        </div>
                        <div class="col-sm-6 col-md-3 col-md-offset-1">
                            <div class="quick-links">
                       <span style="margin-left:70px;"><h3><i class="fa fa-bolt"></i> QUICK CLICKS</h3>
					   
                           <ul >
									<li style="margin-left:50px;margin-top:20px;"><a href="mm2k13_gallery.php">MM 2K13</a></li>
		                            <li style="margin-left:50px;margin-top:20px;"><a href="faq.php">F A Q</a></li>
                                    <li style="margin-left:50px;margin-top:20px;"><a href="aboutus.php">ABOUT US</a></li>									
                                </ul>
						</span>		
                                <div class="social-link">
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="http://www.instagram.com/mohana_mantra"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>                          
                        </div>
                        <div class="col-sm-12 col-md-4">
							<a class="twitter-timeline" href="https://twitter.com/MohanaMantra14" data-widget-id="512827352749842432">Tweets by @MohanaMantra14</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>
                    <div class="footer text-center bg" style="height:50px;">
                        © Reserved by <a href="http://www.vidyanikethan.edu">Sree Vidyanikethan Educational Institutions</a>,&nbsp;&nbsp;Designed and developed by <a href="http://www.codingworld.in">Coding World</a> </p> 
                    </div><!--/#footer-->
                </div>                
            </div>
        </div>    
    </footer><!--/#footer-widget-->
	
	<style>
	
		
		#loginlink {
		background:url(images/styleTgl.png) no-repeat 0 0;
		position:fixed;
		top:95px;
		float:right;
		width:250px;
		}
				.nav-pills > li.active > a,
		.nav-pills > li.active > a:hover,
		.nav-pills > li.active > a:focus {
		  color: #ffffff;
		  background-color: #DC3515;
		}
	</style>
<?php	
		if(isset($_SESSION['admin']))
		{
?>			<div class="btn-group" id="loginlink">
				<button class="btn btn-lg" href="#modal-container-42620" data-toggle="modal"><b><?php echo $_SESSION['username']; ?></b></button> <button data-toggle="dropdown" class="btn btn-lg dropdown-toggle"><span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li>
						<a class="btn btn-lg" href="#modal-container-42620" data-toggle="modal">Update Profile</a>
					</li>
					<li>
						<a class="btn btn-lg" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
			
			<div class="modal fade" id="modal-container-42620" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="width:900px;">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								<span style="color:#000;"><b><?php echo $_SESSION['username']; ?></b></span>
							</h4>
						</div>
						<div class="modal-body" style="color:#000;">
							<div class="tabbable" id="tabs-514211">
								<ul class="nav nav-pills nav-lg">
									<li class="active col-sm-3">
										<a href="#panel-297817" data-toggle="tab">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span><b style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;Update Profile</b></a>
									</li>
									<li class="col-sm-3">
										<a href="#panel-948506" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp;&nbsp;My Cart</a>
									</li>
									<li class="col-sm-3">
										<a href="#panel-948545" data-toggle="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;Complain Us</a>
									</li>
								</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-297817">
						<br/>
						<?php 
							$user = new Functions;
							$users = $user->fetch_user($_SESSION['username']);
						?>
						<form action="index.php" class="form-horizontal" role="form" method="POST" >
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="name" value="<?php echo $users['name'];?>" disabled/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">College Roll No <b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="roll_no" PlaceHolder="College Roll No" value="<?php echo $users['roll_no'];?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Course Of Study<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="course" PlaceHolder="Course Of Study" value="<?php echo $users['course'];?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Branch<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="branch" PlaceHolder="Branch" value="<?php echo $users['branch'];?>" required />
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">College Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="college" value="<?php echo $users['college'];?>" disabled/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">State<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<select class="form-control" name="state" required>
						<?php		if(empty($users['state']))
									{
						?>				<option value="" selected><< Select State >></option>	
						<?php		}
								else{	
						?>				<option value="<?php echo $users['state'];?>" selected><?php echo $users['state'];?></option>
						<?php 		}	?>
										<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Assam">Assam</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
										<option value="Daman and Diu">Daman and Diu</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jammu and Kashmir">Jammu and Kashmir</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Lakshadweep">Lakshadweep</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Orissa">Orissa</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Telangana">Telangana</option>
										<option value="Tripura">Tripura</option>
										<option value="Uttaranchal">Uttaranchal</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="West Bengal">West Bengal</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Phone<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="phone" value="<?php echo $users['phone'];?>" required/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="email" value="<?php echo $users['email'];?>" disabled/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputPassword3" class="col-sm-3 control-label">You Can Change Password<b style="color:red;">*</b></label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="password" value="<?php echo $users['password'];?>" required/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn" name="update_profile">Update Profile</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="panel-948506">
						<br/>
						<p>
							<center><img src="coming-soon.jpg" width="50%" /></center>
						</p>
					</div>
					<div class="tab-pane" id="panel-948545">
						<br/>
						<form action="index.php" class="form-horizontal" role="form" method="POST">
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-3 control-label">MM id</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="mmid" value="<?php echo $_SESSION['username'];?>"/>
								</div>
							</div>
							<div class="form-group">
								 <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" name="password" PlaceHolder="Password"/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-3 control-label">Complaint</label>
								<div class="col-sm-9">
									<textarea class="form-control" rows="8" name="complaint" PlaceHolder="Your Complaint"/></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									 <button type="submit" class="btn" name="complaintus">Complain Us</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
						</div>
						<div class="modal-footer">
							 <center> <span style="color:#000;">My Cart will ready soon.</span> </center>
						</div>
					</div>
					
				</div>
				
			</div>
<?php	}
		else{?>
		<div class="modal fade" id="modal-container-105178" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title" id="myModalLabel">
											<b style="color:#DC3515;" >Did you forget MMID or PASSWORD ?</b>
										</h4>
									</div>
									<div class="modal-body">
										<p style="color:#000;margin-bottom:30px;">Guys,  Please enter your registered emails only</p>
										<form action="index.php" role="form" method="POST">
											<div class="input-group">
											  <input type="text" class="form-control" style="height:36px;" placeholder="Your Email Address" name="email"/>
											  <span class="input-group-btn">
												<button class="btn" type="submit" style="height:36px;" name="forget">Submit Email</button>
											  </span>
											</div><!-- /input-group -->
										</form>
									</div>
									<div class="modal-footer">
										<center style="color:#000;">Mohana Mantra 2k14 is awaiting for your presence</center>
									</div>
								</div>
								
							</div>
							
						</div>
<div id="secectionBox" style="z-index:1;">
	<script src="themes/js/jquery-1.8.3.min.js"></script>
	<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />

	<div id="themeContainer .bg">
		<div class="col-md-6">
			<div class="themeTitle" style="margin-right:-25px;background-color:transparent;"><b style="margin-right:-25px;">Login Form</b></div>
			<div class="style">
				<form action="index.php" class="contact-form row" name="contact-form" method="post">
				    <div class="form-group col-md-12">
				        <input type="text" name="mmid" class="form-control" required="required" placeholder="MM id" />
				    </div>
					<div class="form-group col-md-12">
				        <input type="password" name="password" class="form-control" required="required" placeholder="Password" />
				    </div>
					<div class="form-group col-md-12">
						<center><a id="modal-105178" href="#modal-container-105178" role="button" class="btn" data-toggle="modal">Forget Password</a></center>
					</div>
				    <div class="col-md-8">
				        <button type="submit" name="login" class="btn btn-primary pull-right">Login</button>
				    </div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div id="hideme" class="themeTitle"><b style="margin-right:-25px;">Register Form</b></div>
			<div class="style">
				<form action="index.php" class="contact-form row" name="contact-form" method="post">
				    <div class="form-group col-md-12">
				        <input type="text" name="name" class="form-control" required="required" placeholder="Name [ First - Middle - Last ]" required/>
				    </div>
					<div class="form-group col-md-12">
				        <input type="text" name="college" class="form-control" required="required" placeholder="College Name" required/>
				    </div>
					<div class="form-group col-md-12">
				        <input type="text" name="phone" class="form-control" required="required" placeholder="Phone No" required/>
				    </div>
					<div class="form-group col-md-12">
				        <input type="email" name="email" class="form-control" required="required" placeholder="Email Id" required/>
				    </div>
				    <div class="col-md-10">
				        <button type="submit" name="register" class="btn btn-primary pull-right">Register Here</button>
				    </div>
				</form>
			</div>
		</div>	
	</div>
</div>
<span id="themesBtn"></span>
<?php }	?>