<?php
	include 'C:/xampp/htdocs/Reclamation/controler/reclamationC.php';
	$reclamationC=new reclamationC();
	$listerec=$reclamationC->afficherrec(); 
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
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
                <a class="navbar-brand" href="../back-front/backoffice.php">Divertify</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                    <a href="#" class="right">
      <?php 
        if (isset($_SESSION["adminFullname"])) {
            echo "HEY, <strong style='color:black'>".$_SESSION["adminFullname"]."</strong>!";
        }

        if(isset($_GET['recherche']))
        {
            $search_value=$_GET["recherche"];
            $listerec=$reclamationC->recherche($search_value);
        }



      ?>
  </a>
                    </ul>
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

                            <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-comments"></i>Forum <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" >
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichertopic.php">Topics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichercomments.php">Comments</a>
                                </li>
</ul>
</div>
</li>
         
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

<br><br><br><br>
	    <button><a href="ajouterrec.php">Ajouter une reclamation </a></button>
		<center><h1>Liste des reclamations </h1></center>
		<table border="1" align="center">
			<tr>
				<th>id_reclamation</th>
				<th>type_reclamation</th>
				<th>message</th>
				<th>Modifier</th>
				<th>Supprimer</th>
				<th>Reponse</th>

                <th colspan="2">
                                                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="afficherrec.php">
                                                        <div class="input-group">
                                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher type reclamation "
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="submit" value="Chercher">
                                                                        <i class="fas fa-search fa-sm"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>



			</tr>
			<?php
				foreach($listerec as $reclamation){
			?>
			<tr>
				<td><?php echo $reclamation['id_reclamation']; ?></td>
				<td><?php echo $reclamation['type_reclamation']; ?></td>
				<td><?php echo $reclamation['message']; ?></td>
				
				
				<td>
					<a href="modifierrec.php?id=<?php echo $reclamation['id_reclamation']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimerrec.php?id_reclamation=<?php echo $reclamation['id_reclamation']; ?>">Supprimer</a>
				</td>
				<td>
					<a href="../back/ajouterrep.php?id=<?php echo $reclamation['id_reclamation']; ?>">Reponse</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		<br><br><br><br><br><br><br><br>
		<br><br><br><br>
		<br><br><br><br><br>


           

</html>
