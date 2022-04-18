<?php
	include 'C:/xampp/htdocs/projet_diversify/config.php';
	include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
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

	}
?>
