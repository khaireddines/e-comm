<?php
require_once("Mysql.php");
class Commande extends Mysql
{
	// Les attributs privés
	private $_id;
	private $_nomprenom;
	private $_adresse;
	private $_email;
	


	// Méthode magique pour les setters & getters
	public function __get($attribut) {
		if (property_exists($this, $attribut)) 
                return ( $this->$attribut ); 
        else
			exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");     
    }

    public function __set($attribut, $value) {
        if (property_exists($this, $attribut)) {
            $this->$attribut = (mysqli_real_escape_string($this->get_cnx(), $value)) ;
        }
        else
        	exit("Erreur dans la calsse " . __CLASS__ . " : l'attribut $property n'existe pas!");
    }

	public function details($id)
	{
		$q = "SELECT * FROM commande WHERE id ='$id'";
		$res = $this->requete($q);
		$row = mysqli_fetch_array( $res); 
		$prod = new Commande();
		
		$prod->_id 			= $row['id'];
		$prod->_nomprenom 	= $row['nomprenom'];
		$prod->_email		= $row['email'];
		$prod->_adresse		= $row['adresse'];
		
		return $prod;
	}


	public function liste()
	{
		$q = "SELECT * FROM commande ORDER BY id";
		$list_prod = array(); // Tableau VIDE
		$res = $this->requete($q);
		while($row = mysqli_fetch_array( $res)){
			$prod = new Commande();

		$prod->_id 			= $row['id'];
		$prod->_nomprenom 	    = $row['nomprenom'];
		$prod->_email		= $row['email'];
		$prod->_adresse	    = $row['adresse'];
		
			$list_prod[]=$prod;
		}
		
		return $list_prod;
	}
	
	public function ajouter()
	{
	    $q = "INSERT INTO commande(id,nomprenom,email,adresse,datecmd) VALUES 
	  		(  null	,'$this->_nomprenom','$this->_email','$this->_adresse',Now()
			);";
		$res = $this->requete($q);
		return mysqli_insert_id($this->get_cnx());
	}
	
	public function modifier(){
		$q = "UPDATE commande SET
			  nomprenom 	= '$this->_nomprenom',
			  email = '$this->_email',
			  adresse = '$this->_adresse'
			  
			  WHERE id = '$this->_id' ";
	  
		$res = $this->requete($q);
		return $res;
	}

	public function supprimer($id){
		$q = "DELETE FROM commande WHERE id = '$id'";
		$res = $this->requete($q);
		return $res;
	}	 
}
?>