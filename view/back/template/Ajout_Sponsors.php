<?php
    require_once '../../../model/sponsors.php';
    include_once '../../../controller/sponsorsC.php';
   

    $error = "";

    // create product
    $sponsors = null;

    // create an instance of the controller
    $sponsorsC = new sponsorsC();
   
    

    if (
         isset($_POST["id"]) &&
		     isset($_POST["nom"]) &&
        isset($_POST["type"]) && 
        isset($_POST["numero"])&& 
        isset($_POST["email"])&& 
        isset($_POST["image"])  &&
       isset($_POST["descrip"])&&
       isset($_POST["inves"])

    ) {
        if (
           
			 //!empty($_POST["id"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["type"]) && 
            !empty($_POST["numero"])&& 
            !empty($_POST["email"])&& 
            !empty($_POST["inves"])&&
            !empty($_POST["image"])&& 
            !empty($_POST["descrip"])

        ) {
            $sponsors = new sponsors(
            $_POST["id"],
            $_POST["nom"],
            $_POST["type"],
            $_POST["numero"],
            $_POST["email"],
            $_POST["image"],
            $_POST["descrip"],
            $_POST["inves"]
            );


            $sponsorsC->ajoutersponsors($sponsors);
            header('Location:gestion_sponsors.php');

        }
        else
            $error = "Missing information";
    }

   

    
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
                <a class="nav-link" href="gestion sponsor.html">Gestion_Sponors</a>
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
                <i class="mdi mdi-email-outline"></i>
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
                    <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
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
                <span class="profile-name">Henry Klein</span>
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
              <h4 class="card-title">Ajouter Sponsors</h4>
              <div class="card-block">
                <div id="error">
                  <?php echo $error; ?>
                </div>
                <form action="" class="form-material" method="POST">
                  <p class="card-description"></p>
                  <form class="forms-sample">
                    <div class="form-group ">
                      <input type="hidden" name="id" id="id" value="0" class="form-control" required="">
                      <span class="form-bar"></span>
                      <!-- <label class="float-label">Id_Sponsors</label> -->
                    </div>

                    <div class="form-group">

                      <label class="float-label">Nom de Sponsors</label>
                      
                      <br><br>
                      <span class="form-bar"></span>
                      <input type="text" id="nom" name="nom" class="form-control" required=""
                        onblur="saisirNom()">
                      <p id="errorName" class="erreur"></p>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-form-label">Select Type</label>
                      <div class="col-sm-10">
                        <select name="type" id="type" class="form-control">
                          <option value="Gold">Gold</option>
                          <option value="Platinum">Platinum</option>
                          <option value="Standard">Standard</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="float-label">Tel Number</label>
                      <br><br>
                      <span class="form-bar"></span>
                      <input type="number" id="numero" name="numero" class="form-control" required=""
                        maxlength="11" onblur="numBer()">
                      <p id="errorNBM" class="erreur"></p>
                    </div>
                    <div class="form-group ">
                      <label class="float-label"> Mail Adress</label>
                      <br><br>
                      <input type="email" id="email" name="email" class="form-control" required=""
                        onblur="saisirMail()" placeholder="Please enter a Valid Adress">
                      <span class="form-bar"></span>
                     
                      <p id="errorMR" class="erreur"></p>
                    </div>
                    <div class="form-group ">
                      <label class="float-label">Enter Investissement</label>
                      <input type="number" id="inves" name="inves" class="form-control" required=""
                        onblur="Inves()" maxlength="15">
                      <span class="form-bar"></span>
                      
                     
                      <p id="errorinv" class="erreur"></p>
                    </div>
                    <div class="form-group form-default">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Upload Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="image" name="image" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <br>
                      <textarea rows="5" cols="33" name="descrip" class="form-control" id="descrip" 
                        placeholder="Description Sponsors....." required=""></textarea>
                    </div>
                    

                    
                    <button  class="btn btn-primary btn-lg btn-block" type="submit">Ajouter</a></button>
                    
               
</div>

                  </form>
              </div>
            </div>
          </div>
          <!--browser stats ends-->
        </div>
      </div>
    </div>
    <footer class="footer">

    </footer>
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


  <script>
    
    function saisirNom() {
                var name = document.getElementById('nom').value;
                var regex = /^[A-Za-z]+$/;


                if (!(regex.test(name))) {
                    document.getElementById("errorName").textContent = "Name has to be composed of letters only!";
                    document.getElementById("errorName").style.color = "red";
                    return 0;
                } 
                else if (name[0] == name[0].toLowerCase()) {
                    document.getElementById("errorName").textContent = "Name has to start by a capital letter!";
                    document.getElementById("errorName").style.color = "red";
                    return 0;
                }
                 else {
                    document.getElementById("errorName").textContent = "Name Verified";
                    document.getElementById("errorName").style.color = "green";
                    return 1;
                }
    }
   

    function saisirMail() {

        var mail = document.getElementById("email").value;
        var x=mail.length-10;
        var terminaison=mail.substring(x,mail.length);
           
            
            

     
        if (!(terminaison==="@esprit.tn"))
        {
            document.getElementById("errorMR").textContent = "mail non valide";
            document.getElementById("errorMR").style.color = "red";
            return 0;
        }
        else
        {
            document.getElementById("errorMR").textContent = "mail Verified";
            document.getElementById("errorMR").style.color = "green";
            return 1;

        }

    }

function numBer()
{
    var nbm = document.getElementById("numtero").value;

    if (nbm <= 0 ) {
        document.getElementById("errorNBM").textContent = "nombre des membres doit être supérieur à 0 ";
        document.getElementById("errorNBM").style.color = "red";
    }
    else
    {
        document.getElementById("errorNBM").textContent = "Number Verified";
        document.getElementById("errorNBM").style.color = "green";
            return 1;
    }



}
function Inves()
{
    var nbm = document.getElementById("inves").value;

    if (nbm <= 0 ) {
        document.getElementById("errorinv").textContent = "nombre des membres doit être supérieur à 0 ";
        document.getElementById("errorinv").style.color = "red";
    }
    else
    {
        document.getElementById("errorinv").textContent = "Number Verified";
        document.getElementById("errorinv").style.color = "green";
            return 1;
    }



}






    function ajout(event) {
    if ( saisirNom() == 0 || saisirMail()==0  || numBer()==0   || Inves()==0)
    
        event.preventDefault();
    }


  







</script>

</body>

</html>