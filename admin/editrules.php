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
	if(isset($_POST['addid']))
	{
	   $rules = $_POST['rules'];
	   $query = $pdo->prepare("INSERT INTO event_rules (rules,event_id) VALUES(?,?);");
	   $query->bindValue(1,$rules);
	   $query->bindValue(2, $_SESSION['addid']);
	   $num = $query ->execute();
	    if($num==1)
		 {
			$_SESSION['addid'] = NULL;
			header('Location: addrules.php');
		 }
	}

	if(isset($_POST['editid']))
	{
	   $rules = $_POST['rules'];
	   $sql = "UPDATE event_rules SET rules = ? WHERE event_id = ?";
			$query = $pdo->prepare($sql);
			$query->bindValue(1,$rules);
			$query->bindValue(2, $_SESSION['editid']);
			$num = $query ->execute();
	    if($num==1)
		 {
			$_SESSION['editid'] = NULL;
			header('Location: addrules.php');
		 }
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
				   <?php 
				   if(isset($_GET['addid']))
				   { 
						$_SESSION['addid'] = $_GET['addid'];
						$check = new Functions;
						$checking = $check->checkeventname($_GET['addid']);
				   ?>
					<form method="post" action="editrules.php">
						Submit description:<br>
						<textarea name="rules"><?php echo $checking['rules']; ?></textarea>
							<script>
								CKEDITOR.replace( 'rules');
							</script>
						<br>				
						<input type="submit" class="btn btn-success btn-lg " name="addid" value="ADD Description"/>
					</form>
					<?php } ?>
					 <?php 
				   if(isset($_GET['editid']))
				   { 
						$_SESSION['editid'] = $_GET['editid'];
						$check = new Functions;
						$checking = $check->checkeventname($_GET['editid']);
				   ?>
					<form method="post" action="editrules.php">
						Submit description:<br>
						<textarea name="rules"><?php echo $checking['rules']; ?></textarea>
							<script>
								CKEDITOR.replace( 'rules');
							</script>
						<br>				
						<input type="submit" class="btn btn-success btn-lg " name="editid" value="EDIT Description"/>
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