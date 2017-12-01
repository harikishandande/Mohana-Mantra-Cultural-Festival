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
	if(isset($_POST['event'],$_POST['location'],$_POST['date'],$_POST['time'],$_POST['room'],$_POST['cost'],$_POST['groupid']))
	{
	   $event= $_POST['event'];
	   $location= $_POST['location'];
	   $date= $_POST['date'];
	   $time= $_POST['time'];  
	   $room= $_POST['room'];  
	   $cost= $_POST['cost'];  
	   $groupid= $_POST['groupid'];  
	   $query= $pdo ->prepare('INSERT INTO event_time (event,location,date,time,room,cost,groupid) VALUES (?,?,?,?,?,?,?)');
	   $query->bindValue(1, $event); 
	   $query->bindValue(2, $location); 
	   $query->bindValue(3, $date); 
	   $query->bindValue(4, $time);
	   $query->bindValue(5, $room); 
	   $query->bindValue(6, $cost); 
	   $query->bindValue(7, $groupid);
	   $query->execute();
	   $num = $query->rowCount();
   	    header('Location: Success.php');
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
				   <div class="col-md-6">
					<form method="post" action="addevent.php">
						Event Name<br>
						<input type="text" class="form-control " name="event"><br>
						Location<br>
						<input type="text" class="form-control " name="location"><br>
						Date<br>
						<input type="text" class="form-control" name="date"><br>
						Time<br>
						<input type="text" class="form-control" name="time"><br>
						Room No<br>
						<input type="text" class="form-control" name="room"><br>
						Cost<br>
						<input type="text" class="form-control" name="cost"><br>
						Select Group:<br>
						<select name="groupid"  class="form-control">
						<option value="1">Computer Events</option>
						<option value="2">Electronics Events</option>
						<option value="3">Robotic Events</option>
						<option value="4">Quiz Events</option>
						<option value="5">Music Events</option>
						<option value="6">Dance Events</option>
						<option value="7">Literary Events</option>
						<option value="8">Fine Art Events</option>
						<option value="9">Theatre Art Events</option>
						<option value="10">Workshops</option>
						<option value="11">Spot Events</option>
						<option value="12">Sports Events</option>
						<option value="13">LAN Gaming Events</option>
						<option value="14">Treasure Hunt</option>
						<option value="15">Management</option>
						</select><br><br>
						<center><input type="submit"  class="btn btn-primary" name="submit" value="Add Event Details"/></center>
					</form>
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