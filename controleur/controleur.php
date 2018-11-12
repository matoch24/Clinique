<?php
require_once('modele/modele.php') ;
require_once('vue/vue.php') ;

function CtlAccueil(){
afficherAccueil();

}

function CtlAccueilAgent(){
	afficherAccueilAgent();

}

function CtlErreurA($erreur){
afficherErreurAgent($erreur) ;
}


function CtlErreurD($erreur){
afficherErreurDirecteur($erreur) ;
}


function CtlErreurM($erreur){
afficherErreurMedecin($erreur) ;
}


function CtlErreur($erreur){
afficherErreur($erreur) ;
}


function CtlAjouterP($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance,$solde){
	

	if(!empty($nss) && !empty($nomP) && !empty($prenomP) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($profession) && !empty($situationFamiliale)  && !empty($dateNaissance) && !empty($solde)){
		ajouterPatient($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance);
		
		creerCompte($nss, $solde);
		enregistrerHistorique($nss,$solde,0);
	}else {throw new Exception("champ invalide"); }
afficherAccueilAgent();
}


function CtlAfficherP(){
	$pat=getPatient();
afficherPatient($pat);

}

function CtlAfficherLP(){
	$LP=getLP();
afficherLP($LP);
}


function CtlAfficherLP2(){
	$LP=getLP();
afficherLP2($LP);
}

function CtlAfficherTP(){
	$TP=getTP();
afficherTP($TP);

}


function CtlAfficherTP2(){
	$TP=getTP();
afficherTP2($TP);

}



function CtlAfficherM(){
	$med=getMedecin();
afficherMed($med);

}


function CtlAfficherM2(){
	$med=getMedecin();
afficherMed2($med);

}


function CtlAfficherplaM2($idMed){
	if(!empty($idMed)){
	$rdv=getPlaMed($idMed);
	afficherplanning($rdv);
	}else {throw new Exception("champ invalide"); }
}


function CtlChercherPat($nss){
	if(!empty($nss)){
		$pat=chercherPatient($nss);
		afficherPatientR($pat);
	}else {throw new Exception("champ invalide"); }
}


function CtlAjouterMed($nomMed,$prenomMed,$specialite){
	if(!empty($nomMed) && !empty($prenomMed) && !empty($specialite)){
		ajouterMedecin($nomMed,$prenomMed,$specialite);
		//afficherAjouterMed();
	}else {throw new Exception("champ invalide"); }
afficherpagemedecin();
}


function CtlSupprimerMed(){
	foreach ($_POST as $key => $val) {
			if($val=='on'){
				supprimerMedecin($key);
				supprimerLoginMed($key);
			}
	}
afficherpagedirecteur();
}



function CtlSupprimerPat(){
	foreach ($_POST as $key => $val) {
			if($val=='on'){
				echo $key;
				supprimerPatient($key);
				supprimerCompte($key);
				supprimerHisto($key);
			}
	}
afficherAccueilAgent();
}

function CtlModifierTP($idTP,$nom,$prix,$consigne){
	if(!empty($idTP) && !empty($nom) && !empty($prix) && !empty($consigne)){
				modifieTP($idTP,$nom,$prix,$consigne);
			}else {throw new Exception("champ invalide"); }
	
afficherpagedirecteur();
}


function CtlModifierPat($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance){
	if(!empty($nss) && !empty($nomP) && !empty($prenomP) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($profession) && !empty($situationFamiliale)  && !empty($dateNaissance)){
				modifieinfoP($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance);
			}else {throw new Exception("champ invalide"); }
	
afficherAccueilAgent();
}

function CtlafficherDepotArgent($nss){
	if(!empty($nss)){
	afficherDepotArgent($nss);
	}else {throw new Exception("champ invalide"); }

}


function CtlModifierLP($idLP,$nom){
	if(!empty($nom) && !empty($idLP)){
	modifielistePiece($idLP,$nom);
	}else {throw new Exception("champ invalide"); }
	afficherpagedirecteur();
}


function CtlDepotArgent($nss,$montant){
	if(!empty($nss)&&!empty($montant)){
		virement($nss,$montant);
		enregistrerHistorique($nss,$montant,0);
	}
	else {throw new Exception("champ invalide"); }
	afficherAccueilAgent();
}


function ctlafficherPayer($nss){
	if(!empty($nss)){
		$pres=getConsultationAttentePayement($nss);
		if($pres!=null){
		afficherPayer($nss,$pres);
		}else {throw new Exception("pas de consultation à payer"); }
	}
	else {throw new Exception("champ invalide"); }

}


function ctlafficherHisto($nss){
	if(!empty($nss)){
		$histo=getHisto($nss);
		afficherHisto($histo);
		
	}
	else {throw new Exception("champ invalide"); }

}


function ctlPayer($nss,$idPres){
	if(!empty($nss) &&!empty($idPres)){
		$idTP=chercheridTP2($idPres);
		$montant=getSolde($nss);
	$prix=calculerPrix($idTP);
	if($prix<=$montant){
		enregistrerpaiement($nss,$idPres);
		virement($nss,-$prix);
		enregistrerHistorique($nss,-$prix,$idPres);
		echo "payement enregistré";
	}else {throw new Exception("Pas assez d'argent sur le compte "); }

	}
	else {throw new Exception("champ invalide"); }
afficherAccueilAgent();
}


function CtlChercherNSS($nom,$ddn){
	if(!empty($nom)&&!empty($ddn)){
		$nss=trouvernss($nom,$ddn);
		CtlChercherPat($nss);
	}
	else {throw new Exception("champ invalide"); }
}


function ctlverifiemedecinspe($nomMed,$prenom,$spe,$x){
	if(!empty($nomMed) && !empty($prenom) && !empty($spe) && !empty($x)){
		$idMed=cherchereIdMed($nomMed,$prenom);
    if($idMed!=null){//ou empty?
        $spe1=verifiemedecinspe($nomMed);
        if($spe1==$spe){
                        afficherPlanning($x,$idMed);        
        }else{
                throw new Exception("non existant");
        
        }
	}else{
                throw new Exception("non existant");
		}
	}else{
		 throw new Exception("champ vide ");
	} 
}


function ctlSupprimerTp(){
	foreach ($_POST as $key => $val) {
			if($val=='on'){
				supprimerTP($key);
			}
	}
}


function ctlSupprimerLP(){
	foreach ($_POST as $key => $val) {
			if($val=='on'){
				supprimerLP($key);
			}
	}
}
//non fini
/*function ctlAfficheSynthese($nss){
	if(!empty($nss)){
	$patient=chercherPatient($nss);
	$prestation=
	$typeprestation=
	
	
	if($patient!=null){
		
		
	}else{
	throw new Exception("info non existante");	
	}
	}else{
	throw new Exception("champ nss vide");	
	}
	
}*/


//tester si idLP==null
function ctlcreerTP($nomTP,$idLP,$consigne,$prix){
if(!empty($nomTP) || !empty($idLP) || !empty($consigne) || !empty($prix)){
	//$idLP=getidLP($nomLP);
	if($idLP!=null){
	creerTP($nomTP,$prix,$idLP,$consigne);
	}else {throw new Exception("la pièce n'existe pas"); }
}else {throw new Exception("champ invalide"); }
afficherpagedirecteur();
}


function ctlchercheConnecte($identifiant,$pass){
	if(!empty($identifiant)&& !empty($pass)){
		
		$idC=chercherconnecte($identifiant);
		$pass2=chercherMdp($identifiant);
		
		if($pass==$pass2){
		if($idC=='1' || $idC=='2' || $idC=='3'){
			
			if($idC=='1'){
				
			afficherpagedirecteur();	
			}
			
			if ($idC=='2'){
				
			afficherpagemedecin();
			}
			
			if ($idC=='3'){
				
			afficherAccueilAgent();
			}
		
			
			
			
			
		}else{ throw new Exception ("pb  idC");}
		}else {throw new Exception("mauvais mot de passe"); }
	}else{ throw new Exception("champ identifiant invalide");}
	
	
}

function ctlafficherCreerLogin(){
	
	afficherCreerLogin();
}


function ctlafficherajouterMed(){
	
	afficherAjouterMed();
}


function ctlajouterLogin($nom,$prenom,$categorie,$login,$mdp){
	if(!empty($nom) || !empty($prenom) || !empty($categorie) || !empty($login) || !empty($mdp)){
	if($categorie=='1'){
	$idPers=chercherIdDirecteur($nom,$prenom);	
	}
	if($categorie=='2'){
	$idPers=chercherIdMed($nom,$prenom);
	
	}
	if($categorie=='3'){
	$idPers=chercherIdAgent($nom,$prenom);
	}
	
	creerloginmdp($idPers,$login,$mdp,$categorie);
	
}else {throw new Exception("champ invalide"); }
afficherpagedirecteur();
}


function ctlafficherSynthese($nss){
	if(!empty($nss)){
		/*$pat=chercherPatient($nss);
		$prestation=chercherPres($nss);
		if($prestation!=null){
		foreach($prestation as $ligne){
		$typeprestation=getTPpat($ligne);
		afficherSynthese($pat,$typeprestation,$ligne);
		}
		}*/
		$solde=getSolde($nss);
		$pres=getSynthesePatient($nss);
		afficherSynthese($pres,$solde);
		
	}else {throw new Exception("champ invalide"); }
}


function ctlafficherSynthese2($nss){
	if(!empty($nss)){
		/*$pat=chercherPatient($nss);
		$prestation=chercherPres($nss);
		if($prestation!=null){
		foreach($prestation as $ligne){
		$typeprestation=getTPpat($ligne);
		afficherSynthese($pat,$typeprestation,$ligne);
		}
		}*/
		$solde=getSolde($nss);
		$pres=getSynthesePatient($nss);
		afficherSynthese2($pres,$solde);
		
	}else {throw new Exception("champ invalide"); }
}






function ctlafficherCreerTP(){
	$lp=getLP();
	afficherCreerTP($lp);
} 


function ctlafficherCreerLP(){
	afficherCreerLP();
}

function ctlcreerLP($nomLP){
	if(!empty($nomLP)){
	creerlistePiece($nomLP);
	}else {throw new Exception("champ nomLP invalide"); }
	afficherpagedirecteur();
}


function ctlAfficherprendrerdv($nss){
	if(!empty($nss)){
	$med=getMedecin();
	$pres=getTP();
	Afficherprendrerdv($med,$pres,$nss);
	}else {throw new Exception("champ invalide"); }
}
//mise a jour si rdvexistant
function ctlprendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV){
if(!empty($idMed) && !empty($idTP) && !empty($nss) && !empty($dateRDV) && !empty($heureRDV)){
			$idMed3=RDVexistant($dateRDV,$heureRDV,$idMed);
			$RDV2=getRDVMedheuredate($idMed,$heureRDV,$dateRDV);
			if($RDV2!=null){
			$compteRendu=$RDV2[0]->compteRendu;
			}else $compteRendu=null;
			
			if($idMed!=$idMed3){
			prendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV,null,null,0);
			$TP=getTP2($idTP);
			$lp=getLP2($idTP);
			if($TP!=null){
			afficherConsigne($TP,$lp);
			}else{afficherAccueilAgent();}
			
			
			}else{
				
			
			throw new Exception("Impossible de prendre un RDV avec ce medecin créneaux déjà pris pour un(e) $compteRendu");}
			
			}else {throw new Exception("champ invalide"); }
			
}

/*
function ctlprendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV){
if(!empty($idMed) && !empty($idTP) && !empty($nss) && !empty($dateRDV) && !empty($heureRDV)){
				prendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV,null,null,0);
			}else {throw new Exception("champ invalide"); }
			afficherAccueilAgent();
}*/


function ctlafficherbloquerCreneau(){
	afficherbloquerCreneau();
}

function ctlBloquerCr($date,$nomM,$prenomM,$heure,$motif){
	if(!empty($date) || !empty($nomM) || !empty($prenomM) || !empty($heure) || !empty($motif)){
	$idMed=chercherIdMed($nomM,$prenomM);
	bloquercreneau($date,$idMed,$heure,$motif);
	}else {throw new Exception("champ invalide"); }
	afficherpagemedecin();
}


function ctlAfficherPlannigJour($idM1,$dateM1){
	if(!empty($idM1) || !empty($dateM1)){
	$med=chercherMedecin($idM1);
	$RDV=getRDVMeddate($idM1,$dateM1);
	if($RDV!=null){
	foreach($RDV as $ligne){
	$idTP=$ligne->idTP;
	$nss=$ligne->nss;
	}
	$patient=identitePatient($nss);
	$TP=getTP2($idTP);
	foreach($TP as $ligne2){
	$idLP=$TP->idLP;	
	}
	$nomLP=getnomLP($idLP);
	
	afficherPlanningJour($RDV,$dateM1,$patient,$TP,$nomLP);
	}
	else afficherPlanningJourVide($dateM1);
	}else {throw new Exception("champ invalide"); }
}


function ctlAfficherPlannigJourA($idM1,$dateM1){
	if(!empty($idM1) || !empty($dateM1)){
	$med=chercherMedecin($idM1);
	$RDV=getRDVMeddate($idM1,$dateM1);
	if($RDV!=null){
	foreach($RDV as $ligne){
	$idTP=$ligne->idTP;
	$nss=$ligne->nss;
	}
	$patient=identitePatient($nss);
	$TP=getTP2($idTP);
	//$TP=getTP();
	foreach($TP as $ligne2){
	$idLP=$TP->idLP;	
	}
	
	$nomLP=getnomLP($idLP);
	
	afficherPlanningJourA($RDV,$dateM1,$patient,$TP,$nomLP);
	}
	else afficherPlanningJourVideA($dateM1);
	}else {throw new Exception("champ invalide"); }
}		

function ctlaffichervoirpljA(){
	$med=getMedecin();
	 affichervoirpljA($med);
}

function ctlaffichervoirplj(){
	 $med=getMedecin();
	 affichervoirplj($med);
}


function ctlAfficherstat($date1,$date2,$solinf,$date3){
	if(!empty($date1) || !empty($date2) || !empty($solinf) || !empty($date3)){
		$nbRDV=calculerNbRDV($date1,$date2);
		$nbP=calculerNbSoldeInf($solinf);
		$nbPTot=calculerNbPatient();
		$soldeTot=calculerSoldeTotal($date3);
		$annuaire=getMedecin();
		afficherstatistiqueClinique($date1,$date2,$nbRDV,$solinf,$nbP,$nbPTot,$date3,$soldeTot,$annuaire);
	}else {throw new Exception("champ invalide"); }
}
