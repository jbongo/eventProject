<?php

 require"check.php";
// Ajout d'un candidat

if(isset($_POST['ajout']))
{
	 require"../model/candidat.class.php";
	 require('../config/BDConnect.php');
 	 $candidat  = new candidat($pdo);
	addCandidat($candidat);
} 

// Modification d'un candidat
if(isset($_POST['xxx']))
{
	 require"../model/candidat.class.php";
	 require('../config/BDConnect.php');
 	 $candidat  = new candidat($pdo);
	 modCandidat($candidat);
}



// Modification du statut de l'inscription

if(isset($_GET['idv']))
{
	$id = $_GET['idv'];

	 $candidatx  = new candidat($pdo);
	 $candidatx->modifierStatutCandidat(1,$id);
}
elseif(isset($_GET['idr']))
{
	 $id = $_GET['idr'];
	 $candidat  = new candidat($pdo);
	 $candidat->modifierStatutCandidat(2,$id);
}

elseif(isset($_GET['anl']))
{
	 $id = $_GET['anl'];
	 $candidaty  = new candidat($pdo);
	 $candidaty->modifierStatutCandidat(0,$id);
}




function addCandidat($objetCandidat)
{

	if(isset($_POST['civilite']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['Ville']) && isset($_POST['Contact']) && isset($_POST['email']) && isset($_POST['question1']) && isset($_POST['question2']) )
		{
			
			 $civilite = $_POST['civilite'];
			 $nom = $_POST['prenom'];
			 $prenom = $_POST['nom'];
			 $adresse = $_POST['adresse'];
			 $code_postal = $_POST['codePostal'];
			 $ville = $_POST['Ville'];
			 $contact = $_POST['Contact'];
			 $email = $_POST['email'];
			 $question1 = $_POST['question1'];
			 $question2 = $_POST['question2'];

			 $objetCandidat->ajouterCandidat($civilite, $nom, $prenom, $adresse, $code_postal, $ville, $contact, $email, $question1, $question2);

			 header('location:../inscriptionOk.php');
			
		}
		else
		{
			echo "Erreur de champ de saisie";
		}

}

function modCandidat( $objetCandidat)
{
	

	if(isset($_POST['civilite']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['codePostal']) && isset($_POST['Ville']) && isset($_POST['pays']) && isset($_POST['email']) && isset($_POST['question1']) && isset($_POST['question2']) )
		{
			
			 $numero = $_POST['numero'];
			 $civilite = $_POST['civilite'];
			 $nom = $_POST['prenom'];
			 $prenom = $_POST['nom'];
			 $adresse = $_POST['adresse'];
			 $code_postal = $_POST['codePostal'];
			 $ville = $_POST['Ville'];
			 $pays = $_POST['pays'];
			 $email = $_POST['email'];
			 $question1 = $_POST['question1'];
			 $question2 = $_POST['question2'];

			 $objetCandidat->modifierCandidat($numero, $civilite, $nom, $prenom, $adresse, $code_postal, $ville, $pays, $email, $question1, $question2);

			 header('location:../details.php?cand='.$numero);

			
		}
		else
		{
			echo "Erreur de champ de saisie";
		}
}


function supCandidat($objetCandidat,$numero)
{
	 $objetCandidat->supprimerCandidat($numero);
	 header('location:deleteRapport.php');
}



function displayAllCandidats($objetCandidat)
{
	$results = $objetCandidat->afficherLesCandidats();
	$i = 0;
	$donnees = array();
	while($result = $results->fetch())
	{
		$donnees[$i]['numero'] = $result['numero'];
		$donnees[$i]['numeroCandidat'] = $result['numeroCandidat'];
		$donnees[$i]['civilite'] = $result['civilite'];
		$donnees[$i]['nom'] = $result['nom'];
		$donnees[$i]['prenom'] = $result['prenom'];
		$donnees[$i]['adresse'] = $result['adresse'];
		$donnees[$i]['code_postal'] = $result['code_postale'];
		$donnees[$i]['ville'] = $result['ville'];
		$donnees[$i]['pays'] = $result['pays'];
		$donnees[$i]['email'] = $result['email'];
		$donnees[$i]['date_inscription'] = $result['date_inscription'];
		$donnees[$i]['question1'] = $result['q1_pourquoi_participer'];
		//$donnees[$i]['question2'] = $result['q2_autre_salon'];
		$donnees[$i]['statut'] = $result['statut'];
		$i++;
	}

	//print_r($donnees);
	return $donnees;
}


function detailsCandidat($objetCandidat,$numero)
{
	$results = $objetCandidat->afficherCandidat($numero);

	$donnees = array();
	while($result = $results->fetch())
	{
		$donnees['numero'] = $result['numero'];
		$donnees['civilite'] = $result['civilite'];
		$donnees['nom'] = $result['nom'];
		$donnees['prenom'] = $result['prenom'];
		$donnees['adresse'] = $result['adresse'];
		$donnees['code_postal'] = $result['code_postale'];
		$donnees['ville'] = $result['ville'];
		$donnees['pays'] = $result['pays'];
		$donnees['email'] = $result['email'];
		$donnees['question1'] = $result['q1_pourquoi_participer'];
		$donnees['question2'] = $result['q2_autre_salon'];
		
	
	}

	return $donnees;
}


?>
