<?php 
session_start();

$username = $_POST["username"];
$password = $_POST["password"];



$db = new PDO('mysql:host=localhost;dbname=projetwebdb','root', '');
$sql_admin = ("SELECT * FROM admin WHERE username = '$username' AND password = '$password';");


$sql_tech = ("SELECT * FROM techniciens WHERE username = '$username' AND password = '$password';");

$sql_clients = ("SELECT * FROM clients WHERE username = '$username' AND password = '$password';");
$sql_id_clients = ("SELECT id from clients where username = '$username' and password = '$password';");

$id_clients = $db->query($sql_id_clients)->fetch(); 
$id_clients = $id_clients [0];
$_SESSION["username"] = $username;
$_SESSION["id_clients"] = $id_clients;
if ($db->query($sql_admin)->fetch() >= 1) { 
	header("Location: projetweb.php");

}
if ($db->query($sql_tech)->fetch() >= 1) {
	header("Location: projectwebTech.php");
	
}
if ($db->query($sql_clients)->fetch() >= 1){
	header("Location: projectwebClient.php");
		
}

if ($db->query($sql_tech)->fetch() == 0 && $db->query($sql_admin)->fetch() == 0 && $db->query($sql_clients)->fetch() == 0 ){
	header("Location: pageinitial.php");
}

?>