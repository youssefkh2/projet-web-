<?php
	include 'C:/xampp/htdocs/integration/config.php';
	include_once 'C:/xampp/htdocs/integration/model/reclamation.php';
	class reclamationC {
         public function afficherrec(){
			$sql="SELECT * FROM reclamations";
			$db = config::getConnexion();
			try{
				$listerec = $db->query($sql);
				return $listerec;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function supprimerrec($id_reclamation){
			$sql="DELETE FROM reclamations WHERE id_reclamation=:id_reclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_reclamation', $id_reclamation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        public function ajouterrec($reclamation){
			$sql="insert into reclamations(type_reclamation,message) 
			values (:type_reclamation,:message)";
			$db=config::getConnexion();
			try{
				$query =$db->prepare($sql);
				$query->execute([
			
					'type_reclamation'=>$reclamation->gettype_reclamation(),
					'message'=>$reclamation->getmessage(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
        function recupererreclamation($id_reclamation){
			$sql="SELECT * from reclamations where id_reclamation=:id_reclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id_reclamation',$id_reclamation);
				$query->execute();

				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		

		function getrecbyid($id)
        {
            $requete = "select * from reclamations where id_reclamation=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

		function recherche($search_value)
        {
            $sql="SELECT * FROM reclamations where type_reclamation like '$search_value' ";
        
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


		function triersponsorsDESC()
		{
			$sql = "SELECT * from reclamations ORDER BY id_reclamation DESC";
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
			$sql = "SELECT * from reclamations ORDER BY id_reclamation ASC";
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



		function modifierrec($reclamation, $id_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare('
					UPDATE reclamations SET 
						type_reclamation= :type_reclamation, 
						message=:message 
						
					WHERE id_reclamation= :id_reclamation'
				);
				$query->execute ([
					'type_reclamation' => $reclamation->gettype_reclamation(),
					'message' => $reclamation->getmessage(),
					'id_reclamation' => $id_reclamation,
				]);
			//	echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
        






		