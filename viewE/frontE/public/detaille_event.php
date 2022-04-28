<?php
include('../../../modelE/evenement.php');
include('../../../controllerE/evenementC.php');
include('../../../modelE/categorie.php');

include('../../../controllerE/CategorieC.php');
  $error = "";

  // create adherent
  $evenement = null;

  // create an instance of the controller
  $evenementC = new evenementC();
  $CategorieC=new CategorieC();


$listecategorie=$CategorieC->afficherCategories(); 
  if (
      isset($_POST["nom_event"]) &&
      isset($_POST["date"]) &&		
      isset($_POST["lieu"]) &&
      isset($_POST["heure"]) &&
      isset($_POST["id_cat"])&&
      isset($_POST["image"])
  ) {
      
          $evenement = new evenement(
              $_POST["nom_event"],
              $_POST["date"],
              $_POST["lieu"], 
              $_POST["heure"], 
              $_POST["id_cat"],
              $_POST["image"]
          );
         
     
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
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">Sponsors</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Reservation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Reclamation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing"> Profil</a></li>
              
             <!--<li class="nav-item"><select ><option value="cafe">Cafe</option><option value="sport">Sport</option></select></li>--> 
              
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
          </div>
        </div>
      </nav>
      <?php
			if (isset($_GET['id_event'])){
				$evenement = $evenementC->recupererEvenement($_GET['id_event']);
            
		?>
        
        
        <form action="" method="POST">
            
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
            
           <?php foreach($listecategorie as $categorie) ?>
                            <p class="mb-6 lead text-secondary"value="<?php echo $categorie['id_cat']; ?>"><?php echo  $categorie['Nom']; ?>-<?php echo $evenement['id_cat'].$categorie['Nom']; ?></p>
                           
                    
              <h5 class="mb-4 fs-9 fw-bold">
              <label for="nom_event"><?php echo $evenement['nom_event'];?></label>
              </h5>
              <p class="mb-6 lead text-secondary"><br class="d-none d-xl-block" />localisation:<br class="d-none d-xl-block" /><?php echo $evenement['lieu'];?></p>

              <p class="mb-6 lead text-secondary"><br class="d-none d-xl-block" />Horaire<br class="d-none d-xl-block" /><?php echo $evenement['heure'];?></p>
              <p class="mb-6 lead text-secondary"><br class="d-none d-xl-block" />Date : <br class="d-none d-xl-block" /><?php echo $evenement['date'];?></p>
          
          <!--Condition sur la date de reservation-->
          <?php

           $datejour = date('Y-m-d');
           $dateev= $evenement['date'];
           
           
           if ($datejour < $dateev ){
           
           ?>
              
              <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#!" role="button">Reserver</a></div>
             
             <?php
           }
           else{
             
            $dateDifference = abs(strtotime($dateev) - strtotime($datejour));

            $years  = floor($dateDifference / (365 * 60 * 60 * 24));
            $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
            if($years==0 && $months!=0 && $days!=0)
            {echo "Cette événement est fini il y a ".$months." mois et ".$days." jours";}
            else if(($years==0) && ($months==0) && $days!=0)
            {echo "Cette événement est fini il y a ".$days." jours";}
            else{
            echo "Cette événement est fini il y a ".$years." année,  ".$months." mois et ".$days." jours";}
            
           }
           ?>
            </div>
            <div class="col-md-6 text-end" ><?php echo'<img class="pt-7 pt-md-0 img-fluid" src="photoEv/'.$evenement['image'].'"width="700;" height="800" alt="image">' ?></div>

            </div>
        </div>
        <?php
            }
            ?>




      </section>


    


    

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