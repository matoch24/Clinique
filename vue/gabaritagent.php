<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Ma page</title>
      <meta charset="utf-8">
	  <link rel="stylesheet"  href="vue/style/style.css" />
	 <!-- saisir et modifier certaines informations du patient : adresse, num de tel, mail, profession,
situation familiale (marié, célibataire,...).
– consulter la synthèse d'un patient,
– enregistrer le payement d'un patient
– prendre un rdv pour un patient avec un médecin pour une consultation ou un acte.-->
    </head>
  <body>
  
<p class="deco" ><a href="clinique.php"/> Déconnexion </a></p>
  <h1>Agent</h1>
  
 <form method="post" action="clinique.php">
 
 
 
 <fieldset>
			<legend>Ajouter un patient</legend>
			<p><label for="nss"> NSS : </label><input type="text" id="nss" name="nss" /></p>
			<p><label for="nomp"> Nom : </label><input type="text" id="nomp" name="nomp" /></p>
			<p><label for="prenomp"> Prénom : </label><input type="text" id="prenomp" name="prenomp" /></p>
			<p><label for="adr"> Adresse : </label><input type="text" id="adr" name="adr" /> </p>
			<p><label for="tel"> Téléphone : </label><input type="text" id="tel" name="tel" /> </p>
			<p><label for="mail"> @mail : </label><input type="text" id="mail" name="mail" /> </p>
			<p><label for="pro"> profession : </label><input type="text" id="pro" name="pro" /> </p>
			<p><label for="sf"> situation Familiale : </label><input type="text" id="sf" name="sf" /> </p>
			<p><label for="ddn"> date de Naissance : </label><input type="text" id="ddn" name="ddn" /> </p>
			<p><label for="sol"> solde : </label><input type="number" min="0" id="sol" name="sol" /> </p>
			
			<p>
				<input type="submit" name="ajouterp" value="Ajouter patient" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>
			 <fieldset>
			<legend>Afficher patients</legend>
			<p>
			<input name="afficherp" type="submit" formaction="clinique.php" formmethod="post" value="Afficher patients" /> 
			<!--formtarget="_blank"-->
			</p>
			</fieldset>
			<fieldset><legend>Chercher patient</legend>
			<p> <label for="nss2"> NSS : </label><input type="text" id="nss2" name="nss2" /> </p>
			<p><input name="synth" type="submit" formaction="clinique.php" formmethod="post" value="Synthèse patient"   /></p>
			<p><input name="chercherPat" type="submit" formaction="clinique.php" formmethod="post" value="chercher pour modifier patient"   /></p>
			<p><input name="credit" type="submit" formaction="clinique.php" formmethod="post" value="dépôt d\'argent"   />  </p>
			<p><input name="paye" type="submit" formaction="clinique.php" formmethod="post" value="Enregistrer payement"   /> </p> 
			<p><input name="histo" type="submit" formaction="clinique.php" formmethod="post" value="Afficher historique"   /> </p>
			<p><input name="bRDV" type="submit" formaction="clinique.php" formmethod="post" value="Prendre RDV"   /> </p> 
		</fieldset>
		
		<fieldset><legend>Chercher patient</legend>
			<p> <label for="nomp2"> Nom : </label><input type="text" id="nomp2" name="nomp2" /> </p>
			<p> <label for="ddn2"> date de naissance : </label><input type="text" id="ddn2" name="ddn2" /> </p>
			<p><input name="cherchernss" type="submit" formaction="clinique.php" formmethod="post" value="chercher nss du patient"   /></p>
		</fieldset>
 
 <p><input name="afpj" type="submit" formaction="clinique.php" formmethod="post" value="Afficher planning jour"   /> </p> 
  <?php echo $contenu ; ?>
</form>
</body>
</html>