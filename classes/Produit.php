<?php
require_once("Mysql.php");
class Produit extends Mysql
{
	// Les attributs privés
	private $_id;
	private $_libelle;
    private $_description;
	private $_prix;
    private $_image;
    private $_catag;


// Méthode magique pour les setters & getters
	public function __get($attribut) {
		if (property_exists($this, $attribut)) 
                return ( $this->$attribut ); 
        else
			exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $attribut n'existe pas!");     
    }

    public function __set($attribut, $value) {
        if (property_exists($this, $attribut)) {
            $this->$attribut = (mysqli_real_escape_string($this->get_cnx(), $value)) ;
        }
        else
        	exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $attribut n'existe pas!");
    }

	public function details($id)
	{
		$q = "SELECT * FROM produit WHERE id ='$id'";
		$res = $this->requete($q);
	    $row = mysqli_fetch_array( $res);
		$prd = new Produit();
		
		$prd->_id 			= $row['id'];
		$prd->_libelle 		= $row['libelle'];
		$prd->_description	= $row['description'];
		$prd->_prix		    = $row['prix'];
		$prd->_image 		= $row['image'];
		$prd->_catag		= $row['id_categorie'];

		return $prd;
	}


	public function liste()
	{
		$q = "SELECT * FROM produit ORDER BY libelle";
		$list_prd = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$prd = new Produit();

		$prd->_id 			= $row['id'];
		$prd->_libelle 		= $row['libelle'];
		$prd->_prix		    = $row['prix'];
		$prd->_image 		= $row['image'];
		$prd->_description	= $row['description'];
		$prd->_catag		= $row['id_categorie'];
		
			$list_prd[]=$prd;
		}
		
		return $list_prd;
	}
	
	public function ajouter()
	{
	    $q = "INSERT INTO produit (id, libelle, description, prix, image,id_categorie) VALUES 
	  		(  null				, '$this->_libelle'	,
			  '$this->_description'	, '$this->_prix','$this->_image' , '$this->_catag'	
			)";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	
	public function modifier(){
		$q = "UPDATE produit SET
			  libelle 	= '$this->_libelle',
			  prix = $this->_prix,
			  image = IF('$this->_image' = '', image, '$this->_image') ,
			  description = '$this->_description',
			   id_categorie = '$this->_catag'

			  WHERE id = '$this->_id' ";
	  
		$res = $this->requete($q);
		return $res;
	}

	public function supprimer($id){
		$q = "DELETE FROM produit WHERE id = '$id'";
		$res = $this->requete($q);
		return $res;
	}	 

	public function Fetch()
	{
		$q = "SELECT * FROM produit WHERE id_categorie= '$this->_catag' ";
		$list_prd = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$prd = new Produit();

		$prd->_id 			= $row['id'];
		$prd->_libelle 		= $row['libelle'];
		$prd->_description	= $row['description'];
		$prd->_prix 		= $row['prix'];
		$prd->_image 		= $row['image'];
		$prd->_catag		= $row['id_categorie'];
		
			$list_prd[]=$prd;
		}
		
		return $list_prd;
	} 
}
?>