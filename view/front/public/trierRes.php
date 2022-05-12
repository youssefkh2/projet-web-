<?php
  
  include_once 'C:/xampp/htdocs/integration/controller/reservationC.php';
  //include('../../../controllerS/demandeC.php');
 
  $reservationC = new ReservationC();
 // $demande_spC = new demande_spC();
  
  $listeReservation=$reservationC->afficherReservation(); 
 // $listedemande_sp=$demande_spC->afficherdemande_sp(); 

  if(isset($_POST['trierdesc']))
    {
    $listeReservation=$reservationC->triersponsorsDESC();
    session_start();
    }
    else {
        $listeReservation=$reservationC->triersponsorsASC();
        session_start();
    }

    
//     if(isset($_POST['trierdesc']))
//     {
//     $listedemande_sp=$demande_spC->trierdemande_spDESC();
//    // session_start();
//     }
//     else {
//         $listedemande_sp=$demande_spC->trierdemande_spASC();
//         session_start();
//     }
?>
<!DOCTYPE html>
<html>
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
    <meta name="msapplication-TileImage" content="templateF/public/assets/img/favicons/mstile-150x150.png">
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
            <li class="nav-item"><a class="nav-link" aria-current="page" href="afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="afficherrec.php">Reclamation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="afficherRES.php">Reservation</a></li>
  
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="#!">Se Connecter</a><a class="btn btn-warning ms-3" href="#!">Deconnecter</a></div>
          </div>
        </div>
      </nav>
      <center> <form class="form-material" action = "recherche.php" method ="GET">
                                                            
                                                        
                                                        <div class="form-group form-primary">
                                                            <div class="col-sm-4">
                                                            <label class="float-label"><i class="fa fa-search m-r-10"></i>Search reservation</label>
                                                                <input type = "search" name ="terme" class="form-control" required="">
                                                                
                                                                <span class="form-bar"></span>
                                                                
                                                            </div>
                                                        </div>
                                                        <input  class="btn  btn-info waves-effect waves-light" type = "submit" name = "s" value = "Rechercher">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </form>

                        <form method="POST" action="trierRES.php">
                                                <input type="submit"  name="trierasc" id="trierasc"  class="btn  btn-info" value="trierasc" ></input>
                                                <input type="submit"  name="trierdesc"  id="trierdesc"  class="btn  btn-info" value="trierdesc" ></input>
                                                
                                            
                                                </form></center>

                                                
                                                <br>
                                                <br>
                    
        
                    <div class="#">
                      
                      <table class="table table-bordered">
                        
                          <tr>
                 <th>cin_client</th>
				<th>date_res</th>
				<th>adulte</th>
				<th>enfant</th>
				<th>id_event</th>
                <th>modifier</th>
				<th>supprimer</th>

                            
                            
                          </tr>
                          <?php
				                       foreach($listeReservation as $reservation){
		                              	?>
                        
                        
                          <tr>
                 <td><?php echo $reservation['cin_client']; ?></td>
				<td><?php echo $reservation['date_res']; ?></td>
				<td><?php echo $reservation['adulte']; ?></td>
				<td><?php echo $reservation['enfant']; ?></td>
				<td><?php echo $reservation['id_event']; ?></td>
                            <!-- <td> <button class="btn-danger btn"> <a href="SupprimerRES.php?id=<?php// echo $sponsors['id'] ; ?>" class="text-white"> Delete </a>  </button> </td>
                            <td><button class="btn-success btn"> <a href="modifierRES.php?id=<?php //echo $sponsors['id'] ; ?>" class="text-white"> modifier </a> </button> </td> -->
                            <td>
					<form method="POST" action="modifierRES.php">
						<input type="submit" name="Modifier" value="Modifier" class="btn-warning btn">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>" class="btn-success btn">Supprimer</a>
				</td>
                            
                                           
                                            
                          </tr>
                          
                            </td>
                         <?php
                          }
                            ?>
                      </table>
                
                         
                          <br>
                         
                          
                         
                      </div>

                  
                 </div>
               </div>
                	 <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-2 pb-lg-5">

<div class="container">
  <div class="row border-top border-top-secondary pt-7">
    <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="assets/img/logo.svg" width="184" alt="" /></div>
    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2">
      <p class="fs-2 mb-lg-4">Quick Links</p>
      <ul class="list-unstyled mb-0">
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">About us</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Blog</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Contact</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">FAQ</a></li>
      </ul>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
      <p class="fs-2 mb-lg-4">Legal stuff</p>
      <ul class="list-unstyled mb-0">
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Disclaimer</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Financing</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Privacy Policy</a></li>
        <li class="mb-1"><a class="link-900 text-secondary text-decoration-none" href="#!">Terms of Service</a></li>
      </ul>
    </div>
    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 order-2 order-md-2 order-lg-4">
      <p class="fs-2 mb-lg-4">
        knowing you're always on the best energy deal.</p>
      <form class="mb-3">
        <input class="form-control" type="email" placeholder="Enter your phone Number" aria-label="phone" />
      </form>
      <button class="btn btn-warning fw-medium py-1">Sign up Now</button>
    </div>
  </div>
</div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->

<!-- <section> close ============================-->
<!-- ============================================-->


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