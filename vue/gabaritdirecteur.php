<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />
	  
    </head>
  <body>
  
<p class="deco" ><a href="clinique.php"/> Déconnexion </a></p>
  <h1>Directeur</h1>
  
 <form method="post" action="clinique.php">
 
 
				<fieldset>
				<legend>Les logins</legend>
				<nav>
				<p class="menu">
				<input type="submit" name="creerLogin" value="Creer Login" />
				</p>
				<p class="menu">
				<input type="submit" name="ModifierLogin" value="Modifier Login"/>
				</p>
				</nav>
				</fieldset>
				<fieldset>
				<legend>Acte</legend>
				<nav>
				<p class="menu">
				<input type="submit" name="CreerActe" value="Creer Acte"/>
				</p>
				<p class="menu">
				<input type="submit" name="SupprimerActe" value="Supprimer Acte"/>
				</p>
				<p class="menu">
				<input type="submit" name="ModifierActe" value="Modifier Acte"/>
				</p>
				</nav>
				</fieldset>
				<fieldset>
				<legend>Medecin</legend>
				<nav>
				<p class="menu">
				<input type="submit" name="CreerMedecin" value="Creer Medecin"/>
				</p>
				<p class="menu">
				<input type="submit" name="SupprimerMedecin" value="Supprimer Medecin"/>
				</p>
				</nav>
				</fieldset>
				<fieldset>
				<legend>Liste Piece</legend>
				<nav>
				<p class="menu">
				<input type="submit" name="CreerLp" value="Creer Liste Piece"/>
				</p>
				<p class="menu">
				<input type="submit" name="SupprimerLp" value="Supprimer Liste Piece" />
				</p>
				<p class="menu">
				<input type="submit" name="ModifierLp" value="Modifier Liste Piece"/>
				</p>
				</nav>
				</fieldset>
				<fieldset>
				<legend>Clinique</legend>
				<nav>
				<p class="menu">
				<p><label for="drdv"> Voir nombre de RDV entre les dates (AAAA-MM-JJ): </label><input type="text" id="drdv" name="drdv" />
				<input type="text" id="drdv" name="drdv2" /> </p>
				<p><label for="soldeinf"> Voir nombre de patients ayant un solde inférieur à : </label><input type="number" min="0" id="soldeinf" name="soldeinf" /> </p>
				<p><label for="soldetot"> Voir solde total de tous les patients au (AAAA-MM-JJ) : </label><input type="date"  id="soldetot" name="soldetot" /> </p>
				<input type="submit" name="StatistiqueClinique" value="Statistique Clinique"/>
				</p>
				</nav>
				</fieldset>

 <?php echo $contenu;?>
</form>
</body>
</html>