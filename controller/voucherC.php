<?php
	include 'C:/xampp/htdocs/integration/config.php';
	include_once 'C:/xampp/htdocs/integration/model/voucherMod.php';
	class VoucherC {
		
        function random_code($length)
        {
        
            $text = "";
            if($length < 5)
            {
                $length = 5;
            }
        
            $len = rand(4,$length);
        
            for ($i=0; $i < $len; $i++) { 
                # code...
        
                $text .= rand(0,9);
            }
        
            return $text;
        }

        function afficherCinRes()
        {
          $sql="SELECT * FROM voucher";
		  $db = config::getConnexion();
			try {
              $liste = $db->query($sql);
               return $liste;
           } catch(Exception $e)
           {
               die('erreur'.$e->getMessage());
           }
		}


        
        function supprimerVoucher($code){
			$sql="DELETE FROM voucher WHERE code=:code";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':code', $code);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterVoucher($voucher){
			$sql="INSERT INTO voucher (date_limite,avertissement,cinClient,codeVoucher) 
			VALUES (:date_limite, :avertissement, :cinClient, :codeVoucher)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'date_limite' => $voucher->getdatelimite(),
					'avertissement' => $voucher->getavertissement(),
					'cinClient' => $voucher->getcinclient(),
					'codeVoucher' => $voucher->getCodeVoucher()
					//'code' => $voucher->getcode(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		
		
		function modifierVoucher($voucher, $code){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE voucher SET 
						date_limite=:date_limite, 
						avertissement=:avertissement						
					WHERE code=:code'
				);
				$query->execute([
					'date_limite' => $voucher->getdatelimite(),
					'avertissement' => $voucher->getavertissement(),
					'code' => $code
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>
