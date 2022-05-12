<?php
	include 'C:\xampp\htdocs\integration\config.php';
	//include 'C:\xampp\htdocs\Projet_Web_Diversity\modelS\sponsors.php';
	class sponsorsC{
		function affichersponsors(){
			$sql="SELECT * FROM sponsors";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		// Fonction Supprimer
		function supprimersponsors($id){
			$sql="DELETE FROM sponsors WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		// FonctionAjout
		function ajoutersponsors($sponsors){
			
			$sql="INSERT INTO sponsors (nom,type,numero ,email ,inves ,image ,descrip ) 
			VALUES (:nom ,:type ,:numero ,:email ,:inves ,:image ,:descrip )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				
				$query->execute([
					//'id' => $sponsors->getid(),
					'nom' => $sponsors->getNom(),
					'type' => $sponsors->gettype(),
					'numero' => $sponsors->getnumero(),
                    'email'=> $sponsors-> getEmail(),
                    'inves'=> $sponsors->getinves(),
					'image'=> $sponsors->getimage(),
                    'descrip'=> $sponsors->getdescrip()
				]);
						
			}
			catch (Exception $e){
				die ('Erreur: '.$e->getMessage());
			}			
		}
		// GET BY ID
		function recuperersponsors($id){
			$sql="SELECT * from sponsors where id =$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$sponsors=$query->fetch();
				return $sponsors;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiersponsors($sponsors, $id){
			
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE sponsors SET 

						 nom=:nom,
						type=:type,
						numero=:numero,
						email=:email,
						inves=:inves,
						image=:image,
						descrip=:descrip
						
					WHERE id=:id"
				);
				
				$query->execute([
					
					'id' => intval($id),
					'nom' => $sponsors->getNom(),
					'type' => $sponsors->gettype(),
					'numero' => $sponsors->getnumero(),
                    'email'=> $sponsors-> getEmail(),
                    'inves'=> $sponsors->getinves(),
					'image'=> $sponsors->getimage(),
                    'descrip'=> $sponsors->getdescrip(),
                    
					
					//'id' => $id

					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die ($e->getMessage());
			}
		}
		function triersponsorsDESC()
		{
		$sql = "SELECT * from sponsors ORDER BY  numero DESC";
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
		$sql = "SELECT * from sponsors ORDER BY numero ASC";
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
            $sql="SELECT * FROM sponsors WHERE nom LIKE '$search_value' OR id LIKE '$search_value' OR numero LIKE '$search_value' ";
        
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