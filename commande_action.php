<?php session_start();
require_once("./classes/Commande.php");
require_once("./classes/Produit.php");
@$nomprenom = $_POST['nomprenom'];
@$id = $_POST['id'];
@$email = $_POST['email'];
@$adresse = $_POST['adresse'];
@$id_prod=$_GET['id_prod'];
@$s=$_SESSION['panier'];

if( !empty($nomprenom) && !empty($email)&& !empty($adresse) ) 
{
	$cat = new Commande();
	$cat->_nomprenom = $nomprenom;
	$cat->_email = $email;
	$cat->_adresse = $adresse;
	
	if( empty($id) ) 	// Ajout
	
	$id = $cat->ajouter();

	else				// Modification
	{
		$cat->_id = $id;
		$cat->modifier();
	}

	header("Location: paiement.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>