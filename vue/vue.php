<?php

function afficherErreur($erreur){
	
$contenu='<p>'. $erreur.'</p>
<p><a href="clinique.php"/> Revenir à l\'accueil </a></p>';
require_once('vue/gabarit.php');
}


function afficherErreurAgent($erreur){
	
$contenu='<p>'. $erreur.'</p>
<p><a href="clinique.php"/> Revenir à l\'accueil </a></p>';
require_once('vue/gabaritagent.php');
}


function afficherErreurDirecteur($erreur){
	
$contenu='<p>'. $erreur.'</p>
<p><a href="clinique.php"/> Revenir à l\'accueil </a></p>';
require_once('vue/gabaritdirecteur.php');
}


function afficherErreurMedecin($erreur){
	
$contenu='<p>'. $erreur.'</p>
<p><a href="clinique.php"/> Revenir à l\'accueil </a></p>';
require_once('vue/gabaritmedecin.php');
}
 	


function afficherPayer($nss,$pres){
	$contenu='<fieldset><legend>Payer consultation</legend>
			<p><label for="nss5"> NSS : </label><input type="text" id="nss5" name="nss5" value="'.$nss.'" readonly="readonly" /></p>
			
			<select name="listePaye">';
			if($pres!=null){
			foreach($pres as $ligne){
				$contenu.='<option value="'.$ligne->idPres.'">un(e) '.$ligne->nomPres.' le '.$ligne->dateRDV.' avec le Dr '.$ligne->nomMed.'</option>';
			}}
			$contenu.='</select>
			<p><input name="payer" type="submit" formaction="clinique.php" formmethod="post" value="Payer la consultation"   /></p>
		</fieldset>';
		require_once('gabaritagent.php');
}


function afficherDepotArgent($nss){
	$contenu='<fieldset><legend>Déposer argent</legend>
			<p><label for="nss3"> NSS : </label><input type="text" id="nss3" name="nss3" value="'.$nss.'" readonly="readonly" /></p>
			<p> <label for="mont"> montant : </label><input type="text" id="mont" name="mont" /> </p>
			<p><input name="depot" type="submit" formaction="clinique.php" formmethod="post" value="déposer argent"   /></p>
		</fieldset>';
		require_once('gabaritagent.php');
}


function afficherAccueilAgent(){
	$contenu='';
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	
	require_once('gabaritagent.php');
}




function afficherCreerLogin(){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	$contenu='<fieldset>
			<legend>Ajouter un login et mot de passe</legend>
			<p><label for="nomm"> Nom : </label><input type="text" id="nomm" name="nomm" /></p>
			
			<p><label for="prenomm"> Prenom : </label><input type="text" id="prenomm" name="prenomm" /></p>
			<p><label for="cat"> Catégorie (directeur=1  médecin=2  agent=3) : </label><input type="number" min="1" max="3" id="cat" name="cat" /></p>
			<p><label for="login"> Login : </label><input type="text" id="login" name="login" /></p>
			<p><label for="mdp"> Mot de passe : </label><input type="text" id="mdp" name="mdp" /> </p>
			<p>
				<input type="submit" name="ajoutermdp" formaction="clinique.php" formmethod="post" value="Ajouter mot de passe" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
			require_once('gabaritdirecteur.php');
}

function afficherAjouterMed(){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	$contenu='<fieldset>
			<legend>Ajouter un médecin</legend>
			<p><label for="nomm"> Nom : </label><input type="text" id="nomm" name="nomm" /></p>
			<p><label for="prenomm"> Prénom : </label><input type="text" id="prenomm" name="prenomm" /></p>
			<p><label for="spe"> Spécialité : </label><input type="text" id="spe" name="spe" /> </p>
			<p>
				<input type="submit" name="ajouterm" formaction="clinique.php" formmethod="post" value="Ajouter médecin" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
			require_once('gabaritdirecteur.php');
}

/*function afficherAjouterPatient(){
	$contenu='';
	$contenuMed='';
	$contenuP1='';
	$contenuP2='';
	$contenuP='<fieldset>
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
			
			<p>
				<input type="submit" name="ajouterp" formaction="clinique.php" formmethod="post" value="Ajouter patient" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
			require_once('gabarit.php');
}*/


function afficherMed($med){
	
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	
	$contenu=' <fieldset><legend>Afficher médecins</legend>' ;
	if($med!=null){
	foreach($med as $ligne){
	
		$contenu.='<p> <input type="checkbox" name="'.$ligne->idMed.'" /> Medecin '.$ligne->idMed.'<input type="text" value="'.$ligne->nomMed.' '.$ligne->prenomMed.' '.$ligne->specialite.'" readonly="readonly" /> </p>';
	
	}
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="suppMed" type="submit" formaction="clinique.php" formmethod="post" value="Supprimer medecin"   />   </p></fieldset>';
	require_once('gabaritdirecteur.php');
}


function afficherMed2($med){
	
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	
	$contenu=' <fieldset><legend>Afficher médecins</legend>' ;
	if($med!=null){
		
		
		$contenu.='<select name="lm2">';
		
			foreach($med as $ligne){
				$contenu.='<option value="'.$ligne->idMed.'">'.$ligne->nomMed.' '.$ligne->prenomMed.'</option>';
			}
			$contenu.='</select>';

	
		
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="plaMed" type="submit" formaction="clinique.php" formmethod="post" value="Afficher planning medecin"   />   </p></fieldset>';
	require_once('gabaritmedecin.php');
}

/*

– prendre un rdv pour un patient avec un médecin pour une consultation ou un acte.*/


function afficherPatient($pat){

	
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	$contenu=' <fieldset><legend>Liste patients</legend>' ;
	if($pat!=null){
	foreach($pat as $ligne){
		$contenu.='<p> <input type="checkbox" name= "'.$ligne->nss.'" /> Patient '.$ligne->nss.' <input  type="text" value="'.$ligne->nomP.'" />  <input   type="text" value="'.$ligne->prenomP.'"/>  <input  type="text"   value="'.$ligne->adresse.'" />  <input  type="text" value="'.$ligne->numTel.'"/>  <input  type="text" value="'.$ligne->mail.'" />  <input  type="text"  value="'.$ligne->profession.'"/> <input  type="text"  value="'.$ligne->situationFamiliale.'" />  <input  type="text" value="'.$ligne->dateNaissance.'"/></p>';
	
	}
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="suppPat" type="submit" formaction="clinique.php" formmethod="post" value="Supprimer patient"   />  </p></fieldset>';
	
	require_once('gabaritagent.php');
}

function afficherTP($TP){
	$contenu=' <fieldset><legend>Liste des actes</legend>' ;
	if($TP!=null){
	foreach($TP as $ligne){
		$contenu.='<p> <input type="checkbox" name= "'.$ligne->idTP.'" /> Acte '.$ligne->idTP.' <input  type="text" value="'.$ligne->nomPres.'" />  <input   type="text" value="'.$ligne->prix.'"/>   <input  type="text" value="'.$ligne->consigne.'"/>  </p>';
	
	}
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="suppTP" type="submit" formaction="clinique.php" formmethod="post" value="Supprimer acte"   />  </p></fieldset>';
	
	require_once('gabaritdirecteur.php');
}



function afficherTP2($TP){
	$contenu=' <fieldset><legend>Liste des actes</legend>' ;
	if($TP!=null){
	foreach($TP as $ligne){
		$contenu.='<p> <input type="radio" name= "modTP" value="'.$ligne->idTP.'" /> Acte <input   type="text" value="'.$ligne->idTP.'" readonly="readonly" /> <input type="text" value="'.$ligne->nomPres.'"  readonly="readonly"  />  <input  type="text" value="'.$ligne->prix.'"  readonly="readonly" />   <input type="text" value="'.$ligne->consigne.'"  readonly="readonly" />  </p>';
	
	}
	$contenu.=' <input name="mnomtp" type="text" value="nomPres" />  <input name="mprix"  type="text" value="prix"  />   <input name="mco" type="text" value="consigne"  />  </p>';
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="modifTP" type="submit" formaction="clinique.php" formmethod="post" value="Modifier acte"   />  </p></fieldset>';
	
	require_once('gabaritdirecteur.php');
}

function afficherLP($LP){
	$contenu=' <fieldset><legend>Liste des pieces</legend>' ;
	if($LP!=null){
	foreach($LP as $ligne){
		$contenu.='<p> <input type="checkbox" name= "'.$ligne->idLP.'" /> Piece '.$ligne->idLP.' <input  type="text" value="'.$ligne->nom.'" />   </p>';
	
	}
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="suppLP" type="submit" formaction="clinique.php" formmethod="post" value="Supprimer piece"   />  </p></fieldset>';
	
	require_once('gabaritdirecteur.php');
}

function afficherLP2($LP){
	$contenu=' <fieldset><legend>Liste des pieces</legend>' ;
	if($LP!=null){
	foreach($LP as $ligne){
		$contenu.='<p> <input type="radio" name= "modLP" value="'.$ligne->idLP.'" /> Piece  <input   type="text" value="'.$ligne->idLP.'" readonly="readonly" /> <input  type="text" value="'.$ligne->nom.'" readonly="readonly" />   </p>';
	}
	$contenu.='<input name="mlp" type="text" value="nouveau nom" />';
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="ModLP1" type="submit" formaction="clinique.php" formmethod="post" value="Modifier piece"   />  </p></fieldset>';
	
	require_once('gabaritdirecteur.php');
}

function afficherPatientR($pat){

	
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';*/
	$contenu=' <fieldset><legend>Modifier patients</legend>' ;
	if($pat!=null){
		$contenu.='<p> <input name="nss3" type="text" value="'.$pat->nss.'" readonly="readonly" />  <input name="nomp2" type="text" value="'.$pat->nomP.'" />  <input name="prenomp2"   type="text" value="'.$pat->prenomP.'"/>  <input name="ad2" type="text"   value="'.$pat->adresse.'" />  <input name="num2" type="text" value="'.$pat->numTel.'"/>  <input name="mail2"  type="text" value="'.$pat->mail.'" />  <input name="pro2" type="text"  value="'.$pat->profession.'"/> <input name="sf2" type="text"  value="'.$pat->situationFamiliale.'" />  <input name="ddn2" type="text" value="'.$pat->dateNaissance.'"/></p>';
	
	
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="modifierPat" type="submit" formaction="clinique.php" formmethod="post" value="Modifier patient"   />  </p></fieldset>';
	
	require_once('gabaritagent.php');
}


function afficherConsigne($TP,$lp){
	$contenu=' <fieldset><legend>Piece à apporter</legend>' ;
	if($TP!=null && $lp!=null){
		$contenu.='<p> consigne:'.$TP->consigne.' piece: '.$lp->nom.'</p>';
	
	
	
	}else{$contenu.= "aucune ligne ne répond à votre requete";}
	$contenu.='<p><input name="modifierPat" type="submit" formaction="clinique.php" formmethod="post" value="Modifier patient"   />  </p></fieldset>';
	
	require_once('gabaritagent.php');
}


function Afficherprendrerdv($med,$pres,$nss){
	$contenu='<fieldset>
			<legend>Prendre RDV </legend>
			<select name="listeMed">';
			if($med!=null){
			foreach($med as $ligne){
				$contenu.='<option value="'.$ligne->idMed.'">'.$ligne->nomMed.' '.$ligne->prenomMed.'</option>';
			}}
$contenu.='</select>
			<select name="listeTP">';
			if($pres!=null){
			foreach($pres as $ligne){
				$contenu.='<option value="'.$ligne->idTP.'">'.$ligne->nomPres.'</option>';
			}}
			$contenu.='</select>
			<p> <input name="nss4" type="text" value="'.$nss.'" readonly="readonly" /></p>
			 <p><label for="heure2"> Heure (HH:MM) : </label> 
 <input type="time" name="heure2" id="heure2"   /> </p> 
 <p><label for="date2"> Date (AAAA-MM-JJ): </label> <input type="date" name="date2" id="date2"   /> </p> 
 

				<input type="submit" name="ajouterRDV" formaction="clinique.php" formmethod="post" value="Ajouter RDV" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
	require_once('gabaritagent.php');
}

 
function afficherSynthese($prestation,$solde){

$contenu='<fieldset><legend>Afficher Synthese</legend>';	
if($prestation!=null){
	$ligne=$prestation[0];
	$contenu.='<p>'.$ligne->nss.' '.$ligne->nomP.' '.$ligne->prenomP.' '.$ligne->adresse.' '.$ligne->numTel.' '.$ligne->mail.' '.$ligne->profession.' '.$ligne->situationFamiliale.' '.$ligne->dateNaissance.'</p>
	<p>'.$ligne->compteRendu.'</p>
	<p>'.$ligne->suivi.'</p>'	;
		
	foreach($prestation as $ligne){
	$contenu.='<p> un(e) '.$ligne->nomPres.' le '.$ligne->dateRDV.' avec le Dr '.$ligne->nomMed.'</p>';

	}
		$contenu.='Votre solde : '.$solde.'</fieldset>';
}else{
	$contenu.='Son solde : '.$solde;
	$contenu.='<br/>pas de consultation </fieldset>';
}
require_once('vue/gabaritagent.php'); 	
	
}


function afficherSynthese2($prestation,$solde){

$contenu='<fieldset><legend>Afficher Synthese</legend>';	
if($prestation!=null){
	$ligne=$prestation[0];
	$contenu.='<p>'.$ligne->nss.' '.$ligne->nomP.' '.$ligne->prenomP.' '.$ligne->adresse.' '.$ligne->numTel.' '.$ligne->mail.' '.$ligne->profession.' '.$ligne->situationFamiliale.' '.$ligne->dateNaissance.'</p>
	<p>'.$ligne->compteRendu.'</p>
	<p>'.$ligne->suivi.'</p>'	;
		
	foreach($prestation as $ligne){
	$contenu.='<p> un(e) '.$ligne->nomPres.' le '.$ligne->dateRDV.' avec le Dr '.$ligne->nomMed.'</p>';

	}
		$contenu.='Votre solde : '.$solde;
}else{
	$contenu.='Votre solde : '.$solde;
	$contenu.="<br/>pas de consultation";
}
require_once('vue/gabaritmedecin.php'); 	
	
}

function afficherAccueil(){
	
	/*$syntheseClient='';
	$contenu='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';
	*/
	$contenu='';
	
	require_once('vue/gabarit.php'); 	
}

function afficherplanning($RDV){
	
	$contenu='<fieldset>
			  <legend>Planning</legend>';
	if($RDV!=null){
	foreach($RDV as $ligne){
	$contenu.='<p> Heure: '.$ligne->heureRDV.' <br/> Compte Rendu: '.$ligne->compteRendu.'</p>
	<p> Patient nss: '.$ligne->nss.' <br>
 </p>
	<p> Acte:'.$ligne->nomPres.' <br/> Consigne:'.$ligne->consigne.' </p>';
	}
	
	$contenu.='</fieldset>';
	}else{
	$contenu.= "aucun RDV prévu";}
	$contenu.='</fieldset>';
	
	require_once('vue/gabaritmedecin.php');
}



function afficherstatistiqueClinique($date1,$date2,$nbRDV,$solde,$nbP,$nbPTot,$date3,$soldeTot,$annuaire){
	
$contenu='<fieldset><legend>Afficher Statistiques</legend>
<p> nombre de RDV entre '.$date1.' et '.$date2.': '.$nbRDV.'</p>
<p> nombre de patients ayant un solde inférieur à '.$solde.' € : '.$nbP.'</p>
<p> nombre total de patients : '.$nbPTot.'</p>
<p> solde total de tous les patients au '.$date3.' : '.$soldeTot.'</p>';	
if($annuaire!=null){
	foreach($annuaire as $ligne){
	$contenu.='<p> '.$ligne->nomMed.'  '.$ligne->prenomMed.' spécialité: '.$ligne->specialite.'</p>';

	}
		
}else{
	$contenu.="pas de consultation";
}
require_once('vue/gabaritdirecteur.php'); 
}


function afficherpagedirecteur(){
	$contenu='';
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagemedecin='';
	$contenu2='';
	$contenuagent='';
	$pagedirecteur='';*/
	
	
	require_once('vue/gabaritdirecteur.php');
	
}

function afficherpagemedecin(){
	
	$contenu='';
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$contenu2='';
	$contenuagent='';
	$pagemedecin='';*/
	
	require_once('vue/gabaritmedecin.php');
}						

 /*function afficherbloquerCreneau(){ 
 $syntheseClient=''; 
 $contenuconnexion=''; 
 $pagedirecteur=''; 
 $pagemedecin='';
 $contenu2=''; 
 $contenu='<fieldset> <legend>Bloquer un creneaux horaire</legend> <p>
 <label for="nomM"> Votre Nom : </label> <input type="text" name="nomM" id="nomM" value=""  /> </p>
 <p><label for="heure"> Heure (HH:MM) : </label> 
 <input type="time" name="heure" id="heure" value=""  /> </p> 
 <p><label for="date"> Date (AAAA-MM-JJ): </label> <input type="date" name="date" id="date" value=""  /> </p> 
 <p><label for="motif"> Motif : </label> <input type="text" name="motif" id="motif" value=""  /> </p>
 <p> <input type="submit" name="creerbcreneau" formaction="clinique.php" formmethod="post" value="Bloquer le creneaux" /> 
 <input type="reset" name="effacer" value="Effacer" /> </p> </fieldset>'; 
 require_once('gabaritmedecin.php'); }
 */

function afficherCreerTP($lp){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';*/
	$contenu='<fieldset>
			<legend>Creer Acte</legend>
			<p><label for="nomTP"> Nom : </label>
				<input type="text" name="nomTP" id="nomTP" value=""   />
			</p>
			<p><label for="prix"> Prix : </label>
				<input type="number" min="0" max="1000,99" step="0,1" name="prix" value="50"   />
			</p>
			<p><label for="consigne"> Consigne : </label>
				<input type="text" name="consigne" id="consigne" value=""   /> 
			</p>
			<p><label for="nomLP">Nom de la liste piece :</label>
					
					<select name="nomLP">';
			if($lp!=null){
			foreach($lp as $ligne){
				$contenu.='<option value="'.$ligne->idLP.'">'.$ligne->nom.'</option>';
			}}
			$contenu.='</select>
				</p>
			<p>
				<input type="submit" name="creerTP" formaction="clinique.php" formmethod="post" value="Creer acte" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
			require_once('gabaritdirecteur.php');
}

function afficherCreerLP(){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';*/
	$contenu='<fieldset>
			  <legend>Creer Liste Piece</legend>
			  <p><label for="nomLP"> Nom : </label>
				<input type="text" name="nomLP" id="nomLP" value=""   />
			   </p>
			   <p>
				<input type="submit" name="creerListe" formaction="clinique.php" formmethod="post" value="Creer Liste Piece" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
		</fieldset>';
		require_once('gabaritdirecteur.php');
}


function afficherbloquerCreneau(){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';*/
	$contenu='<fieldset>
			  <legend>Bloquer un creneaux horaire</legend>
				<p><label for="nomM"> Votre Nom : </label>
				<input type="text" name="nomM" id="nomM" value=""   />
			   </p>
			   <p><label for="prenomM"> Votre Prenom : </label>
				<input type="text" name="prenomM" id="prenomM" value=""   />
			   </p>
			   <p><label for="heure"> Heure (HH:MM:SS) : </label>
				<input type="time" name="heure" id="heure" value=""   />
			   </p>
			   	<p><label for="date"> Date (AAAA-MM-JJ): </label>
				<input type="date" name="date" id="date" value=""   />
			   </p>
			   	<p><label for="motif"> Motif : </label>
				<input type="text" name="motif" id="motif" value=""   />
			   </p>
			   <p>
				<input type="submit" name="creerbcreneau" formaction="clinique.php" formmethod="post" value="Bloquer le creneaux" />
				<input type="reset" name="effacer" value="Effacer" />
			</p>
			</fieldset>';
		require_once('gabaritmedecin.php');
}
//$patient,$TP,$nomLP
function afficherPlanningJourA($RDV,$date){
	
	$contenu='<fieldset>
			  <legend>'.$date.'</legend>';
	if($RDV!=null){
	foreach($RDV as $ligne){
	$contenu.='<p> Heure: '.$ligne->heureRDV.' <br/> Compte Rendu: '.$ligne->compteRendu.'</p>
	<p> Patient nss: '.$ligne->nss.' <br>
 </p>
	<p> Acte:'.$ligne->nomPres.' <br/> Consigne:'.$ligne->consigne.' </p>';
	}
	
	$contenu.='</fieldset>';
	}else{
	$contenu.= "aucun RDV prévu";}
	$contenu.='</fieldset>';
	require_once('gabaritagent.php');
}
//$patient,$TP,$nomLP
function afficherPlanningJour($RDV,$date){
	
	$contenu='<fieldset>
			  <legend>'.$date.'</legend>';
	if($RDV!=null){
	foreach($RDV as $ligne){
	$contenu.='<p> Heure: '.$ligne->heureRDV.' <br/> Compte Rendu: '.$ligne->compteRendu.'</p>
	<p> Patient nss: <input type="radio" name="synss" value="'.$ligne->nss.'" > '.$ligne->nss.'<br>
 </p>
	<p> Acte:'.$ligne->nomPres.' <br/> Consigne:'.$ligne->consigne.' </p>';
	}
	$contenu.= '<p><input name="synth2" type="submit" formaction="clinique.php" formmethod="post" value="Synthèse patient"   /></p>';
	
	}else{
	$contenu.= "aucun RDV prévu";}
	$contenu.='</fieldset>';
	require_once('gabaritmedecin.php');
}


function afficherPlanningJourVide($dateM1){
	
	$contenu='<fieldset>
			  <legend>'.$dateM1.'</legend>
			  <p> aucun RDV pour le moment </p>
			  </fieldset>';
			  
	require_once('gabaritmedecin.php');	
}


function afficherPlanningJourVideA($dateM1){

	$contenu='<fieldset>
			  <legend>'.$dateM1.'</legend>
			  <p> aucun RDV pour le moment </p>
			  </fieldset>';
			  
	require_once('gabaritagent.php');	
}

function affichervoirplj($med){
	
	$contenu='<fieldset><legend>Voir Planning du jour</legend>
		<select name="lmJ">';
			if($med!=null){
			foreach($med as $ligne){
				$contenu.='<option value="'.$ligne->idMed.'">'.$ligne->nomMed.' '.$ligne->prenomMed.'</option>';
			}}
			$contenu.='</select>
		<p> <label for="dateplj"> Date : </label>
			<input type="date" id="dateplj" name="dateplj" value=""  /> 
		</p>
		<p>
		<input type="submit" name="voirplj" formaction="clinique.php" formmethod="post" value="Voir" />
		<input type="reset" name="effacer" value="Effacer" />
		</p>		
		</fieldset>';
		require_once('gabaritmedecin.php');
}


function affichervoirpljA($med){
	/*$syntheseClient='';
	$contenuconnexion='';
	$pagedirecteur='';
	$pagemedecin='';
	$contenu2='';*/
	$contenu='<fieldset><legend>Voir Planning du médecin</legend>
		<select name="lm">';
			if($med!=null){
			foreach($med as $ligne){
				$contenu.='<option value="'.$ligne->idMed.'">'.$ligne->nomMed.' '.$ligne->prenomMed.'</option>';
			}}
			$contenu.='</select>
			<p> <label for="datepljA"> Date : </label>
			<input type="date" id="datepljA" name="datepljA"   /> 
		</p>
		<p>
		<input type="submit" name="voirpljA" formaction="clinique.php" formmethod="post" value="Voir" />
		</p>		
		</fieldset>';
		require_once('gabaritagent.php');
}

function afficherHisto($histo){
	
	
$contenu='<fieldset><legend>Afficher Historique</legend>';	
if($histo!=null){
	$ligne=$histo[0];
		$contenu.='<p> '.$ligne->nss.' '.$ligne->nomP.' '.$ligne->prenomP.' a payé </p>';
	foreach($histo as $ligne){
	$contenu.='<p> '.$ligne->nomPres.' '.-$ligne->solde.' le '.$ligne->date.'</p>';

	}
	
}else{
	$contenu.="le client n'existe pas ou pas d'historique";
}
require_once('vue/gabaritagent.php'); 	
}
