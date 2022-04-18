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
            $reservationC->ajouterReservation($reservation);
            header('Location:afficherRES.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
       <!-- <button><a href="afficherRES.php">Retour à la liste des reservations</a></button> -->
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="cin_client">cin client:
                        </label>
                    </td>
                    <td><input type="text" name="cin_client" id="cin_client" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="date_res">date reservation:
                        </label>
                    </td>
                    <td><input type="text" name="date_res" id="date_res" maxlength="10"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adulte">adulte:
                        </label>
                    </td>
                    <td><input type="text" name="adulte" id="adulte" maxlength="1"></td>
                </tr>
                <tr>
                    <td>
                        <label for="enfant">enfant:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="enfant" id="enfant" maxlength="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="id_event">id evenement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="id_event" id="id_event">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Reserver"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>