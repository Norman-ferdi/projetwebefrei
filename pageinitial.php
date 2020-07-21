<!DOCTYPE html>
<html>
    <head>
        <title>Authentification</title>
       <meta charset="utf-8">
        <link rel="stylesheet" href="pageinitial.css" media="screen" type="text/css" />
    </head>
    <body>
        <h3><font size="150px"> JONOTOLA</font></h3>

            <div id="container" >
                
                <form action="connexion.php" method="POST">
                    <h1><font type="Times New Roman">Connexion</font></h1>
                    
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                                        
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                    
                    <input type="submit" id='submit' value='LOGIN' >    

                    
                </form>
            </div>
        
    </body>
</html>