<?php
$id = $_GET["id"];


$db = new PDO('mysql:host=localhost;dbname=projetwebdb','root', '');
$sql_cmd = "delete from admin where id = $id ";  
$res = $db->query($sql_cmd);

header("Location: projetweb.php");