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
      <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31"
            alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
           
            <li class="nav-item"><a class="nav-link" aria-current="page" href="sponsor.html">Gestion_Sponors</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="afficherrec.php">Reclamation</a></li>
            
          </ul>
          <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a
              class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
        </div>
      </div>
    </nav>

    <!--**********************
   -->
    <!-- <video width="320" height="240" controls>
      <source src="C:\Users\sassi\Desktop"  type=video/ogg> <source src="/build/videos/arcnet.io(7-sec).mp4" type=video/mp4>
    </video> -->
    <!-- <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fgfycat.com%2Fdeterminedunsunganhinga&psig
    =AOvVaw1wir5SDOEWucDAlfizRGgy&ust=1649808705077000&source=images&cd=vfe&ved=0CAoQjRxqFwoTCIia48OejfcCFQAAAAAdAAAAABAK">
     -->
   
    
    <!-- <video controls>
      <source src="C:\Users\sassi\Desktop" type="video/mp4">
      <source src="C:\Users\sassi\Desktop" type="video/webm">
      <p>Votre navigateur ne prend pas en charge les vidéos HTML5.
         Voici <a href="myVideo.mp4">un lien pour télécharger la vidéo</a>.</p>
    </video> -->

    <!--****************************************************  -->


    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    
    <!-- <section> close ============================-->
    <!-- ============================================-->
    <!-- 
    <table>
      <tr>
          <th><div  align="left" >sp-adidas</div></th>
          <th><div  align="left" >sp-castrol-NFL</div></th>
          <th><div  align="left" >sp-itau</div></th>
      </tr>   
      <tr>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\adidas.png" height="30%" width="12%" alt="image1"> </td>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\castrol-NFL.PNG"   height="15%" width="12%"alt="image2"> </td>
        <td> <img src="C:\Users\sassi\Desktop\projet webb\photo sponsor\itau.PNG" height="15%" width="12%"alt="image2" alt="image3"> </td>
     
     </tr>   
     <tr>
         <td>  Adidas est une firme allemande fondée en 1949 par Adolf Dassler,<br> spécialisée dans la fabrication d'articles de sport, <br>basée à Herzogenaurach en Allemagne.<br> Elle est mondialement connue sous l'appellation<br> « la marque aux trois bandes »,<br> des trois bandes parallèles qui constituent son logo.<br></td>
         <td> view </td>
         <td> view </td>
     
     
     
     </tr>
       
     </table>-->
     <div class="col-12 grid-margin stretch-card">
         <div class="card"></div>
         <?php echo $error; ?>
     
     <form action="contact.php" class="form-material" method="POST">
        <p class="card-description"></p>
        <form class="forms-sample">
          

          <div class="form-group">

            <label class="float-label">Id_demande</label>
            
            <br><br>
            <span class="form-bar"></span>
            <input type="number" id="id_sp" name="id_sp" class="form-control" required="">

            <p id="errorName" class="erreur"></p>

          </div>
          <div class="form-group">
            <label class="col-sm-2 col-form-label">Id_event</label>
            <input type="number" id="id_event" name="id_event" class="form-control" required="">
            <p id="errorName" class="erreur"></p>
              
           
          </div>
          <div class="form-group">
            <label class="float-label">Tel Number</label>
            <br><br>
            <span class="form-bar"></span>
            <input type="number" id="num_tlf" name="num_tlf" class="form-control" required=""
              maxlength="11" onblur="numBer()">
            <p id="errorNBM" class="erreur"></p>
          </div>
          <div class="form-group ">
            <label class="float-label"> Mail Adress</label>
            <br><br>
            <input type="string" id="email" name="email" class="form-control" required=""
              onblur="saisirMail()" placeholder="Please enter a Valid Adress">
            <span class="form-bar"></span>
           
            <p id="errorMR" class="erreur"></p>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-form-label">Date_debut</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" required="">
            <p id="errorName" class="erreur"></p>
              
           
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-form-label">Date_Fin</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control" required="">
            <p id="errorName" class="erreur"></p>
              
           
          </div>
         
          
          
          
          <button  class="btn btn-primary btn-lg btn-block" type="submit">Envoyer une demande</a></button>
          
     
</div>

        </form>

    </div>



























    <!-- ============================================-->
    <!-- <section> begin ============================-->

  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
    rel="stylesheet">
</body>

</html>