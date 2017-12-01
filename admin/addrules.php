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
                
				   
<div class="panel-group" id="panel-926343">
<?php
						$function = new Functions;
						$functions = $function->displayallevents();
						$new = 1000;
						foreach ($functions as $function)
						{	
							$check = new Functions;
							$checking = $check->checkeventname($function['id']);
							$status =  count($checking);
					?>	
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="panel-title " data-toggle="collapse" data-parent="#panel-926343" href="#panel-element-<?php echo $new; ?>"><?php echo $function['event']; ?></a>
						<a href="addrules.php?deleteid=<?php echo $function['id']; ?>" style="float:right;margin-top:-5px;margin-right:0px;" class="btn btn-danger btn-mini">Delete</a>
						<?php
						if($status == 2)
						{
			?>				<a href="editrules.php?editid=<?php echo $function['id']; ?>" style="float:right;margin-top:-5px;margin-right:20px;" class="btn btn-info btn-mini">Edit</a>
			<?php		}
						else if($status == 1)
						{
			?>				<a href="editrules.php?addid=<?php echo $function['id']; ?>" style="float:right;margin-top:-5px;margin-right:20px;" class="btn btn-warning btn-mini">Add</a>
			<?php		}
						?>
						
						
					</div>
						<form method="post" action="addrules.php">
							<dl class="dl-horizontal" >
								<dt style="color:red;margin-top:8px;" >
									Don't EDIT this field
								</dt>
								<dd>
									<input class="form-control col-md-3" name="id" value="<?php echo $function['id'];?>" />
								</dd>
								<dt>
									Event
								</dt>
								<dd>
									<input class="form-control col-md-6" name="event" value="<?php echo $function['event'];?>" />
								</dd>
								
								<dt>
									Location
								</dt>
								<dd>
									<input class="form-control col-md-6" name="location" value="<?php echo $function['location'];?>" />

								</dd>
								<dt>
									Date
								</dt>
								<dd>
									<input class="form-control col-md-6" name="date" value="<?php echo $function['date'];?>" />
								</dd>
								<dt>
									Time
								</dt>
								<dd>
									<input class="form-control col-md-6" name="time" value="<?php echo $function['time'];?>" />
								</dd>
								<dt>
									Room
								</dt>
								<dd>
									<input class="form-control col-md-6" name="room" value="<?php echo $function['room'];?>" />
								</dd>
								<dt>
									Image
								</dt>
								<dd>
									<input class="form-control col-md-6" name="image" value="<?php echo $function['image'];?>" />
								</dd>
								<dt>
									Cost
								</dt>
								<dd>
									<input class="form-control col-md-6" name="cost" value="<?php echo $function['cost'];?>" />
								</dd>
								<dt>
								</dt>
								<dd>
									<button class="btn btn-info" name="update">Update Event</button>		
								</dd>
							</dl>
						</form>
				</div>
				<?php	$new++;
					}
					?>
			</div>					
				   <?php 
				   if(isset($_GET['eventid']))
				   { $_SESSION['eventid'] = $_GET['eventid'];
				   ?>
					<form method="post" action="addrules.php">
						Submit description:<br>
						<textarea name="rules"></textarea>
							<script>
								CKEDITOR.replace( 'rules');
							</script>
										
						<input type="submit" name="submit" value="submit"/>
					</form>
					<?php } ?>
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