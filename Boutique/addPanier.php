<?php include('connexion.php');
include ('Panier.class.php');
$DB= new DB();
$Panier= new Panier();
	
		if (isset($_GET['id'])) {

			$product = $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_GET['id']));
			if(empty($product)){
			
				die("Ce produit n'existe pas");
			}

			$Panier->add($product [0]-> id);
			die('Produit ajoute au panier ! 
				<a href="javascript:history.back()" > retour a la boutique </a>');
			
		}

	   else {
	   		die("Vous n'avez pas sélectionner de produits à ajouter au panier" );
	   }
?>
