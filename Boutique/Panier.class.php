<?php

	class Panier {
		
		function __construct(){

			if(!isset($_SESSION)){

				session_start();
			}
			else if(isset($_SESSION['panier'])){
				$_SESSION['panier']=array();
			}

		}

		public function add($product_id){
		$_SESSION['panier'][$product_id]=1;
		}

		public function del($product_id){
		 unset($_SESSION['panier'][$product_id]);
		}
	}
?>