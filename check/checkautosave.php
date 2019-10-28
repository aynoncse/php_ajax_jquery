<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Project.php');

	$pro = new Project();

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$comment 	= $_POST['comment'];
		$commentid 	= $_POST['commentid'];
		$autosavecomment = $pro->autoSave($comment, $commentid);
	}
?>