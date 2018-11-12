<?php

require_once('modele/connect.php') ;

function getConnect(){
$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->query('SET NAMES UTF8');
return $connexion;
}

function getPatient(){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from patient" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$patient=$resultat->fetchall();
$resultat->closeCursor();
return $patient;
}

function chercherPatient($nss){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from patient where nss=$nss" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$li=$resultat->fetch();
if($li){
	$patient=$li;
}else{$patient=NULL;}
$resultat->closeCursor();
return $patient;
}


function chercherMedecin($idMed){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from medecin where idMed=$idMed" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$li=$resultat->fetch();
if($li){
	$med=$li;
}else{$med=NULL;}
$resultat->closeCursor();
return $med;
}


function getConsultationAttentePayement($nss){
	$connexion=getConnect();
	$requete="SELECT P.*, M.nomMed, PR.*, T.*
	from patient P JOIN prestation PR on P.nss=PR.nss
									JOIN typeprestation T on T.idTP=PR.idTP
														JOIN medecin M on PR.idMed=M.idMed
									where P.nss='$nss' and etatPaiement=0";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetchall();
	$resultat->closeCursor();
	if($ligne){
	return $ligne;}
	return null;
}

/*function getConsultationAttentePayement($nss){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from prestation where etatPaiement=0 and nss=$nss" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$consult=$resultat->fetchall();
$resultat->closeCursor();
if($consult){
return $consult;
}return null;
}*/

function virement($nss,$montant){
	$connexion=getConnect();
$requete="update compte set solde= solde+$montant where nss=$nss" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}

function enregistrerHistorique($nss,$montant,$idPres){
	$connexion=getConnect();
$requete="insert into historique(nss,date,solde,idPres) values($nss,curdate(),$montant,$idPres)" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
	
}

function ajouterMedecin($nomMed,$prenomMed,$specialite){
	$connexion=getConnect();
$requete="insert into medecin(nomMed,prenomMed,specialite,idC) values('$nomMed','$prenomMed','$specialite',2)" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}

function supprimerMedecin($idMed){
	$connexion=getConnect();
$requete="delete from medecin where idMed=$idMed" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}

function supprimerLoginMed($idMed){
	$connexion=getConnect();
$requete="delete from login where idPers=$idMed and idC=2" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}


function getMedecin(){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from medecin" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$medecin=$resultat->fetchall();
$resultat->closeCursor();
if($medecin){
return $medecin;}
return null;
}

function getRDVMed($idMed){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select * from prestation where idMed=$idMed " ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$rdv=$resultat->fetchall();
$resultat->closeCursor();
return $rdv;
}


function getPlaMed($idMed){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select nomPres, consigne, P.* from prestation P NATURAL JOIN typeprestation where idMed=$idMed AND dateRDV> curdate()  " ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$rdv=$resultat->fetchall();
$resultat->closeCursor();
return $rdv;
}


function calculerNbRDV($date1,$date2){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select count(idPres) as tot from prestation where dateRDV between '$date1' and '$date2'" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$nbrdv=$resultat->fetch();
$resultat->closeCursor();
return $nbrdv->tot;
}

function calculerNbSoldeInf($somme){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select count(idCompte) as tot from compte where solde<$somme" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$nbsolde=$resultat->fetch();
$resultat->closeCursor();
return $nbsolde->tot;
}


function calculerNbPatient(){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select count(nss) as tot from patient" ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$nbpat=$resultat->fetch();
$resultat->closeCursor();
return $nbpat->tot;
}


function supprimerTP($idTP){
	$connexion=getConnect();
$requete="delete from typeprestation where idTP=$idTP" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}

function supprimerLP($idLP){
	$connexion=getConnect();
$requete="delete from listepiece where idLP=$idLP" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}


function supprimerCompte($nss){
	$connexion=getConnect();
$requete="delete from compte where nss=$nss" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}


function supprimerHisto($nss){
	$connexion=getConnect();
$requete="delete from historique where nss=$nss" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
}


function creerloginmdp($idPers,$login,$mdp,$idC){

$connexion=getConnect();
$requete="insert into login values($idPers,$idC,'$login','$mdp')" ;
$resultat=$connexion->query($requete);
$resultat->closeCursor();
	
}

function chercherMdp($identifiant){
	$connexion=getConnect(); // création d'une connexion PDO
$requete="select mdp from login where login='$identifiant' " ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$mdp=$resultat->fetch();
$resultat->closeCursor();

if($mdp==false){
	return null;
}
else{return $mdp->mdp;}
	
}


function getTPpat($pres){
	$connexion=getConnect(); 
	$p=$pres->idTP;
	$requete="SELECT*FROM typeprestation where idTP=$pres";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$TP=$resultat->fetch();
	$resultat->closeCursor();
	if($TP){
	return $TP;}
	return null;

}


function chercherPres($nss){
	$connexion=getConnect(); 
	$requete="SELECT*FROM prestation where nss=$nss";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$TP=$resultat->fetchall();
	$resultat->closeCursor();
	if($TP){
	return $TP;}
	return null;
}



function creerCompte($nss, $solde){
	$connexion=getConnect();
	$requete="insert into compte(nss,solde) values ('$nss','$solde')";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
	}

	function bloquercreneau($date,$idMed,$heure,$motif){
		$connexion=getConnect(); 
		$requete= "INSERT INTO prestation(idMed,idTP,nss,dateRDV,heureRDV,compteRendu,suivi,etatPaiement) VALUES($idMed,0,0,'$date','$heure','$motif','null',1)"; 
		$resultat=$connexion->query($requete);
		$resultat->closeCursor(); }
	

function ajouterPatient ($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance){
	$connexion=getConnect();  
	$requete="INSERT INTO patient VALUES('$nss','$nomP','$prenomP','$adresse','$numTel','$mail','$profession','$situationFamiliale','$dateNaissance')";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}

function modifieinfoP($nss,$nomP,$prenomP,$adresse,$numTel,$mail,$profession,$situationFamiliale,$dateNaissance){
	$connexion=getConnect(); 
	$requete="UPDATE patient SET nomP='$nomP', prenomP='$prenomP', adresse='$adresse', numTel='$numTel', mail='$mail', profession='$profession', situationFamiliale='$situationFamiliale', dateNaissance='$dateNaissance' WHERE nss=$nss ";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
	}


function supprimerPatient($nss){
	$connexion=getConnect(); 
	$requete="DELETE from patient where nss=$nss";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}

function prendrerdv($idMed,$idTP,$nss,$dateRDV,$heureRDV,$compteRendu,$suivi,$etatPaiement){
	$connexion=getConnect(); 	
	$requete="INSERT INTO prestation(idMed, idTP, nss, dateRDV, heureRDV, compteRendu, suivi, etatPaiement) VALUES('$idMed','$idTP','$nss','$dateRDV','$heureRDV','$compteRendu','$suivi','$etatPaiement')";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}


function verifiemedecinspe($nomMed){
	$connexion=getConnect(); 
	$requete="SELECT specialite FROM medecin where nomMed='$nomMed'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$nb2=$resultat->rowCount();
	$spe=NULL;
	if ($nb2!=0)
	$spe=$resultat->fetch();
	$resultat->closeCursor();
	return $spe;
}

function enregistrerpaiement($nss,$idPres){
	$connexion=getConnect(); 
	$requete="UPDATE prestation SET etatPaiement=1 where nss=$nss and idPres='$idPres'";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
	$connexion=getConnect();
	
}


function trouvernss($nom,$ddn){
	$connexion=getConnect(); 
	$requete="SELECT nss FROM patient where nomP='$nom' and dateNaissance='$ddn'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$nb1=$resultat->rowCount();
	$nss=$resultat->fetch();
	$resultat->closeCursor();
	
	if ($nb1!=0){
	return $nss->nss;}
	else {return null;}
}

/*function chercherIdMed($nomMed){
	$connexion=getConnect(); 
	$requete="SELECT idMed from medecin where nomMed='$nomMed'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$nbt=$resultat->rowCount();
	$idMed=NULL;
	if ($nbt!=0)
	$idMed=$resultat->fetchall();
	$resultat->closeCursor();
	return $idMed;	
	}
	*/
	

//?
/*function verifieCategorie($idC){
	$connexion=getConnect(); 
	$requete=SELECT 

	
	
	}*/


function identitePatient($nss){
	$connexion=getConnect(); 
	$requete="SELECT*FROM patient where nss='$nss'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$nbp=$resultat->rowCount();
	$patient=NULL;
	if ($nbp!=0)
	$patient=$resultat->fetchall();
	$resultat->closeCursor();
	return $patient;	
	}




function calculerPrix($idTP){
	$connexion=getConnect(); 
	$requete="SELECT prix FROM typeprestation where idTP='$idTP'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$prix=$resultat->fetch();
	$resultat->closeCursor();
	if($resultat){
	return $prix->prix;}
	return null;
		
}



function creerlistePiece($nomLP){
	$connexion=getConnect(); 
	$requete="INSERT INTO listepiece(nom) VALUES('$nomLP')";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}

function modifielistePiece($idLP,$nom){
	$connexion=getConnect(); 
	$requete="UPDATE listepiece SET nom='$nom' WHERE idLP=$idLP";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}

function supprimerlistePiece($idLP){
	$connexion=getConnect(); 
	$requete="DELETE from listepiece where idLP='$idLP'";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
	}
	

	function getTP2($id){
	$connexion=getConnect(); 
	$requete="SELECT*FROM typeprestation where idTP=$id";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$TP=$resultat->fetch();
	$resultat->closeCursor();
	if($TP){
	return $TP;}
	return null;
}
	

function getTP(){
	$connexion=getConnect(); 
	$requete="SELECT*FROM typeprestation";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$TP=$resultat->fetchall();
	$resultat->closeCursor();
	if($TP){
	return $TP;}
	return null;
}


function chercherconnecte($identifiant){
$connexion=getConnect();
$requete="select idC from login where login='$identifiant'";
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$ligne=$resultat->fetch(); //fetch retourne false quand il n'y a pas de résultat
if ($ligne==false)
$idC=NULL;	
else $idC=$ligne->idC;
$resultat->closeCursor();
return $idC;
}


function getRDVMeddate($idM1,$dateM1){
$connexion=getConnect(); // création d'une connexion PDO
$requete="select nomPres, consigne, P.* from prestation P NATURAL JOIN typeprestation where idMed='$idM1' AND dateRDV='$dateM1'  " ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$rdv=$resultat->fetchall();
$resultat->closeCursor();
return $rdv;		
}


function chercherIdAgent($nom,$prenom){
	$connexion=getConnect(); 
	$requete="SELECT idA from agent where nomA='$nom' AND prenomA='$prenom'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$idA=NULL;
	else $idA=$ligne->idA;
	$resultat->closeCursor();
	return $idA;	
	}


function chercherIdDirecteur($nom,$prenom){
	$connexion=getConnect(); 
	$requete="SELECT idD from agent where nomD='$nom' AND prenomD='$prenom'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$idD=NULL;
	else $idD=$ligne->idD;
	$resultat->closeCursor();
	return $idD;
	}
	

function chercherIdMed($nomMed,$prenom){
	$connexion=getConnect(); 
	$requete="SELECT idMed from medecin where nomMed='$nomMed' AND prenomMed='$prenom'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$idMed=NULL;
	else $idMed=$ligne->idMed;
	$resultat->closeCursor();
	return $idMed;
	}

function creerTP($nom,$prix,$idLP,$consigne){
	$connexion=getConnect();
	$requete="INSERT INTO typeprestation(nomPres,prix,idLP,consigne) VALUES('$nom','$prix','$idLP','$consigne')";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}


function modifieTP($idTP,$nom,$prix,$consigne){
	$connexion=getConnect(); 
	$requete="UPDATE typeprestation SET nomPres='$nom', prix='$prix', consigne='$consigne' where idTP=$idTP";
	$resultat=$connexion->query($requete);  
	$resultat->closeCursor();
}

function getidLP($nomLP){
	$connexion=getConnect(); 
	$requete="SELECT idLP from listepiece where nom='$nomLP'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$idLP=NULL;
	else $idLP=$ligne->idLP;
	$resultat->closeCursor();
	return $idLP;	
}


function getLP(){
	$connexion=getConnect(); 
	$requete="SELECT * from listepiece";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetchall();
	if ($ligne==false)
	$LP=NULL;
	else $LP=$ligne;
	$resultat->closeCursor();
	return $LP;	
}


	function getLP2($idTP){
	$connexion=getConnect(); 
	$requete="SELECT L.nom FROM typeprestation T join listepiece L on L.idLP=T.idLP where idTP=$idTP";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$TP=$resultat->fetch();
	$resultat->closeCursor();
	if($TP){
	return $TP;}
	return null;
}


function getnomLP($idLP){
	$connexion=getConnect();
	$requete="SELECT nom from listepiece where idLP='$idLP'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$nom=NULL;
	else $nom=$ligne->nom;
	$resultat->closeCursor();
	return $nom;
}

function RDVexistant($date,$heure,$idMed){
	$connexion=getConnect();
	$requete="SELECT idMed from prestation where dateRDV='$date' AND heureRDV='$heure' and idMed=$idMed ";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	if ($ligne==false)
	$idMed1=NULL;
	else $idMed1=$ligne->idMed;
	$resultat->closeCursor();
	return $idMed1;
}

function calculerSoldeTotal($date){
	$connexion=getConnect();
	$requete="SELECT SUM(solde) as tot from historique where date<'$date'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	$resultat->closeCursor();
	return $ligne->tot;
}

//SELECT P.*, M.nomMed, PR.*, T.* from patient P NATURAL JOIN prestation PR NATURAL JOIN typeprestation T NATURAL JOIN medecin M where P.nss=$nss 
function getSynthesePatient($nss){
	$connexion=getConnect();
	$requete="SELECT P.*, M.nomMed, PR.*, T.*
	from patient P JOIN prestation PR on P.nss=PR.nss
									JOIN typeprestation T on T.idTP=PR.idTP
														JOIN medecin M on PR.idMed=M.idMed
									where P.nss='$nss'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetchall();
	$resultat->closeCursor();
	if($ligne){
	return $ligne;}
	return null;
}


function getSolde($nss){
	$connexion=getConnect();
	$requete="SELECT solde from compte where nss='$nss'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	$resultat->closeCursor();
	return $ligne->solde;
}


function chercheridTP($nom){
	$connexion=getConnect();
	$requete="SELECT idTP from typeprestation where nomPres='$nom'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	$resultat->closeCursor();
	if($ligne){
	return $ligne;}
	return null;
}

function chercheridTP2($idPres){
	$connexion=getConnect();
	$requete="SELECT idTP from prestation where idPres='$idPres'";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetch();
	$resultat->closeCursor();
	if($ligne){
	return $ligne->idTP;}
	return null;
}



//SELECT P.*, PR.*, T.*,H.* from historique H NATURAL JOIN patient P NATURAL JOIN prestation PR NATURAL JOIN typeprestation T where P.nss=$nss and H.idPres!=0
function getHisto($nss){
	$connexion=getConnect();
	$requete="SELECT P.*, PR.*, T.*,H.*
	from historique H JOIN patient P on P.nss=H.nss
							JOIN prestation PR on H.idPres=PR.idPres
									JOIN typeprestation T on T.idTP=PR.idTP
									where P.nss='$nss' and H.idPres!=0";
	$resultat=$connexion->query($requete);  
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$ligne=$resultat->fetchall();
	$resultat->closeCursor();
	if($ligne){
	return $ligne;}
	return null;
}


function getRDVMedheuredate($idMed,$heureRDV,$dateRDV){
$connexion=getConnect(); 
$requete="select * from prestation where idMed='$idMed' AND dateRDV='$dateRDV' AND heureRDV='$heureRDV'  " ; 
$resultat=$connexion->query($requete);
$resultat->setFetchMode(PDO::FETCH_OBJ);
$rdv=$resultat->fetchall();
$resultat->closeCursor();
return $rdv;		
}

