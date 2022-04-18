<?php
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
    include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php'; 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/projet_diversify/viewR/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/projet_diversify/viewR/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/projet_diversify/viewR/PHPMailer-master/src/SMTP.php';  
    $error = "";

    // create adherent
    $reservation = null;

    // create an instance of the controller
    $reservationC = new ReservationC();
    if (
        isset($_POST["cin_client"]) &&
		isset($_POST["date_res"]) &&		
        isset($_POST["adulte"]) &&
		isset($_POST["enfant"]) && 
        isset($_POST["id_event"])
    ) {
        if (
            !empty($_POST["cin_client"]) && 
			!empty($_POST['date_res']) &&
            !empty($_POST["adulte"]) && 
			!empty($_POST["enfant"]) && 
            !empty($_POST["id_event"])
        ) {
            $reservation = new Reservation(
                $_POST['cin_client'],
				$_POST['date_res'],
                $_POST['adulte'], 
				$_POST['enfant'],
                $_POST['id_event']
            );
            $reservationC->ajouterReservation($reservation);
            $mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'ssl0.ovh.net';               //Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;                          //Port TCP du serveur SMTP
$mail->SMTPAuth = 1;                        //Utiliser l'identification

if($mail->SMTPAuth){
   $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'youssefkhemakhem2001@gmail.com';   //Adresse email à utiliser
   $mail->Password   =  'Youssef123456';         //Mot de passe de l'adresse email à utiliser
}
$mail->CharSet = 'UTF-8';
$mail->smtpConnect();
$mail->From       =  'youssefkhemakhem2001@gmail.com';                //L'email à afficher pour l'envoi
$mail->FromName   = 'Contact de gmail.com';             //L'alias à afficher pour l'envoi
$mail->Subject    =  'Mon sujet';                      //Le sujet du mail
$mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
$mail->AltBody = 'Mon message en texte brut'; 	       //Texte brut
$mail->IsHTML(false);                                  //Préciser qu'il faut utiliser le texte brut
if (!$mail->send()) {
    echo $mail->ErrorInfo;
} else{
    echo 'Message bien envoyé';
}
           /* $to = "youssefkhemakhem2001@gmail.com";
			   $subject = "mail de confirmation";
			   $message = "<b>confirmer votre reservation :click ici.</b>"; 
			   $header = "From:youssefkhemakhem2001@gmail.com \r\n";
			   //$header .= "Cc:youssefkhemakhem2001@gmail.com \r\n";
			   //$header .= "MIME-Version: 1.0\r\n";
			   //$header .= "Content-type: text/html;\r\n";
			   mail($to,$subject,$message,$header);*/
            header('Location:afficherRES.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherRES.php">Retour à la liste des reservations</a></button> 
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="cin_client">cin client:
                        </label>
                    </td>
                    <td><input type="text" name="cin_client" id="cin_client" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="date_res">date reservation:
                        </label>
                    </td>
                    <td><input type="text" name="date_res" id="date_res" maxlength="10"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adulte">adulte:
                        </label>
                    </td>
                    <td><input type="text" name="adulte" id="adulte" maxlength="1"></td>
                </tr>
                <tr>
                    <td>
                        <label for="enfant">enfant:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="enfant" id="enfant" maxlength="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="id_event">id evenement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="id_event" id="id_event">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Reserver"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>