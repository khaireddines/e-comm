<?php
require_once("../classes/Produit.php");
require_once("../classes/Util.php");

@$libelle = $_POST['libelle'];
@$description = $_POST['description'];
@$id = $_POST['id'];
@$prix = $_POST['prix'];
@$image = $_POST['image'];
@$catag = $_POST['cata'];

if( !empty($libelle) && !empty($description) ) 
{
	$prd = new Produit();
	$util = new Util();
	$prd->_libelle = $libelle;
	$prd->_description = $description;
	$prd->_prix = $prix;
	$prd->_image = $util->upload('image', "../upload");
	$prd->_catag = $catag;

if( empty($id) ) 	// Ajout
		$id = $prd->ajouter();
	else				// Modification
	{
		$prd->_id = $id;
		$prd->modifier();
	}

	header("Location: produit_liste.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>

