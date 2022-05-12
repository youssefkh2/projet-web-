<?php
session_start();

	include 'C:/xampp/htdocs/integration/controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$listerec=$reclamationC->afficherrec(); 
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
    <title>Reclamation</title>


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
      <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/logo.svg" height="31"
            alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" aria-current="page" href="./afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./afficher_sponsors.php">Sponsors</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./afficherRES.php">Reservation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./afficherrec.php">Reclamation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../profile.php"> Profil</a></li>
              
              <div class="container">
          


            </ul>
            <?php
            if (isset($_SESSION["username"])) {
                echo "HEY, <strong>".$_SESSION["username"]."</strong>!";
            }
        ?>  
                      <a class="btn btn-warning ms-3" href="../logout.php">Deconnecter</a></div>   
        </div>
      </div>
    </nav>
              <div class="container">
          


            </ul>
            <!--<div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>$_COOKIE-->
           
                 
      </nav>
   
      

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->
        <div class="container">
          <div class="p-15 p-b-0">
          <?php 
        if (isset($_SESSION["adminFullname"])) {
            echo "HEY, <strong style='color:black'>".$_SESSION["adminFullname"]."</strong>!";
        }

        if(isset($_GET['recherche']))
        {
            $search_value=$_GET["recherche"];
            $listerec=$reclamationC->recherche($search_value);
        }



      ?>
                                  
                                
<br><br><br><br>


<button><a href="ajouterrec.php">Ajouter une reclamation </a></button>
<center><h1>Liste des reclamations </h1>

<form method="POST" action="trirec.php">
                                        <input type="submit"  name="trierasc" id="trierasc"  class="btn  btn-info" value="trierasc" ></input>
                                        <input type="submit"  name="trierdesc"  id="trierdesc"  class="btn  btn-info" value="trierdesc" ></input>
                                        
                                    
                                        </form>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print();">PDF</button>

</center>

      

<table border="1" align="center">
    
    <tr>
        <th>id_reclamation</th>
        <th>type_reclamation</th>
        <th>message</th>
        <th>Modifier</th>
        <th>Supprimer</th>
        <th>Reponse</th>


        <th colspan="2">
                                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="afficherrec.php">
                                                <div class="input-group">
                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher type reclamation "
                                                            aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit" value="Chercher">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </th>



    </tr>
    
  
    <?php

        foreach($listerec as $reclamation){
    ?>
    <tr>
        <td><?php echo $reclamation['id_reclamation']; ?></td>
        <td><?php echo $reclamation['type_reclamation']; ?></td>
        <td><?php echo $reclamation['message']; ?></td>
        
        
        <td>
            <a href="modifierrec.php?id=<?php echo $reclamation['id_reclamation']; ?>">Modifier</a>
        </td>
        <td>
            <a href="supprimerrec.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>">Supprimer</a>
        </td>
        <td>
            <a href="../../back/template/ajouterrep.php?id=<?php echo $reclamation['id_reclamation']; ?>">Reponse</a>
        </td>
       
    </tr>
  

    <?php
        }
    ?>

    
</table>

      
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