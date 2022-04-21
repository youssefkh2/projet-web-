<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php';
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';

	$reservationC=new ReservationC();
	$listeReservation=$reservationC->afficherReservation(); 


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
             $reservationC->modifierReservation($reservation, $_POST["id_event"]);
             header('Location:afficherRES.php');
         }
         else
             $error = "Missing information";
             echo $error;
        }
    
?>
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
    <link rel="apple-touch-icon" sizes="180x180" href="./templateF/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./templateF/public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./templateF/public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="./templateF/public/assets/img/favicons/favicon.png">
    <link rel="manifest" href="./templateF/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="./templateF/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="./templateF/public/assets/css/theme.css" rel="stylesheet" />

  </head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="./templateF/public/assets/img/logo.svg" height="31" alt="logo" /></a>
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
	  <button type="button" class="btn btn-primary"><a href="ajouterRES.php">Ajouter une reservation</a></button>
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>cin_client</th>
				<th>date_res</th>
				<th>adulte</th>
				<th>enfant</th>
				<th>id_event</th>
			</tr>
			<?php
				foreach($listeReservation as $reservation) {
                    if( $_POST['cin_client'] == $reservation['cin_client'] ) {
			?>
			<tr>
            <form method="POST" action="modifierRES.php">
                <td><label><?php echo $reservation['cin_client']; ?></label>
				<input type="hidden" value="<?php echo $reservation['cin_client']; ?>" size="1" name="name_client">
				<td><input value="<?php echo $reservation['date_res']; ?>" name="date_res"></td>
				<td><input value="<?php echo $reservation['adulte']; ?>" name="adulte"></td>
				<td><input value="<?php echo $reservation['enfant']; ?>" name="enfant"></td>
				<td><label><?php echo $reservation['id_event']; ?></label>
				<input type="hidden" value="<?php echo $reservation['id_event']; ?>" name="id_event"></td>
				<td>
					
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>">Supprimer</a>
				</td>
			</tr>
            <?php } else { ?>
                <tr>
				<td><?php echo $reservation['cin_client']; ?></td>
				<td><?php echo $reservation['date_res']; ?></td>
				<td><?php echo $reservation['adulte']; ?></td>
				<td><?php echo $reservation['enfant']; ?></td>
				<td><?php echo $reservation['id_event']; ?></td>
				<td>
					<form method="POST" action="modifierRES.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>">Supprimer</a>
				</td>
			</tr>
                <?php  }?>
			<?php
				}
			?>
		</table>
	</body>
	 <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-2 pb-lg-5">

        <div class="container">
          <div class="row border-top border-top-secondary pt-7">
            <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="./templateF/public/assets/img/logo.svg" width="184" alt="" /></div>
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



