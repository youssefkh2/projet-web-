<?php
    include_once 'C:/xampp/htdocs/integration/config.php';
    include_once 'C:/xampp/htdocs/integration/model/categorie.php';
    class CategorieC {
        function afficherCategories(){
            $sql="SELECT * FROM categories";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }
		
        function supprimerCategories($id_cat){
			$sql="DELETE FROM categories WHERE id_cat=:id_cat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_cat', $id_cat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function ajouterCategories($categorie){
			$sql="INSERT INTO categories (Nom,description) 
			VALUES (:Nom,:description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Nom' => $categorie->getNom(),
					'description' => $categorie->getdescription(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererCategories($id_cat){
			$sql="SELECT * from categories WHERE id_cat =$id_cat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$categorie=$query->fetch();
				return $categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierCategories($categorie, $id_cat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE categories SET 
						Nom= :Nom, 
						description= :description 	
					WHERE id_cat= :id_cat"
				);
				$query->execute([
					'id_cat' =>intval($id_cat),
					'Nom' => $categorie->getNom(),
					'description' => $categorie->getdescription(),
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		} 
    }



?>