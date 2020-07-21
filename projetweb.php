<!DOCTYPE html>
<html>
<head>
	<title>Page Administration</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="projetweb.css">
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
                
        <form action="save_user.php" method="POST">
            <h2><font type="Times New Roman">Enregistrer un nouveau client</font></h2>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

                              
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="pswrepeat" id="pswrepeat" required>

            Sexe : <INPUT type="radio" name="sexe" value="H" checked> Homme <INPUT type="radio" name="sexe" value="F"> Femme <br />

            Type : <INPUT type="radio" name="type" value="A" checked> Admin <INPUT type="radio" name="type" value="T"> Technicien <INPUT type="radio" name="type" value="C"> Client

            <input type="submit" value="enregistrer" name="register">
    
        </form>
    </div>

    <div>
    <h3>Liste des administrateurs</h3>
    <?php
    $db = new PDO ('mysql:host=localhost;dbname=projetwebdb','root','');
    
    
    
    $sql_cmd = "Select * from admin ORDER BY id ";
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
        echo "<td> <a href=\"delete_user.php?id=". $row["id"]."\">SUPPRIMER</a></td>";
        echo "</tr>";   
    }
    echo "</table>"
    ?>
    </div>
    <div>
    <h3>Liste des Techniciens</h3>
    <?php
    $db = new PDO ('mysql:host=localhost;dbname=projetwebdb','root','');
    
    
    
    $sql_cmd = "Select * from techniciens ORDER BY id ";
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
        echo "<td> <a href=\"delete_userTechniciens.php?id=". $row["id"]."\">SUPPRIMER</a></td>";
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
        echo "<td> <a href=\"delete_userClients.php?id=". $row["id"]."\">SUPPRIMER</a></td>";
        echo "</tr>";   
    }
    echo "</table>"
    ?>
    </div>
</body>
</html>
