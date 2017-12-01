  <nav style="margin-top:0px;margin-bottom:0px;" class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0px;margin-top:-20px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MM Panel</a> 
            </div>
			<div style=" font-size: 25px;color: #f00;padding: 10px 50px 5px 15px;float: left;">Mohana Mantra</div>
             <form role="form" action="login.php" method="POST" enctype="multipart/form-data">
				<div style="color: white;margin: 15px 15px 5px 0px;float: right;font-size: 16px;"><?php echo "<i class='glyphicon glyphicon-user'></i>" . " " . $_SESSION['username']; ?>&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust" >LogOut</a> </div>      
			</form>
		</nav>    
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../images/logo.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="addevent.php"><i class="fa fa-dashboard "></i> Event </a>
                    </li>
                     <li>
                        <a  href="addrules.php"><i class="fa fa-desktop "></i> Rules</a>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-qrcode "></i> Coordinators<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="addcoordinators.php">Add Coordinator</a>
                            </li>
                            <li>
                                <a href="uploadcoordinator.php">Upload Image</a>
                            </li>
                        </ul>
                    </li>                 
                    <li>
                        <a href="#"><i class="fa fa-sitemap "></i> Paper and Poster<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addtitle.php">Title</a>
                            </li>
                            <li>
                                <a href="addcoordinator1.php">coordinator1</a>
                            </li>
							<li>
                                <a href="addcoordinator2.php">coordinator2</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a  href="register.php"><i class="fa fa-list-alt "></i> Register</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->