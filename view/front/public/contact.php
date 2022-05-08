<?php
    include_once '../../../model/demande.php';
    include_once '../../../controller/demandeC.php';
    

 
   

    $error = "";

    // create product
    $demande_sp = null;

    // create an instance of the controller
    $demande_spC= new demande_spC();
   
    

    if (
         //isset($_POST["id_sp"]) &&
	      isset($_POST["id_event"]) &&
        isset($_POST["num_tlf"]) && 
        isset($_POST["email"])&& 
        isset($_POST["date_debut"])&& 
        isset($_POST["date_fin"])  
        
      
    ) {
        if (
           
			
           // !empty($_POST["id_sp"]) &&
            !empty($_POST["id_event"]) &&
            !empty($_POST["num_tlf"]) && 
            !empty($_POST["email"])&& 
            !empty($_POST["date_debut"])&& 
            !empty($_POST["date_fin"])  
     
        ) {
            $demande_sp = new demande_sp(
            $_POST["id_sp"],
            $_POST["id_event"],
            $_POST["num_tlf"],
            $_POST["email"],
            $_POST["date_debut"],
            $_POST["date_fin"]
         
            );


            $demande_spC->ajouterdemande_sp($demande_sp);
            
            header('Location:afficher_sponsors.php');

        }
        else
            $error = "Missing information";
    }

   

    
  ?>





  
 







<?php
$to=$_POST['email'];
$subject="confirmation";

//$message="confirmer*****";

$form="sassiali960@gmail.com"; 
$fromName = 'Divertissement'; 

// Attachment file QR
require_once '../phpqrcode/qrlib.php';

$path='../qrimages/';
$file=$path.uniqid().".png";

$text="id event:".$_POST["id_event"]."  votre email:".$_POST["email"]." votre numero:".$_POST["num_tlf"];
QRcode::png($text,$file,'L',10,2); 

$htmlContent = ' 
    <h3>Demande Sponsoring</h3> 
    <p>Salut '.$_POST["email"].'
    Votre demande est Confirmer .
    Vous trouvez votre details dans la pièce jointe.    

    Merci Divertissement
    </p> 
'; 

// Header for sender info 
$headers = "From: ".$fromName." <".$from.">"; 
 

// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 



// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 



// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 



// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 


// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);

  if($mail_sent==true)
  {
    echo "Mail Sent. Thank you " ;
    header('Location:afficher_sponsors.php');

  }
  else {
      echo "Mail failed"; 
      header('Location:afficher_sponsors.php');

      
  }
  

?>

