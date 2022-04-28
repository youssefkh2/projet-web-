<?php
session_start();
include_once '../config.php';
include_once '../Model/User.php';
include_once '../Controller/UserC.php';
$UserC = new UserC();
$listeUsers = $UserC->trier();

$user = $UserC->getuserID('5');//example testtt
if (isset($_SESSION['username'])) {
    $user = $UserC->getuserID($_SESSION['id']);
} else if (isset($_GET['selected_id'])) {
    $id_selected = $_GET['selected_id'];
    $user = $UserC->getuserID($id_selected);
}

?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Divertify </title>
    <style>
        
    .main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
  margin:10px;
}
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

table.customTable {
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #E9F8F7;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #E9F8F7;
  border-style: solid;
  padding: 5px;
}

table.customTable thead {
  background-color: #FFE0EB;
}
.navbar a.right {
  float: right;
  color: black;
}

    </style>
</head>

<body>
    
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand"style="color: purple;" href="../back-front/backoffice.php">DIVERSIFY</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    <a href="#" class="right">
                    <a href="profilUser.php"class="text-decoration-none">
                    <?php
echo 'Bienvenue ', $_SESSION['username'];
?>                    </a>
  </a>
  <button class="btn btn-light btn-icon-text"><a href="deconnexion.php">Déconnecter</a></button>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

         
                        <a class="nav-link active" href="#" aria-expanded="false"><i class="fas fa-comments"></i>Gestion Compte</a>

         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">user infos</h4>
                  <div><img width="190" alt="User Pic" src="http://localhost/compte/dist/image/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive img-thumbnail">
                </div>

                <hr style="margin:5px 0 5px 0;">

            <form action="modifierUser.php" method="POST" class="forms-sample">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <input type="hidden" name="password" value="<?php echo $user['password'] ?>">    
            <div class="form-group"><label for="username">Nom d'utilisateur:</label>  
                    <input type="text" name="username" value="<?php echo $user['username'] ?>"> </div>


                    <div class="form-group"><label for="email">email:</label>  
                    <input type="text" name="email" value="<?php echo $user['email'] ?>"> </div>


                    <div class="form-group"><label for="type">type</label>  
                    <input type="text" name="type" value="<?php echo $user['type'] ?>"> </div>


                    <div class="form-group"><label for="numerotele">num telephone:</label>  
                    <input type="text" name="numerotele" value="<?php echo $user['numerotele'] ?>"> </div>


                    <div class="form-group"><label for="nationalite">nationalite :</label>  
                    <input type="text" name="nationalite" value="<?php echo $user['nationalite'] ?>"> </div>


                    <div class="form-group"><label for="sexe">sexe:</label>  
                    <input type="text" name="sexe" value="<?php echo $user['sexe'] ?>"> </div>
                
                    <div class="form-group"><label for="etat">etat:</label>  
                    <input type="text" name="etat" value="<?php echo $user['etat'] ?>"> </div>
                    <button type="submit" class="btn btn-dark btn-icon-text">
                          Edit
                          <i class="ti-file btn-icon-append"></i>                          
                        </button>
            </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="POST" action="sendmail.php"  >
                  <div class="form-group"><label for="subject">subject:</label>  
                    <input type="text" name="subject" > </div>
                    <input type="hidden" name="email" value="<?php echo $user['email'] ?>">
                    <div class="form-group"><label for="message">message:</label>  
                    <textarea  name="message"  rows="18" >your message ... </textarea> </div>
                    <button type="submit"  >
                          send
                                                    
                        </button>
                        <input type="submit" value="send">
                  </form>
                </div>
              </div>
            </div>
            <a href="trinom.php"><li data-filter=".gra"><h2>Trier les  Noms </h2></li></a> 
            <a href="trinom.php"><li data-filter=".gra"><h2>Trier les  Noms </h2></li></a> 
            
            <form method="post">
            <label>Search</label>
            <input type="text" name="search">
            <input type="submit" name="submit">
	
            </form>

            <?php

            require_once '../config.php';
            $config=config::getConnexion();

            if (isset($_POST["submit"])) {
                $str = $_POST["search"];
                $sth = $config->prepare("SELECT * FROM `user` WHERE username = '$str'");

                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth -> execute();

                if($User = $sth->fetch())
                {
                    ?>
                    <br><br><br>
                    <table class="table table-striped">
                        <tr>
                          <th style="color:red;">
                            id
                          </th>
                          <th style="color:red;">
                            email
                          </th>
                          <th style="color:red;">
                            username
                          </th>
                          
                          <th style="color:red;">
                            type
                          </th>
                          <th style="color:red;">
                            etat
                          </th>

                          
                        </tr>
         
                     
                        <tr>
                          <td style="color:red;">
                            <?php echo $User->id; ?> 
                          </td>
                          <td style="color:red;">
                            <?php echo $User->email; ?> 
                          </td >
                          <td style="color:red;">
                            <?php echo $User->username; ?>
                          </td>
                          <td style="color:red;">
                          <?php echo $User->type; ?> 
                          </td>
                            <td style="color:red;">
                            <?php echo $User->etat; ?> 
                        </tr>
                      
                        <?php 
                            }
                                
                                
                                else{
                                    echo "Name Does not exist";
                                }
                            }
                            ?>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listes des reviews</h4>
                  <p class="card-description">
                 
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            id
                          </th>
                          <th>
                            email
                          </th>
                          <th>
                            username
                          </th>
                          
                          <th>
                            type
                          </th>
                          <th>
                            etat
                          </th>
                          <th>
                            supprimer
                          </th>
                         
                          <th>
                            set admin
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
foreach($listeUsers as $of){

?>
                        <tr>
                          <td class="py-1">
                            <?php echo $of['id'] ?> 
                          </td>
                          <td>
                            <?php echo $of['email'] ?> 
                          </td>
                          <td>
                             <a href="afficherUtilisateurs.php?selected_id=<?php echo $of['id'] ?>"> <?php echo $of['username'] ?> </a>
                          </td>
                          <td>
                          <?php echo $of['type'] ?> 
                          </td>
                            <td>
                            <?php echo $of['etat'] ?> 
                         
                          </td>
                             <td>
                                 <a href="supprimerUser.php?id=<?php echo $of['id'] ?>"> <img src="../assets/icons/trash.svg"> </a>
                          </td>
                         
                          <td>
                          <a href="setAdmin.php?id=<?php echo $of['id'] ?>"><img src="../assets/icons/person-badge.svg"></a> 
                          </td>
                         

                          

                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                    
                  </div>
                </div>
        
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form action="ajouterUser.php" method="POST" class="forms-sample">
            <div class="form-group"><label for="username">Nom d'utilisateur:</label>  
                    <input type="text" name="username" > </div>


                    <div class="form-group"><label for="email">email:</label>  
                    <input type="text" name="email" > </div>

                    <div class="form-group"><label for="password">password:</label>  
                    <input type="password" name="password" > </div>


                    <div class="form-group"><label for="type">type</label>  
                    <input type="text" name="type" > </div>


                    <div class="form-group"><label for="numerotele">num telephone:</label>  
                    <input type="text" name="numerotele" > </div>


                    <div class="form-group"><label for="nationalite">nationalite :</label>  
                    <input type="text" name="nationalite" > </div>


                    <div class="form-group"><label for="sexe">sexe:</label>  
                    <input type="text" name="sexe" > </div>
                
                    <div class="form-group"><label for="etat">etat:</label>  
                    <input type="text" name="etat" > </div>
                    <button type="submit" class="btn btn-dark btn-icon-text">
                          ajouter
                          <i class="ti-file btn-icon-append"></i>                          
                        </button>
                </form>
            </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description">

                  </p>
                  <div class="table-responsive pt-3">
                  
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $(document).ready(function() {

        // binding the check all box to onClick event
        $(".chk_all").click(function() {

            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }

        });

        // if all checkboxes are selected, then checked the main checkbox class and vise versa
        $(".checkboxes").click(function() {

            if ($(".checkboxes").length == $(".subscheked:checked").length) {
                $(".chk_all").attr("checked", "checked");
            } else {
                $(".chk_all").removeAttr("checked");
            }

        });

    });
    </script>
</body>
 
</html>
