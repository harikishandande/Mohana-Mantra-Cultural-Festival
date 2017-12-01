<?php
   session_start();
   include_once('../includes/connection.php');
   include_once('../includes/functions.php');
  	if(isset($_SESSION['admin']))
	{
?>
<?php
    require_once('navigation.php');
?>
<?php
	if(isset($_GET['deleteid']))
	{
	   $id = $_GET['deleteid'];
	   $query = $pdo->prepare("DELETE FROM event_coordinators WHERE id = ? ");
	   $query->bindValue(1, $id); 
	   $query ->execute();
	}
	
   if(isset($_POST['coordinator'],$_POST['email'],$_POST['phonenumber']))
	{
	   $coordinator = $_POST['coordinator'];
	   $email = $_POST['email'];
	   $phonenumber = $_POST['phonenumber'];
	   $query = $pdo->prepare("INSERT INTO event_coordinators (coordinator,email,phonenumber,event_id) VALUES (?,?,?,?)");
	   $query->bindValue(1,$coordinator);
	   $query->bindValue(2,$email);
	   $query->bindValue(3,$phonenumber);
	   $query->bindValue(4,$_SESSION['eventid']);
	   $query ->execute();
	   $num = $query->rowCount();
	    if($num==1)
		 {
			header('Location: addcoordinators.php');
		 }
	}
	else   
	{
		
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MOHANA MANTRA ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
       
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Mohana Mantra</h2>   
                        <h5>Welcome Admin , You can add, edit and manage all the events. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
				   <div class="col-md-12">
					 <?php 
				   if(isset($_GET['eventid']))
				   { $_SESSION['eventid']= $_GET['eventid'];
				   ?>
					<form method="post" action="addcoordinators.php?eventid=<?php echo $_SESSION['eventid']; ?>">
					    Coordinator Name<br>
						<input type="text"  class="form-control" name="coordinator"   ><br><br>
						Email<br>
						<input type="text"  class="form-control" name="email"   ><br><br>
						Phone number<br>
						<input type="text"  class="form-control" name="phonenumber"  ><br><br>
						
						<input type="submit"  class="form-control" class="btn btn-primary" name="submit" value="submit"/>
					</form>
					<?php } ?>
				   <?php
						$function = new Functions;
						$functions = $function->displayallevents();
						foreach ($functions as $function)
						{
							$check = new Functions;
							$checking = $check->checkcoordinator($function['id']);
							$status =  count($checking);
					?>
					<div class="panel-group" id="panel-926343">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="panel-title " ><?php echo $function['event']; ?></span>
						<?php
							if($status == 2)
							{
						?>		
								<span style="float:right;margin-top:0px;margin-right:0px;"><?php 
								foreach($checking as $check)
								{
					?>				<a href="addcoordinators.php?deleteid=<?php echo $check['id']; ?>" style="float:right;margin-top:-5px;margin-right:0px;" class="btn btn-danger btn-mini"><?php echo $check['coordinator']; ?> x</a>&nbsp;&nbsp;&nbsp;
					<?php		} ?>
								</span>		
								
						<?php
							}
							else if($status == 1)
							{
				?>				<a href="addcoordinators.php?eventid=<?php echo $function['id']; ?>" style="float:right;margin-top:-5px;margin-right:0px;" class="btn btn-primary">ADD 2nd member</a>
								<span style="float:right;margin-top:0px;margin-right:20px;"><?php 
								foreach($checking as $check)
								{
									 	?><a href="addcoordinators.php?deleteid=<?php echo $check['id']; ?>" style="float:right;margin-top:-5px;margin-right:0px;" class="btn btn-danger btn-mini"><?php echo $check['coordinator']; ?> x</a>
						<?php	} ?>
								</span>	
				<?php		}
							else
							{
				?>				<a href="addcoordinators.php?eventid=<?php echo $function['id']; ?>" style="float:right;margin-top:-5px;margin-right:0px;" class="btn btn-primary btn-mini">ADD members</a>
				<?php		}
						?>
					</div>
				</div>
			</div>
					<?php
					}
					?>
				  
				   </div>
			    </div>
                 <!-- /. ROW  -->
                       
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>