<!DOCTYPE html>
<html>
<head>
	<title>Page Client</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="projectwebClient.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<nav>
    	<ul id="menu">
    		<h1>JONOTOLA</h1>
    		<li><a href="#">Assitance</a></li>
    		<li><a href="#">Suivi de ticket</a></li>
    		<li><a href="#">Stastistiques</a></li>    		
    	</ul>
    </nav>
	
    <h2>Voici vos tickets en cours...</h2>

    <h3>Liste des Tickets</h3>
    <?php
    session_start();
    $id_clients = $_SESSION["id_clients"];
    $db = new PDO ('mysql:host=localhost;dbname=projetwebdb','root','');
    
    
    $sql_cmd = "Select * from tickets where id_clients = '$id_clients' ORDER BY dateCreation ";
    $res = $db->query($sql_cmd);
    $data =$res->fetchAll();
    
    echo "<table class=\"table table-hover\">";
    foreach ($data as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["dateCreation"] . "</td>";
        echo "<td>" . $row["criticite"] . "</td>"; 
        echo "<td>" . $row["objet"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["etat"] . "</td>";        
        echo "</tr>";   
    }
    echo "</table>"
    ?>
        	 	
  	

</body>
</html>
