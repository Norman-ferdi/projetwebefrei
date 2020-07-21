<!DOCTYPE html>
<html>
<head>
	<title>Page Techniciens</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="projectwebTech.css">
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

    <div id="container" >
                
        <form action="save_userTech.php" method="POST">
            <h2><font type="Times New Roman">Enregistrer un nouveau client</font></h2>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

                              
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="pswrepeat" id="pswrepeat" required>

            Sexe : <INPUT type="radio" name="sexe" value="H" checked> Homme <INPUT type="radio" name="sexe" value="F"> Femme<br />

            Type : <INPUT type="radio" name="type" value="C"> Client

            <input type="submit" value="enregistrer" name="register">
    
        </form>
    </div>

    
    <form class="assitance" method="post" action="creationTicket.php">
        <p><h2>Assitance</h2>
    	<div id="gauche">    		
			Cochez un type de problème:<br />
       		<input type="radio" name="objet" id="dysfonctionnement" value="dysfonctionnement" /> <label for="dysfonctionnement">Dysfonctionnement</label><br />
       		<input type="radio" name="objet" id="acces" value="acces" /> <label for="acces">Accès à la plateforme</label><br />
     		<input type="radio" name="objet" id="droit" value="droit" /> <label for="droit">Droit</label><br />
    		<input type="radio" name="objet" id="autre" value="autre" /> <label for="autre">Autre</label>
        </p>
    	</div>
        <p><h3>Priorité</h3>
        <div>           
            Choisissez la prioritaire du problème:<br />
            <input type="radio" name="criticite" id="critique" value="critique" /> <label for="critique">Critique</label><br />
            <input type="radio" name="criticite" id="haute" value="haute" /> <label for="haute">Haute</label><br />
            <input type="radio" name="criticite" id="moyenne" value="moyenne" /> <label for="moyenne">Moyenne</label><br />
            <input type="radio" name="criticite" id="faible" value="faible" /> <label for="faible">Faible</label>
        </p>
        <div>
            <label><b>Date au Format aa/mm/jj</b></label>
            <input type="text" placeholder="Entrer la date" name="date" required> 
        </div>
        <div>
            <label><b>Nom du projet</b></label>
            <input type="text" placeholder="Entrer le nom du projet" name="projet" required> 
        </div>
        <div>
            <label><b>Nom du client</b></label>
            <input type="text" placeholder="Entrer le nom du client" name="clients" required> 
        </div>

        </div>
    	<div id="droite">
    		<textarea id="msg" name="message" placeholder="Laisser un message... sans mettre d'apostrophe svp" ></textarea>
  		</div>
  		<div><button id="bouton" type="submit">Créer le ticket</button></div>
        </form>

    <div>
        <br />
    <h3>Liste des Tickets</h3>
    <?php
    $db = new PDO ('mysql:host=localhost;dbname=projetwebdb','root','');
    
    
    $sql_cmd = "Select * from tickets ORDER BY dateCreation ";
    $res = $db->query($sql_cmd);
    $data =$res->fetchAll();
    echo "<table class=\"table table-hover\">";
    foreach ($data as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["dateCreation"] . "</td>";
        echo "<td>" . $row["criticite"] . "</td>";
        echo "<td>" . $row["referent"] . "</td>";    
        echo "<td>" . $row["objet"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["etat"] . "</td>";        
        echo "<td> <a href=\"delete_ticket.php?id=". $row["id"]."\">SUPPRIMER</a></td>";    
        echo "</tr>";   
    }
    echo "</table>"
    ?>
    </div>

    <div>
    <h3>Liste des utilisateurs</h3>
    <?php
    $db = new PDO ('mysql:host=localhost;dbname=projetwebdb','root','');
    
    
    
    $sql_cmd = "Select * from clients ORDER BY id ";
    $res = $db->query($sql_cmd);
    $data =$res->fetchAll();
    echo "<table class=\"table table-hover\">";
    foreach ($data as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["sexe"] . "</td>"; 
        echo "<td>" . $row["type"] . "</td>";
        echo "<td> <a href=\"delete_userClients-v2.php?id=". $row["id"]."\">SUPPRIMER</a></td>";
        echo "</tr>";   
    }
    echo "</table>"
    ?>
    </div>
    

  	

</body>
</html>
