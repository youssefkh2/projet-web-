<?php
  include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
  include_once 'C:/xampp/htdocs/projet_diversify/modelR/voucherMod.php';
    include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php'; 
    include_once 'C:/xampp/htdocs/projet_diversify/controllerR/voucherC.php'; 
	$reservationC=new ReservationC();
	$listeReservation=$reservationC->afficherReservation(); 
    $error = "";

    // create adherent
    $voucher = null;

    // create an instance of the controller
    $voucherC = new VoucherC();
    $listeVoucher=$voucherC->afficherCinRes();
    if (
        isset($_POST["cinClient"]) &&
		isset($_POST["date_limite"]) &&		
        isset($_POST["avertissement"]) 
		//isset($_POST["code"])
    ) {
        if (
            !empty($_POST["cinClient"]) && 
			!empty($_POST['date_limite']) &&
            !empty($_POST["avertissement"]) 
			//!empty($_POST["code"])
        ) {
            // $reservation = new Reservation(
            //     $_POST['cin_client'],
			// 	$_POST['date_res'],
            //     $_POST['adulte'], 
			// 	$_POST['enfant'],
            //     $_POST['id_event']
            // ); 
            $voucher = new Voucher(
                $_POST['cinClient'],
				$_POST['date_limite'],
                $_POST['avertissement'], 
				//$_POST['code']
            ); 
    
           // $voucher = new Voucher( $_POST['cinClient'], $_POST['code'], $_POST['avertissement'], $_POST['date_limite']);
            $voucherC->ajouterVoucher($voucher);
            header('Location:afficherVoucher.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
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

        <hr>
        <div class="dashboard-wrapper">
            <div class="container-fluid">
        <div id="error">
       
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="cin_client">cin client:</label>
                    </td>
                    <td>
                    <select name="cinClient" id="cinClient">
          <?php
				foreach($listeReservation as $reservation){
			?>
              <option value="<?php echo $reservation['cin_client']; ?>"><?php echo $reservation['cin_client']; ?></option>
              <?php
				}
			?>
            <!--<td><input type="text" name="cinClient" id="cinClient" maxlength="10"></td>-->
                </select>
                       <!-- <input type="text" name="cin_client" id="cin_client" maxlength="20">-->
                    </td>
                </tr>
				<tr>
                    <td>
                        <label for="date_limite">date limite:
                        </label>
                    </td>
                    <td><input type="date" name="date_limite" id="date_limite" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="avertissement">avertissement:
                        </label>
                    </td>
                    <td><input type="text" name="avertissement" id="avertissement" maxlength="1"></td>
                </tr>
              <!-- <tr>
                    <td>
                        <label for="code">code:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="code" id="code" maxlength="1">
                    </td>
                </tr>-->
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Reserver"> 
                       
                    </td>
                    <td>
                      <!--  <input type="reset" value="Annuler"  >-->
                        <button><a href="afficherVoucher.php">Annuler</a></button> 
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
    </body>
</html>