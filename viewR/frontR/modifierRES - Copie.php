<?php
    include_once 'C:/xampp/htdocs/projet_diversify/modelR/reservationMod.php';
    include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php';

    $error = "";
    
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
        
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation</title>
</head>
    <body>
       <button><a href="afficherRES.php">Retour à la liste des reservations</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		<?php
			if (isset($_POST['id_event'])){
				$reservation = $reservationC->recupererReservation($_POST['id_event']);
			}
				
		?>
        <form action="reservationC.php" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="cin_client">cin client:
                        </label>
                    </td>
                    <td><input type="text" name="cin_client" id="cin_client" value="<?php echo $reservation['cin_client']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="date_res">date de reservation:
                        </label>
                    </td>
                    <td><input type="text" name="date_res" id="date_res" value="<?php echo $reservation['date_res']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="adulte">adulte:
                        </label>
                    </td>
                    <td><input type="text" name="adulte" id="adulte" value="<?php echo $reservation['adulte']; ?>" maxlength="1"></td>
                </tr>
                <tr>
                    <td>
                        <label for="enfant">enfant:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="enfant" id="enfant" value="<?php echo $reservation['enfant'];  ?>" maxlength="1">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		
		<?php
	}

		?>
		
    </body>
</html>
