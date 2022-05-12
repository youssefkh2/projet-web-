<?php
    include '../../../model/demande.php';
    include_once '../../../controller/demandeC.php';
 
    
   

    $error = "";

    // create product
    $demande_sp = null;

    // create an instance of the controller
    $demande_spC = new demande_spC();
   

  

	 

    if (
        // isset($_POST["id_sp"]) &&
		isset($_POST["id_event"]) &&
        isset($_POST["num_tlf"]) && 
        isset($_POST["email"])&& 
        isset($_POST["date_debut"])&& 
        isset($_POST["date_fin"])
     
        

    ) {
       
            if (
            
           // !empty($_POST["id_sp"]) &&
            !empty($_POST["id_event"]) && 
            !empty($_POST["num_tlf"])&& 
            !empty($_POST["email"])&& 
            !empty($_POST["date_debut"])&&
            !empty($_POST["date_fin"])
           
           
           
           

            ){
          $demande_sp=new demande_sp(
            $_POST["id_sp"],
            $_POST["id_event"],
            $_POST["num_tlf"],
            $_POST["email"],
           $_POST["date_debut"],
            $_POST["date_fin"]
           

          );
          $demande_spC->modifierdemande_sp($demande_sp, $_POST["id_sp"]);
            header('Location:gestion_sponsors.php');
        }
        else 
        $error="error";
            
        
    }


  
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta nom="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Breeze Admin</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="assets/images/logo-mini.svg"
            alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="nav-profile-image">
              <img src="assets/images/faces/face1.jpg" alt="profile" />
              <span class="login-status online"></span>
              <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column pr-3">
              <span class="font-weight-medium mb-2">sassi ali </span>
              <span class="font-weight-normal">Gestion sponsor</span>
            </div>
            <span class="badge badge-danger text-white ml-3 rounded">3</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="mdi mdi-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            <span class="menu-title">gestion sponsor</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item">
                <a class="nav-link" href="gestion sponsor.html">Gestiononors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Icons</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/forms/basic_elements.html">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            <span class="menu-title">Forms</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="mdi mdi-chart-bar menu-icon"></i>
            <span class="menu-title">Charts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="mdi mdi-table-large menu-icon"></i>
            <span class="menu-title">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <span class="nav-link" href="#">
            <span class="menu-title">Docs</span>
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
            <i class="mdi mdi-file-document-box menu-icon"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li>
        <li class="nav-item sidebar-actions">
          <div class="nav-link">
            <div class="mt-4">
              <div class="border-none">
                <p class="text-black">Notification</p>
              </div>
              <ul class="mt-4 pl-0">
                <li>Sign Out</li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles light"></div>
          <div class="tiles dark"></div>
        </div>
      </div>
      <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
          <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img
              src="assets/images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count count-varient1">7</span>
              </a>
              <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0">View all activities</p>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-flex">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-eemail-outline"></i>
                <span class="count count-varient2">5</span>
              </a>
              <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list"
                aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-success">Request</span>
                    <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-warning">Invoices</span>
                    <p class="text-small text-muted ellipsis mb-0"> Invoice for order is emailed </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-danger">Projects</span>
                    <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <h6 class="p-3 mb-0">See all activity</h6>
              </div>
            </li>
            <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
              <form class="nav-link form-inline mt-2 mt-md-0">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                </div>
              </form>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right ml-lg-auto">
            <li class="nav-item dropdown d-none d-xl-flex border-0">
              <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-earth"></i> English </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#"> French </a>
                <a class="dropdown-item" href="#"> Spain </a>
                <a class="dropdown-item" href="#"> Latin </a>
                <a class="dropdown-item" href="#"> Japanese </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown border-0">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                <span class="profile-nom">Henry Klein</span>
              </a>
              <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>

          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>




      <div class="main-panel">


        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
            <h5>Modfier demande_sp</h5>
            <footer class="footer">

</footer>
                                                    </div>
                                                    <div class="card-block">
                                                    <div id="error">
                                                    <?php echo $error; ?>
                                                    </div>
                                                    <?php
                                                    
                                                        if (isset($_POST['id_sp'])){
                                                            $demande_sp = $demande_spC->recupererdemande_sp($_POST['id_sp']);
				
		                                            ?>
                                                

                                                        <form action="" class="form-material" method="POST">
                                                        <?php
                                                        }   
                                                        ?>
                                                            
                                                          
                                                            <div class="form-group form-default">
                                                            <label class="float-label">id_sp </label>
                                                                <input type="number"  id="id_sp"   name="id_sp" type ="hidden" value="<?php echo $demande_sp['id_sp']; ?>" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                              
                                                                <p id="errorid" class="erreur" ></p>
                                                            </div>
                                                            <div class="form-group form-default">
                                                            <label class="float-label">id_event </label>
                                                                <input type="number"  id="id_event"  name="id_event" value="<?php echo $demande_sp['id_event']; ?>" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                              
                                                                <p id="errorid" class="erreur" ></p>
                                                            </div>
                                                           
                                                           
                                                           
                                                            <div class="form-group form-default">
                                                            <label class="float-label">Numero_Tel</label>
                                                                <input type="number"  id="num_tlf" name ="num_tlf"  onblur="numBer()" name="num_tlf" value="<?php echo $demande_sp['num_tlf']; ?>"  class="form-control"required="" maxlength="11">
                                                                <span class="form-bar"></span>
                                                               
                                                                <p id="errornumero" class="erreur" ></p>
                                                            </div>
                                                            <div class="form-group form-default">
                                                            <label class="float-label">Adress_Mail</label>
                                                                <input type="email"  id="email" name="email"  onblur="saisiremail()" value="<?php echo $demande_sp['email'];?>" class="form-control" required="" >
                                                                <span class="form-bar"></span>
                                                               
                                                                <p id="erroremail" class="erreur" ></p>
                                                            </div>
                                                            
                                                            <div class="form-group form-default">
                                                            <label class="float-label">date_debut</label>
                                                                <input type="date"  id="date_debut" name="date_debut" value="<?php echo $demande_sp['date_debut']; ?>" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                               
                                                                <p id="errorinv" class="erreur" ></p>
                                                            </div>
                                                            
                                                            <div class="form-group form-default">
                                                            <label class="float-label">date_fin</label>
                                                                <input type="date"  id="date_fin" name="date_fin" value="<?php echo $demande_sp['date_fin']; ?>" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                               
                                                                <p id="errorinv" class="erreur" ></p>
                                                            </div>
                                                            
                                                           
                                                       
                    
                                                            
                                                            
                   
                    <!-- <input  class="btn btn-primary btn-lg btn-block" type="submit"value="modifier"> -->
               
                    <button class="btn btn-light"><a href="gestion_sponsors.php">Cancel</button>
                    <button  class="btn btn-primary btn-lg btn-block" type="submit"><a href="gestion_sponsors.php">modifier</a></button>
                  </form>
                  
		
              </div>
            </div>
           
          </div>
          <!--browser stats ends-->
        </div>
      </div>
    </div>
   
  </div>
 
   
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="assets/vendors/flot/jquery.flot.js"></script>
  <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
  <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
  <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
  <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
  <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>

</html>