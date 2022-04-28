<?php
	include_once 'C:\xampp\htdocs\Projet_Web_Diversity\config2.php';
	require_once '../../../modelS/demande.php';
	class demande_spC{
		function afficherdemande_sp(){
			$sql="SELECT * FROM demande_sp";
			$db = config2::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		// Fonction Supprimer
		function supprimerdemande_sp($id_sp){
			$sql="DELETE FROM demande_sp WHERE id_sp=:id_sp";
			$db = config2::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_sp', $id_sp);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		// FonctionAjout
		function ajouterdemande_sp($demande_sp){
			
			$sql="INSERT INTO demande_sp (id_sp,id_event,num_tlf,email,date_debut,date_fin) 
			VALUES (:id_sp,:id_event,:num_tlf,:email,:date_debut,:date_fin )";
			$db = config2::getConnexion();
			try{
				$query = $db->prepare($sql);
				
				$query->execute([
					'id_sp' => $demande_sp->getid_sp(),
					'id_event' => $demande_sp->getid_event(),
					'num_tlf' => $demande_sp->getnum_tlf(),
					'email' => $demande_sp->getemail(),
					'date_debut' => $demande_sp->getdate_debut(),
					'date_fin' => $demande_sp->getdate_fin(),

				]);
						
			}
			catch (Exception $e){
				die ('Erreur: '.$e->getMessage());
			}			
		}
		// GET BY id_sp
		function recupererdemande_sp($id_sp){
			$sql="SELECT * from demande_sp where id_sp =$id_sp";
			$db = config2::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$demande_sp=$query->fetch();
				return $demande_sp;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierdemande_sp($demande_sp, $id_sp){
			try {
				$db = config2::getConnexion();
				$query = $db->prepare(
					"UPDATE demande_sp SET 

						id_event=:id_event,
						num_tlf=:num_tlf,
						email=:email,
						date_debut=:date_debut,
						date_fin=:date_fin

					WHERE id_sp= :id_sp"
				);
				$query->execute([
					
					'id_sp'=> intval($id_sp),
					'id_event'=> $demande_sp->getid_event(),
					'num_tlf'=> $demande_sp->getnum_tlf(),
					'email'=> $demande_sp->getemail(),
					'date_debut'=> $demande_sp->getdate_debut(),
					'date_fin'=> $demande_sp->getdate_fin(),

				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		function trierdemande_spDESC()
		{
		$sql = "SELECT * from demande_sp ORDER BY  num_tlf DESC";
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


		function trierdemande_spASC()
		{
		$sql = "SELECT * from demande_sp ORDER BY num_tlf ASC";
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




	}
?>