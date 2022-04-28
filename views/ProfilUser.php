<?php

    include_once '../config.php';
    require '../Model/User.php';
    include_once '../Controller/UserC.php';
    session_start();
    $userC = new UserC();
  //  if (isset($_SESSION['username'])) {
        if ($_SESSION['type'] == "user") {
           $user = $userC->getuserID($_SESSION['id']);
       // }
    } else {
        header('Location:login.php');
    }
    if ( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['id']) && isset($_POST['type']) && isset($_POST['etat']) && isset($_POST['nationalite']) && isset($_POST['numerotele']) && isset($_POST['sexe']) ) {
    
        

        $utilisateur = new user($_POST['email'],$_POST['username'],$_POST['password'],$_POST['type'],$_POST['numerotele'],$_POST['nationalite'],$_POST['sexe'],$_POST['etat']);
        $utilisateurC = new UserC();
        $utilisateurC->modifier_Utilisateur($utilisateur,$_POST['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Diversify -profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo.gif">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.gif">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>



    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
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
                    <a href="../index.php"class="text-decoration-none">
                    <?php
echo 'accueil '
?>                    </a>
                    <button class="btn btn-light btn-icon-text"><a href="deconnexion.php"class="text-decoration-none">Déconnecter</a></button>
                </div>
            </div>

        </div>
    </nav>

    <br><br>


        <h1>Profile</h1>
        <h4>My infos</h4>
        <form action="" method="POST" class="forms-sample">
            <table>
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
            <tr>
            <div class="form-group"><td> <label for="password" >password</label> </td><td> <input type="password" name="password" value="<?php echo $user['password'] ?>">    </td>
            </div>    
        </tr>
               <tr> <td><div class="form-group"><label for="username">Nom d'utilisateur:</label>  </td><td>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>"> </div></td>
                </tr>

                   <tr><td> <div class="form-group"><label for="email">email:</label> </td>
                   <td> <input type="text" name="email" value="<?php echo $user['email'] ?>"> </div> </td> </tr>

                   <tr><td>
                    <div class="form-group"><label for="type">type</label> </td><td> 
                    <input type="text" name="type" value="<?php echo $user['type'] ?>"> </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group"><label for="numerotele">num telephone:</label> </td> <td> 
                    <input type="text" name="numerotele" value="<?php echo $user['numerotele'] ?>"> </div>
                    </td></tr>

                    <tr><td>
                    <div class="form-group"><label for="nationalite">nationalite :</label>  </td> <td>
                    <input type="text" name="nationalite" value="<?php echo $user['nationalite'] ?>"> </div>
                    </td></tr>

                    <tr><td>
                    <div class="form-group"><label for="sexe">sexe:</label>  </td> <td>
                    <input type="text" name="sexe" value="<?php echo $user['sexe'] ?>"> </div>
                    </td></tr>
                    <tr><td>
                    <div class="form-group"><label for="etat">etat:</label> </td> <td> 
                    <input type="text" name="etat" value="<?php echo $user['etat'] ?>"> </div>
                    </td></tr>
                    <button type="submit" class="btn btn-primary btn-icon-text">
                          Edit
                          <i class="ti-file btn-icon-append"></i>                          
                        </button>
            </table>
            <br><br>            


    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
