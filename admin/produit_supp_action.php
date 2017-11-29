<?php
include('verifier_access.php'); 
include("../classes/Produit.php");
$prd = new Produit($bdd);

$prd->supprimer((int)$_REQUEST['id']);
header("Location: produit_liste.php");
?>