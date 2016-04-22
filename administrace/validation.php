<?php
  header('Location: index.php');
  session_start();
  //require("../database/connection.php"); -> potrebuju to tu?
  $adminPass = 'heslo'; // hash('sha512',$_POST['heslo']);

  $sql = "SELECT Login,Heslo FROM uzivatele WHERE Login = :login AND Heslo =:heslo LIMIT 1;";
  	$ok = $db->prepare($sql);
  	$ok->bindParam(':login', htmlentities($_POST['jmeno']));
  	$ok->bindParam(':heslo', $adminPass);
  	$ok->execute();
  	$ok = $ok->fetch(PDO::FETCH_ASSOC);
  	if(empty($ok)){
  		header("Location: login.php");
  	}else {
  	$_SESSION['prihlasen']="ok";
  	$_SESSION['login']=$_POST['jmeno'];
  }

 	$_SESSION['prihlasen']="ok";
	$_SESSION['login']=$_POST['jmeno'];

  if($_SESSION['prihlasen']=="ok"){
  	header('Location: index.php');
  }else{
  	echo"nemuzes pokracovat";
  }
?>