<?php
    include_once 'C:/xampp/htdocs/Projet_Web_Diversify/config.php';
    include_once 'C:/xampp/htdocs/Projet_Web_Diversify/modelE/evenement.php';
    class evenementC {
        function afficherEvenement(){
            $sql="SELECT * FROM evenement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }
        function supprimerEvenement($id_event){
			$sql="DELETE FROM evenement WHERE id_event=:id_event";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_event', $id_event);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function ajouterEvenement($evenement){
			$sql="INSERT INTO evenement (nom_event,date,lieu,heure,id_cat,image) 
			VALUES (:nom_event,:date,:lieu,:heure,:id_cat,:image)";
				
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'nom_event' => $evenement->getnom(),
					'date' => $evenement->getdate(),
					'lieu' => $evenement->getlieu(),
					'heure' => $evenement->getheure(),
					'id_cat' => $evenement->getid_cat(),
					'image' => $evenement->getimage(),
					
					
				]);
					
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
			return 1;		
		}
		function recupererEvenement($id_event){
			$sql="SELECT * from evenement WHERE id_event=$id_event";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$evenement=$query->fetch();
				return $evenement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierEvenement($evenement, $id_event){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
						nom_event= :nom_event, 
						date= :date,
						lieu= :lieu,
						heure= :heure,
						id_cat= :id_cat,
						image= :image
					WHERE id_event= :id_event'
				);
				$query->execute([
					'id_event' =>intval($id_event),
					'nom_event' => $evenement->getnom(),
					'date' => $evenement->getdate(),
					'lieu' => $evenement->getlieu(),
					'date' => $evenement->getdate(),
					'heure' => $evenement->getheure(),
					'id_cat' => $evenement->getid_cat(),
					'image' => $evenement->getimage(),
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function triereventsDESC()
		{
		$sql = "SELECT * from evenement ORDER BY date DESC";
		$db = config::getConnexion();
		try {
		$req = $db->query($sql);
		return $req;
		} 
		catch (Exception $e)
	 	{
		die('Erreur: ' . $e->getMessage());
		}
		}





		function triereventsASC()
		{
		$sql = "SELECT * from evenement ORDER BY date ASC";
		$db = config::getConnexion();
		try {
		$req = $db->query($sql);
		return $req;
		} 
		catch (Exception $e)
	 	{
		die('Erreur: ' . $e->getMessage());
		}
	    }


		function recherche($search_value)
        {
            $sql="SELECT * FROM evenement WHERE nom_event LIKE '$search_value' OR heure LIKE '$search_value' OR lieu LIKE '$search_value' ";
        
            //global $db;
            $db =Config::getConnexion();
        
            try{
                $result=$db->query($sql);
        
                return $result;
        
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
		function recherchetype($search_value)
        {
			$sql="SELECT * FROM evenement e INNER JOIN categories c ON e.id_cat=c.id_cat WHERE Nom LIKE '$search_value' ";
        
            //global $db;
            $db =Config::getConnexion();
        
            try{
                $result=$db->query($sql);
        
                return $result;
        
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
















        
    }



?>