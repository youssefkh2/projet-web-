<?php

    include_once 'config.php';
    require 'Model/User.php';
    include_once 'Controller/UserC.php';
    session_start();
    $userC = new UserC();

    ?>
<!DOCTYPE html>
<html lang="en">
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
 


    <!-- Header -->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#feature">Evenement</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#validation">Sponsors</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#superhero">Reservation</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Reclamation</a></li>
           
            </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a href="views/profilUser.php"class="text-decoration-none">
                        <?php
    echo 'profile ', $_SESSION['username'];
    ?>                    </a>
                        <button class="btn btn-light btn-icon-text"><a href="views/deconnexion.php"class="text-decoration-none">Déconnecter</a></button>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <hr>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h5 class="mb-4 fs-9 fw-bold">“ Le divertissement est le meilleur régime contre le poids de l'existence.... ”</h5>
              <p class="mb-6 lead text-secondary">reserver vos évènements preferés<br class="d-none d-xl-block" />!<br class="d-none d-xl-block" /></p>
              <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="AjouterUtilisateur.php" role="button">S'inscrire</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets/img/hero/hero-img.png" alt="" /></div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <h2 class="mb-2 fs-7 fw-bold">Evenement</h2>
          <input type="text" data-spec="input-field-input-element" class="eds-field-styled__input" id="locationPicker" name="locationPicker" value="Tunis" role="combobox" aria-expanded="false" aria-autocomplete="list" autocomplete="off" tabindex="0"><br>
          <br>
          <div class="row">
            <br>
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
          <div class="text-center"><a class="btn btn-warning" href="#!" role="button">ajouter Evenement</a></div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="validation">

        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="text-secondary">Effortless Validation for</h5>
              <h2 class="mb-2 fs-7 fw-bold">Sponsors</h2>
              <p class="mb-4 fw-medium text-secondary">
                The Myspace page defines the individual,his or her
                characteristics, traits, personal choices and the overall<br />personality of the person.
              </p>
              <h4 class="fs-1 fw-bold">Accessory makers</h4>
              <p class="mb-4 fw-medium text-secondary">While most people enjoy casino gambling, sports betting,<br />lottery and bingo playing for the fun</p>
              <h4 class="fs-1 fw-bold">Alterationists</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you money,</p>
              <h4 class="fs-1 fw-bold">Custom Design designers</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you more money,</p>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/validation/validation.png" alt="" /></div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="manager">

        <div class="container">
          <div class="row">
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/manager/manager.png" alt="" /></div>
            <div class="col-lg-6">
              <h5 class="text-secondary">Easier decision making for</h5>
              <p class="fs-7 fw-bold mb-2">Product Managers</p>
              <p class="mb-4 fw-medium text-secondary">
                The Myspace page defines the individual,his or her
                characteristics, traits, personal choices and the overall<br />personality of the person.
              </p>
              <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">Never worry about overpaying for your<br />energy again.</p>
              </div>
              <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary">We will only switch you to energy companies<br />that we trust and will treat you right</p>
              </div>
              <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
                <p class="fw-medium mb-0 text-secondary"> We track the markets daily and know where the<br />savings are.</p>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="marketer">

        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h5 class="text-secondary">Optimisation for</h5>
              <p class="mb-2 fs-8 fw-bold">Marketers</p>
              <p class="mb-4 fw-medium text-secondary">Few would argue that, despite the advancements of<br />feminism over the past three decades, women still face a<br />double standard when it comes to their behavior.</p>
              <h4 class="fw-bold fs-1">Accessory makers</h4>
              <p class="mb-4 fw-medium text-secondary">While most people enjoy casino gambling, sports betting,<br />lottery and bingo playing for the fun</p>
              <h4 class="fw-bold fs-1">Alterationists</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you money,</p>
              <h4 class="fw-bold fs-1">Custom Design designers</h4>
              <p class="mb-4 fw-medium text-secondary">If you are looking for a new way to promote your business<br />that won't cost you more money,</p>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="assets/img/marketer/marketer.png" alt="" /></div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-md-11 py-8" id="superhero">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h1 class="fw-bold mb-4 fs-7">Need a super hero?</h1>
              <p class="mb-5 text-info fw-medium">Do you require some help for your project: Conception workshop,<br />prototyping, marketing strategy, landing page, Ux/UI?</p>
              <button class="btn btn-warning btn-md">Contact our expert</button>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="marketing">

        <div class="container">
          <h1 class="fw-bold fs-6 mb-3">Marketing Strategies</h1>
          <p class="mb-6 text-secondary">Join 40,000+ other marketers and get proven strategies on email marketing</p>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing01.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Increasing Prosperity With Positive Thinking</h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing02.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Motivation Is The First Step To Success</h3>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card"><img class="card-img-top" src="assets/img/marketing/marketing03.png" alt="" />
                <div class="card-body ps-0">
                  <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">03 March 2019</span></p>
                  <h3 class="fw-bold">Success Steps For Your Personal Or Business Life</h3>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




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