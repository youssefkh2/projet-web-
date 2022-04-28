<?php
  
  include('../../../controllerE/CategorieC.php');
  include('../../../controllerE/evenementC.php');
   
  $CategorieC=new CategorieC();
    $error = "";

    $evenement = null;

    $evenementC = new evenementC();
    $listecategorie=$CategorieC->afficherCategories(); 

	$listeevenement=$evenementC->afficherEvenement(); 


    if(isset($_POST['trierdesc']))
    {
    $listeevenement=$evenementC->triereventsDESC();
    session_start();
    }
    else {
        $listeevenement=$evenementC->triereventsASC();
        session_start();
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
    <title>Evenement</title>


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
            <!--<div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>$_COOKIE-->
           
                  <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search"  />
                   <div class="input-group-append">
                     
          </div>
        </div>
      </nav>
      

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="p-15 p-b-0">
          <form method="POST" action="trieev.php">
             <input type="submit"  name="trierasc" id="trierasc"  class="btn  btn-info" value="trierasc" ></input>
             <input type="submit"  name="trierdesc"  id="trierdesc"  class="btn  btn-info" value="trierdesc" ></input>
          </form>
         </div>
        <div  align="right" >
        
          <label>Type d'evenement :</label>
          
          <select >
          <?php
				foreach($listecategorie as $categorie){
			?>
			<tr>
              <option value="type"><?php echo $categorie['Nom']; ?></option>
              <?php
				}
			?>
                </select>
                </div>
          
            
          <h2 class="mb-2 fs-7 fw-bold">Evenement</h2>
          
          <input type="text" data-spec="input-field-input-element" class="eds-field-styled__input" id="locationPicker" name="locationPicker" value="" role="combobox" aria-expanded="false" aria-autocomplete="list" autocomplete="off" tabindex="0" placeholder="Locliser votre place">
          <br>
          <br>
          <div class="row">
            <br>
            <!--
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon1.jpg" width="200" height="200" alt="Feature" />
              <h4 class="mb-3">KaraoKe</h4>
              <p class="mb-0 fw-medium text-secondary">karaoke<br> tunis :lac 1 <br> 16:00</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon2.png" width="200" height="200" alt="Feature" />
              <h4 class="mb-3">hadhret lemdina</h4>
              <p class="mb-0 fw-medium text-secondary">hadhra<br> gammarth <br> 18:00</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon3.jpg" width="200" height="200" alt="Feature" />
              <h4 class="mb-3">tennis</h4>
              <p class="mb-0 fw-medium text-secondary">tennis<br> menzah 1 <br>17:00<br>1 joueurs</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon4.jpg" width="200" height="200" alt="Feature" />
              <h4 class="mb-3">echecs</h4>
              <p class="mb-0 fw-medium text-secondary">jeux<br> nasser:cafee Mirana<br>17:00<br> 1joueurs</be></p>
            </div>
          </div>

      -->
      <?php
				foreach($listeevenement as $evenement){
          
			?>
      <table border="2" align="center">
        <!--<td rowspan="4">image</td>-->
        
          <tr>
      <tr>
				<th><?php echo $evenement['nom_event']; ?></th>
        
        <td rowspan="4"><?php echo'<img src="photoEv/'.$evenement['image'].'"width="200;" height="120" alt="image">' ?></td>
        <td rowspan="4"> 
        <button class="btn-warning btn"> <a href="detaille_event.php?id_event=<?php echo $evenement['id_event'] ; ?>" class="text-white"> plus de détaille</a> </button>
          <button class="btn-success btn"> <a href="modifier_evenement.php?id_event=<?php echo $evenement['id_event'] ; ?>" class="text-white"> Update </a> </button>
          <button class="btn-danger btn"> <a href="supprimer_evenement.php?id_event=<?php echo $evenement['id_event'] ; ?>" class="text-white"> Delete </a>  </button>
					
        </td>
			</tr>
      
     
			<tr>
        <td><?php echo $evenement['date']; ?></td>
      </tr>
      <tr>
        <td><?php echo $evenement['lieu']; ?></td>
      </tr>
      <tr>
        <td><?php echo $evenement['heure']; ?></td>
        
      </tr>
        </tr>
        
       
        
       
      </table>
      </tr>
      <?php
				}
			?>	
      <hr>
      	<div class="text-center"><a class="btn btn-warning" role="button" href="ajouter_evenement.php">ajouter Evenement</a></div>
        </div><!-- end of .container
        <!--
          <td> <button class="btn-success btn"> <a href="modifier_categorie.php?id_cat=<?php echo $categorie['id_cat'] ; ?>" class="text-white"> Update </a> </button> </td>
          <td> <button class="btn-danger btn"> <a href="supprimer_categorie.php?id_cat=<?php echo $categorie['id_cat'] ; ?>" class="text-white"> Delete </a>  </button> </td>
					->
					</form>

			
			
		</table>
          <div class="text-center"><a class="btn btn-warning" href="#!" role="button">ajouter Evenement</a></div>
        </div><!-- end of .container-->

      
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