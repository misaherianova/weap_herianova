<?php
	session_start();
	if(!isset($_SESSION['prihlasen'])){
		header("Location: login.php"); 
  }
  include ("content.php");
  $content = content();
  include("templetes/administrace_temp.php");
?>
