<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />
	  
    </head>
  <body>
  
<p class="deco" ><a href="clinique.php"/> Déconnexion </a></p>
  <h1>Médecin</h1>
  
 <form id="clinique" method="post" action="clinique.php">
				<fieldset>
				<nav>
				<p class="menu">
				<input type="submit" name="Afficherplanning" value="Afficher planning" />
				</p>
				<p class="menu">
				<input type="submit" name="Afficherplanningjour" value="Afficher planning du jour" />
				</p>
				<p class="menu">
				<input type="submit" name="Bloquer" value="Bloquer créneaux horaire" />
				</p>
				<p class="menu">
				<input type="submit" name="Ajoutercr" value="Ajouter compte rendu"/>
				</p>
				<p class="menu">
				<input type="submit" name="Ajoutersuivi" value="Ajouter suivi" />
				</p>
				<p class="menu">
				<input type="submit" name="Créerprescription" value="Créer une prescription" />
				</p>
				</nav>
				</fieldset>

 <?php echo $contenu;?>
</form>
</body>
</html>