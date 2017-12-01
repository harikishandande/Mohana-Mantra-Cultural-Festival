<?php
   session_start();
   include_once('../includes/connection.php');
   include_once('../includes/functions.php');
?>
<?php
    require_once('navigation.php');
?>
<?php 
	if(isset($_POST['paperorposter'],$_POST['dept_id'],$_POST['coordinator1'],$_POST['email1'],$_POST['phonenumber1']))
	{
	   $paperorposter= $_POST['paperorposter'];
	   $_SESSION['paperorposter'] = $_POST['paperorposter'];
	   $dept_id= $_POST['dept_id'];
	   $_SESSION['dept_id'] = $_POST['dept_id'];
	   $coordinator1= $_POST['coordinator1'];
	   $_SESSION['username'] = $_POST['coordinator1'];
	   $email1= $_POST['email1'];
	   $phonenumber1= $_POST['phonenumber1'];
	   $sql = "UPDATE department_titles SET coordinator1 = :coordinator1, email1 = :email1, phonenumber1 = :phonenumber1 WHERE paperorposter = :paperorposter AND dept_id = :dept_id ";
	   $query = $pdo->prepare($sql);
	   $query->bindValue(":coordinator1", $coordinator1);
	   $query->bindValue(":email1", $email1);
	   $query->bindValue(":phonenumber1", $phonenumber1);
	   $query->bindValue(":paperorposter", $paperorposter);
	   $query->bindValue(":dept_id", $dept_id);
	   $query->execute();
   	    header('Location: upload/upload1.php');
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
					<form method="post" action="addcoordinator1.php">
						Select Paper or Poster Presentation:<br>
						<select name="paperorposter">
						<option value="1">Paper Presentation</option>
						<option value="2">Poster Presentation</option>
						</select><br><br>
						Select department:<br>
						<select name="dept_id">
						<option value="1">CSE/IT/CSSE/MCA</option>
						<option value="2">Electronics & Communication Engineering</option>
						<option value="3">Electrical & Electronics Engineering</option>
						<option value="4">Instrumentation and Control System Engineering</option>
						<option value="5">Civil Engineering</option>
						<option value="6">Mechanical Engineering</option>
						<option value="7">Management</option>
						<option value="8">Sciences</option>
						<option value="9">Pharmacy</option>
						</select><br><br>
						Coordinator1<br>
						<input type="text" name="coordinator1" size="30" maxlength="30"  ><br><br>
						E-mail1<br>
						<input type="text" name="email1" size="30" maxlength="30"  ><br><br>
						Phone Number1<br>
						<input type="text" name="phonenumber1" size="30" maxlength="30"  ><br><br>
						<input type="submit" name="submit" value="submit"/>
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
