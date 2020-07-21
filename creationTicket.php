<?php
session_start();

$objet = $_POST["objet"];

$criticite = $_POST["criticite"];
$date = $_POST["date"];
$referent = $_SESSION["username"];
$clients = $_POST["clients"];
$projet = $_POST["projet"];
$message = $_POST["message"];


$db = new PDO('mysql:host=localhost;dbname=projetwebdb','root', '');

$sql_cmd2 = "select id from techniciens WHERE username = '$referent'";
$sql_cmd3 = "select id from projets WHERE intitule = '$projet'";
$sql_cmd4 = "select id from clients WHERE username = '$clients'";
$id_referent = $db->query($sql_cmd2)->fetch();
$id_projet = $db->query($sql_cmd3)->fetch();
$id_clients = $db->query($sql_cmd4)->fetch();
$id_referent= $id_referent [0];
$id_projet= $id_projet [0];
$id_clients= $id_clients [0];
$sql_cmd = "insert into tickets values (NULL, '$date','$criticite', '$referent','$objet', '$message', 'ouvert', '$id_projet','$id_referent', '$id_clients')";

$res = $db->query($sql_cmd);
header("Location: projectwebTech.php");


?>