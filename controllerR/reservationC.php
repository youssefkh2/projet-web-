<?php
	include 'C:/xampp/htdocs/projet_diversify/config.php';
	include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
	class ReservationC {
		function afficherReservation(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerReservation($cin_client){
			$sql="DELETE FROM reservation WHERE cin_client=:cin_client";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':cin_client', $cin_client);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterReservation($res){
			$sql="INSERT INTO reservation (cin_client,date_res, adulte, enfant, id_event) 
			VALUES (:cin_client,:date_res, :adulte,:enfant,:id_event)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'cin_client' => $res->getcinClient(),
					'date_res' => $res->getdateRes(),
					'adulte' => $res->getadulte(),
					'enfant' => $res->getenfant(),
					'id_event' => $res->getidevent()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererReservation($id_event){
			$sql="SELECT * from reservation where id_event=$id_event";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierReservation($reservation, $id_event){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
						date_res=:date_res, 
						adulte=:adulte, 
						enfant=:enfant
					WHERE id_event=:id_event'
				);
				$query->execute([
					'date_res' => $reservation->getdateRes(),
					'adulte' => $reservation->getadulte(),
					'enfant' => $reservation->getenfant(),
					'id_event' => $id_event
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>