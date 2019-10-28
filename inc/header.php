<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../classes/Project.php');
	$db  = new Database();
	$pro = new Project();
?>
<!doctype html>
<html>
<head>
	<title>Ajax Essential Projects</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<link rel="stylesheet" href="css/bootstrap.css" media="screen"/>
	<link rel="stylesheet" href="css/style.css" media="screen"/>
	<link rel="stylesheet" href="css/fontawesome-all.min.css" media="screen"/>
	<script src="js/main.js"></script>
</head>
<body>

<div class="project">
	<section class="headeroption">
		<a href="index.php" style="text-decoration: none"><h2> PHP OOP, jQuery, Ajax Essential Projects</h2></a>
	</section>
<section class="maincontent">