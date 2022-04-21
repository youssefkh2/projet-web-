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
			$sql="INSERT INTO evenement (id_event,nom_event,date,lieu,heure,id_cat) 
			VALUES (:id_event,:nom_event,:date,:lieu,:heure,:id_cat)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_event' => $evenement->getid_event(),
					'nom_event' => $evenement->getnom(),
					'date' => $evenement->getdate(),
					'lieu' => $evenement->getlieu(),
					'heure' => $evenement->getheure(),
					'id_cat' => $evenement->getid_cat(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
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
						id_cat= :id_cat
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
					
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}




        
    }



?>