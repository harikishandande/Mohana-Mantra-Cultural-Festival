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
	   $query = $pdo->prepare("DELETE FROM event_time WHERE id = ? ");
	   $query->bindValue(1, $id); 
	   $query ->execute();
	    $query = $pdo->prepare("DELETE FROM event_rules WHERE event_id = ? ");
	   $query->bindValue(1, $id); 
	   $query ->execute();
	}
	if(isset($_POST['update']))
	{
		$id= $_POST['id'];
	   $event= $_POST['event'];
	   $location= $_POST['location'];
	   $date= $_POST['date'];
	   $time= $_POST['time'];  
	   $room= $_POST['room'];  
	   $image= $_POST['image'];  
	   $cost= $_POST['cost'];  
	   $sql = "UPDATE event_time SET event = ?, location = ?, date = ?, time = ?, room = ?, image = ?, cost = ? WHERE id = ?";
	   		$query = $pdo->prepare($sql);
			$query->bindValue(1, $event); 
			$query->bindValue(2, $location); 
			$query->bindValue(3, $date); 
			$query->bindValue(4, $time);
			$query->bindValue(5, $room); 
			$query->bindValue(6, $image); 
			$query->bindValue(7, $cost);
			$query->bindValue(8, $id);			
			$query->execute();
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
   
   
   <script src="../ckeditor/ckeditor.js"></script>
   
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
				<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							MM id
						</th>
						<th>
							Password
						</th>
						<th>
							Email
						</th>
						<th width="20%">
							Phone
						</th>
						<th>
							Name
						</th>
						<th>
							Roll No
						</th>
						
						<th>
							College
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
							$user = new Functions;
							$users = $user->fetch_all_users();
							foreach($users as $user)
							{
						?>
					<tr>
						<td>
							<?php echo $user['mmid'];?>
						</td>
						<td>
							<?php echo $user['password'];?>
						</td>
						<td>
							<?php echo $user['email'];?>
						</td>
						<td>
							<?php echo $user['phone'];?>
						</td>
						<td>
							<?php echo $user['name'];?>
						</td>
						<td>
							<?php echo $user['roll_no'];?>
						</td>
						<td>
							<?php echo $user['college'];?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
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