<?php
session_start();
if (!(isset($_SESSION['username']))) {
	header("location:login.php") ; 
} else if ($_SESSION["role_user"] == "Administrateur") {
	header("location:../back/crudUtilisateur.php") ; 
}else {
include 'supprimerUtilisateur.php' ;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classimax</title>
  
  <!-- FAVICON -->
  <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicons/favicon.png">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
  <link href="../../img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="../../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="../../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="../../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="../../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="../../css/style.css" rel="stylesheet">



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">

<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="./public/index.php"><img src="../../assets/assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="./public/afficher_evenement.php">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./public/afficher_sponsors.php">Sponsors</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./public/afficherRES.php">Reservation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./public/afficherrec.php">Reclamation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="../forum.php">Forum</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="./profile.php"> Profil</a></li>
              
              <div class="container">
          


            </ul>
            <?php
            if (isset($_SESSION["username"])) {
                echo "HEY, <strong>".$_SESSION["username"]."</strong>!";
            }
        ?>  
                      <a class="btn btn-warning ms-3" href="logout.php">Deconnecter</a></div>   
        </div>
      </div>
    </nav>
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="../../images/user/user-thumb.jpg" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center"><?php echo $_SESSION['nom_prenom_user'] ?></h5>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="dashboard.html"><i class="fa fa-user"></i> My Infos</a></li>
              <li><a href="logout.php"><i class="fa fa-cog"></i> Logout</a></li>
              <li><a href="" data-toggle="modal" data-target="./supprimerUtilisateur.php"><i class="fa fa-power-off"></i>Delete
                  Account</a></li>
            </ul>
          </div>

          <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="../../images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <form method="POST">
                          <input type="text" name="id_user" value="<?php echo $_SESSION['id_user'];?>" hidden>
                        <button type="submit" name="supprimer_utilisateur" value="Supprimer Utilisateur" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->

        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">My Infos</h3>
          <section class="login py-5 border-top-1">
                
                            <h3 class="bg-gray p-4">modify account</h3>
                            <form method="POST">
                                <fieldset class="p-4">
                                <input type="text" name="id_user" value="<?php echo $_SESSION['id_user'];?>" hidden>
                                    <input type="text" name="username" placeholder="username*" class="border p-3 w-100 my-2">
                                    <input type="text" name="nom_user" placeholder="votre nom*" class="border p-3 w-100 my-2">                                
                                    <input type="text" name="prenom_user" placeholder="votre prenom*" class="border p-3 w-100 my-2">
                                    <input type="email" name="email_user" placeholder="Email*" class="border p-3 w-100 my-2">
                                    <input type="number" name="tel_user" placeholder="tel*" class="border p-3 w-100 my-2">
                                    <input type="text" name="adresse_user" placeholder="adresse*" class="border p-3 w-100 my-2">
                                    <input type="password" name="password_user" placeholder="Password*" class="border p-3 w-100 my-2">
                                    <input type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2">
                                    <input type="text" name="role_user" value="User" class="border p-3 w-100 my-2" readonly> 
                                    <div class="loggedin-forgot d-inline-flex my-3">
                                            <input type="checkbox" id="registering" class="mt-1">
                                            <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                    </div>
                                    <button type="submit" name="modifier_utilisateur" value="Modifier Utilisateur" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">UPDATE</button>
                                </fieldset>
                            </form>
                        
        </section>

        </div>
        <?php	
					include_once '../../config.php' ; 
					include 'modifierUtilisateur.php' ;
          include 'supprimerUtilisateur.php' ;
				?>

        <!-- pagination -->
       <!-- <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>-->
        <!-- pagination -->

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->
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
<section class="text-center py-0">

<div class="container">
  <div class="container border-top py-3">
    <div class="row justify-content-between">
      <div class="col-12 col-md-auto mb-1 mb-md-0">
        <p class="mb-0">&copy; 2022 Your Company Inc </p>
      </div>
      <div class="col-12 col-md-auto">
        <p class="mb-0">
          Made with<span class="fas fa-heart mx-1 text-danger"> </span>by <a class="text-decoration-none ms-1" href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
      </div>
    </div>
  </div>
</div><!-- end of .container-->

</section>

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>
<?php } ?>