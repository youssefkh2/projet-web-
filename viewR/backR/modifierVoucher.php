<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controllerR/voucherC.php';
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/voucherMod.php';

	$voucherC=new VoucherC();
	$listeVoucher=$voucherC->afficherCinRes(); 


     // create adherent
     $voucher = null;

     // create an instance of the controller
     $voucherC = new VoucherC();
     if (
         isset($_POST["cinClient"]) &&
         isset($_POST["date_limite"]) &&		
         isset($_POST["avertissement"]) &&
         isset($_POST["code"])
     ) {
         if (
            !empty($_POST["cinClient"]) &&
            !empty($_POST["date_limite"]) &&		
            !empty($_POST["avertissement"]) &&
            !empty($_POST["code"])
         ) {
             $voucher = new Voucher(
                 $_POST['cinClient'],
                 $_POST['date_limite'],
                 $_POST['avertissement'], 
                 $_POST['code']
             );
             $voucherC->modifierVoucher($voucher, $_POST["code"]);
             header('Location:afficherVoucher.php');
         }
         else
             $error = "Missing information";
             echo $error;
        }
    
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../frontR/templateF/public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../frontR/templateF/public/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../frontR/templateF/public/assets/libs/css/style.css">
    <link rel="stylesheet" href="../frontR/templateF/public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../frontR/templateF/public/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
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
      ?>
  </a>
                    </ul>
                </div>
            </nav>
        </div>
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
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-comments"></i>Reservation <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" >
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichertopic.php">T</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../view/affichercomments.php"></a>
                                </li>
</ul>
</div>
</li>
         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
		
	   <!-- <button><a href="ajouterRES.php">Ajouter une reservation</a></button>-->
	   <div class="dashboard-wrapper">
            <div class="container-fluid">
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>cinClient</th>
				<th>date_limite</th>
				<th>avertissement</th>
				<th>code</th>
			</tr>
			<?php
				foreach($listeVoucher as $voucher) {
                    if( $_POST['code'] == $voucher['code'] ) {
			?>
			<tr>
            <form method="POST" action="modifierVoucher.php">
                <td><label><?php echo $voucher['cinClient']; ?></label>
				<input type="hidden" value="<?php echo $voucher['cinClient']; ?>" size="1" name="cinClient">
				<td><input value="<?php echo $voucher['date_limite']; ?>" name="date_limite"></td>
				<td><input value="<?php echo $voucher['avertissement']; ?>" name="avertissement"></td>
				<td><label><?php echo $voucher['code']; ?></label>
				<input type="hidden" value="<?php echo $voucher['code']; ?>" name="code"></td>
				<td>
					
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $voucher['code']; ?> name="code">
					</form>
				</td>
				<td>
					<a href="supprimerVoucher.php ? code=<?php echo $voucher['code']; ?>">Supprimer</a>
				</td>
			</tr>
            <?php } else { ?>
                <tr>
				<td><?php echo $voucher['cinClient']; ?></td>
				<td><?php echo $voucher['date_limite']; ?></td>
				<td><?php echo $voucher['avertissement']; ?></td>
				<td><?php echo $voucher['code']; ?></td>
				<td>
					<form method="POST" action="modifierVoucher.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $voucher['code']; ?> name="code">
					</form>
				</td>
				<td>
					<a href="supprimerVoucher.php ? code=<?php echo $voucher['code']; ?>">Supprimer</a>
				</td>
			</tr>
                <?php  }?>
			<?php
				}
			?>
		</table>
		</div>
		</div>

	</body>
</html>
