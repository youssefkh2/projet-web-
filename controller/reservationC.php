<?php
	include_once 'C:/xampp/htdocs/integration/controller/voucherC.php';
	include_once 'C:/xampp/htdocs/integration/model/reservationMod.php';
	include_once 'C:/xampp/htdocs/integration/model/voucherMod.php';
	class ReservationC {
		function trier($date_res)
		{$sql="SELECT * FROM reservation ORDER by date_res desc";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				while($reservation=$sql->fetch_object())
				{
					$reservation->afficherReservation();
				}
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
		function rechercher($cin_client)
    {
        
        $sql = "SELECT * from reservation WHERE cin_client=:cin_client ";
        
        try {
            $db = config::getConnection();
            $query = $db->prepare($sql);
            $query->execute();
            $liste = $query->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}
function afficherreservationC($cin_client)
{

	$sql="SELECT * from reservation where cin_client ='$cin_client'";

	$db = config::getConnexion();
	try
	{
		$list=$db->query($sql);
		return $list;
	}
	catch (Exception $e)
	{
		die('Erreur: '.$e->getMessage());
	}
}
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

		function recupererReservationCIN($cin){
			$sql="SELECT * FROM reservation WHERE CIN=:cin";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':cin', $cin);
			try{
				return $req->execute();
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
		function triersponsorsDESC()
		{
			$sql = "SELECT * from reservation ORDER BY date_res DESC";
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
		function triersponsorsASC()
		{
			$sql = "SELECT * from reservation ORDER BY date_res ASC";
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
		function modifierReservation($reservation, $cin_client){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
						date_res=:date_res, 
						adulte=:adulte, 
						enfant=:enfant
					WHERE cin_client=:cin_client'
				);
				$query->execute([
					'date_res' => $reservation->getdateRes(),
					'adulte' => $reservation->getadulte(),
					'enfant' => $reservation->getenfant(),
					'cin_client' => $cin_client
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>