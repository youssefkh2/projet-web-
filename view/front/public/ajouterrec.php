<?php
    include_once 'C:/xampp/htdocs/integration/Model/reclamation.php';
    include_once 'C:/xampp/htdocs/integration/controller/reclamationC.php';

    $error = "";

    // create adherent
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        //isset($_POST["id_reclamation"]) &&
		isset($_POST["type_reclamation"])	&&
        isset($_POST["message"]) 	
        
    ) {
        if (
            // !empty($_POST["id_reclamation"]) && 
			!empty($_POST["type_reclamation"]) && 
            !empty($_POST["message"]) 
        ) {
            $reclamation = new reclamation(
                //$_POST['id_reclamation'],
				$_POST['type_reclamation'],
                $_POST['message'],
            );
            $reclamationC->ajouterrec($reclamation);
            header('Location:afficherrec.php');
        }
        else
            $error = "Missing information";
    }
 

    
?>





<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ajouter votre reclamation</title>


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

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="afficherrec.php">Reclamation</a></li>
               
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
          </div>
        </div>
      </nav>
      

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        
        <form action="" method="POST">
            <table border="1" align="center">
            
<!-- 
           <tr> <td>  <label>id_reclamation</label>  </td> 
                   <td> <input type="int" name="id_reclamation" id="id_reclamation" > </td> </tr> -->
                
            <tr> <td>  <label>type_reclamation </label>  </td> 
                   <td> <input type="varchar" name="type_reclamation" id="type_reclamation" maxlength="100"> </td> </tr>
                  
                   <tr> <td>  <label>message </label>  </td> 

                   <td> <input type="varchar" name="message" id="message" maxlength="100"> </td> </tr>
                          
                <tr> <td> <input type="submit" name="submit" value="submit"></td></tr>
            </table>
        </form>
      
        
      


    

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