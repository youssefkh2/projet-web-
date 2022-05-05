<?php
 include('../../../modelE/evenement.php');
 include('../../../controllerE/evenementC.php');
 include('../../../modelE/categorie.php');
 
 include('../../../controllerE/CategorieC.php');

 $error = "";

 // create adherent
 $evenement=null;

 $evenementC = new evenementC();

 // create an instance of the controller
 $CategorieC=new CategorieC();


 $listecategorie=$CategorieC->afficherCategories(); 
 
 if (
     isset($_POST["nom_event"]) &&
     isset($_POST["date"]) &&		
     isset($_POST["lieu"]) &&
     isset($_POST["heure"]) &&
     isset($_POST["id_cat"])
 ) {
     if (
         !empty($_POST["nom_event"]) && 
         !empty($_POST["date"]) &&
         !empty($_POST["lieu"]) && 
         !empty($_POST["heure"])  && 
         !empty($_POST["id_cat"])
     ) {
         $evenement = new evenement(
             $_POST["id_event"],
             $_POST["nom_event"],
             $_POST["date"],
             $_POST["lieu"], 
             $_POST["heure"], 
             $_POST["id_cat"]
         );
         $evenementC->ajouterEvenement($evenement);

         header('Location:afficher_evenement.php');
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

        

        <button><a href="afficher_evenement.php">Retour</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
        
                    <td>
                        <label for="nom_event">Nom du evenement:
                        </label>
                    </td>
                    <td><input type="text" name="nom_event" id="nom_event" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date de l'evenement:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" >
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label for="lieu">lieu:</label>
                    </td>
                    <td><input type="text" name="lieu" id="lieu" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="heure">heure:</label>
                    </td>
                    <td>
                        <input type="text" name="heure" id="heure">
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <label for="id_cat">categorie:
                        </label>
                    </td>
                    <td>
                    <select name="id_cat" id="id_cat">
                        <?php
				            foreach($listecategorie as $categorie){
			            ?>
			
                            <option value="<?php echo $categorie['id_cat']; ?>"><?php echo  $categorie['Nom']; ?>-<?php echo $categorie['id_cat']; ?></option>
                        <?php
			                	}
			            ?>
                    </select>
                    </td>
                </tr>        
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-light" type="submit" > Ajouter </button>
                    </td>
                    
                </tr>
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