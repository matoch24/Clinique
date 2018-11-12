<?php
require_once('controleur/controleur.php'); // charge les méthodes du contrôleur
try {
	
	

if (isset($_POST['ajouterp'])){ // si on a cliqué sur Envoyer
$nom=$_POST['nomp'];
$prenom=$_POST['prenomp'];
$dateNaissance=$_POST['ddn'];
$adresse=$_POST['adr'];
$nss=$_POST['nss'];
$numTel=$_POST['tel'];
$mail=$_POST['mail'];
$profession=$_POST['pro'];
$situationFamiliale=$_POST['sf'];
$solde=$_POST['sol'];
CtlAjouterP($nss,$nom,$prenom,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance,$solde);



}

elseif(isset($_POST['suppPat'])){
	CtlSupprimerPat();
	
}

elseif(isset($_POST['afficherp'])){
	CtlAfficherP();
}

elseif(isset($_POST['chercherPat'])){
	$nss=$_POST['nss2'];
	CtlChercherPat($nss);
			
	
}

elseif(isset($_POST['cherchernss'])){
	try{
	$nom=$_POST['nomp2'];
	$ddn=$_POST['ddn2'];
	CtlChercherNSS($nom,$ddn);
	}catch(Exception $e) {
// une erreur est survenu dans le bloc try
$msg = $e->getMessage() ; // on récupère son code
CtlErreurA($msg); // on appelle le contrôleur qui gère les erreurs.
}
			
	
}

elseif(isset($_POST['modifierPat'])){
	$nss=$_POST['nss3'];
	$nom=$_POST['nomp2'];
$prenom=$_POST['prenomp2'];
$dateNaissance=$_POST['ddn2'];
$adresse=$_POST['ad2'];
$numTel=$_POST['num2'];
$mail=$_POST['mail2'];
$profession=$_POST['pro2'];
$situationFamiliale=$_POST['sf2'];
	CtlModifierPat($nss,$nom,$prenom,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance);
			
	
}

elseif(isset($_POST['connexion'])){
$identifiant=$_POST['identifiant'];	
$pass=$_POST['pass'];
ctlchercheConnecte($identifiant,$pass);
}

elseif(isset($_POST['creerLogin'])){
  ctlafficherCreerLogin();
}

elseif(isset($_POST['CreerMedecin'])){
ctlafficherajouterMed();
//require_once('contenudirecteur.php');
}

elseif(isset($_POST['ajouterm'])){
echo"a";
$nomMed=$_POST['nomm'];
$prenomMed=$_POST['prenomm'];
$specialiste=$_POST['spe'];
CtlAjouterMed($nomMed,$prenomMed,$specialiste);	
}

elseif(isset($_POST['ajoutermdp'])){
$nom=$_POST['nomm'];
$prenom=$_POST['prenomm'];
$categorie=$_POST['cat'];
$login=$_POST['login'];
$mdp=$_POST['mdp'];
ctlajouterLogin($nom,$prenom,$categorie,$login,$mdp);

}

elseif(isset($_POST['synth'])){
	$nss=$_POST['nss2'];
		ctlafficherSynthese($nss);
			
	
}

elseif(isset($_POST['payer'])){
	try{
		$nss=$_POST['nss5'];
	$idPres=$_POST['listePaye'];
		ctlPayer($nss,$idPres);
			
	}catch(Exception $e) {
// une erreur est survenu dans le bloc try
$msg = $e->getMessage() ; // on récupère son code
CtlErreurA($msg); // on appelle le contrôleur qui gère les erreurs.
}
}

elseif(isset($_POST['SupprimerMedecin'])){
	
		CtlAfficherM();
			
	
}

elseif(isset($_POST['SupprimerActe'])){
	
		CtlAfficherTP();
			
	
}

elseif(isset($_POST['ModifierActe'])){
	
		CtlAfficherTP2();
			
	
}

elseif(isset($_POST['modifTP'])){
	$idTP=$_POST['modTP'];
	$nom=$_POST['mnomtp'];
	$prix=$_POST['mprix'];
	$consigne=$_POST['mco'];
	CtlModifierTP($idTP,$nom,$prix,$consigne);
		
			
	
}


elseif(isset($_POST['ModifierLp'])){
	CtlAfficherLP2();
			
}


elseif(isset($_POST['Afficherplanning'])){
	CtlAfficherM2();
			
}

elseif(isset($_POST['ModLP1'])){
	$idLP=$_POST['modLP'];
	$nom=$_POST['mlp'];
	CtlModifierLP($idLP,$nom);
		
			
	
}

elseif(isset($_POST['SupprimerLp'])){
	
		CtlAfficherLP();
			
	
}

elseif(isset($_POST['suppMed'])){
	
		CtlSupprimerMed();
			
	
}

elseif(isset($_POST['suppTP'])){
	
		ctlSupprimerTp();
			
	
}

elseif(isset($_POST['suppLP'])){
	
		ctlSupprimerLP();
			
	
}

elseif(isset($_POST['SupprimerTP'])){
	
		CtlAfficherTP();
			
	
}

elseif(isset($_POST['paye'])){
	$nss=$_POST['nss2'];
		ctlafficherPayer($nss);
			
	
}


elseif(isset($_POST['histo'])){
	$nss=$_POST['nss2'];
		ctlafficherHisto($nss);
			
	
}


elseif(isset($_POST['Bloquercreneaux'])){
	$nomM=$_POST['nomM'];
		ctlBloquerCr($date,$nomM,$heure,$motif);
			
	
}

elseif (isset($_POST['Bloquer'])){
ctlafficherbloquerCreneau();	
}

elseif(isset($_POST['credit'])){
	$nss=$_POST['nss2'];
		CtlafficherDepotArgent($nss);	
	
}

elseif(isset($_POST['depot'])){
	$nss=$_POST['nss3'];
	$montant=$_POST['mont'];
		CtlDepotArgent($nss,$montant);	
	
}

elseif(isset($_POST['ajouterRDV'])){
	try{
		$idTP=$_POST['listeTP'];
	$idMed=$_POST['listeMed'];
	$nss=$_POST['nss4'];
	$dateRDV=$_POST['date2'];
	$heureRDV=$_POST['heure2'];
	ctlprendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV);
	}catch(Exception $e) {
$msg = $e->getMessage() ; 
CtlErreurA($msg); 
	}
}

elseif(isset($_POST['bRDV'])){
	$nss=$_POST['nss2'];
		ctlAfficherprendrerdv($nss);
	
}

elseif(isset($_POST['StatistiqueClinique'])){

	$date1=$_POST['drdv'];
	$date2=$_POST['drdv2'];
	$solinf=$_POST['soldeinf'];
	$date3=$_POST['soldetot'];
	
		ctlAfficherstat($date1,$date2,$solinf,$date3);
	
}

elseif(isset($_POST['Afficherplanningjour'])){

	
		CtlAfficherM2();
	
}


elseif(isset($_POST['plaMed'])){
$idMed=$_POST['lm2'];
	
		CtlAfficherplaM2($idMed);
	
}

elseif(isset($_POST['afpj'])){

	
		ctlaffichervoirpljA();
	
}

elseif(isset($_POST['voirpljA'])){

	$idm=$_POST['lm'];
	$dateM2=$_POST['datepljA'];
		ctlAfficherPlannigJourA($idm,$dateM2);
	
}

elseif(isset($_POST['synth2'])){

	$nss=$_POST['synss'];
	
		ctlafficherSynthese2($nss);
	
}

elseif(isset($_POST['voirplj'])){

	$idm=$_POST['lmJ'];
	$dateM2=$_POST['dateplj'];
		ctlAfficherPlannigJour($idm,$dateM2);
	
}

elseif(isset($_POST['ajoutermdp'])){
$nom=$_POST['nomm'];
$categorie=$_POST['cat'];
$login=$_POST['login'];
$mdp=$_POST['mdp'];
ctlajouterLogin($nom,$categorie,$login,$mdp);
}

elseif(isset($_POST['creerTP'])){
$nomTP=$_POST['nomTP'];
$prix=$_POST['prix'];
$consigne=$_POST['consigne'];
$nomLP=$_POST['nomLP'];
ctlcreerTP($nomTP,$nomLP,$consigne,$prix);
}	

elseif(isset($_POST['creerListe'])){
	$nomLP=$_POST['nomLP'];
	ctlcreerLP($nomLP);
}

elseif(isset($_POST['voirplanningjour'])){
	$nomM1=$_POST['nomM1'];
	$prenomM1=$_POST['prenomM1'];
	$dateM1=$_POST['dateM1'];
	ctlAfficherPlannigJour($nomM1,$prenomM1,$dateM1);
}

elseif(isset($_POST['CreerActe'])){
	ctlafficherCreerTP();
}
elseif(isset($_POST['CreerLp'])){
	ctlafficherCreerLP();
}

elseif(isset($_POST['creerbcreneau'])){
	$date=$_POST['date'];
	$nomM=$_POST['nomM'];
	$prenomM=$_POST['prenomM'];
	$heure=$_POST['heure'];
	$motif=$_POST['motif'];
ctlBloquerCr($date,$nomM,$prenomM,$heure,$motif);
}

elseif(isset($_POST['voirplj'])){
	$nomplj=$_POST['nomplj'];
	$prenomplj=$_POST['prenomplj'];
	$dateplj=$_POST['dateplj'];
	ctlAfficherPlannigJour($nomplj,$prenomplj,$dateplj);
}
else {CtlAccueil(); }
}
catch(Exception $e) {
// une erreur est survenu dans le bloc try
$msg = $e->getMessage() ; // on récupère son code
CtlErreur($msg); // on appelle le contrôleur qui gère les erreurs.
}
