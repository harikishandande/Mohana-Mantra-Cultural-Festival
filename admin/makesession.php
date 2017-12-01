<?php
	session_start();
	$_SESSION['username'] = $_GET['coordinator'];
	$_SESSION['id'] = $_GET['id'];
	header('Location: upload/upload.php');
?>