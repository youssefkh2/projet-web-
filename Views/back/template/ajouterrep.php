

<?php

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/Reclamation/Views/back/template/PHPMailer-master/src/Exception.php';
require 'C:/xampp/htdocs/Reclamation/Views/back/template/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/Reclamation/Views/back/template/PHPMailer-master/src/SMTP.php';

include_once 'C:/xampp/htdocs/Reclamation/Models/reponse.php';
    include_once 'C:/xampp/htdocs/Reclamation/controler/reponseC.php';


$a=$_GET['id'];

if (isset($_POST['contenu'] )  &&  isset($_POST["feedback"] )) 
{   
        
         $reponse = new reponse(NULL, $a, $_POST['contenu'],
          $_POST['feedback']);
        $reponseC = new reponseC();
        $reponseC->ajouterreponse($reponse);
        header('Location:afficherrep.php');
       
        $mail = new PHPMailer;
                 
                 $mail->SMTPDebug = 3;                               // Enable verbose debug output
                 
                 $mail->isSMTP();                                      // Set mailer to use SMTP
                 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                 $mail->SMTPAuth = true;                               // Enable SMTP authentication
                 $mail->Username = 'maleksamtini@gmail.com';                 // SMTP username
                 $mail->Password = 'mk142001';                           // SMTP password
                 //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
                 $mail->Port = 587;                                    // TCP port to connect to
                 
                 $mail->From='maleksamtini@gmail.com';
                 $mail->FromName="malekksamtini";
                 $mail->addAddress('maleksamtini@gmail.com', 'malekksamtini');     // Add a recipient
                 $mail->isHTML(true);                                  // Set email format to HTML
                 
                 $mail->Subject = 'verification';
                 $mail->Body    = 'on a pris en considération votre reclamation :</b> veuillez consulter notre reponse s ';
                 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                 mail("maleksamtini@gmail.com","test","confirmation","maleksamtini@gmail.com");
                 if(!$mail->send()) {
                     echo 'Message could not be sent.';
                     echo 'Mailer Error: ' . $mail->ErrorInfo;
                 } else {
                     echo 'Message has been sent';
                 }



}


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Divertify </title>
    <style>
        
    .main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
  margin:10px;
}
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

table.customTable {
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #E9F8F7;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #E9F8F7;
  border-style: solid;
  padding: 5px;
}

table.customTable thead {
  background-color: #FFE0EB;
}
.navbar a.right {
  float: right;
  color: black;
}

    </style>
</head>
<body>
    
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../back-front/backoffice.php">Divertify</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    <a href="#" class="right">
      <?php 
        if (isset($_SESSION["adminFullname"])) {
            echo "HEY, <strong style='color:black'>".$_SESSION["adminFullname"]."</strong>!";
        }
      ?>
  </a>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-comments"></i>Forum <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" >
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichertopic.php">Topics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichercomments.php">Comments</a>
                                </li>
</ul>
</div>
</li>
         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->

<br><br><br><br>
	    <button><a href="ajouterrec.php">Ajouter une reclamation </a></button>
		<center><h1>Liste des reclamations </h1></center>
    

         <form action="" method="POST">
            <table border="1" align="center">
            
                
            <tr> <td>  <label>contenu </label>  </td> 
                   <td> <input type="text" name="contenu" id="contenu" maxlength="100"> </td> </tr>
                  
                   <tr> <td>  <label>feedback </label>  </td> 
                    <!-- <td> <input type="submit" name="like" value="like"></td>
                <td> <input type="submit" name="dislike" value="dislike"></td></tr> -->
                   <td> <input type="text" name="feedback" id="feedback" maxlength="100"> </td> </tr>
                          
                <tr> <td> <input type="submit" name="submit" value="submit"></td></tr>
                
            </table>
        </form>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br>
		<br><br><br><br><br>
        <br><br><br><br>


</html>