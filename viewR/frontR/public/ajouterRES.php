<?php
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
    include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php'; 
   // include_once 'C:/xampp/htdocs/projet_diversify/controllerR/voucherC.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/projet_diversify/viewR/frontR/public/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/projet_diversify/viewR/frontR/public/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/projet_diversify/viewR/frontR/public/PHPMailer-master/src/SMTP.php';  
    $error = "";
    $sum=0;
    // create adherent
    $reservation = null;
    //$voucher = null;
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
            header('Location:afficherRES.php');
            $sum = $_POST['adulte']+$_POST['enfant'];
            // while ($reservation = fetch($reservation['adulte']) || $reservation = fetch( $reservation['enfant'])){ $sum = $reservation['adulte']+ $reservation['enfant']; } 
            // echo $sum;
     
           /* $to = "youssefkhemakhem2001@gmail.com";
			   $subject = "mail de confirmation";
			   $message = "<b>confirmer votre reservation :click ici.</b>"; 
			   $header = "From:youssefkhemakhem2001@gmail.com \r\n";
			   //$header .= "Cc:youssefkhemakhem2001@gmail.com \r\n";
			   //$header .= "MIME-Version: 1.0\r\n";
			   //$header .= "Content-type: text/html;\r\n";
			   mail($to,$subject,$message,$header);*/

         $mail = new PHPMailer;
         
         $mail->SMTPDebug = 3;                               // Enable verbose debug output
         
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'helamoalla91@gmail.com';                 // SMTP username
         $mail->Password = '54023788Hh';                           // SMTP password
         //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 587;                                    // TCP port to connect to
         
         $mail->From='helamoalla91@gmail.com';
         $mail->FromName="helamoalla";
         $mail->addAddress('helamoalla91@gmail.com', 'helamoalla');     // Add a recipient
         $mail->isHTML(true);                                  // Set email format to HTML
         
         $mail->Subject = 'verification';
         $mail->Body    = 'verifier reservation, nombre de personne :</b>'. $sum.' veuillez attendre un autre email de confirmation et un voucher ';
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         mail("helamoalla91@gmail.com","test","confirmation","helamoalla91@gmail.com");
         if(!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
             echo 'Message has been sent';
         }




          // header('Location:afficherRES.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Diversify | Design Agency Landing Page UI</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">Sponsors</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="reservation.html">Reservation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Reclamation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing"> Profil</a></li>
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
          </div>
        </div>
      </nav>
        <button type="button" class="btn btn-primary"> <a href="afficherRES.php">Retour à la liste des reservations</a></button> 
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table  align="center">
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
                    <td><input type="date" name="date_res" id="date_res" maxlength="10"></td>
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
    
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>

