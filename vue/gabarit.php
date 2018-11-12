<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />
	  
    </head>
  <body>
<form id="clinique" method="post" action="clinique.php">
				<fieldset>
				<legend>Connexion</legend>
				<p><label for="identifiant">Identifiant :</label>
					<input type="text" name="identifiant" id="identifiant" value="" />
				</p>
				<p>
					<label for="pass">Mot de passe :</label>
					<input type="password" name="pass" id="pass" value="" />
				</p>
				
				<p>
				<input type="submit" name="connexion" value="Connexion" />
				</p>
				</fieldset>
				

 <?php echo $contenu;?>
</form>
</body>
</html>