<?php
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$pswrepeat = $_POST["pswrepeat"];
$sexe = $_POST["sexe"];
$type = $_POST["type"];



if ( $password != $pswrepeat ) {
	header("Location: projetwebTech.php");
}else{	
	$db = new PDO('mysql:host=localhost;dbname=projetwebdb','root', '');
	$sql_cmd = "insert into clients values (NULL, '$email','$username', '$password', '$sexe', '$type')";
	$res = $db->query($sql_cmd);

	header("Location: projectwebTech.php");
	
}


?>